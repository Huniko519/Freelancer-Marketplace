<?php

namespace Fir\Models;

class Home extends Model {
	
    /**
     * Gets details
     *
     * @return    array
     */
    public function details()
    {
		
        $query = $this->db->select('category', '*', ["LIMIT" => 10]);
		
		/*$query = $this->db->select("category", [
				"[>]projects" => ["name" => "category"],
			], "*", [
				"AND" => [
					"projects.complete" => "0",
					"projects.closed" => "0",
				], "LIMIT" => 10
			]
		); */		

        return $query;
    }
	
    /**
     * Check if the user is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("category", ["id" => $id]);		
		  
		return $has;  
    }
	
    /**
     * Get the details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("category", "*", ["id" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Update 
     *
     */
    public function update($name, $filename, $id) {

		$Update = $this->db->update('category',[
		   'name' => $name,
		   'imagelocation' => $filename,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Gets Category array
     *
     * @return    array
     */
    public function getarray()
    {
		
        $query = $this->db->select('category', '*', []);
		 foreach($query as $row) {
			$names_skills[] = $row["name"];
		 }	

        return $names_skills;
    }
	
    public function total()
    {
		
        $query = $this->db->count('category', []);

        return $query;
    }
	


/* ==========================================================================
   How it Works
   ========================================================================== */	
    public function how_sections()
    {
		
        $query = $this->db->select('how_it_works', '*', []);	

        return $query;
    }
	
    public function how_total()
    {
		
        $query = $this->db->count('how_it_works', []);

        return $query;
    }	

/* ==========================================================================
   Customers
   ========================================================================== */	
    public function customers()
    {
		
        $query = $this->db->select('customers', '*', []);	

        return $query;
    }	

/* ==========================================================================
   About
   ========================================================================== */	
    public function about()
    {
		
        $query = $this->db->select('settings', '*', ["id" => 1]);	
        foreach ($query as $row) {}

        return $row;
    }

/* ==========================================================================
   Team
   ========================================================================== */	
    public function team()
    {
		
        $query = $this->db->select('team', '*', []);	

        return $query;
    }	
    public function team_total()
    {
		
        $query = $this->db->count('team', []);

        return $query;
    }	
	
}