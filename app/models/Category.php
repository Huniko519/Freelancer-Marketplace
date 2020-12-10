<?php

namespace Fir\Models;

class Category extends Model {
		
    /**
     * Add Category
     *
     */
    public function add($name, $filename) {
		

	   //Insert
	   $Insert = $this->db->insert('category', array(
		   'name' => $name,
		   'imagelocation' => $filename,
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
		
        $query = $this->db->select('category', '*', []);

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
	

	
}