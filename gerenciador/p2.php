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
    <style>
        .acessoNegado{
	border:1px solid red;
	margin: 0px auto;
	width: 350px;
	text-align:center;
	height: 100px;
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px 3px 3px 3px;
	-webkit-border-radius: 3px 3px 3px 3px;
	padding: 5px 5px;
        background-color: #FFE4E1;
}

.acessoPermitido{
    border:1px solid green;
	margin: 0px auto;
	width: 350px;
	text-align:center;
	height: 100px;
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px 3px 3px 3px;
	-webkit-border-radius: 3px 3px 3px 3px;
	padding: 5px 5px;
        background-color: #90EE90;
}
        
    </style>
</head>
<body onLoad="javascript:document.formCodBarra.codb.value=''; document.formCodBarra.codb.focus();">
        <div class="topo">
            <table width="100%" border="0" height="100%">
              <tr>
                <td width="5%" align="left"><img src="../images/logo.png" width="35" height="40" border="0"/></td>
                <td width="25%" valign="bottom"><font color="#FFFFFF">Gira Calçados 2014<br>
                PAINEL DE GERENCIAMENTO: <? echo $_GET["empresa"]; ?></font></td>
                <td width="70%" valign="bottom" align="right">
                    <a href="javascript:cadastrarEmpresa();">CADASTRAR EMPRESA</a> <font color="#FFFFFF">|</font> 
                    <a href="javascript:cadastrarPessoa();">CADASTRAR PESSOA</a> <font color="#FFFFFF">|</font> 
                    <a href="sair.php">SAIR</a> &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
              </tr>
            </table>
        </div>
        <div class="conteudo" id="conteudo">
<br>
<table width="100%">
   <tr>
        <td width="50%" align="left" class="trTopico">
           Credenciamento
        </td>
   </tr>
</table>
﻿﻿﻿<form action="pesquisap2.php" method="post" name="formCodBarra">
    <input type="hidden" name="setor" value="2">
    <table width="100%">
        <tr>
            <td align="left" style="background-color: #DEDEDE;" >
        <CENTER><H5>CÓDIGO DE BARRAS:</HR><br>
            <input type="text" name="codb" id="codb" size="20" maxlength="14" 
                   style="font-size: 35px; text-align: center;">
            <br><BR>
                <button type="button" name="" value="" class="css3button" 
                        onClick="javascript:document.formCodBarra.submit();">Enviar</button></CENTER>
            </td>
        </tr>
    </table>
</form><br>
 <?
    if($_GET["e"] == 1){
        ?>
<div class="acessoPermitido"><br><h1>ACESSO PERMITIDO</h1></div>
            <?
    }else{
        ?>
<div class="acessoNegado"><h1>ACESSO NEGADO</h1></div>
            <?
    }
    ?>
</div>
   
    </body>
</html>