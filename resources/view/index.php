<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web Application</title>

        <link href="resources/css/bootstrap.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    </head>
    <body>

        <div style="margin: 20px;" class="container-fluid">
            <div>
                <span>Bem-vindo: <?= $user->name ?></span>          
            </div>

            <form action="logout" method="POST">
                <div>
                    <button type="submit" style="width: 150px;" class="btn btn-primary">Sair</button>
                </div>
            </form>
       
        </div>
     
        <script src="resources/js/bootstrap.js"></script>
    </body>
</html>