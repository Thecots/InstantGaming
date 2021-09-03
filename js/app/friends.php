 <?php
                            if(isset($_SESSION['id'])){ 
                                $sql7="SELECT count(*) FROM tb_friends WHERE friend1 = '$id_user' OR friend2 = '$id_user';";
                                $result7=mysqli_query($dblink,$sql7) or exit(mysqli_error($dblink));
                                $res7=mysqli_fetch_array($result7);
                                
                                if($_SESSION['id'] !== $id_user){
                                    if($res7['count(*)'] == 0){
                                        ?>
                                            <a id="enviar_solicitud">Enviar solicitud de amistad</a>
                                        <?php                                    }else{
                                        $sql8="SELECT * FROM tb_friends WHERE friend1 = '$id_user' OR friend2 = '$id_user';";
                                        $result8=mysqli_query($dblink,$sql8) or exit(mysqli_error($dblink));
                                        $res8=mysqli_fetch_array($result8);
                                        $fstat = $res8['friend_status'];
                                            if($fstat == 1){
                                                ?>
                                                <a id="eliminar_amigo">Eliminar amigo</a>
                                                <?php
                                            }else if($fstat == 2){
                                            ?>
                                                <a id="enviar_solicitud">Pendiente de confirmar</a>
                                            <?php                                               
                                            }else{

                                            }
                                    }
                                }else{
                                   ?>
                                    <a href="editar_perfil.php?id=<?php echo $user; ?>" id="Editar_perfil">Editar Perfil</a>
                                <?php
                                }
                               
                            }
                            ?>