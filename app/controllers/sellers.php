<?php

namespace Fir\Controllers;

class Sellers extends Controller
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
		
		/*Use Category Model*/
        $categoryModel = $this->model('Category');
		$data['categories'] = $categoryModel->details();
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		$data['c_freelancers'] = $userModel->c_freelancers();
		$data['c_clients'] = $userModel->c_clients();
		
		
		
		if(!isset($this->url[1])){
			$pg = 1;
		}elseif(is_numeric($this->url[1])){
			$pg = $this->url[1];
		}elseif(isset($this->url[1]) && $this->url[1] == 'portfolio') {	
		
			$has = $userModel->has($this->url[2]);

            // If exists
            if($has === true) {
				
				$slug = $userModel->slug($this->url[3]);

				// If exists
				if($slug === true) {
					
					$data['user'] = $userModel->get($this->url[2]);
		
					$data['total_portfolio'] = $userModel->total_portfolio($this->url[2]);
					$data['total_projects'] = $userModel->total_projects($this->url[2]);
					$data['total_ratings'] = $userModel->total_ratings($this->url[2]);
					
					$data['has_portfolio'] = $userModel->f_hasPortfolio($this->url[2]);
					$data['freelancer_portfolio'] = $userModel->freelancer_portfolio($this->url[2]);
					$data['is_divisible_by_3'] = $this->is_divisible_by_3($userModel->total_portfolio($this->url[2]));
					
					return ['content' => $this->view->render($data, 'home/freelancer_portfolio')];
				}else {
					redirect(FREELANCERS_URL);
				}
			}else {
                redirect(FREELANCERS_URL);
            }
        }elseif(isset($this->url[1]) && $this->url[1] == 'about') {	
		
			$has = $userModel->has($this->url[2]);

            // If exists
            if($has === true) {
				
				$slug = $userModel->slug($this->url[3]);

				// If exists
				if($slug === true) {
					
					$data['user'] = $userModel->get($this->url[2]);
		
					$data['total_portfolio'] = $userModel->total_portfolio($this->url[2]);
					$data['total_projects'] = $userModel->total_projects($this->url[2]);
					$data['total_ratings'] = $userModel->total_ratings($this->url[2]);
		
					/*Use About Model*/
					$aboutModel = $this->model('About');
					$data['hasWorkExperience'] = $aboutModel->hasWorkExperience($data['user']['userid']);
					$data['WorkExperience'] = $aboutModel->getWorkExperience($data['user']['userid']);
					$data['hasEducation'] = $aboutModel->hasEducation($data['user']['userid']);
					$data['education'] = $aboutModel->getEducation($data['user']['userid']);
					
					return ['content' => $this->view->render($data, 'home/freelancer_about')];
				}else {
					redirect(FREELANCERS_URL);
				}
			}else {
                redirect(FREELANCERS_URL);
            }
			
        }elseif(isset($this->url[1]) && $this->url[1] == 'projects') {	
		
			$has = $userModel->has($this->url[2]);

            // If exists
            if($has === true) {
				
				$slug = $userModel->slug($this->url[3]);

				// If exists
				if($slug === true) {
					
					$data['user'] = $userModel->get($this->url[2]);
		
					$data['total_portfolio'] = $userModel->total_portfolio($this->url[2]);
					$data['total_projects'] = $userModel->total_projects($this->url[2]);
					$data['total_ratings'] = $userModel->total_ratings($this->url[2]);
		
					/*get projects*/
					$data['has_projects'] = $userModel->f_hasProjects($this->url[2]);
					$data['freelancer_projects'] = $userModel->freelancer_projects($this->url[2]);
					$data['projects_timeago'] = $userModel->projects_timeago();
					$data['projects_proposals'] = $userModel->projects_proposals();
					
					return ['content' => $this->view->render($data, 'home/freelancer_projects')];
				}else {
					redirect(FREELANCERS_URL);
				}
			}else {
                redirect(FREELANCERS_URL);
            }
			
        }elseif(isset($this->url[1]) && $this->url[1] == 'ratings') {	
		
			$has = $userModel->has($this->url[2]);

            // If exists
            if($has === true) {
				
				$slug = $userModel->slug($this->url[3]);

				// If exists
				if($slug === true) {
					
					$data['user'] = $userModel->get($this->url[2]);
		
					$data['total_portfolio'] = $userModel->total_portfolio($this->url[2]);
					$data['total_projects'] = $userModel->total_projects($this->url[2]);
					$data['total_ratings'] = $userModel->total_ratings($this->url[2]);
		
					/*get projects*/
					$data['has_ratings'] = $userModel->f_hasRatings($this->url[2]);
					$data['freelancer_projects'] = $userModel->freelancer_complete($this->url[2]);
					$data['freelancer_ratings'] = $userModel->freelancer_ratings($this->url[2]);
					
					return ['content' => $this->view->render($data, 'home/freelancer_ratings')];
				}else {
					redirect(FREELANCERS_URL);
				}
			}else {
                redirect(FREELANCERS_URL);
            }
        }
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '12';
		$startpoint = ($page * $limit) - $limit;
        $data['has_freelancers'] = $userModel->hasFreelancers();
        $data['freelancers_pagination'] = $userModel->pagination($startpoint, $limit);
        $data['freelancers_ratings'] = $userModel->freelancers_ratings();
		$data['pagination'] = $this->Pagination($userModel->c_freelancers(), $limit, $page);
		$data['is_divisible_by_2'] = $this->is_divisible_by_2($userModel->c_freelancers());

        return ['content' => $this->view->render($data, 'home/freelancers')];
    }
	
	function Pagination($total, $per_page = 10,$page = 1, $url = URL_PATH.'/'.FREELANCERS_URL.'/'){  
			$total = $total;
			$adjacents = "2"; 

			$page = ($page == 0 ? 1 : $page);  
			$start = ($page - 1) * $per_page;								
			
			$prev = $page - 1;							
			$next = $page + 1;
			$lastpage = ceil($total/$per_page);
			$lpm1 = $lastpage - 1;
			
			$pagination = "";
			if($lastpage > 1)
			{
				$pagination .= "<div class='paginationCommon blogPagination text-center'>
			 <nav aria-label='Page navigation'>
			  <ul class='pagination'>";
						$pagination .= "<li class='details'>Page $page of $lastpage</li>";
						
				if ($page > 1)
					$pagination.= "<li><a href='{$url}1'> <i class='fa  fa-angle-double-left'></i> </a></li>
								   <li><a href='{$url}$prev'> <i class='fa fa-angle-left'></i> </a></li>";
				else
					$pagination.= "<li class='disabled'><a href='#'><i class='fa fa-angle-left'></i> </a></li>";
				
				if ($lastpage < 7 + ($adjacents * 2))
				{	
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='active'><a>$counter</a></li>";
						else
							$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))
				{
					if($page < 1 + ($adjacents * 2))		
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<li class='active'><a>$counter</a></li>";
							else
								$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
						}
						$pagination.= "<li class='dot'>...</li>";
						$pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";		
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<li><a href='{$url}1'>1</a></li>";
						$pagination.= "<li><a href='{$url}2'>2</a></li>";
						$pagination.= "<li class='dot'>...</li>";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<li class='active'><a>$counter</a></li>";
							else
								$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
						}
						$pagination.= "<li class='dot'>..</li>";
						$pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";		
					}
					else
					{
						$pagination.= "<li><a href='{$url}1'>1</a></li>";
						$pagination.= "<li><a href='{$url}2'>2</a></li>";
						$pagination.= "<li class='dot'>..</li>";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<li class='active'><a>$counter</a></li>";
							else
								$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
						}
					}
				}
				
				if ($page < $counter - 1){ 
					$pagination.= "<li><a href='{$url}$next'><i class='fa fa-angle-right'></i></a></li>";
					$pagination.= "<li><a href='{$url}$lastpage'><i class='fa fa-angle-double-right'></i></a></li>";
				}else{
					$pagination.= "<li class='disabled'><a><i class='fa fa-angle-right'></i></a></li>";
					$pagination.= "<li class='disabled'><a><i class='fa fa-angle-double-right'></i></a></li>";
				}
				$pagination.= "</ul>\n</nav>\n</div>";		
			}
		
		
			return $pagination;
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