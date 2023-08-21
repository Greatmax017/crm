 

<?php $__env->startSection('content'); ?>
<body>
	<div id="wrapper">
		
		 
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          		<?php if(session('error-status')): ?>
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>
				<?php if(session('success-status')): ?>
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center><?php echo e(session('success-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>
              
			  <?php if(Auth::user()->isAdmin()): ?>
			  <div class="row">
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-primary">
							<div class="panel-heading">Notification
								<label class="label label-default pull-right"><?php echo e($queue, false); ?> Left in queue</label>
							</div>
							<div class="panel-body">
								<form id="notify-form" class="form" role="form" method="POST" action="<?php echo e(url('/admin_notify'), false); ?>">
								<?php echo e(csrf_field(), false); ?>


								<div class="form-group <?php echo e($errors->has('type') ? ' has-error' : '', false); ?>">
									<label class="control-label">Notification Type:</label>
									<select class="form-control" name="type">
										<option value="">-- Select Type --</option>
										<option value="1">SMS Notification</option>
										<option value="2">Email Notification</option>
									</select>
									<?php if($errors->has('type')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('type'), false); ?></strong>
									    </span>
									<?php endif; ?>
								</div>
								<div class="form-group <?php echo e($errors->has('bitcoin_wallet_id') ? ' has-error' : '', false); ?>">
									<label class="control-label">Message:</label>
									<textarea name="message"  rows="5" class="form-control"></textarea>
									<?php if($errors->has('message')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('message'), false); ?></strong>
									    </span>
									<?php endif; ?>
								</div>


									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="notify-form" form-action="Send notification to everyone" style="margin-top:20px;" type="submit" class="btn btn-primary">
											    Send
											</a><br />
										</center>
									    </div>
									</div>
							    </form>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
			  <?php endif; ?>
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>