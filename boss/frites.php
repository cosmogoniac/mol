<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<title>Para el Panel</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="nav.css">	
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
<script type="text/javascript" src="lacle.js"></script>
<script type="text/javascript" src="tax.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<style>
form {
    display: flex;
    flex-flow: column wrap;
    justify-content: space-between;
}

form > * {
    align-self: center;
}

.formTipo > input {
    background-color: #eee;
}
.formTipo label, .formTipo input {
    font-size: 1.5em;
    margin-top: 0.4em;
}
.registros > input {
    margin-top: 2em;
}

label {
    display: block;
}
h1,h2{
	margin-bottom:1em;
	text-align:center;
}
</style>
</head>
<body>
<div id="main">

<?php
	include_once("nav.php");
?>
	<section class="admin">
		<form id="axes" method="post">
			<div class="img">
				<img src="../images/varias/logo.png">
			</div>
			<div class="registros">
				<div class="formTipo">
					<label for="apellido">apellido</label>
					<input type="password" id="apellido" name="apellido"/>
				</div>
				<div class="formTipo">
					<label for="pass">apellido 2</label>
					<input type="password" id="apellido2" name="apellido2"/>
				</div>
				<input type="submit" value="Entrar" /></div>
			</div>
		</form>
	</section>
</div>
<script>
	document.querySelector("#apellido").focus();
</script>
</body>
</html>