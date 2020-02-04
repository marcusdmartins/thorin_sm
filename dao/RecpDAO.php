<?php

include_once ('./dao/iRecpDAO.php');
include_once ('./dao/MediaDAO.php');
include_once ('./model/MatriculaDisciplinaModel.php');

class RecpDAO implements iRecpDAO {

	public function save(RecpModel $recp){
            $json = Array();
            try{
                $sql = "INSERT INTO c_recp
                                (c_media_id, 
                                c_recp_tipo,
                                c_recp_valor,
                                c_recp_dataavaliacao, 
                                c_pessoa_id)
                            VALUES
                                (?,?,?,?,?)";
                
                $parametros = array($recp->getMedia()->getId(),
                                    $recp->getTipo(),
                                    $recp->getValor(),
                                    $recp->getDataAvaliacao(),
                                    $recp->getPessoaLog()->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $media = new MediaMDModel();
                    $media->setId($recp->getMedia()->getId());
                    $daoMedia = new MediaDAO();
                    $daoMedia->recuperarMedia($media, $recp->getValor());
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
        
	public function update(RecpModel $recp){
            
            $json = Array();
            try{
                $sql = "UPDATE c_recp
                        SET
                            c_md_id = ?,
                            c_recp_dataAvaliacao = ?, 
                            c_recp_valor = ?, 
                            c_ta_id = ?, 
                            c_pessoa_id = ?
                        WHERE 
                            c_recp_id = ?";
                
                $parametros = array($recp->getMatriculaDisplina()->getId(),
                                    $recp->getDataAvaliacao(),
                                    $recp->getValor(),
                                    $recp->getTipoAvaliacao()->getId(),
                                    $recp->getPessoaLog()->getId(),
                                    $recp->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $md = new MatriculaDisciplinaModel();
                    $md->setId($recp->getMatriculaDisplina()->getId());
                    $daoMedia = new MediaDAO();
                    $daoMedia->gerarMedias($md);                    
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

	public function view(RecpModel $recp){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_recp_id as id, 
                            n.c_md_id as matricula_disciplia_id, 
                            n.c_recp_dataAvaliacao as data_avaliacao, 
                            n.c_recp_dataLancamento as data_lancamento, 
                            n.c_recp_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_recp as n
                        WHERE
                            n.c_recp_id = ?";
                
                $parametros = array($recp->getId());
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
                            n.c_recp_id as id, 
                            n.c_md_id as matricula_disciplia_id, 
                            n.c_recp_dataAvaliacao as data_avaliacao, 
                            n.c_recp_dataLancamento as data_lancamento, 
                            n.c_recp_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_recp as n";
                
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

	public function delete(RecpModel $recp){
            $json = Array();
            $recp_1 = $this->viewInterno($recp);
            try{
                $sql = "DELETE FROM 
                            c_recp
                        WHERE
                            c_recp_id = ?";
                
                $parametros = array($recp->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    
                    $md = new MatriculaDisciplinaModel();
                    $md->setId($recp_1->md);
                    
                    $daoMedia = new MediaDAO();
                    $daoMedia->gerarMedias($md);
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