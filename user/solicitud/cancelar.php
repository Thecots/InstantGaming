<?php
    include('../../sql/sql.php');  
    $id1 = $_REQUEST['id1'];
    $id2 = $_REQUEST['id2'];
    $user = $_REQUEST['user'];

    $sql3="DELETE FROM tb_friends WHERE friend1 = '$id2' AND friend2 = '$id1' OR friend2 = '$id2' AND friend1 = '$id1' ;";
    $result3=mysqli_query($dblink,$sql3) or exit(mysqli_error($dblink));
         
    header("location:../solicitudes.php?id=$user"); 
                



?>