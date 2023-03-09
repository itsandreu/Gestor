<?php
$url_base="http://localhost/Gestor/"
?>
<!doctype html>
<html lang="es">
<head>
    <title>Gestor de Tickets</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body style="background-color: #f4f1de;">
    <div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light shadow p-3 mb-5 bg-gradient text-white rounded" style="border-top-left-radius: 10px; border-top-right-radius: 10px; background-color:#2a9d8f;">
            <div class="container-fluid">
            <a class="navbar-brand position-relative" href="<?php echo $url_base?>index.php"><img src="ERRE.png" width="60" height="50" class="d-inline-block align-top" alt="Inicio">© TICKETS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="float-end">
                    <div class="navbar-nav">
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="perfil.png" class="d-inline-block align-top" width="30" height="30" alt="Perfil">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li ><a class="dropdown-item" href="<?PHP echo $url_base?>index.php?perfil">Perfil</a></li>
                                        <li><a class="dropdown-item" href="<?PHP echo $url_base?>index.php?mistickets">Mis Tickets</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <a class="nav-link active" style="color:azure" aria-current="page" href="<?php echo $url_base?>login.php">Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<main>