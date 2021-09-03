<?php
    include('../../sql/sql.php');

    $email =  $_POST['email'];
    $passwd1 = $_POST['passwd1'];
    $passwd2 = $_POST['passwd2'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $user = $_POST['user'];
    $date = $_POST['date'];

    $sql="SELECT username FROM tb_users WHERE username='$user';";
    $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
    $res=mysqli_fetch_array($result);


    if (mysqli_num_rows($result) == 0){
        if($email == ''){
            echo 'error ';
        }else if($passwd1 == ''){
            echo 'error';
    
        }else if($passwd2 == ''){
            echo 'error';
    
        }else if($nombre == ''){
            echo 'error';
    
        }else if($apellido == ''){
            echo 'error';
    
        }else if($date == ''){
            echo 'error';
    
        }else if($passwd1 == $passwd2){
            $day = date("Y-m-d");
            $sql="INSERT INTO  tb_users VALUES (null,'$user','$passwd1','$email','$nombre','$apellido','$date',0,'$day','img/user-img/default.jpg',0,1);";
            $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
            echo "great";
        }else{
            echo "hola";
        }
        }else{
        echo "holaaaa";

        }
   
    
?>