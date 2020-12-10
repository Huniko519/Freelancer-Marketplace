<?php

namespace Fir\Controllers;

class Home extends Controller
{
    /**
     * This would be your http://localhost/project-name/ index page
     *
     * @return array
     */
    protected $admin;
	
    public function index()
    {
        if (isset($this->url[0]) && $this->url[0] == 'lang') {
            $this->updateLanguage($this->url[1]);
        }

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];

		/*Use User Library*/
        $user = $this->library('User');
		$data['user_isloggedin'] = $user->isLoggedIn();
		
		/*Use Category Model*/
        $categoryModel = $this->model('Category');
		$data['categories'] = $categoryModel->details();
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		$data['c_freelancers'] = $userModel->c_freelancers();
		$data['c_clients'] = $userModel->c_clients();
		
		/*Use Project Model*/
        $projectModel = $this->model('Project');
		$data['c_posted_projects'] = $projectModel->c_posted_projects();
		$data['c_completed_projects'] = $projectModel->c_completed_projects();
		
		
		
		/*Use Project Model*/
        $portfolioModel = $this->model('Portfolio');
		$limit = '10';
        $data['portfolio_pagination'] = $portfolioModel->pagination($limit);
		
		/*Use Home Model*/
        $homeModel = $this->model('Home');
		$data['home_categories'] = $homeModel->details();
		$data['is_divisible_by_4'] = $this->is_divisible_by_4('10') ? true : false;
		$data['how_sections'] = $homeModel->how_sections();
		$data['is_divisible_by_3'] = $this->is_divisible_by_3($homeModel->how_total());
		$data['customers'] = $homeModel->customers();

        return ['content' => $this->view->render($data, 'home/home')];
    }
	
	
	

    /**
     * @param $language string
     */
    private function updateLanguage($language)
    {
        setcookie('lang', $language, time() + (10 * 365 * 24 * 60 * 60), COOKIE_PATH);
        redirect();
    }
	
	function is_divisible_by_4($str) 
	{ 
		$n = strlen($str); 
	  
		// Empty string 
		if ($n == 0) 
			return false; 
	  
		// If there is single digit 
		if ($n == 1) 
			return (($str[0] - '0') % 4 == 0); 
	  
		// If number formed by  
		// last two digits is 
		// divisible by 4. 
		$last = $str[$n - 1] - '0'; 
		$second_last = $str[$n - 2] - '0'; 
		return (($second_last * 10 + $last) % 4 == 0); 
	} 	
	
	function is_divisible_by_3($n){
	  $digits = str_split($n);
	  $total = 0;
	  foreach ($digits as $digit) {
		$total += $digit;
	  }
	  if ($total == 3 || ($total % 3 == 0) ){
		return true;
	  }
	  return false;
	}
	function is_divisible_by_2($number){ 
		if($number % 2 == 0){ 
			return true;  
		} 
		else{ 
			return false; 
		} 
	}
}