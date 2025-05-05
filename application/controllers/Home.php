<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** @property CrudService $crudservice */
class Home extends CI_Controller
{
	/** @property string Ci_Loader $load */
	public $load;
	public function __construct()
	{
		parent::__construct();
		$this->load->library('crudService');
	}

	public function index()
	{
		$this->crudservice->loadView();
	}

	public function login()
	{
		$this->crudservice->login();
	}

	public function register()
	{
		$this->crudservice->register();
	}

	public function logout()
	{
		$this->crudservice->logout();
	}

}
