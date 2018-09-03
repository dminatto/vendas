
function iniciaAjax() {
    var req;
    
    try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        } catch(e){
            try {
                req = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(ex){
                try {
                    req = new XMLHttpRequest();
                } catch(exc) {
                    alert("Esse browser não tem recursos para uso do Ajax!");
                    req = null;
                }
            }
        }
    return req;
};

