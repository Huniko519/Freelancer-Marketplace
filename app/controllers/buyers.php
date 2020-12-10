<?php

namespace Fir\Controllers;

class Buyers extends Controller
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
		
		
		
		if(isset($this->url[1]) && $this->url[1] == 'projects') {	
		
			$has = $userModel->has($this->url[2]);

            // If exists
            if($has === true) {
				
				$slug = $userModel->slug($this->url[3]);

				// If exists
				if($slug === true) {
					
					$data['user'] = $userModel->get($this->url[2]);
		
					$data['total_projects'] = $userModel->c_total_projects($this->url[2]);
					$data['total_ratings'] = $userModel->total_ratings($this->url[2]);
		
					/*get projects*/
					$data['has_projects'] = $userModel->c_hasProjects($this->url[2]);
					$data['client_projects'] = $userModel->client_projects($this->url[2]);
					$data['projects_timeago'] = $userModel->projects_timeago();
					$data['projects_proposals'] = $userModel->projects_proposals();
					
					return ['content' => $this->view->render($data, 'home/client_projects')];
				}else {
                redirect('home');
				}
			}else {
                redirect('home');
            }
			
        }elseif(isset($this->url[1]) && $this->url[1] == 'ratings') {	
		
			$has = $userModel->has($this->url[2]);

            // If exists
            if($has === true) {
				
				$slug = $userModel->slug($this->url[3]);

				// If exists
				if($slug === true) {
					
					$data['user'] = $userModel->get($this->url[2]);
		
					$data['total_projects'] = $userModel->c_total_projects($this->url[2]);
					$data['total_ratings'] = $userModel->total_ratings($this->url[2]);
		
					/*get projects*/
					$data['has_ratings'] = $userModel->f_hasRatings($this->url[2]);
					$data['client_projects'] = $userModel->client_complete($this->url[2]);
					$data['client_ratings'] = $userModel->client_ratings($this->url[2]);
					
					return ['content' => $this->view->render($data, 'home/client_ratings')];
				}else {
                redirect('home');
				}
			}else {
                redirect('home');
            }
        }else{
                redirect('home');
		}
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