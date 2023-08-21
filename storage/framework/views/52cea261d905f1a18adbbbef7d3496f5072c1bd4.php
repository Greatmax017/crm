<?php $__env->startSection('content'); ?>
<body>

	<div id="wrapper">

<!-- Inner Page Header serction end here -->
<section id="main-content" style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
       <?php if(session('error-status')): ?>
                <div class="alert alert-danger">

                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
                    <b>Error: &nbsp </b> <?php echo e(session('error-status'), false); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if(session('success-status')): ?>
                <div class="alert alert-success">

                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                    <?php echo e(session('success-status'), false); ?>

                </div>
            </div>
        <?php endif; ?>



            <!-- BEGIN: Personal Information -->
            <form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/profile'), false); ?>">
                            <?php echo e(csrf_field(), false); ?>


                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                                Personal Information
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div>
                                        <label>Email</label>
                                        <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="<?php echo e(Auth::user()->email, false); ?>" disabled>
                                    </div>


                                     <div class="mt-3 <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="input w-full border mt-2" placeholder="Account Name" value="<?php echo e(Auth::user()->name, false); ?>">
                                         <?php if($errors->has('name')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('name'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                                    </div>

                                    <div class="mt-3 <?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="input w-full border mt-2" placeholder="Input Phone" value="<?php echo e(Auth::user()->phone, false); ?>">
                                        <?php if($errors->has('phone')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('phone'), false); ?></strong>
                                </span>
                                   <?php endif; ?>
                                </div>

																<div class="mt-3 <?php echo e($errors->has('dob') ? ' has-error' : '', false); ?>">
																		<label>Date of Birth</label>
																		<input type="text" name="dob" class="input w-full border mt-2" placeholder="Day and Month" value="<?php echo e(Auth::user()->dob, false); ?>">
																		<?php if($errors->has('dob')): ?>
														<span class="label label-danger">
																<strong><?php echo e($errors->first('dob'), false); ?></strong>
														</span>
															 <?php endif; ?>
														</div>


																<div class="mt-3 ">
																		<label>Registered</label>
																		<p><?php echo e(Auth::user()->created_at->toDateTimeString(), false); ?></p>


                                    </div>
                                </div>

                                    </div>

                                </div>
                            </div>
                            <div class="flex justify-end mt-4">

                                <button onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="button w-20 bg-theme-1 text-white ml-auto">Save</button>
                            </div>
                        </div>
                    </div>
</form>
                    <!-- END: Personal Information -->
        </div><!-- /row -->
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>