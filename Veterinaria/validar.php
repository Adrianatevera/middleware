<?php
    $usuario=$_POST['username'];
    $contraseña=$_POST['password'];
    session_start();
    $_SESSION['username']=$usuario;

    include('conexion.php'); 

    $consulta="SELECT*FROM administradores where correo='$usuario' and contraseña='$contraseña'";
    $resultado=mysqli_query($conexion,$consulta);    

    $filas=mysqli_fetch_array($resultado);

    if (!empty($filas['id_admin'])){//administrador
        header('Location:Menu/menu_prin.php');
        
    } 
    else
    {
        
        echo '
                <script>
                alert("Usuario no registrado");
                location.href="index.php";
                </script>';

    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);

    
?>

