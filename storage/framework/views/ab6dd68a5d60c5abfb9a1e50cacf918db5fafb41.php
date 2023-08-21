<?php $__env->startSection("custom_css"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
                <center> <?php echo e(session('success-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>

<div class="content">
    <div class="container-fluid">
        <div class="mb-0 d-flex justify-content-between align-items-center page-title">
            <div class="h4"><i data-feather="file-text" class="icon-dual"></i> Transaction Center</div>
            
        </div>
        
        <div class="card mt-0">
            <div class="card-header">
                <div class="h5">All Transactions</div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-data">
                    <table id="transactionTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(substr($t->id, 0, 13), false); ?></td>
                                <td>&#8358; <?php echo e(number_format($t->amount, 2), false); ?></td>
                                <td><?php echo e($t->description, false); ?></td>
                                <td><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
                                <td>
                                    <b>
                                             <?php if($t->status == 0): ?>
                                            <span class="badge badge-warning">Confirmation Requested</span>
                                            <?php elseif($t->status == 1): ?>
                                            <span class="badge badge-warning">active (<?php echo e($t->days, false); ?>)</span>
                                            <?php elseif($t->status == 2): ?>
                                            <span class="badge badge-primary">Can be Withdrawn</span>
                                            <?php elseif($t->status == 3): ?>
                                            <span class="badge badge-success">Paid</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Failed</span>
                                            <?php endif; ?>
                                    </b>
                                </td>
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td <center><i>No Transactions yet</i></center></td>
                                    </tr>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="/backend/assets/build/js/intlTelInput.js"></script>
    <script>
        $(document).ready(function () {
            $('#transactionTable').DataTable();
        });

    </script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>