<?php

namespace Fir\Models;

class Project extends Model {

    /**
     * Add Project
     *
     */
    public function add($projectid, $userid, $title, $slug, $budget, $category, $skills, $description) {

			
	    $Insert = $this->db->insert('projects', array(
		   'projectid' => $projectid,
		   'userid' => $userid,
		   'title' => $title,
		   'slug' => $slug,
		   'budget' => $budget,
		   'category' => $category,
		   'skills' => $skills,
		   'description' => $description,
		   'date_added' => date('Y-m-d H:i:s')
		));	
		  
		return $Insert->rowCount();  
    }
	
    public function pagination_category($startpoint, $limit, $category)
    {
		$q = array();
		
	 if($category === "all"):	
		
        $q = $this->db->select('projects', '*', ["AND" =>["closed" => 0, "complete" => 0], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $q;
		
	 else:
	 
        $query = $this->db->select('category', '*', ["id" => $category]);
		 foreach($query as $row) {}
		
		
        $q = $this->db->select('projects', '*', ["category" => $row['name'], "closed" => 0, "complete" => 0, "ORDER" =>["date_added" => "DESC"]]);

        return $q;
		
     endif;
		
    }
	
    public function details()
    {
		
        $query = $this->db->select('category', '*', []);

        return $query;
    }
	
    /**
     *
     * Project No
     */
    public function p_no()
    {
		$names_skills = array(); 
		
        $query = $this->db->select('category', '*', []);
		 foreach($query as $row) {

			$names_skills[$row["id"]] = $this->db->count('projects', ["AND" => ["category" => $row['name'], "closed" => 0, "complete" => 0]]);		 
			 
		 }	

        return $names_skills;
    }
	
    public function has_p_category($id)
    {
		
		$q = array();
		
		 if($id === "all"):	
			
			$has = $this->db->has('projects', ["closed" => 0, "complete" => 0]);

			return $has;
			
		 else:
		 
			$query = $this->db->select('category', '*', ["id" => $id]);
			 foreach($query as $row) {}
			
			
			$has = $this->db->has('projects', ["AND" => ["category" => $row['name'], "closed" => 0, "complete" => 0]]);

			return $has;
			
		 endif;
    }


    public function total()
    {
		
        $query = $this->db->count('projects', ["closed" => 0, "complete" => 0]);

        return $query;
    }		
	
	
    /**
     * Check if the project is available in the db
     *
     */
    public function has($id) {

		$has = $this->db->has("projects", ["AND" =>["userid" => $id]]);		
		  
		return $has;  
    }
	
/**
 * Edit Project
 *
 */	
	
    /**
     * Check if the project is available in the db
     *
     */
    public function hasProjectNo($id, $userid) {

		$has = $this->db->has("projects", ["AND" =>["projectid" => $id, "userid" => $userid]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project details requested
     *
     */
    public function getProjectNo($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["projectid" => $id]]);	
	    foreach($query as $row) {}		
		  
		return $row;  
    }
	
    /**
     * Update the Project
     *
     */
    public function updateProject($title, $slug, $budget, $category, $skills, $description, $id) {

		$Update = $this->db->update('projects',[
		   'title' => $title,
		   'slug' => $slug,
		   'budget' => $budget,
		   'category' => $category,
		   'skills' => $skills,
		   'description' => $description
		],[
		    'projectid' => $id
		  ]);
		  
		return $Update->rowCount();  
    }
	
	
/**
 * Common Settings / Open Projects
 *
 */		
 
    /**
     * Check if the project is available in the db
     *
     */
    public function hasOpenProject($id) {

		$has = $this->db->has("projects", ["AND" =>["userid" => $id, "closed" => 0, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Count open projects
     *
     */
    public function countOpenProject($id) {

		$has = $this->db->count("projects", ["AND" =>["userid" => $id, "closed" => 0, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project details requested
     *
     */
    public function get($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["userid" => $id, "closed" => 0], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     *
     * Time ago
     */
    public function timeago($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('projects', '*', ["AND" =>["userid" => $id], "ORDER" => ["date_added" => "DESC"]]);
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
    public function countProposals($id) {
		
		$total = array(); 

		$query = $this->db->select("projects", "*", ["AND" =>["userid" => $id]]);	
        foreach($query as $row){
		
			$total[$row["projectid"]] = $this->db->count("proposals", ["AND" => ["projectid" => $row["projectid"]]]);
			
		}		
		
		return $total;  
    }
	
	
/**
 * Closed Projects
 *
 */		
 
    /**
     * Check if the project is available in the db
     *
     */
    public function hasClosedProject($id) {

		$has = $this->db->has("projects", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Count closed projects
     *
     */
    public function countClosedProject($id) {

		$has = $this->db->count("projects", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project details requested
     *
     */
    public function getClosed($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 0], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     *
     * Get Escrow
     */
    public function escrow($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('escrow', '*', ["AND" =>["clientid" => $id]]);
		 foreach($query as $row) {			 
			$names_skills[$row["projectid"]] = $row['budget'];
		 }	

        return $names_skills;
    }
	

		



/* ==========================================================================
   Client - Completed Projects
   ========================================================================== */
 
    /**
     * Check if the project is available in the db
     *
     */
    public function hasCompletedProject($id) {

		$has = $this->db->has("projects", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 1]]);		
		  
		return $has;  
    }
	
    /**
     * Count completed projects
     *
     */
    public function countCompletedProject($id) {

		$has = $this->db->count("projects", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 1]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project completed requested
     *
     */
    public function getCompleted($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 1], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     *
     * Get Payments
     */
    public function payments($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('payments', '*', ["AND" =>["clientid" => $id]]);
		 foreach($query as $row) {			 
			$names_skills[$row["projectid"]] = $row['client_money'];
		 }	

        return $names_skills;
    }
	
    /**
     * Get conversation
     *
     */
    public function get_conversation_user($clientid) 
    {
		$names_skills = array(); 
		
        $query = $this->db->select('conversation', '*', [
									"AND" => [
										"clientid" => $clientid
									]]);
	    foreach($query as $row){
			$names_skills[$row["projectid"]] = $row;
		}
		
	    return $names_skills;
    }	
	




/* ==========================================================================
   Client - Disputed Projects
   ========================================================================== */

 
    /**
     * Check if the project is available in the db
     *
     */
    public function has_disputed_projects($id) {

		$has = $this->db->has("projects", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 2]]);		
		  
		return $has;  
    }
	
    /**
     * Count disputed projects
     *
     */
    public function count_disputed_projects($id) {

		$has = $this->db->count("projects", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 2]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project disputed requested
     *
     */
    public function disputed_projects($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["userid" => $id, "closed" => 1, "complete" => 2], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     * Get conversation
     *
     */
    public function get_dispute_conversation($clientid) 
    {
		$names_skills = array(); 
		
        $query = $this->db->select('dispute_conversation', '*', [
									"AND" => [
										"clientid" => $clientid
									]]);
	    foreach($query as $row){
			$names_skills[$row["projectid"]] = $row;
		}
		
	    return $names_skills;
    }








/**
 * Frelancer Side
 *
 */	












    /**
     * Check if the project is available in the db
     *
     */
    public function f_has($id) {

		$has = $this->db->has("projects", ["AND" =>["freelancerid" => $id]]);		
		  
		return $has;  
    }	
	
	
/**
 * Closed Projects
 *
 */		
 
    /**
     * Check if the project is available in the db
     *
     */
    public function f_hasClosedProject($id) {

		$has = $this->db->has("projects", ["AND" =>["freelancerid" => $id, "closed" => 1, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Count closed projects
     *
     */
    public function f_countClosedProject($id) {

		$has = $this->db->count("projects", ["AND" =>["freelancerid" => $id, "closed" => 1, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project details requested
     *
     */
    public function f_getClosed($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["freelancerid" => $id, "closed" => 1, "complete" => 0], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     *
     * Get Escrow
     */
    public function f_escrow($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('escrow', '*', ["AND" =>["freelancerid" => $id]]);
		 foreach($query as $row) {			 
			$names_skills[$row["projectid"]] = $row['budget'];
		 }	

        return $names_skills;
    }	

	
    /**
     * Get conversation
     *
     */
    public function f_get_conversation($freelancerid) 
    {
		$names_skills = array(); 
		
        $query = $this->db->select('conversation', '*', [
									"AND" => [
										"freelancerid" => $freelancerid
									]]);
	    foreach($query as $row){
			$names_skills[$row["projectid"]] = $row;
		}
		
	    return $names_skills;
    }	
	
	
	
/**
 * Completed Projects
 *
 */	
 
    /**
     * Check if the project is available in the db
     *
     */
    public function f_hasCompletedProject($id) {

		$has = $this->db->has("projects", ["AND" =>["freelancerid" => $id, "closed" => 1, "complete" => 1]]);		
		  
		return $has;  
    }
	
    /**
     * Count completed projects
     *
     */
    public function f_countCompletedProject($id) {

		$has = $this->db->count("projects", ["AND" =>["freelancerid" => $id, "closed" => 1, "complete" => 1]]);		
		  
		return $has;  
    }
	
    /**
     * Get the project completed requested
     *
     */
    public function f_getCompleted($id) {

		$query = $this->db->select("projects", "*", ["AND" =>["freelancerid" => $id, "closed" => 1, "complete" => 1], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }
	
    /**
     *
     * Get Payments
     */
    public function f_payments($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('payments', '*', ["AND" =>["freelancerid" => $id]]);
		 foreach($query as $row) {			 
			$names_skills[$row["projectid"]] = $row['client_money'];
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
	
	
	
	
	
	
	
	
	
	
	
	
	
    /**
     * Count Posted Projects
     *
     */
    public function c_posted_projects() {

		$query = $this->db->count("projects", ["AND" =>["closed" => 0, "complete" => 0]]);			
		  
		return $query;    
    }
	
    /**
     * Count Completed Projects
     *
     */
    public function c_completed_projects() {

		$query = $this->db->count("projects", ["AND" =>["closed" => 1, "complete" => 1]]);			
		  
		return $query;    
    }	
	
    /**
     * Check if the portfolio is available in the db
     *
     */
    public function hasProjects() {

		$has = $this->db->has("projects", ["AND" =>["closed" => 0, "complete" => 0]]);		
		  
		return $has;  
    }
	
    /**
     * Gets Projects Pagination
     *
     * @return    array
     */
    public function pagination($startpoint, $limit)
    {
		
        $query = $this->db->select('projects', '*', ["AND" =>["closed" => 0, "complete" => 0], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }

    /**
     *
     * Time ago
     */
    public function projects_timeago()
    {
		$names_skills = array(); 
		
        $query = $this->db->select('projects', '*', ["AND" =>["closed" => 0, "complete" => 0], "ORDER" => ["date_added" => "DESC"]]);
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

		$query = $this->db->select("projects", "*", ["AND" =>["closed" => 0, "complete" => 0]]);	
        foreach($query as $row){
		
			$total[$row["projectid"]] = $this->db->count("proposals", ["AND" => ["projectid" => $row["projectid"]]]);
			
		}		
		
		return $total;  
    }	
	







/**
 * Project File
 *
 */
	
	
    /**
     * Check if the project is available in the db
     *
     */
    public function hasProject($id) {

		$has = $this->db->has("projects", ["AND" =>["projectid" => $id]]);		
		  
		return $has;  
    }
	
	
    /**
     * Check if the project is available in the db
     *
     */
    public function slug($id) {

		$has = $this->db->has("projects", ["AND" =>["slug" => $id]]);		
		  
		return $has;  
    }	
	
    /**
     * Get the user details requested
     *
     */
    public function getProject($id) {

		$query = $this->db->select("projects", "*", ["projectid" => $id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Get the client
     *
     */
    public function getclient($id) {

		$query = $this->db->select("projects", "*", ["projectid" => $id]);	
        foreach($query as $row){}

		$q1 = $this->db->select("user", "*", ["userid" => $row['userid']]);	
        foreach($q1 as $r1){}		
		  
		return $r1;  
    }	
	
    /**
     * Count of proposals for the project
     *
     */
    public function project_proposal($id) {
		 
		$total = $this->db->count("proposals", ["AND" => ["projectid" => $id]]);	
		
		return $total;  
    }	
	
	
/**
 * Search Projects
 *
 */	
	
    /**
     * Get the searched projects
     *
     */
    public function search() {

		$query = $this->db->select("projects", "*", ["AND" =>["closed" => 0, "complete" => 0], "ORDER" => ["date_added" => "DESC"]]);		
		  
		return $query;  
    }	
}