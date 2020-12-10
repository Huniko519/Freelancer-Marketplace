<?php

namespace Fir;

/**
 * The app router which decides what router and method is selected based on the user's input
 */
class App
{
    /**
     * Default controller if none is specified
     * @var    string
     */
    protected $controller = 'home';

    /**
     * Default method if none is specified
     * @var string
     */
    protected $method = 'index';

    /**
     * List of GET parameters sent by the user
     * @var array
     */
    protected $url = [];

    /**
     * @var \mysqli
     */
    protected $db;

    /**
     * App constructor.
     */
    public function __construct()
    {
        // Create the database connection
        $this->db = (new Connection\Database())->connect();

        // Load dependencies
        $this->loadDependencies();

        // Load libraries
        $this->loadLibraries();

        // Load helpers
        $this->loadHelpers();

        // Instantiate the middleware
        new Middleware\Middleware();

        // Parse the URL
        $this->parseUrl();

        // Check if the controller exists
        if (isset($this->url[0])) {
			if($this->url[0] == FREELANCER_URL){
                // Set the controller
                $this->controller = $this->url[0];
            }
			elseif($this->url[0] == CLIENT_URL){
                // Set the controller
                $this->controller = $this->url[0];
            }
			elseif($this->url[0] == FREELANCERS_URL){
                // Set the controller
                $this->controller = $this->url[0];
            }
			elseif($this->url[0] == CLIENTS_URL){
                // Set the controller
                $this->controller = $this->url[0];
            }elseif (file_exists(__DIR__ . '/../controllers/' . $this->url[0] . '.php')) {
                // Set the controller
                $this->controller = $this->url[0];
            }
        }
		
		if($this->controller == FREELANCER_URL){
			require_once(__DIR__ . '/../controllers/freelancer.php');
		}
		elseif($this->controller == CLIENT_URL){
			require_once(__DIR__ . '/../controllers/client.php');
		}
		elseif($this->controller == FREELANCERS_URL){
			require_once(__DIR__ . '/../controllers/sellers.php');
		}
		elseif($this->controller == CLIENTS_URL){
			require_once(__DIR__ . '/../controllers/buyers.php');
		}else{
			require_once(__DIR__ . '/../controllers/' . $this->controller . '.php');
		}

        /**
         * The namespace\class must be defined in a string as it can't be called shorted using new namespace\$var
         */
		
		if($this->controller == FREELANCER_URL){
			$re = "Freelancer";
			$class = 'Fir\Controllers\\' . $re;
		}
		elseif($this->controller == CLIENT_URL){
			$re = "Client";
			$class = 'Fir\Controllers\\' . $re;
		}
		elseif($this->controller == FREELANCERS_URL){
			$re = "Sellers";
			$class = 'Fir\Controllers\\' . $re;
		}
		elseif($this->controller == CLIENTS_URL){
			$re = "Buyers";
			$class = 'Fir\Controllers\\' . $re;
		}else{
			$class = 'Fir\Controllers\\' . $this->controller;
		}

        $this->controller = new $class($this->db, $this->url);

        // Check if a second parameter exists in the URL
        // If so, check if the method exists
        if (isset($this->url[1])) {
            if (method_exists($this->controller, $this->url[1])) {
                $this->method = $this->url[1];
            }
        }

        // Call the method from the controller and pass the params
        $data = call_user_func_array([$this->controller, $this->method], $this->url);

        $this->controller->run($data);

    }

    /**
     * Load Dependencies
     */
    private function loadStripe()
    {
        if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
            require_once(__DIR__ . '/../../vendor/autoload.php');
        }
    }

    /**
     * Load Dependencies
     */
    private function loadDependencies()
    {
        if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
            require_once(__DIR__ . '/../../vendor/autoload.php');
        }
    }

    /**
     * Load Libraries
     */
    private function loadLibraries()
    {
        // Autoload any needed library
        spl_autoload_register(function ($class) {
            // Explode the class namespace and select only the class name
            $className = explode('\\', $class);
            if (file_exists(__DIR__ . '/../libraries/' . end($className) . '.php')) {
                require_once(__DIR__ . '/../libraries/' . end($className) . '.php');
            }
        });
    }

    /**
     * Load Helpers
     */
    private function loadHelpers()
    {
        if ($handle = opendir(__DIR__ . '/../helpers/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != '.' && $entry != '..' && substr($entry, -4, 4) == '.php') {
                    require_once(__DIR__ . '/../helpers/' . $entry);
                }
            }
            closedir($handle);
        }
    }

    /**
     * Parse and set the GET parameters sent by the user
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $this->url = explode('/', rtrim($_GET['url'], '/'));
        }
    }
}