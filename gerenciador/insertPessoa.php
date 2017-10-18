<?
session_start();
include "../Control.php";
$insert = Control::insertPessoa($_POST);
if($insert[0]){
    ?>
    <script language="javascript">
        alert("Participante já cadastrado!");
        window.open("printCred.php?idp=<? echo $insert[1]?>");
        location.href = "painel.php";
    </script>
    <?	
}else{
    ?>
    <script language="javascript">
        alert("Erro no cadastro. Tente novamente!");
        //window.open("painel.php","_self");
    </script>
    <?	
}
?>
