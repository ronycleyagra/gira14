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
<body>
        <div class="topo">
            <table width="100%" border="0" height="100%">
              <tr>
                <td width="5%" align="left"><img src="../images/logo.png" width="35" height="40" border="0"/></td>
                <td width="25%" valign="bottom"><font color="#FFFFFF">Gira Calçados 2014<br>
                PAINEL DE GERENCIAMENTO </font></td>
                <td width="70%" valign="bottom" align="right">
                    <a href="index.php">AGENDAMENTO</a> <font color="#FFFFFF">|</font> 
                    <a href="vincularRepC.php">VINCULAR REPRESENTANTE</a> <font color="#FFFFFF">|</font> 
                    <a href="sair.php">SAIR</a> &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
              </tr>
            </table>
        </div>
        <div class="conteudo" id="conteudo">
<?
include "../Control.php";
$compradores = Control::getCompradores();
$representantes = Control::getRepresentantes();
?>
<br>
            <table width="100%">
               <tr>
                    <td width="50%" align="left" class="trTopico">
                       Cadastro de participante
                    </td>
               </tr>
            </table>
            ﻿﻿﻿<form action="vincularRep.php" method="post" name="formAgend">
                <input type="hidden" name="idp" value="<? echo $idp?>">
                <table width="100%">
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >REPRESENTANTE:</td>
                        <td align="left">
                            <select name="idr" onChange="javascript: dadosComprador(this);" class="selectComprador">
                                
                                <?php
                            
                            
                            for($i=0; $i<count($representantes); $i++){
                                $expositor = $representantes[$i];
                                    ?>
                                <option value="<? echo $expositor["id"]; ?>">
                                            <? echo strtoupper($expositor["nomeFantasia"]); ?>
                                </option>
                                <?
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color: #DEDEDE;" >COMPRADOR:</td>
                        <td align="left">
                            <select name="idc" onChange="javascript: dadosComprador(this);" class="selectComprador">
                                
                                <?php
                            
                            
                            for($i=0; $i<count($compradores); $i++){
                                $comprador = $compradores[$i];
                                    ?>
                                <option value="<? echo $comprador["id"]; ?>">
                                            <? echo strtoupper($comprador["nomeFantasia"]); ?>
                                </option>
                                <?
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left">
                            <br>
                            <button type="button" name="" value="" class="css3button" 
                    onClick="javascript:document.formAgend.submit();">Vincular</button>
                        </td>
                    </tr>
                </table>
                
            </form>
            <br>
 <?
    if($_GET["e"] == 1){
        ?>
<div class="acessoPermitido"><br><h2>AGENDAMENTO REALIZADO</h2></div>
            <?
    }else{
        ?>
<div class="acessoNegado"><h2>ERRO NO AGENDAMENTO</h2></div>
            <?
    }
    ?>
</div>
        </div><!-- <div class="conteudo" id="conteudo">-->
    </body>
</html>