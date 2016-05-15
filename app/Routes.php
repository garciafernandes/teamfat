<?php
/**
 * Routes - all standard routes are defined here.
 *
 * @author David Carr - dave@daveismyname.com
 * @version 3.0
 */

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */

// Default Routing
Router::any('', 'App\Controllers\Welcome@index');
Router::any('subpage', 'App\Controllers\Welcome@subPage');
Router::any('admin', 'App\Controllers\Admin@indexAdmin');
Router::any('recette', 'App\Controllers\Admin@recette');
Router::any('recette/ajout', 'App\Controllers\Admin@ajoutrecette');

//User Routing :
Router::any('/utilisateur/inscription', 'App\Modules\User\User@register');
Router::any('/utilisateur/login', 'App\Modules\User\User@login');
Router::any('/utilisateur/logout', 'App\Modules\User\User@logout');
Router::any('/utilisateur/modification', 'App\Modules\User\User@change_password');

// ORM Generator
if($_SERVER["SERVER_NAME"]=="localhost") {
    Router::any("generateorm",'App\Modules\ORM\ORMGenerator@index');
    Router::any("generateorm/confirm",'App\Modules\ORM\ORMGenerator@generate');
}

/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
