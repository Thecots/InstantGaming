<?php
    include('../../sql/sql.php');
    session_start();
    $id = $_SESSION['id'];

    $correo1 = $_POST['correo1'];
    $passwd = $_POST['passwd'];

    if($correo1 == '' || $passwd == ''){
        echo 'error3';
    }else{
         $sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
            $result = mysqli_query($dblink, $sql);
            $res = mysqli_fetch_array($result);
    
            if($passwd !== $res['passwd']){
                echo 'error1';
            }else{
                $sql1="UPDATE tb_users SET email = '$correo1' WHERE id_user = '$id';";
                $result = mysqli_query($dblink, $sql1);
            }
    }
?>