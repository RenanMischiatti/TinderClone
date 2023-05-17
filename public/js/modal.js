$(document).ready( function () {
    
    $.fn.abrirModal = function(html) {
        $('#areaModal').html(html);

        $('#modalModular').modal('show');
      };


      
})