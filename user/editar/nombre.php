<?php
    include('../../sql/sql.php');
    session_start();
    $id = $_SESSION['id'];

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $passwd = $_POST['passwd'];

    if($nombre == '' || $apellido == '' || $passwd == ''){
        echo 'error3';
    }else{
         $sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
            $result = mysqli_query($dblink, $sql);
            $res = mysqli_fetch_array($result);
    
            if($passwd !== $res['passwd']){
                echo 'error1';
            }else{
                $sql = "UPDATE tb_users SET nombre = '$nombre', apellido = '$apellido'  WHERE id_user = '$id';";
                $result = mysqli_query($dblink, $sql);
                echo $sql;
            }
    }
?>