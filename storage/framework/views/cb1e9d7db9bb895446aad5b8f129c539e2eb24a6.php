<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-title">
                     <h2>New Message </h2>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-locator">
                     <ul>
                         <li><a href="/">Home /</a> <a href="/dashboard">Back-Office /</a> New Message</li>
                     </ul>
                 </div>
             </div>
        </div>
    </div>
</div>
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
					      <center><b>Error:</b> <?php echo e(session('error-status')); ?></center>
					    </div>
					</div>
				<?php endif; ?>
              <div class="row">
				  <div class="col-md-8 col-md-offset-2">
					  <br>
              		<div class="panel panel-primary">
						<div class="panel-heading">Compose Message</div>
						<div class="panel-body">
							<form id="send-message" class="form" role="form" method="POST" action="<?php echo e(url('/send_message')); ?>" enctype="multipart/form-data">
								<?php echo e(csrf_field()); ?>


								<div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
								   <label for="subject" class="control-label">Subject:</label>
								   <input id="subject" type="text" class="form-control" placeholder="Message Subject" name="subject" value="<?php echo e(isset($subject) ? $subject : ''); ?>" required>
									<?php if($errors->has('subject')): ?>
									    <span class="label label-danger">
										<strong><?php echo e($errors->first('subject')); ?></strong>
									    </span>
									<?php endif; ?>
								</div>

								<div class="form-group">
								    <label for="message" class="control-label">Message:</label><br />
								    <textarea class="form-control" rows="6" name="message"><?php echo e(isset($message) ? $message : ''); ?></textarea>
								</div>

								<div class="col-sm-6">
									<label for="attachment">Attach Image (Optional):</label>
									<input type="file" name="attachment" accept="image/*">
								</div>
								<br />

								<div class="form-group">
								    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
									<a onclick="submitForm(this);" form-id="send-message" form-action="send this message" class="btn btn-lg btn-primary">
									    Send Message
									</a><br /><br />
								    </div>
								</div>
							    </form>
						</div>
					</div>
				  </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>