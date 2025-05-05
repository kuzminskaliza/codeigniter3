<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** @property CrudService $crudservice */
class Crud extends CI_Controller
{
	/** @property string Ci_Loader $load */
	public $load;
	public function __construct()
	{
		parent::__construct();
		$this->load->library('crudService');
	}

	public function addData()
	{
		$this->crudservice->addData();
	}

	public function updateData()
	{
		$this->crudservice->updateData();
	}

	public function deleteData($id)
	{
		$this->crudservice->deleteData($id);
	}

	public function getData($id)
	{
		$this->crudservice->getData($id);
	}

	public function allData()
	{
		$this->crudservice->allData();
	}

	public function resetPassword($id)
	{
		$this->crudservice->resetPassword($id);
	}

	public function passwordVerify()
	{
		$this->crudservice->passwordVerify();
	}
}
