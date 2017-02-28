<!DOCTYPE html>
<html lang="en">  
<head>
<!--<link href="<php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />-->
</head>
<body>
<div class="container">
    <h2>Cuenta de acceso</h2>
    <h3> <?php echo $usuario['nombre']; ?>!</h3>
    <div class="account-info">
        <p><b>Nombre: </b><?php echo $usuario['nombre']; ?></p>
        <p><b>Email: </b><?php echo $usuario['email']; ?></p>
    </div>
</div>
</body>
</html>