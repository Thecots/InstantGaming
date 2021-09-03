<?php

    $user = $_POST['idp'];

    $image = $_POST['image'];
    list($type, $image) = explode(';',$image);
    list(, $image) = explode(',',$image);
    $image = base64_decode($image);
    $image_name = time().'.png';
    file_put_contents('../img/user-img/'.$image_name, $image);
    
    $finali = 'img/user-img/'.$image_name;

    include('../sql/sql.php');  

    $sql="UPDATE tb_users SET profile_picture = '$finali' WHERE username = '$user';";
    $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));

    echo 'successfully uploaded';
?>