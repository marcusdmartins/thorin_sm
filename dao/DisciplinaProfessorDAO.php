<?php

include_once ('./dao/iDisciplinaProfessorDAO.php');

class DisciplinaProfessorDAO implements iDisciplinaProfessorDAO {

	public function save(DisciplinaProfessorModel $disciplina_professor){
            $json = Array();
            try{
                $sql = "INSERT INTO m_disciplina_professor
                                (c_disc_id, c_pessoa_id, c_tur_id)
                            VALUES
                                (?,?,?)";
                $parametros = array($disciplina_professor->getDisciplina()->getId(), 
                                    $disciplina_professor->getProfessor()->getId(), 
                                    $disciplina_professor->getTurma()->getId());
                
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

	public function view(DisciplinaProfessorModel $disciplina_professor){
            $json = Array();
            try{
                $sql = "SELECT 
                            dp.m_dp_id as id, 
                            dp.c_disc_id as id_disciplina, 
                            dp.c_pessoa_id as id_professor, 
                            dp.c_tur_id as id_turma
                        FROM 
                            m_disciplina_professor as dp
                        WHERE
                            dp.m_dp_id = ?";
                
                $parametros = array($disciplina_professor->getId());
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
                            dp.m_dp_id as id, 
                            dp.c_disc_id as id_disciplina, 
                            dp.c_pessoa_id as id_professor, 
                            dp.c_tur_id as id_turma
                        FROM 
                            m_disciplina_professor as dp";
                
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

	public function delete(DisciplinaProfessorModel $disciplina_professor){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            m_disciplina_professor
                        WHERE
                            m_dp_id = ?";
                
                $parametros = array($disciplina_professor->getId());
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

	public function update(DisciplinaProfessorModel $disciplina_professor){
            
            $json = Array();
            try{
                $sql = "UPDATE m_disciplina_professor
                        SET
                            c_disc_id = ?,
                            c_pessoa_id = ?,
                            c_tur_id = ?
                        WHERE 
                            c_disc_id = ? AND
                            c_tur_id = ?";
                
                $parametros = array($disciplina_professor->getDisciplina()->getId(), 
                                    $disciplina_professor->getProfessor()->getId(), 
                                    $disciplina_professor->getTurma()->getId(),
                                    $disciplina_professor->getDisciplina()->getId(),
                                     $disciplina_professor->getTurma()->getId());
                
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
        
	public function buscaPorProfessor(PessoaModel $pessoa){
            $json = Array();
            try{
                $sql = "SELECT 
                            dp.m_dp_id as id, 
                            dp.c_disc_id as id_disciplina, 
                            dp.c_pessoa_id as id_professor, 
                            dp.c_tur_id as id_turma
                        FROM 
                            m_disciplina_professor as dp
                        WHERE
                            dp.c_pessoa_id = ?";
                
                $parametros = array($pessoa->getId());
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

	public function verificaExistencia(DisciplinaProfessorModel $dp){
            try{
                $sql = "SELECT 
                            *
                        FROM 
                            m_disciplina_professor
                        WHERE
                            c_disc_id = ? AND
                            c_tur_id = ?";
                
                $parametros = array($dp->getDisciplina()->getId(), $dp->getTurma()->getId());
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

	public function buscaPorTurma(TurmaModel $turma){
            $json = Array();
            try{
                $sql = "SELECT 
                            dp.m_dp_id as id, 
                            dp.c_pessoa_id as id_professor,
                            p.c_pessoa_nome as nome_professor,
                            dp.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            d.c_disciplina_i_id as id_disciplina, 
                            d.c_disciplina_s_nome as nome_disciplina                          
                        FROM 
                            m_disciplina_professor as dp,
                            c_disciplina as d,
                            c_pessoa as p,
                            c_turma as t
                        WHERE
                            dp.c_disc_id = d.c_disciplina_i_id AND
                            dp.c_pessoa_id = p.c_pessoa_id AND
                            dp.c_tur_id = t.c_tur_id AND
                            dp.c_tur_id = ?
                        ORDER BY
                            nome_disciplina ASC";
                
                $parametros = array($turma->getId());
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
}