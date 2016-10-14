<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

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
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Postsupdate',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Postsupdate/home.ctp)...
     */
    

    //$routes->connect('/', ['controller' => 'Postsupdate', 'action' => 'index', 'index']);

    /* 13/05/2016 */

    

    $routes->connect('/', ['controller' => 'Postsupdate', 'action' => 'home']);

    $routes->connect('/contactME', ['controller' => 'Postsupdate', 'action' => 'contact']);
   
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
        // $routes->connect('/:slug', ['controller' => 'Postsupdate', 'action' => 'home']);

    
    $routes->fallbacks('DashedRoute');

});

Router::extensions(['html', 'rss']);

Router::scope('/addrest', function ($routes) {
    $routes->extensions(['json', 'xml']);
});

// Router::scope('/postsupdate/attorney', function ($routes) {

//     $routes->connectCakePHP_Rocks(
//         '/:slug', // E.g. /blog/3-CakePHP_Rocks
//         ['controller' => 'Postsupdate', 'action' => 'attorney']);
//     }
// );

Router::prefix('admin', function ($routes) {
    // Because you are in the admin scope,
    // you do not need to include the /admin prefix
    // or the admin route element.
    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);

    // $routes->connect('/:controller',['action' => 'home']);

    // $routes->connect('/:controller/:action/*',[], ['routeClass' => 'DashedRoute']);

    $routes->connect('/postsupdate/:action', ['controller' => 'Postsupdate']);

    $routes->fallbacks('InflectedRoute');

    // $routes->fallbacks('DashedRoute');

    //$routes->connect('/:action/*');
});

// Assuming route is setup like:


// Router makes it easy to generate RESTful routes for
// your controllers. RESTful routes are helpful when you are
// creating API endpoints for your application. If we wanted 
// to allow REST access to a recipe controller, We’d do something like this:

/* Comment out for router. */

// Router::scope('/addrest', function ($routes) {
//     $routes->extensions(['json','xml']);
//     $routes->resources('Postsupdate');
// });

// Router::connect('/addrest', 
//                  array('controller' => 'Postsupdate', 
//                        'action' => 'addrest'));

// $routes->resources('Postsupdate', [
//    'map' => [
//        'index' => [
//            'action' => 'index',
//            'method' => 'POST'
//        ]
//    ]
// ]);

// Router::resourceMap( array(
//         array( 'action' => 'index', 'method' => 'GET', 'id' => false ),    
//     ) );

// Router::mapResources( 'Postsupdate' );

//  Router::parseExtensions( 'json' );

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
*/
Router::extensions(['xlsx']);
Plugin::routes();
