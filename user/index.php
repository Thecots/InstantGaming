<!DOCTYPE html>
<html lang="es">
    
<head>
    <?php
        include('../sql/sql.php');
        session_start();
        if(isset($_SESSION['id'])){ 
            $id = $_SESSION['id'];
            $sql="SELECT * FROM tb_users WHERE id_user='$id';";
            $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
            $res=mysqli_fetch_array($result);

        

            
        }
        $user = $_REQUEST['user'];

        $sql1 = "SELECT * FROM tb_users WHERE username = '".$user."';";
        $result1=mysqli_query($dblink,$sql1) or exit(mysqli_error($dblink));
        $res1=mysqli_fetch_array($result1);
        $id_user = $res1['id_user'];
        
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo $user;?></title>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" href="../img/logo.png">
</head>
<body>
<!-- ----- <SIGIN> ----- -->
<div class="login">
        <div class="box">
            <div class="title">
                <p>Crea tu cuenta en IG para continuar</p>
                <img id="quit" src="../img/exit.png" alt="">
            </div>
            <div class="box">
                <div class="crear">
                    <div class="creara">
                        <p>No tienes Cuenta?</p>
                        <img src="../img/create-acc.png" alt="">
                        <a id="CrearCuenta" >Crear cuenta</a>
                    </div>
                </div>
                <div class="sign">
                    <div class="titlee">
                        <p>Ya tengo una cuenta en IG</p>
                    </div>
                    <div class="inputacc">
                        <form  id="form_login">
                            <input id="sumb_user" type="text" placeholder="Usuario">

                            <input id="sumb_passwd" type="password" placeholder="Contraseña">
                            <span class="errorl">Usuario o contraseña invalidos</span>

                        </form>
                        <p id="IniciarSession2">Iniciar sessión</p>
                    </div>
                </div>
            </div>
            <div class="regsiter">
                <p>Por favor, introduce tus datos para crear tu cuenta</p>
            <form id="registerform">
                <div class="inputs">    
                    <div class="r">
                        <a>E-mail</a>
                        <input REQUIRED id="r_email" type="text" placeholder="e-mail">
                        <a>Contraseña</a>
                        <input REQUIRED id="r_passwd1" type="password" placeholder="Contraseña">
                        <a>Nombre</a>
                        <input REQUIRED id="r_nombre" type="text" placeholder="Nombre">
                        <a>Fecha de Nacimiento</a>
                        <input REQUIRED id="r_date" type="date">
                    </div>
                    <div class="l">
                        <a>Usuario</a>
                        <input REQUIRED id="r_user" type="text" placeholder="Usuario">
                        <a>Repita la contraseña</a>
                        <input REQUIRED id="r_passwd2" type="password" placeholder="Reptia contraseña">
                        <a>Apellido</a>
                        <input REQUIRED id="r_apellido" type="text" placeholder="Apellido">

                        <button id="registrar2">Aceptar</button>
                    </div>
                    </form>
                    <div class="send">

                    </div>
                </div>
            </div>
            <div class="termss">
                <p class="terms">Mantendremos tus datos privados y nunca venderemos tu información para uso comercial.</p>
            </div>
        </div>
    </div>
    <!-- ----- </SIGIN> ----- -->

    <header>
        <a href="../index.php">
            <div class="img">
                <img src="../img/logo.png" alt="">
                <h1>Instant Gaming</h1>
            </div>
        </a>
        <div class="buscador" style="display: none;">
            <img src="" alt=""><input placeholder="Buscar" type="text" >
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
        <a href="solicitud/close.php"><p id="CerrarSession">Cerrar sessión</p></a>
    </div>
    <!-- BODY -->
    <div class="body">
        <div class="main-box">
            <div class="perf_box">
                <div class="img">
                    <img src="../<?php echo $res1['profile_picture']; ?>" alt="">
                    <?php
                        if(isset($_SESSION['id'])){
                            if($id == $id_user){
                    ?>
                        <a href="editar_perfil.php?id=<?php echo $res['username'];?>">Editar</a>
                    <?php }} ?>
                    <div class="nivel">
                        <p><?php echo $res1['lvl']; ?>pts</p>
                    </div>
                </div>
                <div class="more">
                    <div class="info">
                        <h1><?php echo $res1['username']; ?></h1>
                        <p><?php echo $res1['nombre'].' '.$res1['apellido']; ?></p>
                        <p>Miembro desde <?php echo $res1['dayone']; ?></p>
                        <div class="addfriend">
                        <?php

                            if(isset($_SESSION['id'])){ 
                                if($id !== $id_user){
                                    $sql2="SELECT count(*) FROM tb_friends WHERE friend1 = '$id' AND friend2 = '$id_user' OR friend2 = '$id' AND friend1 = '$id_user' ;";
                                    $result2=mysqli_query($dblink,$sql2) or exit(mysqli_error($dblink));
                                    $res2=mysqli_fetch_array($result2);
                                    if($res2['count(*)'] == 0){
                                        ?>
                                            <a href="../js/friends/enviar.php?id1=<?php echo $id;?>&id2=<?php echo $id_user;?>&user=<?php echo $user;?>" id="enviar_solicitud">Enviar solicitud de amistad</a>
                                        <?php
                                    }else{
                                        $sql21="SELECT * FROM tb_friends WHERE friend1 = '$id' AND friend2 = '$id_user' OR friend2 = '$id' AND friend1 = '$id_user' ;";
                                        $result21=mysqli_query($dblink,$sql21) or exit(mysqli_error($dblink));
                                        $res21=mysqli_fetch_array($result21);
                                        if($res21['friend_status'] == 1){
                                            ?>
                                                <a href="../js/friends/eliminar.php?id1=<?php echo $id;?>&id2=<?php echo $id_user;?>&user=<?php echo $user;?>" id="eliminar_amigo">Eliminar amigo<a>
                                            <?php
                                        }else if($res21['friend_status'] == 2){
                                            if($res21['friend1'] == $id){
                                                ?>
                                                    <a href="../js/friends/eliminar.php?id1=<?php echo $id;?>&id2=<?php echo $id_user;?>&user=<?php echo $user;?>" id="Pendiente_confirmar">Pendiente de confirmar<a>
                                                <?php
                                            }else{
                                                ?>
                                                <a href="../js/friends/acceptar.php?id1=<?php echo $id;?>&id2=<?php echo $id_user;?>&user=<?php echo $user;?>" id="enviar_solicitud">Acceptar solicitud de amistad<a>
                                                
                                                <a href="../js/friends/eliminar.php?id1=<?php echo $id;?>&id2=<?php echo $id_user;?>&user=<?php echo $user;?>" id="eliminar_amigo">Rechazar solicitud de amistad<a>
                                            <?php
                                            }
                                        }else{
                                            echo "jaja";
                                        }
                                        

                                    }
                                }else{
                                    ?>
                                        <a href="editar_perfil.php?id=<?php echo $user; ?>" id="Editar_perfil">Editar Perfil</a>
                                    <?php
                                }
                                        
                                        
                            }
                                
                            
                            ?>
                        </div>
                    </div>
                    <div class="logros">
                        <?php
                            
                            $sqllogros="SELECT * FROM tb_user_logros WHERE id_user = '$id_user';";
                            $resultlogros=mysqli_query($dblink,$sqllogros) or exit(mysqli_error($dblink));
                            $logros=mysqli_fetch_array($resultlogros);
  


                        ?>
                         <?php 
                         /* user */
                        $numbFriends ="SELECT count(*) FROM tb_friends WHERE friend1 = '$id_user' AND friend_status = 1;";
                        $numbFriends2 ="SELECT count(*) FROM tb_friends WHERE friend2 = '$id_user' AND friend_status = 1;";
                        $result31=mysqli_query($dblink,$numbFriends2) or exit(mysqli_error($dblink));
                        $result32=mysqli_query($dblink,$numbFriends) or exit(mysqli_error($dblink));
                        $res31=mysqli_fetch_array($result31);
                        $res32=mysqli_fetch_array($result32);

                        $total_friends = $res32['count(*)'] + $res31['count(*)'];
                         
                          /* games */
                          $id_user = $res1['id_user'];
                          $numbFriends ="SELECT count(*) FROM tb_user_games WHERE id_user = '$id_user';";
                          $result32=mysqli_query($dblink,$numbFriends) or exit(mysqli_error($dblink));
                          $res32=mysqli_fetch_array($result32);
                          $total_games = $res32['count(*)'];


                                            ?>
                        <div class="logro l1"><span class="l1s">Registrate</span><img class="<?php if($logros['l1'] == 0){ echo "completed";} ?>" src="../img/logros/1.png" alt=""></div>
                        <div class="logro l2"><span class="l2s">Compra 1 juego</span><img class="<?php if($total_games >= 1){ }else{echo "completed";} ?>" src="../img/logros/9.png" alt=""></div>
                        <div class="logro l3"><span class="l3s">Compra 5 juegos</span><img class="<?php if($total_games >= 5){ }else{echo "completed";} ?>" src="../img/logros/10.png" alt=""></div>
                        <div class="logro l4"><span class="l4s">Compra 10 juegos</span><img class="<?php if($total_games >= 10){ }else{echo "completed";} ?>" src="../img/logros/11.png" alt=""></div>
                        <div class="logro l5"><span class="l5s">Compra 15 juegos</span><img class="<?php if($total_games >= 15){ }else{echo "completed";} ?>" src="../img/logros/12.png" alt=""></div>
                        <div class="logro l6"><span class="l6s">Añade a 1 amigo</span><img class="<?php if($total_friends >= 1){ }else{echo "completed";} ?>" src="../img/logros/7.png" alt=""></div>
                        <div class="logro l7"><span class="l7s">Añade a 5 amigos</span><img class="<?php if($total_friends >= 5){ }else{echo "completed";} ?>" src="../img/logros/6.png" alt=""></div>
                        <div class="logro l8"><span class="l8s">Añade a 10 amigos</span><img class="<?php if($total_friends >= 10){ }else{echo "completed";} ?>" src="../img/logros/5.png" alt=""></div>
                        <div class="logro l9"><span class="l9s">Gana 50€ en una partida</span><img class="<?php if($logros['l2'] == 0){ echo "completed";} ?>" src="../img/logros/2.png" alt=""></div>
                        <div class="logro l10"><span class="l10s">Gana 100€ en una partida</span><img class="<?php if($logros['l3'] == 0){ echo "completed";} ?>" src="../img/logros/3.png" alt=""></div>
                        <div class="logro l11"><span class="l11s">Gana 300€ en una partida</span><img class="<?php if($logros['l4'] == 0){ echo "completed";} ?>" src="../img/logros/4.png" alt=""></div>
                        <div class="logro l12"><span class="l12s">Llega al top 3 en mi credito</span><img class="<?php if($logros['l5'] == 0){ echo "completed";} ?>" src="../img/logros/14.png" alt=""></div>
                        <div class="logro l13"><span class="l13s">Llega al top 1 en mi credito</span><img class="<?php if($logros['l6'] == 0){ echo "completed";} ?>" src="../img/logros/13.png" alt=""></div>

                    </div>
                </div>
            </div>



            <div class="dividir">
                <div class="linea">

                </div>
                <div class="friends">
                   
                    <P><?php echo $total_friends; ?> Amigos</P>

                </div>
            </div>



            <div class="perf_friends">
                <?php
                    
                    $sql3="SELECT * FROM tb_friends WHERE friend1 = '$id_user' OR friend2 = '$id_user';";
                    $result3=mysqli_query($dblink,$sql3) or exit(mysqli_error($dblink));
                   while( $res3=mysqli_fetch_array($result3)){
                       if($res3['friend_status'] == 1){
                            $friend1 = $res3['friend1']; 
                            $friend2 = $res3['friend2']; 

                            if($friend1 == $id_user){
                                $friend = $res3['friend2'];
                            }else if($friend2 == $id_user){
                                $friend = $res3['friend1'];
                            }
                            
                            $sql4="SELECT * FROM tb_users WHERE id_user = '$friend';";
                            $result4=mysqli_query($dblink,$sql4) or exit(mysqli_error($dblink));
                            $res4=mysqli_fetch_array($result4);

    
                            ?>

                            <div class="friend-box">
                                <a href="index.php?user=<?php echo $res4['username'];?>">
                                    <img src="../<?php echo $res4['profile_picture'];?>" alt="">
                                </a>
                                <p> <?php echo $res4['username']; ?></p>
                                <p><?php echo $res4['lvl']; ?>pts</p>
                            </div>
                            <?php
                       }
                               
                   }
                ?>
            </div>

            
            <div class="dividir">
                <div class="linea">

                </div>
                <div class="friends">
                <?php

                    ?>
                    <P><?php echo $res32['count(*)']; ?> Juegos comprados</P>
                </div>
            </div>


            <div class="perf_juegos_comprados">
            <?php
                    $sql5="SELECT * FROM tb_user_games WHERE id_user = $id_user;";
                    $result5=mysqli_query($dblink,$sql5) or exit(mysqli_error($dblink));
                    while($reg5=mysqli_fetch_array($result5)){
                        $game_id = $reg5['id_game'];
                        $sql1="SELECT * FROM tb_games WHERE id_game = '$game_id';";
                        $result1=mysqli_query($dblink,$sql1) or exit(mysqli_error($dblink));
                        while($reg=mysqli_fetch_array($result1)){?>
                            <a href="../game.php?id=<?php echo $reg['id_game']; ?>">
                                <div class="game" >
                                    <img src="../<?php echo $reg['game_img']; ?>" alt="">
                                    <div class="sombra">
                                        <p class="price-game"><?php echo $reg['precio'];?>€</p>
                                    </div>
                                    <p><?php echo $reg['title']; ?></p>
                                </div>
                            </a>
                        <?php }                 
                    } ?>
            </div>

            <div class="dividir">
                <div class="linea">

                </div>
                <div class="friends">
                <?php $id_user = $res1['id_user'];
                        $numbFriends ="SELECT count(*) FROM tb_user_games WHERE id_user = '$id_user';";
                        $result32=mysqli_query($dblink,$numbFriends) or exit(mysqli_error($dblink));
                        $res32=mysqli_fetch_array($result32);

                    ?>
                    <P>0 Opiniones publicadas</P>
                </div>
            </div>


        </div>
    </div>      

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/app.js"></script>

</body>
</html>