<?php include("../../templates/header.php");
include("./db.php");

?>

<div class="card" style="border-radius: 10px;">
    <div class="card-header" style="background-color:#90a955; color:black">
        <p class="fw-bold" style="display:inline">Nº Ticket</p>
    </div>
    <div class="card-body bg-light">
            <h4>Titulo del ticket</h4>
            <form action="" method="post" enctype="multipart/form-data"> 
                <div class="container">
                    <div class="table-responsive bg-light float-start">
                        <table class="table ">
                            <tr>
                                <td>Estado: </td>
                                <td>
                                    <div class="form-floating">
                                        <select>
                                            <option>Alta</option>
                                            <option>One</option>
                                            <option selected>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Prioridad: </td>
                                <td>
                                    <div class="form-floating">
                                        <select>
                                            <option>Alta</option>
                                            <option>One</option>
                                            <option selected>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Departamento: </td>
                                <td>
                                    <div class="form-floating">
                                        <select>
                                            <option>Alta</option>
                                            <option>One</option>
                                            <option selected>Two</option>
                                            <option>Three</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-25 p-3 bg-transparent float-start"></div>
                    <div class="table-responsive bg-light float-start">
                        <table class="table">
                            <tr>
                                <td>Usuario:</td>
                                <td>#usuario</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>#email</td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-25 p-3 float-start" style="width: max-content;">
                        <img class="float-end" src="perfil.png" height="100" width="100">
                    </div>
                </div>
                </div>
                <br>
                <div class="container">
                    <div class="card">
                        <div class="card-header" style="background-color:#d4e09b;">
                            <p class="fw-bold" style="display:inline">Ricardo - Andreu Gimeno</p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <p class="fw-bold" style="display:inline">Publicado el</p> 28/02/23 19:25   <p class="fw-bold" style="display:inline">(Titulo)</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lorem Ipsum is simply dummy text of the 
                                printing and typesetting industry. Lorem Ipsum has been 
                                the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled 
                                it to make a type specimen book. It has survived not only 
                                five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 
                                1960s with the release of Letraset sheets containing Lorem 
                                Ipsum passages, and more recently with desktop publishing 
                                software like Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <div class="container float-start">
                                <p class="fw-bold" style="display:inline">Adjuntos:</p>
                                <button type="button" class="btn btn-secondary btn-sm"><a href="#" style="color:aliceblue">archivo1.jpg</a></button> / 
                                <button type="button" class="btn btn-secondary btn-sm"><a href="#" style="color:aliceblue">archivo1.jpg</a></button> /
                                <button type="button" class="btn btn-secondary btn-sm"><a href="#" style="color:aliceblue">archivo1.jpg</a></button> /
                                <button type="button" class="btn btn-secondary btn-sm"><a href="#" style="color:aliceblue">archivo1.jpg</a></button> /
                            </div>
                        </div>
                        <div class="card-footer text-muted" style="background-color:#d4e09b;">
                        </div>
                    </div>
                    <br>
                    <p class=" fw-bold ps-3 ms-5">Respuestas:</p>
                    <div class="container">
                        <div class="card ms-5">
                            <div class="card-header" style="background-color:#caf0f8;">
                                <p class="fw-bold" style="display: inline;">Responde:</p> Ricardo Andreu Gimeno &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <p class="fw-bold" style="display:inline">Publicado el &nbsp</p>28/02/23 19:25   <p class="fw-bold" style="display:inline">(Titulo)</p>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Lorem Ipsum is simply dummy text of the printing
                                    and typesetting industry. Lorem Ipsum has been the industry's standard 
                                    dummy text ever since the 1500s, when an unknown printer took a galley
                                    of type and scrambled it to make a type specimen book. It has survived 
                                    not only five centuries, but also the leap into electronic typesetting, 
                                    remaining essentially unchanged. It was popularised in the 1960s with 
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more
                                    recently with desktop publishing software like Aldus PageMaker including 
                                    versions of Lorem Ipsum.</p>
                            </div>
                            <div class="container float-start">
                                <p class="fw-bold" style="display:inline">Adjuntos:</p>
                                <button type="button" class="btn btn-secondary btn-sm"><a href="#" style="color:aliceblue">archivo1.jpg</a></button> / 
                                <button type="button" class="btn btn-secondary btn-sm"><a href="#" style="color:aliceblue">archivo1.jpg</a></button> /
                            </div>
                            <br>
                            <div class="card-footer text-muted" style="background-color:#caf0f8;">
                            </div>
                        </div>
                        <br>
                        <div class="container ps-0 pe-5">
                            <div class="input-group has-validation ms-5 pe-5-5">
                                <textarea class="form-control" aria-label="With textarea" placeholder="Escriba una respuesta"></textarea>
                            </div>
                            <br>
                                <button type="submit" class="btn btn-success float-start ms-5">Enviar</button>
                            <br>
                        </div>
                    </div>
                </div>
            </form>
        <br>
    </div>
    <div class="card-footer text-muted" style="background-color: #90a955;"></div>
<?php include("../../templates/footer.php");?>