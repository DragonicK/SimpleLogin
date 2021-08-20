<?php

    namespace App\Language;

    class Portuguese extends Language {

        function __construct() {
            $this->yes = 'Sim';
            $this->no = 'Não';
            $this->back = 'Voltar';   
            $this->loginTitle = 'Painel de Administração'; 
            $this->registerTitle = 'Panel de Registro';
            $this->register = 'Cadastrar';
            $this->username = 'Usuário';
            $this->email = 'Email';
            $this->passphrase = 'Senha';
            $this->repeatPassphrase = 'Confirmação de Senha';
            $this->getIn = 'Entrar';

            $this->noname = 'Sem Nome';

            $this->responseDatabase  = 'A comunicação com o banco de dados falhou';
            
            $this->loginResponseInput = 'Informação inválida no nome de usuário ou senha';
            $this->loginResponseInvalid = 'Nome de usuário ou senha incorretos';   

            $this->registerCannotBeEmpty = 'Não pode estar vazio';
            $this->registerInvalidCharacter = 'Contém caracteres inválidos';
            $this->registerPassphraseInvalid = 'A senha e confirmação de senha não são iguais';
            $this->registerEmailInvalid = 'Insira um email válido';

            $this->registerInvalidInput = 'Os dados fornecidos são inválidos';
            $this->registerEmailExists = 'O email já está registrado para um outro usuário';
            $this->registerUsernameExists = 'Este nome de usuário já está cadastrado';
            $this->registerSuccess = 'O nome de usuário agora está registrado';
        }  
    }
?>