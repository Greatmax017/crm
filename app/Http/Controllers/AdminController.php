<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SharePurchased;
use App\Notifications\SmsNotifyAll;
use App\Notifications\EmailNotifyAll;
use App\Post;
use App\Transaction;
use App\Coupon;
use App\Setting;
use App\Message;
use App\User;
use App\Bank;
use App\mtn_data;
use App\airtime;

use Auth;
use DB;
use Notification;
use Telegram;
use \Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
    	return view('admin.dashboard', ['settings'=>Setting::find(1), 'queue' => \App\UserNotificationQueue::count()]);
    }

    public function show_blog(){
    	return view('admin.blog_articles', ['posts'=>Post::paginate(50)]);
    }

    public function edit_transaction(Request $request){
      $tr = Transaction::find($request->transaction);
      if($tr == null){
        return redirect()->back()->with('error-status', 'Transaction not found');
      }
      $tr->amount = $request->amount;
      $tr->description = $request->description;
      $tr->status = $request->status;
      $tr->save();
      return redirect()->back()->with('success-status', 'Transaction successfully edited.');
    }

    public function clear_shares(Request $request){
        $user = User::find($request->user);
        if($user == null){
            return redirect()->back()->with('error-status', 'User not found');
        }
        $trans = Transaction::where('sender', $user->id)->where('receiver', 0)->where('status', 0)->get();
        foreach ($trans as $key => $t) {
            $t->status = 1;
            $t->save();
        }
        return redirect()->back()->with('success-status', 'All Shares Cleared.');
    }

    public function admin_notify(Request $request){
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->type == 1){
            $users = User::all()->unique('phone');
            foreach ($users as $key => $user) {
                $nt = new \App\UserNotificationQueue;
                $nt->user_id = $user->id;
                $nt->message = $request->message;
                $nt->type = 1;
                $nt->save();
                //$user->notify(new SmsNotifyAll($request->message));
            }
        }else{
            $users = User::all();
            foreach ($users as $key => $user) {
                $nt = new \App\UserNotificationQueue;
                $nt->user_id = $user->id;
                $nt->message = $request->message;
                $nt->type = 2;
                $nt->save();
                //$user->notify(new EmailNotifyAll($request->message));
            }
        }

        return redirect()->back()->with('success-status', 'Message Queue has been created.');
    }

    public function admin_profile(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        if($user == null){
            return redirect()->back()->with('error-status', 'User not found');
        }
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->sort_code = $request->input('sort_code');
        $user->bitcoin_wallet_id = $request->input('bitcoin_wallet_id');
		$user->save();

		return redirect()->back()->with('success-status', 'Information successfully saved');
    }

    public function messagebox(){

    	$messages = Message::where('receiver',0)->latest()->paginate(20);
    	$messages_sent = Message::where('sender', 0)->distinct('message')->latest()->limit(20)->get();

        return view('admin.messagebox', [	'messages' => $messages,
        							'messages_sent' => $messages_sent ]);
    }
    
      public function withrecord(){

    	$transactions = Transaction::get();
    	

        return view('admin.withrecord', [	'transactions' => $transactions ]);
    }

    public function show_message($id = null){

    	if(is_null($id))
    		return view('new_message');

    	$message = Message::find($id);

    	if($message == null)
    		return redirect()->back()->with('error-status', 'Message does not exist or might have been deleted by the admins');
    	else{
            if($message->receiver == 0){
                $message->message_read = 1;
                $message->save();
            }
            return view('admin.message_detail', ['message'=>$message]);
        }
    }

     public function reply_message($id){
    	$message = Message::find($id);

    	if($message == null)
    		return redirect()->back()->with('error-status', 'Message does not exist or might have been deleted by the admins');
    	$sender = $message->sender_data->email;
    	$subject = 'Re:'.$message->subject;
    	$msg = 'Reply to Message Sent at:'.$message->created_at->toDayDateTimeString().'     Message:'.$message->message;
    	return view('admin.new_message', ['email' => $sender, 'subject' => $subject, 'message' => $msg]);
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
		$message->sender = 0;
		$message->subject = $subject;
		$message->message = $mesg;
		$message->attachment = $attachment;
    	if($request->input('email') == 'broadcast' && Auth::user()->role != 0){
			$message->save();
    	}else{
    		$user = User::where('email', $request->input('email'))->first();
    		if($user == null)
    			return redirect()->back()->with('error-status', 'Message cannot be sent. Recepient not determined');
			$message->receiver = $user->id;
			$message->save();
    	}
    	return redirect('/admin/messagebox')->with('success-status', 'Message sent.');
    }

    public function suspend_user($id){
        $user = User::find($id);
        if($user == null){
            return redirect()->back()->with('error-status', 'User not found');
        }
        $user->suspended = 1;
        $user->save();
        return redirect()->back()->with('success-status', 'The user has been successfully suspended');
    }

    public function release_user($id){
        $user = User::find($id);
        if($user == null){
            return redirect()->back()->with('error-status', 'User not found');
        }
        $user->suspended = 0;
        $trs = Transaction::where('sender', $id)->where('receiver', 0)->where('status', 0)->where('description', 'NOT LIKE', '%Bonus%')->get();
        foreach ($trs as $key => $trn) {
            $trn->created_at = Carbon::now();
            $trn->description .= ' (Released)';
            $trn->save();
        }
        $user->save();
        return redirect()->back()->with('success-status', 'The user has been successfully unsuspended');
    }

    public function show_withdrawals(Request $request){
    	$paid_withdrawals = Transaction::where('status', 3)->sum('amount');
        $withdrawal_transactions = Transaction::where('status', 2)->oldest()->paginate(50);
        return view('admin.withdrawals', [ 'transactions'=>$withdrawal_transactions,
                                            'paid_withdrawals' =>$paid_withdrawals ]);
    }

    public function show_users(Request $request){
    	$users = null;
    	if($request->has('type')){
    		if($request->input('type') == 1){
    			if($request->has('search')){
		    		$users = User::where('is_executive', 1)->where('name','like','%'.$request->input('search').'%')->orWhere('email','like','%'.$request->input('search').'%')->orWhere('phone','like','%'.$request->input('search').'%')->paginate(50);
		    	}else{
		    		$users = User::where('is_executive', 1)->paginate(100);
		    	}
    		}
    		else{
    			if($request->has('search')){
		    		$users = User::where('name','like','%'.$request->input('search').'%')->orWhere('email','like','%'.$request->input('search').'%')->orWhere('phone','like','%'.$request->input('search').'%')->paginate(50);
		    	}else{
		    		$users = User::paginate(50);
		    	}
    		}
    	}else{
    		if($request->has('search')){
	    		$users = User::where('name','like','%'.$request->input('search').'%')->orWhere('email','like','%'.$request->input('search').'%')->orWhere('phone','like','%'.$request->input('search').'%')->paginate(50);
	    	}else{
	    		$users = User::paginate(50);
	    	}
    	}
        $active_users = user::where('activated', 1)->get()->count();
        //$active_users = User::whereHas('shares', function ($q) {  $q->where('status', 0);  })->count();
    	return view('admin.users', ['users'=>$users, 'ph_users_count'=>User::where('status_id', 1)->count(),
						'active_users_count'=>$active_users,
						'suspended_users_count'=>User::whereIn('status_id', [4, 5])->count(),
						'users_count'=>User::count()]);
    }


    public function products(Request $request){
    	$users = null;
    	if($request->has('type')){
    		if($request->input('type') == 1){
    			if($request->has('search')){
		    		$products = mtn_data::where('name','like','%'.$request->input('search').'%')->orWhere('network','like','%'.$request->input('search').'%')->orWhere('id','like','%'.$request->input('search').'%')->paginate(50);
		    	}else{
		    		$products = mtn_data::paginate(50);
		    	}
    		}
    		else{
    			if($request->has('search')){
		    		$products = mtn_data::where('name','like','%'.$request->input('search').'%')->orWhere('network','like','%'.$request->input('search').'%')->orWhere('id','like','%'.$request->input('search').'%')->paginate(50);
		    	}else{
		    		$products = mtn_data::paginate(50);
		    	}
    		}
    	}else{
    		if($request->has('search')){
	    		$products = mtn_data::where('name','like','%'.$request->input('search').'%')->orWhere('network','like','%'.$request->input('search').'%')->orWhere('id','like','%'.$request->input('search').'%')->paginate(50);
	    	}else{
	    		$products = mtn_data::paginate(50);
	    	}
    	}

        //$active_users = User::whereHas('shares', function ($q) {  $q->where('status', 0);  })->count();
    	return view('admin.products', ['products'=>$products,


						'product_count'=>mtn_data::count()]);
    }


    public function airtime(Request $request){

          $products = airtime::paginate(50);



      return view('admin.airtime', ['airtime'=>$products, 'product_count'=>airtime::count()]);
    }

    public function funding(Request $request){
      $users = null;
      if($request->has('type')){
        if($request->input('type') == 1){
          if($request->has('search')){
            $products = Transaction::where('method', [1,2])->where('name','like','%'.$request->input('search').'%')->orWhere('network','like','%'.$request->input('search').'%')->orWhere('id','like','%'.$request->input('search').'%')->paginate(50);
          }else{
            $products = Transaction::where('method', [1,2])->paginate(50);
          }
        }
        else{
          if($request->has('search')){
            $products = Transaction::where('name','like','%'.$request->input('search').'%')->orWhere('network','like','%'.$request->input('search').'%')->orWhere('id','like','%'.$request->input('search').'%')->paginate(50);
          }else{
            $products = Transaction::where('method', [1,2])->paginate(50);
          }
        }
      }else{
        if($request->has('search')){
          $products = Transaction::where('name','like','%'.$request->input('search').'%')->orWhere('network','like','%'.$request->input('search').'%')->orWhere('id','like','%'.$request->input('search').'%')->paginate(50);
        }else{
          $products =  Transaction::where('method', [1,2])->paginate(50);
        }
      }

        //$active_users = User::whereHas('shares', function ($q) {  $q->where('status', 0);  })->count();
      return view('admin.funding', ['products'=>$products,


            'product_count'=>Transaction::where('method', [1,2])->count()]);
    }




    public function show_deleted_users(Request $request){
    	$users = null;
    	if($request->has('search')){
    		$users = User::onlyTrashed()->where('name','like','%'.$request->input('search').'%')->orWhere('email','like','%'.$request->input('search').'%')->paginate(100);
    	}else{
    		$users = User::onlyTrashed()->paginate(100);
    	}

    	return view('admin.deleted_users', ['users'=>$users, 'ph_users_count'=>User::onlyTrashed()->where('status_id', 1)->count(),
						'gh_users_count'=>User::onlyTrashed()->where('status_id', 3)->count(),
						'matched_users_count'=>User::onlyTrashed()->where('status_id', 2)->count(),
						'suspended_users_count'=>User::onlyTrashed()->whereIn('status_id', [4, 5])->count(),
						'users_count'=>User::onlyTrashed()->count(),
						'admins' => User::withTrashed()->where('role', '<>', 0)->get()]);
    }

    public function delete_transaction($id){
        $tr = Transaction::find($id);
        if($tr == null){
            return response()->json(['error-status'=>'Transaction not found']);
        }
        $tr->delete();
        return response()->json(['success'=>'Transaction deleted successfully']);
    }



    public function update_product(Request $request){
        $product = mtn_data::where('code', '=', $request->old_code)->update(array('price' => $request->price, 'code' => $request->code, 'discount' => $request->discount));
        //  dd($product->code);



        return redirect()->back()->with('success-status', 'Product details Successfully Updated');
    }
    
    // update deposit status
     public function status_update(Request $request){
         
        $deposit= coupon::where('id', '=', $request->id)->update(array('status' => $request->status));
        //  dd($product->code);



        return redirect()->back()->with('success-status', 'Status Successfully Updated');
    }
    
    // update withdrawal status
     public function with_update(Request $request){
         
        $deposit= Transaction::where('id', '=', $request->id)->update(array('status' => $request->status));
        //  dd($product->code);



        return redirect()->back()->with('success-status', 'Status Successfully Updated');
    }

    public function update_airtime(Request $request){
        $product = airtime::where('id', '=', $request->id)->update(array('discount' => $request->discount));
        //  dd($product->code);



        return redirect()->back()->with('success-status', 'discount details Successfully Updated');
    }

    public function discount(Request $request){
            $data = mtn_data::where('network', $request->network)->get();

           if($data == null){
             return redirect()->back()
             ->with('error-status', 'Entered Network '.$request->network.' not on the system please check and try again')->withInput();
           }
           $affected = mtn_data::where('network', '=', $request->network)->update(array('discount' => $request->discount));
          // $data->discount = $request->discount;
          // $data->save();
        // $network = mtn_data::where('newtwork', $request->network)->update(array('discount' => $request->discount));

        //  dd($product->code);

        return redirect()->back()->with('success-status', 'Product discount Successfully Updated');
    }

    public function fundingpaid(Request $request){
            $tr = Transaction::where('id', $request->id)->first();

            $owner = user::where('phone', $request->phone)->first();
            $owner->balance += $request->amount;
            $owner->save();


           $tr->status = 1;
           $tr->save();

        return redirect()->back()->with('success-status', 'Funding Confirmed Successfully');
    }

    public function create_admin(Request $request){
        $product = user::where('email', $request->email)->update(array('role' => 2));
        //  dd($product->code);


        // $product->code = $request->code;
        // $product->price = $request->price;
        // $product->save();
        return redirect()->back()->with('success-status',  'now an admin! ' .$request->email);
    }

    public function send_money(Request $request){
        $wallet = Setting::first();
       
        // Check if the request fields are not null before updating
        if ($request->has('BTC') && $request->BTC !== null) {
            $wallet->bitcoin_wallet_id = $request->BTC;
        }
    
        if ($request->has('TRC20') && $request->TRC20 !== null) {
            $wallet->TRC20 = $request->TRC20;
        }
    
        if ($request->has('ERC20') && $request->ERC20 !== null) {
            $wallet->ERC20 = $request->ERC20;
        }
    
        $wallet->save();
    
        // $product->notify(new SharePurchased( $tr->amount, $tr->newbal));
    
        return redirect()->back()->with('success-status', 'Address updated!');
    }
    
    
    public function update_account(Request $request){
        $account = setting::first();
        
        
        
        if ($request->id == 'usd'){
            
            $account->usdaccountname = $request->accountname;
            $account->usdaccountnumber = $request->accountnumber;
            $account->usdswiftcode = $request->swiftcode;
            $account->usdbankname = $request->bankname;
            $account->usdbankaddress = $request->bankaddress;
            $account->usdbenaddress = $request->benaddress;
            $account->save();
            
            return redirect()->back()->with('success-status',  'Account updated!');
        }elseif ($request->id == 'gbp'){
            
            $account->gbpaccountname = $request->accountname;
            $account->gbpaccountnumber = $request->accountnumber;
            $account->gbpswiftcode = $request->swiftcode;
            $account->gbpbankname = $request->bankname;
            $account->gbpbankaddress = $request->bankaddress;
            $account->gbpbenaddress = $request->benaddress;
            $account->save();
           return redirect()->back()->with('success-status',  'Account updated!'); 
        }else{
            
            $account->euraccountname = $request->accountname;
            $account->euraccountnumber = $request->accountnumber;
            $account->eurswiftcode = $request->swiftcode;
            $account->eurbankname = $request->bankname;
            $account->eurbankaddress = $request->bankaddress;
            $account->eurbenaddress = $request->benaddress;
            $account->save();
            return redirect()->back()->with('success-status',  'Account updated!');
        }
        
       

       
    }

    public function mt4(Request $request){
        $user = user::where('email', $request->email)->first();
        //  dd($product->code);
        // if($request->amount > $user->balance){
        //   return redirect()->back()->with('error-status',  'Thet amount is greater than user balance ');
        // }
        // if($request->amount < 0){
        //   return redirect()->back()->with('error-status',  'Thet amount must be greater than 1 ');
        // }

        $user->mt4 = $request->mt4;

        $user->save();


        // $tr = new Transaction;
        // $tr->amount = $request->amount;
        // $tr->sender = Auth::user()->id;
        // $tr->receiver = $user->id;
        // $tr->status = 1;
        // $tr->description = "Admin Deduction";
        // $tr->save();
        // $tr->newbal = $user->balance;



            // $user->notify(new SharePurchased( $tr->amount, $tr->newbal));

        return redirect()->back()->with('success-status',  'MT4 account number saved for ' .$request->email);
    }
    public function mt4password(Request $request){
        $user = user::where('email', $request->email)->first();
        //  dd($product->code);
        // if($request->amount > $user->balance){
        //   return redirect()->back()->with('error-status',  'Thet amount is greater than user balance ');
        // }
        // if($request->amount < 0){
        //   return redirect()->back()->with('error-status',  'Thet amount must be greater than 1 ');
        // }

        $user->live = $request->live;

        $user->save();


        // $tr = new Transaction;
        // $tr->amount = $request->amount;
        // $tr->sender = Auth::user()->id;
        // $tr->receiver = $user->id;
        // $tr->status = 1;
        // $tr->description = "Admin Deduction";
        // $tr->save();
        // $tr->newbal = $user->balance;



            // $user->notify(new SharePurchased( $tr->amount, $tr->newbal));

        return redirect()->back()->with('success-status',  'Account mode saved for ' .$request->email);
    }
    public function balance(Request $request){
        $user = user::where('email', $request->email)->first();
        //  dd($product->code);
        // if($request->amount > $user->balance){
        //   return redirect()->back()->with('error-status',  'Thet amount is greater than user balance ');
        // }
        // if($request->amount < 0){
        //   return redirect()->back()->with('error-status',  'Thet amount must be greater than 1 ');
        // }

        $user->balance = $request->balance;

        $user->save();


        // $tr = new Transaction;
        // $tr->amount = $request->amount;
        // $tr->sender = Auth::user()->id;
        // $tr->receiver = $user->id;
        // $tr->status = 1;
        // $tr->description = "Admin Deduction";
        // $tr->save();
        // $tr->newbal = $user->balance;



            // $user->notify(new SharePurchased( $tr->amount, $tr->newbal));

        return redirect()->back()->with('success-status',  'New balance saved for ' .$request->email);
    }
    public function net(Request $request){
        $user = user::where('email', $request->email)->first();
        //  dd($product->code);
        // if($request->amount > $user->balance){
        //   return redirect()->back()->with('error-status',  'Thet amount is greater than user balance ');
        // }
        // if($request->amount < 0){
        //   return redirect()->back()->with('error-status',  'Thet amount must be greater than 1 ');
        // }

        $user->net = $request->net;

        $user->save();


        // $tr = new Transaction;
        // $tr->amount = $request->amount;
        // $tr->sender = Auth::user()->id;
        // $tr->receiver = $user->id;
        // $tr->status = 1;
        // $tr->description = "Admin Deduction";
        // $tr->save();
        // $tr->newbal = $user->balance;



            // $user->notify(new SharePurchased( $tr->amount, $tr->newbal));

        return redirect()->back()->with('success-status',  'New net saved for ' .$request->email);
    }
    public function bonus(Request $request){
        $user = user::where('email', $request->email)->first();
        //  dd($product->code);
        // if($request->amount > $user->balance){
        //   return redirect()->back()->with('error-status',  'Thet amount is greater than user balance ');
        // }
        // if($request->amount < 0){
        //   return redirect()->back()->with('error-status',  'Thet amount must be greater than 1 ');
        // }

        $user->bonus = $request->bonus;

        $user->save();


        // $tr = new Transaction;
        // $tr->amount = $request->amount;
        // $tr->sender = Auth::user()->id;
        // $tr->receiver = $user->id;
        // $tr->status = 1;
        // $tr->description = "Admin Deduction";
        // $tr->save();
        // $tr->newbal = $user->balance;



            // $user->notify(new SharePurchased( $tr->amount, $tr->newbal));

        return redirect()->back()->with('success-status',  'New bonus saved for ' .$request->email);
    }
    
    public function t_income(Request $request){
        $user = user::where('email', $request->email)->first();
       
        

        $user->t_income = $request->t_income;

        $user->save();


        return redirect()->back()->with('success-status',  'New income saved for ' .$request->email);
    }
    
    public function transact(Request $request){
        $user = user::where('email', $request->email)->first();
       
       

        $user->transact = $request->transact;
        

        $user->save();


        return redirect()->back()->with('success-status',  'Transaction No saved for ' .$request->email);
    }
    
    public function pnl(Request $request){
        $user = user::where('email', $request->email)->first();
       
        

        $user->pnl = $request->pnl;

        $user->save();


        return redirect()->back()->with('success-status',  'New pnl saved for ' .$request->email);
    }
    
    public function return(Request $request){
        $user = user::where('email', $request->email)->first();
       
       

        $user->return_new = $request->return_new;
        

        $user->save();


        return redirect()->back()->with('success-status',  'New return saved for ' .$request->email);
    }
    
    public function margin(Request $request){
        $user = user::where('email', $request->email)->first();
        //  dd($product->code);
        // if($request->amount > $user->balance){
        //   return redirect()->back()->with('error-status',  'Thet amount is greater than user balance ');
        // }
        // if($request->amount < 0){
        //   return redirect()->back()->with('error-status',  'Thet amount must be greater than 1 ');
        // }

        $user->margin = $request->margin;

        $user->save();


        // $tr = new Transaction;
        // $tr->amount = $request->amount;
        // $tr->sender = Auth::user()->id;
        // $tr->receiver = $user->id;
        // $tr->status = 1;
        // $tr->description = "Admin Deduction";
        // $tr->save();
        // $tr->newbal = $user->balance;



            // $user->notify(new SharePurchased( $tr->amount, $tr->newbal));

        return redirect()->back()->with('success-status',  'New margin saved for ' .$request->email);
    }

    public function add_bundle(Request $request){

        $plan = new mtn_data;


         $plan->name = $request->name;
         $plan->id = $request->code;
         $plan->price = $request->price;
         $plan->network = $request->network ;
         $plan->save();
         return redirect()->back()->with('success-status', 'You have successfully Added ' .$request->name);


 }
 



    public function show_transactions(Request $request){
    	$transactions = null;
    	
    	if($request->has('type')){
    		if($request->input('type') == 'completed'){
    			if($request->has('search')){
		    		$users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
		    		$s_users = array();
		    		foreach($users as $u)
		    			array_push($s_users, $u->id);
		    		//dd($s_users);
		    		$transactions = coupon::where('status', 1)->where(function($query) use($request, $s_users){
		    				$query->where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users);
		    			})->paginate(100);
		    	}else{
		    		$transactions = coupon::where('status', 1)->latest()->paginate(100);
		    	}
    		}
    		elseif($request->input('type') == 'failed'){
    			if($request->has('search')){
		    		$users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
		    		$s_users = array();
		    		foreach($users as $u)
		    			array_push($s_users, $u->id);
		    		//dd($s_users);
		    		$transactions = coupon::where('status', 2)->where(function($query) use($request, $s_users){
		    				$query->where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users);
		    			})->paginate(100);
		    	}else{
		    		$transactions = coupon::where('status', 2)->latest()->paginate(100);
		    	}
    		}
    		elseif($request->input('type') == 'incomplete'){
    			if($request->has('search')){
		    		$users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
		    		$s_users = array();
		    		foreach($users as $u)
		    			array_push($s_users, $u->id);
		    		//dd($s_users);
		    		$transactions = coupon::where('status', 0)->where(function($query) use($request, $s_users){
		    				$query->where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users);
		    			})->paginate(100);
		    	}else{
		    		$transactions = coupon::where('status', 0)->latest()->paginate(100);
		    	}
    		}
    		else{
    			if($request->has('search')){
		    		$users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
		    		$s_users = array();
		    		foreach($users as $u)
		    			array_push($s_users, $u->id);
		    		//dd($s_users);
		    		$transactions = coupon::where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users)->latest()->paginate(100);
		    	}else{
		    		$transactions = coupon::latest()->paginate(100);
		    	}
    		}
    	}else{
    		if($request->has('search')){
	    		$users = User::where('email','like','%'.$request->input('search').'%')->select('id')->get();
	    		$s_users = array();
	    		foreach($users as $u)
	    			array_push($s_users, $u->id);
	    		//dd($s_users);
	    		$transactions = coupon::where('id','like','%'.$request->input('search').'%')->orWhereIn('sender', $s_users)->orWhereIn('receiver', $s_users)->latest()->paginate(100);
	    	}else{
	    		$transactions = coupon::latest()->paginate(100);
	    	}
	    	
    	}
    	
    
    	
    	$transactions_today = DB::table('coupons')->whereRaw('Date(created_at) = CURDATE()')->count();
        $transactions_count = DB::table('coupons')->count();
    	$active_shares = Transaction::where('sender', '<>', 0)->where('receiver', 0)->where('status', 0)->sum('amount');

    	return view('admin.transactions', ['transactions'=>$transactions,
                                            'setting' => Setting::first(),
                                            'active_shares'=>$active_shares,
    										'transactions_count'=>$transactions_count,
    										'transactions_today_count'=>$transactions_today]);
    }
    
    public function kyc(Request $request){
        
        $users = User::where('kyc', 'Pending')->get();
    	return view('admin.kyc', ['users'=>$users]);
    }
    
    public function kyc_approve(Request $request){
        
        $user = User::where('id', $request->id)->first();
        
        $user->kyc = 'Yes';
        $user->Save();
        
        $user->notify(new SharePurchased());
        
        return redirect()->back()->with('success-status', 'Kyc Approved!');
    	
    }
    

    public function get_user($id){
    	$user = User::withTrashed()->find($id);
    	if($user == null)
    		return redirect()->back()->with('error-status', 'Invalid User');
        $users = User::where('referrer_id', $id)->latest()->paginate(100);
    	return view('admin.user', ['user'=>$user, 'users'=>$users]);
    }
    public function account($id){
    	$account = setting::first();
    	$currency = $id;
    	return view('admin.account', ['account'=>$account, 'currency'=>$currency]);
    }

    public function user_affiliate($id){
        if(!Auth::user()->isAdmin())
            return redirect()->back()->with('error-status', 'Not authorised');

        $user = User::find($id);

        if($user == null)
            return redirect()->back()->with('error-status', 'Invalid User');

        $user->is_affiliate = $user->is_affiliate == 1 ? 0:1;
        $user->save();
        return redirect()->back()->with('success-status', 'Successfully changed user affiliate status');
    }

    public function save_user(Request $request){
    	if(!Auth::user()->isAdmin())
    		return redirect()->back()->with('error-status', 'Not authorised');

    	$user = User::find($request->input('user'));

    	if($user == null)
    		return redirect()->back()->with('error-status', 'Invalid User');

    	if($user->isAdmin() && $request->input('role') != 2)
    		return redirect()->back()->with('error-status', 'Cannot change an admin');

    	$user->role = $request->input('role');
    	$user->balance = $request->input('balance');
    	$user->save();

    	return redirect()->back()->with('success-status', 'Successfully saved user information');
    }

    public function delete_user(Request $request){
    	if(!Auth::user()->isAdmin())
    		return redirect()->back()->with('error-status', 'Not authorised');

    	$user = User::find($request->input('user'));
    	if($user->isAdmin())
    		return redirect()->back()->with('error-status', 'Cannot delete an admin');

	  //DB::table('messages')->where('sender',$user->id)->orWhere('receiver',$user->id)->delete();
	  //DB::table('transactions')->where('sender',$user->id)->orWhere('receiver',$user->id)->delete();
	  $user->delete();
	  return redirect()->back()->with('success-status', 'Successfully moved to trash');
    }

    public function permanent_delete_user(Request $request){
    	if(!Auth::user()->isAdmin())
    		return redirect()->back()->with('error-status', 'Not authorised');

    	$user = User::withTrashed()->where('id', $request->input('user'))->first();
    	if($user->isAdmin())
    		return redirect()->back()->with('error-status', 'Cannot delete an admin');

	  DB::table('messages')->where('sender',$user->id)->orWhere('receiver',$user->id)->delete();
	  DB::table('transactions')->where('sender',$user->id)->orWhere('receiver',$user->id)->delete();
	  $user->forceDelete();
	  return redirect()->back()->with('success-status', 'Successfully deleted user permanently');
    }

    public function restore_delete_user(Request $request){
    	if(!Auth::user()->isAdmin())
    		return redirect()->back()->with('error-status', 'Not authorised');

    	$user = User::withTrashed()->where('id', $request->input('user'))->first();
    	$user->restore();

	    return redirect()->back()->with('success-status', 'Successfully restored user');
    }

    public function save_settings(Request $request){
    	if(!Auth::user()->isAdmin())
    		return redirect()->back()->with('error-status', 'Not authorised');


    	$validator = Validator::make($request->all(), [
            'bitcoin_wallet_id' => 'required',
            'usd_bitcoin' => 'required',
            'min_amount' => 'required|numeric|min:1',
            'premium_min_amount' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


    	$s = Setting::first();
    	$s->bitcoin_wallet_id = $request->bitcoin_wallet_id;
        $s->usd_bitcoin = $request->usd_bitcoin;
        $s->min_amount = $request->min_amount;
        $s->premium_min_amount = $request->premium_min_amount;
    	$s->save();
    	return redirect()->back()->with('success-status', 'Successfully saved settings');
    }

    /**
     * Route to upload Image.
     *
     * @return json response
     */
    public function uploadImage(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:1000',
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json(['status'=>'failure','message'=>$errors->first('image')]);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
             $file = $request->image->move('assets/img/uploads', 'img_'.time().'.'.$request->image->extension());
             $image = str_replace('\\', '/', $file->getPathname());
             return response()->json(['status'=>'success', 'url' => '/'.$image]);
         }
         return response()->json(['status'=>'failure','message'=>'Image invalid or not available']);
    }

    public function confirm_investment(Request $request){
    	$transaction = Transaction::find($request->input('transaction'));
    	if($transaction == null)
    		return redirect()->back()->with('error-status', 'Transaction doesnot exist');
    	elseif($transaction->status != 0)
    		return redirect()->back()->with('error-status', 'Transaction already confirmed');
    	else{
            $user = User::find($transaction->sender);
            if($user != null && $user->referrer_id != null){
                $direct_ref = User::find($user->referrer_id);
                if($direct_ref != null){
                    $tr = new Transaction;
                    $tr->amount = number_format($transaction->amount * 5/100, 6);
                    $tr->sender = $direct_ref->id;
                    $tr->receiver = 0;
                    $tr->status = 2;
                    $tr->description = "Direct Referral Bonus ($user->email)";
                    $tr->save();

                    if($direct_ref->referrer_id != null){
                        $indirect_ref = User::find($direct_ref->referrer_id);
                        if($indirect_ref != null){
                            $tr = new Transaction;
                            $tr->amount = number_format($transaction->amount * 1/100, 6);
                			$tr->sender = $indirect_ref->id;
                			$tr->receiver = 0;
                			$tr->status = 2;
                			$tr->description = "Indirect Referral Bonus ($user->email)";
                			$tr->save();
                        }
                    }
                }
            }
			$transaction->status = 1;
			$transaction->save();

            $user->last_investment = $transaction->amount;
            $user->save();

            try{
                $user->notify(new SharePurchased($transaction->amount));
                Telegram::sendMessage([
                  'chat_id' => env('TELEGRAM_GROUP_CHAT_ID'),
                  'text' => "Investment of $$transaction->amount has been confirmed for Investor $user->name with wallet address $user->bitcoin_wallet_id \n\nTran. Desc.: $transaction->description",
                ]);
                if($user->telegram_chat_id != null){
                    Telegram::sendMessage([
                      'chat_id' => $user->telegram_chat_id,
                      'text' => "Investment Confirmed. \nHello $user->name \nYour Investment of $$transaction->amount has been successfully confirmed \n\nTran. Desc.: $transaction->description",
                    ]);
                }
            }catch(\Exception $e){
                //Do Nothing
            }

            return redirect()->back()->with('success-status', 'Successfully confirmed investment');
    	}
    	return redirect()->back();
    }

    protected function randNum($length)
    {
        $str = '';
        for ($i = 0; $i < $length; $i++)
            $str .= mt_rand(0, 9);

        return $str;
    }
}