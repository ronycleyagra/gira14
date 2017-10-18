<?
include "../Control.php";
$insert = Control::vincularRepresentante($_POST);
if($insert){
    ?>
    <script language="javascript">
        location.href = "vincularRepC.php?e=1";
    </script>
    <?	
}else{
    ?>
    <script language="javascript">
      location.href = "vincularRepC.php?e=0";
    </script>
    <?	
}
?>
