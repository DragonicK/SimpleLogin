<?php $config = $content['config']; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $config->title ?></title>

        <link href="resources/css/login.css" type="text/css" rel="stylesheet">
        <link href="resources/css/alertbox.css" type="text/css" rel="stylesheet">
        <link href="resources/css/bootstrap.css" type="text/css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    </head>
    <body>

        <div id="main-container" class="container-fluid">

            <div id="div-alert">
                <span class="alert-close-btn" onclick="hideAlertBox()">&times;</span>
                <span id="alert-text">This is an alert box</span>
            </div>

            <div class="row">
                <div id="main-form" class="offset-md-3 col-md-4">             
                    <h2 style="text-align: center;"><?= $language->loginTitle ?></h2>
                    
                    <hr />

                    <div class="form-group">
                        <label><?= $language->username ?>:</label>
                        <input class="form-control" id="username" name="username" type="text">
                    </div>
    
                    <div class="form-group">
                        <label><?= $language->passphrase ?>:</label>
                        <input class="form-control" id="passphrase" name="passphrase" type="password">
                    </div>

                    <div class="div-button">   
                        <button onclick="validateLogin()" class="buttons btn btn-primary">
                            <?= $language->getIn ?>
                        </button>

                        <button onclick="redirectToRegister()" class="buttons btn btn-primary">
                            <?= $language->register ?>
                        </button>
                    </div>  
                </div>
            </div>
        </div>
        
        <script src="resources/js/bootstrap.js"></script>
        <script src="resources/js/alertbox.js"></script>
        <script src="resources/js/login.js"></script>
    </body>
</html>