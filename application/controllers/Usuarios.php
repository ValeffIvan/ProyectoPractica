<?php
    class Usuarios extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("usuario");
        }
        public function index(){
            $id = $this->input->get("id");
            $si = $this->input->get("si");
            $this->load->library("session");
            if ($this->session->userdata("usuario")&&$si=="1"){
                $data["usuarios"]=$this->usuario->get();
                $this->load->view("usuarios",$data);
            }else if($this->session->userdata("usuario")&& $id){
                $data["usuario"] = $this->usuario->get_by_id($id);
                $this->load->view("modificarusuario",$data);
            }else{
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

        public function modificar(){
            $id = $this->input->post('id');
            $name = $this->input->post("nombre");
            $pass = $this->input->post("password");
            $data = array(
                "nombre"=> $name,
                "password"=> $pass
            );
            $this->usuario->update($id,$data);
            redirect("usuarios?si=1");
        }

    }

?>