<?php $config = $content['config']; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $config->title ?></title>

        <link href="resources/css/register.css" type="text/css" rel="stylesheet">
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

            <h2 style="text-align: center;"><?= $language->registerTitle ?></h2>

            <hr />

            <div class="form-group">
                <label><?= $language->username ?>:</label>
                <span id="username-error"></span>
                <input class="form-control" id="username" name="username" type="text" oninput="onUsernameInput(this.value)">
            </div>

            <div class="form-group">
                <label><?= $language->passphrase ?>:</label>
                <span id="passphrase-error"></span>
                <input class="form-control" id="passphrase" name="passphrase" type="password" oninput="onPassphraseInput(this.value)">
            </div>

            <div class="form-group">
                <label><?= $language->repeatPassphrase ?>:</label>
                <span id="re-passphrase-error"></span>
                <input class="form-control" id="re-passphrase" name="re-passphrase" type="password" oninput="onRePassphraseInput(this.value)">
            </div>

            <div class="form-group">
                <label><?= $language->email ?>:</label>
                <span id="email-error"></span>
                <input class="form-control" id="email" name="email" type="email" oninput="onEmailInput(this.value)">
            </div>

            <div class="div-button">   
                <button onclick="sendRegister()" class="buttons btn btn-primary">
                    <?= $language->register ?>
                </button>

                <button onclick="redirectToLogin()" class="buttons btn btn-primary">
                    <?= $language->back ?>
                </button>
            </div>  
        </div>

        <script src="resources/js/bootstrap.js"></script>
        <script src="resources/js/alertbox.js"></script>
        <script src="resources/js/register.js"></script>

        <script>
            registerCannotBeEmpty = '<?= $language->registerCannotBeEmpty ?>';
            registerInvalidCharacter = '<?= $language->registerInvalidCharacter ?>';
            registerPassphraseInvalid = '<?= $language->registerPassphraseInvalid ?>';
            registerEmailInvalid = '<?= $language->registerEmailInvalid ?>';
        </script>
    </body>
</html>