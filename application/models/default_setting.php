<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Default_setting extends CI_Model {
	function __construct(){
    	// Call the Model constructor
    	parent::__construct();
    	date_default_timezone_set("Asia/Jakarta"); 
	}
}
?>