<?php include ("header.php");?>

<body>
    <div class="container">
        <center><div class="col-sm-8"><h2>Agregar Cliente</h2></div><br><hr></center>
       
        <?php
        include ("database.php");
        $clientes = new Database();

        if (isset($_POST) && !empty($_POST)){
            $nombres = $clientes->sanitize($_POST['nombres']);
            $apellidos = $clientes->sanitize($_POST['apellidos']);
            $telefono = $clientes->sanitize($_POST['telefono']);
            $direccion = $clientes->sanitize($_POST['direccion']);
            $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);

            $res = $clientes->create($nombres, $apellidos, $telefono, $direccion, $correo_electronico);

            if($res){
                $message = "Datos insertados correctamente!!";
                $class = "alert alert-success";
            }
            else{
                $message = "Error de insercion!!";
                $class = "alert alert-danger";
            }
        
        ?>

        <div class="<?php echo $class; ?>">
        <?php echo $message; ?>
    </div>

       <?php
       }
       ?>
       
       
        <div class="row">
            <form method="POST">
<div class="col-md-6">
    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre(s)" required >
</div><br>
<div class="col-md-6">
    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
</div><br>
<div class="col-md-6">
    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
</div><br>
<div class="col-md-6">
    <textarea class="form-control" name="direccion" id="direccion" placeholder="Direcciòn" required></textarea>
</div><br>
<div class="col-md-6">
    <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" placeholder="Correo Electronico" required>
</div>
<br>
<div class="col-md-12 pull-right">
<button type="submit" class="btn btn-success">Guardar Registro</button>
 </div>
            </form>
        </div>
    </div>
</body>


<?php include ("footer.php");?>