<?php

namespace Fir\Libraries;
/**
 * 
 */
class Validator{
	
	protected $_db;
	protected $errorHandler;
	protected $items;
	protected $rules = ['required', 'minlength', 'maxlength', 'email', 'alnum', 'alpha', 'digit', 'float', 'match', 'unique'];
	
	public $messages = [
	   'required' => 'The :field field is required',
	   'minlength' => 'The :field field must be a minimum of :satisfier length',
	   'maxlength' => 'The :field field must be a maximum of :satisfier length',
	   'email' => 'That is not a valid email address',
	   'alnum' => 'The :field field must be alphanumeric',
	   'alpha' => 'The :field field must be alphabetic only',
	   'digit' => 'The :field field must be digits only',
	   'float' => 'The :field field must be float digits only',
	   'match' => 'The :field field must be match the :satisfier field',
	   'unique' => 'The :field is already taken'
	];
	
	public function __construct($db = null) 
	{
		$this->_db =  $db;
		$this->errorHandler = new ErrorHandler();
	}
	
	public function check($items, $rules)
	{
		$this->items = $items;
		
	  foreach ($items as $item => $value) {
		  if (in_array($item, array_keys($rules))) 
		  {
			$this->validate([
			   'field' => $item,
			   'value' => $value,
			   'rules' => $rules[$item]  
			]);  
		  }
	  }	
	  return $this;
	}
	
	public function fails()
	{
	  return $this->errorHandler->hasErrors();	
	}
	
	public function errors()
	{
	  return $this->errorHandler;	
	}
	
	protected function validate($item)
	{
	   $field = $item['field'];
	   foreach ($item['rules'] as $rule => $satisfier) 
	   {
		 if (in_array($rule, $this->rules)) 
		 {
		   if (!call_user_func_array([$this, $rule], [$field, $item['value'], $satisfier])) 
		   {
			 $this->errorHandler->addError(
			  str_replace([':field',':satisfier'], [$field, $satisfier], $this->messages[$rule]), 
			  $field
			  );  
		   }
		 }   
	   }	

	}
	
	protected function required($field, $value, $satisfier)
	{
	  return !empty(trim($value));	
	}
	
	protected function minlength($field, $value, $satisfier)
	{
	  return mb_strlen($value) >= $satisfier;	
	}
	
	protected function maxlength($field, $value, $satisfier)
	{
	  return mb_strlen($value) <= $satisfier;	
	}
	
	protected function email($field, $value, $satisfier)
	{
	  return filter_var($value, FILTER_VALIDATE_EMAIL);	
	}
	
	protected function alnum($field, $value, $satisfier)
	{
	  return ctype_alnum($value);	
	}
	
	protected function alpha($field, $value, $satisfier)
	{
	  return ctype_alpha($value);	
	}
	
	protected function digit($field, $value, $satisfier)
	{
	  return ctype_digit($value);	
	}
	
	protected function float($field, $value, $satisfier)
	{
	  return floatval($value);	
	}
	
	protected function match($field, $value, $satisfier)
	{
	  return $value === $this->items[$satisfier];	
	}
	
	protected function unique($field, $value, $satisfier)
	{
	  //return $this->_db->has($field, $value, $satisfier);	
	  $q1 = $this->_db->has("user", ["AND" => [$field => $value]]);
	  if($q1){
		return true;  
	  }else{
		return false;  
	  }
	  
	  //return $this->_db->has($satisfier, "*", [$field => $value]);
	  //return $this->_db->has($satisfier, [$field => $value]) ? true : false;	
	}
}



?>