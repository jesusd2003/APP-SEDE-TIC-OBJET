<?php include('../../conexion/conexion.php'); $sql=null;$query=null; session_start(); include('../../php/validar_sesion.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <title>Roles</title>
        <link rel="icon" href="../../img/icon_page.png">
        <link rel="stylesheet" href="../../CRUD-REGISTRO/dist/styles/style.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../CRUD-REGISTRO/dist/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../../bootstrap.trabajo/css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" 
        src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- Estilos de la caja xD -->    
    <style>
        .submit-hv:hover{
            background-color: #47a386;
        }
    </style>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand-lg" style="background-color: #57a639; margin: left 50%; color:white ;" >
                <div class="container px-12">
                    <a class="navbar-brand" href="#" style="color: white;"><img src="../../img/logo_sena_blanco.png" height="50" alt="Logo de la pagina"></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" style="color: white;" href="../index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link active"  style="color: white;" aria-current="page" href="../CRUD.php">Personal</a></li>
                            <li class="nav-item"><a class="nav-link" href="articulos.php" style="color: white;">Articulo</a></li>
                        </ul>
                    </div>
                </div>
                <a style="margin-right:15px;" class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../../configuracion/cambiar_contraseña.php">Cambiar contraseña</a></li> 
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../../php/cerrar_sesion.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
            <!-- Aqui va el resto del codigo, tablas etc -->
            <br>
        <h1 class="text-center">Control de articulos</h1>
        <hr>
        <div class="card text-center" style="margin-top:20px;margin-left:20px;margin-right:20px;">
            <form method="POST">
                <div class="row"style="margin-left:5px;margin-right:5px;">
                    <div class="card-header">
                        <h2>Ingresar Roles</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <label for="" class="label-control">Ingresa un nuevo rol:</label>
                            <input type="text" class="form-control" placeholder="Ingresa el rol" name="agg_rol_btn" id="agg_rol" value="">
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="col-lg-12">
                            <button type="button" id="buscar" onclick="" class="submit submit-hv agg_rol_btn" style="border-radius:10px;">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container d-flex justify-content-center mt-3">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <div class="tablita">
                        <table class="tabla" id="example" style="border:0;">
                            <div class="container-fluid" style="padding:0;margin:0;"> 
                                <div class="row form-group">
                            </div>
                            <thead>
                            <tr>
                                <th>Roles</th>
                                <th>Acciones</th>
                            </tr>
                            
                            </thead>
                            <tbody><?php $SQL = "SELECT * FROM roles ORDER BY id;";$query = mysqli_query($conexion,$SQL);
                            while($row = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $row['descripcion'] ?></td>
                                <div class="row">
                                    <td class="col-lg-3">
                                        <a href="" class="btn btn-danger borrar" borrar-id="<?php echo $row['id'] ?>"> <span class="glyphicon glyphicon-trash"></span> Borrar</a>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $row['id'];?>">
                                            Editar
                                        </button>
                                    </td>
                                </div>
                            </tr>
                            <?php  include('include/EditarModal.php'); }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="../../bootstrap.trabajo/js/bootstrap.min.js"></script>
        <script>
            // Initialize the DataTable
            $(document).ready(function () {
                $('#example').DataTable({    
                    // Enable the searching
                    // of the DataTable
                    //searching: true
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }
                });
            });
        </script>
        <script>
            añadirRol();
            function añadirRol() {
                $(".agg_rol_btn").click(function(e) {
                    e.preventDefault();
                    var boton = $(this)[0];
                    boton.blur();
                    let rol = $('#agg_rol').val();
                    $.ajax({
                        type: "POST",
                        url: "../php/agregar_rol.php",
                        data: 'agg_rol='+rol,
                        success: function(data){
                            alert(data, 1);
                            window.location.reload();
                        }
                    });          
                });
            }
        </script>
        <script>
            borrar();
            function borrar() {
                $(".borrar").click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr("borrar-id");
                    var boton = $(this)[0];
                    boton.blur();

                    if (confirm("¿Esta seguro que desea borrar a este rol?")) {
                        $.ajax({
                            type: "POST",
                            url: "../php/borrar_rol.php",
                            data: 'id='+id,
                            success: function(data){
                                alert(data, 1);
                                window.location.reload();
                            }
                        });
                    }          
                });
            }
        </script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="../../data-table/datatables.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    </body>
</html>