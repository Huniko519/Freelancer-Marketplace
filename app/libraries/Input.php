<?php

namespace Fir\Libraries;

class Input {
	
	public static function exists($type = 'post')
	{
	 switch ($type) {
		 case 'post':
			 return (!empty($_POST)) ? true : false;
			 break;
		 case 'get':
			 return (!empty($_GET)) ? true : false;
			 break;
		 
		 default:
			  return false;
			 break;
	 }	
		
	}
	
	public static function get($item)
	{
	 if (isset($_POST[$item])) {
		 return $_POST[$item];
	 } else if(isset($_GET[$item])) {
		return $_GET[$item]; 
	 }
	 return '';	
	}	

    /**
     * Returns the value of a given parameter
     *
     * @param   string  $param  The parameter to get the value for
     * @return  string | bool
     */
    public static function param($param) {
        if(isset($_GET['url'])) {
            $url = explode('/', rtrim($_GET['url'], '/'));

            // Get the parameter id
            $pId = array_search($param, $url);

            // If the parameter id is found
            if($pId !== false) {
                // Return the parameter's value
                if(isset($url[$pId+1])) {
                    return $url[$pId+1];
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}