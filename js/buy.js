(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

document.getElementById("login-organ").onchange = (function () {

    document.getElementById("login-user").classList.toggle("display-none");
    document.getElementById("login-organization").classList.toggle("display-none");

})

document.getElementById("signup-organ").onchange = (function () {

    document.getElementById("signup-user").classList.toggle("display-none");
    document.getElementById("signup-organization").classList.toggle("display-none");

})
