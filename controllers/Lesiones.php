<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lesiones extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('lesion_jugador');
    }
    
    public function inserta_lesion(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){

  		    $userData = array(
                'nombre' => strip_tags($this->input->post('nombre')),
                'apellidos' => strip_tags($this->input->post('apellidos')),
                'dni' => strip_tags($this->input->post('dni')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'estado' => 1,
            );

            if($this->form_validation->run() == true){
                $insert = $this->usuario->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Registro válido. La cuenta de '.$userData['email'].' está lista para hacer login; ID='.$insert);
                    redirect('usuarios/login');
                }else{
                    $data['error_msg'] = 'Ha ocurrido algún error. Inténtalo de nuevo';
                }
            }
        }
		$userData['nombre']='Nombre nuevo';
        $data['usuario'] = $userData;
        $this->load->view('usuarios/registro', $data);
    }
    
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('usuarios/login/');
    }
    
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->usuario->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'El email introducido ya existe.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}