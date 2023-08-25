<?php

$error = '';

//VALIDANDO NOMBRE
if(empty($_POST["nombre"])){
    $error = 'Ingresa un nombre </br>';
}else{
    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $nombre = trim($nombre);
    if($nombre==''){
        $error .= 'Nombre está vacio</br>';
    }
}
//VALIDANDO E-MAIL
if(empty($_POST["email"])){
    $error .= 'Ingresa un E-mail</br>';
}else{
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= 'Ingresa un E-mail verdadero</br>';
    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}
//VALIDANDO TELÉFONO
if(empty($_POST["telefono"])){
    $error .= 'Ingresa un Teléfono</br>';
}else{
    $telefono = $_POST["telefono"];
    $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
    $telefono = trim($telefono);
    if($telefono==''){
        $error .= 'Teléfono está vacio</br>';
    }
}
//VALIDANDO MENSAJE
if(empty($_POST["mensaje"])){
    $error .= 'Ingresa un mensaje </br>';
}else{
    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
    $mensaje = trim($mensaje);
    if($mensaje==''){
        $error .= 'Mensaje está vacio</br>';
    }
}

//CUERPO DEL MENSAJE
$cuerpo .= "Nombre: ";
$cuerpo .= $nombre;
$cuerpo .= "\n";
 
$cuerpo .= "Email: ";
$cuerpo .= $email;
$cuerpo .= "\n";

$cuerpo .= "Telefono: ";
$cuerpo .= $telefono;
$cuerpo .= "\n";
 
$cuerpo .= "Mensaje: ";
$cuerpo .= $mensaje;
$cuerpo .= "\n";

//DIRECCIÓN
$enviarA = 'admon@bildr.mx'; 
$asunto = 'Nuevo mensaje para BILDR';

//ENVIAR CORREO
if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
}

?>