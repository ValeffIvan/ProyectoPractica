<?php
    class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            
            $this->load->model("usuario");
        }
        public function index(){
            $this->load->library("session");
            $this->session->sess_destroy();
            $this->load->view("login");
        }

        public function login(){
            $nombre = $this->input->post("nombre");
            $pass = $this->input->post("password");
            $log= $this->usuario->ingresar($nombre,$pass);
            if($log){
                $this->load->library('session');
                $this->session->set_userdata('usuario',$nombre);
                redirect('Inicio');
            }else{
                redirect('Login');
            }
        }


    }

?>