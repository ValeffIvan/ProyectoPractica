<?php
    class Usuarios extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("usuario");
        }
        public function index(){
            $si = $this->input->get("si");
            $this->load->library("session");
            if ($this->session->userdata("usuario")&&$si=="1"){
                $data["usuarios"]=$this->usuario->get();
                $this->load->view("usuarios",$data);
            }else {
                $this->load->view("crearusuarios");
            }


        }

        public function crear(){
            $nombre = $this->input->post("nombre");
            $pass = $this->input->post("password");
            $this->usuario->create($nombre,$pass);
            $this->load->library("session");
            if ($this->session->userdata("usuario")){
                redirect('Usuarios?si=1');
            }else{
                redirect('Login');
            }
        }

        public function cambiarEstado($id,$estado){
            $this->usuario->changeState($id,$estado);
            redirect('Usuarios?si=1');
        }

        public function eliminar($id){
            $this->usuario->delete($id);
            redirect('Usuarios?si=1');
        }

    }

?>