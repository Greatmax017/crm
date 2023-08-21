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


  <!-- Modal -->
  <div class="modal fade" id="send" role="dialog">
    <div class="modal-dialog">
                <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Money to Another user</h4>
        </div>
        <div class="modal-body">
         <form class="for-control" role ="form" method="POST" action="/admin/add_bundle" >
		 <?php echo e(csrf_field(), false); ?>

		 <label> Product Name </label>
		 <input id="text" placeholder="enter Product Name" type="text" name="name" required><br>
         <label> Enter Product newtwork</label>
		 <input id="network" placeholder="enter network" type="text" name="network" required><br>
		 <label> Enter code </label>
		 <input id="text" placeholder="product Code" type="text" name="code" required><br>
		 <label> Amount to send </label>
		 <input id="price" placeholder="enter price" type="number" name="price" required><br>
		 <center><button type="submit">Add Product</button></center>
		 
		 
		 </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
              <div class="row">
                <div class="col-md-12">
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Products</b></td><td><b><?php echo e($product_count, false); ?></b></td>
                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#send">Send Money</button></tr>
										
										
									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Users</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">
								<form method="get" action="<?php echo e(url('/admin/products'), false); ?>">
								    <div class="input-group">
								      <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Name, newtwork or code">
								      <span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="submit">Search</button>
								      </span>
								    </div>
								    </form>
								  </div>
								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>
											
											<th>Name</th>
											<th>network</th>
											<th>code</th>
											<th>price</th>
                                            <th>update</th>
										</tr>
									</thead>
                                    
									
										<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                                         <!-- The Modal -->
  
  
                                
    
    
                                
      
   
        
										<tr <?php if($u->suspended): ?> class="danger" <?php elseif(!$u->activated): ?> class="warning" <?php endif; ?>>
											<td class="col-md-1"><b><?php echo e($index+1, false); ?></b></td>
											
											<td class="col-md-2">
												<a href="<?php echo e(url('/admin/user/'.$u->id), false); ?>"><?php echo e($u->name, false); ?></a>
                                                
											</td>
											<td class="col-md-2">
											<a href="<?php echo e(url('/admin/user/'.$u->id), false); ?>"><?php echo e($u->network, false); ?></a>
											</td>
											<td class="col-md-1">
                                            <form class="form" role="form" method="POST" action="/admin/update_product">
                                            <input type="text" class="" id="code" value="<?php echo e($u->code, false); ?>" placeholder="Enter code" name="code">
                                            
											</td>
											<td class="col-md-2">
                                            
                                            <?php echo e(csrf_field(), false); ?>

                                            <input type="hidden" name="old_code" value="<?php echo e($u->code, false); ?>" >
                                                <input type="number" class="" id="price" value="<?php echo e($u->price, false); ?>" placeholder="Enter code" name="price">
                                               
											</td>

                                            <td class="col-md-2">
                                                
                                            <button type="submit" >Update</button>
                                                </form>

											</td>
                                            
                                            
										</tr>
                                        
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="2"><center><i>No product exist</i></center></td>
										</tr>
                                       
										
									</tbody>
								</table>
                                
                               
                             
                                <?php endif; ?>
								
							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>