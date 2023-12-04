<?php
    class Tareas extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("principal");
        }

        public function index(){
            $id = $this->input->get("id");
            $this->load->library("session");
            if($this->session->userdata("usuario") && $id==null){
                $this->load->view("creartarea");
            }else if($this->session->userdata("usuario") && $id!=null){
                $data["tarea"] = $this->principal->get_by_id($id);
                $this->load->view("modificartarea",$data);
            }else{
                redirect("/");
            }
        }

        public function agregar(){
            $nombre= $this->input->post("nombre");
            $descripcion = $this->input->post("descripcion");
            $this->principal->add($nombre,$descripcion);
            redirect("Inicio");
        }

        public function modificar(){
            $id = $this->input->post("id");
            $nombre = $this->input->post("nombre");
            $descripcion = $this->input->post("descripcion");
            $this->principal->update($id,$nombre,$descripcion);
            redirect("Inicio");
        }

        public function cambiarEstado($id,$estado){
            $this->principal->updateState($id,$estado);
            redirect("Inicio");
        }
    }
?>