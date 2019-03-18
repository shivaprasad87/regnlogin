<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function index()
	{
		$this->load->view("Register");
	}
	function register()
	{
		if(isset($_POST['register']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$mobile =$_POST['mobile'];
			$data=array('username'=>$username,'password'=>$password,'email'=>$email,'mobile'=>$mobile);
			$this->load->model('registermodel');
			if(($this->registermodel->register($data))==true)
			{
				echo "<script>alert('you are registered successfully');</script>";
				echo "<script>location.href='/user';</script>";
			}
			else
			{

			}
		}


		}
		function profile(){
			$this->load->view('profile','refresh');
		}
		function login()
		{
			if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$data=array('username'=>$username,'password'=>$password);
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($data);
			$query=$this->db->get();
			$user = $query->row();
			if($user->email)
			{
				$this->session->set_flashdata("success","you are logged in");
				$_SESSION['user_loged']=true;
				$_SESSION['username']=$user->username;

				echo "<script>alert('logined successfully');location.href='profile';</script>";
			}
			else
			{
				$this->session->set_flashdata("error","no such account found");
				redirect('user');
			}
		}
		}
		public function logout()
		{
			unset($_SESSION);
			echo "<script>alert('you are logged out');location.href='index';</script>";
		}
	}



?>