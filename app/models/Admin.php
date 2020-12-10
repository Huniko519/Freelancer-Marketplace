<?php

namespace Fir\Models;

class Admin extends Model {

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $rememberToken;
	
    /**
     * Update the Admin Profile Details
     *
     */
    public function profileDetails($name, $username, $email, $adminid) {

		$Update = $this->db->update('admin',[
		   'name' => $name,
		   'username' => $username,
		   'email' => $email,
		],[
		    'adminid' => $adminid
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Admin Profile Image
     *
     */
    public function profileImage($filename, $adminid) {

		$Update = $this->db->update('admin',[
		   'imagelocation' => $filename,
		],[
		    'adminid' => $adminid
		  ]);
		  
		return $Update->rowCount();  
    }	
	
    /**
     * Update the Admin Panel Password
     *
     */
    public function password($password, $adminid) {

		$Update = $this->db->update('admin',[
		   'password' => $password,
		],[
		    'adminid' => $adminid
		  ]);
		  
		return $Update->rowCount();  
    }	
	
    /**
     * Gets Currency details
     *
     * @return    array
     */
    public function currencyDetails()
    {
		
        $currency = $this->db->select('currency', '*', []);

        return $currency;
    }
	
    /**
     * Update the Currency Select
     *
     */
    public function currencySelect($currency_select) {

		$Update = $this->db->update('settings',[
		   'currency' => $currency_select,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Add Currency Data
     *
     */
    public function currencyAdd($currency_code, $currency_name, $currency_symbol) {

			
	    $Insert = $this->db->insert('currency', array(
		   'currency_code' => $currency_code,
		   'currency_name' => $currency_name,
		   'currency_symbol' => $currency_symbol
		));	
		  
		return $Insert->rowCount();  
    }
	
    /**
     * Check if the currency is available in the db
     *
     */
    public function currencyHas($currency_id) {

		$has = $this->db->has("currency", ["id" => $currency_id]);		
		  
		return $has;  
    }
	
    /**
     * Get the currency details requested
     *
     */
    public function currencyGet($currency_id) {

		$query = $this->db->select("currency", "*", ["id" => $currency_id]);	
        foreach($query as $row){}		
		  
		return $row;  
    }
	
    /**
     * Update the Currency Update
     *
     */
    public function currencyUpdate($currency_code, $currency_name, $currency_symbol, $currency_id) {

		$Update = $this->db->update('currency',[
		   'currency_code' => $currency_code,
		   'currency_name' => $currency_name,
		   'currency_symbol' => $currency_symbol
		],[
		    'id' => $currency_id
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Currency Delete
     *
     */
    public function currencyDelete($delete) {

		 // delete the entry
		$delete = $this->db->delete('currency', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
	
	
	
	
	


/* ==========================================================================
   Dashboard
   ========================================================================== */	
    /**
     * Count projects
     *
     */
    public function count_projects() {

	   $no = $this->db->count("projects", []); 
	   
	   return $no;
    }	
    /**
     * Count freelancers
     *
     */
    public function count_freelancers() {

	   $no = $this->db->count("user", ["user_type" => 1]); 
	   
	   return $no;
    }	
    /**
     * Count clients
     *
     */
    public function count_clients() {

	   $no = $this->db->count("user", ["user_type" => 2]); 
	   
	   return $no;
    }	
    /**
     * Revenue
     *
     */
    public function sum_revenue() {

	   $no = $this->db->sum("payments", "company_money", []); 
	   
	   return $no;
    }	
    /**
     * Freelancer Payments
     *
     */
    public function freelancer_payments() {

	   $no = $this->db->sum("payments", "freelancer_money", []); 
	   
	   return $no;
    }	
    /**
     * Clients Funds
     *
     */
    public function clients_funds() {

	   $no = $this->db->sum("funds", "amount", ["complete" => 1]); 
	   
	   return $no;
    }	
	
	
	
	
	
	
	



/* ==========================================================================
   Sidenav
   ========================================================================== */	
   
    /**
     * Count unread messages
     *
     */
    public function unread_disputes($id) {

	   $noo = array();
	   
	   $qp = $this->db->select("dispute_conversation", "*", ["adminid" => $id]);
	   foreach($qp as $rp) {
		   
	   $noo[] = $this->db->count("dispute_conversation_reply", ["AND" => ["cid" => $rp["cid"], "read_status_admin" => 0]]);
		   
	   }
	   $a = array_sum($noo); 
	   
	   return $a;
    }	
	
	
	

	
	


		
/* ==========================================================================
   Disputes
   ========================================================================== */
   
    /**
     * Check if the disputes is available in the db
     *
     */
    public function has_disputes() {

		$has = $this->db->has("dispute_conversation", []);		
		  
		return $has;  
    }	
    /**
     * Count total disputes
     *
     */
    public function total_disputes() {

	   $no = $this->db->count("dispute_conversation", []); 
	   
	   return $no;
    }
	
    /**
     * Gets disputes Pagination
     *
     */
    public function disputes_pagination($startpoint, $limit)
    {
		
        $query = $this->db->select('dispute_conversation', '*', ["ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
    /**
     * Count unread disputes_conversation_reply
     *
     */
    public function unread_disputes_conversations() 
    {
	    $no = array(); 
		
        $query = $this->db->select('dispute_conversation', '*', ["ORDER" =>["date_added" => "DESC"]]);
	    foreach($query as $row){

			$no[$row["cid"]] = $this->db->count("dispute_conversation_reply", ["AND" => ["cid" => $row["cid"], "read_status_admin" => 0]]);
		
	    }
		
	    return $no;
    }	
	
    /**
     * Get the projects
     *
     */
    public function projects() {

		$query = $this->db->select("projects", "*", ["ORDER" =>["date_added" => "DESC"]]);	
		  
		return $query;  
    }	

	
	

		
/* ==========================================================================
   Dispute view
   ========================================================================== */
    /**
     * Update conversation_reply
     *
     */
    public function update_dispute_conversation_reply($id) {

		$Update = $this->db->update('dispute_conversation_reply',[
		   'read_status_admin' => 1,
		],[
		    "AND" => ["cid" => $id]
		  ]);
		  
		return $Update->rowCount();  
		  
	}
   
    /**
     * Check if the conversation is available in the db
     *
     */
    public function has_dispute_conversation($id) {

		$has = $this->db->has("dispute_conversation", ["AND" =>["cid" => $id]]);		
		  
		return $has;  
    }		
	
    /**
     * Get conversation
     *
     */
    public function get_dispute_conversation($id) 
    {
		
        $query = $this->db->select('dispute_conversation', '*', ["AND" => ["cid" => $id]]);
	    foreach($query as $row){}
		
	    return $row;
    }
    /**
     * Count total conversation_reply
     *
     */
    public function total_dispute_conversation_reply($id) {

	   $no = $this->db->count("dispute_conversation_reply", ["AND" => ["cid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets conversation_reply Pagination
     *
     */
    public function dispute_conversation_reply_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('dispute_conversation_reply', '*', ["AND" => ["cid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }
	
    /**
     *
     * Time ago
     */
    public function dispute_conversation_reply_timeago($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('dispute_conversation_reply', '*', ["AND" => ["cid" => $id]]);
		 foreach($query as $row) {
			$timeago = $this->ago(strtotime($row["date_added"])); 
			 
			$names_skills[$row["id"]] = $timeago;
		 }	

        return $names_skills;
    }

	
    /**
     * Get project
     *
     */
    public function get_project($id) 
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["projectid" => $id]]);
	    foreach($query as $row){}
		
	    return $row;
    }


		
/* ==========================================================================
   Chat
   ========================================================================== */
	
   
    /**
     * Check if the conversation is available in the db
     *
     */
    public function has_conversation($id) {

		$has = $this->db->has("conversation", ["AND" =>["cid" => $id]]);		
		  
		return $has;  
    }			
	
    /**
     * Get conversation
     *
     */
    public function get_conversation($projectid, $clientid, $freelancerid) 
    {
		
        $query = $this->db->select('conversation', '*', ["AND" => ["projectid" => $projectid, "clientid" => $clientid, "freelancerid" => $freelancerid]]);
	    foreach($query as $row){}
		
	    return $row;
    }
    /**
     * Count total conversation_reply
     *
     */
    public function total_conversation_reply($id) {

	   $no = $this->db->count("conversation_reply", ["AND" => ["cid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets conversation_reply Pagination
     *
     */
    public function conversation_reply_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('conversation_reply', '*', ["AND" => ["cid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }
	
    /**
     *
     * Time ago
     */
    public function conversation_reply_timeago($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('conversation_reply', '*', ["AND" => ["cid" => $id]]);
		 foreach($query as $row) {
			$timeago = $this->ago(strtotime($row["date_added"])); 
			 
			$names_skills[$row["id"]] = $timeago;
		 }	

        return $names_skills;
    }	
	
    /**
     * Get freelancer
     *
     */
    public function get_freelancer($id) 
    {
		
        $query = $this->db->select('user', '*', ["AND" => ["userid" => $id]]);
	    foreach($query as $row){}
		
	    return $row;
    }
	


	

		
/* ==========================================================================
   Files
   ========================================================================== */
   
    /**
     * Check if the files is available in the db
     *
     */
    public function has_files($userid) {

		$has = $this->db->has("files", [	
		   "OR" => [
				"AND #first" => [
					"user_sending" => $userid
				],
				"AND #second" => [
					"user_receiving" => $userid
				]
			]]);		
		  
		return $has;  
    }	
    /**
     * Count total files
     *
     */
    public function total_files($id) {

	   $no = $this->db->count("files", [	
		   "OR" => [
				"AND #first" => [
					"user_sending" => $id
				],
				"AND #second" => [
					"user_receiving" => $id
				]
			]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Notifications Pagination
     *
     */
    public function files_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('files', '*', [	
		   "OR" => [
				"AND #first" => [
					"user_sending" => $id
				],
				"AND #second" => [
					"user_receiving" => $id
				]
			], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
	
	
    /**
     *
     * Time ago
     */
    public function files_timeago($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('files', '*', [	
		   "OR" => [
				"AND #first" => [
					"user_sending" => $id
				],
				"AND #second" => [
					"user_receiving" => $id
				]
			]]);
		 foreach($query as $row) {
			$timeago = $this->ago(strtotime($row["date_added"])); 
			 
			$names_skills[$row["id"]] = $timeago;
		 }	

        return $names_skills;
    }	

		
/* ==========================================================================
   Download
   ========================================================================== */
   
    /**
     * Check if the invites is available in the db
     *
     */
    public function has_file($id) {

		$has = $this->db->has("files", ["AND" =>["id" => $id]]);		
		  
		return $has;  
    }	
	
    /**
     * Gets File
     *
     */
    public function get_file($id)
    {
		
        $query = $this->db->select('files', '*', ["AND" => ["id" => $id]]);
		foreach($query as $row){}

        return $row;
    }


/* ==========================================================================
   Dispute - post message
   ========================================================================== */

    /**
     * Get conversation
     *
     */
    public function get_dispute_conversation_id($id) 
    {
		
        $query = $this->db->select('dispute_conversation', '*', ["AND" => ["id" => $id]]);
	    foreach($query as $row){}
		
	    return $row;
    }	
	
    /**
     * post_message
     *
     */
    public function post_dispute($cid, $projectid, $userid, $message) {
		
		    $q4= $this->db->insert('dispute_conversation_reply', array(
			   'cid' => $cid,
			   'projectid' => $projectid,
			   'user_sending' => $userid,
			   'reply' => $message,
			   'read_status_freelancer' => 0,
			   'read_status_client' => 0,
			   'read_status_admin' => 1,
			   'is_admin' => 1,
			   'date_added' => date('Y-m-d H:i:s')
			));	 		
		  
		return $q4->rowCount();  
    }	
	
    /**
     * Get Latest Message
     *
     */
    public function get_dispute_message($id, $userid) {
		
		$qp = $this->db->select("dispute_conversation_reply", "*", ["LIMIT" => [0,1], "AND" => ["cid" => $id, "user_sending" => $userid], "ORDER" => ["id" => "DESC"]]);
		foreach($qp as $rp) {}	
		  
		return $rp;  
    }	
	
	







		
/* ==========================================================================
   Award Freelancer
   ========================================================================== */
	
    /**
     * Get project
     *
     */
    public function get_project_id($id) 
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["id" => $id]]);
	    foreach($query as $row){}
		
	    return $row;
    }
	
    /**
     * Gets Escrow
     *
     */
    public function get_escrow($id, $userid)
    {
		
        $query = $this->db->select('escrow', '*', ["AND" => ["projectid" => $id, "clientid" => $userid]]);
		foreach($query as $row){}

        return $row;
    }	
	
    /**
     * Add Notification
     *
     */
    public function addNotification($projectid, $user_sending, $user_receiving, $type) {

			
	    $Insert = $this->db->insert('notifications', array(
		   'projectid' => $projectid,
		   'user_sending' => $user_sending,
		   'user_receiving' => $user_receiving,
		   'type' => $type,
		   'date_added' => date('Y-m-d H:i:s')
		));	
		  
		return $Insert->rowCount();  
    }
	
    /**
     * Get Latest Notification
     *
     */
    public function get_latest_notification_client($id, $clientid) {
		
		$qp = $this->db->select("notifications", "*", ["LIMIT" => [0,1], "AND" => ["projectid" => $id, "user_sending" => $clientid], "ORDER" => ["id" => "DESC"]]);
		foreach($qp as $rp) {}	
		  
		return $rp;  
    }	
	
    /**
     * addpayments
     *
     */
    public function addpayments($escrowid, $projectid, $freelancerid, $clientid, $nid, $client_money, $freelancer_money, $company_money) {
		
		    $q4= $this->db->insert('payments', array(
			   'escrow_id' => $escrowid,
			   'projectid' => $projectid,
			   'freelancerid' => $freelancerid,
			   'clientid' => $clientid,
			   'nid' => $nid,
			   'client_money' => $client_money,
			   'freelancer_money' => $freelancer_money,
			   'company_money' => $company_money,
			   'complete' => 1,
			   'date_added' => date('Y-m-d H:i:s')
			));	 		
		  
		return $q4->rowCount();  
    }

    /**
     * update project closed
     *
     */
    public function update_project_complete($projectid) {
		
		$Update = $this->db->update('projects',[
		   'complete' => 1,
		   'complete_date' => date('Y-m-d H:i:s')
		],[
			'projectid' => $projectid
		  ]);	 		
		  
		return $Update->rowCount();  
    }
	
    /**
     * update credit account
     *
     */
    public function update_credit_account($amount, $clientid) {
		
		$Update = $this->db->update('user',[
		   'credit_account' => $amount
		],[
			'userid' => $clientid
		  ]);	 		
		  
		return $Update->rowCount();  
    }

    /**
     * update escrow
     *
     */
    public function update_escrow($id) {
		
		$Update = $this->db->update('escrow',[
		   'action' => 2,
		   'read_status' => 0
		],[
			'id' => $id
		  ]);	 		
		  
		return $Update->rowCount();  
    }

    /**
     * update dispute_conversation
     *
     */
    public function update_dispute_conversation($projectid, $clientid, $freelancerid) {
		
		$Update = $this->db->update('dispute_conversation',[
		   'action' => 1
		],[
			"AND" => ['projectid' => $projectid, 'clientid' => $clientid, 'freelancerid' => $freelancerid]
		  ]);	 		
		  
		return $Update->rowCount();  
    }
	
		
/* ==========================================================================
   Award Client
   ========================================================================== */
	
    /**
     * Get project
     *
     */
    public function award_client($projectid, $clientid, $freelancerid, $escrow_budget, $escrow_id) 
    {
		
		$q1 = $this->db->select('files', '*', [
		   "OR" => [
				"AND #first" => [
					"projectid" => $projectid,
					"user_sending" => $freelancerid,
				],
				"AND #second" => [
					"projectid" => $projectid,
					"user_receiving" => $freelancerid
				]
			]]);
		foreach($q1 as $r1){
		
			$path = sprintf('%s/../../%s/%s/admin/files/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
			
			// unlink images
			unlink($path.$r1["fileupload"]);	
			
		}
		
		$q2 = $this->db->delete('files', [
		   "OR" => [
				"AND #first" => [
					"projectid" => $projectid,
					"user_sending" => $freelancerid,
				],
				"AND #second" => [
					"projectid" => $projectid,
					"user_receiving" => $freelancerid
				]
			]]);	

        $q3 = $this->get_freelancer($clientid);		
		
		$amount_new = $q3["credit_account"] + $escrow_budget; 
		  
		$q4 = $this->db->update('user',[
			   'credit_account' => $amount_new
			],[
				'userid' => $clientid
			  ]);		
		
		$q5 = $this->db->update('escrow',[
		   'action' => 4,
		   'read_status' => 0,
		],[
			'id' => $escrow_id
		  ]);
		  
		$q6 = $this->db->update('proposals',[
		   'action' => 1,
		],[
			'projectid' => $projectid
		  ]);
		  
		$q7 = $this->db->update('dispute_conversation',[
		   'action' => 2,
		],[
			"AND" => ['projectid' => $projectid, 'freelancerid' => $freelancerid, 'clientid' => $clientid]
		  ]);	
		 
		  
		$q8 = $this->db->update('projects',[
		   'freelancerid' => "",
		   'closed' => 0,
		   'complete' => 0,
		],[
			'projectid' => $projectid
		  ]);	
		
	    return $q8->rowCount();
    }	
	
	
	
		
/* ==========================================================================
   Edit project
   ========================================================================== */
	
   
    /**
     * Check if the project is available in the db
     *
     */
    public function has_project($id) {

		$has = $this->db->has("projects", ["AND" =>["id" => $id]]);		
		  
		return $has;  
    }	

	
    /**
     * Get project
     *
     */
    public function get_project_no($id) 
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["id" => $id]]);
	    foreach($query as $row){}
		
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
		    'id' => $id
		  ]);
		  
		return $Update->rowCount();  
    }	
	
	
		
/* ==========================================================================
   Requests
   ========================================================================== */
	
    /**
     * Count unread requests
     *
     */
    public function unread_requests() {

		   
	   $a= $this->db->count("request", ["AND" => ["read_status" => 0]]);
	   
	   return $a;
    }
	
    /**
     * Update requests
     *
     */
    public function update_requests() {

		$Update = $this->db->update('request',[
		   'read_status' => 1,
		],[
		    
		  ]);
		  
		return $Update->rowCount();  
		  
	}	

    /**
     * Get requests
     *
     */
    public function requests() 
    {
		
        $query = $this->db->select('request', '*', ["ORDER" => ["date_added" => "DESC"]]);
		
	    return $query;
    }	
	
		
/* ==========================================================================
   Revenues
   ========================================================================== */
    /**
     * Get revenues
     *
     */
    public function revenues() 
    {
		
        $query = $this->db->select('payments', '*', ["ORDER" => ["date_added" => "DESC"]]);
		
	    return $query;
    }


	
		
/* ==========================================================================
   Escrow
   ========================================================================== */
    /**
     * Get escrow
     *
     */
    public function escrow() 
    {
		
        $query = $this->db->select('escrow', '*', ["ORDER" => ["date_added" => "DESC"]]);
		
	    return $query;
    }



	
		
/* ==========================================================================
   Funds
   ========================================================================== */
    /**
     * Get funds
     *
     */
    public function funds() 
    {
		
        $query = $this->db->select('funds', '*', ["ORDER" => ["date_added" => "DESC"]]);
		
	    return $query;
    }
	
		
/* ==========================================================================
   Withdrawals
   ========================================================================== */
	
    /**
     * Count unread withdrawals
     *
     */
    public function unread_withdrawals() {

		   
	   $a= $this->db->count("withdrawals", ["AND" => ["read_status" => 0]]);
	   
	   return $a;
    }
	
    /**
     * Update withdrawals
     *
     */
    public function update_withdrawals() {

		$Update = $this->db->update('withdrawals',[
		   'read_status' => 1,
		],[
		    
		  ]);
		  
		return $Update->rowCount();  
		  
	}	

    /**
     * Get withdrawals
     *
     */
    public function withdrawals() 
    {
		
        $query = $this->db->select('withdrawals', '*', ["ORDER" => ["date_added" => "DESC"]]);
		
	    return $query;
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