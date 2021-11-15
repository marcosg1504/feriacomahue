
<?php


if(isset($_COOKIE["para"])){
    $para=$_COOKIE["para"];
    $título = 'Recuperar contraseña';
    $codigo= rand(1000,9999);
    
    $mensaje="su codigo de cambio de contraseña es ".$codigo." "; 
    $micorreo="From: feriacomahue4@gmail.com";
    
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: <".$para.">\n";
    $headers .= "X-Priority: 1\n";
    
    
    
    if(mail($para, $título,$mensaje,$micorreo)){
        //sleep(5);
        echo "Se envio el codigo para recuperar su contraseña";
        
        redirect(base_url("login/nuevaclave"));
        
        
    }else{
        echo "erorr";
    }
}else{
    echo "no funciona";
}


?>