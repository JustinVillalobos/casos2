
<?php $__env->startSection('content'); ?>  

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> 
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 d-flex justify-content-center" style="margin-top:15px;">
                  <img src="<?php echo e(URL::asset('assets/logo.png')); ?>" style="width:220px;"/>
                  </div>
                  <div class="col-sm-2"></div>
                  
                      
                    </div>
                  <div class="col-sm-12" style="margin-top:15px;">
                   <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                    <label for="tab-1" class="tab">Inicio Sesi&oacuten</label> 
                    <input id="tab-2" type="radio" name="tab" class="sign-up">
                    <label for="tab-2" class="tab" ></label>
                    <div class="login-space">
                   
                    <div class="login text-left">
                      <div class="row">
                        <div class="col-sm-12 text-center">
                          <p class="errorTitle"><?php if(!empty($_SESSION["errorBD"])){ echo $_SESSION["errorBD"];}?></p>
                        </div>
                      </div>
                        <form method="POST" action="<?php echo e(route('login.loginValidator')); ?>" onsubmit ="return validateLogin()">
                            <?php echo method_field("POST"); ?>
                            <?php echo csrf_field(); ?>
                            <div class="group"> <label for="user" class="label">Usuario</label> 
                              <input id="user" name="user" type="text" class="input" placeholder="Ingresa tu usuario">
                              <span class="error"></span>
                            </div>
                            <div class="group"> <label for="pass" class="label">Contrase&ntildea</label> 
                                <input id="pass" name="pass" type="password" class="input" data-type="password" placeholder="Ingresa tu contrase??a">
                                <span class="error"></span>
                            </div>
                            <div class="group"> <input type="submit" id="iniciar_sesion" class="button" value="Iniciar Sesi??n"> </div>
                        </form>
                      <div class="hr"></div>
                      <div class="text-center">
                        <p>Administraci??n del sistema</p>
                     
                        
                       
                      </div>
                      
                  </div>
                  <div class="sign-up-form text-left">
                      <div class="row">
                        
                    </div>  
                  </div>
                    

                

                </div>
              </div>
          </div>
     
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/mynetwp3/public_html/cuestionarios/resources/views/login/index.blade.php ENDPATH**/ ?>