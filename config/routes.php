<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
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

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    /*
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
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    //API Routes
    $routes->prefix("Api", function (RouteBuilder $builder) {
        $builder->setExtensions(["json", "xml"]);
        $builder->connect("/register-user", ["controller" => "User", "action" => "registerUser"]);
        //it need jwt token
        $builder->connect("/login", ["controller" => "User", "action" => "loginUser"]);

        //Need jwt auth token inside header to access these routes
        $builder->connect("/user-profile", ["controller" => "User", "action" => "userProfile"]);
        $builder->connect("/update-user/:id", ["controller" => "User", "action" => "updateUser"], ["pass" => ["id"]])->setPass(["id"]);
        $builder->connect("/list-user", ["controller" => "User", "action" => "listUsers"]);
        $builder->connect("/delete-user", ["controller" => "User", "action" => "deleteUser"])->setPass(["id"]);
    });

    //Application routes
    $routes->scope('/', function (RouteBuilder $builder) {

        //Students routes
        $builder->connect("/add-student", ["controller" => "Student", "action" => "addStudent"]);
        $builder->connect("/edit-student/:id", ["controller" => "Student", "action" => "editStudent"], ["pass" => ["id"]]);
        $builder->connect("/list-students", ["controller" => "Student", "action" => "listStudents"]);

        //Ajax routes
        $builder->connect("/submit-student-data",["controller" => "Ajax", "action" => "submitAddStudent"]);
        $builder->connect("/update-student-data",["controller" => "Ajax", "action" => "submitEditStudent"]);
        $builder->connect("/delete-student-data",["controller" => "Ajax", "action" => "submitDeleteStudentRequest"]);



        //User routes
        $builder->connect("/register-user", ["controller" => "User", "action" => "registerUser"]);
        $builder->connect("/login", ["controller" => "User", "action" => "loginUser"]);
        /*$builder->connect("/edit-user/:id", ["controller" => "User", "action" => "editUser"], ["pass" => ["id"]]);
        $builder->connect("/list-user", ["controller" => "User", "action" => "listUsers"]);*/

        //Ajax routes
        $builder->connect("/submit-user-data",["controller" => "Ajax", "action" => "submitRegisterUser"]);
        /*$builder->connect("/update-user-data",["controller" => "Ajax", "action" => "submitEditUser"]);
        $builder->connect("/delete-user-data",["controller" => "Ajax", "action" => "submitDeleteUserRequest"]);*/

    });

    // Admin Routes
    $routes->prefix('Admin', function (RouteBuilder $routes) {
        $routes->connect("/edit-user/:id", ["controller" => "User", "action" => "editUser"], ["pass" => ["id"]]);
        $routes->connect("/list-user", ["controller" => "User", "action" => "listUsers"]);

        //Ajax routes
        $routes->connect("/update-user-data",["controller" => "Ajax", "action" => "submitEditUser"]);
        $routes->connect("/delete-user-data",["controller" => "Ajax", "action" => "submitDeleteUserRequest"]);

        $routes->fallbacks(DashedRoute::class);
    });

    $routes->scope('/', function (RouteBuilder $builder) {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder) {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
