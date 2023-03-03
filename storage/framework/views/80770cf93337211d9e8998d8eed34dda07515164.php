<div class="swiper-slide" id="slide<?php echo e($key); ?>" style="overflow-y: auto;overflow-x:none;">
<?php if($key<9){$zero="0";}else{$zero="";}?>
                                    <div class="row div-info-add div-info-add-<?php echo e($key); ?>" style="margin-top: 12%;display:block;width: 97%;">
                                        <div class="col-sm-12 "><h3 class="pregunta"><strong>Información De Pregunta <span class="text-primary2"><?php echo e($zero."".($key+1)); ?></strong></h3></div>
                                        <div class="col-sm-12">
                                                <?php echo $p->ayuda; ?>

                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <button  class="btn text-white btn-response btn-res btn-res<?php echo e($key); ?>  bg-primary2"  onclick="goToquestion(<?php echo e($key); ?>,<?php echo e($p->solucion); ?>)">Ir a la Pregunta</button>
                                        </div>
                                    </div>
                                    <div class="row  div-res-btn div-slide-<?php echo e($key); ?>" style="margin-top: 1%;width: 97%;;display:none;">
                                        <div class="col-sm-12">
                                           
                                            <h3 class="pregunta">Pregunta <span class="text-primary2"><?php echo e($zero."".($key+1)); ?></span></h3>
                                            <h3 class="preguntaText"><?php echo e($p->pregunta); ?></h3>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:25px;">
                                            <div class="row response" onclick="response(<?php echo e($key); ?>,0)">
                                                <div class=" col-sm-1 number-response bg-primary">A</div>
                                                <div class=" col-sm-10 text-response  response<?php echo e($key); ?>0" id="response<?php echo e($key); ?>0"><?php echo e($p->respuesta1); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <div class="row response" onclick="response(<?php echo e($key); ?>,1)" >
                                                <div class=" col-sm-1 number-response bg-primary">B</div>
                                                <div class=" col-sm-10 text-response response<?php echo e($key); ?>1"id="response<?php echo e($key); ?>1"><?php echo e($p->respuesta2); ?></div>
                                            </div>
                                        </div>
                                        <?php if($p->respuesta3!=""): ?>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <div class="row response" onclick="response(<?php echo e($key); ?>,2)">
                                                <div class=" col-sm-1 number-response bg-primary">C</div>
                                                <div class=" col-sm-10 text-response response<?php echo e($key); ?>2" id="response<?php echo e($key); ?>2"><?php echo e($p->respuesta3); ?></div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($p->respuesta4!=""): ?>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <div class="row response" onclick="response(<?php echo e($key); ?>,3)">
                                                <div class=" col-sm-1 number-response bg-primary">D</div>
                                                <div class=" col-sm-10 text-response response<?php echo e($key); ?>3" id="response<?php echo e($key); ?>3"><?php echo e($p->respuesta4); ?></div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <button id="demo<?php echo e($key); ?>" class="btn text-white btn-response btn-res btn-res<?php echo e($key); ?>  bg-primary2" disabled onclick="responseQuestion(<?php echo e($key); ?>,<?php echo e($p->solucion); ?>)">Comprobar</button>
                                        </div>
                                        <div class="col-sm-12 details-div" >
                                            <div class="row" style="width: 95%;">
                                                <div class="col-sm-9 definiciones">
                                                    <strong>Información Adicional:</strong><?php echo $p->definiciones; ?>

                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row div-det div-punt-<?php echo e($key); ?>" style="margin-top: 12%;display:none;width: 97%;">
                                     <div class="col-sm-12 "><h3 class="pregunta"><strong>Puntajes</strong></h3></div>
                                        <div class="col-sm-12">
                                            <div class="row data_table" id="data_table"></div>
       
        
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: 10px;">
                                            <button class="btn text-white btn-hecho bg-primary2" style="width:200px!important;"onclick="showDetails(<?php echo e($key); ?>)">Ver Detalles</button>
                                        </div>
                                    </div>
                                    <div class="row div-det div-det-<?php echo e($key); ?>" style="margin-top: 12%;display:none;width: 97%;">
                                     <div class="col-sm-12 "><h3 class="pregunta"><strong>Detalles</strong></h3></div>
                                        <div class="col-sm-12">
                                            <?php echo $p->detalles; ?>

                                        </div>
                                    </div>
                                </div><?php /**PATH /home1/mynetwp3/public_html/casos/resources/views////cuestionarios/pregunta.blade.php ENDPATH**/ ?>