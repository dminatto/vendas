
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

function addItem(){
  location.href='/estoque/novo';
};

function editItem(id){
  location.href= '/estoque/editar/' + id
};

function listItem(){
  location.href='/estoque';
}

function addSale(){
  location.href='/venda/novo';
};

function editSale(id){
  location.href= '/venda/editar/' + id
};

function listSale(){
  location.href='/venda';
};

function remove(item) {
    var tr = $(item).closest('tr');

    tr.fadeOut(400, function() {
      tr.remove();  
    });

    return false;
  };
