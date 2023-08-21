<?php $__env->startSection('content'); ?>


	
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      
          	
				 <?php if(session('error-status')): ?>
                <div class="alert alert-danger">
                
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
                    <b>Error: &nbsp </b> <?php echo e(session('error-status'), false); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if(session('success-status')): ?>
                <div class="alert alert-success">
                
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                    <?php echo e(session('success-status'), false); ?>

                </div>
            </div>
        <?php endif; ?>

													
													
                <div class="grid grid-cols-12 gap-6">
                    
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    
                                    General Report
                                </h2>
                                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                            </div>
                 <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="hash" class="report-box__icon text-theme-10"></i> 
                                                <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="Add Funds To Wallet"><a href="/add_money"> Add Fund</a> <i data-feather="plus" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">&#8358;<?php echo e(number_format( Auth::user()->balance, 2), false); ?> </div>
                                            <div class="text-base text-gray-600 mt-1">Wallet Balance</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i> 
                                                <div class="ml-auto">
                                                    
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">&#8358;<?php echo e(number_format( Auth::user()->bonus, 2), false); ?> </div>
                                            <div class="text-base text-gray-600 mt-1">Bonus</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="align-justify" class="report-box__icon text-theme-12"></i> 
                                                <div class="ml-auto">
                                                    
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">&#8358;<?php echo e(number_format(\App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [1])->sum('amount'), 2), false); ?></div>
                                            <div class="text-base text-gray-600 mt-1">Total Transaction</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="users" class="report-box__icon text-theme-9"></i> 
                                                <div class="ml-auto">
                                                    <!-- <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4"></i> </div> -->
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"><?php echo e($ref_count, false); ?></div>
                                            <div class="text-base text-gray-600 mt-1">Referral</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                       
                           
                            <!-- BEGIN: Important Notes -->
                            <!-- <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-auto">
                                        Important Notes
                                    </h2>
                                    <button data-carousel="important-notes" data-target="prev" class="slick-navigator button px-2 border border-gray-400 flex items-center text-gray-700 mr-2"> <i data-feather="chevron-left" class="w-4 h-4"></i> </button>
                                    <button data-carousel="important-notes" data-target="next" class="slick-navigator button px-2 border border-gray-400 flex items-center text-gray-700"> <i data-feather="chevron-right" class="w-4 h-4"></i> </button>
                                </div>
                                <div class="mt-5 intro-x">
                                    <div class="slick-carousel box zoom-in" id="important-notes">
                                        <div class="p-5">
                                            	<?php $__empty_1 = true; $__currentLoopData = \App\Post::latest()->limit(20)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="text-base font-medium truncate"><a href="/blog/<?php echo e($news->url, false); ?>"><?php echo e($news->title, false); ?> </a> <?php if($news->created_at->isToday()): ?> <small style="color:red;"><b>*NEW*</b></small> <?php endif; ?></div>
                                            <div class="text-gray-500 mt-1"><?php echo e($news->created_at, false); ?></div>
                                            <div class="text-gray-600 text-justify mt-1"></div>
                                            <div class="font-medium flex mt-5">
                                                <a type="button" class="button button--sm bg-gray-200 text-gray-600" href="/blog/<?php echo e($news->url, false); ?>">Read more</a>
                                                
                                            </div>
                                        </div>
                                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
															<center>
																	<br>
																	<i>No recent news . We are sure to keep you updated on recent activities</i>
															</center>
											<?php endif; ?>
                                    </div>
                                </div> -->
                            
                        
                            <!-- END: Important Notes -->




                            
  
                    </div>
      
                </div>


            <div class="px-5 sm:px-16 py-10 sm:py-20">
                        <div class="overflow-x-auto">
                            <table class="table">
                               <h2 class="text-lg font-medium truncate mr-auto">Latest  5 Transactions</h2>
                                <thead>
                                    <tr>
                                        <!-- <th class="border-b-2 whitespace-no-wrap">DESCRIPTION</th> -->
                                        <th class="border-b-2 whitespace-no-wrap">ID</th>
                                        <th class="border-b-2 whitespace-no-wrap">DATE</th>
                                        <th class="border-b-2 whitespace-no-wrap">PRODUCT</th>
                                        <th class="border-b-2 whitespace-no-wrap">AMOUNT</th>
                                        <th class="border-b-2 whitespace-no-wrap">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                                    <tr>
                                        <!-- <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap">Midone HTML Admin Template</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">Regular License</div>
                                        </td> -->
                                                                          
                                           <td class=" border-b w-32"><?php echo e(substr($t->id, 0, 13), false); ?></td>
                                        <td class=" border-b w-32"><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
                                        <td class="border-b w-32 font-medium"><?php echo e($t->description, false); ?> <?php if($t->beneficiary !=null): ?> to <?php echo e($t->beneficiary, false); ?> <?php endif; ?></td>
                                        <td class="border-b w-32 font-medium">&#8358;<?php echo e(number_format($t->amount, 2), false); ?></td>
                                        <td class="border-b w-32 font-medium"><button class="button w-24 mr-1 mb-2 bg-theme-9 text-white"> Successful </button></td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p>No Transactions yet, Fund your account to begin</p>
                                    </tr>
                                    <?php endif; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
       
            <!-- END: Content -->

    
    </body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>