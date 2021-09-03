<?php
    include('../../sql/sql.php');

    $n1 = 1;

    while($n1 < 11){    
        $sql = "SELECT * FROM tb_top_game ORDER BY hi_score DESC LIMIT $n1 ,10";
        $result = mysqli_query($dblink, $sql);
        $res = mysqli_fetch_array($result);

        if($n1 == 1){
            $t1 = $res['hi_score'];
            $t1id = $res['id_user'];

            $sql1 = "SELECT * FROM tb_users WHERE id_user = '$t1id';";
            $result1 = mysqli_query($dblink, $sql1);
            $res1 = mysqli_fetch_array($result1);

            $t1img = $res1['profile_picture'];
            $t1usr = $res1['username'];
            
        }
        if($n1 == 2){
            $t2 = $res['hi_score'];
            $t2id = $res['id_user'];

            $sql2 = "SELECT * FROM tb_users WHERE id_user = '$t2id';";
            $result2 = mysqli_query($dblink, $sql2);
            $res2 = mysqli_fetch_array($result2);

            $t2img = $res2['profile_picture'];
            $t2usr = $res2['username'];
        }
        if($n1 == 3){
            $t3 = $res['hi_score'];
            $t3id = $res['id_user'];

              $sql3 = "SELECT * FROM tb_users WHERE id_user = '$t3id';";
            $result3 = mysqli_query($dblink, $sql3);
            $res3 = mysqli_fetch_array($result3);

            $t3img = $res3['profile_picture'];
            $t3usr = $res3['username'];
        }
        if($n1 == 4){
            $t4 = $res['hi_score'];
            $t4id = $res['id_user'];

              $sql4 = "SELECT * FROM tb_users WHERE id_user = '$t4id';";
            $result4 = mysqli_query($dblink, $sql4);
            $res4 = mysqli_fetch_array($result4);

            $t4img = $res4['profile_picture'];
            $t4usr = $res4['username'];
        }
        if($n1 == 5){
            $t5 = $res['hi_score'];
            $t5id = $res['id_user'];

              $sql5 = "SELECT * FROM tb_users WHERE id_user = '$t5id';";
            $result5 = mysqli_query($dblink, $sql5);
            $res5 = mysqli_fetch_array($result5);

            $t5img = $res5['profile_picture'];
            $t5usr = $res5['username'];
        }
        if($n1 == 6){
            $t6 = $res['hi_score'];
            $t6id = $res['id_user'];

              $sql6 = "SELECT * FROM tb_users WHERE id_user = '$t6id';";
            $result6 = mysqli_query($dblink, $sql6);
            $res6 = mysqli_fetch_array($result6);

            $t6img = $res6['profile_picture'];
            $t6usr = $res6['username'];
        }
        if($n1 == 7){
            $t7 = $res['hi_score'];
            $t7id = $res['id_user'];

              $sql7 = "SELECT * FROM tb_users WHERE id_user = '$t7id';";
            $result7 = mysqli_query($dblink, $sql7);
            $res7 = mysqli_fetch_array($result7);

            $t7img = $res7['profile_picture'];
            $t7usr = $res7['username'];
        }
        if($n1 == 8){
            $t8 = $res['hi_score'];
            $t8id = $res['id_user'];

              $sql8 = "SELECT * FROM tb_users WHERE id_user = '$t8id';";
            $result8 = mysqli_query($dblink, $sql8);
            $res8 = mysqli_fetch_array($result8);

            $t8img = $res8['profile_picture'];
            $t8usr = $res8['username'];
        }
        if($n1 == 9){
            $t9 = $res['hi_score'];
            $t9id = $res['id_user'];

              $sql9 = "SELECT * FROM tb_users WHERE id_user = '$t9id';";
            $result9 = mysqli_query($dblink, $sql9);
            $res9 = mysqli_fetch_array($result9);

            $t9img = $res9['profile_picture'];
            $t9usr = $res9['username'];
        }
        if($n1 == 10){
            $t10 = $res['hi_score'];
            $t10id = $res['id_user'];

              $sql10 = "SELECT * FROM tb_users WHERE id_user = '$t10id';";
            $result10 = mysqli_query($dblink, $sql10);
            $res10 = mysqli_fetch_array($result10);

            $t10img = $res10['profile_picture'];
            $t1usr = $res1['username'];
        }
        $n1 = $n1 +1;
    }

    $json = array();
  
    $json[] = array(
        't1' => $t1,
        't2' => $t2,
        't3' => $t3,
        't4' => $t4,
        't5' => $t5,
        't6' => $t6,
        't7' => $t7,
        't8' => $t8,
        't9' => $t9,
        't10' => $t10,

        't1id' => $t1id,
        't2id' => $t2id,
        't3id' => $t3id,
        't4id' => $t4id,
        't5id' => $t5id,
        't6id' => $t6id,
        't7id' => $t7id,
        't8id' => $t8id,
        't9id' => $t9id,
        't10id' => $t10id,

        't1img' => $t1img,
        't1usr' => $t1usr,

        't2img' => $t2img,
        't2usr' => $t2usr,
        't3img' => $t3img,
        't3usr' => $t3usr,
        't4img' => $t4img,
        't4usr' => $t4usr,
        't5img' => $t5img,
        't5usr' => $t5usr,
        't6img' => $t6img,
        't6usr' => $t6usr,
        't7img' => $t7img,
        't7usr' => $t7usr,
        't8img' => $t8img,
        't8usr' => $t8usr,
        't9img' => $t9img,
        't9usr' => $t9usr,
        't10img' => $t10img,
        't10usr' => $t10usr
    
    );
    
      $jsonstring = json_encode($json);
      echo $jsonstring;

?>