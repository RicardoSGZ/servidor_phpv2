<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="res/css/bootstrap.min.css"/>
        <title>Nube privada</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
            <a class="navbar-brand text-white" href="/nube">Nube Privada</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#menuhome">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="menuhome">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Apartado 1</a>
                </li>
            </ul>
            <form class="form-inline" action="search.php" method="get">
                <input class="form-control" name="fs" type="search" placeholder="Busca archivos..."
                aria-label="Buscar"/>
                <button class="btn btn-primary ml-sm-1 mt-1 mt-sm-0" 
                type="submit">Buscar</button>
            </form>
                </div>
        </nav>