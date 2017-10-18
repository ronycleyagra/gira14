<?
session_start();
include "../Control.php";
$insert = Control::getParticipanteByCPF($_POST["cpf"]);

if($insert[0]){
    ?>
    <script language="javascript">
        alert("Participante já cadastrado!");
        //window.open("printCred.php?idp=<? echo $insert[1]?>");
        location.href = "painelPessoaE.php?idp=<? echo $insert[1]?>";
    </script>
    <?	
}else{
    echo "aqui";
    ?>
    <script language="javascript">
        alert("CPF não cadastrado!");
        window.open("painelPessoaC.php?cpf=<? echo $_POST["cpf"];?>","_self");
    </script>
    <?	
}
?>
