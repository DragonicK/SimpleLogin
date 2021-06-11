const ResponseResult = {
    'Input' : 0,
    'Sucess' : 1,
    'Database' : 2,
    'Invalid' : 3,
};

function parseResponse(response) {
    if (response == ResponseResult.Input) {
        alert('Invalid input data');
     }

     if (response == ResponseResult.Sucess) {
        window.location.href = 'index';
     }

     if (response == ResponseResult.Database) {
        alert('Failed to connect to database');
     }

     if (response == ResponseResult.Invalid) {
        alert('Invalid username or password');
     }
}

var app = new Vue({
    el: '#app',
    data: {
        username: '',
        password: '',
    },
    methods: {
        login: function() {
            if (this.username != '' && this.password != '') {
                axios.post('signin', {
                    'username': this.username,
                    'passphrase': this.password
                }
                ).then(function(response) {
                    parseResponse(response.data[0].status);   
                }
                ).catch(function(error) {
                    console.log(error);     
                });     
            }
            else {
                alert('Please, enter username and password');
            }
        }
    }
});