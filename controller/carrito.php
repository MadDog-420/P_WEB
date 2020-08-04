<?php
    //&& !empty($_SESSION['USER'][0])
    if(isset($_POST['btn_action'])){

        switch($_POST['btn_action']){

            case 'agregar':

                if(is_numeric(openssl_decrypt( $_POST['id'],COD,KEY ))){
                    $id=openssl_decrypt( $_POST['id'],COD,KEY );
                } else {
                    echo "Error de ID";
                break;
                }
                if(is_string(openssl_decrypt( $_POST['name'],COD,KEY ))){
                    $nombre=openssl_decrypt( $_POST['name'],COD,KEY );
                } else {
                    echo "Error de nombre";
                break;
                }
                if(is_numeric(openssl_decrypt( $_POST['precio'],COD,KEY ))){
                    $precio=openssl_decrypt( $_POST['precio'],COD,KEY );
                } else {
                    echo "Error de precio";
                break;
                }
                if(is_numeric(openssl_decrypt( $_POST['cantidad'],COD,KEY ))){
                    $cantidad=openssl_decrypt( $_POST['cantidad'],COD,KEY );
                } else {
                    echo "Error de cantidad";
                break;
                }

                if(!isset($_SESSION['CARRITO'])){
                    
                    $producto=array(
                        'ID'=>$id,
                        'NOMBRE'=>$nombre,
                        'PRECIO'=>$precio,
                        'CANTIDAD'=>$cantidad
                    );
                    $_SESSION['CARRITO'][0]=$producto;
                    echo "<script>
                        $(document).ready(function(){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Agregado al carrito',
                                showConfirmButton: false,
                                timer: 1500
                              })
                        })
                        </script>";

                } else {

                    $idArray=array_column($_SESSION['CARRITO'],"ID");
                    if(in_array($id,$idArray)){

                        foreach($_SESSION['CARRITO'] as $indice=>$producto){

                            if($producto['ID']==$id){

                                $_SESSION['CARRITO'][$indice]=$producto;

                                $new_producto=array(
                                    'ID'=>$producto['ID'],
                                    'NOMBRE'=>$producto['NOMBRE'],
                                    'PRECIO'=>$producto['PRECIO'],
                                    'CANTIDAD'=>$producto['CANTIDAD']+1
                                );
                                
                                $_SESSION['CARRITO'][$indice]=$new_producto;
                                echo "<script>
                                    $(document).ready(function(){
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'Agregado al carrito',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    })
                                    </script>";
                            }
    
                        }

                    } else {

                        $numProduct=count($_SESSION['CARRITO']);
                        $producto=array(
                            'ID'=>$id,
                            'NOMBRE'=>$nombre,
                            'PRECIO'=>$precio,
                            'CANTIDAD'=>$cantidad
                        );
                        $_SESSION['CARRITO'][$numProduct]=$producto;
                        echo "<script>
                        $(document).ready(function(){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Agregado al carrito',
                                showConfirmButton: false,
                                timer: 1500
                              })
                        })
                        </script>";
                    }
                }
            
            break;

            case 'eliminar':

                if(is_numeric(openssl_decrypt( $_POST['id'],COD,KEY ))){
                    $id=openssl_decrypt( $_POST['id'],COD,KEY );

                    foreach($_SESSION['CARRITO'] as $indice=>$producto){

                        if($producto['ID']==$id){

                            if($producto['CANTIDAD']>1){
                                $producto['CANTIDAD']=$producto['CANTIDAD']-1;
                                $_SESSION['CARRITO'][$indice]=$producto;
                            } else {
                                unset($_SESSION['CARRITO'][$indice]);
                                echo "<script>Swal.fire('Elemento borrado');</script>";
                            }
                        }

                    }

                } else {
                    echo "Error de ID";
                }

            break;
            
        }
    } 
    /*else {
        echo "<script>Swal.fire('Inicie sesión primero');</script>";
    }*/