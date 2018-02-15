<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require_once 'admin/admin.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('test', function () {
//    /* @var \Srmklive\PayPal\Services\ExpressCheckout $paypal */
//
//    $paypal = \PayPal::setProvider('express_checkout');
//
//    $data = [];
//
//    $data['items'] = [
//        [
//            'name'  => 'Product 1',
//            'price' => '20.00',
//            'qty'   =>  2
//        ],
//    ];
//
//    $data['invoice_id'] = rand(1111111111, 9999999999);
//    $data['invoice_description'] = "Invoice {$data['invoice_id']}";
//    $data['return_url'] = url('success');
//    $data['cancel_url'] = url('/cart');
//
//    $total = 0;
//
//    foreach ($data['items'] as $item) {
//        $total += $item['price'] * $item['qty'];
//    }
//
//    $data['total'] = $total;
//
//    $response = $paypal->setExpressCheckout($data, true);
//
//    return redirect($response['paypal_link']);
//});
//
//Route::get('/success', function (\Illuminate\Http\Request $request) {
//    /* @var \Srmklive\PayPal\Services\ExpressCheckout $paypal */
//    $paypal = \PayPal::setProvider('express_checkout');
//
///*    $data = [];
//
//    $data['items'] = [
//        [
//            'name'  => 'Product 1',
//            'price' => '20.00',
//            'qty'   =>  2
//        ],
//    ];
//
//    $data['invoice_id'] = rand(1111111111, 9999999999);
//    $data['invoice_description'] = "Invoice {$data['invoice_id']}";
//    $data['return_url'] = url('successs');
//    $data['cancel_url'] = url('/cartt');
//
//    $total = 0;
//
//    foreach ($data['items'] as $item) {
//        $total += $item['price'] * $item['qty'];
//    }
//
//    $data['total'] = $total;*/
//
//    $data = [
//        'PROFILESTARTDATE' => Carbon\Carbon::now()->toAtomString(),
//        'DESC' => 'Invoice 4240836257',
//        'BILLINGPERIOD' => 'Month', // Can be 'Day', 'Week', 'SemiMonth', 'Month', 'Year'
//        'BILLINGFREQUENCY' => 1, //
//        'AMT' => 10, // Billing amount for each billing cycle
//        'CURRENCYCODE' => 'USD', // Currency code
//        'TRIALBILLINGPERIOD' => 'Day',  // (Optional) Can be 'Day', 'Week', 'SemiMonth', 'Month', 'Year'
//        'TRIALBILLINGFREQUENCY' => 10, // (Optional) set 12 for monthly, 52 for yearly
//        'TRIALTOTALBILLINGCYCLES' => 1, // (Optional) Change it accordingly
//        'TRIALAMT' => 0, // (Optional) Change it accordingly
//    ];
//
////    $response = $paypal->doExpressCheckoutPayment($data, $request->get('token'), $request->get('PayerID'));
//    $response = $paypal->createRecurringPaymentsProfile($data, $request->get('token'));
//
//    $a = '';
//});

Route::get('test', function () {

    $gateway = \Omnipay\Omnipay::create('PayPal_Express');
    $gateway->setUsername('a.polykarpov-facilitator_api1.udtech.co');
    $gateway->setPassword('DRR95BR3ZJW3AVU5');
    $gateway->setSignature('A8il9T27k9Fnji5K9b..zN544zP0AC0819MgBx41VNDrmqqMQyBodyHi');
    $gateway->setTestMode(true);

    $response = $gateway->purchase(
        [
            'cancelUrl' => 'http://shedyourfat.local/cancelurl',
            'returnUrl' => 'http://shedyourfat.local/returnurl',
            'amount'    => '25.00',
            'currency'  => 'USD',
        ]
    )->send();

    if ($response->isRedirect()) {
        return $response->redirect();
    }

    $data = $response->getData(); // this is the raw response object
    echo '<pre>';
    print_r($data);
});

Route::get('returnurl', function (\Illuminate\Http\Request $request) {
    $a = '';

    $gateway = \Omnipay\Omnipay::create('PayPal_Express');
    $gateway->setUsername('a.polykarpov-facilitator_api1.udtech.co');
    $gateway->setPassword('DRR95BR3ZJW3AVU5');
    $gateway->setSignature('A8il9T27k9Fnji5K9b..zN544zP0AC0819MgBx41VNDrmqqMQyBodyHi');
    $gateway->setTestMode(true);

    $response = $gateway->completePurchase(
        [
            'cancelUrl' => 'http://shedyourfat.local/cancelurl',
            'returnUrl' => 'http://shedyourfat.local/returnurl',
            'amount'    => '25.00',
            'currency'  => 'USD',
        ]
    )->send();

    $data = $response->getData(); // this is the raw response object
    echo '<pre>';
    print_r($data);
});
