<?php
    class Inicio extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("principal");
        }

        public function index(){
            $this->load->library('session');
            if ($this->session->userdata("usuario")){
                $data["lista"] = $this->principal->list();
                $this->load->view("home",$data);
            } else {
                redirect("Login");
            }
        }

        public function eliminar($id){
            $this->principal->delete($id);
            redirect("Inicio");
        }

    }

?>