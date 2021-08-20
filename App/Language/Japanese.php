<?php

    namespace App\Language;

    class Japanese extends Language {

        function __construct() {
            $this->yes = 'はい';
            $this->no = 'いいえ';
            $this->back = '戻る'; 
            $this->loginTitle = '管理パネル';
            $this->registerTitle = '登録パネル';
            $this->register = '登録する';
            $this->username = 'アカウント';
            $this->email = 'メールアドレス';
            $this->passphrase = 'パスワード';
            $this->repeatPassphrase = '確認パスワード';
            $this->getIn = 'ログイン';

            $this->noname = '無名';

            $this->responseDatabase = 'データベースへの接続に失敗しました';
            
            $this->loginResponseInput = 'ユーザーまたはパスワードが無効です';
            $this->loginResponseInvalid = 'ユーザーまたはパスワードが正しくありません';   

            $this->registerCannotBeEmpty = 'データを入力する必要があります';
            $this->registerInvalidCharacter = '無効な文字が含まれています';
            $this->registerPassphraseInvalid = 'パスワードが間違っています';
            $this->registerEmailInvalid = '無効なメールアドレスが含まれています';

            $this->registerInvalidInput = '無効なデータが提供されました';
            $this->registerEmailExists = 'メールはすでに別のユーザー名で登録されています';
            $this->registerUsernameExists = 'このユーザー名はすでに登録されています';
            $this->registerSuccess = 'ユーザー名が登録されました';
        }
    }
?>