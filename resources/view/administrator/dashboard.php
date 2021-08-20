<?php $user = $content['user']; ?>
<?php $config = $content['config']; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $config->title ?></title>

        <link href="resources/css/bootstrap.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div style="background-color: coral;" class="nav-item dropdown">

                    <!-- ITEM -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Porta</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Morcego</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Porta</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Morcego</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div style="margin: 20px;" class="container-fluid">
            <div>
                <span>Bem-vindo: <?= $user->name ?></span>          
            </div>

            <form action="signout" method="POST">
                <div>
                    <button type="submit" style="width: 150px;" class="btn btn-primary">Sair</button>
                </div>
            </form>
        </div>

        <script src="resources/js/bootstrap.bundle.min.js"></script>  
        <script src="resources/js/bootstrap.bundle.js"></script>
        <script src="resources/js/bootstrap.js"></script>

    </body>
</html>