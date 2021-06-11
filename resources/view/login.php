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
                    <h2 style="text-align: center;">Painel de Administração</h2>
                    <hr />

                    <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" name="username" type="text" v-model="username">
                    </div>
    
                    <div class="form-group">
                        <label>Password:</label>
                        <input class="form-control" name="passphrase" type="password" v-model="password">
                    </div>

                    <div class="divbutton">   
                        <button v-on:click="login()" class="loginbutton btn btn-primary">Entrar</button>
                    </div>  
                </div>
            </div>
        </div>
        
        <script src="resources/js/bootstrap.js"></script>
        <script src="resources/js/index.js"></script>
    </body>
</html>