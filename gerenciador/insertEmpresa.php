<?
include "../Control.php";
$insert = Control::insertEmpresa($_POST);
if($insert[0]){
    ?>
    <script language="javascript">
        alert("Empresa cadastrada com sucesso!");
        //window.open("printCred.php?idp=<? echo $insert[1]?>");
        location.href = "painelEmpresaC.php";
    </script>
    <?	
}else{
    ?>
    <script language="javascript">
        alert("Erro no cadastro. Tente novamente!");
        window.open("painelEmpresaC.php","_self");
    </script>
    <?	
}
?>
