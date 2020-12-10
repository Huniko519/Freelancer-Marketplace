<?php

namespace Fir\Libraries;

/**
 * 
 */
class Admin {
	private $_db,
	        $_data,
			$_sessionAdmin,
			$_cookieName,
			$_isLoggedIn;
	
	public function __construct($db = null, $admin = null) 
	{
	 $this->_db = $db;

	 $this->_sessionAdmin = Config::get('session/session_admin');		
	 $this->_cookieName = Config::get('remember/cookie_name');	
	 
	 
	 if (!$admin) {
		if (Session::exists($this->_sessionAdmin)) {
		  $admin = Session::get($this->_sessionAdmin);
		  if ($this->find($admin)) {
			 $this->_isLoggedIn = true;
		  }else {
			  //Process logout
		  }		
		} 
	 } else {
		 $this->find($admin);
	 }
	}
	
	public function find($admin = null)
	{
	  if ($admin) {
		 $field = (is_numeric($admin)) ? 'adminid' : 'email';
		 $datas = $this->_db->select("admin", "*", [$field => $admin]);
         foreach($datas as $data) {}		 
		 
		 if($datas == true){
			 if ($data) {
				$this->_data = $data;
				return true;  
			 }
		 }
	  }	
	 return false;	
	}
	
	public function login($email = null, $password = null, $remember = false)
	{
	 if (!$email && !$password && $this->exists()) {
	 	Session::put($this->_sessionAdmin, $this->data()["adminid"]);
		 
	 } else {
		 
	  $admin = $this->find($email);
	  if ($admin) {			  
		  
		 if (password_verify($password, $this->data()["password"])) {
			Session::put($this->_sessionAdmin, $this->data()["adminid"]);
			
			if ($remember) {
			 $hash = Hash::unique();
			 $hashCheck = $this->_db->has("users_session", ["user_id" => $this->data()["adminid"]]);
			 
			 if (!$hashCheck) {
				$this->_db->insert('users_session', array(
				  'user_id' => $this->data()["adminid"],
				  'hash' => $hash
				)); 
			 } else {
				 
				 $hashMade = $this->_db->has("users_session", "*", ["user_id" => $this->data()["adminid"]]);
				 foreach($hashMade as $made) {}
			 
			   $hash = $made["hash"];
			 }
			 Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
			} 
			 
			return true; 
		 } 
	  }
	 }
	  return false;
	}
		
	public function exists()
	{
	 return (!empty($this->_sessionAdmin)) ? true : false;	
	}
	
	public function logout()
	{
	  $this->_db->delete("users_session", ["user_id" => $this->data()["adminid"]]);
		
	  Session::delete($this->_sessionAdmin);
	  Cookie::delete($this->_cookieName);
	}
	
	public function data()
	{  
	  return $this->_data;
	}
	
	
    public function isLoggedIn()
	{
	  return $this->_isLoggedIn;
	}
	
}




?>