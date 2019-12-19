<?php
include_once ('./dao/FrequenciaDAO.php');
include_once ('./dao/MatriculaDAO.php');
include_once ('./model/FrequenciaModel.php');
include_once ('./model/TurmaModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/FrequenciaAlunoModel.php');
include_once ('./model/DisciplinaProfessorModel.php');
include_once ('./model/DisciplinaModel.php');


class FrequenciaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
            
                $json = Array();
		$objData = json_decode($data);
                
                $presencas = $objData->frequencia;
                
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);
                
                $frequencia = new FrequenciaModel();
                $frequencia->setData($objData->data);
                $frequencia->setDp($dp);
                
                $turma = new TurmaModel();
                $turma->setId($objData->id_turma);
                
                $dao = new FrequenciaDAO();
                $retorno = $dao->save($frequencia);
                
                $daoMatricula = new MatriculaDAO();
                $matriculas = $daoMatricula->matriculasRegularesPorTurmaInterno($turma);
                
                $frequencia->setId($retorno);
                
                if($retorno != "error"){
                    if($presencas != "nenhum"){
                        
                        //LANÇA PRESENCAS
                        foreach ($presencas as $id_aluno){

                            $aluno = new PessoaModel();
                            $aluno->setId($id_aluno);
                            
                            $frequenciaAlunos = new FrequenciaAlunoModel();
                            $frequenciaAlunos->setFrequencia($frequencia);
                            $frequenciaAlunos->setPresenca("p");
                            $frequenciaAlunos->setAluno($aluno);

                            $result = $dao->lancaPresencas($frequenciaAlunos);
                        }
                        
                        //LANÇA FALTAS
                        foreach ($matriculas as $matricula){
                            $alunof = new PessoaModel();
                            $alunof->setId($matricula->id_pessoa);
                            
                            $resultFalta = $dao->frequenciaAlunoDPInterno($frequencia, $alunof);
                            
                            if($resultFalta == "false"){
                                $frequenciaAlunosf = new FrequenciaAlunoModel();
                                $frequenciaAlunosf->setFrequencia($frequencia);
                                $frequenciaAlunosf->setPresenca("f");
                                $frequenciaAlunosf->setAluno($alunof);

                                $resultf = $dao->lancaPresencas($frequenciaAlunosf);
                            }
                        }
                        
                    }else{
                        $result = "success";
                    }
                    
                    if($result == "success"){
                        $json = array("codigo" => 0, "message" => "success");
                    }else{
                        $json = array("codigo" => 1, "message" => $result);
                    }
                    
                }else{
                    $json = array("codigo" => 1, "message" => $retorno);
                }
                
                header("Content-type: application/json");
                echo json_encode($json);
	}
        
	protected function update($data) {
                $json = Array();
		$objData = json_decode($data);
                
                $presencas = $objData->frequencia;
                
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);
                
                $turma = new TurmaModel();
                $turma->setId($objData->id_turma);
                
                $frequencia = new FrequenciaModel();
                $frequencia->setId($objData->id);
                $frequencia->setData($objData->data);
                $frequencia->setDp($dp);
                
                $dao = new FrequenciaDAO();
                $retorno = $dao->update($frequencia);
                
                $daoMatricula = new MatriculaDAO();
                $matriculas = $daoMatricula->matriculasRegularesPorTurmaInterno($turma);                
                
                if($retorno != 2){
                    $excl = $dao->excluirFrequenciaAluno($frequencia);
                    if($excl != 2){
                        if($presencas != "nenhum"){
                            
                            //LANCA PRESENCAS
                            foreach ($presencas as $id_aluno){

                                $aluno = new PessoaModel();
                                $aluno->setId($id_aluno);

                                $frequenciaAlunos = new FrequenciaAlunoModel();
                                $frequenciaAlunos->setFrequencia($frequencia);
                                $frequenciaAlunos->setPresenca("p");
                                $frequenciaAlunos->setAluno($aluno);

                                $result = $dao->lancaPresencas($frequenciaAlunos);
                            }
                            
                            //LANCA FALTAS
                            
                        //LANÇA FALTAS
                        foreach ($matriculas as $matricula){
                            $alunof = new PessoaModel();
                            $alunof->setId($matricula->id_pessoa);
                            
                            $resultFalta = $dao->frequenciaAlunoDPInterno($frequencia, $alunof);
                            
                            if($resultFalta == "false"){
                                $frequenciaAlunosf = new FrequenciaAlunoModel();
                                $frequenciaAlunosf->setFrequencia($frequencia);
                                $frequenciaAlunosf->setPresenca("f");
                                $frequenciaAlunosf->setAluno($alunof);

                                $resultf = $dao->lancaPresencas($frequenciaAlunosf);
                            }
                        }                            
                            
                        }else{
                            $result = "success";
                        }

                        if($result == "success"){
                            $json = array("codigo" => 0, "message" => "success");
                        }else{
                            $json = array("codigo" => 1, "message" => $result);
                        } 
                        
                        header("Content-type: application/json");
                        echo json_encode($json);                        
                    }
                }
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $frequencia = new FrequenciaModel();
                $frequencia->setId($objData->id);
                
                $dao = new FrequenciaDAO();
                $dao->view($frequencia);
	}

	protected function listarTudo() {
                $dao = new FrequenciaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $frequencia = new FrequenciaModel();
                $frequencia->setId($objData->id);                
                
                $dao = new FrequenciaDAO();
                $dao->delete($frequencia);
            }
        
	protected function frequenciaPorDP($data) {
		$objData = json_decode($data);
                $dp = new DisciplinaProfessorModel();
                $dp->setId($objData->dp);
                
                $dao = new FrequenciaDAO();
                $dao->frequenciaPorDP($dp);
	}

	protected function frequenciaAlunoDP($data) {
		$objData = json_decode($data);
                $frequencia = new FrequenciaModel();
                $frequencia->setId($objData->id_frequencia);
                
                $aluno = new PessoaModel();
                $aluno->setId($objData->id_aluno);
                
                $dao = new FrequenciaDAO();
                $dao->frequenciaAlunoDP($frequencia, $aluno);
	}   
        
	protected function frequenciaAlunoDisciplina($data) {
		$objData = json_decode($data);
                
                $disciplina = new DisciplinaModel();
                $disciplina->setId($objData->disciplina);
                
                $aluno = new PessoaModel();
                $aluno->setId($objData->id_aluno);
                
                $presenca = $objData->presenca;
                
                $dao = new FrequenciaDAO();
                $dao->frequenciaAlunoDisciplina($disciplina, $aluno, $presenca);
	}    
        
	protected function frequenciaAlunoDisciplinaDetalhes($data) {
		$objData = json_decode($data);
                
                $disciplina = new DisciplinaModel();
                $disciplina->setId($objData->disciplina);
                
                $aluno = new PessoaModel();
                $aluno->setId($objData->id_aluno);
                
                $presenca = $objData->presenca;
                
                $dao = new FrequenciaDAO();
                $dao->frequenciaAlunoDisciplinaDetalhes($disciplina, $aluno, $presenca);
	}           
}