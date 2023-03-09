<?php
include("db.php");
//RECOGER DATOS 
$sentencia=$conexion->prepare("SELECT tbl_tickets.*, tbl_usuarios.nombre as nom, tbl_usuarios.apellidos as ape, tbl_puestos.nom_puesto as dep 
                                FROM tbl_tickets 
                                INNER JOIN tbl_usuarios ON tbl_tickets.id_usuario = tbl_usuarios.id 
                                INNER JOIN tbl_puestos ON tbl_usuarios.id_puesto = tbl_puestos.id");
$sentencia->execute();
$registros_tbl_tickets=$sentencia->fetchall(PDO::FETCH_ASSOC);

//CONSULTA PUESTOS
$consulta=$conexion->prepare("SELECT * FROM `tbl_puestos`");
$consulta->execute();
$puestos=$consulta->fetchAll(PDO::FETCH_ASSOC);

// Eliminar registros de la tabla tickets
if(isset($_GET['idticket'])){
    $idticket=$_GET['idticket'];
    $sentencia=$conexion->prepare("DELETE FROM tbl_tickets WHERE id_ticket=:id");
    $sentencia->bindParam(":id",$idticket);
    $sentencia->execute();
    header("Location:index.php");
}


//Crear Ticket
if($_POST){
    $titulo=(isset($_POST["titulo"])?$_POST["titulo"]:"");
    $descripcion=(isset($_POST["descripcion"])?$_POST["descripcion"]:"");
    $estado=(isset($_POST["estado"])?$_POST["estado"]:"");
    $prioridad=(isset($_POST["prioridad"])?$_POST["prioridad"]:"");
    $id_usuario=1;
    $fecha=new DateTime();
    $fecha_creacion=$fecha->getTimestamp();
    echo $titulo, $descripcion, $estado, $prioridad, $id_usuario, $fecha_creacion;    
}
include("./templates/header.php");
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<nav>
    <div class="nav nav-tabs shadow" style="border-radius: 10px; background-color:#a8dadc;" id="nav-tab" role="tablist">
        <button class="nav-link <?php if(isset($_GET["perfil"]) OR isset($_GET["mistickets"])){ echo "";}else{echo "active";}?>" style="border-radius: 10px; color:#1d3557" id="nav-ticket-tab" data-bs-toggle="tab" data-bs-target="#nav-ticket" type="button" role="tab" aria-controls="nav-ticket" aria-selected="false">Tickets</button>
        <button class="nav-link <?php if(isset($_GET["mistickets"])){echo "active";}else{echo "";}?>" style="border-radius: 10px; color:#1d3557" id="nav-mticket-tab" data-bs-toggle="tab" data-bs-target="#nav-mticket" type="button" role="tab" aria-controls="nav-mticket" aria-selected="false">Mis Tickets</button>
        <button class="nav-link <?php if(isset($_GET["perfil"])){echo "active";}?>" style="border-radius: 10px; color:#1d3557" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Perfil</button>
        <button class="nav-link" style="border-radius: 10px; color:#1d3557" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="false">Usuarios</button>
        <button class="nav-link" style="border-radius: 10px; color:#1d3557" id="nav-soporte-tab" data-bs-toggle="tab" data-bs-target="#nav-soporte" type="button" role="tab" aria-controls="nav-soporte" aria-selected="false">Soporte</button>
        <button class="nav-link float-end" style="border-radius: 10px; color:#1d3557" id="nav-nuevo-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Crear Ticket</button>
    </div>
</nav>
    <div class="tab-content" id="nav-tab">
        <br>
            <div class="tab-pane fade show <?php if(isset($_GET["perfil"]) OR isset($_GET["mistickets"])){echo "";}else{echo "active";}?>" id="nav-ticket" role="tabpanel" aria-labelledby="nav-ticket-tab" tabindex="0">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header shadow" style="background-color:#d6ccc2; color:black"> 
                        <a name="" id="" class="btn btn-primary float-start" href="" role="button">Nuevo Ticket</a>
                        <h6 class="float-end">Todos los Tickets</h6>
                    </div>
                    <div class="card-body p-3 mb-2 bg-light" style="color:black">
                        <div class="table-responsive-sm">
                            <table class="table p-3 mb-2 bg-light bg-gradient text-black">
                                <thead>
                                    <tr>                                           
                                        <th scope="col">Creado por</th>
                                        <th scope="col">NºTicket</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Título.Ticket</th>
                                        <th scope="col">Departamento</th>
                                        <th scope="col">Prioridad</th>
                                        <th scope="col">Creado el</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($registros_tbl_tickets as $registro) { ?>
                                    <tr class="">
                                        <td><?php echo $registro['nom'];?>&nbsp<?php echo $registro['ape'];?></td>
                                        <td><?php echo $registro['id_ticket'];?></td>
                                        <td><div class="text-center " style="background-color:
                                        <?php if($registro['estado'] == "Abierto"){
                                                                echo "#06d6a0";
                                                                }elseif($registro['estado'] == "En progreso"){
                                                                echo "#ffb703";
                                                                }elseif($registro['estado'] == "Cerrado"){
                                                                echo "#ed1c24";}?>"><?php echo $registro['estado'];?></div></td>
                                        <td><?php echo $registro['titulo'];?></td>
                                        <td><?php echo $registro['dep'];?></td>
                                        <td><div class="text-center " style="background-color:
                                        <?php if($registro['prioridad'] == "Muy Alta"){
                                                                echo "#c70505";
                                                                }elseif($registro['prioridad'] == "Alta"){
                                                                echo "#d5440b";
                                                                }elseif($registro['prioridad'] == "Media"){
                                                                echo "#de7f11";
                                                                }elseif($registro['prioridad'] == "Baja"){
                                                                echo "#edbf17";
                                                                }elseif($registro['prioridad'] == "Muy Baja"){
                                                                echo "#f9f91f";}?>"><?php echo $registro['prioridad'];?></div></td>
                                        <td><?php echo $registro['fecha_creacion'];?></td>
                                        <td>
                                            <a name="" id="" class="btn btn-success" href="<?php echo $url_base;?>secciones/tickets/ver.php" role="button">Ver</a>
                                            <a name="" id="" class="btn btn-danger" href="index.php?idticket=<?php echo $registro['id_ticket'];?>" role="button">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <div class="card-footer text-muted shadow" style="background-color: #d6ccc2;">
                        <p style="color:black">Total: #</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane <?php if(isset($_GET["mistickets"])){echo "active";}else{echo "";}?> " id="nav-mticket" role="tabpanel" aria-labelledby="nav-mticket-tab" tabindex="0">
            <div class="card" style="border-radius: 10px;">
                    <div class="card-header" style="background-color:#d6ccc2; color:black">
                        Mis Tickets
                    </div>
                    <div class="card-body p-3 mb-2 bg-light " style="color:black">
                        <div class="table-responsive-sm">
                            <table class="table p-3 mb-2 bg-light bg-gradient text-black" id="tabla_id">
                            <thead>
                                    <tr>                                          
                                        <th scope="col">Nombre</th>
                                        <th scope="col">NºTicket</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Descrip.Ticket</th>
                                        <th scope="col">Departamento</th>
                                        <th scope="col">Prioridad</th>
                                        <th scope="col">Creado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>Ricardo Andreu Gimeno</td>
                                        <td>T#0001</td>
                                        <td><div class="text-center " style="background-color: #d9ed92">Abierto</div></td>
                                        <td>Incidencia....</td>
                                        <td>Soporte</td>
                                        <td><div class="bg-danger text-center" style="color:azure">Alta</div></td>
                                        <td>10/01/2023</td>
                                        <td>
                                            <a name="" id="" class="btn btn-success" href="./secciones/tickets/ver.php" role="button">Ver</a>
                                            <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <div class="card-footer text-muted" style="background-color: #d6ccc2;">
                        <p style="color:black">Total: #</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane <?php if(isset($_GET["perfil"])){echo "active";}else{echo "";}?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="card" style="border-radius: 10px;">
                    <div class="card-header" style="background-color:#d6ccc2; color:black">
                        Datos Personales
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                    <label for="usuario" class="form-label">ID:</label>
                                    <input type="text" value="" class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" value="" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" value="" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Apellidos">
                            </div>
                            <div class="mb-3">
                                <label for="puesto" class="form-label">Puesto:</label>
                                <input type="txt" value="" class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Seleccione un puesto">
                            </div>
                            <div class="mb-3">
                                <label for="nombreusu" class="form-label">Nombre de Usuario:</label>
                                <input type="txt" value="" class="form-control" name="nombreusu" id="nombreusu" aria-describedby="helpId" placeholder="Escriba su nombre de usuario">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password:</label>
                                <input type= "password" value="" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Escriba su contraseña">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo:</label>
                                <input type="email" value="" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Escriba su correo">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Fecha de Alta:</label>
                                <input type="date" value="" class="form-control" name="fecha_alta" id="fecha_alta" aria-describedby="helpId" placeholder="Seleccione la fecha de alta">
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto:</label>
                                    </br>
                                    <img width="100" src="perfil.png" class="rounded" alt="" />
                                    </br>
                                    </br>
                                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" aria-describedby="fileHelpId">
                            </div>
                            <button type="submit" class="btn btn-success" disabled>Actualizar</button>
                            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
                        </form>
                    </div>
                    <div class="card-footer text-muted" style="background-color: #d6ccc2;">
                    <p>...</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab" tabindex="0">
            <div class="card" style="border-radius: 10px;">
                    <div class="card-header" style="background-color:#d6ccc2; color:black">
                        Usuarios
                    </div>
                    <div class="card-body p-3 mb-2 bg-light " style="color:black">
                        <div class="table-responsive-sm">
                            <table class="table p-3 mb-2 bg-light bg-gradient text-black" id="tabla_id">
                            <thead>
                                    <tr>                       
                                        <th scope="col">✓</th>                     
                                        <th scope="col">id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Puesto</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Contraseña</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Fecha de Alta</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row"><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
                                        <td>1</td>
                                        <td>Ricardo</td>
                                        <td>Andreu Gimeno</td>
                                        <td>Jefe</td>
                                        <td>its.andreu</td>
                                        <td> 12345</td>
                                        <td>ricardoandreugimeno@gmail.com</td>
                                        <td>10/01/2023</td>
                                        <td>
                                            <a name="" id="" class="btn btn-warning" href="#" role="button" disabled>Editar</a>
                                            <a name="" id="" class="btn btn-danger" href="#" role="button" disabled>Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <div class="card-footer text-muted" style="background-color: #d6ccc2;">
                        <p style="color:black">Total: #</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-soporte" role="tabpanel" aria-labelledby="nav-soporte-tab" tabindex="0">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header" style="background-color:#d6ccc2; color:black">
                        Soporte
                    </div>
                        Datos para contactar con soporte
                    <div class="card-footer text-muted" style="background-color: #d6ccc2;">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-nuevo" role="tabpanel" aria-labelledby="nav-nuevo-tab" tabindex="0">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header" style="background-color:#d6ccc2; color:black">
                        Nuevo Ticket
                    </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <textarea class="form-control" name="titulo" id="titulo" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="puesto" class="form-label">Departamento</label>
                                    <select class="form-select form-select-lg" name="puesto" id="puesto">
                                        <?php foreach ($puestos as $registro){ ?>   
                                            <option><?php echo $registro["nom_puesto"];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select class="form-select form-select-lg" name="estado" id="estado">
                                            <option>Abierto</option>
                                            <option>En Progreso</option>
                                            <option>Cerrado</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="prioridad" class="form-label">Prioridad</label>
                                    <select class="form-select form-select-lg" name="prioridad" id="prioridad">
                                        <option>Muy Alta</option>
                                        <option>Alta</option>
                                        <option>Media</option>
                                        <option>Baja</option>
                                        <option>Muy Baja</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a name="cancelar" id="cancelar" class="btn btn-danger" href="<?php echo $url_base;?>" role="button">Cancelar</a>
                            </form>
                        </div>
                    <div class="card-footer text-muted" style="background-color: #d6ccc2;">
                    </div>
                </div>
            </div>
    </div>
<?php
include("./templates/footer.php");
?>