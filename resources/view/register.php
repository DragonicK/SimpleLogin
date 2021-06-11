<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Web Application</title>

        <link href="resources/css/site.css" rel="stylesheet">
        <link href="resources/css/bootstrap.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    </head>
    <body>
    <div id="app" class="container-fluid">
            <div class="row">

                <div id="mainform" class="offset-md-3 col-md-4">
                    <h2 style="text-align: center;">Cadastrar Novo Usuário</h2>
                    <hr />

                    <form action="signup" method="POST">
                        <div class="form-group">
                            <label>Username:</label>
                            <input class="form-control" name="username" type="text">
                        </div>
    
                        <div class="form-group">
                            <label>Password:</label>
                            <input class="form-control" name="passphrase" type="password">
                        </div>

                        <div class="divbutton">   
                            <button class="loginbutton btn btn-primary">Cadastrar</button>
                        </div> 
                      
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>