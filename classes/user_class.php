<?php

require_once 'db_class.php';

class User {

	public $user_id;
	public $first_name;
	public $last_name;
	public $twitter_id;
	public $dob;
	public $display_image;

	//this will be called whenever new object of user class will be created
	function __construct($data) {

/*		$this->user_id = if(isset($data['id'])) $data['id']; else "";
		$this->first_name = if(isset($data['first_name'])) $data['first_name']; else "";
		$this->last_name = if(isset($data['last_name'])) $data['last_name']; else "";
		$this->dob = if(isset($data['dob'])) $data['dob']; else "";
		$this->display_image = if(isset($data['display_image'])) $data['display_image']; else "";*/

		$this->user_id = (isset($data['id'])) ? $data['id'] : "";
		$this->first_name = (isset($data['first_name'])) ? $data['first_name'] : "";
		$this->last_name = (isset($data['last_name'])) ? $data['last_name'] : "";
		$this->dob = (isset($data['dob'])) ? $data['dob'] : "";
		$this->display_image = (isset($data['display_image'])) ? $data['display_image'] : "";
	}

	public function save($isNewUser = false) {
		
		//create a new database object
		$db = new DatabaseConnection();
		
		//if existing user then udpate the current record
		if(!$isNewUser)
		{
			//set the data array
			$data = array(
				"first_name" => $this->first_name,
				"last_name" => $this->last_name,
				"dob" => $this->dob,
				"display_image" => $this->display_image
			);
			
			//update the record in the database
			$db->updateRecord($data, 'users', 'id = '.$this->user_id);
		}
		else
		{
			//if new user
			$data = array(
				"first_name" => $this->first_name,
				"last_name" => $this->last_name,
				"dob" => $this->dob,
				"twitter_id" => $this->twitter_id,
				"display_image" => $this->display_image
			);
			
			$this->user_id = $db->insertRecord($data, 'users');
		}

		return true;
	}
}