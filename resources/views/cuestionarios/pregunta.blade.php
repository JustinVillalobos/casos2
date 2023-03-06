<div class="swiper-slide" id="slide{{$key}}" style="overflow-y: auto;overflow-x:none;">
<?php if($key<9){$zero="0";}else{$zero="";}?>
                                    
                                    <div class="row  div-res-btn div-slide-{{$key}}" style="margin-top: 4%;width: 97%;;display:none;">
                                        <div class="col-sm-12">
                                           
                                            <h3 class="pregunta">Pregunta <span class="text-primary2">{{$zero."".($key+1)}}</span></h3>
                                            <h3 class="preguntaText">{{$p->pregunta}}</h3>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:25px;">
                                            <div class="row response" onclick="response({{$key}},0)">
                                                <div class=" col-sm-1 number-response bg-primary2">A</div>
                                                <div class=" col-sm-10 text-response  response{{$key}}0" id="response{{$key}}0">{{$p->respuesta1}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <div class="row response" onclick="response({{$key}},1)" >
                                                <div class=" col-sm-1 number-response bg-primary2">B</div>
                                                <div class=" col-sm-10 text-response response{{$key}}1"id="response{{$key}}1">{{$p->respuesta2}}</div>
                                            </div>
                                        </div>
                                        @if($p->respuesta3!="")
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <div class="row response" onclick="response({{$key}},2)">
                                                <div class=" col-sm-1 number-response bg-primary2">C</div>
                                                <div class=" col-sm-10 text-response response{{$key}}2" id="response{{$key}}2">{{$p->respuesta3}}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($p->respuesta4!="")
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <div class="row response" onclick="response({{$key}},3)">
                                                <div class=" col-sm-1 number-response bg-primary2">D</div>
                                                <div class=" col-sm-10 text-response response{{$key}}3" id="response{{$key}}3">{{$p->respuesta4}}</div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top:35px;">
                                            <button id="demo{{$key}}" class="btn text-white btn-response btn-res btn-res{{$key}}  bg-primary2" disabled onclick="responseQuestion({{$key}},{{$p->solucion}})">ENVÍAR</button>
                                        </div>
                                        
                                    </div>
                                    <div class="row div-det div-punt-{{$key}}" style="margin-top: 12%;display:none;width: 97%;">
                                     <div class="col-sm-12 "><h3 class="pregunta"><strong>RESPUESTAS</strong></h3></div>
                                        <div class="col-sm-12">
                                            <div class="row data_table" id="data_table"></div>
       
        
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-center" style="margin-top: 10px;">
                                            <button class="btn text-white btn-hecho bg-primary2" style="width:200px!important;"onclick="showDetails({{$key}})">CONTINUAR</button>
                                        </div>
                                    </div>
                                    <div class="row div-det div-det-{{$key}}" style="margin-top: 12%;display:none;width: 97%;">
                                     <div class="col-sm-12"><h3 class="pregunta"><strong>EVOLUCIÓN - CONDUCTA</strong></h3></div>
                                        <div class="col-sm-12  info-details-custom">
                                            {!! $p->detalles !!}
                                        </div>
                                    </div>
                                </div>