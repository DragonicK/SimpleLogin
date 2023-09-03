<?php $user = $content['user']; ?>
<?php $config = $content['config']; ?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $config->title ?></title>

        <link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="resources/css/dashboard.css" rel="stylesheet" type="text/css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    </head>

    <body>

    <header>
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-brand">
                    
                    <a class="navbar-brand" href="dashboard">Brand</a>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">

                            <li class="nav-item active">
                                <a class="nav-link" href="#">Link</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Configuration
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="meuDropdown">
                                    <li><a href="#" class="dropdown-item">Settings</a></li>
                                </ul>
                            
                            </li>        
                        </ul>
                    </div>

                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main>
    <div style="margin: 20px;" class="container-fluid">
            <div>
                <span>Bem-vindo:
                    <?= $user->name ?></span>
            </div>

            <form action="signout" method="POST">
                <div>
                    <button type="submit" style="width: 150px;" class="btn btn-primary">Sair</button>
                </div>
            </form>
        </div>
    </main>
       
    <script src="resources/js/bootstrap.js"></script>

    </body>

</html>