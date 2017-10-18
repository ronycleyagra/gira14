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
<body onload="openPedidos(<? echo $_GET["ide"]; ?>);">
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
        </div><!-- <div class="conteudo" id="conteudo">-->
    </body>
</html>