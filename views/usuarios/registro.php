<!DOCTYPE html>
<html lang="es">  
<head>
<!--<link href="<php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />-->
</head>
<body>
<div class="container">
    <h2>Registro de cuenta de acceso</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="" value="<?php echo !empty($usuario['nombre'])?$usuario['nombre']:''; ?>">
          <?php echo form_error('Nombre','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required="" value="<?php echo !empty($usuario['apellidos'])?$usuario['apellidos']:''; ?>">
          <?php echo form_error('Apellidos','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="dni" placeholder="DNI" required="" value="<?php echo !empty($usuario['dni'])?$usuario['dni']:''; ?>">
          <?php echo form_error('DNI','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($usuario['email'])?$usuario['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="Repite password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn-primary" value="Procesar"/>
        </div>
    </form>
</div>
</body>
</html>