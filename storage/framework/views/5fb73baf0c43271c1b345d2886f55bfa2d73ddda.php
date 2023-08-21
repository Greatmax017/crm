<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alstom Capitals | Payment</title>
    <link href="/asset/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media  only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="/img/logo/alstomfxlogo.jpg" style="width:100%; max-width:100px;">
                            </td>

                            <td>
                                Invoice #<br>
                                Created: <?php echo e(Carbon\Carbon::now()->toDayDateTimeString(), false); ?><br>
                                Due: <?php echo e(Carbon\Carbon::now()->addDays(1)->toDayDateTimeString(), false); ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <a href="www.alstomfx.com">Alstomfx</a>, <br />
                                Ikeja, Lagos, Nigeria. <br />
                                <a href="mailto:info@alstomfx.com" class="">info@alstomfx.com</a><br />
                                +234810545855
                            </td>

                            <td style="font-size:14.5px;line-height:20px;">
                                <?php echo e(Auth::user()->name, false); ?><br>
                                <span id="payer_email"><?php echo e(Auth::user()->email, false); ?></span><br>
                                <span id="payer_phone"><?php echo e(preg_replace('/^0/', '+234', Auth::user()->phone), false); ?></span><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="alert alert-danger" style="display:none;">
                        <center>Transaction Error</center>
                    </div>
                    <div class="alert alert-success" style="display:none;">
                        <center>Payment Successful</center>
                    </div>
                </td>
            </tr>
            <?php if(!session('success-status')): ?>
            <tr class="heading payment">
                <td>
                    Payment Method
                </td>

                <td>
                    Check #
                </td>
            </tr>

            <tr class="details payment">
                <td>
                    Paystack(Mastercard/Verve/Visa/Bank Transfer)
                </td>
                

                <td>
                    
                    <form method="post" action="/pay" accept-charset="UTF-8" class="form-horizontal" role="form">
                      <?php echo e(csrf_field(), false); ?>


                        <input type="hidden" name="email" value="otemuyiwa@gmail.com"> 
                        <input type="hidden" name="orderID" value="345">
                         <?php $__empty_1 = true; $__currentLoopData = $active_shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <input type="hidden" name="amount" value="<?php echo e(number_format((float)$t->amount, 2), false); ?>"> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>None</p>
                        <?php endif; ?>
                        <input type="hidden" name="quantity" value="3">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['key_name' => 'value',]), false); ?>" > 
                        <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef(), false); ?>"> 
                    
                    <button class="btn btn-sm btn-primary" type="submit" value="Pay Now!" id="Pay-Now">Pay Now</button>
                    </form>
                </td>

            </tr>
            

            <tr class="details payment">
                <td>
                    Bank Transfer
                <br />
                 0127628304 <br />
                    Gtbank<br />
                    Alstom Fx
                </td>
               
                <td>
                    
                </td>
            


                <td>
                    
                </td>
                
            </tr>
            <?php endif; ?>
            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Price
                </td>
            </tr>

            <tr class="item">
                <td>
                    Investment
                </td>
            <?php $__empty_1 = true; $__currentLoopData = $active_shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <td>
                    &#8358;<?php echo e(number_format((float)$t->amount, 2), false); ?>

                </td>
            

            </tr>
<!--
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>

                <td>
                    $75.00
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>

                <td>
                    $10.00
                </td>
            </tr>
-->
            <tr class="total">
                <td></td>

                <td>
                   Total: &#8358;<?php echo e(number_format((float)$t->amount, 2), false); ?>

                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>None</p>
            <?php endif; ?>
            </tr>
        </table>
    </div>
    <br>
    <center><a class="btn btn-primary" href="#" onclick="window.print();">Print</a> <a class="btn btn-default" href="/dashboard">Back to Dashboard</a></center>
    <br>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://checkout.simplepay.ng/simplepay.js"></script>
    <script type="text/javascript" src="/asset/js/payment.js"></script>
</body>
</html>
