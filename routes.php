<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\ExtensionHelper;
use App\Models\Invoice;


Route::get('/gerbangpembayaranmanual/payment/{order_id}', function ($order_id) {
    $order_id_prefix = ExtensionHelper::getConfig('GerbangPembayaranManual', 'order_id_prefix');
    $invoiceId = (int) substr($order_id, strlen($order_id_prefix));
    $invoice = Invoice::find($invoiceId);
    $total = isset($invoice->credits) ? $invoice->credits : $invoice->total();

    $bank_name_1 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'bank_name_1');
    $name_1 = urldecode(substr(strrchr($bank_name_1, '/'), 1));
    $merchant_name_1 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'merchant_name_1');
    $bank_account_number_1 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'bank_account_number_1');
    $bank_list = [[$bank_name_1, $name_1]];
    $merchant_list = [$merchant_name_1];
    $bank_account_list = [$bank_account_number_1];

    $bank_name_2 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'bank_name_2');
    $name_2 = urldecode(substr(strrchr($bank_name_2, '/'), 1));
    $merchant_name_2 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'merchant_name_2');
    $bank_account_number_2 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'bank_account_number_2');
    if ($bank_name_2 != 0 && $merchant_name_2 != '' && $bank_account_number_2 != '') {
        array_push($bank_list, [$bank_name_2, $name_2]);
        array_push($merchant_list, $merchant_name_2);
        array_push($bank_account_list, $bank_account_number_2);
    }

    $bank_name_3 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'bank_name_3');
    $name_3 = urldecode(substr(strrchr($bank_name_3, '/'), 1));
    $merchant_name_3 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'merchant_name_3');
    $bank_account_number_3 = ExtensionHelper::getConfig('GerbangPembayaranManual', 'bank_account_number_3');
    if ($bank_name_3 != 0 && $merchant_name_3 != '' && $bank_account_number_3 != '') {
        array_push($bank_list, [$bank_name_3, $name_3]);
        array_push($merchant_list, $merchant_name_3);
        array_push($bank_account_list, $bank_account_number_3);
    }


    $whatsapp_number = ExtensionHelper::getConfig('GerbangPembayaranManual', 'whatsapp_number');
    $confirmation_message = ExtensionHelper::getConfig('GerbangPembayaranManual', 'confirmation_message');
    $payment_confirmation_eta = ExtensionHelper::getConfig('GerbangPembayaranManual', 'payment_confirmation_eta');

    $back_invoice = route('clients.invoice.show', $invoiceId);


    return view('GerbangPembayaranManual::payment', [
        'order_id' => $order_id,
        'back_invoice' => $back_invoice,
        'total' => $total,

        'bank_list' => $bank_list,
        'merchant_list' => $merchant_list,
        'bank_account_list' => $bank_account_list,

        'whatsapp_number' => $whatsapp_number,
        'confirmation_message' => $confirmation_message,
        'payment_confirmation_eta' => $payment_confirmation_eta,
    ]);
})->name('GerbangPembayaranManual.payment');
