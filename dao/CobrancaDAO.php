<?php

include_once ('iCobrancaDAO.php');
include_once ('./model/CursoModel.php');
include_once ('./model/CobrancaModel.php');

class CobrancaDAO implements iCobrancaDAO {

	public function save(CobrancaModel $cobranca){
            $json = Array();
            try{
                $sql = "INSERT INTO c_cobranca 
                         (c_cb_descricao, 
                          c_pessoa_id, 
                          c_matricula_id, 
                          c_cb_valor, 
                          c_cb_datavencimento, 
                          c_cb_datapagamento, 
                          c_cb_status) 
                          VALUES (?,?,?,?,?,?,?)";
                $parametros = array($cobranca->getDescricao(), 
                                    $cobranca->getPessoa()->getId(), 
                                    $cobranca->getMatricula()->getId(),
                                    $cobranca->getValor(),
                                    $cobranca->getDataVencimento(),
                                    $cobranca->getDataPagamento(),
                                    $cobranca->getStatus());
                
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

	public function view(CobrancaModel $cobranca){
            $json = Array();
            try{
                $sql = "SELECT 
                            c.c_cb_id as id, 
                            c.c_cb_descricao as descricao, 
                            c.c_pessoa_id as id_pessoa, 
                            c.c_matricula_id as id_matricula, 
                            c.c_cb_valor as valor, 
                            c.c_cb_datavencimento as data_vencimento, 
                            c.c_cb_datapagamento as data_pagamento, 
                            c.c_cb_status as status
                        FROM 
                            c_cobranca as c
                        WHERE
                            c.c_cb_id = ?";
                
                $parametros = array($cobranca->getId());
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
                            c.c_cb_id as id, 
                            c.c_cb_descricao as descricao, 
                            c.c_pessoa_id as id_pessoa, 
                            c.c_matricula_id as id_matricula, 
                            c.c_cb_valor as valor, 
                            c.c_cb_datavencimento as data_vencimento, 
                            c.c_cb_datapagamento as data_pagamento, 
                            c.c_cb_status as status
                        FROM 
                            c_cobranca as c";
                
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

	public function delete(CobrancaModel $cobranca){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_cobranca
                        WHERE
                            c_cb_id = ?";
                
                $parametros = array($cobranca->getId());
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

	public function update(CobrancaModel $cobranca){
            
            $json = Array();
            try{
                $sql = "UPDATE c_cobranca
                        SET
                            c_cb_descricao = ?,
                            c_pessoa_id = ?,
                            c_matricula_id = ?,
                            c_cb_valor = ?,
                            c_cb_datavencimento = ?,
                            c_cb_datapagamento = ?,
                            c_cb_status = ?
                        WHERE 
                            c_cb_id = ?";
                $parametros = array($cobranca->getDescricao(), 
                                    $cobranca->getPessoa()->getId(), 
                                    $cobranca->getMatricula(), 
                                    $cobranca->getValor(),
                                    $cobranca->getDataVencimento(),
                                    $cobranca->getDataPagamento(),
                                    $cobranca->getStatus(),
                                    $cobranca->getId());
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
        
        public function geraCobrancas(MatriculaModel $matricula, $qtdParcelas, $primeiraParcela){
            
            $curso  = new CursoModel();
            $curso->setId($matricula->getCurso()->getId());
            $dados_curso = $this->buscaCurso($curso);
            $curso->setValorMensal($dados_curso->valor);
            $valorDesconto = $curso->getValorMensal()*$matricula->getDesconto()/100;
            $valorFinal = $curso->getValorMensal() - $valorDesconto;
            
            $count = 0;
            for($i = 1; $i <= $qtdParcelas; $i++){
                
                $cobranca = new CobrancaModel();
                if($i == 1){
                    $cobranca->setDataVencimento($primeiraParcela);
                }else{
                    $cont = $i-1;
                    $cobranca->setDataVencimento(date('Y-m-d', strtotime("+$cont months",strtotime($primeiraParcela))));
                }
                
                $cobranca->setMatricula($matricula);
                $cobranca->setValor($valorFinal);
                $cobranca->setStatus("NP");
                $cobranca->setDataPagamento(null);
                $cobranca->setDescricao($i." Mensalidade");
                
                $ret_cob = $this->novaCobranca($cobranca);
                
                if($ret_cob == "success"){
                    $count++;
                }
            }
            return $count;
        }
        
        public function buscaCurso(CursoModel $curso){
            try{
                $sql = "SELECT
                            c_curso_i_id as id,
                            c_curso_s_nome as nome,
                            c_curso_f_valor as valor
                        FROM
                            c_curso
                        WHERE
                            c_curso_i_id = ?";
                
                $parametros = array($curso->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $curso = $rs->fetch(PDO::FETCH_OBJ);
                    return $curso;
                }else{
                    return "nenhum";
                }
                
            }catch(Exception $e){
                return $e->getMessage();
            }
        }
        
	public function novaCobranca(CobrancaModel $cobranca){
            $json = Array();
            try{
                $sql = "INSERT INTO c_cobranca
                            (c_cb_descricao, 
                             c_matricula_id, 
                             c_cb_valor, 
                             c_cb_datavencimento, 
                             c_cb_datapagamento, 
                             c_cb_status) 
                        VALUES (?,?,?,?,?,?)";
                $parametros = array($cobranca->getDescricao(), 
                                    $cobranca->getMatricula()->getId(),
                                    $cobranca->getValor(),
                                    $cobranca->getDataVencimento(),
                                    $cobranca->getDataPagamento(),
                                    $cobranca->getStatus());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return "success";
                }else{
                    return "error";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }
	}

	public function cobrancaPorMatriculaInterno(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "SELECT 
                            c.c_cb_id as id, 
                            c.c_cb_descricao as descricao, 
                            c.c_cb_valor as valor, 
                            c.c_cb_datavencimento as data_vencimento, 
                            c.c_cb_datapagamento as data_pagamento, 
                            c.c_cb_status as status
                        FROM 
                            c_cobranca as c
                        WHERE
                            c.c_matricula_id = ?";
                
                $parametros = array($matricula->getId());
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
            
            return $json;
	}        
}