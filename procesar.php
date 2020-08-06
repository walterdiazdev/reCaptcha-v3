<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar datos</title>
</head>
<body>

<?php 

// aqui setemaos el score que consideramos aceptable
$clave_privada = 'TU-CLAVE-PRIVADA'; 

// aqui setemaos el score que consideramos aceptable
$score_minimo_humano = 0.7;

$recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $clave_privada . '&response=' . $_POST['g-recaptcha-response']); 
//$recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $clave_privada . '&response=' . $_POST['token']); 
$recaptcha = json_decode($recaptcha); 
if($recaptcha->score >= $score_minimo_humano){
    // se trata de un humano real, aca podemos precesar nuestro formulario (guardar datos, enviar mails, etc)
    echo '<h1>Recibi un score de ' . $recaptcha->score . ', eres un humano.</h1>';
}else{
    // probablemente se trate de un bot
    echo '<h1>Recibi un score de ' . $recaptcha->score . ', creo que eres un bot!</h1>';
} 

?>

</body>
</html>