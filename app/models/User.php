<?php

namespace Fir\Models;

class User extends Model {
		
    /**
     * Add User
     *
     */
    public function add($userid, $name, $slug, $email, $password, $user_type) {

		$filename = "default.png";
		$bg = "wave.jpg";
		
	    $Insert = $this->db->insert('user', array(
	   'userid' => $userid,
	   'password' => $password,
	   'name' => $name,
	   'slug' => $slug,
	   'email' => $email,
	   'imagelocation' => $filename,
	   'bg_imagelocation' => $bg,
	   'joined' => date('Y-m-d H:i:s'),
	   'user_type' => $user_type
		));	
		  
		return $Insert->rowCount();  
    }
	
    /**
     * Update
     *
     */
    public function update_user($name, $slug, $email, $user_type, $id) {

		$Update = $this->db->update('user',[
		   'name' => $name,
		   'slug' => $slug,
		   'email' => $email,
		   'user_type' => $user_type,
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Gets User details
     *
     * @return    array
     */
    public function details()
    {
		
        $query = $this->db->select('user', '*', ["ORDER" =>["joined" => "DESC"]]);

        return $query;
    }
	
    /**
     * Check if the user is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("user", ["userid" => $id]);		
		  
		return $has;  
    }
	
    /**
     * Check if the user with defined slug is available in the db
     *
     */
    public function slug($id) {

		$has = $this->db->has("user", ["slug" => $id]);		
		  
		return $has;  
    }
	
    /**
     * Check if the a user with the same Email is available in the db
     *
     */
    public function hasEmail($email) {

		$has = $this->db->has("user", ["email" => $email]);		
		  
		return $has;  
    }
	
    /**
     * Check if the a user with the Token is available in the db
     *
     */
    public function hasToken($token) {

		$has = $this->db->has("user", ["tokencode" => $token]);		
		  
		return $has;  
    }
	
    /**
     * Check if the a user with the Token is available in the db
     *
     */
    public function hasRegisterToken($token) {

		$has = $this->db->has("user", ["registercode" => $token]);		
		  
		return $has;  
    }
	
    /**
     * Get the user details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("user", "*", ["userid" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Get the user details requested
     *
     */
    public function getEmail($email) {

		$query = $this->db->select("user", "*", ["email" => $email]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Get the user details requested
     *
     */
    public function getwithToken($token) {

		$query = $this->db->select("user", "*", ["tokencode" => $token]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Get the user details requested
     *
     */
    public function getwithRegisterToken($token) {

		$query = $this->db->select("user", "*", ["registercode" => $token]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
	
	
	
    /**
     * Update the Freelancer
     *
     */
    public function updateFreelancer($name, $slug, $title, $email, $country, $choice1, $choice2, $about, $id) {

		$Update = $this->db->update('user',[
		   'name' => $name,
		   'slug' => $slug,
		   'title' => $title,
		   'email' => $email,
		   'country' => $country,
		   'categories' => $choice1,
		   'skills' => $choice2,
		   'about' => $about,
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Image
     *
     */
    public function freelancerImage($filename, $id) {

		$Update = $this->db->update('user',[
		   'imagelocation' => $filename
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Bg Image
     *
     */
    public function freelancerBgImage($filename, $id) {

		$Update = $this->db->update('user',[
		   'bg_imagelocation' => $filename
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }



	
	
    /**
     * Update the Client
     *
     */
    public function updateClient($name, $slug, $title, $email, $country, $website, $id) {

		$Update = $this->db->update('user',[
		   'name' => $name,
		   'slug' => $slug,
		   'title' => $title,
		   'email' => $email,
		   'country' => $country,
		   'website' => $website,
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }

	
	

	
    /**
     * Update password
     *
     */
    public function password($password, $id) {

		$Update = $this->db->update('user',[
		   'password' => $password,
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }	
	
    /**
     * Update Request
     *
     */
    public function updateRequest($id) {

		$Update = $this->db->update('user',[
		   'verified' => 3,
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }	
	
    /**
     * Update Email Notifications
     *
     */
    public function updateEmail($email, $id) {

		$Update = $this->db->update('user',[
		   'email_settings' => $email,
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }	
	
	
	
	
    /**
     * Update token
     *
     */
    public function token($id, $token) {

		$Update = $this->db->update('user',[
		   'tokencode' => $token,
		],[
		   'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Verify Email
     *
     */
    public function verifyEmail($no, $token, $id) {

		$Update = $this->db->update('user',[
		   'verified' => $no,
		   'registercode' => $token,
		],[
		   'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update Verify
     *
     */
    public function updateVerify($id) {

		$Update = $this->db->update('user',[
		   'verified' => '1',
		   'registercode' => '',
		],[
		   'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update password
     *
     */
    public function updatePassword($password, $id) {

		$Update = $this->db->update('user',[
		   'password' => $password,
		   'tokencode' => '',
		],[
		   'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Image
     *
     */
    public function changeImage($filename, $id) {

		$Update = $this->db->update('user',[
		   'imagelocation' => $filename
		],[
		    'userid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Count Freelancers
     *
     */
    public function c_freelancers() {

		$query = $this->db->count("user", ["user_type" => 1]);			
		  
		return $query;    
    }
	
    /**
     * Count Clients
     *
     */
    public function c_clients() {

		$query = $this->db->count("user", ["user_type" => 2]);			
		  
		return $query;    
    }
	
    /**
     * Count Users
     *
     */
    public function vusers() {

		$query = $this->db->count("user", ["verified" => 1]);			
		  
		return $query;    
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/**
 * Home - Freelancers
 *
 */	
	
	
    /**
     * Check if the freelancers is available in the db
     *
     */
    public function hasFreelancers() {

		$has = $this->db->has("user", ["AND" =>["user_type" => 1]]);		
		  
		return $has;  
    }	
	
    /**
     * Gets freelancers Pagination
     *
     * @return    array
     */
    public function pagination($startpoint, $limit)
    {
		
        $query = $this->db->select('user', '*', ["AND" =>["user_type" => 1], "ORDER" =>["joined" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }
	
    /**
     * Gets freelancers Pagination
     *
     * @return    array
     */
    public function search()
    {
		
        $query = $this->db->select('user', '*', ["AND" =>["user_type" => 1], "ORDER" =>["joined" => "DESC"]]);

        return $query;
    }
    /**
     * Count Searched Freelancers
     *
     */
    public function c_search_freelancers($search) {
		
		$no = 0;

		$query = $this->db->select("user", "*", ["AND" =>["user_type" => 1]]);	
        foreach($query as $row){
				
			$arc=explode(',',$row["categories"]);
			foreach ($arc as $k => $v) {
			 if($search == $v) {    
			 $no++;
			 }
            }	
        }		
		  
		return $no;    
    }
	
    /**
     * Get ratings for each freelancer
     *
     */
    public function freelancers_ratings() {
		
		$total = array(); 

		$query = $this->db->select("user", "*", ["AND" =>["user_type" => 1]]);	
        foreach($query as $row){
			
			
			$total_number = $this->db->count("ratings", ["AND" => ["user_receiving" => $row["userid"]]]);
			if($total_number == 0):
			   $total_value = 0;
			else:
		      $total_ratings = $this->db->sum("ratings", "rate", ["AND" => ["user_receiving" => $row["userid"]]]);
			  $total_value = $total_ratings / $total_number;
			  $total_value = number_format($total_value, 1);
			endif;			
		
			$total[$row["userid"]] = [$this->ratings($total_value), $total_value];
			
		}		
		
		return $total;  
    }	
	
	
	
	
	
/**
 * Home - Freelancer - Portfolio
 *
 */		
	
	
    /**
     * Check if the portfolio is available in the db
     *
     */
    public function f_hasPortfolio($id) {

		$has = $this->db->has("portfolio", ["userid" => $id]);		
		  
		return $has;  
    }	
	
    /**
     * Gets Portfolio
     *
     * @return    array
     */
    public function freelancer_portfolio($id)
    {
		
        $query = $this->db->select('portfolio', '*', ["AND" => ["userid" => $id],"ORDER" =>["date_added" => "DESC"]]);

        return $query;
    }
	
    /**
     * Gets Total number of portfolio
     *
     * @return    array
     */
    public function total_portfolio($id)
    {
		
        $query = $this->db->count('portfolio', ["AND" => ["userid" => $id]]);

        return $query;
    }	
	
	
	
/**
 * Home - Freelancer - Projects
 *
 */		
	
	
    /**
     * Check if the projects is available in the db
     *
     */
    public function f_hasProjects($id) {

		$has = $this->db->has("projects", ["freelancerid" => $id]);		
		  
		return $has;  
    }	
	
    /**
     * Gets projects
     *
     * @return    array
     */
    public function freelancer_projects($id)
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["freelancerid" => $id, "closed" => 1],"ORDER" =>["date_added" => "DESC"]]);

        return $query;
    }
	
    /**
     * Gets Total number of projects
     *
     * @return    array
     */
    public function total_projects($id)
    {
		
        $query = $this->db->count('projects', ["AND" => ["freelancerid" => $id, "closed" => 1]]);

        return $query;
    }

    /**
     *
     * Time ago
     */
    public function projects_timeago()
    {
		$names_skills = array(); 
		
        $query = $this->db->select('projects', '*', ["AND" =>["closed" => 1], "ORDER" => ["date_added" => "DESC"]]);
		 foreach($query as $row) {
			$timeago = $this->ago(strtotime($row["date_added"])); 
			 
			$names_skills[$row["projectid"]] = $timeago;
		 }	

        return $names_skills;
    }	
	
    /**
     * Count of proposals for each project
     *
     */
    public function projects_proposals() {
		
		$total = array(); 

		$query = $this->db->select("projects", "*", ["AND" =>["closed" => 1]]);	
        foreach($query as $row){
		
			$total[$row["projectid"]] = $this->db->count("proposals", ["AND" => ["projectid" => $row["projectid"]]]);
			
		}		
		
		return $total;  
    }
	
	
	
	
	
	
	
	
/**
 * Home - Freelancer - Ratings
 *
 */		
	
	
    /**
     * Check if the ratings is available in the db
     *
     */
    public function f_hasRatings($id) {

		$has = $this->db->has("ratings", [	
		   "OR" => [
				"AND #first" => [
					"user_sending" => $id
				],
				"AND #second" => [
					"user_receiving" => $id
				]
			]]);		
		  
		return $has;  
    }	
	
    /**
     * Gets Total number of ratings
     *
     * @return    array
     */
    public function total_ratings($id)
    {
		
        $query = $this->db->count('ratings', [	
		   "OR" => [
				"AND #first" => [
					"user_sending" => $id
				],
				"AND #second" => [
					"user_receiving" => $id
				]
			]]);

        return $query;
    }
	
    /**
     * Gets projects
     *
     * @return    array
     */
    public function freelancer_complete($id)
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["freelancerid" => $id, "closed" => 1, "complete" => 1],"ORDER" =>["date_added" => "DESC"]]);

        return $query;
    }	
	
    /**
     * Get ratings for each project complete
     *
     */
    public function freelancer_ratings($id) {
		
		$total = array(); 

		$query = $this->db->select("projects", "*", ["AND" => ["freelancerid" => $id, "closed" => 1, "complete" => 1]]);	
        foreach($query as $row){
			
			$q1 = $this->db->select("ratings", "*", ["projectid" => $row["projectid"]]);	
			foreach($q1 as $r1){
				
				$timeago = $this->ago(strtotime($r1["date_added"])); 
				
				$total[$r1["projectid"]][] = [$this->ratings($r1['rate']), $r1['user_sending'], $r1['rate'], $r1['description'], $timeago];
				
			}	
		}	
		
		return $total;  
    }	
	//0757 558907
	//0703 990705
	





		
	
	
/**
 * Home - Client - Projects
 *
 */		
	
	
    /**
     * Check if the projects is available in the db
     *
     */
    public function c_hasProjects($id) {

		$has = $this->db->has("projects", ["userid" => $id]);		
		  
		return $has;  
    }	
	
    /**
     * Gets projects
     *
     * @return    array
     */
    public function client_projects($id)
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["userid" => $id],"ORDER" =>["date_added" => "DESC"]]);

        return $query;
    }
	
    /**
     * Gets Total number of projects
     *
     * @return    array
     */
    public function c_total_projects($id)
    {
		
        $query = $this->db->count('projects', ["AND" => ["userid" => $id]]);

        return $query;
    }
	


	
	
	
	
	
/**
 * Home - Client - Ratings
 *
 */		
	
    /**
     * Gets projects
     *
     * @return    array
     */
    public function client_complete($id)
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["userid" => $id, "closed" => 1, "complete" => 1],"ORDER" =>["date_added" => "DESC"]]);

        return $query;
    }	
	
    /**
     * Get ratings for each project complete
     *
     */
    public function client_ratings($id) {
		
		$total = array(); 

		$query = $this->db->select("projects", "*", ["AND" => ["userid" => $id, "closed" => 1, "complete" => 1]]);	
        foreach($query as $row){
			
			$q1 = $this->db->select("ratings", "*", ["projectid" => $row["projectid"]]);	
			foreach($q1 as $r1){
				
				$timeago = $this->ago(strtotime($r1["date_added"])); 
				
				$total[$r1["projectid"]][] = [$this->ratings($r1['rate']), $r1['user_sending'], $r1['rate'], $r1['description'], $timeago];
				
			}	
		}	
		
		return $total;  
    }		
	
	
	
	//Ratings
	function ratings($star){
		
		$name = '';
		$array_one = [1,1.1,1.2,1.3,1.4,1.5,1.6,1.7,1.8,1.9];
		$array_two = [2,2.1,2.2,2.3,2.4,2.5,2.6,2.7,2.8,2.9];
		$array_three = [3,3.1,3.2,3.3,3.4,3.5,3.6,3.7,3.8,3.9];
		$array_four = [4,4.1,4.2,4.3,4.4,4.5,4.6,4.7,4.8,4.9];
		$array_five = [5,5.1,5.2,5.3,5.4,5.5,5.6,5.7,5.8,5.9];
		
	  if($star == '0'):
		 $name .='
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
				';   
		
	  elseif(in_array( $star ,$array_one )):
		 $name .='
					 <span class="star"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
				';   
	  elseif(in_array( $star ,$array_two )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 '; 
	  elseif(in_array( $star ,$array_three )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 '; 
	  elseif(in_array( $star ,$array_four )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star empty"></span>
					 '; 
	  elseif(in_array( $star ,$array_five )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 '; 
	  endif;	  
	  
								

	  
	  $full = $name;	  	
	  
	  return $full;
		
	}

	
	//Time Ago
	function ago($i){
		$m = time()-$i; $o='just now';
		$t = array('year'=>31556926,'month'=>2629744,'week'=>604800, 'day'=>86400,'hour'=>3600,'minute'=>60,'second'=>1);
		foreach($t as $u=>$s){
			if($s<=$m){$v=floor($m/$s); $o="$v $u".($v==1?'':'s').' ago'; break;}
		}
		return $o;
	}	
	
}