<?
include "../Control.php";
$insert = Control::verificaCodBarras($_POST);
if($insert[0]){
    ?>
    <script language="javascript">
        location.href = "p1.php?e=1";
    </script>
    <?	
}else{
    ?>
    <script language="javascript">
      location.href = "p1.php?e=0";
    </script>
    <?	
}
?>
