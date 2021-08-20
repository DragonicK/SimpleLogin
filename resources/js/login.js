const ResponseResult = {
    'Input' : 0,
    'Sucess' : 1,
    'Database' : 2,
    'Invalid' : 3,
};

function getValueFromElement(id) {
    return document.getElementById(id).value;
}

function getAccountData() {
    return account = {
        username: getValueFromElement('username'),
        passphrase: getValueFromElement('passphrase')
    };
}

function parseResponse(response) {
    if (response.status != ResponseResult.Sucess) {   
        showAlertMessage(response.message);
    }

    if (response.status == ResponseResult.Sucess) {
        window.location.href = 'dashboard';
    }
}

function validateLogin() {
    let account = getAccountData();

    axios.post('signin', {
        'username': account.username,
        'passphrase': account.passphrase
    }
    ).then(function(response) {
        parseResponse(response.data[0]);   
    }
    ).catch(function(error) {
        console.log(error);     
    });     
}

function redirectToRegister() {
    window.location.href = 'register';
}