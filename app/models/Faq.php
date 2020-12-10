<?php

namespace Fir\Models;

class Faq extends Model {
		
    /**
     * Add User
     *
     */
    public function add($question, $answer) {
		

	   //Insert
	   $Insert = $this->db->insert('faq', array(
		   'question' => $question,
		   'answer' => $answer,
		   'date_added' => date('Y-m-d H:i:s')
		));	
			
		  
		return $Insert->rowCount();   
    }
	
    /**
     * Gets faq details
     *
     * @return    array
     */
    public function details()
    {
		
        $query = $this->db->select('faq', '*', ["ORDER" =>["date_added" => "DESC"]]);

        return $query;
    }	
    /**
     * Gets faq details
     *
     * @return    array
     */
    public function order()
    {
		
        $query = $this->db->select('faq', '*', ["ORDER" =>["date_added" => "ASC"]]);

        return $query;
    }
	
    /**
     * Check if the user is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("faq", ["id" => $id]);		
		  
		return $has;  
    }
	
    /**
     * Get the details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("faq", "*", ["id" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Update 
     *
     */
    public function update($question, $answer, $id) {

		$Update = $this->db->update('faq',[
		   'question' => $question,
		   'answer' => $answer,
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	

	
}