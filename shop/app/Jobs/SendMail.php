<?php

// namespace App\Jobs;

// use App\Mail\OrderShipped;
// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\Mail;

// class SendMail implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     protected $email;
//     protected $customerOrder;
//     protected $cartOrder;

//     public function __construct($email, $customerOrder, $cartOrder)
//     {
//         $this->email = $email;
//         $this->customerOrder = $customerOrder;
//         $this->cartOrder = $cartOrder;
//     }

//     public function handle()
//     {
//         Mail::to($this->email)->send(new OrderShipped($this->customerOrder, $this->cartOrder));
//     }
// }