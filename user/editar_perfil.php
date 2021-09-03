<!DOCTYPE html>
<html lang="es">
    
<head>
    <?php
        include('../sql/sql.php');
        session_start();
        if(isset($_SESSION['id'])){ 
            $username = $_SESSION['id'];
            $sql="SELECT * FROM tb_users WHERE id_user='$username';";
            $result=mysqli_query($dblink,$sql) or exit(mysqli_error($dblink));
            $res=mysqli_fetch_array($result);
            $id = $res['id_user'];
        }

        $user = $_REQUEST['id'];

        $sql1 = "SELECT * FROM tb_users WHERE username = '".$user."';";
        $result1=mysqli_query($dblink,$sql1) or exit(mysqli_error($dblink));
        $res1=mysqli_fetch_array($result1);
        $id_user = $res1['id_user'];
    ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo $user;?></title>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/editar_perfil.css">

    <link rel="icon" href="../img/logo.png">
</head>
<body>
<?php 
     if(isset($_SESSION['id'])){ 
        if($_SESSION['id'] !== $id_user){
            header("location:../index.php"); 
        }
    }else{
        header("location:../index.php"); 
    }
?>
<input style="display: none; " type="text" id="idp" value="<?php echo $user;?>">
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
        <p id="CerrarSession">Cerrar sessión</p>
    </div>
    <!-- BODY -->
    <div class="body">
        <div class="main-box" >
            <div class="perf_box" style="flex-direction: column; height: auto;">
              <div class="correo">
                <p class="p">Cambiar Foto de perfil</p>
                  <div class="c">
                    <div class="fp-first">
                      <div id="preview-crop-image" >
                        <img src="../<?php echo $res1['profile_picture'] ?>" alt="">
                      </div>
                        <button id="fp-show" class="aceptar1">CAMBIAR FOTO DE PERFIL</button>
                    </div>
                        <div class="fp-show">
                          <div class="upload3">
                            <div>
                              <div id="upload-demo"></div>
                            </div>
                            <input type="file" id="image">
                          </div>
                          <div class="p-btn">
                            <button class="" id="upload-img" style="margin-top:2%">Aceptar</button>
                            <button class="" id="img-cancel" style="margin-top:2%">Cancelar</button>

                          </div>
                        </div>
                  </div>
              </div>
      


               <div class="correo">
                   <p class="p">Cambiar correo <a class="pp">(Correo actual: <span class="correoa"></span>)</a></p>
                   <div class="c">
                      <input class="input" id="correo1"placeholder="Tu nuevo e-mail" type="text">
                      <input class="input" id="passwd1"placeholder="Tu contraseña actual" type="password">
                      <p id="error1" class="p-error1-c">La contraseña no coincide</p>
                      <p id="error2" class="p-error2-c">Los correos no cinciden</p>
                      <p  class="p-error2-c" id="error3">Campos vacios</p>
                      <p id="p-c1" class="p-c">Correo cambiado correctamente</p>

                        <button id="aceptar-correo" class="aceptar1">ACEPTAR</button>
                   </div>
               </div>
               <div class="correo">
                   <p class="p">Cambiar contraseña <a class="pp">(Contraseñas no cifradas, cualquier administrador podrá verla)</a></p>
                   <div class="c">
                      <input id="p12"class="input" placeholder="Contraseña actual" type="password">
                      <input id="p22"class="input" placeholder="Nueva contraseña" type="password">
                      <input id="p32"class="input" placeholder="Repita la nueva contraseña" type="password">

                      <p id="error12" class="p-error1-c">Contraseña actual no coincide</p>
                      <p id="error22" class="p-error2-c">Nuevas contraseñas no coinciden</p>
                      <p  class="p-error2-c" id="error32">Campos vacios</p>
                      <p id="p-c12" class="p-c">Contraseña cambiada correctamente</p>
                        <button id="aceptar-passwd" class="aceptar1">ACEPTAR</button>
                   </div>
               </div>
               <div class="correo">
                   <p class="p">Nombre y apellido <a class="pp"><span class="getname"></span></a></p>
                   <div class="c">
                      <input id="nombre3" class="input" id="nombre" placeholder="Nuevo nombre" type="text">
                      <input id="apellido3" class="input" id="apellido" placeholder="Nuevo apellido" type="text">
                      <input id="passwd3" class="input" id="passwd3" placeholder="Tu contraseña actual" type="password">
                      <p id="error13" class="p-error1-c">La contraseña no coincide</p>

                      <p  class="p-error2-c" id="error33">Campos vacios</p>
                      <p id="p-c13" class="p-c">Nombre cambiado correctamente</p>
                        <button class="aceptar1" id="aceptar-nombre">ACEPTAR</button>
                   </div>
               </div>
            </div>
        </div>
    </div>     
    
    
    <script type="text/javascript">
    
    var idp = document.getElementById("idp").value;

var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'square' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});
$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});
$('#upload-img').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    $.ajax({
      url: "croppie.php",
      type: "POST",
      data: {"image":img, "idp":idp},
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
        getimg();
      }
    });
});

});
</script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/edit.js"></script>

</body>
</html>