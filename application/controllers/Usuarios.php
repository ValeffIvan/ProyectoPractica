<?php
    class Usuarios extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("usuario");
        }
        public function index(){
            $this->load->view("crearusuarios");
        }

        public function crear(){
            $nombre = $this->input->post("nombre");
            $pass = $this->input->post("password");
            $this->usuario->create($nombre,$pass);
            redirect('Login');
        }


    }

?>