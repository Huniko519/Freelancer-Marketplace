<?php

namespace Fir\Models;

class Proposal extends Model {

    /**
     * Add Proposal
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
     * Check if the proposal is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("proposals", ["AND" =>["freelancerid" => $id]]);		
		  
		return $has;  
    }
	
    /**
     * Get the proposal details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("proposals", "*", ["AND" =>["freelancerid" => $id], "ORDER" => ["id" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     * Get the projects details requested
     *
     */
    public function getProjects() {

		$query = $this->db->select("projects", "*", []);		
		  
		return $query;  
    }	
	
    /**
     * Check if the project is available in the db
     *
     */
    public function hasProject($id) {

		$has = $this->db->has("projects", ["AND" =>["projectid" => $id, "closed" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Get the users
     *
     */
    public function getUsers() {

		$query = $this->db->select("user", "*", ["user_type" => 2]);		
		  
		return $query;  
    }
	
    /**
     * Get the project details requested
     *
     */
    public function getProject($id) {

		$query = $this->db->select("projects", "*", ["projectid" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }	
	
    /**
     * Get the client details requested
     *
     */
    public function getUser($id) {

		$query = $this->db->select("user", "*", ["userid" => $id]);
        foreach($query as $row){}		
		  
		return $row;
    }	
	

	

	
}