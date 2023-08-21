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
											<tr><td><b>Transactions Count</b></td><td><b><?php echo e($transactions_count, false); ?></b></td></tr>
											
											<tr><td><b>Transactions Today</b></td><td><b><?php echo e($transactions_today_count, false); ?></b></td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">All Transactions</div>
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
	                                            <th>Sender/Description</th>
												<th>Detail</th>
												<th>Date</th>
	                                            <th>Status</th>
	                                            
											</tr>
										</thead>
										<tbody>
											<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<tr>
												<td class="col-md-2"><?php echo e(isset($t->id) ? $t->id : '', false); ?></td>
												<td  class="col-md-1">
													<b>&#8358;<?php echo e(number_format($t->amount, 2), false); ?></b><br>
												</td>
												<td class="col-md-2"><a href="<?php echo e(url('/admin/user/'.$t->sender), false); ?>"><?php echo e(isset($t->sender_data->username) ? $t->sender_data->username : "", false); ?></a>
												<br /><a href="<?php echo e(url('/admin/user/'.$t->sender), false); ?>"><?php echo e(isset($t->sender_data->email) ? $t->sender_data->email : "", false); ?></a>
												
												
												
												<br><i><?php echo e($t->description, false); ?></i>
												</td>
	                                            <td class="col-md-3">
	                                            	<?php if($t->receiver != 0): ?>
	                                            	<?php if($t->status == 0): ?>
													<b>Wallet ID:</b> <?php echo e(isset($t->receiver_data->bank) ? $t->receiver_data->bank : '', false); ?> <br />
		                                            <b>Phone:</b> <?php echo e(isset($t->receiver_data->phone) ? $t->receiver_data->phone : '', false); ?>

		                                            <?php else: ?>
		                                            <a href="/admin/user/<?php echo e($t->receiver, false); ?>"><?php echo e(isset($t->receiver_data->name) ? $t->receiver_data->name : "", false); ?></a>
		                                            <?php endif; ?>
		                                            <?php else: ?>
		                                            <b> SYSTEM </b>
		                                            <?php endif; ?>
												</td>
												<td class="col-md-2"><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
	                                            <td class="col-md-2"><b>
													<?php if($t->status == 0): ?>
													<span class="label label-warning">Confirmation Requested</span>
													<?php elseif($t->status == 1): ?>
													<span class="label label-success">Successful</span>
													<?php elseif($t->status == 2): ?>
													<span class="label label-primary">Payout Requested</span>
													<?php elseif($t->status == 3): ?>
													<span class="label label-success">Successful</span>
													<?php else: ?>
													<span class="label label-success">Successful</span>
													<?php endif; ?>
													</b>
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
									<?php echo e($transactions->links(), false); ?>

								</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>