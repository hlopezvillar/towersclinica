<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('usuario');
    }
    
    public function cuenta(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['usuario'] = $this->usuario->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('usuarios/cuenta', $data);
        }else{
            redirect('usuarios/login');
        }
    }
    
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'estado' => '1'
                );
                $checkLogin = $this->usuario->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('usuarios/cuenta/');
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        $this->load->view('usuarios/login', $data);
    }
    
    public function registro(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

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