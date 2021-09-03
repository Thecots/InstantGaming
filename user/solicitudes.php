<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instant Gaming</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/solicitudes.css">

    <link rel="icon" href="../img/logo.png">
</head>
<body>
    
    <?php
        session_start(); 
        include('../sql/sql.php');
        if(isset($_SESSION['id'])){ 
            $id = $_SESSION['id'];
            $sql="SELECT * FROM tb_users WHERE id_user='$id';";
            $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
            $res=mysqli_fetch_array($result);
            
        }

        $user = $_REQUEST['id'];

        $sql1 = "SELECT * FROM tb_users WHERE username = '".$user."';";
        $result1=mysqli_query($dblink,$sql1) or exit(mysqli_error($dblink));
        $res1=mysqli_fetch_array($result1);
        $id_user = $res1['id_user'];

        if(isset($_SESSION['id'])){ 
            if($_SESSION['id'] !== $id_user){
                header("location:../index.php"); 
            }
        }else{
            header("location:../index.php"); 
        }
    ?>
    <!-- ----- <SIGIN> ----- -->
    <!-- ----- </SIGIN> ----- -->

    <!-- ----- <HEADER> ----- -->
    <header>
        <a href="../index.php">
            <div class="img">
                <img src="../img/logo.png" alt="">
                <h1>Instant Gaming</h1>
            </div>
        </a>
        <div class="buscador" style="display: none;">
            <img src="img/search.png" alt=""><input placeholder="Buscar" type="text" >
        </div>
        <div class="perfil">
            <?php
            if(isset($_SESSION['id'])){ ?>
            <a>
                <div id="conf-user" class="session-on">
                    <img src="../<?php echo $res['profile_picture']; ?>" alt="">
                    <img src="../img/menu.png" alt="">
                </div>
            </a>
            <?php
            }else{ ?>
                <div class="session-off">
                   <a id="login">Log In</a>
                   <a href="../siginup.php" id="siginup">Sign Up</a>
                   </div>
           <?php } ?>
        </div>
    </header>
    <div  class="conf-user">
        <a href="index.php?user=<?php echo $res['username'];?>"><p>Perfil</p></a>
        <a href="editar_perfil.php?id=<?php echo $res['username'];?>"><p>Editar Perfil</p></a>

        <?php
            if($res['user_type'] == 0){
                echo '<a href="dashboard.php" style="text-decoration: none;"><p style="color:black;">Admin panel</p></a>';
            }
        ?>
        <a href="pedidos.php?id=<?php echo $res['username'];?>"><p id="">Mis pedidos</p></a>
        <a href="credit.php?id=<?php echo $res['username'];?>"><p id="">Mi credito</p></a>
        <a href="solicitudes.php?id=<?php echo $res['username'];?>"><p>Solicitudes <?php

            $sqls = ("SELECT count(*) FROM tb_friends WHERE friend2 = '$id' AND friend_status = 2;");
            $results=mysqli_query($dblink,$sqls) or exit(mysqli_error($dblink));
            $ress=mysqli_fetch_array($results);
            if($ress['count(*)'] !== 0){
                ?><span class="solicitudes"><?php echo $ress['count(*)']; ?></span><?php
            }
        
        ?></p></a>
        <p id="CerrarSession">Cerrar sessión</p>
    </div>
    <!-- ----- </HEADER> ----- -->
    <?php



?>
    <!-- ----- <BODY></BODY> ----- -->
    <div class="body">
        <div class="main-box">    
            <div class="uno-p">
            <div class="fffa">
                <h1 class="frh1l">Solicitudes de amistad</h1>
                <div class=""></div>
            </div>                   
           <div class="soli-box">
               <?php 

               if($ress['count(*)'] == 0){
                  ?>
                    <div class="nofriend">
                        <p>No tienes ninguna solicitud de amistad</p>
                        <img src="../img/dead.png" alt="">
                    </div>
                <?php
               }else{

                $sql3="SELECT * FROM tb_friends WHERE friend1 = '$id' OR friend2 = '$id';";
                $result3=mysqli_query($dblink,$sql3) or exit(mysqli_error($dblink));
                while( $res3=mysqli_fetch_array($result3)){
                if($res3['friend_status'] == 2 && $res3['friend2'] == $id){
                        $friend1 = $res3['friend1']; 
                        $friend2 = $res3['friend2']; 

                        if($friend1 == $id){
                            $friend = $res3['friend2'];
                        }else if($friend2 == $id){
                            $friend = $res3['friend1'];
                        }
                        
                        $sql4="SELECT * FROM tb_users WHERE id_user = '$friend';";
                        $result4=mysqli_query($dblink,$sql4) or exit(mysqli_error($dblink));
                        $res4=mysqli_fetch_array($result4);

                        $id2 = $res4['id_user'];
                        ?>

                <div class="soli-friend-box">
                    <a href="index.php?user=<?php echo $res4['username'];?>">
                    <div class="img">
                        <img src="../<?php echo $res4['profile_picture'];?>" alt="">
                        <div class="imh"><p>Ver perfil</p></div>
                    </div>
                    </a>
                    <div class="bodyt">
                        <p><?php echo $res4['username'];?> quiere ser tu amigo.</p>
                        <div class="siono">
                            <a href="solicitud/acceptar.php?id1=<?php echo $id;?>&id2=<?php echo $id2;?>&user=<?php echo $res['username'];?>">Acceptar</a>

                            <a href="solicitud/eliminar.php?id1=<?php echo $id;?>&id2=<?php echo $id2;?>&user=<?php echo $res['username'];?>">Rechazar</a>
                        </div>
                    </div>
                </div>
                        <?php
                }
                        
                }
            }

            ?>
                
           </div>
            </div>
            <div class="dos-p">
            <div class="fffa">
                <h1 class="frh1l">Solicitudes de amistad enviadas</h1>
                <div class=""></div>
            </div>                   
           <div class="soli-box">
               <?php 
                    $sqlf1 = ("SELECT count(*) FROM tb_friends WHERE friend1 = '$id' AND friend_status = 2;");
                    $resultf2=mysqli_query($dblink,$sqlf1) or exit(mysqli_error($dblink));
                    $resf1=mysqli_fetch_array($resultf2);
               if($resf1['count(*)'] == 0){
                  ?>
                    <div class="nofriend">
                        <p>No has mandado ninguna solicitud de amistad</p>
                        <img src="../img/dead.png" alt="">
                    </div>
                <?php
               }else{

                $sql3="SELECT * FROM tb_friends WHERE friend1 = '$id' OR friend2 = '$id';";
                $result3=mysqli_query($dblink,$sql3) or exit(mysqli_error($dblink));
                while( $res3=mysqli_fetch_array($result3)){
                if($res3['friend_status'] == 2 && $res3['friend1'] == $id){
                        $friend1 = $res3['friend1']; 
                        $friend2 = $res3['friend2']; 

                        if($friend1 == $id){
                            $friend = $res3['friend2'];
                        }else if($friend2 == $id){
                            $friend = $res3['friend1'];
                        }
                        
                        $sql4="SELECT * FROM tb_users WHERE id_user = '$friend';";
                        $result4=mysqli_query($dblink,$sql4) or exit(mysqli_error($dblink));
                        $res4=mysqli_fetch_array($result4);

                        $id2 = $res4['id_user'];
                        ?>

                <div class="soli-friend-box">
                    <a href="index.php?user=<?php echo $res4['username'];?>">
                    <div class="img">
                        <img src="../<?php echo $res4['profile_picture'];?>" alt="">
                        <div class="imh"><p>Ver perfil</p></div>
                    </div>
                    </a>
                    <div class="bodyt">
                    <p> Solicitud de amistad enviada a</p><p><?php echo $res4['username'];?></p>
                        <div class="siono">
                        <a style="display: none;" href=""></a>
                            <a href="solicitud/cancelar.php?id1=<?php echo $id;?>&id2=<?php echo $id2;?>&user=<?php echo $res['username'];?>">Cancelar</a>
                        </div>
                    </div>
                </div>
                        <?php
                }
                        
            }
        }

            ?>
                
           </div>
            </div>
        </div>
    </div>
    <!-- ----- </BODY> ----- -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/app.js"></script>

</body>
</html>

    <!-- ----- <SIGIN> ----- -->
    <!-- ----- </SIGIN> ----- -->
