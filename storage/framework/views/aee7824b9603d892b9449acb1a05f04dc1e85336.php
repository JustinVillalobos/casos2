
<?php $__env->startSection('content'); ?>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
<div class="row" style="margin-top:25px;">
    <div class="col-sm-12">
        <div class="" style="padding-left:5px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><h5><i class="fa fa-book" aria-hidden="true"></i>Casos De Estudio</h5></li>
                
            </ol>
        </div>
    </div>
</div>
<div class="row" style="margin-top:15px;">
    
    <div class="col-sm-6" style="padding-left:15px;">
        <a href='<?php echo e(route("cuestionarios.create")); ?>' class="btn btn-primary" style="margin-left:5px;height:35px;">
                <i class="fa fa-plus"></i> Agregar Caso De Estudio
        </a>
    </div>
    <div class="col-sm-6 d-flex justify-content-end" style="margin-bottom:20px;height:35px;padding:0px 20px 0px 20px;">
        <form action='<?php echo e(route("cuestionarios.busqueda")); ?>' method="GET" class="d-flex"  style="margin: 0px;">
            <?php echo method_field("GET"); ?>
            <?php echo csrf_field(); ?>
            <select name="limit" class="form-select" style="width:80px;">
                <option <?php if($limit == 10){ echo "selected";}?>>10</option>
                <option <?php if($limit == 15){ echo "selected";}?>>15</option>
                <option <?php if($limit == 25){ echo "selected";}?>>25</option>
                <option <?php if($limit == 50){ echo "selected";}?>>50</option>
                <option <?php if($limit == 100){ echo "selected";}?>>100</option>
            </select>
            <input type="text" name="search" value="<?php echo $search;?>" class="form-control"  placeholder="Buscar..." style="margin-left:5px;width:67%"/>
            <button type="submit" class="btn btn-success" style="margin-left:5px">
                <i class="fa fa-search"></i>
            </button>
                                        
        </form>
        <a href="./cuestionarios" class="btn btn-primary" style="margin-left:5px">
            <i class="fa fa-refresh"></i>
        </a>
    </div>
    <div class="col-sm-12 d-flex justify-content-center table-responsive" style="width: 90%;padding-left: 200px;">
        <table class="table table-bordered " style="margin-bottom:3px;width:100%">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>titulo</th>
                    <th>Fecha Creación</th>
                    <th>Disponibilidad</th>
                    <th style="width:75px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cuestionarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="d-flex justify-content-center align-items-center"><img src="<?php echo e(URL::asset('assets/avatars/avatar'.$nivel->imagen.'.png')); ?>" style="width:55px;height:55px;"/></td>
                        <td ><div class="d-flex align-items-center"><?php echo e($nivel->titulo); ?></div></td>
                        <td ><div class="d-flex justify-content-center align-items-center"><?php echo date_format($nivel->fechaCreacion,"d-m-Y");?></div></td>
                        <td >
                            <div class="d-flex justify-content-center align-items-center">
                            <?php if($nivel->disponible==1): ?>
                                Disponible
                            <?php endif; ?>
                            <?php if($nivel->disponible==2): ?>
                                No Disponible
                            <?php endif; ?>
                            </div>
                        </td>
                        <td style="width:125px;" >
                            <div class="d-flex justify-content-center align-items-center" style="height: 55px">
                                <form action='<?php echo e(route("cuestionarios.show", [$nivel])); ?>' method="post" >
                                    <?php echo method_field("get"); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-primary text-white" style="margin-left:5px;width:25px;height:29px;" titel="SALA">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </form>
                                    <button type="submit" class="btn btn-warning text-white" style="margin-left:5px;width:25px;height:29px;" data-toggle="modal" data-target="#myModal" onclick="changeStatus('<?php echo e($nivel->codigo); ?>','<?php echo e($nivel->disponible); ?>','<?php echo e($nivel->titulo); ?>')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <?php $route = route("cuestionarios.caso_estudio")."?code=".$nivel->codigo;?>
                                <button type="submit" class="btn btn-info text-white" style="margin-left:5px;width:25px;height:29px;" onclick='copyQR("<?php echo $route;?>")'>
                                    <i class="fa fa-qrcode"></i>
                                </button>
                                <button type="submit" class="btn btn-success" style="margin-left:5px;width:25px;height:29px;" onclick="copyCode('<?php echo e($nivel->codigo); ?>')">
                                    <i class="fa fa-clipboard"></i>
                                </button>
                               
                                <button type="submit" class="btn btn-primary" style="margin-left:5px;width:25px;height:29px;" onclick='copyLink("<?php echo $route;?>")'>
                                    <i class="fa fa-link"></i>
                                </button>
                                
                                    <button type="submit" class="btn btn-danger text-white" style="margin-left:5px;width:25px;height:29px;" onclick="return validate(event,this,'<?php echo e($nivel->codigo); ?>')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12" style="padding:0px 20px 10px 20px;">
        <?php echo e($cuestionarios->links('vendor.pagination.bootstrap-4')); ?>

    </div>
    <div class="col-sm-12 d-none" style="padding:0px 20px 10px 20px;" >
    <img alt="Código QR" id="codigo">
    </div>
</div>
<?php $route2 = route("cuestionarios.index");?>
<input type="hidden" value="<?php echo e($route2); ?>" id="route" />

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cambiar Estado Caso de Estudio</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
            <div class="col-sm-12"><h5>Caso De estudio</h5></div>
            <div class="col-sm-12"><h6 id='case'></h6></div>
            <div class="col-sm-12">
                <select id="state" class="form-select">
                    <option value="1">Disponible</option>
                    <option value="2">No Disponible</option>
                </select>
            </div>
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  onclick="updateState()">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="<?php echo e(URL::asset('js/cuestionarios/list.js')); ?>"></script>     

<?php $__env->stopSection(); ?>
<?php echo $__env->make('./layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/mynetwp3/public_html/cuestionarios/resources/views/cuestionarios/index.blade.php ENDPATH**/ ?>