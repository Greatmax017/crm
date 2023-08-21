<?php $__env->startSection('content'); ?>





        <!-- uiView: -->
        <div ui-view="" style="height: 100vh;" class="ng-scope"><div class="home-center ng-scope">
    <div class="home-desc-center">

        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 py-3">


                                




                               

                        


                        <form class="form-horizontal mt-4 pt-2 ng-pristine "   method="POST" action="<?php echo e(url('/register'), false); ?>" >
                        <?php echo e(csrf_field(), false); ?>

                                <div class="twitter-bs-wizard">


                                    <div ng-show="registerStep==&#39;step1&#39;">
                                        <h4 class="header-title mb-4 ng-binding">Account information</h4>
                                        <div class="row mt-1 mb-1">
                                            <p class="text-warning">* Field is required.</p>
                                        </div>

                                        <?php if(session('error-status')): ?>
                                <center>
                                <div class="btn btn-danger">

                                 
                                  <b>Error: &nbsp </b> <?php echo e(session('error-status'), false); ?>

                                </div>
                            </div>
                            </center>
                                <?php endif; ?>

                                <?php if(session('success-status')): ?>
                                <center>
                                <div class="btn btn-success">

                                   
                                  <?php echo e(session('success-status'), false); ?>

                                </div>
                                </center>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($errors->has('password')): ?>
						<div class="btn btn-danger">				    
						<strong><?php echo e($errors->first('password'), false); ?></strong>	
                        </div>					
						<?php endif; ?>

                       
                         <?php if($errors->has('email')): ?>
                         <div class="btn btn-danger">				    
						<strong><?php echo e($errors->first('email'), false); ?></strong>
                        </div>  						
						<?php endif; ?>
                        <?php if($errors->has('name')): ?>
                        <div class="btn btn-danger">
											    
                        <strong><?php echo e($errors->first('name'), false); ?></strong>	
                        </div>					
                        <?php endif; ?>
                        <?php if($errors->has('phone')): ?>
                        <div class="btn btn-danger">
                        
                        <strong><?php echo e($errors->first('phone'), false); ?></strong>		
                        </div>				
                        <?php endif; ?>

											
                      
                        
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="ng-binding">Email*</label>

                                                <input class="form-control ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required" id="email" autocomplete="on" type="email" name="email"  required="" data-msg-required=" *Mailbox is required"  aria-required="true">
                                            </div>
                                            <div class="mb-3">
                                                <label class="ng-binding">Confirm Login Email*</label>

                                                <input class="form-control ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required" autocomplete="off" equalto="#email" data-msg-equalto=" The mailbox entered for the two time is inconsistent" type="email" name="reemail" ng-model="registerform.reemail" required="" data-msg-required="This field is required" email="" data-msg-email=" Illegal email address" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sname" class="ng-binding"> First Name*</label>
                                                    <input type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="fname"  required="" data-msg-required="This field is required" autocomplete="off" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="surname" class="ng-binding"> Last Name*</label>
                                                    <input type="text" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" ng-model="registerform.surname" name="surname"  required="" data-msg-required="This field is required" autocomplete="off" aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="ng-binding">Phone*</label>
                                                    <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" autocomplete="off" required="" data-msg-required="* The phone number cannot be empty" name="phone" type="text" ng-model="registerform.phone" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="ng-binding">Agent code</label>
                                                    <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" autocomplete="off" data-val="true" ng-model="registerform.agentCode" id="agentCode" name="agentCode" type="text" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="ng-binding">Password</label>
                                                <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" data-rule-pass="true" data-msg-pass="Must contain numbers and letters" autocomplete="off" type="password" ng-model="registerform.password" minlength="6" id="password" maxlength="20" data-msg-required="This field is required" data-msg-maxlength=" Password length is not more than 20 characters " data-msg-minlength=" Password length no less than 6 characters" name="password" required="" aria-required="true">

                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="ng-binding">Confirm Password</label>
                                                <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" data-rule-pass="true" data-msg-pass="Must contain numbers and letters" autocomplete="off" data-msg-required="This field is required" equalto="#password" data-msg-equalto=" The two password input is inconsistent" type="password" ng-model="registerform.passwordagain" minlength="6" maxlength="20" data-msg-maxlength=" Password length is not more than 20 characters " data-msg-minlength=" Password length no less than 6 characters" name="password_confirmation" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="ng-binding">Certificate Card Type：</label>
                                                    
                                                    <select name="cardtype" ng-if="Language!=&#39;zh&#39;" class="form-select ng-pristine ng-untouched ng-scope ng-empty ng-invalid ng-invalid-required" id="sfz" name="sfz" ng-model="registerform.cardtype">
                                                        <option value=""></option>
                                                        <option value="Identity Card">Identity Card</option>
                                                        <option value="Hong Kong and Macao id card">Hong Kong and Macao Id Card</option>
                                                        <option value="Passport">Passport</option>
                                                        <option value="driving licence">Driving Licence</option>
                                                    </select><!-- end ngIf: Language!='zh' -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="ng-binding">Certificate Card Number：</label>
                                                    <input class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-minlength ng-valid-maxlength" autocomplete="off" type="text" ng-model="registerform.cardnumber" name="cardnumber" id="hm" minlength="7" data-msg-minlength="Cardnumber length no less than 7 characters" maxlength="18" data-msg-maxlength="Cardnumber length is not more than 20 characters" data-rule-card="true" data-msg-card="Consisting of numbers and letters"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="ng-binding"> Front view of ID card：</label>
                                                <label for="cardfront" language="en" dir-data="registerform.cardfront" class="cardfront ng-isolate-scope" file-upload="commondialogOption" data-config="{&quot;card&quot;:&quot;cardfront&quot;,&quot;type&quot;:&quot;imgchoose&quot;,&quot;max-size&quot;:&quot;&quot;,&quot;shows&quot;:&quot;.imga&quot;,&quot;triggerCls&quot;:&quot;.show_btn&quot;,&quot;fileClass&quot;:&quot;.front&quot;}">
                                                    <!-- ngIf: !registerform.cardfront --><span ng-if="!registerform.cardfront" class="btn btn-success ng-binding ng-scope">Upload</span><!-- end ngIf: !registerform.cardfront -->
                                                    <!-- ngIf: registerform.cardfront -->
                                                </label>
                                                <input style="opacity: 0;" class="front form-control file-opacity ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"  type="file" ng-model="registerform.cardfront" name="cardfront" >
                                            </div>
                                            <div class="mb-3">
                                                <label class="ng-binding"> Back view of the ID card：</label>
                                                <label for="cardnagitive" language="en" dir-data="registerform.cardnagitive" class="cardnagitive ng-isolate-scope" file-upload="commondialogOption" data-config="{&quot;card&quot;:&quot;cardnagitive&quot;,&quot;type&quot;:&quot;imgchoose&quot;,&quot;max-size&quot;:&quot;&quot;,&quot;shows&quot;:&quot;.imgas&quot;,&quot;triggerCls&quot;:&quot;.cardshow_btn&quot;,&quot;fileClass&quot;:&quot;.nagitive&quot;}">
                                                    <!-- ngIf: !registerform.cardnagitive --><span ng-if="!registerform.cardnagitive" class="btn btn-success ng-binding ng-scope">Upload</span><!-- end ngIf: !registerform.cardnagitive -->
                                                    <!-- ngIf: registerform.cardnagitive -->
                                                </label>
                                                <input style="opacity: 0;" class="nagitive form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" type="file" ng-model="registerform.cardnagitive" name="cardback" id="cardnagitive"  >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="fm-label f-fl ng-binding">Currency Type：</label>
                                                <label>
                                                    <input  data-msg-required="This field is required" ng-model="currencyRegiste" name="currency" type="radio" value="AUD" class="ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" aria-required="true">
                                                    <span class="ng-binding">AUD</span>
                                                </label>
                                                <label>
                                                    <input  data-msg-required="This field is required" ng-model="currencyRegiste" name="currency" type="radio" value="USD" class="ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" aria-required="true">
                                                    <span class="ng-binding">USD</span>
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                                   

                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        
                                        <li class="float-end">
                                            
                                            <button type="submit" class="btn btn-primary">Open account <i class="mdi mdi-arrow-right ms-1"></i></button></li>
                                            
                                    </ul>


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


</div>
        
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>