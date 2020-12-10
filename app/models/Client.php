<?php

namespace Fir\Models;

class Client extends Model {
		
/* ==========================================================================
   Header
   ========================================================================== */
   
   
    /**
     * Count unread messages
     *
     */
    public function unread_messages($id) {

	   $noo = array();
	   
	   $qp = $this->db->select("conversation", "*", ["clientid" => $id]);
	   foreach($qp as $rp) {
		   
	   $noo[] = $this->db->count("conversation_reply", ["AND" => ["cid" => $rp["cid"], "read_status" => 0], "user_sending[!]" => $id]);
		   
	   }
	   $a = array_sum($noo); 
	   
	   return $a;
    }   
    /**
     * Count unread notifications
     *
     */
    public function unread_notifications($id) {

	   $no = $this->db->count("notifications", ["AND" => ["user_receiving" => $id, "read_status" => 0]]); 
	   
	   return $no;
    }

		
/* ==========================================================================
   Notifications
   ========================================================================== */
   
    /**
     * Check if the notifications is available in the db
     *
     */
    public function has_notifications($userid) {

		$has = $this->db->has("notifications", ["AND" =>["user_receiving" => $userid]]);		
		  
		return $has;  
    }	
    /**
     * Count total notifications
     *
     */
    public function total_notifications($id) {

	   $no = $this->db->count("notifications", ["AND" => ["user_receiving" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Notifications Pagination
     *
     */
    public function notifications_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('notifications', '*', ["AND" => ["user_receiving" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
	
    /**
     * Get the projects
     *
     */
    public function projects($id) {

		$query = $this->db->select("projects", "*", ["userid" => $id]);	
		  
		return $query;  
    }	
	
    /**
     *
     * Time ago
     */
    public function notifications_timeago($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('notifications', '*', ["AND" => ["user_receiving" => $id], "ORDER" => ["date_added" => "DESC"]]);
		 foreach($query as $row) {
			$timeago = $this->ago(strtotime($row["date_added"])); 
			 
			$names_skills[$row["id"]] = $timeago;
		 }	

        return $names_skills;
    }		
	
    /**
     * Update notifications
     *
     */
    public function read_notifications($id) {

		$Update = $this->db->update('notifications',[
		   'read_status' => 1,
		],[
		    "user_receiving" => $id
		  ]);
		  
		return $Update->rowCount();  
		  
	}		
	


		
/* ==========================================================================
   Messages
   ========================================================================== */
   
    /**
     * Check if the messages is available in the db
     *
     */
    public function has_messages($id) {

		$has = $this->db->has("conversation", ["AND" =>["clientid" => $id]]);		
		  
		return $has;  
    }	
    /**
     * Count total messages
     *
     */
    public function total_messages($id) {

	   $no = $this->db->count("conversation", ["AND" => ["clientid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Messages Pagination
     *
     */
    public function messages_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('conversation', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
    /**
     * Count unread conversation_reply
     *
     */
    public function unread_conversations($id) 
    {
	    $no = array(); 
		
        $query = $this->db->select('conversation', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"]]);
	    foreach($query as $row){

			$no[$row["cid"]] = $this->db->count("conversation_reply", ["AND" => ["cid" => $row["cid"], "read_status" => 0], "user_sending[!]" => $id]);
		
	    }
		
	    return $no;
    }
	
	


		
/* ==========================================================================
   Chat
   ========================================================================== */
	
    /**
     * Update conversation_reply
     *
     */
    public function update_conversation_reply($id, $userid) {

		$Update = $this->db->update('conversation_reply',[
		   'read_status' => 1,
		],[
		    "AND" => ["cid" => $id, "user_sending[!]" => $userid]
		  ]);
		  
		return $Update->rowCount();  
		  
	}
   
    /**
     * Check if the conversation is available in the db
     *
     */
    public function has_conversation($id) {

		$has = $this->db->has("conversation", ["AND" =>["cid" => $id]]);		
		  
		return $has;  
    }	
   
    /**
     * Check if the user is available in the db
     *
     */
    public function has_user($id) {

		$has = $this->db->has("user", ["AND" =>["userid" => $id]]);		
		  
		return $has;  
    }		
	
    /**
     * Get conversation
     *
     */
    public function get_conversation($id) 
    {
		
        $query = $this->db->select('conversation', '*', ["AND" => ["cid" => $id]]);
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
     * Get project
     *
     */
    public function get_project($id) 
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["projectid" => $id]]);
	    foreach($query as $row){}
		
	    return $row;
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
   Chat - post message
   ========================================================================== */

    /**
     * Get conversation
     *
     */
    public function get_conversation_id($id) 
    {
		
        $query = $this->db->select('conversation', '*', ["AND" => ["id" => $id]]);
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
    public function getLatestNotification($id) {
		
		$qp = $this->db->select("notifications", "*", ["LIMIT" => [0,1], "AND" => ["projectid" => $id], "ORDER" => ["id" => "DESC"]]);
		foreach($qp as $rp) {}	
		  
		return $rp;  
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
     * post_message
     *
     */
    public function post_message($cid, $projectid, $nid, $userid, $message) {
		
		    $q4= $this->db->insert('conversation_reply', array(
			   'cid' => $cid,
			   'projectid' => $projectid,
			   'nid' => $nid,
			   'user_sending' => $userid,
			   'reply' => $message,
			   'read_status' => 0,
			   'date_added' => date('Y-m-d H:i:s')
			));	 		
		  
		return $q4->rowCount();  
    }	
	
    /**
     * Get Latest Message
     *
     */
    public function get_latest_message($id) {
		
		$qp = $this->db->select("conversation_reply", "*", ["LIMIT" => [0,1], "AND" => ["projectid" => $id], "ORDER" => ["id" => "DESC"]]);
		foreach($qp as $rp) {}	
		  
		return $rp;  
    }
	
	


		
/* ==========================================================================
   Disputes
   ========================================================================== */
   
    /**
     * Check if the disputes is available in the db
     *
     */
    public function has_disputes($id) {

		$has = $this->db->has("dispute_conversation", ["AND" =>["clientid" => $id]]);		
		  
		return $has;  
    }	
    /**
     * Count total disputes
     *
     */
    public function total_disputes($id) {

	   $no = $this->db->count("dispute_conversation", ["AND" => ["clientid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets disputes Pagination
     *
     */
    public function disputes_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('dispute_conversation', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
    /**
     * Count unread disputes_conversation_reply
     *
     */
    public function unread_disputes_conversations($id) 
    {
	    $no = array(); 
		
        $query = $this->db->select('dispute_conversation', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"]]);
	    foreach($query as $row){

			$no[$row["cid"]] = $this->db->count("dispute_conversation_reply", ["AND" => ["cid" => $row["cid"], "read_status_client" => 0]]);
		
	    }
		
	    return $no;
    }	
	
	

		
/* ==========================================================================
   Dispute view
   ========================================================================== */
   
    /**
     * Count unread messages
     *
     */
    public function unread_disputes($id) {

	   $noo = array();
	   
	   $qp = $this->db->select("dispute_conversation", "*", ["clientid" => $id]);
	   foreach($qp as $rp) {
		   
	   $noo[] = $this->db->count("dispute_conversation_reply", ["AND" => ["cid" => $rp["cid"], "read_status_client" => 0]]);
		   
	   }
	   $a = array_sum($noo); 
	   
	   return $a;
    } 	
    /**
     * Update conversation_reply
     *
     */
    public function update_dispute_conversation_reply($id) {

		$Update = $this->db->update('dispute_conversation_reply',[
		   'read_status_client' => 1,
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
     * Get admin
     *
     */
    public function get_admin($id) 
    {
		
        $query = $this->db->select('admin', '*', ["AND" => ["adminid" => $id]]);
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
			   'read_status_client' => 1,
			   'read_status_admin' => 0,
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
   Start Dispute
   ========================================================================== */
   
    /**
     * Check if the conversation is available in the db
     *
     */
    public function has_dispute_user($projectid, $clientid, $freelancerid) {

		$has = $this->db->has("dispute_conversation", ["AND" =>["projectid" => $projectid, "clientid" => $clientid, "freelancerid" => $freelancerid]]);		
		  
		return $has;  
    }		
	
	
    /**
     * start dispute
     *
     */
    public function start_dispute($projectid, $clientid, $freelancerid, $message) {
		
			$admins = $this->db->select("admin", "*", ["ORDER" => ["id" => "DESC"], "LIMIT" => 1]);	
			foreach($admins as $admin) {}	
			
			$cid = $this->rando();
				   
		    $q1 = $this->db->insert('dispute_conversation', array(
			   'cid' => $cid,
			   'projectid' => $projectid,
			   'freelancerid' => $freelancerid,
			   'clientid' => $clientid,
			   'adminid' => $admin['adminid'],
			   'date_added' => date('Y-m-d H:i:s')
			));  		
		
		    $q2= $this->db->insert('dispute_conversation_reply', array(
			   'cid' => $cid,
			   'projectid' => $projectid,
			   'user_sending' => $clientid,
			   'reply' => $message,
			   'read_status_freelancer' => 0,
			   'read_status_client' => 1,
			   'read_status_admin' => 0,
			   'date_added' => date('Y-m-d H:i:s')
			));	 
			
			$q3 = $this->addNotification($projectid, $clientid, $freelancerid, 6);
		
			$update_a = $this->db->update('projects',[
			   'complete' => 2,
			   'disputed_date' => date('Y-m-d H:i:s')
			],[
				'projectid' => $projectid
			  ]);
		
			$update_b = $this->db->update('escrow',[
			   'action' => 3
			],[
				'projectid' => $projectid
			  ]);	
			
		return $update_b->rowCount();  
    }	
	


		
/* ==========================================================================
   Proposals
   ========================================================================== */
   
    /**
     * Check if the project is available in the db
     *
     */
    public function has_project($id) {

		$has = $this->db->has("projects", ["AND" =>["projectid" => $id]]);		
		  
		return $has;  
    }
	
    /**
     * Get project
     *
     */
    public function get_project_no($id, $userid) 
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["projectid" => $id, "userid" => $userid]]);
	    foreach($query as $row){}
		
	    return $row;
    }
   
    /**
     * Check if the proposals is available in the db
     *
     */
    public function has_proposals($id) {

		$has = $this->db->has("proposals", ["AND" =>["projectid" => $id]]);		
		  
		return $has;  
    }	
    /**
     * Count total proposals
     *
     */
    public function total_proposals($id) {

	   $no = $this->db->count("proposals", ["AND" => ["projectid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Proposals Pagination
     *
     */
    public function proposals_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('proposals', '*', ["AND" => ["projectid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }
   
    /**
     * Check if the conversation is available in the db
     *
     */
    public function has_conversation_user($projectid, $clientid) {

		$has = $this->db->has("conversation", [
									"AND" => [
				                        "projectid" => $projectid,
										"clientid" => $clientid
									]
						]);		
		  
		return $has;  
    }
	
    /**
     * Get conversation
     *
     */
    public function get_conversation_user($projectid, $clientid) 
    {
		
        $query = $this->db->select('conversation', '*', [
									"AND" => [
				                        "projectid" => $projectid,
										"clientid" => $clientid
									]]);
	    foreach($query as $row){}
		
	    return $row;
    }
	
    /**
     * Get ratings for each freelancer
     *
     */
    public function freelancers_ratings() {
		
		$total = array(); 

		$query = $this->db->select("user", "*", ["AND" =>["user_type" => 1]]);	
        foreach($query as $row){
			
			
			$total_number = $this->db->count("ratings", ["AND" => ["user_receiving" => $row["userid"]]]);
			if($total_number == 0):
			   $total_value = 0;
			else:
		      $total_ratings = $this->db->sum("ratings", "rate", ["AND" => ["user_receiving" => $row["userid"]]]);
			  $total_value = $total_ratings / $total_number;
			  $total_value = number_format($total_value, 1);
			endif;			
		
			$total[$row["userid"]] = [$this->ratings($total_value), $total_value];
			
		}		
		
		return $total;  
    }
	
	
	
	

	

		
/* ==========================================================================
   Invites
   ========================================================================== */
   
    /**
     * Check if the invites is available in the db
     *
     */
    public function has_invites($userid) {

		$has = $this->db->has("invite", ["AND" =>["clientid" => $userid]]);		
		  
		return $has;  
    }	
    /**
     * Count total invites
     *
     */
    public function total_invites($id) {

	   $no = $this->db->count("invite", ["AND" => ["clientid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Notifications Pagination
     *
     */
    public function invites_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('invite', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
	
	
	

	

		
/* ==========================================================================
   Invite freelancer
   ========================================================================== */
	
   
    /**
     * Check if the user slug is available in the db
     *
     */
    public function has_slug($id) {

		$has = $this->db->has("user", ["AND" =>["slug" => $id]]);		
		  
		return $has;  
    }	
	
   
    /**
     * Check if the user has invite is available in the db
     *
     */
    public function has_invite($projectid, $freelancerid, $clientid) {

		$has = $this->db->has("invite", ["AND" =>["projectid" => $projectid, "freelancerid" => $freelancerid, "clientid" => $clientid]]);		
		  
		return $has;  
    }	
	
   
    /**
     * Check if the user has proposal is available in the db
     *
     */
    public function has_proposal($projectid, $freelancerid, $clientid) {

		$has = $this->db->has("proposals", ["AND" =>["projectid" => $projectid, "freelancerid" => $freelancerid, "clientid" => $clientid]]);		
		  
		return $has;  
    }	
	

	
    /**
     * Add Invite
     *
     */
    public function add_invite($projectid, $freelancerid, $clientid, $message) {
			
			
			$q1 = $this->addNotification($projectid, $clientid, $freelancerid, 3);
			$q2 = $this->get_latest_notification_client($projectid, $clientid);
					
		    $q3 = $this->db->insert('invite', [
			   'projectid' => $projectid,
			   'freelancerid' => $freelancerid,
			   'clientid' => $clientid,
			   'nid' => $q2["id"],
			   'action' => 0,
			   'read_status' => 0,
			   'date_added' => date('Y-m-d H:i:s')
			]);	

		
			$cid = $this->rando();
				   
		    $q4 = $this->db->insert('conversation', array(
			   'cid' => $cid,
			   'projectid' => $projectid,
			   'freelancerid' => $freelancerid,
			   'clientid' => $clientid,
			   'date_added' => date('Y-m-d H:i:s')
			));  
			
			$q5 = $this->addNotification($projectid, $clientid, $freelancerid, 2);
			$q6 = $this->get_latest_notification_client($projectid, $clientid);
			
		    $q7= $this->db->insert('conversation_reply', array(
			   'cid' => $cid,
			   'projectid' => $projectid,
			   'nid' => $q6["id"],
			   'user_sending' => $clientid,
			   'reply' => $message,
			   'read_status' => 0,
			   'date_added' => date('Y-m-d H:i:s')
			));	 		
			
		return $q7->rowCount();  
    }	
	
	


		
/* ==========================================================================
   Funds
   ========================================================================== */
   
    /**
     * Check if the funds is available in the db
     *
     */
    public function has_funds($userid) {

		$has = $this->db->has("funds", ["AND" =>["clientid" => $userid, "complete" => 1]]);		
		  
		return $has;  
    }	
    /**
     * Count total funds
     *
     */
    public function total_funds($id) {

	   $no = $this->db->count("funds", ["AND" => ["clientid" => $id, "complete" => 1]]); 
	   
	   return $no;
    }
	
    /**
     * Gets funds Pagination
     *
     */
    public function funds_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('funds', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }	
		
	


		
/* ==========================================================================
   Hire Freelancer
   ========================================================================== */

	
    /**
     * Get the proposal details requested
     *
     */
    public function get_proposal($id) {

		$query = $this->db->select("proposals", "*", ["AND" =>["id" => $id]]);		
        foreach($query as $row){}		
		  
		return $row;  	  
    }		
	
    /**
     * addescrow
     *
     */
    public function addescrow($proposalid, $projectid, $freelancerid, $clientid, $nid, $budget) {
		
		    $q4= $this->db->insert('escrow', array(
			   'proposalid' => $proposalid,
			   'projectid' => $projectid,
			   'freelancerid' => $freelancerid,
			   'clientid' => $clientid,
			   'nid' => $nid,
			   'budget' => $budget,
			   'action' => 1,
			   'read_status' => 0,
			   'date_added' => date('Y-m-d H:i:s')
			));	 		
		  
		return $q4->rowCount();  
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
     * update project
     *
     */
    public function update_project($projectid, $freelancerid) {
		
		$Update = $this->db->update('projects',[
		   'freelancerid' => $freelancerid,
		   'closed' => 1,
		   'hired_date' => date('Y-m-d H:i:s')
		],[
			'projectid' => $projectid
		  ]);	 		
		  
		return $Update->rowCount();  
    }
	
    /**
     * update proposal
     *
     */
    public function update_proposal($id, $freelancerid) {
		
		$Update = $this->db->update('proposals',[
		   'action' => 2
		],[
			'AND' => ['id' => $id, 'freelancerid' => $freelancerid]
		  ]);	 		
		  
		return $Update->rowCount();  
    }
    /**
     * Check if the proposals is available in the db
     *
     */
    public function has_other_proposals($projectid, $freelancerid) {

		$has = $this->db->has("proposals", ["AND" =>["projectid" => $projectid, "freelancerid[!]" => $freelancerid]]);		
		  
		return $has;  
    }	
	
    /**
     * update proposals
     *
     */
    public function update_proposals($projectid, $freelancerid) {
		
		$Update = $this->db->update('proposals',[
		   'action' => 3
		],[
			'AND' => ['projectid' => $projectid, 'freelancerid[!]' => $freelancerid]
		  ]);	 	
		  
		return $Update->rowCount(); 	
		  
	}		
	
	
	

	

		
/* ==========================================================================
   Escrow
   ========================================================================== */
   
    /**
     * Check if the invites is available in the db
     *
     */
    public function has_escrow($userid) {

		$has = $this->db->has("escrow", ["AND" =>["clientid" => $userid]]);		
		  
		return $has;  
    }	
    /**
     * Count total escrow
     *
     */
    public function total_escrow($id) {

	   $no = $this->db->count("escrow", ["AND" => ["clientid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Notifications Pagination
     *
     */
    public function escrow_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('escrow', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
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
    public function has_file($id, $userid) {

		$has = $this->db->has("files", [	
		   "OR" => [
				"AND #first" => [
					"id" => $id,
					"user_sending" => $userid
				],
				"AND #second" => [
					"id" => $id,
					"user_receiving" => $userid
				]
			]]);		
		  
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
	
    /**
     * Count unread files
     *
     */
    public function unread_files($id) {

	   $no = $this->db->count("files", ["AND" => ["user_receiving" => $id, "read_status" => 0]]); 
	   
	   return $no;
    }
	
    /**
     * Update files
     *
     */
    public function read_files($id) {

		$Update = $this->db->update('files',[
		   'read_status' => 1,
		],[
		    "user_receiving" => $id
		  ]);
		  
		return $Update->rowCount();  
		  
	}	


	
	

		
/* ==========================================================================
   Add Files
   ========================================================================== */
	
    /**
     * Gets File
     *
     */
    public function projects_closed($id)
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["userid" => $id, "closed" => 1]]);

        return $query;
    }
	
    /**
     * Add File
     *
     */
    public function add_file($filename, $projectid, $clientid, $type, $ext, $new_size) {
		
			
			$q1 = $this->get_project($projectid);
			$q2 = $this->addNotification($q1['projectid'], $clientid, $q1["freelancerid"], 5);
			$q3 = $this->get_latest_notification_client($q1['projectid'], $clientid);
					
				
		   $q4 = $this->db->insert('files', array(
			   'projectid' => $q1['projectid'],
			   'user_sending' => $clientid,
			   'user_receiving' => $q1["freelancerid"],
			   'nid' => $q3["id"],
			   'fileupload' => $filename,
			   'type' => $type,
			   'extension' => $ext,
			   'size' => $new_size,
			   'date_added' => date('Y-m-d H:i:s')
			));
			
		return $q4->rowCount();  
    }	





		
/* ==========================================================================
   Complete Project
   ========================================================================== */
	
    /**
     * Get project
     *
     */
    public function get_project_id($id, $userid) 
    {
		
        $query = $this->db->select('projects', '*', ["AND" => ["id" => $id, "userid" => $userid]]);
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

	

		
/* ==========================================================================
   Payments
   ========================================================================== */
   
    /**
     * Check if the invites is available in the db
     *
     */
    public function has_payments($userid) {

		$has = $this->db->has("payments", ["AND" =>["clientid" => $userid]]);		
		  
		return $has;  
    }	
    /**
     * Count total escrow
     *
     */
    public function total_payments($id) {

	   $no = $this->db->count("payments", ["AND" => ["clientid" => $id]]); 
	   
	   return $no;
    }
	
    /**
     * Gets Notifications Pagination
     *
     */
    public function payments_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('payments', '*', ["AND" => ["clientid" => $id], "ORDER" =>["date_added" => "DESC"], "LIMIT" => [$startpoint, $limit]]);

        return $query;
    }

	

		
/* ==========================================================================
   Ratings
   ========================================================================== */
   
    /**
     * Check if the ratings is available in the db
     *
     */
    public function has_ratings($userid) {

		$has = $this->db->has("ratings", [	
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
     * Count total ratings
     *
     */
    public function total_ratings($id) {

	   $no = $this->db->count("ratings", [	
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
    public function ratings_pagination($startpoint, $limit, $id)
    {
		
        $query = $this->db->select('ratings', '*', [	
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
    public function ratings_timeago($id)
    {
		$names_skills = array(); 
		
        $query = $this->db->select('ratings', '*', [	
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
	
    /**
     * Get ratings for each project complete
     *
     */
    public function ratings_value($id) {
		
		$total = array(); 
		
			$q1 = $this->db->select("ratings", "*", [	
				   "OR" => [
						"AND #first" => [
							"user_sending" => $id
						],
						"AND #second" => [
							"user_receiving" => $id
						]
					]]);	
			foreach($q1 as $r1){
				
				$total[$r1["id"]] = [$this->ratings($r1['rate']), $r1['rate']];
				
			}		
		
		return $total;  
    }
	

/* ==========================================================================
   Add Rating
   ========================================================================== */
   
    /**
     * Check if the ratings is available in the db
     *
     */
    public function has_rating($userid, $projectid) {

		$has = $this->db->has("ratings", ["AND" => ["user_receiving" => $userid, "projectid" => $projectid]]);		
		  
		return $has;  
    }	

	
    /**
     * Add rating
     *
     */
    public function add_rating($projectid, $clientid, $freelancerid, $rate, $description) {
		
			
			$q1 = $this->addNotification($projectid, $clientid, $freelancerid, 8);
			$q2 = $this->get_latest_notification_client($projectid, $clientid);
					

		   $q3 = $this->db->insert('ratings', array(
			   'projectid' => $projectid,
			   'user_sending' => $clientid,
			   'user_receiving' => $freelancerid,
			   'nid' => $q2["id"],
			   'rate' => $rate,
			   'description' => $description,
			   'read_status' => 0,
			   'date_added' => date('Y-m-d H:i:s'),
			));				
			
		return $q3->rowCount();  
    }
	

/* ==========================================================================
   Edit Rating
   ========================================================================== */
   
    /**
     * Check if the ratings is available in the db
     *
     */
    public function has_rating_no($id, $userid) {

		$has = $this->db->has("ratings", ["AND" => ["id" => $id, "user_sending" => $userid]]);		
		  
		return $has;  
    }	
	
    /**
     * Gets rating
     *
     */
    public function get_rating($id)
    {
		
        $query = $this->db->select('ratings', '*', ["AND" => ["id" => $id]]);
		foreach($query as $row){}

        return $row;
    }

    /**
     * update rating
     *
     */
    public function update_rating($rate, $description, $id) {
		
		$Update = $this->db->update('ratings',[
		   'rate' => $rate,
		   'description' => $description
		],[
			'id' => $id
		  ]);	 		
		  
		return $Update->rowCount();  
    }

	

	
	
	//Random String
	private function rando($length = 14){
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
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
	
	//Ratings
	function ratings($star){
		
		$name = '';
		$array_one = [1,1.1,1.2,1.3,1.4,1.5,1.6,1.7,1.8,1.9];
		$array_two = [2,2.1,2.2,2.3,2.4,2.5,2.6,2.7,2.8,2.9];
		$array_three = [3,3.1,3.2,3.3,3.4,3.5,3.6,3.7,3.8,3.9];
		$array_four = [4,4.1,4.2,4.3,4.4,4.5,4.6,4.7,4.8,4.9];
		$array_five = [5,5.1,5.2,5.3,5.4,5.5,5.6,5.7,5.8,5.9];
		
	  if($star == '0'):
		 $name .='
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
				';   
		
	  elseif(in_array( $star ,$array_one )):
		 $name .='
					 <span class="star"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
				';   
	  elseif(in_array( $star ,$array_two )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 '; 
	  elseif(in_array( $star ,$array_three )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star empty"></span>
					 <span class="star empty"></span>
					 '; 
	  elseif(in_array( $star ,$array_four )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star empty"></span>
					 '; 
	  elseif(in_array( $star ,$array_five )):
		 $name .='
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 <span class="star"></span>
					 '; 
	  endif;	  
	  
								

	  
	  $full = $name;	  	
	  
	  return $full;
		
	}	
	
}