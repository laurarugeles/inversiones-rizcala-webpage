<?php
//If the form is submitted
if(isset($_POST['submit'])) {
	
	$comments = $_POST['message'];

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}


	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'inrabel@hotmail.com';//Put your own email address here
		$body = "Nombre: $name \n\nEmail: $email \n\nMesaje:\n $comments";
		$headers = 'De: Inversiones rizcala hermanos rizher S en C S <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, 'inversiones rizcala hermanos rizher S en C S', $body, $headers);
		$emailSent = true;
	}
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Inversiones rizcala hermanos rizher S en C S</title>
	<meta name="description" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/standard.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat|Open+Sans+Condensed:700' rel='stylesheet' type='text/css'><!-- Montserrat and Open Sans Condensed  Font -->

	<script src="js/libs/modernizr-2.0.6.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	
</head>


<body class="contact">
	
	<div id="contact-wrapper">
		
		
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#contactform").validate();
			});
		</script>
		
		
		<?php if(isset($hasError)) { //If errors are found ?>
			<p class="error">Por favor, Chequea si completo los campos con la informacion correcta, Gracias.</p>
		<?php } ?>

		<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
			<p class="success">Correo enviado exitosamente!</p>
			<p class="success2">Gracias a usted <strong><?php echo $name;?></strong> por contactarnos! Te estaremos respondiendo pronto.</p>
		<?php } ?>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
			<div>
			    <label for="name">Nombre:<span class="required">*</span></label>
				<input type="text" size="28" name="contactname" id="contactname" value="" class="required" />
			</div>

			<div>
				<label for="email">Email:<span class="required">*</span></label>
				<input type="text" size="28" name="email" id="email" value="" class="required email" />
			</div>

			<div>
				<label for="message">Mensaje:</label>
				<textarea rows="10" cols="38" name="message" id="message"></textarea>
			</div>
		    <input type="submit" value="Enviar mensaje" name="submit" class="submit-button" />
		</form>
		</div><!-- close #contact-wrapper -->

</body>
</html>