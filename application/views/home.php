<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <a href="Login" class="btn btn-primary">Cerrar sesion</a>
    <a href="Tareas" class="btn btn-primary">Crear Tarea</a>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $d) { ?>
            <tr>
                <th scope="row"><?php echo $d["id_tarea"]; ?></th>
                <td><?php echo $d["nombre"]; ?></td>
                <td><?php echo $d["descripcion"]; ?></td>
                <td><?php if($d["estado"]=="1") echo "Activo"; else  if($d["estado"]=="2") echo "Completado"; else if($d["estado"]=="0") echo "Terminada"; ?></td>
                <td><a href="<?php echo site_url("Tareas/cambiarEstado/").$d["id_tarea"]."/".$d["estado"]; ?>" class="btn btn-primary">Cambiar estado</a></td>
                <td><a href="<?php echo site_url("Tareas?id=").$d["id_tarea"]; ?>" class="btn btn-primary">Modificar</a></td>
                <td><a href="<?php echo site_url("Inicio/eliminar/".$d["id_tarea"]);?>" class="btn btn-primary">Eliminar</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>