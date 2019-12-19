<?php

include_once ('./dao/iFrequenciaDAO.php');

class FrequenciaDAO implements iFrequenciaDAO {

	public function save(FrequenciaModel $frequencia){
            $retorno = Array();
            try{
                $sql = "INSERT INTO c_frequencia
                                (c_frequencia_data, c_dp_id)
                            VALUES
                                (?,?)";
                $parametros = array($frequencia->getData(), $frequencia->getDp()->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $freq = $this->buscaUltimaFrequencia();
                    return $freq->id;
                }else{
                    return "error";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }
	}
        
	public function update(FrequenciaModel $frequencia){
            
            $json = Array();
            try{
                $sql = "UPDATE c_frequencia
                        SET
                            c_frequencia_data = ?,
                            c_dp_id = ?
                        WHERE 
                            c_frequencia_id = ?";
                
                $parametros = array($frequencia->getData(),
                                    $frequencia->getDp()->getId(),
                                    $frequencia->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return 0;
                }else{
                    return 1;
                }
                
            } catch (Exception $e){
                return 2;
            }          
	}        

	public function view(FrequenciaModel $frequencia){
            $json = Array();
            try{
                $sql = "SELECT 
                            f.c_frequencia_id as id, 
                            f.c_frequencia_data as data,
                            f.c_dp_id as dp
                        FROM 
                            c_frequencia as f
                        WHERE
                            f.c_frequencia_id = ?";
                
                $parametros = array($frequencia->getId());
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
                            f.c_frequencia_id as id, 
                            f.c_frequencia_data as data,
                            f.c_dp_id as dp
                        FROM 
                            c_frequencia as f
                        ORDER BY
                            f.c_frequencia_data DESC";
                
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

	public function delete(FrequenciaModel $frequencia){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_frequencia
                        WHERE
                            c_frequencia_id = ?";
                
                $parametros = array($frequencia->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = array("codigo" => 0, "message" => "success");
                    $this->excluirFrequenciaAluno($frequencia);
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo" => 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);             
	}
        
	public function lancaPresencas(FrequenciaAlunoModel $frequenciaAluno){
            $json = Array();
            try{
                $sql = "INSERT INTO m_frequencia_aluno
                                (c_frequencia_id, 
                                 c_pessoa_id, 
                                 c_frequencia_presenca)
                            VALUES
                                (?,?,?)";
                $parametros = array($frequenciaAluno->getFrequencia()->getId(), 
                                    $frequenciaAluno->getAluno()->getId(),
                                    $frequenciaAluno->getPresenca());
                
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

	public function buscaUltimaFrequencia(){
            $result = Array();
            try{
                $sql = "SELECT 
                            f.c_frequencia_id as id, 
                            f.c_frequencia_data as data,
                            f.c_dp_id as dp
                        FROM 
                            c_frequencia as f
                        ORDER BY
                            f.c_frequencia_id DESC";
                
                $parametros = array();
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return $result = $rs->fetch(PDO::FETCH_OBJ);
                }else{
                    return "nenhum";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }
	}

	public function frequenciaPorDP(DisciplinaProfessorModel $dp){
            $json = Array();
            try{
                $sql = "SELECT 
                            f.c_frequencia_id as id, 
                            f.c_frequencia_data as data,
                            f.c_dp_id as dp
                        FROM 
                            c_frequencia as f
                        WHERE
                            c_dp_id = ?
                        ORDER BY
                            f.c_frequencia_data DESC";
                
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
        
	public function frequenciaAlunoDP(FrequenciaModel $frequencia, PessoaModel $aluno){
            $json = Array();
            try{
                $sql = "SELECT 
                            *
                        FROM 
                            m_frequencia_aluno as fa
                        WHERE
                            c_pessoa_id = ? AND
                            c_frequencia_id = ? AND
                            c_frequencia_presenca = 'p'";
                
                $parametros = array($aluno->getId(), $frequencia->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = array("codigo" => 0, "message" => "true");
                }else{
                    $json = array("codigo" => 1, "message" => "false");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);            
	}
        
	public function excluirFrequenciaAluno(FrequenciaModel $frequencia){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            m_frequencia_aluno
                        WHERE
                            c_frequencia_id = ?";
                
                $parametros = array($frequencia->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return 0;
                }else{
                    return 1;
                }
                
            } catch (Exception $e){
                return 2;
            }     
	}
        
	public function frequenciaAlunoDPInterno(FrequenciaModel $frequencia, PessoaModel $aluno){
            $json = Array();
            try{
                $sql = "SELECT 
                            *
                        FROM 
                            m_frequencia_aluno as fa
                        WHERE
                            c_pessoa_id = ? AND
                            c_frequencia_id = ? AND
                            c_frequencia_presenca = 'p'";
                
                $parametros = array($aluno->getId(), $frequencia->getId());
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

	public function frequenciaAlunoDisciplina(DisciplinaModel $disciplina, PessoaModel $aluno, $presenca){
            $json = Array();
            try{
                $sql = "SELECT 
                            fa.m_fa_id as id,
                            f.c_frequencia_id as id_frequencia,
                            fa.c_pessoa_id as id_pessoa,
                            fa.c_frequencia_presenca
                        FROM 
                            m_frequencia_aluno as fa,
                            c_frequencia as f,  
                            m_disciplina_professor as dp
                        WHERE
                            fa.c_frequencia_id = f.c_frequencia_id AND
                            f.c_dp_id = dp.m_dp_id AND
                            dp.c_disc_id = ? AND
                            fa.c_pessoa_id = ? AND
                            fa.c_frequencia_presenca = ?";
                
                $parametros = array($disciplina->getId(), $aluno->getId(), $presenca);
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
               
                $json = array("codigo" => 0, "faltas" => $rs->rowCount());
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);            
	}     
        
	public function frequenciaAlunoDisciplinaDetalhes(DisciplinaModel $disciplina, PessoaModel $aluno, $presenca){
            $json = Array();
            try{
                $sql = "SELECT 
                            fa.m_fa_id as id,
                            f.c_frequencia_id as id_frequencia,
                            fa.c_pessoa_id as id_pessoa,
                            fa.c_frequencia_presenca as presenca,
                            f.c_frequencia_data as data
                        FROM 
                            m_frequencia_aluno as fa,
                            c_frequencia as f,  
                            m_disciplina_professor as dp
                        WHERE
                            fa.c_frequencia_id = f.c_frequencia_id AND
                            f.c_dp_id = dp.m_dp_id AND
                            dp.c_disc_id = ? AND
                            fa.c_pessoa_id = ? AND
                            fa.c_frequencia_presenca = ?
                        ORDER BY
                            data DESC";
                
                $parametros = array($disciplina->getId(), $aluno->getId(), $presenca);
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
            if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($json, $dados);
                    }
            }else{
                $json = array("codigo" => 0, "message" => "nenhum");                
            }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);            
	}         
}