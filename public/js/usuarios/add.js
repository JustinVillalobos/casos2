$( document ).ready(function() {
    $(".spin").css('display','none');
});
function  stringLength(value,max){
    if(value.length<=max){
        return true;
    }else{
        return false;
    }
}
function save(){
    let cantidadErrores=0;
    let nombre = $('#usuario').val();
    let valid=false;
    /**********************************  Datos Personales ******************************************/
    if(!stringLength(nombre,50)){
        $('#usuario + span').text("**Demasiados caracteres");
        cantidadErrores++;
        valid=true;
    }
    if(nombre.length<=0){
        $('#usuario + span').text("**Campo Requerido");
        cantidadErrores++;
        valid=true;
    }

    if(!valid){    
        $('#usuario + span').text("");
    }
    valid=false;

    let pass = $('#pass').val();
    /**********************************  Datos Personales ******************************************/
    if(!stringLength(pass,50)){
        $('#pass + span').text("**Demasiados caracteres");
        cantidadErrores++;
        valid=true;
    }
    if(pass.length<=0){
        $('#pass + span').text("**Campo Requerido");
        cantidadErrores++;
        valid=true;
    }

    if(!valid){    
        $('#pass + span').text("");
    }
    valid=false;

    let autor = $('#autor').val();
    /**********************************  Datos Personales ******************************************/
    if(!stringLength(autor,50)){
        $('#autor + span').text("**Demasiados caracteres");
        cantidadErrores++;
        valid=true;
    }
    if(autor.length<=0){
        $('#autor + span').text("**Campo Requerido");
        cantidadErrores++;
        valid=true;
    }

    if(!valid){    
        $('#autor + span').text("");
    }
    valid=false;
    if(cantidadErrores==0){
        
        var $avatarImage,$avatarInput,$avatarForm;
        $avatarInput = $("#logo");
        $avatarForm = $("#form");
        var formData = new FormData();
        if( $avatarInput[0].files.length==0){
            saveUser("");
            return;
        }
            $avatarImage = $avatarInput[0].files[0];
            
            if( $avatarInput[0].files>1){
                $("#logo + span").text("Solo se permite subir una imagen");
                $("#logo").val("")
                return;
            }
            if($avatarImage.size>1000000){
                $("#logo + span").text("Tamaño de la imagen muy grande");
                $("#logo").val("")
                return;
            }
            if($avatarImage.type!="image/jpeg" && $avatarImage.type!="image/png" && $avatarImage.type!="image/jpg" && $avatarImage.type!="image/svg" && $avatarImage.type!="image/gif"){
                $("#logo + span").text("Formato de archivo no aceptado, solo permitido PNG,JPG,JPEG,GIF,SVG");
                $("#logo").val("")
                return;
            }
            $("#logo + span").text("");
            $(".spin").css('display','block');
            formData.append('image',$avatarInput[0].files[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
              $.ajax({
                type:'POST',
                url:'../usuarios/imagen',
                data:formData,
                processData:false,
                contentType:false,
                success:function(data){
                    console.log(data);
                    saveUser(data);
            
                },
                error:function(data){
                    console.log("ERROR",data);
                    alertError("Error inesperado en el servidor");
                }
            
             });
    }
}
function saveUser(img){
    let nombre = $('#usuario').val();
    let autor = $('#autor').val();
    let pass = $('#pass').val();
    let form = {};
        form.usuario=nombre;
        form.pass=pass;
        form.autor=autor;
        form.typeUser=$('#typeuser').val();
        form.img=img;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $.ajax({
            type:'POST',
            url:'../usuarios/store',
            data:{usuario:form},
            success:function(data){
                $(".spin").css('display','none');
                let json = JSON.parse(data);
                if(json){
                    let rsp=alertTimeCorrect("Usuario Registrado exitosamente",function(response){
                        limpiarFormulario();
                      });
                }else{
                    alertError("Error inesperado al guardar el Usuario:El usuario ya existe");
                }
        
            },
            error:function(data){
                console.log(data);
                alertError("Error inesperado en el servidor");
            }
        
         });
}
function limpiarFormulario(){
    $('#usuario').val("");
    $('#pass').val("");
    $('#autor').val("");
    $('#typeuser').val($('#typeuser option:first').val());
    $('#logo').val("");
    $('#usuario + span').text("");
    $('#pass + span').text("");
    $('#autor + span').text("");
   
}

$('.btn-primary').click(function(){
    confirmacionEliminar("¿Desea reiniciar el formulario?", function(response) {
        if(response) {
            limpiarFormulario();
        }
      });
    
});
$('.btn-warning').click(function(){
    confirmacionEliminar("¿Desea Salir?", function(response) {
        if(response) {
          window.location ="../usuarios";
        }
      });
});

$('.btn-success').click(save);