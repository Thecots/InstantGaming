<?php
    include('../../sql/sql.php');


    $username =  $_POST['user'];
    $passwd = $_POST['passwd'];

    $sql="SELECT * FROM tb_users WHERE username='$username' AND passwd='$passwd';";
    $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
    $res=mysqli_fetch_array($result);

    if (mysqli_num_rows($result) == 1){
        session_start();
        
        $_SESSION['id'] = $res["id_user"];

        echo "login";
    }else{
        echo 'error';
    }
    
?>