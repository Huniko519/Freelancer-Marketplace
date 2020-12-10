<?php

namespace Fir\Models;

class Portfolio extends Model {

    /**
     * Add Portfolio
     *
     */
    public function add($description, $filename, $userid) {

			
	    $Insert = $this->db->insert('portfolio', array(
		   'userid' => $userid,
		   'description' => $description,
		   'imagelocation' => $filename,
		   'date_added' => date('Y-m-d H:i:s')
		));	
		  
		return $Insert->rowCount();  
    }
	
    /**
     * Check if the portfolio is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("portfolio", ["AND" =>["userid" => $id]]);		
		  
		return $has;  
    }
	
    /**
     * Get the portfolio details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("portfolio", "*", ["AND" =>["userid" => $id], "ORDER" => ["id" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     * Count portfolio
     *
     */
    public function countPortfolio($id) {

		$query = $this->db->count("portfolio", ["userid" => $id]);		
		  
		return $query;  
    }
	
    /**
     * Check if the portfolio is available in the db
     *
     */
    public function hasPortfolio($id, $userid) {

		$has = $this->db->has("portfolio", ["AND" =>["id" => $id, "userid" => $userid]]);		
		  
		return $has;  
    }
	
    /**
     * Get the portfolio details requested
     *
     */
    public function getPortfolio($id) {

		$query = $this->db->select("portfolio", "*", ["AND" =>["id" => $id]]);		
        foreach($query as $row){}		
		  
		return $row;  	  
    }
	
    /**
     * Update the Portfolio
     *
     */
    public function update($description, $filename, $id) {

		$Update = $this->db->update('portfolio',[
		   'description' => $description,
		   'imagelocation' => $filename
		],[
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
	
	
	
	
	
    /**
     * Check if the portfolio is available in the db
     *
     */
    public function hasPortfolios() {

		$has = $this->db->has("portfolio", []);		
		  
		return $has;  
    }
	
    /**
     * Gets Portfolio Pagination
     *
     * @return    array
     */
    public function pagination($limit)
    {
		
        $query = $this->db->select('portfolio', '*', ["ORDER" =>["date_added" => "DESC"], "LIMIT" => $limit]);

        return $query;
    }
	
    /**
     * Gets Total number of portfolio
     *
     * @return    array
     */
    public function total()
    {
		
        $query = $this->db->count('portfolio', []);

        return $query;
    }	
	
    /**
     *
     * Time ago
     */
    public function timeago()
    {
		$names_skills = array(); 
		
        $query = $this->db->select('portfolio', '*', ["ORDER" => ["date_added" => "DESC"]]);
		 foreach($query as $row) {
			$timeago = $this->ago(strtotime($row["date_added"])); 
			 
			$names_skills[$row["id"]] = $timeago;
		 }	

        return $names_skills;
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