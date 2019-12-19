<?php

include_once ('./dao/iPlanejamentoDAO.php');

class PlanejamentoDAO implements iPlanejamentoDAO {

	public function save(PlanejamentoModel $planejamento){
            $json = Array();
            try{
                $sql = "INSERT INTO c_planejamento
                           (c_plan_titulo,
                            c_dp_id,     
                            c_pessoa_id, 
                            c_plan_texto,
                            c_plan_arquivo)
                        VALUES
                            (?,?,?,?,?)";
                
                $parametros = array($planejamento->getTitulo(),
                                    $planejamento->getDisciplinaProfessor()->getId(),
                                    $planejamento->getProfessor()->getId(),
                                    $planejamento->getTexto(),
                                    $planejamento->getArquivo());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $plan = $this->buscaUltimo();
                    $json = array("codigo" => 0, "message" => "success", "id" => $plan->id);
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo" => 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/json");
            echo json_encode($json);
	}
        
	public function update(PlanejamentoModel $planejamento){
            
            $json = Array();
            try{
                $sql = "UPDATE c_planejamento
                        SET
                            c_plan_titulo = ?,
                            c_dp_id = ?, 
                            c_pessoa_id = ?, 
                            c_plan_texto = ?,
                            c_plan_arquivo = ?
                        WHERE 
                            c_plan_id = ?";
                
                $parametros = array($planejamento->getTitulo(),
                                    $planejamento->getDisciplinaProfessor()->getId(),
                                    $planejamento->getProfessor()->getId(),
                                    $planejamento->getTexto(),
                                    $planejamento->getArquivo(),
                                    $planejamento->getId());
                
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

	public function view(PlanejamentoModel $planejamento){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_plan_id as id, 
                            p.c_plan_titulo as titulo,
                            p.c_dp_id as dp_id, 
                            p.c_pessoa_id as professor_id, 
                            p.c_plan_data as data, 
                            p.c_plan_texto as texto,
                            p.c_plan_arquivo as arquivo
                        FROM 
                            c_planejamento as p
                        WHERE
                            p.c_plan_id = ?";
                
                $parametros = array($planejamento->getId());
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
                            p.c_plan_id as id, 
                            p.c_plan_titulo as titulo,
                            p.c_dp_id as dp_id, 
                            p.c_pessoa_id as professor_id, 
                            p.c_plan_data as data, 
                            p.c_plan_texto as texto,
                            p.c_plan_arquivo as arquivo
                        FROM 
                            c_planejamento as p";
                
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

	public function delete(PlanejamentoModel $planejamento){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_planejamento
                        WHERE
                            c_plan_id = ?";
                
                $parametros = array($planejamento->getId());
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
        
	public function planejamentoPorDP(DisciplinaProfessorModel $dp){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_plan_id as id, 
                            p.c_plan_titulo as titulo,
                            p.c_dp_id as dp_id, 
                            p.c_pessoa_id as professor_id, 
                            p.c_plan_data as data, 
                            p.c_plan_texto as texto
                        FROM 
                            c_planejamento as p
                        WHERE
                            c_dp_id = ?";
                
                $parametros = array($dp->getId());
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
        
	public function uploadArquivo(PlanejamentoModel $planejamento){
            
            $json = Array();
            try{
                $sql = "UPDATE c_planejamento
                        SET
                            c_plan_arquivo = ?
                        WHERE 
                            c_plan_id = ?";
                
                $parametros = array($planejamento->getArquivo(),
                                    $planejamento->getId());
                
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

	public function buscaUltimo(){
            $dados = Array();
            try{
                $sql = "SELECT 
                            p.c_plan_id as id, 
                            p.c_plan_titulo as titulo,
                            p.c_dp_id as dp_id, 
                            p.c_pessoa_id as professor_id, 
                            p.c_plan_data as data, 
                            p.c_plan_texto as texto
                        FROM 
                            c_planejamento as p
                        ORDER BY
                            p.c_plan_id DESC";
                
                $parametros = array();
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $dados = $rs->fetch(PDO::FETCH_OBJ);
                }else{
                    $dados = array("codigo" => 1, "message" => "nenhum");
                }
                
            } catch (Exception $e){
                $dados = array("codigo"=> 1, "message" => $e->getMessage());
            }
                return $dados;
	}        
}