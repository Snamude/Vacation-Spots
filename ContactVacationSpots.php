<?php

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];


$email_from = '';

$email_subject = 'Testing';

$email_body = "Name: $name.\n".
              "Email: $email.\n".
              "Message: $message.\n"; 


$to = "Stella.Namude@gmail.com";

$headers = "From: $email_from \r\n";

$headers = "Reply-To: $email \r\n";

mail($to,$email_subject,$email_body,$headers); 

header("Location: VacationSpotsST.html");

?>