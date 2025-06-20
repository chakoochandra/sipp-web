<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Tunnel extends CI_Controller
{
	function index($i = 0)
	{
		switch ($i) {
			case 1:
				$this->load->view('tunnel/1243');
				break;
			default:
				$this->load->view('tunnel/88');
				break;
		}
	}
}
