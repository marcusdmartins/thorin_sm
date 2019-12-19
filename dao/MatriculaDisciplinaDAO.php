<?php

include_once ('./dao/iMatriculaDisciplinaDAO.php');
include_once ('./dao/NotaDAO.php');
include_once ('./model/MatriculaDisciplinaModel.php');

class MatriculaDisciplinaDAO implements iMatriculaDisciplinaDAO {

	public function save(MatriculaDisciplinaModel $matricula_disciplina){
            $json = Array();
            try{
                $sql = "INSERT INTO c_matricula_disciplina
                                (c_mat_id, c_disc_id, c_md_situacao)
                            VALUES
                                (?,?,?)";
                $parametros = array($matricula_disciplina->getMatricula()->getId(), 
                                    $matricula_disciplina->getDisciplina()->getId(), 
                                    $matricula_disciplina->getSituacao());
                
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
        
	public function update(MatriculaDisciplinaModel $matricula_disciplina){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_matricula_disciplina`
                        SET
                            c_mat_id = ?, 
                            c_disc_id = ?, 
                            c_md_situacao = ?
                        WHERE 
                            c_md_id = ?";
                
                $parametros = array($matricula_disciplina->getMatricula()->getId(), 
                                    $matricula_disciplina->getDisciplina()->getId(), 
                                    $matricula_disciplina->getSituacao(),
                                    $matricula_disciplina->getId());
                
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

	public function view(MatriculaDisciplinaModel $matricula_disciplina){
            $json = Array();
            try{
                $sql = "SELECT 
                            md.c_md_id as id, 
                            md.c_mat_id as id_matricula, 
                            md.c_disc_id as disc_id, 
                            md.c_md_situacao as situacao
                        FROM 
                            c_matricula_disciplina as md
                        WHERE
                            md.c_md_id = ?";
                
                $parametros = array($matricula_disciplina->getId());
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
                            md.c_md_id as id, 
                            md.c_mat_id as id_matricula, 
                            md.c_disc_id as disc_id, 
                            md.c_md_situacao as situacao
                        FROM 
                            c_matricula_disciplina as md";
                
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

	public function delete(MatriculaDisciplinaModel $matricula_disciplina){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_matricula_disciplina
                        WHERE
                            c_md_id = ?";
                
                $parametros = array($matricula_disciplina->getId());
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
        
	public function buscaPorMatricula(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "SELECT 
                            md.c_md_id as id, 
                            md.c_mat_id as id_matricula, 
                            md.c_disc_id as disc_id, 
                            md.c_md_situacao as situacao
                        FROM 
                            c_matricula_disciplina as md
                        WHERE
                            c_mat_id = ?";
                
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
            
            header("Content-Type: application/ json");
            echo json_encode ($json);            
	}

	public function buscaPorMatriculaInterno(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "SELECT 
                            md.c_md_id as id, 
                            md.c_disc_id as disc_id, 
                            d.c_disciplina_s_nome as disc_nome, 
                            md.c_md_situacao as situacao
                        FROM 
                            c_matricula_disciplina as md,
                            c_disciplina as d
                        WHERE
                            md.c_disc_id = d.c_disciplina_i_id AND
                            c_mat_id = ?";
                
                $parametros = array($matricula->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $daoNota = new NotaDAO();
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        $matriculaDisciplina = new MatriculaDisciplinaModel();
                        $matriculaDisciplina->setId($dados->id);
                        array_push($json, array("id_md" => $dados->id,
                                                "situacao" => $dados->situacao,
                                                "disciplina" => array("id" => $dados->disc_id,
                                                                      "nome" => $dados->disc_nome),
                                                "notas" => $daoNota->notaPorMdInterno($matriculaDisciplina)));
                    }
                }else{
                    $json = array("codigo" => 1, "message" => "nenhum");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            return $json;            
	}
        
	public function buscaPorMatriculaDisciplina(MatriculaModel $matricula, DisciplinaModel $disciplina){
            $json = Array();
            try{
                $sql = "SELECT 
                            md.c_md_id as id, 
                            md.c_mat_id as id_matricula, 
                            md.c_disc_id as disc_id, 
                            md.c_md_situacao as situacao
                        FROM 
                            c_matricula_disciplina as md
                        WHERE
                            c_mat_id = ? AND
                            c_disc_id = ?";
                
                $parametros = array($matricula->getId(), $disciplina->getId());
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
}