<?php
    include('../../sql/sql.php');
    session_start();
    $id = $_SESSION['id'];

    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $p3 = $_POST['p3'];

    if($p1 == '' || $p2 == '' || $p3 == ''){
        echo 'error3';
    }else if($p2 !== $p3){
        echo 'error2';
    }else{
        $sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
        $result = mysqli_query($dblink, $sql);
        $res = mysqli_fetch_array($result);

        if($p1 !== $res['passwd']){
            echo 'error1';
        }else{
            $sql = "UPDATE tb_users SET passwd = '$p2' WHERE id_user = '$id';";
            $result = mysqli_query($dblink, $sql);
            echo $sql;
        }
    }
?>