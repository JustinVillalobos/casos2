$("#demo").click(function(){
    let usuario = $("#usuario").val();
    let codigo =$("#randomCodigo").val();
    let idCuestionario =$("#idCuestionario").val();
    if(usuario==""){
        alertError("Usuario Requerido");
        return;
    }
    if(usuario.length>=100){
        alertError("Usuario con demasiadios caracteres");
        return;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        type:'POST',
        url:'./insertUser',
        data:{puntaje:{usuario:usuario,codigo:codigo,idCuestionario:idCuestionario}},
        success:function(data){

            if(data=='false')
            {
                alertError("Usuario ya registrado en sala");
                return;
            }
            movilversion();
            localStorage.setItem('usuario',usuario);
            localStorage.setItem('codigo',codigo);
            localStorage.setItem('idCuestionario',idCuestionario);
            $("#projector").remove();
            $(".header2").remove();
            $(".pseudo-body").remove();
            $("#case").css("display","block");
            $("body").css("background","white");
            $("html").css("background","white");
        },
        error:function(data){
            console.log(data);
            alertError("Error inesperado en el servidor");
        }
    
     });
    
 
});
$(window).on("resize", function (){
    movilversion();
})
function movilversion(){

    var viewport = {
        width : $(window).width(),
        height : $(window).height()
    };
    
    var width = viewport.width;
    var height = viewport.height;
    if(width<800){
        $(".desktop-tablet").css("display",'none');
        $(".movil-tablet").css("display",'block');
    }else{
        $(".desktop-tablet").css("display",'block');
        $(".movil-tablet").css("display",'none');
    }
    console.log(width,height);
}
function goToquestion(id,sol){
    console.log(id);
    $(".div-info-add-"+id).css("display","none");
    $(".div-slide-"+id).css("display","block");
    //div-info-add-
}
let clicks=[];
let isValidNext=false;
let cantidad=0;
let indice=0;
function desplaceTop(){
    $(".swip").animate({ scrollBottom: 0 }, "fast");
    $('.swip').scrollTop($('.swip')[0].scrollHeight);
  }

function showDataMovil(id){
   
    desplaceTop();
    let valid=true;
    clicks.forEach(element => {
        if(element==id){
            valid=false;
        }
    });
    if(valid){
        clicks.push(id);
    }
    console.log(clicks);
    if(clicks.length>=1){
        //let swiper2 = document.querySelector('.swiper').swiper;
        //swiper2.slideNext();
        isValidNext=true;
        $(".control").css("pointer-events","all");
        $(".spinnerDiv").css("display","block");
    }
}
function showData(id){
    
    
    
    $("#data"+id).css("display","block");
    $(".data"+id).css("display","block");
    $(".card-data").css("display","none");
    $('.card-data').fadeOut(); //fade out
    $("#show"+id).fadeIn(); //fade in div
    $(".show"+id).fadeIn();
    desplaceTop();
    let valid=true;
    clicks.forEach(element => {
        if(element==id){
            valid=false;
        }
    });
    if(valid){
        clicks.push(id);
    }
    console.log(clicks);
    if(clicks.length>=1){
        //let swiper2 = document.querySelector('.swiper').swiper;
        //swiper2.slideNext();
        isValidNext=true;
        $(".control").css("pointer-events","all");
        $(".spinnerDiv").css("display","block");
    }
}
function deletePrevious(index){
    let i = index-1;
    if(i<0){
        i=0;
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let p ={pregunta:preguntas[i],codigo: localStorage.getItem('codigo')}
    console.log("Previous ",p);
      $.ajax({
        type:'POST',
        url:'./setPuntaje',
        data:{puntaje:p},
        success:function(data){
            console.log(data);
            let json = JSON.parse(data);
            if(json!==false){
                let swiper2 = document.querySelector('.swiper').swiper;
                swiper2.slideTo(i+1);
                $(".div-res-btn .btn-res"+preguntas[i].pregunta).prop('disabled',true);
                isValidNext=false;
                $(".spinnerDiv").css("display","none");
                $(".div-slide-"+preguntas[i].pregunta).css("display","block");
                $(".div-info-add-"+preguntas[i].pregunta).css("display","block");
                $('.div-punt').fadeOut(); //fade out//fade in div
                $(".div-punt-"+preguntas[i].pregunta).fadeOut();
                $(".div-det-"+preguntas[i].pregunta).fadeOut();
                $(".text-response").removeClass("bg-primary2");
                respuesta=0;
                isReponse=false;
                console.log("Remove index ",i,preguntas);
                if(preguntas.length!=1){
                    preguntas=preguntas.filter((res)=>{return res.pregunta!=i});
                }else{
                    preguntas=[];
                }
                localStorage.setItem("preguntasContestadas",JSON.stringify(preguntas));
                
                console.log("Removido index ",i,preguntas);
                $(".spin").css("display","none");
            }
        },
        error:function(data){
            console.log(data);
            alertError("Error inesperado en el servidor");
        }
    
     });
}
function deletePresent(){
    let i = indice-1;
            if(i<0){
                i=0;
            }

            let p ={pregunta:preguntas[i],codigo: localStorage.getItem('codigo')}
            console.log("Present ",p);
            $.ajax({
                type:'POST',
                url:'./setPuntaje',
                data:{puntaje:p},
                success:function(data){
                    console.log(data);
                    let json = JSON.parse(data);
                    if(json!==false){
                        
                       
                        $(".div-res-btn .btn-res"+preguntas[i].pregunta).prop('disabled',true);
                            $(".div-slide-"+preguntas[i].pregunta).css("display","block");
                            $(".div-info-add-"+preguntas[i].pregunta).css("display","block");
                            $('.div-punt').fadeOut(); //fade out//fade in div
                            $(".div-punt-"+preguntas[i].pregunta).fadeOut();
                            $(".div-det-"+preguntas[i].pregunta).fadeOut();
                            $(".text-response").removeClass("bg-primary2");
                            console.log(preguntas[0],preguntas[1]);
                            preguntas=preguntas.filter((res)=>{return res.pregunta!=i});
                            console.log(preguntas,i);
                            deletePrevious(i);
                        
                        
                        
                        console.log("Removido index ",i,preguntas);
                    }
                },
                error:function(data){
                    console.log(data);
                    alertError("Error inesperado en el servidor");
                }
            
             });
    
}
function prev(){
    console.log("Prev");
    console.log("ISvalid next");
    $(".spin").css("display","block");
    let isEnteredPresent=true;
    if(isValidNext && preguntas.length>1){
        isEnteredPresent=false;
        deletePresent();
        return;
    }

		indice--;
		isReponse=false;
		if(indice>=0 && preguntas.length!=0){
			
             if(isEnteredPresent){
                
                if(preguntas.length!=0){
                    deletePrevious(indice);
                }   
                
             }
		}else{
            if(preguntas.length==0){
                let swiper2 = document.querySelector('.swiper').swiper;
                        swiper2.slideTo(indice);
                        
            }
        }
        if(indice==0){
            isValidNext=true;
            $(".spin").css("display","none");
        }
        if(indice<0){
            indice=0;
            
        }
        console.log("Pantalla a devolver",indice);
       
}
function confettiAnimacionNext(){
   /* let confetti = new Confetti('btn-next');
    confetti.setCount(75);
    confetti.setSize(1);
    confetti.setPower(25);
    confetti.setFade(false);
    confetti.destroyTarget(false);*/
  
}
function confettiAnimacionDemo(){
    /*let confetti = new Confetti('demo');
    confetti.setCount(75);
    confetti.setSize(1);
    confetti.setPower(25);
    confetti.setFade(false);
    confetti.destroyTarget(false);*/
  
}
function setCards(preguntas){
    let dom="<div class='row'>";

         dom+="<div class='col-sm-12 d-flex align-items-center card-custom-final cusstom-d' style=' height: 80vh;position:absolute;z-index:2'>";
           dom+="<div class='row'>";
            dom+="<div class='col-sm-12'>";
                dom+="<h1 style='margin:0;font-size:36px;'>¡Gracias por Participar!</h1>";
            dom+="</div>";
            dom+="<div class='col-sm-12 d-flex justify-content-center content-btn'>";        
                dom+="<button class='btn btn-primary-2 text-white btn-finally' onClick='reinitQuest()' style='width:150px;height:75px;font-size:16px'>VOLVER AL INICIO</button>";
            dom+="</div>";
           dom+="</div>";
        dom+="</div>";
        dom+="<div class='col-sm-12 d-flex justify-content-center card-custom-final  custtom-f' style='margin-top:15px; position:absolute'>";
            dom+="<img src='"+$("#final").attr('src')+"' style='width:100%'>";
        dom+="</div>";
    dom+="</div>";
    
    return dom;
}
function reinitQuest(){
    window.location ="./caso_estudio?code="+$("#idCuestionario").val();
}
function next(){
    isReponse=false;
    if(!isValidNext){
        if(indice==0){
            alertError("Lo sentimos, debe visualizar las cuatro secciones para continuar");
        }else{
            alertError("Lo sentimos, debe completar la pregunta para poder continuar");
        }
       
        return;
    }
  
    clearInterval(intervalGrap);
    intervalGrap =null;
    if(isValidNext && indice<cantidad){
        
        let swiper2 = document.querySelector('.swiper').swiper;
        swiper2.slideNext();
        $(".control").css("pointer-events","all");
        $(".spinnerDiv").css("display","none");
        if(indice!=0){
            let i=indice;
            $(".div-res-btn .btn-res"+i).prop('disabled',true);
            $(".spinnerDiv").css("display","none");
            $(".div-info-add-"+i).css("display","block");
            $(".div-slide-"+i).css("display","block");
        
            $('.div-punt').fadeOut(); //fade out//fade in div
            $(".div-punt-"+i).fadeOut();
            console.log("Volver visible");
        }else{
            let i=indice;
            $(".div-res-btn .btn-res"+0).prop('disabled',true);
            $(".spinnerDiv").css("display","none");
            $(".div-info-add-0").css("display","block");
            $(".div-slide-0").css("display","block");
        
            $('.div-punt').fadeOut(); //fade out//fade in div
            $(".div-punt-0").fadeOut();
        }
        
        indice++;

    }else{
        $(".div-res-btn .btn-res").prop('disabled',true);

        let html="";
        html = setCards(preguntas);
        $("#body-slide").html(html);
        localStorage.setItem("preguntasContestadas","[]");
        localStorage.setItem('usuario',"");
        localStorage.setItem('codigo',"");
        localStorage.setItem("randomCodigo",""); 
        $(".control").css("pointer-events","none");
        $(".spinnerDiv").css("display","none");
        console.log($(".img-title").attr("src"));
        //$(".card-custom-final").html();
        let swiper2 = document.querySelector('.swiper').swiper;
        swiper2.slideNext();
        if(indice!=0){
            console.log("Volver 2");
            let i=indice-1;
                $(".div-res-btn .btn-res"+preguntas[i].pregunta).prop('disabled',true);
            $(".spinnerDiv").css("display","none");
            $(".div-info-add-"+preguntas[i].pregunta).css("display","block");
            $(".div-slide-"+preguntas[i].pregunta).css("display","block");
            
            $('.div-punt').fadeOut(); //fade out//fade in div
            $(".div-punt-"+preguntas[i].pregunta).fadeOut();
            $("button").css("display","none");
        }
        indice++;
        localStorage.setItem("preguntasContestadas","[]");
        localStorage.setItem('usuario',"");
        localStorage.setItem('codigo',"");
        localStorage.setItem("randomCodigo",""); 
    }
    if(indice>cantidad){
        $(".div-res-btn .btn-res").prop('disabled',true);

    }

    isValidNext=false;
   // $(".control").css("pointer-events","none");
    $(".spinnerDiv").css("display","none");
    confettiAnimacionNext();
}
let preguntas=[];
let respuesta=0;
function response(pregunta,res){
    if(isReponse){
        return;
    }
    
     $(".text-response").removeClass("bg-primary2");
     $(".response"+pregunta+""+res).addClass("bg-primary2");
     $(".div-res-btn .btn-res"+pregunta).prop('disabled',false);
     respuesta=res;
   
}
let isReponse = false;
function confettiAnimacion(id,res){
   /* let confetti = new Confetti('response'+id+""+res);
    confetti.setCount(75);
    confetti.setSize(1);
    confetti.setPower(25);
    confetti.setFade(false);
    confetti.destroyTarget(false);
    document.getElementsByClassName('response'+id+""+res)[0].click();*/
}
let numeroPregunta=0;
let intervalGrap=null;

function graphRefresh(p,pregunta){
    intervalGrap = setInterval(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

          $.ajax({
            type:'POST',
            url:'./refreshData',
            data:{puntaje:p},
            success:function(data){
               
                try {
                    let json = JSON.parse(data);
                    if(json!=false){
                    
                        let l = labels(json.pr[0].respuestas);
                        let d = getData(json.pr[0].puntajes_preguntas,json.pr[0].respuestas);
                        let data_chart = {labels:l,data:d};
                        let pre = json.preguntas;
                        //chart(data_chart,0,pre,pregunta);
                        numeroPregunta++;
                    }
                } catch (error) {
                    
                }
                
            }
        });
    }, 1000);
    
}
function responseQuestion(pregunta,solucion){
    if(isReponse){
        return;
    }
    let p ={pregunta:pregunta,respuesta:respuesta,isCorrecto:false,codigo: localStorage.getItem('codigo')};
    console.log(respuesta,solucion);
    if(respuesta==solucion){
       confettiAnimacion(pregunta,solucion);
        let element = document.getElementById("correct");
        let isPlaying =$("#isEnabledAudio").val();
        if(isPlaying==1){
            element.volume = document.getElementById("mislider").value;
        
            element.play();
        }
        
         p ={pregunta:pregunta,respuesta:respuesta,isCorrecto:true,codigo: localStorage.getItem('codigo')};
        let rsp=alertTimeCorrect2("¡Muchas gracias!<br> Respuesta recibida",function(response){
            $(".spin").css("display","block");
            setTimeout(() => {
                $(".spin").css("display","none");
            }, 1000);
           });
        preguntas.push(p);
    }else{
        let element = document.getElementById("correct");
        let isPlaying =$("#isEnabledAudio").val();
        if(isPlaying==1){
            element.volume = document.getElementById("mislider").value;
        
            element.play();
        }
        
        let rsp=alertTimeCorrect2("¡Muchas gracias!<br> Respuesta recibida",function(response){
            $(".spin").css("display","block");
            setTimeout(() => {
                $(".spin").css("display","none");
            }, 1000);
        });
        p ={pregunta:pregunta,respuesta:respuesta,isCorrecto:false,codigo: localStorage.getItem('codigo')};
        preguntas.push(p);
    }
    console.log(p,preguntas,indice);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
      $.ajax({
        type:'POST',
        url:'./updatePuntaje',
        data:{puntaje:p},
        success:function(data){

            console.log(data);
            let json = JSON.parse(data);
            if(json!=false){

                let l = labels(json.pr[0].respuestas);
                let d = getData(json.pr[0].puntajes_preguntas,json.pr[0].respuestas);
                let data_chart = {labels:l,data:d};
                let pre = json.preguntas;
                chart(data_chart,0,pre,pregunta);
                graphRefresh(p,pregunta);
                numeroPregunta++;
            }
            respuesta=0;
            if(indice<cantidad){
               isValidNext=true;
                $(".control").css("pointer-events","all");
                $(".spinnerDiv").css("display","block");
                $(".div-res-btn .btn-res"+pregunta).prop('disabled',true);
                $(".spinnerDiv").css("display","block");
                $(".div-slide-"+pregunta).css("display","none");
                $('.div-punt').fadeOut(); //fade out//fade in div
                $(".div-punt-"+pregunta).fadeIn();
                $(".spin").css("display","none");
                setTimeout(() => {
                    $(".spin").css("display","none");
                }, 1500);
                localStorage.setItem("preguntasContestadas",JSON.stringify(preguntas));
            }else{
                isValidNext=true;
                $(".div-res-btn .btn-res"+pregunta).prop('disabled',true);
                $(".div-slide-"+pregunta).css("display","none");
                $('.div-punt').fadeOut(); //fade out//fade in div
                $(".div-punt-"+pregunta).fadeIn();
                $(".control").css("pointer-events","all");
                $(".spinnerDiv").css("display","block");
                $(".spin").css("display","none");
                setTimeout(() => {
                    $(".spin").css("display","none");
                }, 1500);
            }
            isReponse=true;
        },
        error:function(data){
            console.log(data);
            alertError("Error inesperado en el servidor");
        }
    
     });
    
    
}
function labels( long){
    let labels=[];
    let options="ABCD";
    for(let i=0;i<long;i++){
        labels.push(options.charAt(i));
    }
    return labels;
}
function getData(res,long){
    let data=[];
    let  p =[0,0,0,0];
  
   //p[indexP]=res[index].respuesta_count;
   for(let n=0;n<p.length;n++){
        let encontrado=0;
        for(let i=0;i<res.length;i++){
            if(n==res[i].respuesta){
                p[n]=res[i].respuesta_count;
                encontrado=1;
            }
        }
        if(encontrado==0){
            p[n]=0;
        }
    }
    let total=0;
    for(let j=0;j<p.length;j++){
        total=total+p[j];   
    }
    for(let k=0;k<long;k++){
      
        let v = ((p[k]*100)/total).toFixed(2);
        data.push(v);
        
    }
  
    return p;
}
function chart(graph,index,preguntas,indexx){
    let new_index="";
    let i = index+1;
    if(indexx<9){
        new_index ="0"+(indexx+1);
    }else{
        new_index =""+(indexx+1);
    }
     
    let html="";
    let total=0;
    for(let j=0;j<graph.data.length;j++){
        total=total+graph.data[j];   
    }
    
        html+="<div class='col-sm-12 d-flex justify-content-center' style='margin-top:25px;'>"
            html+="<div class='card'>";
                html+='<div class="card-body">';
                    html+='<div class="row">';
                        html+='<div class="col-sm-12">';
                                html+="<strong>Pregunta "+new_index+":"+preguntas[index].pregunta+"</strong>";
                        html+="</div>";
                       let percentaje= (((graph.data[0])*100)/total).toFixed(2);
                        html+='<div class="col-sm-12" style="margin-top:5px;">';
                                html+='<div class="progress" style="height:60px;background: white;">';
                                    html+='<div class="progress-bar bg-light2" style="width:'+percentaje+'%;position:;"></div>';
                                    html+='<div class="text-pregunta" style="position:absolute;"><div class="row"><div class="col-sm-10"><textarea rows="4" disabled>'+preguntas[index].respuesta1+'</textarea></div><div class="col-sm-2">'+percentaje+'%</div></div></div>';
                                html+=' </div>';
                        html+="</div>";
                        percentaje= (((graph.data[1])*100)/total).toFixed(2);
                        html+='<div class="col-sm-12" style="margin-top:5px;">';
                                html+='<div class="progress" style="height:60px;background: white;">';
                                    html+='<div class="progress-bar bg-light2" style="width:'+percentaje+'%;position:;"></div>';
                                    html+='<div class="text-pregunta" style="position:absolute;"><div class="row"><div class="col-sm-10"><textarea rows="4" disabled>'+preguntas[index].respuesta2+'</textarea></div><div class="col-sm-2">'+percentaje+'%</div></div></div>';
                                html+=' </div>';
                        html+="</div>";

                        if(preguntas[index].respuesta3!=""){
                            percentaje= (((graph.data[2])*100)/total).toFixed(2);
                            html+='<div class="col-sm-12" style="margin-top:5px;">';
                                html+='<div class="progress" style="height:60px;background: white;">';
                                    html+='<div class="progress-bar bg-light2" style="width:'+percentaje+'%;position:;"></div>';
                                    html+='<div class="text-pregunta" style="position:absolute;"><div class="row"><div class="col-sm-10"><textarea rows="4" disabled>'+preguntas[index].respuesta3+'</textarea></div><div class="col-sm-2">'+percentaje+'%</div></div></div>';
                                html+=' </div>';
                            html+="</div>"
                        }
                        
                        if(preguntas[index].respuesta4!=""){
                            percentaje= (((graph.data[3])*100)/total).toFixed(2);
                            html+='<div class="col-sm-12" style="margin-top:5px;">';
                                html+='<div class="progress" style="height:60px;background: white;">';
                                    html+='<div class="progress-bar bg-light2" style="width:'+percentaje+'%;position:;"></div>';
                                    html+='<div class="text-pregunta" style="position:absolute;"><div class="row"><div class="col-sm-10"><textarea  rows="4" disabled>'+preguntas[index].respuesta4+'</textarea></div><div class="col-sm-2">'+percentaje+'%</div></div></div>';
                                html+=' </div>';
                            html+="</div>"
                        }
                html+="</div>";
                    html+="</div>";
                html+="</div>";
            html+="</div>";
        html+="</div>";

        $(".div-punt-"+(indexx)+" .data_table").html(html);


}
function showDetails(key){
    $('.div-det').fadeOut(); //fade out//fade in div
    $(".div-det-"+key).fadeIn(); 
}
$( document ).ready(function() {
   
    confettiAnimacionDemo();
   cantidad = parseInt($("#cantidad").val());
   confettiAnimacionNext();
   let randomCodigo = $("#randomCodigo").val();
   localStorage.setItem("randomCodigo",randomCodigo);
   let swiper2 = document.querySelector('.swiper').swiper;
   let isEntered=false;
   if(localStorage.getItem("preguntasContestadas")!=undefined){
    if(localStorage.getItem("preguntasContestadas")!="[]"){
        if(localStorage.getItem("preguntasContestadas")!=""){
            if(localStorage.getItem('idCuestionario')!=$("#idCuestionario").val()){
                localStorage.setItem('codigo','');
                localStorage.setItem('usuario','');
                localStorage.setItem('idCuestionario',$("#idCuestionario").val());
                localStorage.setItem('preguntasContestadas','[]');
                window.location ="./caso_estudio?code="+$("#idCuestionario").val();
            } 
            $("#projector").remove();
            $(".header2").remove();
            $(".pseudo-body").remove();
            $("#case").css("display","block");
            $("body").css("background","white");
            $("html").css("background","white");
            isEntered=true;
            preguntas = JSON.parse(localStorage.getItem("preguntasContestadas"));
            
            if((preguntas.length+1)<=cantidad){
                movilversion();
                swiper2.slideTo(preguntas.length+1);
                indice = preguntas.length+1;
            }
            
        }
    }
   }
   if(isEntered==false){
    if(localStorage.getItem("usuario")!=undefined){
        if(localStorage.getItem("usuario")!=""){
            
            if(localStorage.getItem('idCuestionario')!=$("#idCuestionario").val()){
                localStorage.setItem('codigo','');
                localStorage.setItem('usuario','');
                localStorage.setItem('idCuestionario',$("#idCuestionario").val());
                localStorage.setItem('preguntasContestadas','[]');
                window.location ="./caso_estudio?code="+$("#idCuestionario").val();
            } 
            movilversion();
            $("#projector").remove();
            $(".header2").remove();
            $(".pseudo-body").remove();
            $("#case").css("display","block");
            $("body").css("background","white");
            $("html").css("background","white");
        }
    }
   }

});
function reinitSala(){
    localStorage.setItem('codigo','');
    localStorage.setItem('usuario','');
    localStorage.setItem('idCuestionario',$("#idCuestionario").val());
    localStorage.setItem('preguntasContestadas','[]');
    window.location ="./caso_estudio?code="+$("#idCuestionario").val();
}

$(".swiper img").click(function(e){

    $("#visorI").attr('src',$(this).attr('src'));
    $("#visor").modal("show");
})