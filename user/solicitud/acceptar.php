<?php
    include('../../sql/sql.php');  
    $id1 = $_REQUEST['id1'];
    $id2 = $_REQUEST['id2'];
    $user = $_REQUEST['user'];


    $sql="UPDATE tb_friends SET friend_status = 1 WHERE friend1 = '$id2' AND friend2 = '$id1';";
    $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
    echo $sql;
    header("location:../solicitudes.php?id=$user"); 
?>