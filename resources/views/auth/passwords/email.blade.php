<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Tjoosten">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/auth.css') }}">
</head>
<body class="my-login-page">
<div id="app">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center align-items-center h-100">
                <div class="card-wrapper">
                    <div class="brand component-border">
                        <img height="90" width="90" src="{{ asset('images/logo.jpg') }}">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Wachtwoord vergeten</h4>
                            <form method="POST">

                                <div class="form-group">
                                    <label for="email">E-Mail Adres</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    <div class="form-text text-muted">
                                        Bij het klikken op "Reset wachtwoord" word er een reset link gezonden naar je e-mail adres.
                                    </div>
                                </div>

                                <div class="form-group no-margin">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Reset wachtwoord
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="js/auth.js"></script>
</body>
</html>