<?php

include_once ('./dao/iTransacaoDAO.php');

class TransacaoDAO implements iTransacaoDAO {

	public function save(TransacaoModel $transacao){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_transacao`
                                (c_tr_codigotransacao, 
                                c_cb_id, 
                                c_tr_datainicio, 
                                c_tr_datapagamento, 
                                c_tr_valorcobrado, 
                                c_tr_valor_pago, 
                                c_tr_status, 
                                c_tr_urlboleto, 
                                c_tr_urlboletopdf)
                            VALUES
                                (?,?,?,?,?,?,?,?,?)";
                $parametros = array($transacao->getCodTransacao(), 
                                    $transacao->getCobranca()->getId(),
                                    $transacao->getDataInicio(),
                                    $transacao->getDataPagamento(),
                                    $transacao->getValorCobrado(),
                                    $transacao->getValorPago(),
                                    $transacao->getStatus(),
                                    $transacao->getUrlBoleto(),
                                    $transacao->getUrlBoletoPdf());
                
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
        
	public function update(TransacaoModel $transacao){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_transacao`
                        SET
                            c_tr_codigotransacao = ?, 
                            c_cb_id = ?, 
                            c_tr_datainicio = ?, 
                            c_tr_datapagamento = ?, 
                            c_tr_valorcobrado = ?, 
                            c_tr_valor_pago = ?, 
                            c_tr_status = ?, 
                            c_tr_urlboleto = ?, 
                            c_tr_urlboletopdf = ?
                        WHERE 
                            `c_tr_id` = ?";
                
                $parametros = array($transacao->getCodTransacao(), 
                                    $transacao->getCobranca()->getId(),
                                    $transacao->getDataInicio(),
                                    $transacao->getDataPagamento(),
                                    $transacao->getValorCobrado(),
                                    $transacao->getValorPago(),
                                    $transacao->getStatus(),
                                    $transacao->getUrlBoleto(),
                                    $transacao->getUrlBoletoPdf(),
                                    $transacao->getId());
                
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

	public function view(TransacaoModel $transacao){
            $json = Array();
            try{
                $sql = "SELECT 
                            t.c_tr_id as id,
                            t.c_tr_codigotransacao as cod_transacao, 
                            t.c_cb_id as cobranca_id, 
                            t.c_tr_datainicio as dataInicio, 
                            t.c_tr_datapagamento as dataPagamento, 
                            t.c_tr_valorcobrado as valorCobrado, 
                            t.c_tr_valor_pago as valorPago, 
                            t.c_tr_status as status, 
                            t.c_tr_urlboleto as urlBoleto, 
                            t.c_tr_urlboletopdf as urlBoletoPdf
                        FROM 
                            c_transacao as t
                        WHERE
                            t.c_tr_id = ?";
                
                $parametros = array($transacao->getId());
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
                            t.c_tr_id as id,
                            t.c_tr_codigotransacao as cod_transacao, 
                            t.c_cb_id as cobranca_id, 
                            t.c_tr_datainicio as dataInicio, 
                            t.c_tr_datapagamento as dataPagamento, 
                            t.c_tr_valorcobrado as valorCobrado, 
                            t.c_tr_valor_pago as valorPago, 
                            t.c_tr_status as status, 
                            t.c_tr_urlboleto as urlBoleto, 
                            t.c_tr_urlboletopdf as urlBoletoPdf
                        FROM 
                            c_transacao as t";
                
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

	public function delete(TransacaoModel $transacao){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_transacao
                        WHERE
                            c_tr_id = ?";
                
                $parametros = array($transacao->getId());
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