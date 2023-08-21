<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('pay'), false); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Lagos Eyo Print Tee Shirt
                    ₦ 2,950
                </div>
            </p>
            <input type="hidden" name="email" value="otemuyiwa@gmail.com"> 
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800"> 
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['key_name' => 'value',]), false); ?>" > 
            <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef(), false); ?>"> 
            <?php echo e(csrf_field(), false); ?> 

            <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>"> 

            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>