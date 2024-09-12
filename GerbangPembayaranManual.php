<?php

namespace App\Extensions\Gateways\GerbangPembayaranManual;

use App\Classes\Extensions\Gateway;
use App\Helpers\ExtensionHelper;

class GerbangPembayaranManual extends Gateway
{
    /**
     * Get the extension metadata
     *
     * @return array
     */
    public function getMetadata()
    {
        return [
            'display_name' => 'GerbangPembayaranManual (GPM)',
            'version' => '1.0.0',
            'author' => 'Mohammad Raska',
            'website' => 'https://github.com/Adekabang/GerbangPembayaranManual',
        ];
    }

    /**
     * Get all the configuration for the extension
     *
     * @return array
     */
    public function getConfig()
    {
        $bank_list = [
            [
                'name' => 'Disable',
                'value' => 0,
            ],
            [
                'name' => 'Mandiri',
                'value' => 'Bank/Bank%20Logo/Mandiri',
            ],
            [
                'name' => 'BCA',
                'value' => 'Bank/Bank%20Logo/BCA',
            ],
            [
                'name' => 'BNI',
                'value' => 'Bank/Bank%20Logo/BNI',
            ],
            [
                'name' => 'BRI',
                'value' => 'Bank/Bank%20Logo/BRI',
            ],
            [
                'name' => 'Jenius',
                'value' => 'Bank/Bank%20App/Jenius',
            ],
            [
                'name' => 'Gopay',
                'value' => 'Bill%20Payment/E-Wallet/Gopay',
            ],
            [
                'name' => 'DANA',
                'value' => 'Payment%20Channel/E-Wallet/DANA',
            ],
            [
                'name' => 'Shopee Pay',
                'value' => 'Payment%20Channel/E-Wallet/Shopee%20Pay',
            ],
        ];
        return [
            [
                'name' => 'order_id_prefix',
                'friendlyName' => 'Order ID Prefix',
                'type' => 'text',
                'placeholder' => 'Order ID Prefix',
                'required' => false,
            ],
            [
                'name' => 'payment_confirmation_eta',
                'friendlyName' => 'Payment Confirmation ETA',
                'type' => 'text',
                'placeholder' => 'Estimate time for payment confirmation',
                'required' => false,
            ],
            // Rekening 1
            [
                'name' => 'bank_name_1',
                'friendlyName' => 'Payment 1: Bank or Wallet Name',
                'type' => 'dropdown',
                'placeholder' => 'Name of Bank or Wallet to Accept Payment',
                'required' => true,
                'options' => $bank_list
            ],
            [
                'name' => 'merchant_name_1',
                'friendlyName' => 'Payment 1: Merchant or Account Name',
                'type' => 'text',
                'placeholder' => 'Name of the Merchant/Account Holder',
                'required' => true,
            ],
            [
                'name' => 'bank_account_number_1',
                'friendlyName' => 'Payment 1: Bank or Wallet Account Number',
                'type' => 'text',
                'placeholder' => 'Account Number of Bank or Wallet to Accept Payment',
                'required' => true,
            ],
            // Rekening 2
            [
                'name' => 'bank_name_2',
                'friendlyName' => 'Payment 2: Bank or Wallet Name',
                'type' => 'dropdown',
                'placeholder' => 'Name of Bank or Wallet to Accept Payment',
                'required' => false,
                'options' => $bank_list
            ],
            [
                'name' => 'merchant_name_2',
                'friendlyName' => 'Payment 2: Merchant or Account Name',
                'type' => 'text',
                'placeholder' => 'Name of the Merchant/Account Holder',
                'required' => false,
            ],
            [
                'name' => 'bank_account_number_2',
                'friendlyName' => 'Payment 2: Bank or Wallet Account Number',
                'type' => 'text',
                'placeholder' => 'Account Number of Bank or Wallet to Accept Payment',
                'required' => false,
            ],
            // Rekening 3
            [
                'name' => 'bank_name_3',
                'friendlyName' => 'Payment 3: Bank or Wallet Name',
                'type' => 'dropdown',
                'placeholder' => 'Name of Bank or Wallet to Accept Payment',
                'required' => false,
                'options' => $bank_list
            ],
            [
                'name' => 'merchant_name_3',
                'friendlyName' => 'Payment 3: Merchant or Account Name',
                'type' => 'text',
                'placeholder' => 'Name of the Merchant/Account Holder',
                'required' => false,
            ],
            [
                'name' => 'bank_account_number_3',
                'friendlyName' => 'Payment 3: Bank or Wallet Account Number',
                'type' => 'text',
                'placeholder' => 'Account Number of Bank or Wallet to Accept Payment',
                'required' => false,
            ],

            [
                'name' => 'whatsapp_number',
                'friendlyName' => 'Whatsapp Number (format 628xxxxxxxxx)',
                'type' => 'text',
                'placeholder' => 'Whatsapp Number for Sending Confirmation (format 628xxxxxxxxx)',
                'required' => true,
            ],
            [
                'name' => 'confirmation_message',
                'friendlyName' => 'Confirmation message send by Customer via Whatsapp',
                'type' => 'text',
                'placeholder' => 'ex: Halo Admin, berikut bukti pembayaran sewa cloud',
                'required' => true,
            ]
        ];
    }

    /**
     * Get the URL to redirect to
     *
     * @param int $total
     * @param array $products
     * @param int $invoiceId
     * @return string
     */
    public function pay($total, $products, $invoiceId)
    {
        $order_id = ExtensionHelper::getConfig('GerbangPembayaranManual', 'order_id_prefix') . $invoiceId;
        return route('GerbangPembayaranManual.payment', ['order_id' => $order_id]);
    }
}
