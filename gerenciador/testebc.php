<?
require 'bdconfig.php';
$cod = $_POST["codBarras"];
$id = $_POST["id"];
$tipo = $_POST["tipo"];
$uf = $_POST["uf"];
$novocod = $cod."2";
db_connect();
$result = mysql_query("update participantes set codBarras='$novocod' where codBarras='$cod';");
$nomeResult = mysql_query("select nome,estado from participantes where id='$id';");
$nome = mysql_fetch_array($nomeResult );
if($_POST["tipo"] = "E" || $_POST["tipo"] = "L"){
    $result2 = mysql_query("SELECT e.nomeFantasia FROM empresas e, empresarios e1 WHERE e.id = e1.empresa_id AND e1.participante_id =  '$id';");
//$row = mysql_fetch_array($result);
//$nomefantasia = "-".$row[0];
}
?>
<html>
  <head>
    <style>
      * {
          font-family: Arial,sans-serif;
          font-size: 20px;
          font-weight: normal;
      }    
      #config{
          overflow: auto;
          margin-bottom: 1px;
      }
      .config{
          float: left;
          width: 200px;
          height: 200px;
          border: 1px solid #000;
          margin-left: 1px;
      }
      .config .title{
          font-weight: bold;
          text-align: center;
      }
      .config .barcode2D,
      #miscCanvas{
        display: none;
      }
      #submit{
          clear: both;
      }
      #barcodeTarget,
      #canvasTarget{
        /*margin-top: 20px;*/
		margin:0 auto;
		text-align:center; /* hack para o IE */
      }        
    </style>
    
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="jquery-barcode-2.0.2.min.js"></script>
    <script type="text/javascript">
    
      function generateBarcode(){
        //var value = $("#barcodeValue").val();	
        var value = "<? echo "03086043423"; ?>";
        var btype = "code128";
        var renderer = "css";
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
          barWidth: "2",
          barHeight: "40",
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
  
    </script>
  </head>
  <body onload="javascript:window.print();">
    <div id="generator"></div>
    <center><div id="barcodeTarget" class="barcodeTarget"></div></center>
    <CENTER>RONYCLEY GONCALVES <br>BIT SOLU&Ccedil;&Otilde;ES - PB</CENTER>
  </body>
</html>