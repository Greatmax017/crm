<?php $__env->startSection('content'); ?>
<body>
	<div id="wrapper">
		<?php echo $__env->make('sections.d_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('sections.adminsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-default">
							<div class="panel-heading"><?php echo e($currency, false); ?> Account Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
								    
								    <?php if($currency == 'usd'): ?>
									<table class="table">
										<tbody>
										    <form method="POST" action="/admin/update_account">
										        	<?php echo e(csrf_field(), false); ?>

											<tr><td><b>Account Name:</b> <?php echo e($account->usdaccountname, false); ?> </td><td><input name="accountname"  type="text" placeholder="enter account name" > <br /> </td></tr>
											<tr><td><b>Account Number:</b><?php echo e($account->usdaccountnumber, false); ?></td><td><b> </b>
                                            <input type="hidden" name="id" value="<?php echo e($currency, false); ?>">
											<input name="accountnumber"  type="text" placeholder="enter account number" >
											</td></tr>


											<tr><td><b>BIC/SWIFT Code:</b><?php echo e($account->usdswiftcode, false); ?></td><td><input name="swiftcode"  type="text" placeholder="enter swiftcode" ></td></tr>

											<tr><td><b>Bank Name:</b><?php echo e($account->usdbankname, false); ?></td><td><b> </b>
											<input name="bankname"  type="text" placeholder="enter bank name" >
											</td>
										</tr>
										<tr><td><b>Bank Address:</b><?php echo e($account->usdbankaddress, false); ?></td><td><b> </b>
											<input name="bankaddress"  type="text" placeholder="enter bank address" >
											</td>
										</tr>

											
											<tr><td><b>Beneficiary Address:</b><?php echo e($account->usdbenaddress, false); ?></td><td><b></b>
											<input name="benaddress"  type="text" placeholder="enter beneficiary address"></td></tr>
                                            
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<button type="submit"  class="btn btn-sm btn-primary">
										    Save all
										</button><br /><br />
									    </div>
									</div>
									</form>
								</div>
								
								<?php elseif($currency == 'gbp'): ?>
								
								<table class="table">
										<tbody>
										    <form method="POST" action="/admin/update_account">
										        	<?php echo e(csrf_field(), false); ?>

											<tr><td><b>Account Name:</b> <?php echo e($account->gbpaccountname, false); ?> </td><td><input name="accountname"  type="text" placeholder="enter account name" > <br /> </td></tr>
											<tr><td><b>Account Number:</b><?php echo e($account->gbpaccountnumber, false); ?></td><td><b> </b>
                                            <input type="hidden" name="id" value="<?php echo e($currency, false); ?>">
											<input name="accountnumber"  type="text" placeholder="enter account number" >
											</td></tr>


											<tr><td><b>BIC/SWIFT Code:</b><?php echo e($account->gbpswiftcode, false); ?></td><td><input name="swiftcode"  type="text" placeholder="enter swiftcode" ></td></tr>

											<tr><td><b>Bank Name:</b><?php echo e($account->gbpbankname, false); ?></td><td><b> </b>
											<input name="bankname"  type="text" placeholder="enter bank name" >
											</td>
										</tr>
										<tr><td><b>Bank Address:</b><?php echo e($account->gbpbankaddress, false); ?></td><td><b> </b>
											<input name="bankaddress"  type="text" placeholder="enter bank address" >
											</td>
										</tr>

											
											<tr><td><b>Beneficiary Address:</b><?php echo e($account->gbpbenaddress, false); ?></td><td><b></b>
											<input name="benaddress"  type="text" placeholder="enter beneficiary address"></td></tr>
                                            
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<button type="submit"  class="btn btn-sm btn-primary">
										    Save all
										</button><br /><br />
									    </div>
									</div>
									</form>
								</div>
								
								<?php else: ?> 
								
								<table class="table">
										<tbody>
										    <form method="POST" action="/admin/update_account">
										        	<?php echo e(csrf_field(), false); ?>

											<tr><td><b>Account Name:</b> <?php echo e($account->euraccountname, false); ?> </td><td><input name="accountname"  type="text" placeholder="enter account name" > <br /> </td></tr>
											<tr><td><b>Account Number:</b><?php echo e($account->euraccountnumber, false); ?></td><td><b> </b>
                                            <input type="hidden" name="id" value="<?php echo e($currency, false); ?>">
											<input name="accountnumber"  type="text" placeholder="enter account number" >
											</td></tr>


											<tr><td><b>BIC/SWIFT Code:</b><?php echo e($account->eurswiftcode, false); ?></td><td><input name="swiftcode"  type="text" placeholder="enter swiftcode" ></td></tr>

											<tr><td><b>Bank Name:</b><?php echo e($account->eurbankname, false); ?></td><td><b> </b>
											<input name="bankname"  type="text" placeholder="enter bank name" >
											</td>
										</tr>
										<tr><td><b>Bank Address:</b><?php echo e($account->eurbankaddress, false); ?></td><td><b> </b>
											<input name="bankaddress"  type="text" placeholder="enter bank address" >
											</td>
										</tr>

											
											<tr><td><b>Beneficiary Address:</b><?php echo e($account->eurbenaddress, false); ?></td><td><b></b>
											<input name="benaddress"  type="text" placeholder="enter beneficiary address"></td></tr>
                                            
											
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<button type="submit"  class="btn btn-sm btn-primary">
										    Save all
										</button><br /><br />
									    </div>
									</div>
									</form>
								</div>
								
								<?php endif; ?>
								<!--<div class="col-md-6">-->
								<!--	<div class="form-group">-->
								<!--	    <div style="margin-top:20px;" class="col-md-6 text-center">-->
								<!--		<a href="<?php echo e(url()->previous(), false); ?>" class="btn btn-sm btn-primary">-->
								<!--		    Return back-->
								<!--		</a><br /><br />-->
								<!--	    </div>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
							
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>