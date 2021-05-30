<?php

    class Conectar{

        protected $db_host;

        protected function conexion(){
            try {
                $conectar = $this->db_host = new PDO("mysql:local=localhost;dbname=crud","root","");
                return $conectar;
            } catch (Exception $ex) {
                return -1;
                die();
            }
        }

        public function set_names(){
			return $this->db_host->query("SET NAMES 'utf8'");
        }
        
    }

?>