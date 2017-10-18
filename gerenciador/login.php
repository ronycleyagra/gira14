<?php
session_start();
include "../Control.php";
$login = $_POST["login"];
$senha = $_POST["senha"];
//$usuario = Control::autentica($login,$senha);
if ($login == "admin" && $senha == "gira314"){
    ?>
    <script language="javascript">location.href = "painel.php";</script>
    <?
}else{
    ?>
    <script language="javascript">
        alert("Usuário/senha inválidos. Tente novamente!");
        location.href = "index.php";
    </script>
    <?
}
?>