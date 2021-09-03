<?php
    include('../../sql/sql.php');
    session_start();
    $id = $_SESSION['id'];
  
    $sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
    $result = mysqli_query($dblink, $sql);
    $res = mysqli_fetch_array($result);

    
  
  $json = array();
  
$json[] = array(
    'img' => $res['profile_picture']

);

  $jsonstring = json_encode($json);
  echo $jsonstring;

?>