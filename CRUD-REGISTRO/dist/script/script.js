initEliminar();

function initEliminar() {
    $(".btn_eliminar").click(function(e) {
      e.preventDefault();
      var id = $(this).attr("data-id");
      var boton = $(this)[0];
      boton.blur();

      var agree = confirm('¿Esta seguro que desea eliminar este usuario?', 
        function(){ 
          $.ajax({
            type: "POST",
            url: "eliminar_usuario.php",
            data: 'id='+id,
            success: function(data){
              alert(data, 1);
            }
          });
        }, 
        function(){ 
          alert('Cancelado')
        }
      );
    });
  }
