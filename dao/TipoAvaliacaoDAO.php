<?php

include_once ('./dao/iTipoAvaliacaoDAO.php');
include_once ('./model/TipoAvaliacaoModel.php');

class TipoAvaliacaoDAO implements iTipoAvaliacaoDAO {

	public function save(TipoAvaliacaoModel $tipoAvaliacao){
            $json = Array();
            try{
                $sql = "INSERT INTO c_tipo_avaliacao
                                (c_ta_descricao)
                            VALUES
                                (?)";
                $parametros = array($tipoAvaliacao->getNome());
                
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
        
	public function update(TipoAvaliacaoModel $tipoAvaliacao){
            
            $json = Array();
            try{
                $sql = "UPDATE c_tipo_avaliacao
                        SET
                            c_ta_descricao = ?
                        WHERE 
                            c_ta_id = ?";
                
                $parametros = array($tipoAvaliacao->getNome(),
                                    $tipoAvaliacao->getId());
                
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

	public function view(TipoAvaliacaoModel $tipoAvaliacao){
            $json = Array();
            try{
                $sql = "SELECT 
                            t.c_ta_id as id, 
                            t.c_ta_descricao as descricao
                        FROM 
                            c_tipo_avaliacao as t
                        WHERE
                            t.c_ta_id = ?";
                
                $parametros = array($tipoAvaliacao->getId());
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
                            t.c_ta_id as id, 
                            t.c_ta_descricao as descricao
                        FROM 
                            c_tipo_avaliacao as t";
                
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

	public function delete(TipoAvaliacaoModel $tipoAvaliacao){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_tipo_avaliacao
                        WHERE
                            c_ta_id = ?";
                
                $parametros = array($tipoAvaliacao->getId());
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
        
	public function listaTiposParaLancamento(MatriculaDisciplinaModel $md){
            $json = Array();
            try{
                $sql = "SELECT 
                            t.c_ta_id as id, 
                            t.c_ta_descricao as descricao
                        FROM 
                            c_tipo_avaliacao as t";
                
                $parametros = array();
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        
                        $tipoAvaliacao = new TipoAvaliacaoModel();
                        $tipoAvaliacao->setId($dados->id);
                        
                        if($this->verficaNotaLancada($md, $tipoAvaliacao) == "false"){
                            array_push($json, $dados);
                        }
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
        
	public function verficaNotaLancada(MatriculaDisciplinaModel $md, TipoAvaliacaoModel $tipoAvaliacao){
            try{
                $sql = "SELECT 
                            *
                        FROM 
                            c_nota
                        WHERE
                            c_ta_id = ? AND
                            c_md_id = ?";
                
                $parametros = array($tipoAvaliacao->getId(), $md->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return "true";
                }else{
                    return "false";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }          
	}          
}