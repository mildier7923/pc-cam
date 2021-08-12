<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Nuevo Contacto</title>
</head>

<body>
	<h1>Nuevo contacto</h1>
	<div>
		<ul>
			<li><b>Nombres:</b> {{$contact->name}}</li>
			<li><b>Apellidos:</b> {{$contact->last_name}}</li>
			<li><b>Telefono:</b> {{$contact->phone}}</li>
			<li><b>Correo:</b> {{$contact->email}}</li>
			<li><b>Mensaje:</b> {{$contact->message}}</li>
		</ul>
	</div>
</body>

</html>
