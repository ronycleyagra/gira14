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
		document.formPessoaC.dataNascimento.value = data;
		return true;
	}
	if (data.length == 5){
		data = data + '/';
		document.formPessoaC.dataNascimento.value = data;
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
<br>
            <table width="100%">
               <tr>
                    <td width="50%" align="left" class="trTopico">
                       Cadastro de participante
                    </td>
               </tr>
            </table>
            ﻿﻿﻿<form action="insertPessoa.php" method="post" name="formPessoaC">
                <table width="100%">
                    <tr>
                        <td width="20%" align="left" valign="top" style="background-color: #DEDEDE;" >Tipo:</td>
                        <td width="80%" align="left">
                            <select name="tipo">
                                <option value="E">EXPOSITOR RODADA</option>
                                <option value="S">EXPOSITOR SHOWROOM</option>
                                <option value="L">COMPRADOR CONVIDADO</option>
                                <option value="X">COMPRADOR ESPONTÂNEO</option>
                                <option value="V">VISITANTE</option>
                                <option value="P">REPRESENTANTE</option>
                                <option value="J">COMPRADOR DE CARAVANA</option>
                                <option value="I">INSTITUCIONAL</option>
                                <option value="C">ORGANIZAÇÃO</option>
                                <option value="M">IMPRENSA</option>
                                <option value="A">APOIO</option>
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
                            include "../Control.php";
                            $compradores = Control::getEmpresas();
                            for($i=0; $i<count($compradores); $i++){
                                $comprador = $compradores[$i];
                                ?>
                                <option value="<? echo $comprador["id"]; ?>">
                                            <? echo strtoupper(utf8_encode($comprador["nomeFantasia"])); ?>
                                </option>
                                <?
                            }
                            ?>
                            </select> <font color="red">* Para participantes do tipo EXPOSITOR, COMPRADOR OU REPRESENTANTE</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME DA ENTIDADE:</td>
                        <td align="left">
                            <input type="text" name="nomeEntidade" id="nomeEntidade"  size="20" maxlength="19"><font color="red"> * caso o tipo seja INSTITUCIONAL</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CPF:</td>
                        <td align="left">
                            <input type="text" name="cpf" id="cpf" size="30" maxlength="14" onkeyup="FormataCpf(this,event)"></td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME:</td>
                        <td align="left">
                            <input type="text" name="nome" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CEP:</td>
                        <td align="left">
                            <input type="text" name="cep" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >LOGRADOURO:</td>
                        <td align="left">
                            <input type="text" name="logradouro" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NÚMERO:</td>
                        <td align="left">
                            <input type="text" name="numero" id="cnpj"   size="20" maxlength="17">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >BAIRRO:</td>
                        <td align="left">
                            <input type="text" name="bairro" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CIDADE:</td>
                        <td align="left">
                            <input type="text" name="cidade" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >ESTADO:</td>
                        <td align="left">
                            <select name="estado">
                                    <option value="AC">ACRE</option>
                                        <option value="AL">ALAGOAS</option>
                                        <option value="AP">AMAPá</option>
                                        <option value="AM">AMAZONAS</option>
                                        <option value="BA">BAHIA</option>
                                        <option value="CE">CEARá</option>
                                        <option value="DF">DISTRITO FEDERAL</option>
                                        <option value="ES">ESPIRITO SANTO</option>
                                        <option value="GO">GOIáS</option>
                                        <option value="MA">MARANHãO</option>
                                        <option value="MT">MATO GROSSO</option>
                                        <option value="MS">MATO GROSSO DO SUL</option>
                                        <option value="MG">MINHAS GERAIS</option>
                                        <option value="PA">PARá</option>
                                        <option value="PB">PARAíBA</option>
                                        <option value="PR">PARANá</option>
                                        <option value="PE">PERNAMBUCO</option>
                                        <option value="PI">PIAUí</option>
                                        <option value="RJ">RIO DE JANEIRO</option>
                                        <option value="RN">RIO GRANDE DO NORTE</option>
                                        <option value="RS">RIO GRANDE DO SUL</option>
                                        <option value="RO">RONDôNIA</option>
                                        <option value="RR">RORAIMA</option>
                                        <option value="SP">S&ATILDE;O PAULO</option>
                                        <option value="SC">SANTA CATARINA</option>
                                        <option value="SE">SERGIPE</option>
                                        <option value="TO">TOCANTINS</option>
                                    </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >E-MAIL:</td>
                        <td align="left">
                            <input type="text" name="email" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >TELEFONE RESIDENCIAL:</td>
                        <td align="left">
                            <input type="text" name="telResidencial" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >TELEFONE CELULAR:</td>
                        <td align="left">
                            <input type="text" name="telCelular" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >DATA DE NASCIMENTO:</td>
                        <td align="left">
                            <input type="text" name="dataNascimento" id="cnpj"  size="20" OnKeyUp="mascaraDataNascimento(this);">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >SEXO:</td>
                        <td align="left">
                            <select name="sexo">
                               <option value="M">MASCULINO</option>
                               <option value="F">FEMININO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME PARA CRACHÁ:</td>
                        <td align="left">
                            <input type="text" name="nomeCracha" id="nomeCracha"  size="20" maxlength="17">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                            <br>
                            <button type="button" name="" value="" class="css3button" 
                    onClick="javascript:document.formPessoaC.submit();">Cadastrar</button>
                        </td>
                    </tr>
                </table>
                
            </form>

        </div><!-- <div class="conteudo" id="conteudo">-->
    </body>
</html>