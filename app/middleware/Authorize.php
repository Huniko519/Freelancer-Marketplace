<?php

namespace Fir\Middleware;

/**
 * Class Authorize takes care of site routing based on user status
 */
class Authorize {

    /**
     * @var array   The list of routes to be blocked from being accessed by Users
     *              Array Map: Key(User Role) => Array(Routes Maps) => (Array(Routes), Array(Redirect))
     */
    protected $except = [
        'guest' => [
        ],
        'admin' => [
            'admin' => [[
			             'admin/dashboard*', 
						 'admin/profile/details*', 
						 'admin/profile/image*', 
						 'admin/profile/password*', 
						 'admin/profile/password*', 
						 'admin/s3/files*', 
						 'admin/s3/upload*', 
						 'admin/products*', 
						 'admin/addproduct*', 
						 'admin/authorlist*', 
						 'admin/addauthor*', 
						 'admin/technologies*', 
						 'admin/addtechnology*', 
						 'admin/settings/site*', 
						 'admin/payment_settings/paypal*', 
						 'admin/currency_settings/default*', 
						 'admin/email_settings*', 
						 'admin/amazon*', 
						 'admin/transactions*', 
						 'admin/searches*', 
						 'admin/boxcard/details*', 
						 'admin/boxsale/details*'], ['admin/login']],
        ],
        'user' => [
            'user' => [[
			             'user*', 
			             'user/dashboard*', 
						 'user/purchases*', 
						 'user/transactions*', 
						 'user/verify*', 
						 'user/profile*', 
						 'user/image*', 
						 'user/password*'], ['login']],
			]
    ];

    public function __construct() {
        // Select the route maps based on the user role
        if(!isset($_SESSION[$GLOBALS['config']['session']['session_admin']])) {
            $user = 'admin';
        } elseif(!isset($_SESSION[$GLOBALS['config']['session']['session_name']])) {
            $user = 'user';
        } else {
            $user = 'guest';
        }

        foreach($this->except[$user] as $routes) {
            foreach($routes[0] as $route) {
                // If the route has match anything rule (*)
                if(substr($route, -1) == '*') {
                    // If the current path matches a route exception
                    if(isset($_GET['url']) && stripos($_GET['url'], str_replace('*', '', $route)) === 0) {
                        redirect($routes[1][0]);
                    }
                }
                // If the current path matches a route exception
                elseif(isset($_GET['url']) && in_array($_GET['url'], $routes[0])) {
                    redirect($routes[1][0]);
                }
            }
        }
    }
}