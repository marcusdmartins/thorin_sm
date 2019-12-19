<?php

include_once ('./dao/iNivelDAO.php');

class NivelDAO implements iNivelDAO {

	public function save(NivelModel $nivel){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_nivel`
                                (c_nivel_s_nome)
                            VALUES
                                (?)";
                $parametros = array($nivel->getNome());
                
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
        
	public function update(NivelModel $nivel){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_nivel`
                        SET
                            c_nivel_s_nome = ?
                        WHERE 
                            `c_nivel_i_id` = ?";
                
                $parametros = array($nivel->getNome(),
                                    $nivel->getId());
                
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

	public function view(NivelModel $nivel){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_nivel_i_id as id, 
                            n.c_nivel_s_nome as nome
                        FROM 
                            c_nivel as n
                        WHERE
                            n.c_nivel_i_id = ?";
                
                $parametros = array($nivel->getId());
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
                            n.c_nivel_i_id as id, 
                            n.c_nivel_s_nome as nome
                        FROM 
                            c_nivel as n";
                
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

	public function delete(NivelModel $nivel){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_nivel
                        WHERE
                            c_nivel_i_id = ?";
                
                $parametros = array($nivel->getId());
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
            
            header("Content-Type: application/ json");
            echo json_encode ($json);             
	}
}