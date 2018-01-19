<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->data = array(
			'title' => "RTLH - Sistem Informasi Rumah Tidak Layak Huni - Dinas Perumahan Rakyat dan Kawasan Permukiman Provinsi Bangka Belitung"
		);

		$this->load->view('portal', $this->data);
	}

	function has()
	{
		echo password_hash('admin',PASSWORD_DEFAULT);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */