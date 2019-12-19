<?php

include_once ('./dao/iDisciplinaDAO.php');
include_once ('./model/CursoModel.php');

class DisciplinaDAO implements iDisciplinaDAO {

	public function save(DisciplinaModel $disciplina){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_disciplina`
                            (`c_disciplina_s_nome`,
                            `c_curso_i_id`,
                            `c_disciplina_i_cargahoraria`)
                        VALUES
                            (?,?,?)";
                
                $parametros = array($disciplina->getNome(), 
                                    $disciplina->getCurso()->getId(), 
                                    $disciplina->getCargaHoraria());
                
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

	public function view(DisciplinaModel $disciplina){
            $json = Array();
            try{
                $sql = "SELECT 
                            d.c_disciplina_i_id as id, 
                            d.c_disciplina_s_nome as nome, 
                            d.c_curso_i_id as id_curso, 
                            d.c_disciplina_i_cargahoraria as carga_horaria,
                            c.c_curso_s_nome as nome_curso
                        FROM 
                            c_disciplina as d,
                            c_curso as c
                        WHERE
                            d.c_curso_i_id = c.c_curso_i_id AND
                            d.c_disciplina_i_id = ?";
                
                $parametros = array($disciplina->getId());
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
                            d.c_disciplina_i_id as id, 
                            d.c_disciplina_s_nome as nome, 
                            d.c_curso_i_id as id_curso, 
                            d.c_disciplina_i_cargahoraria as carga_horaria,
                            c.c_curso_s_nome as nome_curso
                        FROM 
                            c_disciplina as d,
                            c_curso as c
                        WHERE
                            d.c_curso_i_id = c.c_curso_i_id";
                
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

	public function delete(DisciplinaModel $disciplina){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_disciplina
                        WHERE
                            c_disciplina_i_id = ?";
                
                $parametros = array($disciplina->getId());
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

	public function update(DisciplinaModel $disciplina){
            $json = Array();
            try{
                $sql = "UPDATE `c_disciplina`
                        SET
                            `c_disciplina_s_nome` = ?,
                            `c_curso_i_id` = ?,
                            `c_disciplina_i_cargahoraria` = ?
                        WHERE 
                            `c_disciplina_i_id` = ?";
                
                $parametros = array($disciplina->getNome(), 
                                    $disciplina->getCurso()->getId(), 
                                    $disciplina->getCargaHoraria(),
                                    $disciplina->getId());
                
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
        
	public function disciplinaPorCurso(CursoModel $curso){
            $json = Array();
            try{
                $sql = "SELECT 
                            d.c_disciplina_i_id as id, 
                            d.c_disciplina_s_nome as nome, 
                            d.c_curso_i_id as id_curso, 
                            d.c_disciplina_i_cargahoraria as carga_horaria,
                            c.c_curso_s_nome as nome_curso
                        FROM 
                            c_disciplina as d,
                            c_curso as c
                        WHERE
                            d.c_curso_i_id = c.c_curso_i_id AND
                            d.c_curso_i_id = ?";
                
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

	public function buscaInstDisciplina($busca, CursoModel $curso){
            $json = Array();
            try{
                $sql = "SELECT 
                            d.c_disciplina_i_id as id, 
                            d.c_disciplina_s_nome as nome, 
                            d.c_curso_i_id as id_curso, 
                            d.c_disciplina_i_cargahoraria as carga_horaria,
                            c.c_curso_s_nome as nome_curso
                        FROM 
                            c_disciplina as d,
                            c_curso as c
                        WHERE
                            d.c_disciplina_s_nome LIKE '%$busca%' AND
                            d.c_curso_i_id = c.c_curso_i_id AND
                            d.c_curso_i_id = ?";
                
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
        
        public function matriculaDisciplina(MatriculaModel $matricula){
            
            $curso = new CursoModel();
            $curso->setId($matricula->getCurso()->getId());
            $disciplinas = $this->buscaDisciplinas($curso);
            
            if($disciplinas != "nenhum"){
                $count = 0;
                foreach ($disciplinas as $disciplina){
                    try{
                        $sql = "INSERT INTO 
                                    c_matricula_disciplina 
                                (c_mat_id, c_disc_id, c_md_situacao)
                                    VALUES
                                (".$matricula->getId().", '$disciplina->id', 'regular')";
                        
                        $rs = ConnectionFactory::getConection()->prepare($sql);
                        $rs->execute();

                        if($rs->rowCount() > 0){
                            $count++;
                        }
                    }catch(Exception $e){
                        return $e->getMessage();
                    }
                }
                return $count;
        }else{
            return "Nao existem disciplinas cadastradas";
        }
            
        }
        
	public function buscaDisciplinas(CursoModel $curso){
            $disciplinas = Array();
            try{
                $sql = "SELECT 
                            d.c_disciplina_i_id as id, 
                            d.c_disciplina_s_nome as nome, 
                            d.c_curso_i_id as id_curso, 
                            d.c_disciplina_i_cargahoraria as carga_horaria,
                            c.c_curso_s_nome as nome_curso
                        FROM 
                            c_disciplina as d,
                            c_curso as c
                        WHERE
                            d.c_curso_i_id = c.c_curso_i_id AND
                            d.c_curso_i_id = ?";
                
                $parametros = array($curso->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($disciplinas, $dados);
                    }
                }else{
                    $disciplinas = "nenhum";
                }
                
            } catch (Exception $e){
                $disciplinas = $e->getMessage();
            }
            
            return $disciplinas;            
	}        
}