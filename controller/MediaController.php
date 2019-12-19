<?php
include_once ('./dao/MediaDAO.php');
include_once ('./model/MediaModel.php');
include_once ('./model/MatriculaDisciplinaModel.php');
include_once ('./model/TipoAvaliacaoModel.php');


class MediaController {

	protected function view($nome) {
		include_once ($nome . '.html');
	}

	protected function novo($data) {
                
                $json = Array();
		$objData = json_decode($data);
                
                $media = new MediaModel();
                $media->setNome($objData->nome);
                $media->setCorte($objData->corte);
                $media->setTipo($objData->tipo);
                
                $tipos = $objData->tipos;
                
                $dao = new MediaDAO();
                $ret = $dao->save($media);
                
                if($ret != "error"){
                    $media->setId($ret);
                    if($tipos != "nenhum"){
                        foreach ($tipos as $id_tipo){
                            $tipoAvaliacao = new TipoAvaliacaoModel();
                            $tipoAvaliacao->setId($id_tipo);
                            
                            $result = $dao->relacionaTipos($media, $tipoAvaliacao);
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
                    $json = array("codigo" => 1, "message" => $result);
                }
                
                header("Content-type: application/json");
                echo json_encode($json);                
	}
        
	protected function update($data) {
		
                $json = Array();
		$objData = json_decode($data);
                
                $media = new MediaModel();
                $media->setId($objData->id);
                $media->setNome($objData->nome);
                $media->setCorte($objData->corte);
                $media->setTipo($objData->tipo);                
                
                $tipos = $objData->tipos;
                
                $dao = new MediaDAO();
                $ret = $dao->update($media);
                
                if($ret == 0){
                    $excl = $dao->excluiRelacionamentos($media);
                    if($excl == 0){
                        if($tipos != "nenhum"){
                            foreach ($tipos as $id_tipo){
                                $tipoAvaliacao = new TipoAvaliacaoModel();
                                $tipoAvaliacao->setId($id_tipo);
                                $result = $dao->relacionaTipos($media, $tipoAvaliacao);
                            }
                        }else{
                            $result = "success";
                        }       
                        
                        if($result == "success"){
                            $json = array("codigo" => 0, "message" => "success");
                        }else{
                            $json = array("codigo" => 1, "message" => $result);
                        }                          
                    }
                }else{
                    $json = array("codigo" => 1, "message" => $ret);
                }
                
                header("Content-type: application/json");
                echo json_encode($json);                
	}        

	protected function listar($data) {
		$objData = json_decode($data);
                $media = new MediaModel();
                $media->setId($objData->id);
                
                $dao = new MediaDAO();
                $dao->view($media);
	}

	protected function listarTudo() {
                $dao = new MediaDAO();
                $dao->listAll();
	}

	protected function deletar($data) {
		$objData = json_decode($data);
                
                $media = new MediaModel();
                $media->setId($objData->id);                
                
                $dao = new MediaDAO();
                $dao->delete($media);
	}
        
	protected function tipoAvaliacaoPorMedia($data) {
		$objData = json_decode($data);
                
                $media = new MediaModel();
                $media->setId($objData->media);     
                
                $tipoAvaliacao = new TipoAvaliacaoModel();
                $tipoAvaliacao->setId($objData->tipoAvaliacao);
                
                $dao = new MediaDAO();
                $dao->tipoAvaliacaoPorMedia($media, $tipoAvaliacao);
	} 
        
	protected function gerarMedias($data) {
		$objData = json_decode($data);
                
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);                
                
                $dao = new MediaDAO();
                $dao->gerarMedias($md);
	}

	protected function buscaMediasPorMD($data) {
		$objData = json_decode($data);
                
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md);                
                
                $dao = new MediaDAO();
                $dao->buscaMediasPorMD($md);
	}   
        
	protected function mediaCompleta($data) {
		$objData = json_decode($data);
                
                $md = new MatriculaDisciplinaModel();
                $md->setId($objData->md); 
                
                $media = new MediaModel();
                $media->setId($objData->media);
                
                $dao = new MediaDAO();
                $dao->mediaCompleta($md, $media);
	}        
}