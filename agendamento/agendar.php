<?
include "../Control.php";
$insert = Control::insertAgendamento($_POST);
if($insert){
    ?>
    <script language="javascript">
        location.href = "index.php?e=1";
    </script>
    <?	
}else{
    ?>
    <script language="javascript">
      location.href = "index.php?e=0";
    </script>
    <?	
}
?>
