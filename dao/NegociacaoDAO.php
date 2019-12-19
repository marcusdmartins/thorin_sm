<?php

include_once ('./dao/iNegociacaoDAO.php');

class NegociacaoDAO implements iNegociacaoDAO {

	public function save(NegociacaoModel $negociacao){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_negociacao`
                                (c_neg_descricao, 
                                c_neg_data, 
                                c_neg_status)
                            VALUES
                                (?,?,?)";
                
                $parametros = array($negociacao->getDescricao(), 
                                    $negociacao->getData(),
                                    $negociacao->getStatus());
                
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
        
	public function update(NegociacaoModel $negociacao){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_negociacao`
                        SET
                            c_neg_descricao = ?, 
                            c_neg_data = ?, 
                            c_neg_status = ?
                        WHERE 
                            `c_neg_id` = ?";
                
                $parametros = array($negociacao->getDescricao(), 
                                    $negociacao->getData(),
                                    $negociacao->getStatus(),
                                    $negociacao->getId());
                
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

	public function view(NegociacaoModel $negociacao){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_neg_id as id, 
                            n.c_neg_descricao as descricao, 
                            n.c_neg_data as data, 
                            n.c_neg_status as status
                        FROM 
                            c_negociacao as n
                        WHERE
                            n.c_neg_id = ?";
                
                $parametros = array($negociacao->getId());
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
                            n.c_neg_id as id, 
                            n.c_neg_descricao as descricao, 
                            n.c_neg_data as data, 
                            n.c_neg_status as status
                        FROM 
                            c_negociacao as n";
                
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

	public function delete(NegociacaoModel $negociacao){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_negociacao
                        WHERE
                            c_neg_id = ?";
                
                $parametros = array($negociacao->getId());
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