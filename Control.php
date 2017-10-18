<?
include "DatabaseConnection.php";
setlocale(LC_MONETARY, 'pt_br');
class Control{
	
    public static function getPedidosPorExpositor($ide){
            $query = "select * from pedidos where fabrica_id = '$ide' order by id desc;";
            $pedidos = DatabaseConnection::execute($query,SELECTLIST);

            for($i=0; $i<count($pedidos); $i++){
                $comprador = self::getEmpresa($pedidos[$i]["loja_id"]);
                $pedidos[$i]["comprador"] = utf8_encode($comprador["nomeFantasia"])." - ".$comprador["cnpj"];
                $pedidos[$i]["valorTotal"] = number_format($pedidos[$i]["valorTotal"], 2, ',', '.'); 
                $pedidos[$i]["valorLiquido"] = number_format($pedidos[$i]["valorLiquido"], 2, ',', '.');
                
                $idPedido = $pedidos[$i]["id"];
                $query = "select quantidade from itemPedido where idPedido = '$idPedido';";
                $qtdPedido = DatabaseConnection::execute($query,SELECTONE);
                $pedidos[$i]["qtdPecas"] = $qtdPedido[0];
            }

            return $pedidos;
    }

    public static function getEmpresa($idc){
            $query =  "select * from empresas where id = '$idc';";
            return DatabaseConnection::execute($query,SELECTONE);
    }

    public static function getParticipante($idp){
            $query =  "select * from participantes where id = '$idp';";
            $participante = DatabaseConnection::execute($query,SELECTONE);
            $datebd = $participante["dataNascimento"];
            $participante["dataNascimento"] =  self::formatDateInverse($datebd);
            return $participante;
    }
    
    public static function credenciarParticipante($post){
        $idp = $post["idp"];
        $codBarras = $post["idp"];
        
        $query = "UPDATE participantes SET codBarras='$codBarras'  where id = '$idp';";
        //echo $query;
        $result = DatabaseConnection::execute($query,UPDATE);
        if(!$result){
            return false;
        }
        return true;
        
    }

    public static function autentica($login,$senha){
            $senhamd5 = md5($senha);
        
            $query =  "select * from usuarios where username = '$login' and password='$senhamd5';";
        
            $usuario = DatabaseConnection::execute($query,SELECTONE);
            if(count($usuario) > 0){
                    $empresa = self::getEmpresaPorExpositor($usuario["participante_id"]);
                    $participante = self::getParticipante($usuario["participante_id"]);
                    $usuario["nome"] = utf8_encode($participante["nome"]);
                    $usuario["empresa"] = utf8_encode($empresa["nomeFantasia"]);
                    $usuario["ide"] = $empresa["id"];
                    $usuario["autenticado"] = true;
            }else{
                    $usuario["autenticado"] = false;
            }

            return $usuario;
    }


    public static function getCompradores(){
            $query = "select * from empresas where tipo = 'L' or tipo = 'X' or tipo = 'L' "
                    . "order by nomeFantasia;";
            $pedidos = DatabaseConnection::execute($query,SELECTLIST);

            return $pedidos;
    }
    
    public static function getExpositores(){
        $query = "select * from empresas where tipo = 'F' "
                    . "order by nomeFantasia;";
            $pedidos = DatabaseConnection::execute($query,SELECTLIST);

            return $pedidos;
    }
    
     public static function getRepresentantes(){
        $query = "select * from empresas where tipo = 'P' "
                    . "order by nomeFantasia;";
            $pedidos = DatabaseConnection::execute($query,SELECTLIST);

            return $pedidos;
    }
    
    public function getEmpresas(){
            $query = "select * from empresas order by nomeFantasia;";
            $pedidos = DatabaseConnection::execute($query,SELECTLIST);

            return $pedidos;
    }

    public static function getEmpresaPorExpositor($ide){
            $query =  "select * from empresas where id in (select empresa_id from empresarios where participante_id='$ide');";
            return DatabaseConnection::execute($query,SELECTONE);
    }

    public static function getCidades(){
            $query = "select id,nome from cidade order by nome;";
            $cidades = DatabaseConnection::execute($query,SELECTLIST);

            return $cidades;
    }

    public static function insertPedido($post){
        //print_r($post);
        $idVendedor         = $post["idVendedor"];
        $idComprador        = $post["idComprador"];
        $formaPagamento     = $post["formaPagamento"];
        $transportadora     = $post["transportadora"];
        $valorTotal         = str_replace(".", "",$post["valorTotal"]);
        $valorTotal         = str_replace(",", ".", $valorTotal);
        $desconto           = $post["desconto"];
        $valorFinal         = str_replace(".", "",$post["valorFinal"]);
        $valorFinal         = str_replace(",", ".", $valorFinal);
        $condicaoPagamento  = $post["condicaoPagamento"];
        $observacao         = $post["observacao"];
        $prazoEntrega       = $post["prazoEntrega"];
        //

        $query = "INSERT INTO pedidos VALUES 
                (NULL,'$idVendedor','$idComprador',CURDATE(),'$formaPagamento','$condicaoPagamento',"
                . "'$prazoEntrega','$transportadora','$desconto','$valorFinal',"
                . "'$valorTotal','$observacao','C');";
        echo $query;
        $idPedido = DatabaseConnection::execute($query,INSERTWITHIDRETRUNED);
        if(!$idPedido){
            return false;
        }
        //echo $post["itensPedido"];
        if(self::processaItensPedidoString($idPedido,$post["itensPedido"])){
            return Array(0 => true, 1 => $idPedido);
        }
        return false;
    }
    
    public static function insertPedidoD($post){
        //print_r($post);
        $idVendedor         = $post["idVendedor"];
        $idComprador        = $post["idComprador"];
        $formaPagamento     = $post["formaPagamento"];
        $transportadora     = $post["transportadora"];
        $valorTotal         = $post["valorTotal"];
        $desconto           = $post["desconto"];
        $valorFinal         = $post["valorFinal"];
        $condicaoPagamento  = $post["condicaoPagamento"];
        $observacao         = $post["observacao"];
        $prazoEntrega       = $post["prazoEntrega"];
        //

        $query = "INSERT INTO pedidos VALUES 
                (NULL,'$idVendedor','$idComprador',CURDATE(),'$formaPagamento','$condicaoPagamento',"
                . "'$prazoEntrega','$transportadora','$desconto','$valorFinal',"
                . "'$valorTotal','$observacao','C');";
        //echo $query;
        $idPedido = DatabaseConnection::execute($query,INSERTWITHIDRETRUNED);
        if(!$idPedido){
            return false;
        }
        return Array(0 => true, 1 => $idPedido);

    }
    
    public static function updatePedido($post){
        //print_r($post);
        $idPedido         = $post["idPedido"];
        $idComprador        = $post["idComprador"];
        $formaPagamento     = $post["formaPagamento"];
        $transportadora     = $post["transportadora"];
        $valorTotal         = str_replace(".", "",$post["valorTotal"]);
        $valorTotal         = str_replace(",", ".", $valorTotal);
        $desconto           = $post["desconto"];
        $valorFinal         = str_replace(".", "",$post["valorFinal"]);
        $valorFinal         = str_replace(",", ".", $valorFinal);
        $condicaoPagamento  = $post["condicaoPagamento"];
        $observacao         = $post["observacao"];
        $prazoEntrega       = $post["prazoEntrega"];
        //

        $query = "UPDATE pedidos SET loja_id='$idComprador', formaPagamento = '$formaPagamento',"
                . "condicaoPagamento = '$condicaoPagamento',"
                . "prazoEntrega = '$prazoEntrega',"
                . "nomeTransportadora = '$transportadora',"
                . "desconto = '$desconto',"
                . "valorLiquido = '$valorFinal',"
                . "valorTotal = '$valorTotal',"
                . "observacao = '$observacao' where id = '$idPedido';";
        //echo $query;
        $result = DatabaseConnection::execute($query,UPDATE);
        if(!$result){
            return false;
        }
        self::deleteAllItensPedidoPorPedido($idPedido);
        //echo $post["itensPedido"];
        if(self::processaItensPedidoString($idPedido,$post["itensPedido"])){
            return Array(0 => true, 1 => $idPedido);
        }
        return false;
    }

    private static function processaItensPedidoString($idPedido,$itensPedidoString){
        //echo $itensPedidoString;
        $itensPedido = explode("|", $itensPedidoString);
        $cadastrou = true;
        for($i = 0; $i < count($itensPedido)-1; $i++){
            $itemPedido = $itensPedido[$i];
            $valoresItem = explode("@", $itemPedido);
            $itemRow["idp"] = $idPedido;
            $itemRow["res"] = $valoresItem[1];
            $itemRow["des"] = $valoresItem[2];
            $itemRow["tam"] = $valoresItem[3];
            $itemRow["pcu"] = $valoresItem[4];
            $itemRow["qtd"] = $valoresItem[5];
            $itemRow["pct"] = $valoresItem[6];
            
            if(!Control::insertItemPedido($itemRow)){
                self::deleteAllItensPedidoPorPedido($idPedido);
                $cadastrou = false;
            }
        }//for
        return $cadastrou;
    }//processaItensPedidoString
    
    private static function insertItemPedido($itemPedido){
        $idp = $itemPedido["idp"];
        $res = $itemPedido["res"];
        $des = $itemPedido["des"];
        $tam = $itemPedido["tam"];
        $pcu = str_replace(".", "",$itemPedido["pcu"]);
        $pcu = str_replace(",", ".",$pcu);
        $qtd = str_replace(".", "",$itemPedido["qtd"]);
        $pct = str_replace(".", "",$itemPedido["pct"]);
        $pct = str_replace(",", ".",$pct);
        
        $query =  "INSERT INTO itemPedido VALUES 
                ('$idp','$res','$des','$tam','$pcu','$qtd','$pct');";
        //echo $query;
        return DatabaseConnection::execute($query,INSERT);
    }
    
    private static function insertItemPedidoD($itemPedido){
        //print_r($itemPedido);
        $idp = $itemPedido["idPedido"];
        $res = $itemPedido["referencia"];
        $des = $itemPedido["descricao"];
        $tam = $itemPedido["tamanhos"];
        $pcu = $itemPedido["precoUnitario"];
        $qtd = $itemPedido["quantidade"];
        $pct = $itemPedido["precoTotal"];
        
        $query =  "INSERT INTO itemPedido VALUES 
                ('$idp','$res','$des','$tam','$pcu','$qtd','$pct');";
        echo $query;
        return DatabaseConnection::execute($query,INSERT);
    }
    
    private static function deleteAllItensPedidoPorPedido($idPedido){
        $query = "delete from itemPedido where idPedido = '$idPedido'";
        Return DatabaseConnection::execute($query, DELETE);
    }
    
    public static function  getPedido($idPedido){
        $query =  "select * from pedidos where id = '$idPedido';";
        $pedido = DatabaseConnection::execute($query,SELECTONE);
        
        $idVendedor = $pedido["fabrica_id"];
        $idComprador = $pedido["loja_id"];
        $pedido["vendedor"] = self::getEmpresa($idVendedor);
        $pedido["comprador"] = self::getEmpresa($idComprador);
        $pedido["itensPedido"] = self::getItensPedido($idPedido);
        return $pedido;
    }
    
    public static function getItensPedido($idPedido){
        $query = "select * from itemPedido where idPedido = '$idPedido' ;";
        return DatabaseConnection::execute($query,SELECTLIST);
    }
    
    public static function cancelPedido($post){
        
        $idp = $post["idPedido"];
        $motivo = $post["motivo"];
        $query =  "INSERT INTO cancelamentoPedido VALUES 
                ('$idp','$motivo');";
        DatabaseConnection::execute($query,INSERT);
        $query = "UPDATE pedidos set situacao = 'X' where id = '$idp'";
        if(DatabaseConnection::execute($query,UPDATE)){
            return Array(0 => true);
        }
        return false;
    }
    
    public static function duplicPedido($post){
        
        $idp = $post["idPedido"];
        $idComprador = $post["idComprador"];
        $pedido = self::getPedido($idp);
        $pedido["idVendedor"] = $pedido["fabrica_id"];
        $pedido["idComprador"] = $idComprador;
        $pedido["valorFinal"] = $pedido["valorLiquido"];
        
        $pedidoInsert = self::insertPedidoD($pedido) ;
        $itensPedido = self::getItensPedido($idp);
        echo $pedidoInsert[1];
        for($i = 0; $i < count($itensPedido); $i++){
            $itemPedido = $itensPedido[$i];
            $itemPedido["idPedido"] = $pedidoInsert[1];
            $itemPedido["res"] = $itemPedido["referencia"] ;
            $itemPedido["des"] = $itemPedido["descricao"] ;
            $itemPedido["tam"] = $itemPedido["tamanhos"] ;
            $itemPedido["pcu"] = $itemPedido["referencia"] ;
            $itemPedido["pct"] = $itemPedido["referencia"] ;
            $itemPedido["qtd"] = $itemPedido["quantidade"] ;
            self::insertItemPedidoD($itemPedido);
        }
        return $pedidoInsert;
    }
    
    /*
    * formata a data conforme o BD
   */
   function formatDate($data){
           $dia = substr($data,0,2);
           $mes = substr($data,3,2);
           $ano = substr($data,6,4);
           $separador = "-";
           return $ano.$separador.$mes.$separador.$dia;
   }

   /*
    * formata a data para ser exibida na página
   */
   function formatDateInverse($data){
           $ano = substr($data,0,4);
           $mes = substr($data,5,2);
           $dia = substr($data,8,2);
           $separador = "/";
           $datafinal = $dia.$separador.$mes.$separador.$ano;
           if($datafinal == "00/00/0000"){
                   return "";
           }
           return $dia.$separador.$mes.$separador.$ano;
   }
    
    public static function insertPessoa($post){
        $nome = strtoupper($post["nome"]);
        $cpf = $post["cpf"];
        $cep = $post["cep"];
        $pais = "BRASIL";
        $estado = $post["estado"];
        $cidade = strtoupper($post["cidade"]);
        $bairro = strtoupper($post["bairro"]);
        $logradouro = $post["logradouro"];
        $numero = $post["numero"];
        $telResidencial = $post["telResidencial"];
        $telCelular = $post["telCelular"];
        $email = $post["email"];
        $sexo = $post["sexo"];
        $nomeCracha = strtoupper($post["nomeCracha"]);
        $nomeEntidade = strtoupper($post["nomeEntidade"]);
        $idEmpresa = $post["idEmpresa"];
        if(strlen($post["dataNascimento"]) == 0){
            $dataNascimento = "0000-00-00";
        }else{
            $dataNascimento = self::formatDate($post["dataNascimento"]);
        }

        $tipo = $post["tipo"];
        $ide = 0;
        if($tipo == 'E' || $tipo == 'S' || $tipo == 'L' || $tipo == 'X' || $tipo == 'P'){
            if($idEmpresa == "0"){
                $nomeEntidade = "";
            }else{
                $empresa = self::getEmpresa($idEmpresa);
                $nomeEntidade = $empresa["nomeFantasia"]."-".$empresa["estado"];
                $ide = $empresa["id"];
            }
        }elseif($tipo == 'M'){
            $nomeEntidade = "IMPRENSA";
        }elseif($tipo == 'C'){
            $nomeEntidade = "ORGANIZAÇÃO";
        }elseif($tipo == 'V'){
            $nomeEntidade = "VISITANTE";
        }elseif($tipo == 'A'){
            $nomeEntidade = "APOIO";
        }else{
            $nomeEntidade = $nomeEntidade;
        }
        
        $query = "INSERT INTO participantes VALUES "
                . "(NULL,'$nome','$cpf','$cep','$pais','$estado',"
                . "'$cidade','$bairro','$logradouro','$numero',"
                . "'$telResidencial','$telCelular','','','$email','','$sexo','$dataNascimento',"
                . "'$tipo','','','$nomeCracha','$nomeEntidade');";
        $idPessoa = DatabaseConnection::execute($query,INSERTWITHIDRETRUNED);
        
        if(!$idPessoa){
            return false;
        }else{
            if($tipo == 'E' || $tipo == 'S' || $tipo == 'L' || $tipo == 'X' || $tipo == 'P'){
                $post2 = Array();
                $post2["ide"] = $ide;
                $post2["idp"] = $idPessoa;
                self::insertEmpresario($post2);
            }
            return Array(0 => true, 1 => $idPessoa);
        }
    }
    
    public static function updatePessoa($post){
        $idp = $post["idp"];
        $nome = strtoupper($post["nome"]);
        $cpf = $post["cpf"];
        $cep = $post["cep"];
        $pais = "BRASIL";
        $estado = $post["estado"];
        $cidade = strtoupper($post["cidade"]);
        $bairro = strtoupper($post["bairro"]);
        $logradouro = strtoupper($post["logradouro"]);
        $numero = $post["numero"];
        $telResidencial = $post["telResidencial"];
        $telCelular = $post["telCelular"];
        $email = $post["email"];
        $sexo = $post["sexo"];
        $nomeCracha = strtoupper($post["nomeCracha"]);
        $nomeEntidade = strtoupper($post["nomeEntidade"]);
        $idEmpresa = $post["idEmpresa"];
        if(strlen($post["dataNascimento"]) == 0){
            $dataNascimento = "0000-00-00";
        }else{
            $dataNascimento = self::formatDate($post["dataNascimento"]);
        }

        $tipo = $post["tipo"];
        $ide = 0;
        if($tipo == 'E' || $tipo == 'S' || $tipo == 'L' || $tipo == 'X' || $tipo == 'P'){
            if($idEmpresa == "0"){
                $nomeEntidade = "";
            }else{
                $empresa = self::getEmpresa($idEmpresa);
                $nomeEntidade = $empresa["nomeFantasia"]."-".$empresa["estado"];
                $ide = $empresa["id"];
            }
        }elseif($tipo == 'M'){
            $nomeEntidade = "IMPRENSA";
        }elseif($tipo == 'C'){
            $nomeEntidade = "ORGANIZAÇÃO";
        }elseif($tipo == 'V'){
            $nomeEntidade = "VISITANTE";
        }elseif($tipo == 'A'){
            $nomeEntidade = "APOIO";
        }else{
            $nomeEntidade = $nomeEntidade;
        }
        
        
        $query = "UPDATE participantes SET nome='$nome', cpf = '$cpf', cep = '$cep', estado = '$estado',"
                . " cidade = '$cidade', bairro = '$bairro',"
                . "logradouro = '$logradouro', numero = '$numero', telResidencial = '$telResidencial',"
                . " telCelular = '$telCelular', email = '$email', sexo = '$sexo',"
                . "dataNascimento = '$dataNascimento', tipo = '$tipo', nomeCracha = '$nomeCracha', "
                . "nomeEntidade = '$nomeEntidade' where id = '$idp'";
        echo $query;
                
        $idPessoa = DatabaseConnection::execute($query,UPDATE);
        
        
        if(!$idPessoa){
            return false;
        }else{
            
            if($tipo == 'E' || $tipo == 'S' || $tipo == 'L' || $tipo == 'X' || $tipo == 'P'){
                self::deleteEmpresario($idp);
                if($idEmpresa != "0"){
                    
                    $post2 = Array();
                    $post2["ide"] = $idEmpresa;
                    $post2["idp"] = $idp;
                    self::insertEmpresario($post2);
                }else{
                    
                }
                
            }
            return Array(0 => true, 1 => $idp);
        }
    }
    
    public static function getParticipanteByCPF($cpf){
        $query =  "select * from participantes where cpf = '$cpf';";
        
        $query = "select count(id) as qtd from participantes where cpf = '$cpf' ";
        $qtd = DatabaseConnection::execute($query,SELECTONE);
        $resultado = Array();
        if($qtd["qtd"] > 0){
            $query = "select * from participantes where cpf = '$cpf';";
            $part =  DatabaseConnection::execute($query,SELECTONE);
            $resultado[0] = true;
            $resultado[1] = $part["id"];
            return $resultado;
        }else{
            $resultado[0] = false;
            return $resultado;
        }
    }
    
    public static function insertEmpresario($post){
        $ide = $post["ide"];
        $idp = $post["idp"];
        
        $query = "INSERT INTO empresarios VALUES (NULL,'$ide','$idp');";
        return DatabaseConnection::execute($query,INSERT);
    }
    
    public static function getEmpresarioByParticipante($idp){
        
        $query = "select * from empresarios where participante_id = '$idp'";
        return DatabaseConnection::execute($query,SELECTONE);
    }
    
    public static function deleteEmpresario($idp){
        $query = "delete from empresarios where participante_id = '$idp'";
        return DatabaseConnection::execute($query,DELETE);
    }
    
    public static function insertEmpresa($post){
        $nomeFantasia = strtoupper($post["nomeFantasia"]);
        $cnpj = $post["cnpj "];
        $razaoSocial = $post["razaoSocial"];
         if(strlen($post["dataAbertura"]) == 0){
            $dataAbertura = "0000-00-00";
        }else{
            $dataAbertura = self::formatDate($post["dataAbertura"]);
        }
        $estado = $post["estado"];
        $cidade = strtoupper($post["cidade"]);
        $bairro = strtoupper($post["bairro"]);
        $logradouro = $post["logradouro"];
        $numero = $post["numero"];
        $telComercial = $post["telComercial"];
        $telCelular = $post["telCelular"];
        $email = $post["email"];
        
        $tipo = $post["tipo"];
        
        
        $query = "INSERT INTO empresas VALUES "
                . "(NULL,'$cnpj','$nomeFantasia','$razaoSocial','0','$dataAbertura',"
                . "'','','$cep','BRASIL','$estado','$cidade','$bairro','$logradouro','$numero',"
                . "'','$telCelular','$telComercial','','$email','','$tipo',"
                . "'0','0','0','0','0','0','0','0','0','0','0');";
        echo $query;
        $idEmpresa = DatabaseConnection::execute($query,INSERTWITHIDRETRUNED);
        
        if(!$idEmpresa){
            return false;
        }else{
            return Array(0 => true, 1 => $idEmpresa);
        }
    }
    
    public static function verificaCodBarras($post){
        $codb = $post["codb"];
        $setor = $post["setor"];
        
        $query = "select count(id) as qtd from participantes where codBarras = '$codb' ";
        $qtd = DatabaseConnection::execute($query,SELECTONE);
        $resultado = Array();
        if($qtd["qtd"] > 0){
            $query = "insert into acessos values (NULL,'$codb', CURDATE(),CURTIME(), '$setor');";
            echo $query;
            $part =  DatabaseConnection::execute($query,INSERT);
            $resultado[0] = true;
            return $resultado;
        }else{
            $resultado[0] = false;
            return $resultado;
        }
    }
    
    public static function insertAgendamento($post){
        $idc = $post["idc"];
        $ide = $post["ide"];
        
        $query = "INSERT INTO agendamento VALUES ('$idc','$ide',CURDATE(),CURTIME());";
        return DatabaseConnection::execute($query,INSERT);
    }
    
    public static function vincularRepresentante($post){
        
        $idr = $post["idr"];
        $idc = $post["idc"];
    
         $query = "UPDATE empresas SET idRepresentante='$idr' where id = '$idc'";
         return DatabaseConnection::execute($query, UPDATE);
    }
}
?>