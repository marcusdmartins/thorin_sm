<?php

include_once ('./dao/iMatriculaDAO.php');
include_once ('MatriculaDisciplinaDAO.php');
include_once ('CobrancaDAO.php');
include_once ('./model/MatriculaModel.php');

class MatriculaDAO implements iMatriculaDAO {

	public function save(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_matricula`
                                (c_pessoa_i_id, 
                                c_curso_i_id, 
                                c_tur_id,
                                c_matricula_s_cod, 
                                c_matricula_d_datainicio, 
                                c_matricula_b_status,
                                c_matricula_datavencimento,
                                c_matricula_desconto)
                            VALUES
                                (?,?,?,?,?,?,?,?)";
                $parametros = array($matricula->getAluno()->getId(), 
                                    $matricula->getCurso()->getId(), 
                                    $matricula->getTurma()->getId(),
                                    $matricula->getCodigo(),
                                    $matricula->getInicio(),
                                    $matricula->getStatus(),
                                    $matricula->getDataVencimento(),
                                    $matricula->getDesconto());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                   $nova_mat = $this->buscaUltimoRegistro();
                   return $nova_mat->id;
                }else{
                    return "error";
                }
            } catch (Exception $e){
                return $e->getMessage();
            }
	}
        
	public function update(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "UPDATE `c_matricula`
                        SET
                            c_matricula_i_id = ?, 
                            c_pessoa_i_id = ?, 
                            c_curso_i_id = ?, 
                            c_matricula_s_cod = ?, 
                            c_matricula_d_datainicio = ?, 
                            c_matricula_b_status = ?,
                            c_matricula_datavencimento = ?,
                            c_matricula_desconto = ?
                        WHERE 
                            `c_matricula_i_id` = ?";
                
                $parametros = array($matricula->getAluno()->getId(), 
                                    $matricula->getCurso()->getId(), 
                                    $matricula->getCodigo(),
                                    $matricula->getInicio(),
                                    $matricula->getStatus(),
                                    $matricula->getDataVencimento(),
                                    $matricula->getDesconto(),
                                    $matricula->getId());
                
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

	public function view(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa, 
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto     
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND                        
                            m.c_matricula_i_id = ?";
                
                $parametros = array($matricula->getId());
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
        
	public function visaoGeral(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa, 
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto     
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND                        
                            m.c_matricula_i_id = ?";
                
                $parametros = array($matricula->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    
                    $dados = $rs->fetch(PDO::FETCH_OBJ);
                    $daoMatriculaDisciplina = new MatriculaDisciplinaDAO();
                    $notas = $daoMatriculaDisciplina->buscaPorMatriculaInterno($matricula);
                    
                    $daoCobranca = new CobrancaDAO();
                    $cobrancas = $daoCobranca->cobrancaPorMatriculaInterno($matricula);
                        
                    $json = array("id" => $dados->id,
                                  "codigo_matricula" => $dados->codigo,
                                  "data_inicio" => $dados->data_inicio,
                                  "status" => $dados->status,
                                  "dia_vencimento" => $dados->datavencimento,
                                  "desconto" => $dados->desconto,
                                  "id_aluno" => $dados->id_pessoa,
                                  "curso" => array("id" => $dados->id_curso, "nome" => $dados->nome_curso),
                                  "turma" => array("id" => $dados->id_turma, "descricao" => $dados->nome_turma),
                                  "mds" => $notas,
                                  "cobrancas" => $cobrancas);
                    
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
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa, 
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto                            
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id";
                
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

	public function delete(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_matricula
                        WHERE
                            c_matricula_i_id = ?";
                
                $parametros = array($matricula->getId());
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
        
	public function buscaUltimoRegistro(){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa, 
                            m.c_curso_i_id as id_curso, 
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto
                        FROM 
                            c_matricula as m
                        ORDER BY
                            m.c_matricula_i_id DESC";
                
                $parametros = array();
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

	public function deleteMatricula(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_matricula
                        WHERE
                            c_matricula_i_id = ?";
                
                $parametros = array($matricula->getId());
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

	public function matriculasPorAluno(PessoaModel $pessoa){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa, 
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto                            
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND
                            m.c_pessoa_i_id = ?";
                
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
        
	public function matriculasPorAlunoInterno(MatriculaModel $matricula){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa, 
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto                            
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND
                            m.c_matricula_i_id = ?";
                
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
        
	public function dadosAcademicosGerais(MatriculaModel $matricula){
            $json = Array();
            $matricula = $this->matriculasPorAlunoInterno($matricula);
            $mds = $this->buscaMDPorMatriculaInterno($matricula);
//            array_push($matricula, array = ()));
            
            header("Content-Type: application/ json");
            echo json_encode ($mds);            
	}

	public function matriculasRegularesPorTurma(TurmaModel $turma){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa,
                            p.c_pessoa_nome as pessoa_nome,
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto                            
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t,
                            c_pessoa as p
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND
                            m.c_pessoa_i_id = p.c_pessoa_id AND
                            t.c_tur_id = ?
                            ORDER BY p.c_pessoa_nome ASC";
                
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

	public function matriculasRegularesPorTurmaInst(TurmaModel $turma, $busca){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa,
                            p.c_pessoa_nome as pessoa_nome,
                            m.c_curso_i_id as id_curso, 
                            c.c_curso_s_nome as nome_curso,
                            m.c_tur_id as id_turma,
                            t.c_tur_descricao as nome_turma,
                            m.c_matricula_s_cod codigo, 
                            m.c_matricula_d_datainicio as data_inicio, 
                            m.c_matricula_b_status as status,
                            m.c_matricula_datavencimento as datavencimento,
                            m.c_matricula_desconto as desconto                            
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t,
                            c_pessoa as p
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND
                            m.c_pessoa_i_id = p.c_pessoa_id AND
                            t.c_tur_id = ? AND
                            p.c_pessoa_nome LIKE '%$busca%'
                            ORDER BY c_pessoa_nome ASC";
                
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

	public function matriculasRegularesPorTurmaInterno(TurmaModel $turma){
            $result = Array();
            try{
                $sql = "SELECT 
                            m.c_matricula_i_id as id, 
                            m.c_pessoa_i_id as id_pessoa                           
                        FROM 
                            c_matricula as m,
                            c_curso as c,
                            c_turma as t,
                            c_pessoa as p
                        WHERE
                            m.c_curso_i_id = c.c_curso_i_id AND
                            m.c_tur_id = t.c_tur_id AND
                            m.c_pessoa_i_id = p.c_pessoa_id AND
                            t.c_tur_id = ?";
                
                $parametros = array($turma->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($result, $dados);
                    }
                }else{
                    $result = array("codigo" => 1, "message" => "nenhum");
                }
                
            } catch (Exception $e){
                $result = array("codigo"=> 1, "message" => $e->getMessage());
            }
            return $result;            
	}

        public function buscaMDPorMatriculaInterno(MatriculaModel $matricula){
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
        
}