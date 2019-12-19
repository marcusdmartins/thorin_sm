<?php

include_once ('./dao/iPlanoAulaDAO.php');

class PlanoAulaDAO implements iPlanoAulaDAO {

	public function save(PlanoAulaModel $planoAula){
            $json = Array();
            try{
                $sql = "INSERT INTO c_plano_aula
                            (m_dp_id,
                            c_plano_aula_titulo,
                            c_plano_aula_data,
                            c_plano_aula_texto,
                            c_pessoa_id)
                        VALUES
                            (?,?,?,?,?)";
                
                $parametros = array($planoAula->getDisciplinaProfessor()->getId(),
                                    $planoAula->getTitulo(),
                                    $planoAula->getData(),
                                    $planoAula->getTexto(),
                                    $planoAula->getProfessor()->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $plano = $this->buscaUltimo();
                    $json = array("codigo" => 0, "message" => "success", "id" => $plano->id);
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo" => 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/json");
            echo json_encode($json);
	}
        
	public function update(PlanoAulaModel $planoAula){
            
            $json = Array();
            try{
                $sql = "UPDATE c_plano_aula
                        SET
                            m_dp_id = ?,
                            c_plano_aula_titulo = ?,
                            c_plano_aula_data = ?, 
                            c_plano_aula_texto = ?,
                            c_pessoa_id = ?
                        WHERE 
                            c_plano_aula_id = ?";
                
                $parametros = array($planoAula->getDisciplinaProfessor()->getId(),
                                    $planoAula->getTitulo(),
                                    $planoAula->getData(),
                                    $planoAula->getTexto(),
                                    $planoAula->getProfessor()->getId(),
                                    $planoAula->getId());
                
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

	public function view(PlanoAulaModel $planoAula){
            $json = Array();
            try{
                $sql = "SELECT 
                            c_plano_aula_id as id, 
                            m_dp_id as dp, 
                            c_plano_aula_titulo as titulo, 
                            c_plano_aula_data as data, 
                            c_plano_aula_texto as texto,
                            c_pessoa_id as pessoa_id
                        FROM 
                            c_plano_aula as pa
                        WHERE
                            pa.c_plano_aula_id = ?";
                
                $parametros = array($planoAula->getId());
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
                            c_plano_aula_id as id, 
                            c_plano_aula_titulo as titulo,
                            m_dp_id as dp, 
                            c_plano_aula_data as data, 
                            c_plano_aula_texto as texto,
                            c_pessoa_id as pessoa_id
                        FROM 
                            c_plano_aula as pa
                        ORDER BY
                            pa.c_plano_aula_data DESC";
                
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

	public function delete(PlanoAulaModel $planoAula){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_plano_aula
                        WHERE
                            c_plano_aula = ?";
                
                $parametros = array($planoAula->getId());
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
        
	public function planosPorDP(DisciplinaProfessorModel $dp){
            $json = Array();
            try{
                $sql = "SELECT 
                            c_plano_aula_id as id, 
                            c_plano_aula_titulo as titulo,
                            m_dp_id as dp, 
                            c_plano_aula_data as data, 
                            c_plano_aula_texto as texto,
                            c_pessoa_id as pessoa_id
                        FROM 
                            c_plano_aula as pa
                        WHERE
                            pa.m_dp_id = ?
                        ORDER BY
                            pa.c_plano_aula_data DESC";
                
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

	public function buscaUltimo(){
            $dados = Array();
            try{
                $sql = "SELECT 
                            c_plano_aula_id as id, 
                            m_dp_id as dp, 
                            c_plano_aula_titulo as titulo, 
                            c_plano_aula_data as data, 
                            c_plano_aula_texto as texto,
                            c_pessoa_id as pessoa_id
                        FROM 
                            c_plano_aula as pa
                        ORDER BY
                            pa.c_plano_aula_data DESC";
                
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