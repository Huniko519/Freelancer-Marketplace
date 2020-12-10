<?php

namespace Fir\Models;

class About extends Model {

    /**
     * Add Author
     *
     */
    public function add($year, $company, $title, $description, $type, $userid) {

			
	    $Insert = $this->db->insert('about_info', array(
		   'userid' => $userid,
		   'year' => $year,
		   'company' => $company,
		   'title' => $title,
		   'description' => $description,
		   'type' => $type
		));	
		  
		return $Insert->rowCount();  
    }
	
    /**
     * Check if the work experience is available in the db
     *
     */
    public function hasWorkExperience($id) {

		$has = $this->db->has("about_info", ["AND" =>["userid" => $id, "type" => 1]]);		
		  
		return $has;  
    }
	
    /**
     * Get the work experience details requested
     *
     */
    public function getWorkExperience($id) {

		$query = $this->db->select("about_info", "*", ["AND" =>["userid" => $id, "type" => 1], "ORDER" => ["id" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     * Check if the work experience is available in the db
     *
     */
    public function hasWork($id, $userid) {

		$has = $this->db->has("about_info", ["AND" =>["id" => $id, "userid" => $userid, "type" => 1]]);		
		  
		return $has;  
    }
	
    /**
     * Get the work experience details requested
     *
     */
    public function getWork($id) {

		$query = $this->db->select("about_info", "*", ["AND" =>["id" => $id, "type" => 1]]);		
        foreach($query as $row){}		
		  
		return $row;  	  
    }
	
    /**
     * Update the Author Update
     *
     */
    public function updateWorkExperience($year, $company, $title, $description, $type, $id) {

		$Update = $this->db->update('about_info',[
		   'year' => $year,
		   'company' => $company,
		   'title' => $title,
		   'description' => $description,
		   'type' => $type
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	

	


    /**
     * Add Education
     *
     */
    public function addEducation($year, $degree, $course, $description, $type, $userid) {

			
	    $Insert = $this->db->insert('about_info', array(
		   'userid' => $userid,
		   'year' => $year,
		   'company' => $degree,
		   'title' => $course,
		   'description' => $description,
		   'type' => $type
		));	
		  
		return $Insert->rowCount();  
    }
	
    /**
     * Check if the education is available in the db
     *
     */
    public function hasEducation($id) {

		$has = $this->db->has("about_info", ["AND" =>["userid" => $id, "type" => 2]]);		
		  
		return $has;  
    }
	
    /**
     * Get the education details requested
     *
     */
    public function getEducation($id) {

		$query = $this->db->select("about_info", "*", ["AND" =>["userid" => $id, "type" => 2], "ORDER" => ["id" => "DESC"]]);		
		  
		return $query;  
    }	
	
    /**
     * Check if the work experience is available in the db
     *
     */
    public function hasEducationNo($id, $userid) {

		$has = $this->db->has("about_info", ["AND" =>["id" => $id, "userid" => $userid, "type" => 2]]);		
		  
		return $has;  
    }
	
    /**
     * Get the work experience details requested
     *
     */
    public function getEducationNo($id) {

		$query = $this->db->select("about_info", "*", ["AND" =>["id" => $id, "type" => 2]]);		
        foreach($query as $row){}		
		  
		return $row;  	  
    }
	
    /**
     * Update the Education
     *
     */
    public function updateEducation($year, $company, $title, $description, $type, $id) {

		$Update = $this->db->update('about_info',[
		   'year' => $year,
		   'company' => $company,
		   'title' => $title,
		   'description' => $description,
		   'type' => $type
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
	
}