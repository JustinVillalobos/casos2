<div class="col-sm-12" style="padding:10px 20px 0px 20px;">
        <table class="table table-bordered" style="margin-bottom:3px;">
            <thead>
                <tr>
                    <th style="width:300px;">Participante</th>
                    <th>Puntaje</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $puntajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="d-flex justify-content-center align-items-center" style="width:300px;">
                            <?php echo e($nivel->nombre); ?>

                        </td>
                        
                        <td>
                            <div class="progress" style="height: 35px;font-size: 15px;font-weight: bold;">
                                    <?php if($nivel->puntajeCorrecto>0): ?>
                                        <?php $puntaje =($nivel->puntajeCorrecto/($cantidad))*100; ?>
                                        <?php
                                            if($puntaje<45){
                                                $class="bg-danger text-start";
                                            }else if($puntaje<70){
                                                $class="bg-warning text-end";
                                            }else{
                                                $class="bg-primary text-end"; 
                                            }

                                        ?>
                                        <div class="progress-bar <?php echo $class;?>" role='progressbar' style='width:<?php echo e(($nivel->puntajeCorrecto/($cantidad))*100); ?>%'>
                                            
                                            <label><?php echo e(intVal(($nivel->puntajeCorrecto/($cantidad))*100)); ?>%

                                                <?php if($puntaje==100): ?>
                                                    <span class="text-warning"><i class='i i-crown'></i></span>
                                                <?php endif; ?>
                                            </label>
                                        </div>
                                        
                                    <?php endif; ?>
                                    <?php if($nivel->puntajeCorrecto==0): ?>
                                        <div class="progress-bar" role='progressbar' style='width:'>
                                            0%
                                        </div>
                                    <?php endif; ?>
                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12" style="padding:0px 20px 10px 20px;">
        <?php echo e($puntajes->links('vendor.pagination.bootstrap-4')); ?>

    </div><?php /**PATH /home1/mynetwp3/public_html/casos/resources/views////cuestionarios/table.blade.php ENDPATH**/ ?>