<?php
    class articulos extends Conectar{

                public function get_articulos(){
                    $conectar= parent::conexion();
                    parent::set_names();
                    $sql="SELECT * FROM  ma_articulos WHERE estado=1";
                    $sql=$conectar->prepare($sql);
                    $sql->execute();
                    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
                }

                Public function get_articulo($ID){
                    $conectar= parent::conexion();
                    parent::set_names();
                    $sql="SELECT * FROM ma_articulos WHERE ESTADO=1 AND ID = ?";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1,$ID);
                    $sql->execute();
                    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
                }

                public function insert_articulo($DESCRIPCION,$UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ID_SOCIO){
                    $conectar=parent::conexion();
                    parent::set_names();
                    $sql="INSERT INTO ma_articulos (ID,DESCRIPCION,UNIDAD,COSTO,PRECIO,APLICA_ISV,PORCENTAJE_ISV,ESTADO,ID_SOCIO) VALUES (NULL,?,?,?,?,?,?,1,?);";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1,$DESCRIPCION);
                    $sql->bindValue(2,$UNIDAD);
                    $sql->bindValue(3,$COSTO);
                    $sql->bindValue(4,$PRECIO);
                    $sql->bindValue(5,$APLICA_ISV);
                    $sql->bindValue(6,$PORCENTAJE_ISV);
                    $sql->bindValue(7,$ID_SOCIO);
                    $sql->execute();
                    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                }
                public function update_articulo($ID,$DESCRIPCION,$UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ESTADO,$ID_SOCIO){
                    $conectar= parent::conexion();
                    parent::set_names();
                    $sql="UPDATE ma_articulos SET DESCRIPCION=?,UNIDAD=?,COSTO=?,PRECIO=?,APLICA_ISV=?,PORCENTAJE_ISV=?,ESTADO=?,ID_SOCIO=? WHERE ID = ?;";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1,$DESCRIPCION);
                    $sql->bindValue(2,$UNIDAD);
                    $sql->bindValue(3,$COSTO);
                    $sql->bindValue(4,$PRECIO);
                    $sql->bindValue(5,$APLICA_ISV);
                    $sql->bindValue(6,$PORCENTAJE_ISV);
                    $sql->bindValue(7,$ESTADO);
                    $sql->bindValue(8,$ID_SOCIO);
                    $sql->bindValue(9,$ID);
                    $sql->execute();
                    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
                
                }
                Public function delete_articulo($ID){
                    $conectar= parent::conexion();
                    parent::set_names();
                    $sql="DELETE FROM ma_articulos WHERE ID=?;";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1,$ID);
                    $sql->execute();
                    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
                }
    }
        
?>

