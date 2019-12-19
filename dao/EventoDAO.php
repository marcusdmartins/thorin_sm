<?php

include_once ('./dao/iEventoDAO.php');

class EventoDAO implements iEventoDAO {

	public function save(EventoModel $evento){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_evento`
                                (c_evento_data, 
                                c_evento_hora, 
                                c_evento_descricao, 
                                c_evento_status)
                            VALUES
                                (?,?,?,?)";
                $parametros = array($evento->getData(), 
                                    $evento->getHora(), 
                                    $evento->getDescricao(),
                                    $evento->getStatus());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = array("codigo" => 0, "message" => "success");
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo" => 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/json");
            echo json_encode($json);
	}
        
	public function update(EventoModel $evento){
            $json = Array();
            try{
                $sql = "UPDATE `c_evento`
                        SET
                            c_evento_data = ?, 
                            c_evento_hora = ?, 
                            c_evento_descricao = ?,
                            c_evento_status = ?
                        WHERE 
                            c_evento_id = ?";
                
                $parametros = array($evento->getData(), 
                                    $evento->getHora(), 
                                    $evento->getDescricao(),
                                    $evento->getStatus(),
                                    $evento->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = array("codigo" => 0, "message" => "success");
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);             
	}        

	public function view(EventoModel $evento){
            $json = Array();
            try{
                $sql = "SELECT 
                            e.c_evento_id as id, 
                            e.c_evento_data as data, 
                            e.c_evento_hora as hora, 
                            e.c_evento_descricao as descricao, 
                            e.c_evento_status as status
                        FROM 
                            c_evento as e
                        WHERE
                            e.c_evento_id = ?";
                
                $parametros = array($evento->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = $rs->fetch(PDO::FETCH_OBJ);
                }else{
                    $json = array("codigo" => 1, "message" => "nenhum");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);
	}

	public function listAll(){
            $json = Array();
            try{
                $sql = "SELECT 
                            e.c_evento_id as id, 
                            e.c_evento_data as data, 
                            e.c_evento_hora as hora, 
                            e.c_evento_descricao as descricao, 
                            e.c_evento_status as status
                        FROM 
                            c_evento as e";
                
                $parametros = array();
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($json, $dados);
                    }
                }else{
                    $json = array("codigo" => 1, "message" => "nenhum");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);            
	}

	public function delete(EventoModel $evento){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_evento
                        WHERE
                            c_evento_id = ?";
                
                $parametros = array($evento->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = array("codigo" => 0, "message" => "success");
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);             
	}
}