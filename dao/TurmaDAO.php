<?php

include_once ('./dao/iTurmaDAO.php');

class TurmaDAO implements iTurmaDAO {

	public function save(TurmaModel $turma){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_turma`
                                (c_curso_id,
                                c_tur_descricao,
                                c_tur_turno,
                                c_sala_id)
                            VALUES
                                (?,?,?,?)";
                $parametros = array($turma->getCurso()->getId(),
                                    $turma->getDescricao(),
                                    $turma->getTurno(),
                                    $turma->getSala()->getId());
                
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
        
	public function update(TurmaModel $turma){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_turma`
                        SET
                            c_curso_id = ?,
                            c_tur_descricao = ?,
                            c_tur_turno = ?,
                            c_sala_id = ?
                        WHERE 
                            `c_tur_id` = ?";
                
                $parametros = array($turma->getCurso()->getId(),
                                    $turma->getDescricao(),
                                    $turma->getTurno(),
                                    $turma->getSala()->getId(),
                                    $turma->getId());
                
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

	public function view(TurmaModel $turma){
            $json = Array();
            try{
                $sql = "SELECT 
                            t.c_tur_id as id,
                            t.c_curso_id as id_curso,
                            t.c_tur_descricao as descricao,
                            t.c_tur_turno as turno,
                            t.c_sala_id as id_sala
                        FROM 
                            c_turma as t
                        WHERE
                            t.c_tur_id = ?";
                
                $parametros = array($turma->getId());
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
                            t.c_tur_id as id,
                            t.c_curso_id as id_curso,
                            t.c_tur_descricao as descricao,
                            t.c_tur_turno as turno,
                            t.c_sala_id as id_sala
                        FROM 
                            c_turma as t";
                
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

	public function delete(TurmaModel $turma){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_turma
                        WHERE
                            c_tur_id = ?";
                
                $parametros = array($turma->getId());
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
        
	public function turmaPorCurso(CursoModel $curso){
            $json = Array();
            try{
                $sql = "SELECT 
                            t.c_tur_id as id,
                            t.c_curso_id as id_curso,
                            c.c_curso_s_nome as nome_curso,
                            t.c_tur_descricao as descricao,
                            t.c_tur_turno as turno,
                            t.c_sala_id as id_sala,
                            s.c_sala_nome as nome_sala
                            
                        FROM 
                            c_turma as t,
                            c_curso as c,
                            c_sala as s
                        WHERE
                            t.c_curso_id = c.c_curso_i_id AND
                            t.c_sala_id = s.c_sala_id AND
                            t.c_curso_id = ?";
                
                $parametros = array($curso->getId());
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