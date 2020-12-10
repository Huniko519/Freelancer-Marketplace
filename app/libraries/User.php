<?php

namespace Fir\Libraries;

/**
 * 
 */
class User {
	private $_db,
	        $_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;
	
	public function __construct($db = null, $user = null) 
	{
	 $this->_db = $db;
	 
	 $this->_sessionName = Config::get('session/session_name');		
	 $this->_cookieName = Config::get('remember/cookie_name');	
	 
	 if (!$user) {
		if (Session::exists($this->_sessionName)) {
		  $user = Session::get($this->_sessionName);
		  if ($this->find($user)) {
			 $this->_isLoggedIn = true;
		  }else {
			  //Process logout
		  }		
		} 
	 } else {
		 $this->find($user);
	 }
	}
	
	public function find($user = null)
	{
	  if ($user) {
		 $field = (is_numeric($user)) ? 'userid' : 'email';
		 $datas = $this->_db->select("user", "*", [$field => $user]);
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
	 	Session::put($this->_sessionName, $this->data()["userid"]);
		 
	 } else {
		 
	  $user = $this->find($email);
	  if ($user) {			  
		  
		 if (password_verify($password, $this->data()["password"])) {
			Session::put($this->_sessionName, $this->data()["userid"]);
			 	  
			
			if ($remember) {
			 $hash = Hash::unique();
			 
				 $hashChecks = $this->_db->select("users_session", "*", ["user_id" => $this->data()["userid"]]);
				 foreach($hashChecks as $hashCheck) {}	
				 
			  $hash_has = $this->_db->has("users_session", ["user_id" => $this->data()["userid"]]);	
			  if ($hash_has == false) {
			 
				$this->_db->insert('users_session', array(
				  'user_id' => $this->data()["userid"],
				  'hash' => $hash
				)); 
			 } elseif($hash_has == true) {
			   $hash = $hashCheck["hash"];
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
	 return (!empty($this->_sessionName)) ? true : false;	
	}
	
	public function logout()
	{
	  $this->_db->delete("users_session", ["user_id" => $this->data()["userid"]]);
		
	  Session::delete($this->_sessionName);
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