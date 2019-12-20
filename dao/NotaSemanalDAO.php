<?php

include_once ('iNotaSemanalDAO.php');

class NotaSemanalDAO implements iNotaSemanalDAO {

	public function save(NotaSemanalModel $nota){
            $json = Array();
            try{
                $sql = "INSERT INTO c_notasemanal
                               (c_notasemanal_valor, 
                                c_tipo_avaliacao, 
                                c_md_id,
                                c_pessoa_id)
                            VALUES
                                (?,?,?,?)";
                
                $parametros = array($nota->getValor(),
                                    $nota->getTipoAvaliacao()->getId(),
                                    $nota->getMatriculaDisplina()->getId(),
                                    $nota->getPessoaLog()->getId());
                
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
            
//            header("Content-Type: application/json");
//            echo json_encode($json);
	}
        
	public function update(NotaSemanalModel $nota){
            
            $json = Array();
            try{
                $sql = "UPDATE c_notasemanal
                        SET
                            c_nota_dataAvaliacao = ?, 
                            c_nota_valor = ?, 
                            c_ta_id = ?, 
                            c_md_id = ?,
                            c_pessoa_id = ?
                        WHERE 
                            c_nota_id = ?";
                
                $parametros = array($nota->getDataAvaliacao(),
                                    $nota->getValor(),
                                    $nota->getTipoAvaliacao()->getId(),
                                    $nota->getMatriculaDisplina()->getId(),
                                    $nota->getPessoaLog()->getId(),
                                    $nota->getId());
                
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

	public function view(NotaSemanalModel $nota){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_notasemanal_id as id, 
                            n.c_notasemanal_dataavaliacao as data_avaliacao, 
                            n.c_notasemanal_datalancamento as data_lancamento, 
                            n.c_notasemanal_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            n.c_md_id as matricula_disciplina,
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_notasemanal as n
                        WHERE
                            n.c_notasemanal_id = ?";
                
                $parametros = array($nota->getId());
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
                            n.c_notasemanal_id as id, 
                            n.c_notasemanal_dataavaliacao as data_avaliacao, 
                            n.c_notasemanal_datalancamento as data_lancamento, 
                            n.c_notasemanal_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            n.c_md_id as matricula_disciplina,
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_notasemanal as n";
                
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

	public function delete(NotaSemanalModel $nota){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_notasemanal
                        WHERE
                            c_notasemanal_id = ?";
                
                $parametros = array($nota->getId());
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
        
	public function notaPorTA(TipoAvaliacaoModel $ta, MatriculaDisciplinaModel $md){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_notasemanal_id as id, 
                            n.c_notasemanal_dataavaliacao as data_avaliacao, 
                            n.c_notasemanal_datalancamento as data_lancamento, 
                            n.c_notasemanal_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_notasemanal as n,
                            c_tipo_avaliacao ta
                        WHERE
                            n.c_ta_id = ta.c_ta_id AND
                            c_md_id = ?
                        ORDER BY
                            c_nota_dataLancamento asc";
                
                $parametros = array($ta->getId(), $md->getId());
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

	public function notaPorMdInterno(MatriculaDisciplinaModel $matriculaDisciplina){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_nota_id as id, 
                            n.c_nota_dataAvaliacao as data_avaliacao, 
                            n.c_nota_dataLancamento as data_lancamento, 
                            n.c_nota_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            ta.c_ta_descricao as tipo_avaliacao_nome,
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_nota as n,
                            c_tipo_avaliacao ta
                        WHERE
                            n.c_ta_id = ta.c_ta_id AND
                            c_md_id = ?
                        ORDER BY
                            c_nota_dataLancamento asc";
                
                $parametros = array($matriculaDisciplina->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($json, array("id" => $dados->id,
                                                "data_avaliacao" => $dados->data_avaliacao,
                                                "data_lancamento" => $dados->data_lancamento,
                                                "valor" => $dados->valor,
                                                "tipo_avaliacao" => array("id" => $dados->tipo_avaliacao_id, 
                                                                          "nome" => $dados->tipo_avaliacao_nome)));
                    }
                }else{
                    $json = array("codigo" => 1, "message" => "nenhum");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            return $json;            
	}

        public function viewInterno(NotaModel $nota){
            $json = Array();
            try{
                $sql = "SELECT 
                            n.c_nota_id as id, 
                            n.c_md_id as md, 
                            n.c_nota_dataAvaliacao as data_avaliacao, 
                            n.c_nota_dataLancamento as data_lancamento, 
                            n.c_nota_valor as valor, 
                            n.c_ta_id as tipo_avaliacao_id, 
                            n.c_pessoa_id as pessoa_log_id
                        FROM 
                            c_nota as n
                        WHERE
                            n.c_nota_id = ?";
                
                $parametros = array($nota->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return $rs->fetch(PDO::FETCH_OBJ);
                }else{
                    return "nenhum";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }

	}
}