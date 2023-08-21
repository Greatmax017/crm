<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
     protected $dates = [
        'created_at',
        'updated_at',
        'last_paid_at',
        'ph_initiated_at',
        'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'bank', 'accountno', 'pnl', 'transacts', 'return_new', 't_income', 'country', 'surname', 'withdrawal_method', 'username', 'cardtype', 'cardnumber', 'cardfront', 'cardback', 'email', 'password','plan','bitcoin_wallet_id', 'phone','referrer_id',
        'accountname', 'swiftcode', 'postcode', 'mt4', 'mt4password', 'link', 'net', 'margin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function received_messages()
    {
        return Message::where('receiver', $this->id)->get();
    }

    public function received_messages_admin()
    {
        return Message::whereNull('receiver')->orWhere('receiver', 0)->get();
    }

    public function shares(){
        return $this->hasMany('App\Transaction', 'sender');
        //return Transaction::where('receiver', 0)->where('status', 0)->get();
    }

    public function referred_count(){
        return User::where('referrer_id', $this->id)->where('activated', 1)->count();
    }

    public function transactions_sent()
    {
       return $this->hasMany('App\Transaction', 'sender');
    }

    public function transactions_received()
    {
       return $this->hasMany('App\Transaction', 'receiver');
    }

    public function sent_messages()
    {
       return $this->hasMany('App\Message', 'sender');
    }

    public function isAdmin()
    {
    	return 	$this->role == 2 ? 1 : 0;
    }

    public function isReader()
    {
    	return 	$this->role == 1 ? 1 : 0;
    }

}
