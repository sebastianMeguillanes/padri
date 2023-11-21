$("#frmAcceso").on('submit',function(e) {
        e.preventDefault();
        logina=$("#logina").val();
        clavea=$("#clavea").val();

        $.post("../ajax/user_personal.php?op=5", 
        {"logina": logina, "clavea": clavea},
          function(data) {
            console.log(data);
            if (data==1) {
              $(location).attr("href","nose.php");            
            } else {
                console.log(data);
              Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'No coinciden.',
                footer: 'Cualquier información consulte con el administrador.'
              });
            }
          });
    });
