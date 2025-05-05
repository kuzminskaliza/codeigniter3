<?php
// Controller for handling login and register functionality
defined('BASEPATH') or exit('No direct script access allowed');

/** @property CI_Migration $migration */
class Migrate extends CI_Controller
{
	/** @property string Ci_Loader $load */
	public $load;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
	}

	public function up()
	{
		if (!is_cli()) {
			show_error('No direct script access allowed');
		}

		if ($this->migration->current() === FALSE) {
			show_error($this->migration->error_string());
		}

		echo "Migration done." . PHP_EOL;
	}

	public function down(int $version)
	{
		if (!is_cli()) {
			show_error('No direct script access allowed');
		}

		if ($this->migration->version($version) === FALSE) {
			show_error($this->migration->error_string());
		}

		echo "Migration done." . PHP_EOL;
	}
}
