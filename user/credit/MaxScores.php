<?php
    include('../../sql/sql.php');
    session_start();
    $id = $_SESSION['id'];
  
    $sql = "SELECT count(*) FROM tb_top_game WHERE id_user = '$id'";
    $result = mysqli_query($dblink, $sql);
    $res = mysqli_fetch_array($result);

    if($res['count(*)'] == 0){
        $result_top = 0;
    }else{
        $sql1 = "SELECT * FROM tb_top_game WHERE id_user = '$id'";
        $result1 = mysqli_query($dblink, $sql1);
        $res1 = mysqli_fetch_array($result1);

        $result_top = $res1['hi_score'];
    }
  
  $json = array();
  
$json[] = array(
    'coins' => $result_top

);

  $jsonstring = json_encode($json);
  echo $jsonstring;
?>