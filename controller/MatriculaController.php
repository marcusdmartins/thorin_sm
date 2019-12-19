<?php
include_once ('./dao/MatriculaDAO.php');
include_once ('./dao/DisciplinaDAO.php');
include_once ('./dao/CobrancaDAO.php');
include_once ('./model/MatriculaModel.php');
include_once ('./model/PessoaModel.php');
include_once ('./model/CursoModel.php');
include_once ('./model/TurmaModel.php');

class MatriculaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function nova($data) {
		$objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->curso);
                
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->pessoa);                
                
                $matricula = new MatriculaModel();
                $matricula->setAluno($pessoa);
                $matricula->setCurso($curso);
                $matricula->setCodigo($objData->codigo);
                $matricula->setStatus($objData->status);
                $matricula->setDataVencimento($objData->dataVencimento);
                $matricula->setDesconto($objData->desconto);
                
                $dao = new MatriculaDAO();
                $dao->save($matricula);
	}
        
	protected function update($data) {
		$objData = json_decode($data);
                
                $curso = new CursoModel();
                $curso->setId($objData->curso);
                
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->pessoa);                
                
                $matricula = new MatriculaModel();
                $matricula->setAluno($pessoa);
                $matricula->setCurso($curso);
                $matricula->setId($objData->id);
                $matricula->setCodigo($objData->codigo);
                $matricula->setStatus($objData->status);
                $matricula->setDataVencimento($objData->dataVencimento);
                $matricula->setDesconto($objData->desconto);                
                
                $dao = new MatriculaDAO();
                $dao->update($matricula);
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $matricula = new MatriculaModel();
                $matricula->setId($objData->id);
                
                $dao = new MatriculaDAO();
                $dao->view($matricula);
	}
        
	protected function visaoGeral($data) {
		$objData = json_decode($data);
                $matricula = new MatriculaModel();
                $matricula->setId($objData->id);
                
                $dao = new MatriculaDAO();
                $dao->visaoGeral($matricula);
	}        

	protected function listarTudo() {
                $dao = new MatriculaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $matricula = new MatriculaModel();
                $matricula->setId($objData->id);                
                
                $dao = new MatriculaDAO();
                $dao->delete($matricula);
	}
        
        protected function matricular($data){
            $objData = json_decode($data);
            
            $curso = new CursoModel();
            $curso->setId($objData->id_curso);
            
            $turma = new TurmaModel();
            $turma->setId($objData->id_turma);
            
            $aluno = new PessoaModel();
            $aluno->setId($objData->id_aluno);
            
            $matricula = new MatriculaModel();
            $matricula->setAluno($aluno);
            $matricula->setCurso($curso);
            $matricula->setTurma($turma);
            $matricula->setStatus("r");
            
            $matricula->setDataVencimento(5);
            $matricula->setDesconto($objData->desconto);
            $primeiraParcela = $objData->primeiraParcela;
            $qtdParcelas = $objData->qtdParcelas;
            
            $matricula->setInicio($objData->inicio);
            
            $daoMatricula = new MatriculaDAO();
            
            //SALVA A MATRICULA
            $ret_mat = $daoMatricula->save($matricula);
            
            if($ret_mat != "error"){
                
                $matricula->setId($ret_mat);
                $daoDisciplina = new DisciplinaDAO();
                
                //MATRICULA AS DISCIPLINAS DO CURSO
                $ret_disc = $daoDisciplina->matriculaDisciplina($matricula);
                
                if($ret_disc > 0){
                    
                    $daoCobranca = new CobrancaDAO();
                    
                    //GERA AS COBRANÇAS DA MATRICULA
                    $ret_cob = $daoCobranca->geraCobrancas($matricula, $qtdParcelas, $primeiraParcela);
                    
                    if($ret_cob > 0){
                        
                        $json = array("codigo" => 0, "message" => "success");
                        header("Content-Type: application/ json");
                        echo json_encode($json);                         
                    }else{
                        
                        $daoMatricula->deleteMatricula($matricula);
                        $json = array("codigo" => 1, "message" => $ret_cob);
                        header("Content-Type: application/ json");
                        echo json_encode($json);                         
                    }
                    
                }else{
                    
                    $daoMatricula->deleteMatricula($matricula);
                    $json = array("codigo" => 1, "message" => $ret_disc);
                    header("Content-Type: application/ json");
                    echo json_encode($json);                      
                }
                
            }else{
                $json = array("codigo" => 1, "message" => $ret_mat);
                header("Content-Type: application/ json");
                echo json_encode($json);
            }
            
        }
        
	protected function matriculasPorAluno($data) {
		$objData = json_decode($data);
                $pessoa = new PessoaModel();
                $pessoa->setId($objData->id_aluno);
                
                $dao = new MatriculaDAO();
                $dao->matriculasPorAluno($pessoa);
	} 
        
	protected function matriculasRegularesPorTurma($data) {
		$objData = json_decode($data);
                $turma = new TurmaModel();
                $turma->setId($objData->id_turma);
                
                $dao = new MatriculaDAO();
                $dao->matriculasRegularesPorTurma($turma);
	}      
        
	protected function matriculasRegularesPorTurmaInst($data) {
		$objData = json_decode($data);
                $turma = new TurmaModel();
                $turma->setId($objData->id_turma);
                
                $busca = $objData->busca;
                
                $dao = new MatriculaDAO();
                $dao->matriculasRegularesPorTurmaInst($turma, $busca);
	}        
}