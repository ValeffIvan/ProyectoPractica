<?php
    class principal extends CI_Model{
        protected $tabla= "tareas";

        public function list(){
            $this->db->select("*");
            return $this->db->get($this->tabla)->result_array();
        }

        public function add($nombre,$descripcion){
            $data = array(
                "nombre"=> $nombre,
                "descripcion"=> $descripcion
            );
            $this->db->insert($this->tabla,$data);
        }

        public function delete($id){
            $this->db->where("id_tarea", $id);
            $this->db->delete($this->tabla);
        }

        public function get_by_id($id){
            $this->db->where("id_tarea", $id);
            return $this->db->get($this->tabla)->row_array();
        }

        public function update($id,$nombre,$descripcion){
            $data = array(
                "nombre"=> $nombre,
                "descripcion"=> $descripcion
            );
            $this->db->where("id_tarea", $id);
            $this->db->update($this->tabla,$data);
        }

        public function updateState($id,$state){
            if ($state== "1")
                $this->db->set("estado",2);
            else if ($state== "2") 
                $this->db->set("estado",0);
            else if ($state== "0")
                $this->db->set("estado",1);
            $this->db->where("id_tarea", $id);
            $this->db->update($this->tabla);
        }
    }

?>