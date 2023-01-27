<?php

namespace App\Models;

use App\Observers\PaymentObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    // protected static function booted()
    // {
    //     static::creating(function(Payment $payment){
    //         $now = Carbon::now();
        
    //         if($now->month == 1){
    //             $payment->january = $now;
    //         }
    //         if($now->month == 2){
    //             $payment->february = $now;
    //         }
    //         if($now->month == 3){
    //             $payment->march = $now;
    //         }
    //         if($now->month == 4){
    //             $payment->april = $now;
    //         }
    //         if($now->month == 5){
    //             $payment->may = $now;
    //         }
    //         if($now->month == 6){
    //             $payment->june = $now;
    //         }
    //         if($now->month == 7){
    //             $payment->july = $now;
    //         }
    //         if($now->month == 8){
    //             $payment->ougust = $now;
    //         }
    //         if($now->month == 9){
    //             $payment->september = $now;
    //         }
    //         if($now->month == 10){
    //             $payment->october = $now;
    //         }
    //         if($now->month == 11){
    //             $payment->november = $now;
    //         }
    //         if($now->month == 12){
    //             $payment->december = $now;
    //         }
    //     });
    //     static::updating(function(Payment $payment){
    //         $now = Carbon::now();
        
    //         if($now->month == 1){
    //             $payment->january = $now;
    //         }
    //         if($now->month == 2){
    //             $payment->february = $now;
    //         }
    //         if($now->month == 3){
    //             $payment->march = $now;
    //         }
    //         if($now->month == 4){
    //             $payment->april = $now;
    //         }
    //         if($now->month == 5){
    //             $payment->may = $now;
    //         }
    //         if($now->month == 6){
    //             $payment->june = $now;
    //         }
    //         if($now->month == 7){
    //             $payment->july = $now;
    //         }
    //         if($now->month == 8){
    //             $payment->ougust = $now;
    //         }
    //         if($now->month == 9){
    //             $payment->september = $now;
    //         }
    //         if($now->month == 10){
    //             $payment->october = $now;
    //         }
    //         if($now->month == 11){
    //             $payment->november = $now;
    //         }
    //         if($now->month == 12){
    //             $payment->december = $now;
    //         }
    //     });


    // }
     

}
