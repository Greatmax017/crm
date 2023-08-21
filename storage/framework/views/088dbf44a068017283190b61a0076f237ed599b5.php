<?php $__env->startSection('content'); ?>
<br><br><br><br><br>

<!-- register -->
<section class="register py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center register-form">
                <div class="wls-register-form">
                    <h4>Sign Up</h4>
                    <br>
                    <div class="col-md-12">
                        <?php if(session('error-status')): ?>
                                <div class="alert alert-danger">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <b>Error:</b> <?php echo e(session('error-status'), false); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(session('success-status')): ?>
                                <div class="alert alert-success">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <?php echo e(session('success-status'), false); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                                <div class="card-body">
                                    <form class="form" role="form" method="POST" action="<?php echo e(url('/register'), false); ?>">
    									<?php echo e(csrf_field(), false); ?>

    									<input type="hidden" value="<?php if($referrer != null): ?><?php echo e($referrer->email, false); ?><?php endif; ?>" name="referrer">
										 <div class="form-group <?php echo e($errors->has('plan') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Investment Plan<span style="color:red;">*</span></label>
    										 <select class="form-control" name="plan">
												<option value="0">20% (1 month)</option>
												<option value="1">25% (3 month)</option>
												<option value="2">30% (6 month)</option>	
											</select>
    										<?php if($errors->has('plan')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('plan'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

                                        <div class="form-group <?php echo e($errors->has('username') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Username<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Choose a Username" name="username" value="<?php echo e(old('name'), false); ?>" required autofocus>
    										<?php if($errors->has('username')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('username'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>
    									<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Full Name<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(old('name'), false); ?>" required autofocus>
    										<?php if($errors->has('name')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('name'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Email address<span style="color:red;">*</span></label>
    										<input type="email" class="form-control" placeholder="email@example.com" name="email" value="<?php echo e(old('email'), false); ?>" required>
    										<?php if($errors->has('email')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('email'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Phone Number<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone'), false); ?>" name="phone" required>
    										<?php if($errors->has('phone')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('phone'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

                                        
										<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
											<label class="control-label">Password<span style="color:red;">*</span></label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
											<?php if($errors->has('password')): ?>
											    <span class="badge badge-danger">
												<strong><?php echo e($errors->first('password'), false); ?></strong>
											    </span>
											<?php endif; ?>
											<p>Password must be atleast 8 characters and must contain atleast one UPPERCASE, lowercase and number</p>
										</div>
										<br>

										<div class="form-group">
											<label class="control-label">Confirm password<span style="color:red;">*</span></label>
											<input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
										</div>

    									<div class="form-group">
                                            <input type="checkbox" required>
                                            <p>I  agree to alstomfx terms and conditions</p>
    										<center>
    											<button style="margin-top:20px;" type="submit" class="btn btn-lg btn-primary">
    											    Sign Up
    											</button>
    										</center>
    									</div>
    							    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// register -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>