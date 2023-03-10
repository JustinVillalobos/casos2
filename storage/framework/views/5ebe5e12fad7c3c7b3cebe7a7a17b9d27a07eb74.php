<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <title>NetMD</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
        
        <link href="<?php echo e(URL::asset('plugins/bootstrap-4.6.2-dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('plugins/DataTables/datatables.min.css')); ?>" rel="stylesheet">

        <script src="<?php echo e(URL::asset('plugins/jquery-3.6.0.min.js')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="<?php echo e(URL::asset('plugins/bootstrap-4.6.2-dist/js/bootstrap.min.js')); ?>"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo e(URL::asset('css/login.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('plugins/iconos/style.css')); ?>" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
       
    </head>
    <body class="antialiased">
        
        <div class="flex-container body" style="overflow-x: hidden;padding-bottom:25px;">
           <div class="row">
                
                <div class="col-sm-12">
                    <?php $__env->startSection('content'); ?>
                
                    <?php echo $__env->yieldSection(); ?>
                </div>
           </div>
        </div>
        <footer class="d-flex align-items-center text-white">
            <div class="row w-100">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 d-flex justify-content-center text-white font-weight-bold"> Copyright ??<?php echo date("Y")?></div>
                <div class="col-sm-3"></div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <script src="<?php echo e(URL::asset('plugins/sweetalert2/dist/sweetalert2.all.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('plugins/DataTables/datatables.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('js/index.js')); ?>"></script>

    </body>
</html><?php /**PATH C:\xampp\htdocs\cuestionarios\resources\views////layouts/login.blade.php ENDPATH**/ ?>