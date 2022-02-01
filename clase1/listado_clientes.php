<?php include("header.php"); ?>

<div class="container">
    <div class="table-wrapper">
        <div class="table-tittle">
            <div class="row">
                <center><div class="col-sm-8"><h2>Listado de clientes</h2></div></center>
            </div>
        </div>
       <br><hr>
        <table id="table_id" class="display">
            <thead>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Correo Electronico</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php include("database.php"); 
                $clientes = new Database();
                $listado = $clientes->listadoclientes();

                while ($row = mysqli_fetch_object($listado)){
                    $id = $row->id;
                    $nombres = $row->nombres." ".$row->apellidos;
                    $telefono = $row->telefono;
                    $direccion =  $row->direccion;
                    $email = $row->correo_electronico
                
                ?>
                <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombres; ?></td>
                <td><?php echo $telefono; ?></td>
                <td><?php echo $direccion; ?></td>
                <td><?php echo $email; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $id; ?>"class="edit btn btn-warning" title="Editar"data-toogle="tooltip">Editar</a>
                    <a href="delete.php?id=<?php echo $id; ?>"class="delete btn btn-danger" title="Eliminar"data-toogle="tooltip">Eliminar</a>
                </tr>


                <?php } ?> 
            </tbody>
        </table>
    </div>
</div>


<?php include("footer.php"); ?>