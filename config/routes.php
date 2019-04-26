<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pengguna', 'action' => 'Home', 'prefix' =>'pelajar']);
    $routes->connect('/login', ['controller' => 'PenggunaAuth', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'PenggunaAuth', 'action' => 'logout']);
    $routes->connect('/register', ['controller' => 'PenggunaAuth', 'action' => 'register']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});
Router::prefix('admin', function ($routes) {
    $routes->connect('/topik', array('controller' => 'Topik', 'action' => 'index'));
    $routes->connect('/materi', array('controller' => 'Materi', 'action' => 'index'));
    $routes->connect('/pertanyaan', array('controller' => 'Pertanyaan', 'action' => 'index'));
    $routes->connect('/jawaban', array('controller' => 'Jawaban', 'action' => 'index'));
    $routes->connect('/pengguna', ['controller' => 'Pengguna', 'action' => 'index']);
    $routes->connect('/pengerjaan', ['controller' => 'Pengerjaan', 'action' => 'index']);
    $routes->connect('/profil', ['controller' => 'Pengguna', 'action' => 'profil']);
    $routes->connect('/password', ['controller' => 'PenggunaAuth', 'action' => 'changepassword']);
    $routes->connect('/', ['controller' => 'Topik', 'action' => 'home']);
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('pelajar', function ($routes) {
   // $routes->connect('/soal', ['controller' => 'Pengerjaan', 'action' => 'soal']);
    $routes->connect('/soal', ['controller' => 'Pengerjaan', 'action' => 'topik']);
    $routes->connect('/materi', ['controller' => 'Pengerjaan', 'action' => 'materi']);
    $routes->connect('/password', ['controller' => 'PenggunaAuth', 'action' => 'changepassword']);
    $routes->connect('/sejarah', ['controller' => 'Pengerjaan', 'action' => 'sejarahtopik']);
    $routes->connect('/profil', ['controller' => 'Pengguna', 'action' => 'profil']);
    $routes->connect('/', ['controller' => 'Pengguna', 'action' => 'Home']);
    $routes->fallbacks(DashedRoute::class);
});