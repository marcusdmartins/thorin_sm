<?php

include_once ('./dao/iMediaDAO.php');
include_once ('./model/MediaMDModel.php');
include_once ('./model/MediaModel.php');
include_once ('./model/TipoAvaliacaoModel.php');

class MediaDAO implements iMediaDAO {

	public function save(MediaModel $media){
            $json = Array();
            try{
                $sql = "INSERT INTO c_media
                                (c_media_nome, c_media_corte, c_media_tipo)
                            VALUES
                                (?,?,?)";
                $parametros = array($media->getNome(), $media->getCorte(), $media->getTipo());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $m = $this->buscaUltimaMedia();
                    return $m->id;
                }else{
                    return "error";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }
	}
        
	public function update(MediaModel $media){
            
            try{
                $sql = "UPDATE c_media
                        SET
                            c_media_nome = ?,
                            c_media_corte = ?,
                            c_media_tipo = ?
                        WHERE 
                            c_media_id = ?";
                
                $parametros = array($media->getNome(),
                                    $media->getCorte(),
                                    $media->getTipo(),
                                    $media->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return 0;
                }else{
                    return 1;
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }   
	}        

	public function view(MediaModel $media){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.c_media_id as id, 
                            m.c_media_nome as nome,
                            m.c_media_corte as corte,
                            m.c_media_tipo as tipo
                        FROM 
                            c_media as m
                        WHERE
                            m.c_media_id = ?";
                
                $parametros = array($media->getId());
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
                            m.c_media_id as id, 
                            m.c_media_nome as nome,
                            m.c_media_corte as corte,
                            m.c_media_tipo as tipo
                        FROM 
                            c_media as m";
                
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

	public function delete(MediaModel $media){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_media
                        WHERE
                            c_media_id = ?";
                
                $parametros = array($media->getId());
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
            
            header("Content-Type: application/ json");
            echo json_encode ($json);             
	}
        
	public function viewMediaMd(MediaMDModel $media){
            $json = Array();
            try{
                $sql = "SELECT 
                            m.m_media_md_id as id, 
                            m.c_media_id as id_media,
                            m.c_md_id as md,
                            m.m_media_md_valor as valor
                        FROM 
                            m_media_md as m
                        WHERE
                            m.m_media_md_id = ?";
                
                $parametros = array($media->getId());
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
            
            return $json;
	}        
        
	public function updateMediaMD(MediaMDModel $media){
            
            try{
                $sql = "UPDATE m_media_md
                        SET
                            m_media_md_valor = ?
                        WHERE 
                            m_media_md_id = ?";
                
                $parametros = array($media->getValor(),
                                    $media->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return "error";
                }else{
                    return "success";
                }
                
            } catch (Exception $e){
                return $e->getMessage();
            }   
	}           
        
	public function relacionaTipos(MediaModel $media, TipoAvaliacaoModel $tipoAvaliacao){
            $json = Array();
            try{
                $sql = "INSERT INTO m_media_tipoavaliacao
                                (c_media_id, c_ta_id)
                            VALUES
                                (?,?)";
                $parametros = array($media->getId(), $tipoAvaliacao->getId());
                
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
        
	public function buscaUltimaMedia(){
            $result = Array();
            try{
                $sql = "SELECT 
                            m.c_media_id as id, 
                            m.c_media_nome as nome
                        FROM 
                            c_media as m
                        ORDER BY
                            id DESC";
                
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
        
	public function tipoAvaliacaoPorMedia(MediaModel $media, TipoAvaliacaoModel $tipo){
            $json = Array();
            try{
                $sql = "SELECT 
                            *
                        FROM 
                            m_media_tipoavaliacao as mta
                        WHERE
                            c_media_id = ? AND
                            c_ta_id = ?";
                
                $parametros = array($media->getId(), $tipo->getId());
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
        
	public function tipoAvaliacaoPorMediaInterno(MediaModel $media){     
            $tipos = Array();
            try{
                $sql = "SELECT 
                            ta.c_ta_id as id,
                            ta.c_ta_descricao as descricao
                        FROM
                            c_tipo_avaliacao as ta,
                            m_media_tipoavaliacao as mta
                        WHERE
                            ta.c_ta_id = mta.c_ta_id AND
                            mta.c_media_id = ?";
                
                $parametros = array($media->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($tipos, $dados);
                    }                    
                }else{
                    $tipos = "nenhum";
                }
                
            } catch (Exception $e){
                $tipos = $e->getMessage();
            }
            
            return $tipos;
	}
        
	public function buscaNotaPorTipo(MatriculaDisciplinaModel $md, TipoAvaliacaoModel $ta){                  
            try{
                $sql = "SELECT 
                            n.*
                        FROM
                            c_nota as n
                        WHERE
                            n.c_md_id = ? AND
                            n.c_ta_id = ?";
                
                $parametros = array($md->getId(), $ta->getId());
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
        
	public function excluiRelacionamentos(MediaModel $media){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            m_media_tipoavaliacao
                        WHERE
                            c_media_id = ?";
                $parametros = array($media->getId());
                
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
        
        public function gerarMedias(MatriculaDisciplinaModel $md){
            
            $medias = $this->buscaTodasAsMedias();
            $excl = $this->excluiMediasPorMD($md);
            
            foreach ($medias as $m){
                $media = new MediaModel();
                $media->setId($m->id);
                $qtdTipos = $this->buscaQtdTiposMedias($media);
                $completa = $this->mediaCompleta($md, $media);
                $recpMedia = $this->verificaRecpPorMedia($media);
                
                    if($completa == "true" && $recpMedia == "false"){
                        
                        if($qtdTipos > 0){
                            try{
                                $sql = "SELECT 
                                            SUM(n.c_nota_valor)/".$qtdTipos." as media 
                                        FROM 
                                            c_nota n, m_media_tipoavaliacao mt
                                        WHERE
                                            mt.c_media_id = ? AND
                                            mt.c_ta_id = n.c_ta_id AND
                                            n.c_md_id = ?";

                                $parametros = array($media->getId(), $md->getId());
                                $rs = ConnectionFactory::getConection()->prepare($sql);
                                $rs->execute($parametros);
                                $valor_media = $rs->fetch(PDO::FETCH_OBJ);

                                $mediaMd = new MediaMDModel();
                                $mediaMd->setMedia($media);
                                $mediaMd->setMd($md);
                                $mediaMd->setValor($valor_media->media);

                                if($valor_media->media > 0 or $valor_media->media != null){
                                    $lanca = $this->lancaMedia($mediaMd);
                                }else{
                                    $lanca = "nenhum";
                                }

                            } catch (Exception $e){
                                $lanca = $e->getMessage();
                            }
                        }
                    }else{
                        $lanca = "nenhum";
                    }
            }
            return $lanca;            
        }
        
        public function recuperarMedia(MediaMDModel $media, $valor){
            
            $mediaRecuperada = new MediaMDModel();
            $mediaAtual = $this->viewMediaMd($media);
            $valorRecuperado = ($valor + $mediaAtual->valor)/2;
            $mediaRecuperada->setId($mediaAtual->id);
            $mediaRecuperada->setValor($valorRecuperado);
            
            $result = $this->updateMediaMD($mediaRecuperada);
            return $result;
        }

        public function buscaTodasAsMedias(){
            $medias = Array();
            try{
                $sql = "SELECT 
                            m.c_media_id as id, 
                            m.c_media_nome as nome
                        FROM 
                            c_media as m";
                
                $parametros = array();
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($medias, $dados);
                    }
                }else{
                    $medias = "nenhum";
                }
                
            } catch (Exception $e){
                $medias = $e->getMessage();
            }
            return $medias;      
	}

	public function buscaQtdTiposMedias(MediaModel $media){
            $medias = Array();
            try{
                $sql = "SELECT 
                            *
                        FROM 
                            m_media_tipoavaliacao mta
                        WHERE
                            mta.c_media_id = ?";
                
                $parametros = array($media->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                return $rs->rowCount();
                
            }catch (Exception $e){
                return $e->getMessage();
            }  
	}

	public function lancaMedia(MediaMDModel $mediaMd){

            try{
                $sql = "INSERT INTO 
                            m_media_md 
                        (c_media_id, c_md_id, m_media_md_valor)
                            VALUES
                        (?,?,?)";
                
                $parametros = array($mediaMd->getMedia()->getId(), $mediaMd->getMd()->getId(), $mediaMd->getValor());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    return "success";
                }else{
                    return "error";
                }
            }catch (Exception $e){
                return $e->getMessage();
            }  
	} 
        
	public function excluiMediasPorMD(MatriculaDisciplinaModel $md){
            
            $medias = $this->buscaMediasPorMDInterno($md);
            
            if($medias != "nenhum"){
                foreach ($medias as $media){

                    $media_v = new MediaMDModel();
                    $media_v->setId($media->id);

                    //VERIFICA SE POSSUI RECUPERAÇÃO RELACIONADA
                    $result_recp = $this->verificaRecp($media_v);

                    //SE NÃO POSSUIR RECUPERAÇÃO A MÉDIA É EXCLUÍDA
                    if($result_recp == 'false'){
                        try{
                            $sql = "DELETE FROM 
                                        m_media_md 
                                    WHERE
                                        m_media_md_id = ?";

                            $parametros = array($media->id);
                            $rs = ConnectionFactory::getConection()->prepare($sql);
                            $rs->execute($parametros);

                        }catch (Exception $e){
                            return $e->getMessage();
                        }                     
                    }
                }
            }
 
	}
        
	public function buscaMediasPorMD(MatriculaDisciplinaModel $md){
            $json = Array();
            try{
                $sql = "SELECT
                            mmd.m_media_md_id as id,
                            mmd.m_media_md_valor as valor,
                            m.c_media_id as id_media, 
                            m.c_media_nome as nome,
                            m.c_media_corte as corte,
                            m.c_media_tipo as tipo
                        FROM 
                            m_media_md as mmd, 
                            c_media as m
                        WHERE
                            mmd.c_media_id = m.c_media_id AND
                            mmd.c_md_id = ?";
                
                $parametros = array($md->getId());
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
        
        public function buscaMediasPorMDInterno(MatriculaDisciplinaModel $md){
            $json = Array();
            try{
                $sql = "SELECT
                            mmd.m_media_md_id as id,
                            mmd.m_media_md_valor as valor,
                            m.c_media_id as id_media, 
                            m.c_media_nome as nome,
                            m.c_media_corte as corte,
                            m.c_media_tipo as tipo
                        FROM 
                            m_media_md as mmd, 
                            c_media as m
                        WHERE
                            mmd.c_media_id = m.c_media_id AND
                            mmd.c_md_id = ?";
                
                $parametros = array($md->getId());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    while ($dados = $rs->fetch(PDO::FETCH_OBJ)){
                        array_push($json, $dados);
                    }
                }else{
                    return "nenhum";
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            return $json;            
	}
        
        public function mediaCompleta(MatriculaDisciplinaModel $md, MediaModel $media){
            $cont = 0;
            $qtd_tipos = $this->buscaQtdTiposMedias($media);
            $tipos = $this->tipoAvaliacaoPorMediaInterno($media);
            foreach ($tipos as $tipo){
                $ta = new TipoAvaliacaoModel();
                $ta->setId($tipo->id);
                $verificador = $this->buscaNotaPorTipo($md, $ta);
                if($verificador == "true"){
                    $cont++;
                }
            }
            
            if($cont == $qtd_tipos){
                return "true";
            }else{
                return "false";
            }          
        }
        
        public function verificaRecp(MediaMDModel $media){
            try{
                $sql = "SELECT 
                            r.*
                        FROM 
                            c_recp as r
                        WHERE
                            r.c_media_id = ?";
                $parametros = array($media->getId());
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
        
        public function verificaRecpPorMedia(MediaModel $media){
            try{
                $sql = "SELECT 
                            r.*
                        FROM 
                            c_recp as r,
                            m_media_md as m
                        WHERE
                            r.c_media_id = m.m_media_md_id AND
                            m.c_media_id = ?";
                $parametros = array($media->getId());
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
}