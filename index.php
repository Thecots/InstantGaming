<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instant Gaming</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/logo.png">
</head>
<body>
    <?php
        session_start(); 
        include('sql/sql.php');
        if(isset($_SESSION['id'])){ 
            $id = $_SESSION['id'];
            $sql="SELECT * FROM tb_users WHERE id_user='$id';";
            $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
            $res=mysqli_fetch_array($result);
        }
    ?>
    <!-- ----- <SIGIN> ----- -->
        <?php include("session.php"); ?>
    <!-- ----- </SIGIN> ----- -->

    <!-- ----- <HEADER> ----- -->
    <header>
        <a href="index.php">
            <div class="img">
                <img src="img/logo.png" alt="">
                <h1>Instant Gaming</h1>
            </div>
        </a>
        <div class="buscador">
            <img src="img/search.png" alt=""><input placeholder="Buscar" type="text" >
        </div>
        <div class="perfil">
            <?php
            if(isset($_SESSION['id'])){ ?>
            <a>
                <div id="conf-user" class="session-on">
                    <img src="<?php echo $res['profile_picture']; ?>" alt="">
                    <img src="img/menu.png" alt="">
                </div>
            </a>
            <?php
            }else{ ?>
                <div class="session-off">
                   <a id="login">Log In</a>
                   <a href="siginup.php" id="siginup">Sign Up</a>
                   </div>
           <?php } ?>
        </div>
    </header>
    <div  class="conf-user">
        <a href="user/index.php?user=<?php echo $res['username'];?>"><p>Perfil</p></a>
        <a href="user/editar_perfil.php?id=<?php echo $res['username'];?>"><p>Editar Perfil</p></a>

        <?php
            if($res['user_type'] == 0){
                echo '<a href="dashboard.php" style="text-decoration: none;"><p style="color:black;">Admin panel</p></a>';
            }
        ?>
        <a href="user/pedidos.php?id=<?php echo $res['username'];?>"><p id="">Mis pedidos</p></a>
        <a href="user/credit.php?id=<?php echo $res['username'];?>"><p id="">Mi credito</p></a>
        <a href="user/solicitudes.php?id=<?php echo $res['username'];?>"><p>Solicitudes <?php

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
    <!-- ----- <BODY></BODY> ----- -->
    <div class="body">
        <div class="main-box">
            <div class="main-header">
                <img src="img/banner/fifa.jpg" alt="">
                <div class="main-price">
                    <p>25€</p>
                </div>
            </div>
            <div class="games_month">
                <div class="title"><p>Juegos del mes</p></div>
                <?php
                    $sql1="SELECT * FROM tb_games WHERE estado = 1;";
                    $result1=mysqli_query($dblink,$sql1) or exit(mysqli_error($dblink));
                    while($reg=mysqli_fetch_array($result1)){?>
                        <a href="game.php?id=<?php echo $reg['id_game']; ?>">
                            <div class="game" >
                                <img src="<?php echo $reg['game_img']; ?>" alt="">
                                <div class="sombra">
                                    <p class="price-game"><?php echo $reg['precio'];?>€</p>
                                </div>
                                <p><?php echo $reg['title']; ?></p>
                            </div>
                        </a>
                    <?php }
                ?>
            </div>
            <div class="main-safe">
                <div class="box">
                    <div class="s">
                        <img src="img/fast.png" alt="">
                        <div class="a">
                            <p class="black">Súper rápido</p>
                            <p>Descarga digital instantánea</p>
                        </div>
                    </div>
                    <hr>
                    <div class="s">
                        <img src="img/safe.png" alt="">
                        <div class="a">
                            <p class="black">Oficial y seguro</p>
                            <p>Juegos 100% oficiales</p>
                        </div>
                    </div>
                    <hr>
                    <div class="s">
                        <img src="img/chat.png" alt="">
                        <div class="a">
                            <p class="black">Atención al cliente</p>
                            <p>Agente disponble 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="games_month">
                <div class="title"><p>Más vendidos</p></div>
                <?php
                    $sql1="SELECT * FROM tb_games WHERE estado = 1  ORDER BY vendidos DESC LIMIT 10;";
                    $result1=mysqli_query($dblink,$sql1) or exit(mysqli_error($dblink));
                    while($reg=mysqli_fetch_array($result1)){?>
                        <a href="game.php?id=<?php echo $reg['id_game']; ?>">
                            <div class="game" >
                                <img src="<?php echo $reg['game_img']; ?>" alt="">
                                <div class="sombra">
                                    <p class="price-game"><?php echo $reg['precio'];?>€</p>
                                </div>
                                <p><?php echo $reg['title']; ?></p>
                            </div>
                        </a>
                    <?php }
                ?>
            </div>
        </div>
    </div>
    <!-- ----- </BODY> ----- -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>

    <!-- ----- <SIGIN> ----- -->
    <!-- ----- </SIGIN> ----- -->