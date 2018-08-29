
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function addSeller(){
  location.href='/vendedores/novo';
};

function editSeller(id){
  location.href= '/vendedores/editar/' + id
};

function listSeller(){
  location.href='/vendedores';
}
