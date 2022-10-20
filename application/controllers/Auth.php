<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title'     => 'Trackless Money',
			'content'   => 'home/index',
			'extra'     => 'home/js/js_index',
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function api_plugin()
	{
		$data = array(
			'title'     => 'Trackless Money',
			'content'   => 'home/api_plugin',
		);
		$this->load->view('layout/wrapper', $data);
	}
}