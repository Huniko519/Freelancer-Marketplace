<?php

namespace Fir\Controllers;

class Search_Freelancers extends Controller
{
    /**
     * This would be your http://localhost/project-name/ index page
     *
     * @return array
     */
    protected $admin;
	
    public function index()
    {
		
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		if (!$input->exists()) {
			redirect('home');
		}
		
		if (empty($input->get('category'))) {
			redirect('home');
		}
		
		$search = $input->get('category');
		
		
		/* Use Product Model */
		$userModel = $this->model('User');
        $data['search_freelancers'] = $search;
		$data['c_search_freelancers'] = $userModel->c_search_freelancers($search);
		
        $data['has_freelancers'] = $userModel->hasFreelancers();
        $data['freelancers_pagination'] = $userModel->search();
        $data['freelancers_ratings'] = $userModel->freelancers_ratings();
		$data['is_divisible_by_2'] = $this->is_divisible_by_2($userModel->c_freelancers());
		

        return ['content' => $this->view->render($data, 'home/search_freelancers')];
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