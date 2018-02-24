<?php 

namespace Sijot\Repositories;

use Sijot\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\Paginator;

/**
 * Class UserRepository
 *
 * @package Sijot\Repositories
 */
class UserRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Creer een nieuwe gebruiker per toegangs rol. (seeder)
     *
     * @param  Role     $role       De naam van de gebruikers rol.
     * @param  mixed    $commandBus Mapping voor $this->command in de seeder
     * @return void
     */
    public function seedCreateUser(Role $role, $commandBus): void
    {
        $user = factory(User::class)->create();
        $user->assignRole($role->name);
        if ($role->name == 'admin') {
            $commandBus->info('Here is your admin details to login:');
            $commandBus->warn($user->email);
            $commandBus->warn('Password is "secret"');
        }
    }

    /**
     * Get all the users in a paginated format. 
     * 
     * @param  int  $perPage  The amount of results u want to display per page. 
     * @return \Illuminate\Pagination\Paginator
     */
    public function getListing(int $perPage): Paginator
    {
        return $this->model->simplePaginate($perPage);
    }

    /**
     * Function for generating user passwords. 
     * ---
     * used when an dmin create a newly user in the backend. 
     * 
     * @param  int  $length  The length of the random generated string.
     * @return string
     */
    public function generatePassword(int $length = 16): string 
    {
        return bcrypt(str_random($length));
    }

    /**
     * Count all the user logins in the database storage. 
     */
    public function countUsers(): int 
    {
        return $this->model->count();
    }
}