<?php
// Varios destinatarios
$para  = 'patagoniasonidonqn@gmail.com' . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Reset pass';
$codigo= rand(1000,9999);
$mensaje="un mensaje";
$micorreo="From: marcosg1504@gmail.com";
// mensaje
/*$mensaje = '
<html>
<head>
  <title>resetear clave</title>
</head>
<body>
<h1>Nombre de la empresa</h1>
<div style="text-align:center; background-color:#ccc">
    <p>Restablecer contraseña</p>
    <h3>'.$codigo.'</h3>
    <p> </p>
    <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
</div>
</body>
</html>
';*/

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: <".$para.">\n";
$headers .= "X-Priority: 1\n";
/* Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/

// Enviarlo
//mail($para, $título, $mensaje, $headers);

if(mail($para, $título,$mensaje,$micorreo)){
    echo "correo enviado";
}else{
    echo "erorr";
}
?>