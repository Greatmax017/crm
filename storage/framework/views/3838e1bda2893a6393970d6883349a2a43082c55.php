<?php $__env->startSection('head'); ?>
    <title>reset password - Neptune Securities</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<!--about-->
<!--about-one-->
<section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
	<div class="container">
		<div class="section section-clients">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-md-8 offset-md-2">
							<?php if(session('error-status')): ?>
							<div class="alert alert-danger">
								<div class="container-fluid">
									<div class="alert-icon">
										<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
									</div>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
									</button>
									<b>Error:</b> <?php echo e(session('error-status'), false); ?>

								</div>
							</div>
							<?php endif; ?>

 <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="/" class="-intro-x flex items-center pt-5">
                    <img alt="Letz Laravel Admin Dashboard Starter Kit" class="w-6" src="<?php echo e(asset('dist/images/logo.svg'), false); ?>">
                    <span class="text-white text-lg ml-3 font-medium">Neptune Securities</span>
                </a>
                <div class="my-auto">
                    <img alt="Letz Laravel Admin Dashboard Starter Kit" class="-intro-x w-1/2 -mt-16" src="<?php echo e(asset('dist/images/illustration.svg'), false); ?>">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br>regain access to your account.</div>

						<?php if(session('error-status')): ?>

									<b>Error:</b> <?php echo e(session('error-status'), false); ?>


							<?php endif; ?>
                </div>
            </div>
			<!-- END: Login Info -->



	 <!-- BEGIN: Login Form -->


            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">New Password</h2>

                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. </div>
                    <div class="intro-x mt-8">
									<form class="form-horizontal" role="form" method="POST" action="/password/reset">
										<?php echo e(csrf_field(), false); ?>


                    <input type="hidden" name="token" value="<?php echo e($token, false); ?>" />


										<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">

											<div class="col-md-12">
												<input id="email" placeholder="Enter Email" type="email" class="intro-x login__input input input--lg border border-gray-300 block" name="email" value="<?php echo e(isset($email) ? $email : old('email'), false); ?>" required>

												<?php if($errors->has('email')): ?>
												<span class="help-block">
													<strong><?php echo e($errors->first('email'), false); ?></strong>
												</span>
												<?php endif; ?>
											</div>
                      <div class="col-md-12">
												<input id="password" placeholder="New password" type="password" class="intro-x login__input input input--lg border border-gray-300 block" name="password" required>

												<?php if($errors->has('password')): ?>
												<span class="help-block">
													<strong><?php echo e($errors->first('password'), false); ?></strong>
												</span>
												<?php endif; ?>
											</div>
                      <div class="col-md-12">
                        <input id="password-confirm" placeholder="confirm password" type="password" class="intro-x login__input input input--lg border border-gray-300 block" name="password_confirmation" required>

                        <?php if($errors->has('password_confirmation')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('password_confirmation'), false); ?></strong>
                        </span>
                        <?php endif; ?>
                      </div>

										</div>

										<div class="form-group text-center">
                                            <div style="margin-top:20px;">
												<button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
													Reset Password
												</button>
											</div>
										</div>
									</form>
								</div>
            </div>
            </form>
			<!-- END: Login Form -->
					</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>