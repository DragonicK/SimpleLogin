const RegistrationResult = {
    Success: 0,
    Invalid: 1,
    Database: 2,
    EmailExists: 3,
    UsernameExists: 4,
    PassphraseDoNotMatch: 5
};

var registerCannotBeEmpty = '';
var registerInvalidCharacter = '';
var registerPassphraseInvalid = '';
var registerEmailInvalid = '';

var username = {
    isInvalid: false,
    isGreen: false,
    isCrimson: false
};

var email = {
    isInvalid: false,
    isGreen: false,
    isCrimson: false
};

var passphrase = {
    isNotMatched: false,
    isGreen: false,
    isCrimson: false
};

function redirectToLogin() {
    window.location.href = 'administrator';
}

function getValueFromElement(id) {
    return document.getElementById(id).value;
}

function setElementText(id, text) {
    document.getElementById(id).innerHTML = text;
}

function setElementClass(id, name) {
    document.getElementById(id).className = name;
}

function onUsernameInput(value) {
    if (username.isInvalid) {
        if (value.length >= 4) {
            if (!username.isGreen) {
                username.isGreen = true;
                username.isCrimson = false;
                setElementClass('username-error', 'success');
            }
        }
        else {
            if (!username.isCrimson) {
                username.isGreen = false;
                username.isCrimson = true;
                setElementClass('username-error', 'error');   
            }      
        }
    }
}

function onPassphraseInput(value) {
    if (passphrase.isNotMatched) {
        checkBothPassphrase(value, 're-passphrase');
    }
}

function onRePassphraseInput(value) {
    if (passphrase.isNotMatched) {
        checkBothPassphrase(value, 'passphrase');
    }
}

function checkBothPassphrase(confirm, elementId) {
    var passphrase = document.getElementById(elementId).value;

    if (confirm !== passphrase) {
        if (!passphrase.isCrimson) {
            passphrase.isGreen = false;
            passphrase.isCrimson = true;

            setPassphraseErrorMessage();
        }
    }
    else if (confirm.length > 0 && passphrase.length > 0) {
        if (confirm === passphrase) {
            if (!passphrase.isGreen) {
                passphrase.isGreen = true;
                passphrase.isCrimson = false;

                setPassphraseSuccess();
            }           
        }
    }
}

function onEmailInput(value) {
    if (email.isInvalid) {
        if (value.length >= 4 && value.includes('@') && value.includes('.')) {
            if (!email.isGreen) {
                email.isGreen = true;
                email.isCrimson = false;
                setElementClass('email-error', 'success');
            }
        }
        else {
            if (!email.isCrimson) {
                email.isGreen = false;
                email.isCrimson = true;
                setElementClass('email-error', 'error');   
            }      
        }
    }
}

function getRegisterData() {
    return account = {
        username: getValueFromElement('username'),
        passphrase: getValueFromElement('passphrase'),
        confirm: getValueFromElement('re-passphrase'),
        email: getValueFromElement('email')
    };
}

function validateRegister(register) {
    let isValid = true;

    if (isEmpty(register.username)) {
        username.isInvalid = true;
        username.isGreen = false;
        username.isCrimson = true;

        setElementClass('username-error', 'error');
        setElementText('username-error', registerCannotBeEmpty);

        isValid = false;
    }

    if (isEmpty(register.passphrase)) {
        passphrase.isNotMatched = true;
        passphrase.isGreen = false;
        passphrase.isCrimson = true;

        setElementClass('passphrase-error', 'error');
        setElementText('passphrase-error', registerCannotBeEmpty);

        isValid = false;
    }

    if (isEmpty(register.confirm)) {
        passphrase.isNotMatched = true;
        passphrase.isGreen = false;
        passphrase.isCrimson = true;

        setElementClass('re-passphrase-error', 'error');
        setElementText('re-passphrase-error', registerCannotBeEmpty);

        isValid = false;
    }

    if (isEmpty(register.email)) {
        email.isInvalid = true;
        email.isGreen = false;
        email.isCrimson = true;

        setElementClass('email-error', 'error');
        setElementText('email-error', registerCannotBeEmpty);

        isValid = false;
    }
    else {
        if (!register.email.includes('@') || !register.email.includes('.')) {
            email.isInvalid = true;
            email.isGreen = false;
            email.isCrimson = true;
    
            setElementClass('email-error', 'error');
            setElementText('email-error', registerEmailInvalid);

            isValid = false;
        }
    }

    if (register.passphrase !== register.confirm) {
        setPassphraseErrorMessage();

        isValid = false;
    }
    else if (register.passphrase.length > 0 && register.confirm.length > 0) {
        if (register.passphrase === register.confirm) {
            setPassphraseSuccess();
        }
    }

    return isValid;
}

function parseResponse(response) {
    showAlertMessage(response.message);

    if (response.status == RegistrationResult.Success) {
        clear();
    }
}

function sendRegister() {
    let register = getRegisterData();

    if (validateRegister(register)) {
        axios.post('signup', {
            'username': register.username,
            'passphrase': register.passphrase,
            'confirmation': register.confirm,
            'email': register.email
            }
        ).then(function response(response) {
                parseResponse(response.data[0]); 
            }
        ).catch(function(error) {
                console.log(error); 
            }
        );
    }
}

function setPassphraseSuccess() {
    setElementClass('passphrase-error', 'success');
    setElementClass('re-passphrase-error', 'success');
}

function setPassphraseErrorMessage() {
    setElementClass('passphrase-error', 'error');
    setElementText('passphrase-error', registerPassphraseInvalid);

    setElementClass('re-passphrase-error', 'error');
    setElementText('re-passphrase-error', registerPassphraseInvalid);
}

function isEmpty(string) {
    return (!string || string.length === 0 || string === '');
}

function clear() {
    document.getElementById('username').value = '';
    document.getElementById('passphrase').value = '';
    document.getElementById('re-passphrase').value = '';
    document.getElementById('email').value = '';

    setElementText('username-error', '');
    setElementText('passphrase-error', '');
    setElementText('re-passphrase-error', '');
    setElementText('email-error', '');
}