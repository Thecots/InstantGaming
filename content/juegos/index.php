<style>
    table img{
        width: 40px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 16px;
    }

    th, td {
        text-align: center;
        padding: 5px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #383838;
        color: white;
        padding: 5px;

    }

    .icon-table img{
        width: 42px;
        padding: 11px;
        cursor: pointer;
    }
</style>
<?php
    $sql2="SELECT * FROM tb_games ORDER BY id_game";
    $result2=mysqli_query($dblink,$sql2) or exit(mysqli_error($dblink));
    
    ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Img</th>
                <th>Estado</th>
                <th>Vendidos</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>ver</th>
                <th>Editar</th>
                <th>borrar</th>
            </tr>
        <?php
        while($reg2=mysqli_fetch_array($result2)){?>
            <tr>
            <td><?php echo $reg2['id_game']; ?></td>
            <td><?php echo $reg2['title']; ?></td>
            <td><img src="<?php echo $reg2['game_img']; ?>" alt=""></td>
            <td><?php 
                $estado = $reg2['estado'];

                if($estado == 1){
                    echo "Activado";
                }else if($estado == 0){
                    echo "Desactivado";
                }
            
            ?></td>
            <td><?php echo $reg2['vendidos']; ?></td>
            <td><?php echo $reg2['cantidad']; ?>/U</td>
            <td><?php echo $reg2['precio']; ?>€</td>
            <td class="icon-table"><img src="img/see.png" alt=""></td>
            <td class="icon-table"><img src="img/edit.png" alt=""></td>
            <td class="icon-table"><img src="img/delete.png" alt=""></td>

            </tr>

        <?php } ?>

        </table>


