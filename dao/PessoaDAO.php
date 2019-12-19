<?php

include_once ('./dao/iPessoaDAO.php');

class PessoaDAO implements iPessoaDAO {

	public function save(PessoaModel $pessoa){
            $json = Array();
            try{
                $sql = "INSERT INTO `c_pessoa`
                               (c_pessoa_nome, 
                                c_pessoa_login,
                                c_pessoa_datanascimento,
                                c_pessoa_sexo,
                                c_pessoa_email, 
                                c_pessoa_senha, 
                                c_pessoa_fone,
                                c_pessoa_celular,
                                c_tipousuario_id, 
                                c_pessoa_cpf,
                                c_pessoa_codinterno,
                                c_pessoa_endereco_cep,
                                c_pessoa_endereco_rua,
                                c_pessoa_endereco_numero,
                                c_pessoa_endereco_complemento,
                                c_pessoa_endereco_bairro,
                                c_pessoa_id_responsavel)
                            VALUES
                                (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                
                $parametros = array($pessoa->getNome(),
                                    $pessoa->getLogin(),
                                    $pessoa->getDataNascimento(),
                                    $pessoa->getSexo(),
                                    $pessoa->getEmail(),
                                    md5($pessoa->getSenha()),
                                    $pessoa->getFone(),
                                    $pessoa->getCelular(),
                                    $pessoa->getTipoUsuario()->getId(),
                                    $pessoa->getCpf(),
                                    $pessoa->getCodigoInterno(),
                                    $pessoa->getEnderecoCEP(),
                                    $pessoa->getEnderecoRua(),
                                    $pessoa->getEnderecoNumero(),
                                    $pessoa->getEnderecoComplemento(),
                                    $pessoa->getEnderecoBairro(),
                                    $pessoa->getResponsavel()->getId());
                
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $pessoa_nova = $this->pessoaUltimoResgistro();
                    $json = array("codigo" => 0, "message" => "success", "id" => $pessoa_nova->getId());
                }else{
                    $json = array("codigo" => 1, "message" => "error");
                }
                
            } catch (Exception $e){
                $json = array("codigo" => 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/json");
            echo json_encode($json);
	}
        
	public function update(PessoaModel $pessoa){
            
            $json = Array();
            try{
                $sql = "UPDATE `c_pessoa`
                        SET
                            c_pessoa_nome = ?, 
                            c_pessoa_login = ?,
                            c_pessoa_datanascimento = ?, 
                            c_pessoa_sexo = ?,
                            c_pessoa_email = ?,
                            c_pessoa_fone = ?,
                            c_pessoa_celular = ?,
                            c_tipousuario_id = ?, 
                            c_pessoa_cpf = ?,
                            c_pessoa_codinterno = ?,
                            c_pessoa_endereco_cep = ?,
                            c_pessoa_endereco_rua = ?,
                            c_pessoa_endereco_numero = ?,
                            c_pessoa_endereco_complemento = ?,
                            c_pessoa_endereco_bairro = ?,
                            c_pessoa_id_responsavel = ?
                        WHERE 
                            `c_pessoa_id` = ?";
                
                $parametros = array($pessoa->getNome(),
                                    $pessoa->getLogin(),
                                    $pessoa->getDataNascimento(),
                                    $pessoa->getSexo(),
                                    $pessoa->getEmail(),
                                    $pessoa->getFone(),
                                    $pessoa->getCelular(),
                                    $pessoa->getTipoUsuario()->getId(),
                                    $pessoa->getCpf(),
                                    $pessoa->getCodigoInterno(),
                                    $pessoa->getEnderecoCEP(),
                                    $pessoa->getEnderecoRua(),
                                    $pessoa->getEnderecoNumero(),
                                    $pessoa->getEnderecoComplemento(),
                                    $pessoa->getEnderecoBairro(),
                                    $pessoa->getResponsavel()->getId(),
                                    $pessoa->getId());
                
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

	public function view(PessoaModel $pessoa){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_pessoa_id as id, 
                            p.c_pessoa_nome as nome, 
                            p.c_pessoa_login as login,
                            p.c_pessoa_datanascimento as dataNascimento, 
                            p.c_pessoa_sexo as sexo,
                            p.c_pessoa_email as email, 
                            p.c_pessoa_senha as senha, 
                            p.c_pessoa_fone as fone, 
                            p.c_pessoa_celular as celular, 
                            p.c_tipousuario_id as tipo_usuario, 
                            p.c_pessoa_cpf as cpf,
                            p.c_pessoa_codinterno as codigoInterno,
                            p.c_pessoa_endereco_cep as cep,
                            p.c_pessoa_endereco_rua as rua,
                            p.c_pessoa_endereco_numero as numero,
                            p.c_pessoa_endereco_complemento as complemento,
                            p.c_pessoa_endereco_bairro as bairro,
                            p.c_pessoa_id_responsavel as id_responsavel
                        FROM 
                            c_pessoa as p
                        WHERE
                            p.c_pessoa_id = ?";
                
                $parametros = array($pessoa->getId());
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
                            p.c_pessoa_id as id,
                            p.c_pessoa_nome as nome, 
                            p.c_pessoa_login as login,
                            p.c_pessoa_datanascimento as dataNascimento, 
                            p.c_pessoa_sexo as sexo,
                            p.c_pessoa_email as email, 
                            p.c_pessoa_senha as senha, 
                            p.c_pessoa_fone as fone, 
                            p.c_pessoa_celular as celular, 
                            p.c_tipousuario_id as tipo_usuario, 
                            p.c_pessoa_cpf as cpf,
                            p.c_pessoa_codinterno as codigoInterno,
                            p.c_pessoa_endereco_cep as cep,
                            p.c_pessoa_endereco_rua as rua,
                            p.c_pessoa_endereco_numero as numero,
                            p.c_pessoa_endereco_complemento as complemento,
                            p.c_pessoa_endereco_bairro as bairro,
                            p.c_pessoa_id_responsavel as id_responsavel
                        FROM 
                            c_pessoa as p";
                
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

	public function delete(PessoaModel $pessoa){
            $json = Array();
            try{
                $sql = "DELETE FROM 
                            c_pessoa
                        WHERE
                            c_pessoa_id = ?";
                
                $parametros = array($pessoa->getId());
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
        
	public function buscaPorLogin(PessoaModel $pessoa){
            $json = Array();
            try{
                $sql = "SELECT 
                           *
                        FROM 
                            c_pessoa as p
                        WHERE
                            p.c_pessoa_login = ?";
                
                $parametros = array($pessoa->getLogin());
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = array("codigo" => 0, "message" => "indisponivel");
                }else{
                    $json = array("codigo" => 0, "message" => "disponivel");
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);
	}

	public function buscaInstPessoa($busca, TipoUsuarioModel $tipoUsuario){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_pessoa_id as id,
                            p.c_pessoa_nome as nome, 
                            p.c_pessoa_login as login,
                            p.c_pessoa_datanascimento as dataNascimento, 
                            p.c_pessoa_sexo as sexo,
                            p.c_pessoa_email as email, 
                            p.c_pessoa_senha as senha, 
                            p.c_pessoa_fone as fone, 
                            p.c_pessoa_celular as celular, 
                            p.c_tipousuario_id as tipo_usuario, 
                            p.c_pessoa_cpf as cpf,
                            p.c_pessoa_codinterno as codigoInterno,
                            p.c_pessoa_endereco_cep as cep,
                            p.c_pessoa_endereco_rua as rua,
                            p.c_pessoa_endereco_numero as numero,
                            p.c_pessoa_endereco_complemento as complemento,
                            p.c_pessoa_endereco_bairro as bairro,
                            p.c_pessoa_id_responsavel as id_responsavel
                        FROM 
                            c_pessoa as p
                        WHERE
                            c_tipousuario_id = ? AND
                            (c_pessoa_nome LIKE '%$busca%' OR
                            c_pessoa_cpf LIKE '%$busca%' OR
                            c_pessoa_email LIKE '%$busca%' OR
                            c_pessoa_login LIKE '%$busca%')";
                
                $parametros = array($tipoUsuario->getId());
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

	public function listarPorTipo(TipoUsuarioModel $tipo){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_pessoa_id as id,
                            p.c_pessoa_nome as nome, 
                            p.c_pessoa_login as login,
                            p.c_pessoa_datanascimento as dataNascimento, 
                            p.c_pessoa_sexo as sexo,
                            p.c_pessoa_email as email, 
                            p.c_pessoa_senha as senha, 
                            p.c_pessoa_fone as fone, 
                            p.c_pessoa_celular as celular, 
                            p.c_tipousuario_id as tipo_usuario, 
                            p.c_pessoa_cpf as cpf,
                            p.c_pessoa_codinterno as codigoInterno,
                            p.c_pessoa_endereco_cep as cep,
                            p.c_pessoa_endereco_rua as rua,
                            p.c_pessoa_endereco_numero as numero,
                            p.c_pessoa_endereco_complemento as complemento,
                            p.c_pessoa_endereco_bairro as bairro,
                            p.c_pessoa_id_responsavel as id_responsavel
                        FROM 
                            c_pessoa as p
                        WHERE
                            p.c_tipousuario_id = ?";
                
                $parametros = array($tipo->getId());
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

	public function pessoaUltimoResgistro(){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_pessoa_id as id, 
                            p.c_pessoa_nome as nome, 
                            p.c_pessoa_login as login,
                            p.c_pessoa_datanascimento as dataNascimento, 
                            p.c_pessoa_sexo as sexo,
                            p.c_pessoa_email as email, 
                            p.c_pessoa_senha as senha, 
                            p.c_pessoa_fone as fone, 
                            p.c_pessoa_celular as celular, 
                            p.c_tipousuario_id as tipo_usuario, 
                            p.c_pessoa_cpf as cpf,
                            p.c_pessoa_codinterno as codigoInterno,
                            p.c_pessoa_endereco_cep as cep,
                            p.c_pessoa_endereco_rua as rua,
                            p.c_pessoa_endereco_numero as numero,
                            p.c_pessoa_endereco_complemento as complemento,
                            p.c_pessoa_endereco_bairro as bairro,
                            p.c_pessoa_id_responsavel as id_responsavel
                        FROM 
                            c_pessoa as p
                        ORDER BY
                            p.c_pessoa_id DESC";
                
                $parametros = array();
                $rs = ConnectionFactory::getConection()->prepare($sql);
                $rs->execute($parametros);
                
                if($rs->rowCount() > 0){
                    $json = $rs->fetch(PDO::FETCH_OBJ);
                    
                    $pessoa = new PessoaModel();
                    $pessoa->setId($json->id);
                    return $pessoa;
                    
                }else{
                    $json = null;
                    return $json;
                }
                
            } catch (Exception $e){
                $json = array("codigo"=> 1, "message" => $e->getMessage());
                return $json;
            }
            
	}

	public function buscarPorResponsavel(PessoaModel $responsavel){
            $json = Array();
            try{
                $sql = "SELECT 
                            p.c_pessoa_id as id,
                            p.c_pessoa_nome as nome, 
                            p.c_pessoa_login as login,
                            p.c_pessoa_datanascimento as dataNascimento, 
                            p.c_pessoa_sexo as sexo,
                            p.c_pessoa_email as email, 
                            p.c_pessoa_senha as senha, 
                            p.c_pessoa_fone as fone, 
                            p.c_pessoa_celular as celular, 
                            p.c_tipousuario_id as tipo_usuario, 
                            p.c_pessoa_cpf as cpf,
                            p.c_pessoa_codinterno as codigoInterno,
                            p.c_pessoa_endereco_cep as cep,
                            p.c_pessoa_endereco_rua as rua,
                            p.c_pessoa_endereco_numero as numero,
                            p.c_pessoa_endereco_complemento as complemento,
                            p.c_pessoa_endereco_bairro as bairro,
                            p.c_pessoa_id_responsavel as id_responsavel
                        FROM 
                            c_pessoa as p
                        WHERE
                            p.c_pessoa_id_responsavel = ?";
                
                $parametros = array($responsavel->getId());
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

	public function alteraSenha(PessoaModel $pessoa, $novaSenha){
            
            $json = Array();
            if($this->verificaSenhaAntiga($pessoa) == "true"){
                try{
                
                    $sql = "UPDATE `c_pessoa`
                            SET
                                c_pessoa_senha = ?
                            WHERE 
                                `c_pessoa_id` = ?";

                    $parametros = array(md5($novaSenha),
                                        $pessoa->getId());

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
            
            }else{
                $json = array("codigo" => 1, "message" => "error - senha atual nao confere");
            }
            
            header("Content-Type: application/ json");
            echo json_encode ($json);             
	}
        
        public function verificaSenhaAntiga(PessoaModel $pessoa){
            
            try{
                
                $sql = "SELECT * FROM 
                            c_pessoa
                        WHERE c_pessoa_senha = ? AND 
                              c_pessoa_id = ?";
                
                $parametros = array(md5($pessoa->getSenha()), 
                                    $pessoa->getId());
                
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