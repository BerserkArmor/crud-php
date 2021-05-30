<?php

    class Producto extends Conectar{

        public function get_producto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE est=1";

            $sql = conectar::conexion()->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function get_producto_by_id($prod_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE id=:prod_id";

            $sql = conectar::conexion()->prepare($sql);
            $sql->bindValue(":prod_id", $prod_id, PDO::PARAM_INT);
            $sql->execute();

            return $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
        }

        public function delete_producto($prod_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    est=0,
                    fech_elim=now()
                WHERE
                    prod_id =:prod_id";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(":prod_id",$prod_id, PDO::PARAM_INT);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_producto($prod_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_producto (prod_id, prod_nom, fech_crea, fech_modi, fech_elim, est) VALUES (NULL,:prod_nom, now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue("prod_nom",$prod_nom, PDO::PARAM_STR);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_producto($prod_id,$prod_nom){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    prod_nom=:prod_nom,
                    fech_modi=now()
                WHERE
                    prod_id =:prod_id";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(":prod_nom",$prod_nom, PDO::PARAM_STR);
            $sql->bindValue(":prod_id",$prod_id, PDO::PARAM_INT);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }



    }
    


?>