<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\CustomAccountActivated;
use App\Notifications\SharePurchased;
use App\Notifications\ShareRequest;
use App\Http\Controllers\Notification;
use App\Notifications\ProfitPaid;
use App\Notifications\ProfitPaidNew;
use App\Notifications\DepositSubmitted;
use App\Notifications\WithdrawalSubmitted;
use App\Notifications\EmailNotifyAll;
use App\Notifications\cablenotify;
use App\Post;
use App\Mail\withdrawalnotice;
use App\Transaction;
use App\mtn_data;
use App\airtime;
use App\Coupon;
use App\Setting;
use App\Message;
use App\Bank;
use App\User;
use App\Trade;
use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;

/*use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction as CoinbaseTransaction;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Client as CoinbaseClient;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;//*/

use Auth;
use DB;
use Hash;
use Telegram;

class DashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

      



        $settings = Setting::first();
        //$active_shares = Transaction::where('sender', Auth::user()->id)->where('created_at', '<=', \Carbon\Carbon::now()->subDays(15)->toDateTimeString())->latest()->get();
        $active_shares = Transaction::where('amount', '>', 0)->where('sender', Auth::user()->id)->whereIn('status', [0,1,2])->latest()->get();
        $total_interest = ($active_shares);
        $next_share = null;
        foreach ($active_shares as $key => $value) {
            if($value->status == 1 && $value->plan == 0){
                $value->current_value = round( ($value->amount * $value->days * 0.91/100), 2);
            }else{
                $value->current_value = 0;
            }
        }
        $ref_count =  User::where('referrer_id', Auth::user()->id)->count();
        $transactions = Transaction::where('sender', Auth::user()->id)->orwhere('receiver', Auth::user()->id)->latest()->paginate(5);

      $users = User::where('referrer_id', Auth::user()->id)->latest()->paginate(3);
      $post = Post::where('id', 6)->first();
      $transactions_count = Transaction::where('sender', Auth::user()->id)->count();
      $trades = Trade::where('status', 0)->where('user', Auth::user()->id)->latest()->paginate(20);
      $ongoing_trades = Trade::where('status', 1)->where('user', Auth::user()->id)->latest()->paginate(10);
      // $pre_profit =Trade::where('status', 0)->where('user', Auth::user()->id)->get();
      $profit = 1000;
     
      
      $net = Auth::user()->net;
      if ($net != 0){
          $percentage = ($profit / $net) * 100;
      } else {
          $percentage = 0;
      }
      



        return view('dashboard', ['active_shares' => $active_shares, 'post'=>$post, 'transactions_count' => $transactions_count, 'profit' => $profit, 'percentage' => $percentage, 'transactions'=>$transactions, 'trades' => $trades, 'ongoing_trades' => $ongoing_trades, 'total_interest' => $total_interest, 'users' => $users, 'ref_count' => $ref_count, 'settings' => $settings]);

    }

    public function messagebox(){
    	$messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	$messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('messagebox', ['messages' => $messages, 'messages_sent' => $messages_sent]);
    }
    public function deposit(Request $request){
        $user = Auth::user();
    	$amount = $request->amount;
      
        $trx = New Coupon;
        $trx->amount = $amount;
        $trx->code = $user->id;
        $trx->status = 'Not Audited';
        $trx->network = $request->network;
        $trx->save();
        //send email
        try {
        $admin = New User;
        $admin->email = "deposit@neptunefx.net";
        $admin->name = "NeptuneFX";
        $admin->notify(new DepositSubmitted());

        }
        catch(Exception $e) {
            info("Error: ". $e->getMessage());
        }
        return redirect('/erc20payaddress');
    }
     public function hash(Request $request){
        $user = Auth::user();
    	
        $coupon = coupon::where('id', $request->id)->first();
        
     
        $coupon->hash = $request->hash;
        $coupon->status = 'Pending Audit';
        $coupon->save();

        return redirect('/record')->with('success-status', 'Deposit submited successfully');
    }
    
    public function pop(Request $request){
        $user = Auth::user();
    	
        $coupon = coupon::where('id', $request->id)->first();
        
     
        
        
         if ($request->photo != null){
        $coupon->hash = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('images'), $coupon->hash);
        }
        $coupon->status = 'Pending Audit';
        $coupon->save();

        return redirect('/record')->with('success-status', 'Deposit submited successfully');
    }
    public function profilepic(Request $request){
        $user = Auth::user();
    	
        
        
     
        
        
         if ($request->photo != null){
        $user->pic = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('images'), $user->pic);
        }
        
        $user->save();

        return redirect()->back();
    }
    

    
    
    
     public function kycupload(Request $request){
        $user = Auth::user();
    	
        
        
     
        $user->cardtype = $request->cardtype;
        $user->cardnumber = $request->cardnumber;
        
        
         if ($request->cardfront != null){
        $user->cardfront = $request->cardfront->getClientOriginalName();
        $request->cardfront->move(public_path('images'), $user->cardfront);
        
        $user->cardback = $request->cardback->getClientOriginalName();
        $request->cardback->move(public_path('images'), $user->cardback);
        }
        $user->kyc = 'Pending';
        $user->save();

        return redirect()->back()->with('success-status', 'Identity verifaction uploaded!');
    }
    
    public function fiatdeposit(Request $request){
        $user = Auth::user();
    	$amount = $request->amount;
      
        $trx = New Coupon;
        $trx->amount = $amount;
        $trx->code = $user->id;
        $trx->status = 'Not Audited';
        $trx->network = $request->currency;
        $trx->save();

        return redirect('/fiataddress');
    }
    
     public function linkmt(Request $request){
        $user = Auth::user();
    	
    	if ($request->mt4 != $user->mt4){
    	     return redirect()->back()->with('error-status', 'Incorrect MT4 details');
    	}
    	
    	if ($request->mt4password != $user->mt4password){
    	     return redirect()->back()->with('error-status', 'Incorrect MT4 details');
    	}
    	
    	$user->link = 1;
    	$user->save();
    	
    	 return redirect()->back()->with('success-status', 'You have successfully Linked your MT4 to real server!');
      
       
    }

    public function applywithdraw(Request $request){
        $user = Auth::user();
    	$amount = $request->amount;
      
        if ($user->balance < $amount){
            return redirect()->back()->with('error-status', 'Insufficient balance');
        }

        $trx = New Transaction;
        $trx->amount = $amount;
        $trx->sender = $user->id;
        $trx->method = $request->method;
        $trx->status = 'Not Audited';
        $trx->network = $request->network;
        $trx->address = $request->address;
        $trx->save();

        //send email
        try {
            $admin = New User;
        $admin->email = "withdrawal@neptunefx.net";
        $admin->name = "NeptuneFX";
        $admin->notify(new WithdrawalSubmitted());

        }
        catch(Exception $e) {
            info("Error: ". $e->getMessage());
        }
        

        return redirect()->back()->with('success-status', 'Withdrawal Application Submitted Successfully, Please Check your email for further instructions');
    }

    public function airtime(){
    		$network = airtime::get();
        return view('airtime', ['airtime'=> $network]);
    }
    public function bankdeposit(){
        
    return view('bankdeposit');
}
public function Accountset(){
        
    return view('Accountset');
}
public function kyc(){
    $user = Auth::user();
        
    return view('kyc', ['user' => $user]);
}
public function ApplyWithdrawals(){
    $user = Auth::user();
        
    return view('ApplyWithdrawal', ['user' => $user]);
}
public function payoptions(){
    $user = Auth::user();
        
    return view('payoptions', ['user' => $user]);
}
public function usdpayamount(){
    $user = Auth::user();
        
    return view('usdpayamount', ['user' => $user]);
}
public function usdtpayamount(){
    $user = Auth::user();
        
    return view('usdtpayamount', ['user' => $user]);
}

public function fiat($id){
    $user = Auth::user();
    
        
    return view('fiatamount',  ['user' => $user, 'id' => $id]);
}


public function record(){
    $user = Auth::user();
    $record = coupon::where('code', $user->id)->latest()->get();
        
    return view('record', ['user' => $user, 'record' => $record]);
}
public function withrecord(){
    $user = Auth::user();
    $record = Transaction::where('sender', $user->id)->get();
        
    return view('withrecord', ['user' => $user, 'record' => $record]);
}
public function erc20payaddress(){
    $user = Auth::user();
    $trx = coupon::where('code', $user->id)->latest()->first();
    $a = setting::first();
        
    return view('erc20payaddress', ['user' => $user, 'a' => $a, 'trx' => $trx]);
}

public function fiataddress(){
    $user = Auth::user();
    $trx = coupon::where('code', $user->id)->latest()->first();
    $currency = $trx->network;
    $a = setting::first();
        
    return view('fiataddress', ['user' => $user, 'a' => $a, 'currency' => $currency, 'trx' => $trx]);
}

    public function mtn_data(){
    	$bundle_mtn = mtn_data::where('network', 'mtn')->get();
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('mtn_data', ['bundle'=> $bundle_mtn]);
    }


    public function add_money(){

        $pub_key = 'FLWPUBK-5a71734d161f6cd08eb0faa33c102d33-X';
        $pending_trx = Transaction::where('sender', Auth::user()->id)->where('status', [3])->where('method', 2)->latest()->get();
        $pending = Transaction::where('sender', Auth::user()->id)->where('status', [3])->count();

        return view('add_money', ['pub_key'=>$pub_key, 'pending'=>$pending, 'pending_trx'=>$pending_trx]);
    }

    public function bulk_data(){
    	// $messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('mtn_bulk_data', []);
    }
    public function other_gsm_data(){
        $bundle = mtn_data::where('network', 'glo')->orwhere('network', 'airtel')->orwhere('network', '9mobile')->get();
    	// $messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('other_gsm_data', ['bundle'=> $bundle]);
    }
       public function broadband(){
            $bundle = mtn_data::where('network', 'smile')->get();
    	// $messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('broadband', ['bundle'=> $bundle]);
    }
       public function cable(){
            $bundle = mtn_data::where('network', 'dstv')->orwhere('network', 'gotv')->orwhere('network', 'startimes')->get();
    	// $messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('cable', ['bundle'=> $bundle]);
    }

     public function add_bundle(Request $request){

           $plan = new mtn_data;


            $plan->name = $request->name;
            $plan->id = $request->code;
            $plan->price = $request->price;
            $plan->network = 'mtn';
            $plan->save();
            return redirect()->back()->with('success-status', 'You have successfully Added ' .$request->name);


    }

       public function electricity(){

    	// $messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('electricity', []);
    }
       public function education(){
           $bundle = mtn_data::where('network', 'waec')->orwhere('network', 'jamb')->orwhere('network', 'neco')->get();
    	// $messages = Message::where('receiver', Auth::user()->id)->orWhereNull('receiver')->latest()->paginate(20);
    	// $messages_sent = Message::where('sender', Auth::user()->id)->distinct('message')->latest()->limit(20)->get();
        return view('education', ['bundle'=> $bundle]);
    }
    public function show_profile(){
        return view('profile');
    }
     public function invest(){

        $settings = Setting::first();
        //$active_shares = Transaction::where('sender', Auth::user()->id)->where('created_at', '<=', \Carbon\Carbon::now()->subDays(15)->toDateTimeString())->latest()->get();
        $active_shares = Transaction::where('amount', '>', 0)->where('sender', Auth::user()->id)->whereIn('status', [0,1,2])->latest()->get();

        $next_share = null;
        foreach ($active_shares as $key => $value) {
            if($value->status == 1){
                $value->current_value = round( ($value->amount * $value->days * 0.91/100), 2);
            }else{
                $value->current_value = 0;
            }
        }
        return view('invest', ['active_shares' => $active_shares,  'settings' => $settings]);

    }
     public function withdrawal(){
        return view('withdrawal');

    }
    public function share_money(){
       return view('share_money');

   }
    public function show_tutorials(){
    	$posts = Post::where('tutorial', 1)->latest()->paginate(10);
        return view('tutorials', ['posts'=>$posts]);
    }


    public function show_referred(){
    	$users = User::where('referrer_id', Auth::user()->id)->latest()->paginate(50);
    	$settings = Setting::find(1);
        $ref_count =  User::where('referrer_id', Auth::user()->id)->count();
        $ref_bonus = 0;
        foreach(User::where('referrer_id', Auth::user()->id)->get() as $user)
        {
            $ref_bonus += \App\Transaction::where('sender', $user->id)->where('status', 1)->sum('amount') * 5/100;
        }
         $sum_with = \App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [2,3])->where('description', 'REFBONUS')->sum('amount');

        $ref_bonus -= $sum_with;
        return view('referral_bonus', ['users' => $users, 'ref_bonus' => $ref_bonus, 'ref_count' => $ref_count, 'settings'=>$settings]);
    }

    public function save_profile(Request $request){

        $validator = Validator::make($request->all(), [





        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->postcode = $request->postcode;
        $user->swiftcode = $request->swiftcode;
        $user->accountname = $request->accountname;
        $user->accountno = $request->BankAccountNumber;
        $user->bank = $request->bank;
        

        $user->bankcode = $request->bankcode;
        

	    $user->save();

		return redirect()->back()->with('success-status', 'Information successfully updated');
    }

    public function investment_request(Request $request){
        $validator = Validator::make($request->all(), [
            'amount'=> 'required|numeric',
            //'hash_code' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $settings = Setting::first();

        if(Transaction::where('sender', Auth::user()->id)->where('status', 0)->count() > 0){
            return redirect()->back()->with('error-status', 'Payment for your previously initiated investment has not been confirmed yet. You are not allowed to initiate another until it is confirmed');
        }

        if(Transaction::where('sender', Auth::user()->id)->whereIn('status', [0,1])->whereDate('created_at', Carbon::today())->sum('amount') >= 5000000){
            return redirect()->back()->with('error-status', 'Transaction limit of &#8358;5,000,000.00 exceeded');
        }

        $tran = Transaction::whereNotNull('paid_to')->where('status', 0)->where('created_at', '<=', Carbon::now()->subHours(12))->first();
        if($tran != null){
            $this->create_investment_request($request->amount, $tran->paid_to);
            $tran->status = 4;
            $tran->save();
            return redirect()->back()->with('success-status', 'You have successfully made a request to Invest &#8358; '.$request->amount)
            ->with('address', 'You are required to pay <br><b>&#8358; '.$request->amount.' via any of the provided methods <a href="/invest">here</a> </><br> within 24 hours.');
        }
        try{
           /* $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
            $client = CoinbaseClient::create($configuration);
            $address = new Address([
                'name' => 'Alstomfx'
            ]);
            $account = $client->getPrimaryAccount();
           $address = $client->createAccountAddress($account, $address);*/
            $this->create_investment_request($request->amount, 'redma');
            return redirect()->back()->with('success-status', 'You have successfully made a request to invest  &#8358; '.$request->amount)
            ->with('address', 'You are required to pay <br><b>&#8358; '.$request->amount.' via any of the provided methods <a href="/invest">here</a> </><br> within 24 hours.');
        }catch(\Exception $e){
            return redirect()->back()->with('error-status', 'An error occured. '.$e->getMessage());
        }
    }

    public function create_investment_request($amount, $address, $secret = null){
        $transaction = new Transaction;
        $transaction->amount = $amount;
        $transaction->blockchain_secret = $secret;
        $transaction->paid_to = $address;
        $transaction->sender = Auth::user()->id;
        $transaction->receiver = 0;
        $transaction->status = 0;
        $transaction->day_of_week = Carbon::now()->dayOfWeek;
        $transaction->description = "Investment Created";
        $transaction->save();
  }

  public function paid(Request $request){

      $transaction = Transaction::where('sender', Auth::user()->id)->where('method', 1)->where('status', 3)->first();

      $transaction->status = 3;
      $transaction->save();

          $user = New User();
          $user->email ='mobilevtuplus@gmail.com';
          $user->notify(new ProfitPaid($transaction->amount));




      return redirect()->back()->with('success-status', 'Your transaction is now being proccessed!');
  }


  public function share(Request $request){


      	$sender = user::where('id', Auth::user()->id)->first();
        $owner  = user::where('phone', $request->phone)->first();

          if($owner == null){


       		return redirect()->back()->with('error-status', "Incorrect Reciepient's phone Please enter correct user phone and try again")->withInput();
              }
              if($sender->phone == $request->phone){
                  return redirect()->back()->with('error-status', "You can not transfer money to yourself")->withInput();
              }

              if ($request->amount < 1){
                  return redirect()->back()->with('error-status', "You can not send an amount less than $1")->withInput();
              }

          //    dd($request->amount / $current_value);
          if ($sender->balance  < ($request->amount)){

              return redirect()->back()->with('error-status', "Not Enough Money! Please check your balance and try again");
          }

          $sender->balance -= $request->amount;
          $sender->save();
          $owner->balance += $request->amount;
          $owner->save();

          $tr = new Transaction;
          $tr->amount = $request->amount;
          $tr->sender = $sender->id;
          $tr->receiver = $owner->id;
          $tr->description = 'P2P Money share from '.$sender->phone.' to '.$owner->phone.' ';
          $tr->status = 1;
          $tr->save();



          return redirect()->back()->with('success-status', 'Transfer Successful!');
      }


    public function purchase_request(Request $request){
        $affiliate = User::where('is_affiliate', 1)->find($request->affiliate);
        if($affiliate == null){
            return redirect()->back()->with('error-status', 'Affiliate not found');
        }
        try{
            $affiliate->notify(new ShareRequest($request->amount, Auth::user()));
        }catch(\Exception $ex){
            //Do Nothing
        }
        return redirect()->back()->with('success-status', 'A request message has been sent to the affiliate, ensure that you make payments adequately for your request to be processed and shares activated');
    }

    public function change_password(Request $request){
    	Auth::logout();
    	return redirect('/password/reset');
    }

    public function get_bonus(Request $request){
    	$settings = Setting::find(1);
    	if($settings->users_per_bonus == 0 || $settings->min_withdraw_cat == 0)
    		return redirect()->back()->with('error-status', 'Bonus disabled by the admins');

    	if((int)(Auth::user()->referred_count / $settings->users_per_bonus) > (Auth::user()->get_bonus + Auth::user()->user_bonus_count)){
			if(Auth::user()->status_id == 3){
				Auth::user()->get_bonus += 1;
				Auth::user()->save();
				return redirect()->back()->with('success-status', 'Successfully applied to get bonus');
			}
			else{
				return redirect()->back()->with('error-status', 'Cannot cashout bonus till you are waiting to get help (GH)');
			}
		}

		return redirect()->back()->with('error-status', 'You do not yet qualify to get bonus');
    }

    public function withdraw(Request $request, $id){

        $setting = Setting::first();

        if(Auth::user()->suspended){
            return redirect()->back()->with('error-status', 'Cannot perform action. Your account is suspended.');
        }
        $transaction = Transaction::where('sender', Auth::user()->id)->where('status', 2)->find($id);
        if($transaction == null){
            return redirect('/dashboard')->with('error-status', 'Transaction not found or is already concluded');
        }

        //$configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        //$client = CoinbaseClient::create($configuration);

        try {
            $trn = CoinbaseTransaction::send([
                'toBitcoinAddress' => Auth::user()->bitcoin_wallet_id,
                'amount'           => new Money($transaction->amount, CurrencyCode::USD),
                'description'      => $transaction->description.' (Mobilevtu)'
                //'fee'              => '0.0001' // only required for transactions under BTC0.0001
            ]);
           // $account = $client->getPrimaryAccount();
           // $client->createAccountTransaction($account, $trn);
        }catch(\Exception $e) {
             return redirect()->back()->with('error-status', 'An error occured. '.$e->getMessage());
        }

        $transaction->status = 3;
        $transaction->save();

        try{
            $user = $transaction->sender_data;
            $user->notify(new ProfitPaid($transaction->amount, $user->bitcoin_wallet_id));
            Telegram::sendMessage([
              'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
              'text' => "Investor $user->name with wallet address $user->bitcoin_wallet_id has successfully recived a withdrawal of $$transaction->amount \n\nTran. Desc.: $transaction->description",
            ]);
            if($user->telegram_chat_id != null){
                Telegram::sendMessage([
                  'chat_id' => $user->telegram_chat_id,
                  'text' => "Withdrawal Complete. \nHello $user->name \nYour Withdrawal of $$transaction->amount has been successfully sent to your wallet address $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                ]);
            }

        }catch(\Exception $ex){
            //Do Nothing
        }

        return redirect()->back()->with('success-status', "Your Withdrawal of $$transaction->amount has been successfully sent to your wallet address $user->bitcoin_wallet_id");
    }

    //Confirm payment received by the receiver
    public function confirm_receipt(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	$settings = Setting::find(1);
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->receiver != Auth::user()->id)
    		return redirect()->back()->with('error-status', 'This user is not authorised to confirm this payment receipt');
    	elseif($transaction->status == 1)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	else{
    		if($transaction->receiver == Auth::user()->id){
				Auth::user()->amount_received += $transaction->amount;
				$transaction->status = 1;
    			$transaction->save();
                return redirect()->back();
    			//return redirect()->back()->with('show_testimony_modal', 1);
			}
			return redirect()->back()->with('error-status', 'Error executing request, you are not the receiver');
		}
    }


    public function confirm_provide_help(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->status == 1)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	else{
    		if(Auth::user()->isAdmin()){
				$transaction->status = 3;
    			$transaction->save();

                try{
                    $user = $transaction->sender_data;
                    $user->notify(new ProfitPaid($transaction->amount, $user->bitcoin_wallet_id));
                    Telegram::sendMessage([
                      'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                      'text' => "Investor $user->name with wallet address $user->bitcoin_wallet_id has successfully recived a withdrawal of $$transaction->amount \n\nTran. Desc.: $transaction->description",
                    ]);
                    if($user->telegram_chat_id != null){
                        Telegram::sendMessage([
                          'chat_id' => $user->telegram_chat_id,
                          'text' => "Withdrawal Complete. \nHello $user->name \nYour Withdrawal of $$transaction->amount has been successfully sent to your wallet address $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                        ]);
                    }

                }catch(\Exception $ex){
                    //Do Nothing
                }

                return redirect()->back();
			}else{
	    			return redirect()->back()->with('error-status', 'Error executing request, try again later');
    		}
    	}
    	return redirect()->back();
    }


    public function reject_provide_help(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction does not exist');
    	elseif($transaction->status == 1 or $transaction->status == 2)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	else{
    		if(Auth::user()->isAdmin()){
				$transaction->status = 2;
                $transaction->description .= " (Request rejected)";
    			$transaction->save();

                $tr = new Transaction;
                $tr->amount = round($transaction->amount * 100/140, 2);
                $tr->sender = $transaction->receiver;
                $tr->receiver = 0;
                $tr->status = 0;
                $tr->description = "Shares Created";
                $tr->save();
                $tr->created_at = $tr->created_at->subDays(15);
                $tr->save();

                //try{
                    //$user->notify(new ProfitPaid($transaction->amount, $transaction->receiver_data->bank_name, $transaction->receiver_data->account_number));
                //}catch(\Exception $ex){
                    //Do Nothing
                //}

                return redirect()->back();
			}else{
	    			return redirect()->back()->with('error-status', 'Error executing request, try again later');
    		}
    	}
    	return redirect()->back();
    }



    public function show_message($id = null){

    	if(is_null($id))
    		return view('new_message');

    	$message = Message::find($id);

    	if($message == null)
    		return redirect()->back()->with('error-status', 'Message does not exist or might have been deleted by the admins');
    	elseif(($message->receiver != Auth::user()->id && $message->receiver != null) && $message->sender != Auth::user()->id && !Auth::user()->isAdmin() && !Auth::user()->isReader())
    		return redirect()->back()->with('error-status', 'You are not authorised to view this message');
    	else{
            if(Auth::user()->id == $message->receiver || ($message->receiver == 0 && Auth::user()->isAdmin())){
                $message->message_read = 1;
                $message->save();
            }
    		return view('message_detail', ['message'=>$message]);
    	}
    }


    public function reply_message($id){
    	$message = Message::find($id);

    	if($message == null)
    		return redirect()->back()->with('error-status', 'Message does not exist or might have been deleted by the admins');
    	$sender = $message->sender != 0 ? $message->sender_data->email : 'support';
    	$subject = 'Re:'.$message->subject;
    	$msg = 'Reply to Message Sent at:'.$message->created_at->toDayDateTimeString().'     Message:'.$message->message;
    	return view('new_message', ['email' => $sender, 'subject' => $subject, 'message' => $msg]);
    }


    public function complain_receipt(Request $request){

    	$transaction = Transaction::find($request->input('transaction'));

    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->status == 1)
    		return redirect()->back()->with('error-status', 'Transaction already concluded');
    	elseif($transaction->sender_confirm != 1)
    		return redirect()->back()->with('error-status', 'Complaint is invalid because the sender has not confirmed payment');
    	else{
    		$subject = 'Transaction - Money not received';
    		$message = 'Transaction ID: '.$request->input('transaction')." \nPlease I did not receive the money. I will like support to help me resolve this issue swiftly";

    		//$user = User::find($transaction->receiver);
    		//if($user->balance >= $transaction->amount){
			//	$user->balance += $transaction->amount;
			//	$user->save();
			//}

    		$transaction->status = 3;
    		$transaction->save();
    		return view('new_message', ['email' => 'support', 'subject' => $subject, 'message' => $message]);
    	}
    }

    public function send_message(Request $request){

    	$mesg = $request->input('message');
    	$subject = $request->input('subject');
    	$attachment = null;
    	if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
    		$validator = Validator::make($request->all(), ['attachment' => 'image']);
    		if ($validator->fails()) {
			    return redirect()->back()->withErrors($validator);
			}
	    	$file = $request->attachment->move('assets/img/messages', 'message_'.time().'.'.$request->attachment->extension());
	    	$attachment = $file->getPathname();
		}

		$message = new Message;
		$message->sender = Auth::user()->id;
		$message->subject = $subject;
		$message->message = $mesg;
		$message->attachment = $attachment;
		$message->receiver = 0;
		$message->save();

    	return redirect('/messagebox')->with('success-status', 'Message sent.');
    }


    public function buy_airtime(Request $request){
        
        

        //  if ( $request->device_number != null){



        //                  $user = New User();
        //                  $user->email ='techgbenga@gmail.com';
        //                  Notification::send($user, new ProfitPaidNew($request->amount));


        //                 }

      // dd($request->amount * $request->dis);
      if (Auth::user()->suspended == 1 ){
          return redirect()->back()->with('error-status', 'Your account has been suspended Please contact support');
      }

        if (Auth::user()->balance < $request->amount ){
            return redirect()->back()->with('error-status', 'Insufficient Wallet Balance for the transaction! Please add money and try again');
        }
        if (Auth::user()->balance < 0 ){
            return redirect()->back()->with('error-status', 'amount is less than 1');
        }



                $curlService = new \Ixudra\Curl\CurlService();


                $response = Curl::to($request->endpoint)

                    ->withData( array('api_key'=>'VTC608faa7c57469216c166653d672228205e763c3ca2f54', 'network'=>$request->network, 'beneficiary'=>$request->mobile, 'amount'=>$request->amount, 'bundle_code'=>$request->bundle_code, 'plan'=>$request->plan, 'device_number'=>$request->device_number, 'disco'=>$request->disco, 'meter_number'=>$request->meter_number,
                    'edu_product'=> $request->edu_product, 'tv_plan'=>$request->tv_plan) )
                   ->asJson()
                    ->withContentType('text/plain')
                    ->withHeader('cache-control: no-cache')
                    ->post();
                    
                    
                    

                    //  $main_res =ltrim($response, 'A');
                     
                    //  $decode = json_decode($main_res);
                    
                    //   dd($response);

                    
                     if ($response->status == 'successful' && $response->code == 200) {
                       // $discount = mtn_data::where('network', $request->network)->first();

                        $discount = $request->dis ;
                        $user = Auth::user();
                        $user->balance -=$request->amount - $discount  ;
                        $user->save();
                        
                        
                        $old_balance = $user->balance + $request->amount + $request->charges;



                        $transaction = new Transaction;

                        $transaction->amount = $request->amount;
                        $transaction->description = $request->desc;
                        $transaction->discount = $discount;
                        $transaction->device_number = $request->device_number;
                        $transaction->sender = Auth::user()->id;
                        $transaction->beneficiary = $request->mobile;
                        $transaction->customer_name = $request->customer_name;
                        $transaction->new_balance = $user->balance;
                        $transaction->old_balance = $old_balance - $discount;
                        $transaction->customer_address = $request->customer_address;
                        $transaction->meter_number = $request->meter_number;
                        $transaction->status = 1;
                        $transaction->save();



                        return redirect()->back()->with('success-status', 'Transaction Succesful');




                        } else{

                        // and if the condition is not true, then the transaction was not successful.
                        return redirect()->back()->with('error-status', 'Transaction Failed! Please Check the data supplied and try again');
                        }
}


    public function paynew(Request $request){

      if ($request->method == 1){
        	$account = bank::where('active', 1)->get();

          $transaction = new Transaction;

          $transaction->amount = $request->amount;
          $transaction->description = 'Wallet Funding';
          $transaction->method = $request->method;
          $transaction->sender = Auth::user()->id;
          $transaction->status = 3;
          $transaction->save();

        return redirect('/deposit')->with('success-status', 'Transaction Created! Please  make payment and Click Complete below to finalize');
      }

        $pub_key = 'FLWPUBK_TEST-6aadf92525413d3f04fb0f26b35ebb2f-X';

        $transaction = new Transaction;

        $transaction->amount = $request->amount;
        $transaction->description = 'Wallet Funding';
        $transaction->method = $request->method;
        $transaction->sender = Auth::user()->id;
        $transaction->status = 3;
        $transaction->save();
        return redirect()->back()->with('success-status', 'Transaction Created! Please Click Complete below to finalize');


        }

    public function transaction_history(Request $request){
      $transactions = Transaction::where(function($query){
        $query->where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id);
      });
      if($request->has('search')){
        $users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
        $s_users = array();
        foreach($users as $u)
          array_push($s_users, $u->id);

        //dd($transactions, $s_users, $request->input('search'));
        //dd($s_users);
        $transactions = $transactions->where(function($query) use($request, $s_users){
          $query->where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users);
        });
      }
      $transactions = $transactions->latest()->paginate(50);
    	//$transactions = Transaction::where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id)->latest()->paginate(20);
    	return view('transactions', ['transactions'=>$transactions]);
    }

    public function generate_random($len){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $len; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }
}
