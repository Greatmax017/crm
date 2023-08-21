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
              		
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">Pending kyc</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6 col-lg-offset-6">
										    <form method="GET" action="<?php echo e(url('/admin/transactions'), false); ?>">
											    <div class="input-group">
											     
											  
											    </div>
										    </form>
										  </div>
										</div>
									</div>

									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>User</th>
	                                            <th>Email</th>
	                                            <th>ID</th>
												<th>Detail</th>
												
	                                            <th>Action</th>
	                                            
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td class="col-md-2"><?php echo e($t->fname, false); ?></td>
												<td  class="col-md-1">
													<b><?php echo e($t->email, false); ?></b><br>
												</td>
												<td class="col-md-2"><?php echo e($t->cardtype, false); ?></a>
												
											
												
												
												
											
												</td>
	                                            
	                                            <td class="col-md-2"><a target="_blank" href="/images/<?php echo e($t->cardfront, false); ?>"><?php echo e($t->cardfront, false); ?></a><br>
												<a target="_blank" href="/images/<?php echo e($t->cardback, false); ?>"><?php echo e($t->cardback, false); ?></a>
												</td>
												
	                                            <td class="col-md-2"><b>
												<form method="POST" action="/admin/kyc_approve">
                    <?php echo e(csrf_field(), false); ?>

                
                <input type="hidden" name="id" value="<?php echo e($t->id, false); ?>" >
                <button type="submit"  class="btn btn-sm btn-primary">
										    Approve
										</button>
										
									    </form>
													
												</td>
	                                            
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="3"><center><i>No Pending kyc to verify</i></center></td>
											</tr>
											<?php endif; ?>
										</tbody>
									</table>
									</div>
								
								</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>