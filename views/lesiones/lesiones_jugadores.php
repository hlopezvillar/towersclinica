<!DOCTYPE html>
<html lang="es">  
<head>
<!--<link href="<php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />-->
</head>
<body>
<div class="container">
    <h2>Registro de lesiones</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="observaciones" placeholder="Observaciones" required="" value="<?php echo !empty($lesion_jugador['observaciones'])?$lesion_jugador['observaciones']:''; ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn-primary" value="Procesar"/>
        </div>
    </form>
</div>
</body>
</html>