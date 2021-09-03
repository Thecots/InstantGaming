<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instant Gaming</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <?php
        include("sql/sql.php");
    ?>
    <header>

    </header>
    <div class="menu">
        <div id="menu" class="icono">
            <img  src="img/Wmenu.png" alt="">
        </div>
        <div id="exit" class="icono">
            <img  src="img/exit.png" alt="">
        </div>
        <div style="justify-content: center;">
            <p>Menú</p>
        </div>
        <div id="home">
            <img id="home" src="img/home.png" alt="">
            <p>Home</p>
        </div>
        <div id="games">
            <img src="img/game.png" alt="">
            <p>Juegos</p>
        </div>
        <div id="users">
            <img src="img/users.png" alt="">
            <p>Usuarios</p>
        </div>
        <div id="historial">
            <img src="img/history.png" alt="">
            <p>Historial</p>
        </div>
        <a href="index.php">
            <div id="a">
                <img src="img/goback.png" alt="">
                <p>Volver</p>
            </div>
        </a>
    </div>
    <div class="body">
        <div class="dasboard dn">
            <div class="box-estats">
                <div class="box">
                    <div class="num">
                        <p id="count1">2245</p><a>€</a>
                    </div>
                    <div class="title">
                        <p>Dinero total</p>
                    </div>
                </div>
                
                <div class="box">
                    <div class="num">
                        <p id="count2">52</p>
                    </div>
                    <div class="title">
                        <p>Juegos toales</p>
                    </div>
                </div>

                <div class="box">
                    <div class="num">
                        <p id="count3">438</p>
                    </div>
                    <div class="title">
                        <p>Juegos vendidos</p>
                    </div>
                </div>

                <div class="box">
                    <div class="num">
                        <p id="count4">245</p>
                    </div>
                    <div class="title">
                        <p>Juegos comprados</p>
                    </div>
                </div>

                <div class="box">
                    <div class="num">
                        <p id="count5">1204</p>
                    </div>
                    <div class="title">
                        <p>Usuarios totales</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="games dbs ">
            <div class="search-game">
                <input type="text">
            </div>
            <?php
                include("content/juegos/index.php");
            ?>
        </div>
        <div class="usuarios">

        </div>
        <div class="historial">

        </div>
    </div>
    <!--
   dashboard > dinero ganado, total juegos, total juegos comprados, usuarios totales,
        juegos > buscar, filtrar ver, editar, borrar, añadir .
        usuarios > buscar, filtrar ver, editar, borrar, añadir
        inicio > añadir/editar/borrar banner > Juegos del mes
        historial >  compras > reviews > usuarios


-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/dashboard-app.js"></script>
</body>
</html>

