<?php $__env->startSection("custom_css"); ?>

    <style>
        .line-head {
            border-bottom: solid 1px #dddddd;
            margin-top: 0 !important;
            margin-bottom: 15px;
        }
        .screen:not(.active) {
            visibility: hidden !important;
            opacity: 0;
            width: 0;
            padding: 0;
            height: 0;
            overflow: hidden;
            transition: opacity .3s ease-in-out;
        }
        .screen.active {
            opacity: 1;
            transition: opacity .3s ease-in-out;
        }
        .profile-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: #495057;
            background-color: #FFF;
            border-color: #dee2e6 #dee2e6 #FFF;
        } */
/*
        .nav-tabs li a.active {
            border-left: 5px solid #5369f8 !important;
            border-bottom: none !important;
        } */
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-lg-5 py-md-4 py-sm-4 py-3">
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
    <div class="account-pages my-5">
        <div class="container-fluid">
            <div class="row-justify-content-center">
                <div class="h2"><i data-feather="file-text" class="icon-dual"></i>My Profile</div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h4 class="line-head h5 pb-2">Personal Data</h4>
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="/backend/assets/images/users/default.png" class="avatar-sm rounded-circle mr-2" alt="Shreyu"/>
                                    </div>
                                    <div class="col-9 pt-1" style="margin-left: -25px;padding-left: 0;">
                                        <p class="mb-1">
                                            <b>
                                                <?php echo e(Auth::user()->name, false); ?>

                                            </b>
                                        </p>
                                        <p class="my-0">
                                           <?php echo e(Auth::user()->email, false); ?>

                                        </p>
                                        <p class="my-0 text-success">
                                            Active
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card p-3">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link hash-candidate active edit-profile" href="#edit-profile">Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link hash-candidate change-password" href="#change-password">Change Password</a>
                                    </li>
                                </ul>
                                <div class="content pt-3">
                                    <div id="edit-profile" class="screen hash-candidate active">

                                        <form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(action('DashController@save_profile'), false); ?>">
                                                  <?php echo e(csrf_field(), false); ?>

                                                  
                                            <div class="row mb-12" style="width: 100%;">
                                                <div class="col-md-8 offset-2">
                                                    <div class="row">
                                                        <div class="col-md-12 <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                                                            <label>Full Name</label>
                                                            <input class="form-control" type="text" name="name" value="<?php echo e(Auth::user()->name, false); ?>">
                                                            <?php if($errors->has('phone')): ?>
                                                                <span   span class="label label-danger">
                                                                <strong><?php echo e($errors->first('name'), false); ?></strong>
                                                            </span>
                                                            <?php endif; ?>   
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div><br>
                                                    <div class="row">
                                                        <div class="col-md-12 <?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
                                                            <label>Phone Number</label>
                                                            <input class="form-control" type="text" name="phone" value="<?php echo e(Auth::user()->phone, false); ?>">
                                                             <?php if($errors->has('phone')): ?>
                                                                <span   span class="label label-danger">
                                                                <strong><?php echo e($errors->first('phone'), false); ?></strong>
                                                            </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div><br>
                                                    <div class="row">
                                                        <div class="col-md-12 <?php echo e($errors->has('bank') ? ' has-error' : '', false); ?>">
                                                            <label>Bank</label>
                                                            <input class="form-control" type="text" name="bank" value="<?php echo e(Auth::user()->bank, false); ?>">
                                                             <?php if($errors->has('phone')): ?>
                                                                <span   span class="label label-danger">
                                                                <strong><?php echo e($errors->first('bank'), false); ?></strong>
                                                            </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clearfix"></div><br>
                                                    <div class="row">
                                                        <div class="col-md-12 <?php echo e($errors->has('accountno') ? ' has-error' : '', false); ?>">
                                                            <label>Account Number</label>
                                                            <input class="form-control" type="text" name="accountno" value="<?php echo e(Auth::user()->accountno, false); ?>">
                                                             <?php if($errors->has('accountno')): ?>
                                                                <span   span class="label label-danger">
                                                                <strong><?php echo e($errors->first('accountno'), false); ?></strong>
                                                            </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>

                                                      <div class="clearfix"></div><br>
                                                    <div class="row">
                                                        <div class="col-md-12 <?php echo e($errors->has('Pay2') ? ' has-error' : '', false); ?>">
                                                            <label>Skrill,Neteller or PerfectMoney ID (Optional)</label>
                                                            <input class="form-control" type="text" name="pay2" value="<?php if(Auth::user()->pay2 == null): ?> Null <?php else: ?> <?php echo e(Auth::user()->pay2, false); ?> <?php endif; ?> ">
                                                             <?php if($errors->has('pay2')): ?>
                                                                <span   span class="label label-danger">
                                                                <strong><?php echo e($errors->first('pay2'), false); ?></strong>
                                                            </span>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div><br>
                                                    <div class="row">
                                                     <div class="col-md-12 <?php echo e($errors->has('withdrawal_method') ? ' has-error' : '', false); ?>">
                                                     <label>Withdrawal Method</label>
                                                        <select class="form-control" name="withdrawal_method">
                                                        <option>Please select</option>
                                                            <option value="Bank Transfer">Bank Transfer</option>
                                                            <option value="Skrill">Skrill</option>
                                                            <option value="Neteller">Neteller</option>
                                                            <option value="Perfect Money">Perfect Money</option>	
                                                        </select>
                                                            <?php if($errors->has('withdrawal_method')): ?>
                                                                <span   span class="label label-danger">
                                                                <strong><?php echo e($errors->first('withdrawal_method'), false); ?></strong>
                                                            </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                        </div>


                                                   


                                                    <div class="clearfix"></div><br>
                                                    <input type="text" value="profile_update" name="control" hidden>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row mb-12">
                                                <div class="col-md-12">
                                                      
                                                   <a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn_purple"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                                            Save
                                        </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="change-password" class="hash-candidate screen">
                                        <form action="#" method="POST" onSubmit="return checkPassword(this)">
                                            <?php echo e(csrf_field(), false); ?>

                                            <div class="col-8 offset-2">

                                            <label class=" control-label">Current Password</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class=" fa fa-lock"></i></span></div>
                                                    <input class="form-control" name="current_password" type="password" required>
                                                </div>
                                            </div>
                                            <label class="control-label">New Password</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class=" fa fa-lock"></i></span></div>
                                                    <input id="password" class="form-control" name="new_password" type="password" required minlength="6">
                                                </div>
                                            </div>
                                            <label class="control-label">Confirm New Password</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class=" fa fa-lock"></i></span></div>
                                                    <input id="passwordr" class="form-control" name="new_password_confirmation" type="password" required minlength="6">
                                                </div>
                                                <div class="invalid-feedback">
                                                    New Password and confirm new password must be the same
                                                </div>
                                            </div>
                                        
                                            <div class="d-flex justify-content-center">
                                            <button class="btn btn_purple" type="submit">Update Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>
<script>
    var navigation = () => {
    var locationHash = window.location.hash || "#edit-profile";
    $(".hash-candidate").removeClass("active");
    $(locationHash).addClass("active");
    if (locationHash === "#change-password") {
        $(".change-password").addClass("active");
    } else {
        $(".edit-profile").addClass("active");
    }
    };
    window.onhashchange = navigation;
    navigation();

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>