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
                    <a href="sair.php">SAIR</a> &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
              </tr>
            </table>
        </div>
        <div class="conteudo" id="conteudo">
<Script>
function mascaraDataAbertura(campoData){
	var data = campoData.value;
	if (data.length == 2){
		data = data + '/';
		document.formEmpresaC.dataAbertura.value = data;
		return true;
	}
	if (data.length == 5){
		data = data + '/';
		document.formEmpresaC.dataAbertura.value = data;
		return true;
	}
}//mascaraDataRG
function formatDocumentCNPJ(document, event)
      {
        var backspaceKeyCode = 8;
        var keyPressed = 0;
        if (event !== undefined) {
          keyPressed = event.keyCode ? event.keyCode : event.charCode;
          if (keyPressed === undefined) {
            keyPressed = 0;
          }
        }
      
        document = document.replace(/[^0-9]/g, "");
      
        // Check for extra zero in the beggining of the value
        if (document.length === 15) {
          document = document.substr(1);
        } else if (document.length > 14) {
          document = document.substr(0, 14);
        }
      
        if (document.length === 2 && keyPressed !== backspaceKeyCode) {
          document += ".";
        } else if (document.length > 2) {
          document = document.substr(0, 2) + "." + document.substr(2);
        }
      
        if (document.length === 6 && keyPressed !== backspaceKeyCode) {
          document += ".";
        } else if (document.length > 6) {
          document = document.substr(0, 6) + "." + document.substr(6);
        }
      
        if (document.length === 10 && keyPressed !== backspaceKeyCode) {
          document += "/";
        } else if (document.length > 10) {
          document = document.substr(0, 10) + "/" + document.substr(10);
        }
      
        if (document.length === 15 && keyPressed !== backspaceKeyCode) {
          document += "-";
        } else if (document.length > 15) {
          document = document.substr(0, 15) + "-" + document.substr(15);
        }
      
        return document;
}
</script>
<br>
            <table width="100%">
               <tr>
                    <td width="50%" align="left" class="trTopico">
                       Cadastro de empresa
                    </td>
               </tr>
            </table>
            ﻿﻿﻿<form action="insertEmpresa.php" method="post" name="formEmpresaC">
                <table width="100%">
                    <tr>
                        <td width="15%" align="left" valign="top" style="background-color: #DEDEDE;" >Tipo:</td>
                        <td width="85%" align="left">
                            <select name="tipo">
                                <option value="F">EXPOSITOR RODADA</option>
                                <option value="S">EXPOSITOR SHOWROOM</option>
                                <option value="L">COMPRADOR CONVIDADO</option>
                                <option value="X">COMPRADOR ESPONTÂNEO</option>
                                <option value="P">REPRESENTANTE</option>
                                <option value="C">COMPRADOR DE CARAVANA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >CNPJ:</td>
                        <td align="left">
                            <input type="text" name="cnpj" id="cnpj" size="30" 
                                   maxlength="20" onkeyup="this.value = formatDocumentCNPJ(this.value, event)"
                                    onkeydown="this.value = formatDocumentCNPJ(this.value, event)"
                                    onmouseup="this.value = formatDocumentCNPJ(this.value)"
                                    onblur="this.value = formatDocumentCNPJ(this.value, event)"
                                    onchange="this.value = formatDocumentCNPJ(this.value)" /></td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >NOME FANTASIA:</td>
                        <td align="left">
                            <input type="text" name="nomeFantasia" id="cnpj"   size="50" maxlength="19">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >RAZÃO SOCIAL:</td>
                        <td align="left">
                            <input type="text" name="razaoSocial" id="cnpj"   size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >DATA DE ABERTURA:</td>
                        <td align="left">
                            <input type="text" name="dataAbertura" id="cnpj"   size="50" OnKeyUp="mascaraDataAbertura(this);">
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
                        <td align="left" style="background-color: #DEDEDE;" >TELEFONE COMERCIAL:</td>
                        <td align="left">
                            <input type="text" name="telComercial" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >TELEFONE CELULAR:</td>
                        <td align="left">
                            <input type="text" name="telCelular" id="cnpj"  size="20">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                            <br>
                            <button type="button" name="" value="" class="css3button" 
                    onClick="javascript:document.formEmpresaC.submit();">Cadastrar</button>
                        </td>
                    </tr>
                </table>
                
            </form>

        </div><!-- <div class="conteudo" id="conteudo">-->
    </body>
</html>