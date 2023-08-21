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
              <div class="row">
              		<div class="col-md-12">
						<div class="col-md-12">
	              			<div class="panel panel-default">
								<div class="panel-heading">Statistics</div>
								<div class="panel-body">
									<div class="col-md-12">
										<table class="table table-condensed">
											
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">All Withdrawals</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-6 col-lg-offset-6">
										    <form method="GET" action="<?php echo e(url('/admin/transactions'), false); ?>">
											    <div class="input-group">
											      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Transaction ID or Email">
											      <span class="input-group-btn">
												<button class="btn btn-sm btn-default" type="submit">Search</button>
											      </span>
											    </div>
										    </form>
										  </div>
										</div>
									</div>

									<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
	                                            <th>Amount</th>
	                                            <th>user</th>
												
												<th>status</th>
	                                            <th>action</th>
	                                            
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td class="col-md-2">NFS<?php echo e(isset($t->id) ? $t->id : '', false); ?></td>
												<td  class="col-md-1">
													<b>$<?php echo e(number_format($t->amount, 2), false); ?></b><br>
												</td>
												
	                                            
												<td class="col-md-2"><a href="/admin/user/<?php echo e($t->sender, false); ?>"><?php echo e($t->sender, false); ?></a></td>
	                                            <td class="col-md-2"><b>
												<?php echo e($t->status, false); ?>

													
												</td>
												<td class="col-md-2"><b>
											    <form method="POST" action="with_update">
											        <?php echo e(csrf_field(), false); ?>

											        <input type="hidden" name="id" value="<?php echo e($t->id, false); ?>">
												<select class="" name="status">
											
												    <option value="Pending Audit">Pending Audit</option>
												    <option value="Not Audited">Not Audited</option>
												    <option value="Audited">Audited</option>
												    
												</select>
												<button type="submit" class="btn btn-primary">Update</button>
												</form>	
												</td>
	                                            
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<tr>
												<td colspan="3"><center><i>No Transactions</i></center></td>
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