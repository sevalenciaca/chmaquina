$( document ).ready(function() {

    $("#mostrar_fileupload_contrato").click(function(){
        $('#ArchivoContrato').toggle(1000,function() {

        });
    });
});

inputmemoria.oninput = function () {
    if (this.value.length > 4) {
        this.value = this.value.slice(0,4); 
    }
}

inputkernel.oninput = function () {
    if (this.value.length > 4) {
        this.value = this.value.slice(0,4); 
    }
}

function ocultar(){
    document.getElementById('obj1').style.display = 'none';
}

function mostrar(){
    document.getElementById('obj2').style.display = 'block';
}