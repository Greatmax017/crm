<?php $__env->startSection('head'); ?>
    <title>Register - MobileVtuPlus</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="/" class="-intro-x flex items-center pt-5">
                    <img alt="Letz Laravel Admin Dashboard Starter Kit" class="w-6" src="<?php echo e(asset('dist/images/logo.svg'), false); ?>">
                    <span class="text-white text-lg ml-3 font-medium">Mobile VTU Plus</span>
                </a>
                <div class="my-auto">
                    <img alt="Letz Laravel Admin Dashboard Starter Kit" class="-intro-x w-1/2 -mt-16" src="<?php echo e(asset('dist/images/illustration.svg'), false); ?>">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign up for your MobileVtu Plus account.</div>
                    <div class="-intro-x mt-5 text-lg text-white">Payments has never been so easy!</div>
                </div>
            </div>
            <!-- END: Register Info -->
            
             <!-- BEGIN: Register Form -->
               
             
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign up - Mobile VTU Plus</h2>

                     <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. </div>
                    <div class="intro-x mt-8">

                     <?php if(session('error-status')): ?>
                                <div class="alert alert-danger">
                                
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <b>Error:</b> <?php echo e(session('error-status'), false); ?>

                                
                            </div>
                        <?php endif; ?>
                        <?php if(session('success-status')): ?>
                                <div class="alert alert-success">
                                
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <?php echo e(session('success-status'), false); ?>

                                
                            </div>
                        <?php endif; ?>
                                    <form class="form" role="form" method="POST" action="<?php echo e(url('/register'), false); ?>">
                                        <?php echo e(csrf_field(), false); ?>


                                      
    									
										<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
    										
    										<input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Phone Number" value="<?php echo e(old('phone'), false); ?>" name="phone" required autofocus>
    										<?php if($errors->has('phone')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('phone'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>
										

    									<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
    										
    										<input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Full Name" name="name" value="<?php echo e(old('name'), false); ?>" required>
											
    										<?php if($errors->has('name')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('name'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
    										
    										<input type="email" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="email@example.com" name="email" value="<?php echo e(old('email'), false); ?>" required>
    										<?php if($errors->has('email')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('email'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<input class="intro-x login__input input input--lg border border-gray-300 block" type="number" placeholder="Referral Mobile Number (Optional)" value="<?php if($referrer != null): ?><?php echo e($referrer->phone, false); ?><?php endif; ?><?php echo e(old('phone'), false); ?>" name="referrer">
										
                                      
										<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
											
											<input type="password" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Password" name="password" required>
											<?php if($errors->has('password')): ?>
											    <span class="badge badge-danger">
												<strong><?php echo e($errors->first('password'), false); ?></strong>
											    </span>
											<?php endif; ?>
										</div>

										<div class="form-group">
											
											<input type="password" placeholder="Retype Password" class="intro-x login__input input input--lg border border-gray-300 block" name="password_confirmation" required>
										</div>

										
										




			
                                       

                                        <div class="form-group text-center">
                                            <div style="margin-top:20px;">
                                            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
                                                Sign Up
                                            </button>
                                             <br /><br />
                                            Already have an account? <a class="text-theme-1" href="<?php echo e(url('/login'), false); ?>">
                                                Login
                                            </a>
                                           
                                        
                                            </div>
                                        </div>
                                        </form>



                                </div>


                                
<!--                             
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                        By signin up, you agree to our <br> <a class="text-theme-1" href="/terms">Terms and Conditions</a> 
                    </div> -->
                </div>
            </div>
            </form>
            <!-- END: Login Form -->
        </div>
    </div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>