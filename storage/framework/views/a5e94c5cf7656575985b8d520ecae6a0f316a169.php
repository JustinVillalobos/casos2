
<?php $__env->startSection('content'); ?>  
<div class="container">
<div class="row" style="margin-top:25px;">
    <div class="col-sm-12">
        <div class="" style="padding-left:5px;">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><h5><i class="fa fa-book" aria-hidden="true"></i>Usuarios</h5></li>
                
            </ol>
        </div>
    </div>
</div>
<div class="row" style="margin-top:15px;padding-left:5px;">
    <div class="col-sm-6" style="padding-left:15px;">
        <a href='<?php echo e(route("usuarios.create")); ?>' class="btn btn-primary" style="margin-left:5px;height:35px;">
                <i class="fa fa-plus"></i> Agregar Usuario
        </a>
    </div>
    <div class="col-sm-6 d-flex justify-content-end" style="margin-bottom:20px;height:35px;padding:0px 20px 0px 20px;">
        <form action='<?php echo e(route("usuarios.busqueda")); ?>' method="GET" class="d-flex"  style="margin: 0px;">
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
        <a href="./usuarios" class="btn btn-primary" style="margin-left:5px">
            <i class="fa fa-refresh"></i>
        </a>
    </div>
    <div class="col-sm-12" style="padding:10px 20px 0px 20px;">
        <table class="table table-bordered" style="margin-bottom:3px;">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Autor</th>
                    <th style="width:75px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($nivel->usuario); ?></td>
                        <td><?php echo e($nivel->autor); ?></td>
                        <td style="width:125px;" class="d-flex justify-content-center">
                            
                            <form action='<?php echo e(route("usuarios.edit", [$nivel])); ?>' method="post" >
                                <?php echo method_field("get"); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-warning text-white" style="margin-left:5px;">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </form>
                            <form action='<?php echo e(route("usuarios.destroy", [$nivel])); ?>' method="post" onsubmit="return validate(event,this,<?php echo e($nivel->idUsuario); ?>)">
                                <?php echo method_field("delete"); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-danger" style="margin-left:5px;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                           
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12" style="padding:0px 20px 10px 20px;">
        <?php echo e($usuarios->links('vendor.pagination.bootstrap-4')); ?>

    </div>
</div>
</div>
<?php $route2 = route("usuarios.index");?>
<input type="hidden" value="<?php echo e($route2); ?>" id="route" />
<script src="<?php echo e(URL::asset('js/usuarios/list.js')); ?>"></script>       
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('./layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/mynetwp3/public_html/cuestionarios/resources/views/usuarios/index.blade.php ENDPATH**/ ?>