<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Settings;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PlanController extends Controller
{
    public function plans()
    {
        $monthlyPlans = Plan::where('type', 'monthly')->get();
        $yearlyPlans = Plan::where('type', 'yearly')->get();
        return view('user.subscriptions.plans', compact('monthlyPlans', 'yearlyPlans'));
    }

    public function purchasePlan(Request $request)
    {
        $selectedType = $request->type;
        //For limiting User Accessing
        $selectedPlan = $request->plan;
        $plan = Plan::where('title', $selectedPlan)->where('type', $selectedType)->first();
        $user = auth()->user();
        $choicePay = Settings::where('key' , 'choicePay')->pluck('value')->first();
        switch ($choicePay) {
            case 0:
                $merchantId = Settings::where('key' , 'zarinpal')->pluck('value')->first();
                $gate = 'zarinpal';
                $configs = [
                    'merchantId' => $merchantId,
                ];
                break;
            case 1:
                $merchantId = Settings::where('key' , 'zibal')->pluck('value')->first();
                $gate = 'zibal';
                $configs = [
                    'merchantId' => $merchantId,
                ];
                break;
            case 2:
                $merchantId = Settings::where('key' , 'nextPay')->pluck('value')->first();
                $gate = 'nextpay';
                $configs = [
                    'merchantId' => $merchantId,
                ];
                break;
            case 3:
                $merchantId = Settings::where('key' , 'idpay')->pluck('value')->first();
                $gate = 'idpay';
                $configs = [
                    'merchantId' => $merchantId,
                ];
                break;
            case 4:
                $terminalBeh = Settings::where('key' , 'terminalBeh')->pluck('value')->first();
                $userBeh = Settings::where('key' , 'userBeh')->pluck('value')->first();
                $passwordBeh = Settings::where('key' , 'passwordBeh')->pluck('value')->first();
                $gate = 'behpardakht';
                $configs = [
                    'terminalId' => $terminalBeh,
                    'username' => $userBeh,
                    'password' => $passwordBeh,
                ];
                break;
            case 5:
                $keySadad = Settings::where('key' , 'keySadad')->pluck('value')->first();
                $merchantSadad = Settings::where('key' , 'merchantSadad')->pluck('value')->first();
                $terminalSadad = Settings::where('key' , 'terminalSadad')->pluck('value')->first();
                $gate = 'sadad';
                $configs = [
                    'key' => $keySadad,
                    'merchantId' => $merchantSadad,
                    'terminalId' => $terminalSadad,
                ];
                break;
        }

        switch ($selectedPlan) {
            case 'Free':
                if ($user && $selectedType == 'Monthly') {
                    $user->update([
                        'plan_id' => $plan->id,
                        'subscribe' => now()->addWeek()->format('Y-m-d')
                    ]);
                    return redirect(route('dashboard'))->with('success', 'You are Free Trial User');
                }else {
                    return redirect(route('login'));
                }

                break;
            case 'Plus':
                if ($user && $selectedType == 'Monthly') {
                    if ($plan->isPurchased()) {
                        return redirect(route('dashboard'));
                    }
                    $invoice = (new Invoice)->amount($plan->price);
                    try {
                        $paymentId = md5(uniqid());
                        $transaction = new Transaction();
                        $transaction->payment_id = $paymentId;
                        $transaction->user_id = $user->id;
                        $transaction->plan_id = $plan->id;
                        $transaction->paid = $plan->price;
                        $transaction->invoice_details = $invoice->getAmount();
                        return Payment::/*via($gate)->config($configs)->*/callbackUrl(route('plan.purchase.result', ['plan' => $plan->id, 'payment_id' => $paymentId]))->purchase(
                            $invoice,
                            function($driver, $transactionId) use ($transaction){
                                $transaction->transaction_id = $transactionId;
                                $transaction->save();
                            }
                        )->pay()->render();
                    }catch (PurchaseFailedException|Exception $exception) {
                        $transaction->transaction_result = [
                            'message' => $exception->getMessage(),
                            'code' => $exception->getCode(),
                        ];
                        $transaction->status = Transaction::STATUS_FAILED;
                        $transaction->save();
                    }
                }elseif ($user && $selectedType == 'Yearly') {
                    if ($plan->isPurchased()) {
                        return redirect(route('dashboard'));
                    }
                    $invoice = (new Invoice)->amount($plan->price);
                    try {
                        $paymentId = md5(uniqid());
                        $transaction = new Transaction();
                        $transaction->payment_id = $paymentId;
                        $transaction->user_id = $user->id;
                        $transaction->plan_id = $plan->id;
                        $transaction->paid = $plan->price;
                        $transaction->invoice_details = $invoice->getAmount();
                        return Payment::/*via($gate)->config($configs)->*/callbackUrl(route('plan.purchase.result', ['plan' => $plan->id, 'payment_id' => $paymentId]))->purchase(
                            $invoice,
                            function($driver, $transactionId) use ($transaction){
                                $transaction->transaction_id = $transactionId;
                                $transaction->save();
                            }
                        )->pay()->render();
                    }catch (PurchaseFailedException|Exception $exception) {
                        $transaction->transaction_result = [
                            'message' => $exception->getMessage(),
                            'code' => $exception->getCode(),
                        ];
                        $transaction->status = Transaction::STATUS_FAILED;
                        $transaction->save();
                    }
                }else {
                    return redirect(route('login'));
                }
                break;
            case 'Pro':
                if ($user && $selectedType == 'Monthly') {
                    if ($plan->isPurchased()) {
                        return redirect(route('dashboard'));
                    }
                    $invoice = (new Invoice)->amount($plan->price);
                    try {
                        $paymentId = md5(uniqid());
                        $transaction = new Transaction();
                        $transaction->payment_id = $paymentId;
                        $transaction->user_id = $user->id;
                        $transaction->plan_id = $plan->id;
                        $transaction->paid = $plan->price;
                        $transaction->invoice_details = $invoice->getAmount();
                        return Payment::/*via($gate)->config($configs)->*/callbackUrl(route('plan.purchase.result', ['plan' => $plan->id, 'payment_id' => $paymentId]))->purchase(
                            $invoice,
                            function($driver, $transactionId) use ($transaction){
                                $transaction->transaction_id = $transactionId;
                                $transaction->save();
                            }
                        )->pay()->render();
                    }catch (PurchaseFailedException|Exception $exception) {
                        $transaction->transaction_result = [
                            'message' => $exception->getMessage(),
                            'code' => $exception->getCode(),
                        ];
                        $transaction->status = Transaction::STATUS_FAILED;
                        $transaction->save();
                    }
                }elseif ($user && $selectedType == 'Yearly') {
                    if ($plan->isPurchased()) {
                        return redirect(route('dashboard'));
                    }
                    $invoice = (new Invoice)->amount($plan->price);
                    try {
                        $paymentId = md5(uniqid());
                        $transaction = new Transaction();
                        $transaction->payment_id = $paymentId;
                        $transaction->user_id = $user->id;
                        $transaction->plan_id = $plan->id;
                        $transaction->paid = $plan->price;
                        $transaction->invoice_details = $invoice->getAmount();
                        return Payment::/*via($gate)->config($configs)->*/callbackUrl(route('plan.purchase.result', ['plan' => $plan->id, 'payment_id' => $paymentId]))->purchase(
                            $invoice,
                            function($driver, $transactionId) use ($transaction){
                                $transaction->transaction_id = $transactionId;
                                $transaction->save();
                            }
                        )->pay()->render();
                    }catch (PurchaseFailedException|Exception $exception) {
                        $transaction->transaction_result = [
                            'message' => $exception->getMessage(),
                            'code' => $exception->getCode(),
                        ];
                        $transaction->status = Transaction::STATUS_FAILED;
                        $transaction->save();
                    }
                }else {
                    return redirect(route('login'));
                }
                break;
            case 'Pro Max':
                if ($user && $selectedType == 'Monthly') {
                    if ($plan->isPurchased()) {
                        return redirect(route('dashboard'));
                    }
                    $invoice = (new Invoice)->amount($plan->price);
                    try {
                        $paymentId = md5(uniqid());
                        $transaction = new Transaction();
                        $transaction->payment_id = $paymentId;
                        $transaction->user_id = $user->id;
                        $transaction->plan_id = $plan->id;
                        $transaction->paid = $plan->price;
                        $transaction->invoice_details = $invoice->getAmount();
                        return Payment::/*via($gate)->config($configs)->*/callbackUrl(route('plan.purchase.result', ['plan' => $plan->id, 'payment_id' => $paymentId]))->purchase(
                            $invoice,
                            function($driver, $transactionId) use ($transaction){
                                $transaction->transaction_id = $transactionId;
                                $transaction->save();
                            }
                        )->pay()->render();
                    }catch (PurchaseFailedException|Exception $exception) {
                        $transaction->transaction_result = [
                            'message' => $exception->getMessage(),
                            'code' => $exception->getCode(),
                        ];
                        $transaction->status = Transaction::STATUS_FAILED;
                        $transaction->save();
                    }
                }elseif ($user && $selectedType == 'Yearly') {
                    if ($plan->isPurchased()) {
                        return redirect(route('dashboard'));
                    }
                    $invoice = (new Invoice)->amount($plan->price);
                    try {
                        $paymentId = md5(uniqid());
                        $transaction = new Transaction();
                        $transaction->payment_id = $paymentId;
                        $transaction->user_id = $user->id;
                        $transaction->plan_id = $plan->id;
                        $transaction->paid = $plan->price;
                        $transaction->invoice_details = $invoice->getAmount();
                        return Payment::/*via($gate)->config($configs)->*/callbackUrl(route('plan.purchase.result', ['plan' => $plan->id, 'payment_id' => $paymentId]))->purchase(
                            $invoice,
                            function($driver, $transactionId) use ($transaction){
                                $transaction->transaction_id = $transactionId;
                                $transaction->save();
                            }
                        )->pay()->render();
                    }catch (PurchaseFailedException|Exception $exception) {
                        $transaction->transaction_result = [
                            'message' => $exception->getMessage(),
                            'code' => $exception->getCode(),
                        ];
                        $transaction->status = Transaction::STATUS_FAILED;
                        $transaction->save();
                    }
                }else {
                    return redirect(route('login'));
                }
                break;
        }
        return redirect(route('plans'))->with('danger', 'Wrong URL!! :(');
    }

    public function purchasePlanResult(Request $request, Plan $plan)
    {
        if ($request->missing('payment_id')) {
            return view('user.payment.result')->with('error', 'تراکنش با شکست مواجه شد.');
        }
        $transaction = Transaction::where('payment_id', $request->payment_id)->first();

        if (empty($transaction)) {
            return view('user.payment.result')->with('error', 'تراکنش با شکست مواجه شد.');
        }
        if ($transaction->user_id <> Auth::id()) {
            return view('user.payment.result')->with('error', 'تراکنش با شکست مواجه شد.');
        }
        if ($transaction->plan_id <> $plan->id) {
            return view('user.payment.result')->with('error', 'تراکنش با شکست مواجه شد.');
        }
        if ($transaction->status <> Transaction::STATUS_PENDING) {
            return view('user.payment.result')->with('error', 'تراکنش با شکست مواجه شد.');
        }

        try {
            $receipt = Payment::amount($plan->price)->transactionId($request->Authority)->verify();

            $transaction->transaction_result = $receipt;
            $transaction->status = Transaction::STATUS_SUCCESS;
            $transaction->save();
            Auth::user()->purchasedPlans()->create([
                'plan_id' => $plan->id,
            ]);
            $boughtPlan = Plan::find($plan->id);
            if ($boughtPlan->type == 'Monthly') {
                Auth::user()->update([
                    'plan_id' => $plan->id,
                    'subscribe' => now()->addMonth()->format('Y-m-d')
                ]);
            }elseif ($boughtPlan->type == 'Yearly') {
                Auth::user()->update([
                    'plan_id' => $plan->id,
                    'subscribe' => now()->addYear()->format('Y-m-d')
                ]);
            }

            $reference_id = $receipt->getReferenceId();
            $payment = \App\Models\Transaction::where('payment_id', request()->payment_id)->first();
             return view('user.payment.result', compact('plan', 'reference_id', 'payment'));


        }catch (Exception|InvalidPaymentException $exception) {
            if ($exception->getCode() < 0) {
                $transaction->status = Transaction::STATUS_FAILED;
                $transaction->transaction_result = [
                    'message' => $exception->getCode(),
                    'code' => $exception->getCode()
                ];
                $transaction->save();

                return  view('user.payment.result')->with([
                    'status' => $exception->getCode(),
                    'message' => $exception->getMessage(),
                ]);
            }
        }
    }
}
