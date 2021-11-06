<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:host=34.68.196.220;dbname=g4_20","G4_20","WDtmNb69");
                return $conectar;   
            } catch(Exception $e) {
              print "¡Error BD!: " . $e->getMessage() . "<br/>";
              die();  
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>