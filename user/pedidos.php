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
    <link rel="stylesheet" href="../css/pedidios.css">
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
    $sqlg = "SELECT count(*) FROM tb_user_games WHERE id_user = '$id';";
    $resultg=mysqli_query($dblink,$sqlg) or exit(mysqli_error($dblink));
    $resg=mysqli_fetch_array($resultg);

?>
    <!-- ----- <BODY></BODY> ----- -->
    <div class="body">
        <div class="main-box">    
            <div class="fffa">
                <h1 class="frh1l">Mis pedidos</h1>
                <div class=""></div>
            </div>                   
           <div class="pedid-box">
               <?php 

               if($resg['count(*)'] == 0){
                  ?>
                    <div class="nofriend">
                        <p>Todavía no has comprado ningún juego</p>
                        <img src="../img/dead.png" alt="">
                    </div>
                <?php
               }else{
                $sql3="SELECT * FROM tb_user_games WHERE id_user = '$id';";
                $result3=mysqli_query($dblink,$sql3) or exit(mysqli_error($dblink));
                while( $res3=mysqli_fetch_array($result3)){ 
                    $id_game = $res3['id_game'];

                    $sql4="SELECT * FROM tb_games WHERE id_game = '$id_game';";
                    $result4=mysqli_query($dblink,$sql4) or exit(mysqli_error($dblink));
                    while( $res4=mysqli_fetch_array($result4)){ 
                    ?>
                    <a href="../game.php?id=<?php echo $res4['id_game']; ?>">
                        <div class="ped-game-box">
                        <div class="img">
                            <img src="../<?php echo $res4['game_img']; ?>" alt="">
                        </div>
                        <div class="infog">
                                <p><?php echo $res4['title']; ?></p>
                                <p><?php echo $res4['dayone_game']; ?></p>
                                <div class="statush">
                                    <div class="gbf"></div><p>Entregado</p>
                                </div>
                        </div>
                        </div>
                    </a>
                <?php }          
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
