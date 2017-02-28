<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
    public function index()
        {  $this->load->view('templates/header');
		   $this->load->model('jugadores');
		   $data['jugadores'] = $this->jugadores->get_rows();
		   
           $this->load->view('home_view',$data);
           $this->load->view('templates/footer');
    	}
}