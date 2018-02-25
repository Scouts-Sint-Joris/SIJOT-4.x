<?php

namespace Sijot\Http\Controllers\Backend;

use Sijot\Http\Controllers\Controller;
use Sijot\Http\Requests\Backend\Articles\EditValidator;
use Sijot\Http\Requests\Backend\Articles\StoreValidator;
use Sijot\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class ArticleController
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Backend
 */
class ArticleController extends Controller
{
    /** @var \Sijot\Repositories\ArticleRepository $articles */
    private $articles;

    /**
     * ArticleController constructor.
     *
     * @param  ArticleRepository $articles Abstraction layer between controller and database related logic.
     * @return void
     */
    public function __construct(ArticleRepository $articles)
    {
        $this->middleware(['auth'])->except(['show']);
        $this->articles = $articles;
    }

    /**
     * Index listing for all the articles in the system. 
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('backend.articles.index', ['articles' => $this->articles->getListing(15)]); 
    }

    /**
     * Create view for a new article. 
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('backend.articles.create');
    }

    /**
     * Show a specific news article in the application.
     *
     * @param  string  $slug  The uniqie identifier from the article in the database.
     * @return \Illuminate\View\View
     */
    public function show(string $slug): View 
    {
        return view('frontend.articles.show', [
            'article' => $this->articles->getArticle($slug) // TODO: Register repository function.
        ]); 
    }

    /**
     * Function for storing a new article in the database storage. 
     * 
     * @param  \Sijot\Http\Requests\Backend\Articles\StoreValidator  $input  The user given input. (validated)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreValidator $input): RedirectResponse
    {
        $input->merge(['author_id' => $input->user()->id]);

        if ($article = $this->articles->create($input->all())) {
            $article->addMedia($input->file('afbeelding'))->toMediaCollection('images');

            // TODO: Implementatie activity logger
            $this->articles->determineFlashSession($input->status); // TODO: register flash session in the func.
        }

        return redirect()->route('nieuws.index');
    }

    /**
     * Edit view for an article
     * --- 
     * Returns HTTP/1 404 when no article is found in the storage
     * 
     * @param  int  $article  Unique identifier from the article
     * @return \Illuminate\View\View
     */
    public function edit(int $article): View
    {
        //
    }

    /**
     * Update an article in the database storage
     * ---
     * Returns HTTP/1 404 when no article is found in the storage
     * 
     * @param  \Sijot\Http\Requests\Backend\Articles\EditValidator  $input  User given input. (Validated)
     * @param  string                                               $slug   Slug form the article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditValidator $input, string $slug): RedirectResponse
    {
        $article = $this->articles->getArticle($slug);

        if ($article->update($input->all())) {
            $this->addActivity($article, 'Heeft een artikel gewijzigd in de applicatie');
            flash('Het artikel is aangepast in de applicatie.')->success();
        }

        return redirect()->route('nieuws.show', $article);
    }

    /**
     * Delete some article in the database storage
     * ---
     * Returns HTTP/1 404 when no article is found in the storage
     * 
     * @param  int  $article  The unique identifier from the article in the database storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $article): RedirectResponse
    {
        $article = $this->articles->findOrFail($article); 

        if ($article->delete()) {
            $this->addActivity($article, 'Heeft een artikel verwijderd in de website.');
            flash('Het artikel is verwijderd uit de applicatie.')->info();
        }

        return redirect()->route('nieuws.index');
    }
}
