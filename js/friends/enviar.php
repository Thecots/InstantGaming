<?php
    include('../../sql/sql.php');  
    $id1 = $_REQUEST['id1'];
    $id2 = $_REQUEST['id2'];
    $user = $_REQUEST['user'];

    $sql="INSERT INTO tb_friends VALUES (null,$id1,$id2,2);";
    $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));

    echo $sql;
    header("location:../../user/index.php?user=$user"); 
?>