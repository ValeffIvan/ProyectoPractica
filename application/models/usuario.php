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

        public function get(){
            $this->db->select("*");
            return $this->db->get($this->tabla)->result_array();
        }

        public function update($id, $data){
            $this->db->where("id_usuario", $id);
            $this->db->update($this->tabla, $data);
        }

        public function delete($id){
            $this->db->where("id_usuario", $id);
            $this->db->delete($this->tabla);
        }

        public function changeState($id, $state){
            $this->db->where("id_usuario", $id);
            if ($state== 1){
                $this->db->set("estado",0);
            }else{
                $this->db->set("estado",1);
            }
            $this->db->update($this->tabla);
        }

        public function get_by_id($id){
            $this->db->select("*");
            $this->db->where("id_usuario", $id);
            $this->db->limit(1);
            return $this->db->get($this->tabla)->row_array();
        }
    }

?>