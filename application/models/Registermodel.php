<?php

class Registermodel extends CI_Model
{
	public function register($data)
	{
		$this->db->insert('user',$data);
		return true;
	}
}


?>