<?php
define( "WEBMASTER_EMAIL", 'pekic.uros@gmail.com' );

$error = false;
$fields = array( // only for required fields
	'name',
	'phone',
	'email',
	'date',
	'time',
	'message',
);

foreach ( $fields as $field ) {
	if ( empty( $_POST[$field] ) || trim( $_POST[$field] ) == '' )
		$error = true;
}

if ( ! $error ) {

$name = stripslashes( $_POST['name'] );
$phone = stripslashes( $_POST['phone'] );
$email = trim( $_POST['email'] );
$prefer = $_POST['prefer'];

$date = $_POST['date'];
$time = stripslashes( $_POST['time'] );
$pickup = $_POST['pickup'];
$message = stripslashes( $_POST['message'] );

$subject = "Customer Service";

$message = "
Name: $name \r\n
Phone: $phone \r\n
Email: $email \r\n
Prefer: $prefer \r\n
\r\n
Date: $date \r\n
Time: $time \r\n
Vehicle Pickup: $pickup \r\n
Message: $message
";

$mail = @mail( WEBMASTER_EMAIL, $subject, $message,
	 "From: " . $name . " <" . $email . ">\r\n"
	."Reply-To: " . $email . "\r\n"
	."X-Mailer: PHP/" . phpversion() );

if ( $mail ) { echo "Success"; }
else { echo "Error"; }

}
?>