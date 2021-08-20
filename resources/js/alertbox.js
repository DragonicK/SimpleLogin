function showAlertMessage(message) {
    document.getElementById('alert-text').innerHTML = message;
    document.getElementById('div-alert').style.display = 'block';
}

function hideAlertBox() {
    document.getElementById('div-alert').style.display = 'none';
}