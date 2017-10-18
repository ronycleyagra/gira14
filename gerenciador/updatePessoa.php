<?
session_start();
include "../Control.php";
$insert = Control::updatePessoa($_POST);
print_r($insert);
if($insert[0]){
    ?>
    <script language="javascript">
        alert("Dados de participante atualizados com suscesso!");
        window.open("printCred.php?idp=<? echo $insert[1]?>");
        location.href = "painel.php";
    </script>
    <?	
}else{
    ?>
    <script language="javascript">
        alert("Erro na atualização. Tente novamente!");
        window.open("painel.php","_self");
    </script>
    <?	
}
?>
