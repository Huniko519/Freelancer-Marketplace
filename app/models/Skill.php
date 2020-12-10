<?php

namespace Fir\Models;

class Skill extends Model {
		
    /**
     * Add Skills
     *
     */
    public function add($name) {
		

	   //Insert
	   $Insert = $this->db->insert('skills', array(
		   'name' => $name,
		));	
			
		  
		return $Insert->rowCount();   
    }
	
    /**
     * Gets details
     *
     * @return    array
     */
    public function details()
    {
		
        $query = $this->db->select('skills', '*', []);

        return $query;
    }
	
    /**
     * Check if the user is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("skills", ["id" => $id]);		
		  
		return $has;  
    }
	
    /**
     * Get the details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("skills", "*", ["id" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Update 
     *
     */
    public function update($name, $id) {

		$Update = $this->db->update('skills',[
		   'name' => $name,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Gets Skills array
     *
     * @return    array
     */
    public function getarray()
    {
		
        $query = $this->db->select('skills', '*', []);
		 foreach($query as $row) {
			$names_skills[] = $row["name"];
		 }	

        return $names_skills;
    }
	

	
}