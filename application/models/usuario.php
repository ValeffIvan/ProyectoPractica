<?php
    class usuario extends CI_Model {
        protected $tabla = "usuarios";

        public function ingresar($nombre, $password){
            $this->db->select("*");
            $this->db->from($this->tabla);
            $this->db->where("nombre", $nombre);
            $this->db->where("password", $password);
            $query = $this->db->get()->row_array();
            if($query["estado"]==1){
                return true;
            }else{
                return false;
            }
        }

        public function create($nombre, $password){
            $data= array("nombre"=> $nombre,"password"=> $password);
            $this->db->insert($this->tabla, $data);
        }

        public function delete($id){
            $this->db->where("id", $id);
            $this->db->delete($this->tabla);
        }
        
    }

?>