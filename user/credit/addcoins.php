<?php
    include('../../sql/sql.php');


    $id =  $_POST['id'];
    $coins = $_POST['coins'];
    $score = $_POST['coins'];

    $sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
    $result = mysqli_query($dblink, $sql);
    $res = mysqli_fetch_array($result);

    $coins = $coins + $res['cartera'];

    $sql = "UPDATE tb_users SET cartera = '$coins'  WHERE id_user = '$id';";
    $result = mysqli_query($dblink, $sql);
    
    if($coins >= 50){
        $sql1 = "UPDATE tb_user_logros SET l2 = 1  WHERE id_user = '$id';";
        $result1 = mysqli_query($dblink, $sql1);
    }
    if($coins >= 100){
        $sql2 = "UPDATE tb_user_logros SET l3 = 1  WHERE id_user = '$id';";
        $result2 = mysqli_query($dblink, $sql2);
    }
    if($coins >= 300){
        $sql3 = "UPDATE tb_user_logros SET l4 = 1  WHERE id_user = '$id';";
        $result3 = mysqli_query($dblink, $sql3);
    }


    $sql2 = "SELECT count(*) FROM tb_top_game WHERE id_user = '$id'";
    $result2 = mysqli_query($dblink, $sql2);
    $res2 = mysqli_fetch_array($result2);

    if($res2['count(*)'] == 0){
        $sql1 = "INSERT INTO tb_top_game VALUES (null,'$id','$score');";
        $result1 = mysqli_query($dblink, $sql1);
    }else{
        $sql1 = "SELECT * FROM tb_top_game WHERE id_user = '$id'";
        $result1 = mysqli_query($dblink, $sql1);
        $res1 = mysqli_fetch_array($result1);

        if($res1['hi_score'] <= $score){
            $sql3 = "UPDATE tb_top_game SET hi_score = $score WHERE id_user = '$id'";
            $result3 = mysqli_query($dblink, $sql3);
        }
    }
    ?>