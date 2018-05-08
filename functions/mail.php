<?php
/* Get the data from JS */
$data = json_decode(file_get_contents('php://input'), true);

/* Set e-mail recipient */
$myemail = "rafaelrojas.cov@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($data['name'], "Enter your name");
$email = check_input($data['email'], "Enter your email");
$phone = check_input($data['phone'], "Enter your phone");
$subject = 'Contacto desde rafaelrojascov.com';
$message = check_input($data['message'], "Write your message");

/* Let's prepare the message for the e-mail */
$message = "

Name: $name
E-mail: $email
Phone: $phone
Subject: $subject

Message:
$message

";

/* Send the message using mail() function and return a response*/
$response = ["resp" => mail($myemail, $subject, $message)];
header('Content-type: application/json');
sleep(rand(1,2));
echo json_encode($response);

/* Functions we used */
function check_input($data, $problem=''){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>