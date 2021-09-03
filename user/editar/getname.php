<?php
    include('../../sql/sql.php');
    session_start();
    $id = $_SESSION['id'];
  
    $sql = "SELECT * FROM tb_users WHERE id_user = '$id'";
    $result = mysqli_query($dblink, $sql);
    $res = mysqli_fetch_array($result);

    $n = $res['nombre'];
    $a = $res['apellido'];

    $final = '( '.$n.' '.$a.' )';
  
  $json = array();
  
$json[] = array(
    'name' => $final

);

  $jsonstring = json_encode($json);
  echo $jsonstring;

?>