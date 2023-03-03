
<?php $__env->startSection('content'); ?>  
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link href="<?php echo e(URL::asset('css/caso.css')); ?>" rel="stylesheet">

<style>
 
</style>
 <canvas id="projector">Your browser does not support the Canvas element.</canvas>
 <div class="flex-container custom" style="width:100%;height:100vh;padding-left:25px;">
    <div class="header d-flex justify-content-start header2" style="margin-top:55px;">
      <div class="row" style="width: 100%;"> 
        <div class="col-sm-12 d-flex justify-content-center">
            <img src="<?php echo e(URL::asset('assets/logo.png')); ?>" style="width:350px;"/>
        </div>
      </div>
    </div>
    <div class="pseudo-body">
      <div class="row">
         <div class="col-sm-12 d-flex justify-content-center text-center text-white" style="margin-bottom:25px;">
          <h2 style="max-width:550px;"><?php echo e($cuestionario->titulo); ?></h2>
        </div>
        <div class="col-sm-12"></div>
        <div class="col-sm-12 d-flex justify-content-center text-center">
          <input type="text" class="form-control input" id="usuario" style="width:230px;" placeholder="Ingresa un usuario" />
        </div>
        <div class="col-sm-12"></div>
        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:15px;">
           <div class="btn btn-three" id="demo" style="width:130px;">
            <span>Iniciar</span>
          </div>
        </div>
      </div>
      
      
    </div>
    <div class="" id="case" style="display:none;">
        <div class="header">
           <div class="row">
                <?php if($user->typeuser!=1): ?>
                <div class="col-sm-3 col-md-2 col-lg-2">
                    <img src="<?php echo e(URL::asset('assets/logo.png')); ?>" style="width:200px;height:90px;"/>
                </div>
                <?php endif; ?>
                <?php if($user->typeuser==1): ?>
                <div class="col-sm-3  col-md-2 col-lg-2">
                    
                    <img src="<?php echo e(URL::asset(''.$user->img)); ?>" style="width:200px;max-height:90px;"/>
                   
                </div>
                <?php endif; ?>
                <div class="col-sm-6  col-md-7 col-lg-7"></div>
                <div class="col-sm-3 col-md-3 col-lg-3 d-flex justify-content-end align-items-center" style="padding-right:25px;">
                <div class=" control2 dropdown" >
                    <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-music"></i></div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="    left: -100px!important;">
                      <input type="range" min="0" max="1" value="1" step="0.1" id="mislider"><span id="valor"></span>
                    </div>
                </div>
                <div class=" control left-control" id="btn-next" onclick="prev()">

                        <span><i class="fa fa-arrow-left"></i></span>
                    </div>
                    <div class=" control right-control" id="btn-next" onclick="next()">
                        <svg class="spinnerDiv" viewBox="0 0 50 50">
                            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                        </svg>
                        <span><i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
           </div>
        </div>
                <div class='swiper-bg'>

                </div>
                <div class='swiper-fe'>
                   <div class="row swip">
                        <div class="col-sm-4 d-flex align-items-center">
                            <div class="row row-data-info" style="height: 75vh;">
                                <div class="col-sm-12 d-flex justify-content-start" style="padding-top:0px;padding-left:55px;">
                                    <h3 id="title"><i class="fa fa-user-md text-primary" aria-hidden="true"></i>Net<span class="text-primary2">Challenge</span></h3>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-start c-i" style="margin-top:5%;width:250px;height: 250px;    padding-left: 50px;">
                                    <?php $img=strlen($cuestionario->imagen);?>
                                    <?php if($img < 3): ?>
                                        <img src="<?php echo e(URL::asset('assets/avatars/avatar'.$cuestionario->imagen.'.png')); ?>" style="width:250px;height: 250px;"/>
                                    <?php endif; ?>
                                    <?php if($img >= 3): ?>
                                        <img src="<?php echo e(URL::asset($cuestionario->imagen)); ?>" style="width:250px;height: 250px;"/>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-start moreInfoTitle" style="margin-top:5%;padding-left:65px;">
                                        <label><strong>Información Adicional:</strong></label>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-start moreInfo" style="padding-top:0x;padding-left:65px;">
                                        <label><strong>Género:</strong>
                                            <?php if($cuestionario->genero=="0"): ?>
                                                Hombre
                                            <?php endif; ?>
                                            <?php if($cuestionario->genero!="0"): ?>
                                                Mujer
                                            <?php endif; ?>

                                        </label>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-start moreInfo" style="padding-top:0px;padding-left:65px;">
                                        <label><strong>Edad:</strong><?php echo e($cuestionario->edad); ?></label>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-start moreInfo" style="padding-top:0px;padding-left:65px;">
                                        <label><strong>Trabajo:</strong><?php echo e($cuestionario->trabajo); ?></label>
                                    </div>
                                    <?php if($cuestionario->genero=="0"): ?>
                                                
                                            <?php endif; ?>
                                            <?php if($cuestionario->genero!="0"): ?>
                                            <div class="col-sm-12 d-flex justify-content-start moreInfo" style="padding-top:0px;padding-left:60px;">
                                                <label><strong>¿Tiene Hijos?:</strong>
                                                    <?php if($cuestionario->hijos=="" || $cuestionario->hijos=="0"): ?>
                                                        No
                                                    <?php endif; ?>
                                                    <?php if($cuestionario->hijos!="" && $cuestionario->hijos!="0"): ?>
                                                        $cuestionario->hijos
                                                    <?php endif; ?>
                                                </label>
                                            </div>
                                            <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8" id="body-slide">
                            
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide"  style="overflow-y: auto;overflow-x:none;">
                                    <div class="desktop-tablet">
                                    <div class="row div-row-slid-init d-flex justify-content-center" style="">
                                       
                                       <div class="col-sm-3">
                                           <button class="btn btn-primary btn-hecho" onclick="showData(1)">Antecedentes Personales y Familiares</button>
                                           <div class="div-icon data1" id="data1" style="display:none">
                                               <span class="icon-check "><i class="fa fa-check-circle text-success"></i></span>
                                           </div>
                                       </div>
                                       <div class="col-sm-3">
                                           <button class="btn btn-primary btn-hecho" onclick="showData(2)">Motivo De Consulta, Diagnóstico y Tratamiento Inicial</button>
                                           <div class="div-icon data2" id="data2" style="display:none">
                                               <span class="icon-check "><i class="fa fa-check-circle text-success"></i></span>
                                           </div>
                                       </div>
                                       <div class="col-sm-3">
                                           <button class="btn btn-primary btn-hecho" onclick="showData(3)">Evolución y Tratamientos Posteriores</button>
                                           <div class="div-icon data3" id="data3" style="display:none">
                                               <span class="icon-check "><i class="fa fa-check-circle text-success"></i></span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row card-data show0" id="show1" style="margin-top: 10%;display:none" >
                                       <div class="col-sm-12"><h3 class="subtitle">Antecedentes Personales y Familiares</h3></div>
                                       <?php if($cuestionario->seccion==1): ?>
                                       <div class="col-sm-12 bodyData">
                                           <div class="row">
                                               <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                               <div class="col-sm-7"><?php echo $cuestionario->antecedentesPersonales; ?></div>
                                           </div>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($cuestionario->seccion!=1): ?>
                                           <div class="col-sm-12 bodyData"><?php echo $cuestionario->antecedentesPersonales; ?></div>
                                       <?php endif; ?>
                                       <?php if($cuestionario->seccion==2): ?>
                                       <div class="col-sm-12 bodyData">
                                           <div class="row">
                                               <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                               <div class="col-sm-7"><?php echo $cuestionario->antecedentesFamiliares; ?></div>
                                           </div>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($cuestionario->seccion!=2): ?>
                                           <div class="col-sm-12 bodyData"><?php echo $cuestionario->antecedentesFamiliares; ?></div>
                                       <?php endif; ?>
                                   </div>
                                   
                                   <div class="row card-data show2" id="show2" style="margin-top: 10%;display:none">
                                       <div class="col-sm-12"><h3 class="subtitle">Motivo De Consulta, Diagnóstico y Tratamiento Inicial</h3></div>
                                       <?php if($cuestionario->seccion==3): ?>
                                       <div class="col-sm-12 bodyData">
                                           <div class="row">
                                               <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                               <div class="col-sm-7"><?php echo $cuestionario->motivoConsulta; ?></div>
                                           </div>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($cuestionario->seccion!=3): ?>
                                           <div class="col-sm-12 bodyData"><?php echo $cuestionario->motivoConsulta; ?></div>
                                       <?php endif; ?>
                                   </div>
                                   <div class="row card-data show3" id="show3" style="margin-top: 10%;display:none">
                                       <div class="col-sm-12"><h3 class="subtitle">Evolución y Tratamientos Posteriores</h3></div>
                                       <?php if($cuestionario->seccion==4): ?>
                                       <div class="col-sm-12 bodyData">
                                           <div class="row">
                                               <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                               <div class="col-sm-7"><?php echo $cuestionario->revision; ?></div>
                                           </div>
                                       </div>
                                       <?php endif; ?>
                                       <?php if($cuestionario->seccion!=4): ?>
                                           <div class="col-sm-12 bodyData"><?php echo $cuestionario->revision; ?></div>
                                       <?php endif; ?>
                                   </div>
                                    </div>
                                    <div class="movil-tablet">
                                        <div class="row  d-flex justify-content-center" style="min-height: 250px;">
                                        
                                            <div class="col-sm-12" style="height: 75px;margin-top:15px;">
                                                <button class="btn btn-primary btn-hecho" onclick="showDataMovil(1)" data-toggle="collapse" data-target="#antecedentes" aria-expanded="false" aria-controls="collapseExample">Antecedentes Personales y Familiares</button>
                                                <div class="div-icon data1" id="data1" style="display:none">
                                                    <span class="icon-check "><i class="fa fa-check-circle text-success"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 collapse"  id="antecedentes">
                                                <div class="col-sm-12"><h3 class="subtitle">Antecedentes Personales y Familiares</h3></div>
                                                <?php if($cuestionario->seccion==1): ?>
                                                <div class="col-sm-12 bodyData">
                                                    <div class="row">
                                                        <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                                        <div class="col-sm-7"><?php echo $cuestionario->antecedentesPersonales; ?></div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($cuestionario->seccion!=1): ?>
                                                    <div class="col-sm-12 bodyData"><?php echo $cuestionario->antecedentesPersonales; ?></div>
                                                <?php endif; ?>
                                                <?php if($cuestionario->seccion==2): ?>
                                                <div class="col-sm-12 bodyData">
                                                    <div class="row">
                                                        <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                                        <div class="col-sm-7"><?php echo $cuestionario->antecedentesFamiliares; ?></div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($cuestionario->seccion!=2): ?>
                                                    <div class="col-sm-12 bodyData"><?php echo $cuestionario->antecedentesFamiliares; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-12" style="height: 75px;margin-top:15px;">
                                                <button class="btn btn-primary btn-hecho" onclick="showDataMovil(2)" data-toggle="collapse" data-target="#motivos" aria-expanded="false" aria-controls="collapseExample">Motivo De Consulta, Diagnóstico y Tratamiento Inicial</button>
                                                <div class="div-icon data2" id="data2" style="display:none">
                                                    <span class="icon-check "><i class="fa fa-check-circle text-success"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 collapse"  id="motivos">
                                                <div class="col-sm-12"><h3 class="subtitle">Motivo De Consulta, Diagnóstico y Tratamiento Inicial</h3></div>
                                                <?php if($cuestionario->seccion==3): ?>
                                                <div class="col-sm-12 bodyData">
                                                    <div class="row">
                                                        <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                                        <div class="col-sm-7"><?php echo $cuestionario->motivoConsulta; ?></div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($cuestionario->seccion!=3): ?>
                                                    <div class="col-sm-12 bodyData"><?php echo $cuestionario->motivoConsulta; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-12" style="height: 75px;margin-top:15px;margin-bottom: 25px;">
                                                <button class="btn btn-primary btn-hecho" onclick="showDataMovil(3)" data-toggle="collapse" data-target="#evolucion" aria-expanded="false" aria-controls="collapseExample">Evolución y Tratamientos Posteriores</button>
                                                <div class="div-icon data3" id="data3" style="display:none">
                                                    <span class="icon-check "><i class="fa fa-check-circle text-success"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 collapse"  id="evolucion">
                                                    <div class="col-sm-12"><h3 class="subtitle">Evolución y Tratamientos Posteriores</h3></div>
                                                    <?php if($cuestionario->seccion==4): ?>
                                                    <div class="col-sm-12 bodyData">
                                                        <div class="row">
                                                            <div class="col-sm-5"><img src="<?php echo e(URL::asset($cuestionario->imagenSeccion)); ?>" style="width:100%;"></div>
                                                            <div class="col-sm-7"><?php echo $cuestionario->revision; ?></div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if($cuestionario->seccion!=4): ?>
                                                        <div class="col-sm-12 bodyData"><?php echo $cuestionario->revision; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                            <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->make('../cuestionarios/pregunta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide" id="slideFinal">
                                <div class="row final" style="margin-top: 0%;">
                                    <div class="col-sm-12 "></div>
                                    <div class="col-sm-12 final-col"></div>
                                    <div class="col-sm-12 d-flex justify-content-center" style="margin-top:25px;">
                                    <button class="btn btn-primary btn-hecho" style="width:200px!important;"onclick="reinitSala()">Salir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <input type="hidden" value="<?php echo e($cuestionario->codigo); ?>" id="codigo" />
 <input type="hidden" value="<?php echo e($randomCodigo); ?>" id="randomCodigo" />
 <input type="hidden" value="<?php echo e($cuestionario->codigo); ?>" id="idCuestionario" />
 <audio src="<?php echo e(URL::asset('assets/acierto.mp3')); ?>" id="correct"></audio>
 <audio src="<?php echo e(URL::asset('assets/incorrecto.mp3')); ?>" id="incorrect"></audio>
 
 <div class="modal fade" id="visor">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Visor</h4>
        <button type="button" class="close" data-dismiss="modal" style="font-size: 24px;">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="overflow-y: auto;overflow-x: hidden;">
        <div class="row">
                <div class="col-sm-12 ayuda">
                    <img src="" id="visorI" style="    width: 100%;">
                </div>
                
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-modal" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
 <input type="hidden" value="<?php echo e(count($preguntas)); ?>" id="cantidad"/>
 <input type="hidden" value="0" id="isEnabledAudio"/>
 <?php if($user->typeuser!=1): ?>
 <img src="<?php echo e(URL::asset('assets/logo.png')); ?>" class="img-title" style="width:350px;display:none"/>
<?php endif; ?>
<?php if($user->typeuser==1): ?>
    <img src="<?php echo e(URL::asset('assets/servier.png')); ?>"  class="img-title" style="width:350px;display:none"/>
<?php endif; ?>
 
 <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
 <script type="module">
  import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',
  loop: false,
  slidesPerView: 1,
  allowTouchMove:false,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
  on: {
    reachEnd: function () {
      let html="";
        html = setCards(preguntas);
        $(".final-col").html(html);
    },
}

});
//let swiper2 = document.querySelector('.swiper').swiper;

// Now you can use all slider methods like
//swiper2.slideNext();
</script>
 <script src="<?php echo e(URL::asset('js/cuestionarios/caso.js')); ?>"></script>    
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('./layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/mynetwp3/public_html/casos/resources/views/cuestionarios/caso_estudio.blade.php ENDPATH**/ ?>