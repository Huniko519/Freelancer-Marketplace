<?php

namespace Fir\Models;

class Requests extends Model {

    /**
     * Get the list of locations available
     *
     * @param   array   $params
     * @return  array
     */
    public function getLocations($params) {
        $query = $this->db->prepare("SELECT * FROM `locations` WHERE `name` = ?");
        $query->bind_param('s', $params['location']);
        $query->execute();
        $result = $query->get_result();
        $query->close();

        $data = [];

        while($row = $result->fetch_assoc()) {
            $data[$row['id']]['id']         = $row['id'];
            $data[$row['id']]['name']       = $row['name'];
            $data[$row['id']]['country']    = $row['country'];
            $data[$row['id']]['lon']        = $row['lon'];
            $data[$row['id']]['lat']        = $row['lat'];
        }

        return $data;
    }
	
    /**
     * Update the Currency Delete
     *
     */
    public function currencyDelete($delete) {
		
		//$delete = $params['delete']; 

		 // delete the entry
		$delete = $this->db->delete('currency', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * Author Delete
     *
     */
    public function authorDelete($delete) {
		
		$query = $this->db->select('author', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/authors/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		// delete the entry
		$delete = $this->db->delete('author', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }	
	
    /**
     * Technology Delete
     *
     */
    public function technologyDelete($delete) {
		
		$query = $this->db->select('technologies', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/technologies/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		// delete the entry
		$delete = $this->db->delete('technologies', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }	
	
    /**
     * User Delete
     *
     */
    public function userDelete($delete) {
		
		$query = $this->db->select('user', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/users/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		if($row["imagelocation"] != "default.png"):
		  unlink($path.$row["imagelocation"]);
		endif;
		
		if($row["bg_imagelocation"] != "wave.jpg"):
		  unlink($path.$row["bg_imagelocation"]);
		endif;
		
		// delete the entry
		$delete = $this->db->delete('user', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
	
    /**
     * Delete FAQ
     *
     */
    public function delete_faq($delete) {
		
		 // delete the entry
		$delete = $this->db->delete('faq', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * Delete Category
     *
     */
    public function delete_category($delete) {
		
		$query = $this->db->select('category', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/categories/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		 // delete the entry
		$delete = $this->db->delete('category', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * Delete Skill
     *
     */
    public function delete_skill($delete) {
		
		 // delete the entry
		$delete = $this->db->delete('skills', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * Delete Work Experience
     *
     */
    public function delete_workexperience($delete) {
		
		 // delete the entry
		$delete = $this->db->delete('about_info', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }	
	
    /**
     * Delete Education
     *
     */
    public function delete_education($delete) {
		
		 // delete the entry
		$delete = $this->db->delete('about_info', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }	
	
    /**
     * Delete Portfolio
     *
     */
    public function delete_portfolio($delete) {
		
		$query = $this->db->select('portfolio', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/portfolio/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		// delete the entry
		$delete = $this->db->delete('portfolio', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * Delete Project
     *
     */
    public function delete_project($delete) {
		
		$query = $this->db->select('projects', '*', ["id" => $delete]);
		foreach($query as $row){}

		$q1 = $this->db->select("proposals", "*", ["projectid" => $row['projectid']]);	
		foreach($q1 as $r1) {
			$m = $this->db->delete('notifications', ["id" => $r1['nid']]);
		}	 
		
		// delete the entry
		$hd = $this->db->delete('proposals', ["projectid" => $row['projectid']]);
		$q2 = $this->db->delete('projects', ["id" => $delete]);
		  
		return $q2->rowCount();  
    }
	
    /**
     * Delete Proposal
     *
     */
    public function delete_proposal($delete) {
		

		$q1 = $this->db->select("proposals", "*", ["id" => $delete]);	
		foreach($q1 as $r1) {}	 
		 
		$q3 = $this->db->delete("notifications", [	
					"OR #relative" => [
					   "OR #first" => [
							"AND" => [
								"projectid" => $r1["projectid"],
								"user_sending" => $r1["freelancerid"],
								"user_receiving" => $r1["clientid"]
							]
						],
					   "OR #second" => [
							"AND" => [
								"projectid" => $r1["projectid"],
								"user_sending" => $r1["clientid"],
								"user_receiving" => $r1["freelancerid"]
							]
						 ]
					  ]
				]);	 
		 
		//$query = $database->delete("notifications", ["jobid" => $r1["jobid"]]);
		
		$q2 = $this->db->select("conversation", "*", ["AND" => ["projectid" => $r1["projectid"], "freelancerid" => $r1["freelancerid"]]]);
		foreach($q2 as $r2) {}
		 
		$q4 = $this->db->delete('conversation_reply', ["cid" => $r2["cid"]]);
		
		$q5 = $this->db->delete('proposals', ["id" => $delete]);
		
		  
		return $q5->rowCount();  
    }
	
    /**
     * Delete Chat
     *
     */
    public function delete_chat($delete) {
		

		$q1 = $this->db->select("conversation_reply", "*", ["id" => $delete]);	
		foreach($q1 as $r1) {}	 
	 
		$q2 = $this->db->delete('notifications', ["id" => $r1["nid"]]);
		$q3 = $this->db->delete('conversation_reply', ["id" => $delete]);
		
		  
		return $q3->rowCount();  
    }
	
    /**
     * Delete Dispute
     *
     */
    public function delete_dispute($delete) {
		

		$q3 = $this->db->delete('dispute_conversation_reply', ["id" => $delete]);
		
		  
		return $q3->rowCount();  
    }
	
    /**
     * Decline invite
     *
     */
    public function decline_invite($delete) {
		
	 
		//Update
		$Update = $this->db->update('invite',[
		   'action' => 2,
		   'date_declined' => date('Y-m-d H:i:s')
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }
	
    /**
     * Delete File
     *
     */
    public function delete_file($delete) {
		
		$query = $this->db->select('files', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/files/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["fileupload"]);
		
		// delete the entry
		$d = $this->db->delete('notifications', ["id" => $row["nid"]]);
		$delete = $this->db->delete('files', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * Delete Rating
     *
     */
    public function delete_rating($delete) {
		
		$query = $this->db->select('ratings', '*', ["id" => $delete]);
		foreach($query as $row){}
		
		// delete the entry
		$d = $this->db->delete('notifications', ["id" => $row["nid"]]);
		$delete = $this->db->delete('ratings', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }
	
    /**
     * verify_user
     *
     */
    public function verify_user($delete) {
		
	 
		//Update
		$Update = $this->db->update('user',[
		   'verified' => 1
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }
	
    /**
     * decline_user
     *
     */
    public function decline_user($delete) {
		
	 
		//Update
		$Update = $this->db->update('user',[
		   'verified' => 2
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }
	
    /**
     * unverify_user
     *
     */
    public function unverify_user($delete) {
		
	 
		//Update
		$Update = $this->db->update('user',[
		   'verified' => 3
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }
	
    /**
     * pay_freelancer
     *
     */
    public function pay_freelancer($delete) {
		
	 
		//Update
		$Update = $this->db->update('withdrawals',[
		   'action' => 2,
		   'date_paid' => date('Y-m-d H:i:s')
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }
	
    /**
     * How Section Delete
     *
     */
    public function delete_how_section($delete) {
		
		$query = $this->db->select('how_it_works', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/how/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		// delete the entry
		$delete = $this->db->delete('how_it_works', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }	
	
    /**
     * Delete Customer
     *
     */
    public function delete_customer($delete) {
		
		$query = $this->db->select('customers', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/customer/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		// delete the entry
		$delete = $this->db->delete('customers', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }	
	
    /**
     * Delete Team
     *
     */
    public function delete_team($delete) {
		
		$query = $this->db->select('team', '*', ["id" => $delete]);
		foreach($query as $row){}
		
        $path = sprintf('%s/../../%s/%s/admin/team/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
		
		// unlink images
		unlink($path.$row["imagelocation"]);
		
		// delete the entry
		$delete = $this->db->delete('team', ["id" => $delete]);
		  
		return $delete->rowCount();  
    }


    public function complete_bank($delete) {
		
		$query = $this->db->select('funds', '*', ["id" => $delete]);
		foreach($query as $row){}
		
		$q1 = $this->db->select('user', '*', ["userid" => $row['clientid']]);
		foreach($q1 as $r1){}
		
		$amount_new = $row['amount'] + $r1['credit_account'];
		  
		$Up = $this->db->update('user',[
		   'credit_account' => $amount_new
		],[
		    'userid' => $row['clientid']
		  ]);
		
		//Update
		$Update = $this->db->update('funds',[
		   'complete' => 1
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }

    public function in_complete_bank($delete) {
		
		//Update
		$Update = $this->db->update('funds',[
		   'complete' => 2
		],[
			"AND" => ["id" => $delete]
		  ]);	
		
		  
		return $Update->rowCount();  
    }	

}