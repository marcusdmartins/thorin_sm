<?php

include_once ('./dao/iCursoDAO.php');

class CursoDAO implements iCursoDAO {

	public function save(CursoModel $curso){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_curso`
                                (`c_curso_s_nome`,
                                `c_curso_i_cargahoraria`,
                                `c_nivel_i_id`,
                                `c_curso_f_valor`)
                            VALUES
                                (?,?,?,?)";
                $parametros = array($curso->getNome(), 
                                    $curso->getCargaHoraria(), 
                                    $curso->getNivel()->getId(),
                                    $curso->getValorMensal());
                
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

	public function view(CursoModel $curso){
            $json = Array();
            try{
                $sql = "SELECT 
                            c.c_curso_i_id as id, 
                            c.c_curso_s_nome as nome, 
                            c.c_curso_i_cargahoraria as carga_horaria, 
                            c.c_nivel_i_id as id_nivel, 
                            n.c_nivel_s_nome as nome_nivel,
                            c.c_curso_f_valor as valor
                        FROM 
                            c_curso as c, c_nivel n
                        WHERE
                            c.c_nivel_i_id = n.c_nivel_i_id AND
                            c.c_curso_i_id = ?";
                
                $parametros = array($curso->getId());
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
                            c.c_curso_i_id as id, 
                            c.c_curso_s_nome as nome, 
                            c.c_curso_i_cargahoraria as carga_horaria, 
                            c.c_nivel_i_id as id_nivel, 
                            n.c_nivel_s_nome as nome_nivel,
                            c.c_curso_f_valor as valor
                        FROM 
                            c_curso as c, c_nivel n
                        WHERE
                            c.c_nivel_i_id = n.c_nivel_i_id
                        ORDER BY c.c_nivel_i_id, c.c_curso_s_nome";
                
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

	public function delete(CursoModel $curso){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_curso
                        WHERE
                            c_curso_i_id = ?";
                
                $parametros = array($curso->getId());
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

	public function update(CursoModel $curso){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_curso`
                        SET
                            `c_curso_s_nome` = ?,
                            `c_curso_i_cargahoraria` = ?,
                            `c_nivel_i_id` = ?,
                            `c_curso_f_valor` = ?
                        WHERE 
                            `c_curso_i_id` = ?";
                
                $parametros = array($curso->getNome(), 
                                    $curso->getCargaHoraria(), 
                                    $curso->getNivel()->getId(),
                                    $curso->getValorMensal(),
                                    $curso->getId());
                
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
}