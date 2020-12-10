<?php

namespace Fir\Models;

class Theme extends Model {
			
    /**
     * Get the theme details requested
     *
     */
    public function get($name) {

		$query = $this->db->select("theme", "*", ["name" => $name]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Update the Theme(Boxplace)
     *
     */
    public function update($title, $sub_title, $project_search, $freelancer_search, $categories_title, $portfolio_title, $how_it_works_title, $customers_title, $join_us_title, $id) {

		$Update = $this->db->update('theme',[
		   'title' => $title,
		   'sub_title' => $sub_title,
		   'project_search' => $project_search,
		   'freelancer_search' => $freelancer_search,
		   'categories_title' => $categories_title,
		   'portfolio_title' => $portfolio_title,
		   'how_it_works_title' => $how_it_works_title,
		   'customers_title' => $customers_title,
		   'join_us_title' => $join_us_title,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Bg Image One
     *
     */
    public function changeImage($filename, $id) {

		$Update = $this->db->update('theme',[
		   'bg_image_one' => $filename
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Bg Image Two
     *
     */
    public function changeImageTwo($filename, $id) {

		$Update = $this->db->update('theme',[
		   'bg_image_two' => $filename
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	

	
/* ==========================================================================
   How it Works
   ========================================================================== */		
     /**
     * Get the user details requested
     *
     */
    public function how_it_works() {

		$query = $this->db->select("how_it_works", "*", []);	
		  
		return $query;  
    }
	
    public function add_how($title, $description, $image) {

			
	    $Insert = $this->db->insert('how_it_works', array(
		   'title' => $title,
		   'description' => $description,
		   'imagelocation' => $image
		));	
		  
		return $Insert->rowCount();  
    }	
    public function has_how($id) {

		$has = $this->db->has("how_it_works", ["id" => $id]);		
		  
		return $has;  
    }
    public function get_how($id) {

		$query = $this->db->select("how_it_works", "*", ["id" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
    public function update_how($title, $description, $filename, $id) {

		$Update = $this->db->update('how_it_works',[
		   'title' => $title,
		   'description' => $description,
		   'imagelocation' => $filename,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
/* ==========================================================================
   Customers
   ========================================================================== */	
    public function customers() {

		$query = $this->db->select("customers", "*", []);	
		  
		return $query;  
    }
	
    public function add_customer($name, $title, $quote, $image) {

			
	    $Insert = $this->db->insert('customers', array(
		   'name' => $name,
		   'title' => $title,
		   'quote' => $quote,
		   'imagelocation' => $image
		));	
		  
		return $Insert->rowCount();  
    }	
    public function has_customer($id) {

		$has = $this->db->has("customers", ["id" => $id]);		
		  
		return $has;  
    }
    public function get_customer($id) {

		$query = $this->db->select("customers", "*", ["id" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
    public function update_customer($name, $title, $quote, $filename, $id) {

		$Update = $this->db->update('customers',[
		   'name' => $name,
		   'title' => $title,
		   'quote' => $quote,
		   'imagelocation' => $filename,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
/* ==========================================================================
   Team
   ========================================================================== */	
    public function team() {

		$query = $this->db->select("team", "*", []);	
		  
		return $query;  
    }
	
    public function add_team($name, $title, $facebook, $twitter, $instagram, $image) {

			
	    $Insert = $this->db->insert('team', array(
		   'name' => $name,
		   'title' => $title,
		   'facebook' => $facebook,
		   'twitter' => $twitter,
		   'instagram' => $instagram,
		   'imagelocation' => $image
		));	
		  
		return $Insert->rowCount();  
    }	
    public function has_team($id) {

		$has = $this->db->has("team", ["id" => $id]);		
		  
		return $has;  
    }
    public function get_team($id) {

		$query = $this->db->select("team", "*", ["id" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
    public function update_team($name, $title, $facebook, $twitter, $instagram, $filename, $id) {

		$Update = $this->db->update('team',[
		   'name' => $name,
		   'title' => $title,
		   'facebook' => $facebook,
		   'twitter' => $twitter,
		   'instagram' => $instagram,
		   'imagelocation' => $filename,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }	
	

/* ==========================================================================
   About
   ========================================================================== */
    public function update_about($title, $description, $company, $filename) {

		$Update = $this->db->update('settings',[
		   'about_title' => $title,
		   'about_description' => $description,
		   'about_company' => $company,
		   'about_image' => $filename,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }	
	
	
}