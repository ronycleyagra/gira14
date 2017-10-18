<html>
<head>
    <meta charset="utf-8">
    <title>GiraTec - Rodada de Negócios Gira Calçados 2014</title>
    <link type="text/css" rel="stylesheet" href="../css/estilos.css" /> 
    <link type="text/css" rel="stylesheet" href="../css/tabela.css" /> 
    <link type="text/css" rel="stylesheet" href="../css/botao.css" /> 
    <link type="text/css" rel="stylesheet" href="../css/menu/menu.css" /> 
    <link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script> 
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="../js/openers.js"></script>
    <script type="text/javascript" src="../js/controls.js"></script>
    <script type="text/javascript" src="../js/mascara.js"></script>
    
</head>
<body>
        <div class="topo">
            <table width="100%" border="0" height="100%">
              <tr>
                <td width="5%" align="left"><img src="../images/logo.png" width="35" height="40" border="0"/></td>
                <td width="25%" valign="bottom"><font color="#FFFFFF">Gira Calçados 2014<br>
                PAINEL DE GERENCIAMENTO: <? echo $_GET["empresa"]; ?></font></td>
                <td width="70%" valign="bottom" align="right">
                    <a href="javascript:cadastrarEmpresa();">CADASTRAR EMPRESA</a> <font color="#FFFFFF">|</font> 
                    <a href="javascript:cadastrarPessoa();">CADASTRAR PESSOA</a> <font color="#FFFFFF">|</font> 
                    <a href="vincularRepC.php">VINCULAR REPRESENTANTE</a> <font color="#FFFFFF">|</font>
                    <a href="javascript:openUsuarios(<? echo $_GET["ide"]; ?>)">ACESSO</a> <font color="#FFFFFF">|</font>
                    <a href="sair.php">SAIR</a> &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
              </tr>
            </table>
        </div>
        <div class="conteudo" id="conteudo">
         <script type="text/javascript" src="../js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="../js/jquery.maskedinput-1.1.4.pack.js"/></script>   
<Script>
function mascaraDataNascimento(campoData){
	var data = campoData.value;
	if (data.length == 2){
		data = data + '/';
		document.formPessoaE.dataNascimento.value = data;
		return true;
	}
	if (data.length == 5){
		data = data + '/';
		document.formPessoaE.dataNascimento.value = data;
		return true;
	}
}//mascaraDataRG
function FormataCpf(campo, teclapres){
	var tecla = teclapres.keyCode;
	var vr = new String(campo.value);
	vr = vr.replace(".", "");
	vr = vr.replace("/", "");
	vr = vr.replace("-", "");
	tam = vr.length + 1;
	if (tecla != 14){
		if (tam == 4)
			campo.value = vr.substr(0, 3) + '.';
		if (tam == 7)
			campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 6) + '.';
		if (tam == 11)
			campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 3) + '.' + vr.substr(7, 3) + '-' + vr.substr(11, 2);
	}//if
}//FormataCpf
</script>
<?
include "../Control.php";
$idp = $_GET["idp"];
$participante = Control::getParticipante($idp);
$empresario = Control::getEmpresarioByParticipante($idp);
$empresa = Control::getEmpresa($empresario["empresa_id"]);
$tipos = Array();
$tipos[0] = Array(0=>'E',1=>"EXPOSITOR RODADA");
$tipos[1] = Array(0=>'L',1=>"COMPRADOR CONVIDADO");
$tipos[2] = Array(0=>'X',1=>"COMPRADOR ESPONTÂNEO");
$tipos[3] = Array(0=>'V',1=>"VISITANTE");
$tipos[4] = Array(0=>'P',1=>"REPRESENTANTE");
$tipos[5] = Array(0=>'J',1=>"COMPRADOR DE CARAVANA");
$tipos[6] = Array(0=>'I',1=>"INSTITUCIONAL");
$tipos[7] = Array(0=>'C',1=>"ORGANIZAÇÃO");
$tipos[8] = Array(0=>'M',1=>"IMPRENSA");
$tipos[9] = Array(0=>'A',1=>"APOIO");

$estados = Array();
$estados[0] = Array(0=>'AC',1=>"ACRE");
$estados[1] = Array(0=>'AL',1=>"ALAGOAS");
$estados[2] = Array(0=>'AP',1=>"AMAPÁ");
$estados[3] = Array(0=>'AM',1=>"AMAZONAS");
$estados[4] = Array(0=>'BA',1=>"BAHIA");
$estados[5] = Array(0=>'CE',1=>"CEARÁ");
$estados[6] = Array(0=>'DF',1=>"DISTRITO DEFERAL");
$estados[7] = Array(0=>'ES',1=>"ESPÍRITO SANTO");
$estados[8] = Array(0=>'GO',1=>"GOIÁS");
$estados[9] = Array(0=>'MA',1=>"MARANHÃO");
$estados[10] = Array(0=>'MT',1=>"MATO GROSSO");
$estados[11] = Array(0=>'MS',1=>"MATO GROSSO DO SUL");
$estados[12] = Array(0=>'MG',1=>"MINAS GERAIS");
$estados[13] = Array(0=>'PA',1=>"PARÁ");
$estados[14] = Array(0=>'PB',1=>"PARAÍBA");
$estados[15] = Array(0=>'PR',1=>"PARANÁ");
$estados[16] = Array(0=>'PE',1=>"PERNAMBUCO");
$estados[17] = Array(0=>'PI',1=>"PIAUÍ");
$estados[18] = Array(0=>'RJ',1=>"RIO DE JANEIRO");
$estados[19] = Array(0=>'RN',1=>"RIO GRANDE DO NORTE");
$estados[20] = Array(0=>'RS',1=>"RIO GRANDE DO SUL");
$estados[21] = Array(0=>'RO',1=>"RORAIMA");
$estados[22] = Array(0=>'RR',1=>"RONDÔNIA");
$estados[23] = Array(0=>'SP',1=>"SÃO PAULO");
$estados[24] = Array(0=>'SC',1=>"SANTA CATARINA");
$estados[25] = Array(0=>'SE',1=>"SERGIPE");
$estados[26] = Array(0=>'TO',1=>"TOCANTINS");

$sexos = Array();
$sexos[0] = Array(0=>'M',1=>"MASCULINO");
$sexos[1] = Array(0=>'F',1=>"FEMININO");
?>
<br>
            <table width="100%">
               <tr>
                    <td width="50%" align="left" class="trTopico">
                       Cadastro de participante
                    </td>
               </tr>
            </table>
            ﻿﻿﻿<form action="updatePessoa.php" method="post" name="formPessoaE">
                <input type="hidden" name="idp" value="<? echo $idp?>">
                <table width="100%">
                    <tr>
                        <td width="15%" align="left" valign="top" style="background-color: #DEDEDE;" >Tipo:</td>
                        <td width="85%" align="left">
                             <select name="tipo">
                            <?
                            for($i=0; $i<count($tipos); $i++){
                                if($participante["tipo"] == $tipos[$i][0]){
                                    ?>
                                <option value="<? echo $tipos[$i][0]; ?>" selected="selected">
                                            <? echo $tipos[$i][1]; ?>
                                </option>
                                <?
                                }else{
                                ?>
                                <option value="<? echo $tipos[$i][0]; ?>">
                                            <? echo $tipos[$i][1]; ?>
                                </option>
                                <?
                                }
                            }
                            ?>
                                 </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >EMPRESA:</td>
                        <td align="left">
                            <select name="idEmpresa" onChange="javascript: dadosComprador(this);" class="selectComprador">
                                <option value="0">
                                            SELECIONE A EMPRESA VINCULADA
                                </option>
                                <?php
                            
                            $compradores = Control::getEmpresas();
                            for($i=0; $i<count($compradores); $i++){
                                $comprador = $compradores[$i];
                                if($comprador["id"] == $empresa["id"]){
                                    ?>
                                <option value="<? echo $comprador["id"]; ?>" selected="selected">
                                            <? echo strtoupper($comprador["nomeFantasia"]); ?>
                                </option>
                                <?
                                }else{
                                ?>
                                <option value="<? echo $comprador["id"]; ?>">
                                            <? echo strtoupper($comprador["nomeFantasia"]); ?>
                                </option>
                                <?
                                }
                            }
                            ?>
                            </select> <font color="red">* Para participantes do tipo EXPOSITOR, COMPRADOR OU REPRESENTANTE</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME DA ENTIDADE:</td>
                        <td align="left">
                            <input type="text" name="nomeEntidade" id="nomeEntidade"  size="20" maxlength="20" value="<?echo $participante["nomeEntidade"];?>"><font color="red"> * caso o tipo seja INSTITUCIONAL</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CPF:</td>
                        <td align="left">
                            <input type="text" name="cpf" id="cpf" size="30" maxlength="11" onkeyup="FormataCpf(this,event)"  value="<?echo $participante["cpf"];?>"></td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME:</td>
                        <td align="left">
                            <input type="text" name="nome" id="cnpj"   size="50" value="<?echo strtoupper($participante["nome"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CEP:</td>
                        <td align="left">
                            <input type="text" name="cep" id="cnpj"  size="20" value="<?echo strtoupper($participante["cep"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;"  >LOGRADOURO:</td>
                        <td align="left">
                            <input type="text" name="logradouro" id="cnpj"   size="50" value="<?echo strtoupper($participante["logradouro"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NÚMERO:</td>
                        <td align="left">
                            <input type="text" name="numero" id="cnpj"   size="20" maxlength="17" value="<?echo strtoupper($participante["numero"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >BAIRRO:</td>
                        <td align="left">
                            <input type="text" name="bairro" id="cnpj"   size="50" value="<?echo strtoupper($participante["bairro"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CIDADE:</td>
                        <td align="left">
                            <input type="text" name="cidade" id="cnpj"   size="50" value="<?echo strtoupper($participante["cidade"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >ESTADO:</td>
                        <td align="left">
                            <select name="estado">
                                <?
                            for($i=0; $i<count($estados); $i++){
                                if($participante["estado"] == $estados[$i][0]){
                                    ?>
                                <option value="<? echo $estados[$i][0]; ?>" selected="selected">
                                            <? echo $estados[$i][1]; ?>
                                </option>
                                <?
                                }else{
                                ?>
                                <option value="<? echo $estados[$i][0]; ?>">
                                            <? echo $estados[$i][1]; ?>
                                </option>
                                <?
                                }
                            }
                            ?>
                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >E-MAIL:</td>
                        <td align="left">
                            <input type="text" name="email" id="cnpj"   size="50" value="<?echo strtoupper($participante["email"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;"  >TELEFONE RESIDENCIAL:</td>
                        <td align="left">
                            <input type="text" name="telResidencial" id="cnpj"  size="20" value="<?echo strtoupper($participante["telResidencial"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;"  >TELEFONE CELULAR:</td>
                        <td align="left">
                            <input type="text" name="telCelular" id="cnpj"  size="20" value="<?echo strtoupper($participante["telCelular"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >DATA DE NASCIMENTO:</td>
                        <td align="left">
                            <input type="text" name="dataNascimento" id="cnpj"  
                                   size="20" OnKeyUp="mascaraDataNascimento(this);" value="<?echo strtoupper($participante["dataNascimento"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >SEXO:</td>
                        <td align="left">
                            <select name="sexo">
                               <?
                                for($i=0; $i<count($sexos); $i++){
                                if($participante["sexo"] == $sexos[$i][0]){
                                    ?>
                                <option value="<? echo $sexos[$i][0]; ?>" selected="selected">
                                            <? echo $sexos[$i][1]; ?>
                                </option>
                                <?
                                }else{
                                ?>
                                <option value="<? echo $sexos[$i][0]; ?>">
                                            <? echo $sexos[$i][1]; ?>
                                </option>
                                <?
                                }
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME PARA CRACHÁ:</td>
                        <td align="left">
                            <input type="text" name="nomeCracha" id="nomeCracha"  size="20" maxlength="17"  value="<?echo strtoupper($participante["nomeCracha"]);?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                            <br>
                            <button type="button" name="" value="" class="css3button" 
                    onClick="javascript:document.formPessoaE.submit();">Atualizar e Credenciar</button>
                        </td>
                    </tr>
                </table>
                
            </form>

        </div><!-- <div class="conteudo" id="conteudo">-->
    </body>
</html>