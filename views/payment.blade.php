<?php
$whatsappLink = "";

$whatsappLink = "https://wa.me/$whatsapp_number?text=$confirmation_message%0AOrder%20ID%3A%20$order_id%0A";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerbang Pembayaran Manual</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-10 my-5">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white shadow-xl rounded-lg py-5">
                    <h1 class="text-2xl font-bold mb-6 text-center">Gerbang Pembayaran Manual</h1>
                    <div class="flex justify-center mb-6">
                        <img id="Logo" src="/img/logo.png" alt="Logo" class="h-36" />
                    </div>
                    <div class="max-w-sm text-center mx-auto">
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center justify-center"
                                id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                                data-tabs-active-classes="text-gray-600 hover:text-gray-600 border-gray-900"
                                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                role="tablist">
                                @foreach ($bank_list as $bank_name)
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-2 border-b-2 border-t-2 rounded-t-lg"
                                        id="bank-account-{{ $loop->index }}-styled-tab"
                                        data-tabs-target="#styled-bank-account-{{ $loop->index }}" type="button"
                                        role="tab" aria-controls="bank-account-{{ $loop->index }}"
                                        aria-selected="false">
                                        <img id="Logo"
                                            src="https://cdn.jsdelivr.net/gh/Adekabang/indonesia-logo-library@main/{{ $bank_name[0] }}.png"
                                            alt="Logo" class="w-16 h-16" />

                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="default-styled-tab-content">
                            @foreach ($bank_list as $bank_name)
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 text-left"
                                id="styled-bank-account-{{ $loop->index }}" role="tabpanel"
                                aria-labelledby="bank-account-{{ $loop->index }}-tab">
                                <h3 class="text-center font-bold underline">{{ $bank_list[$loop->index][1] }}</h3>
                                <div class="my-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Account Name:</p>
                                    <div class="font-medium text-lg text-gray-800 dark:text-white">{{
                                        $merchant_list[$loop->index] }}</div>
                                </div>
                                <div class="my-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Account Number:</p>
                                    <div class="font-medium text-lg text-gray-900 dark:text-white">
                                        <div class="w-full">
                                            <div class="relative">
                                                <label for="bank-account-{{ $loop->index }}"
                                                    class="sr-only">Label</label>
                                                <input id="bank-account-{{ $loop->index }}" type="text"
                                                    class="font-medium text-lg text-gray-900 dark:text-white col-span-6 bg-gray-50 border border-gray-50 rounded-lg  block w-full p-2.5"
                                                    value="{{ $bank_account_list[$loop->index] }}" disabled readonly>
                                                <button data-copy-to-clipboard-target="bank-account-{{ $loop->index }}"
                                                    data-tooltip-target="tooltip-bank-account-{{ $loop->index }}"
                                                    class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                                                    <span id="default-icon-bank-account-{{ $loop->index }}">
                                                        <svg class="w-3.5 h-3.5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 18 20">
                                                            <path
                                                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                                        </svg>
                                                    </span>
                                                    <span id="success-icon-bank-account-{{ $loop->index }}"
                                                        class="hidden inline-flex items-center">
                                                        <svg class="w-3.5 h-3.5 text-gray-700 dark:text-gray-500"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5.917 5.724 10.5 15 1.5" />
                                                        </svg>
                                                    </span>
                                                </button>
                                                <div id="tooltip-bank-account-{{ $loop->index }}" role="tooltip"
                                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    <span
                                                        id="default-tooltip-message-bank-account-{{ $loop->index }}">Copy
                                                        to clipboard</span>
                                                    <span id="success-tooltip-message-bank-account-{{ $loop->index }}"
                                                        class="hidden">Copied!</span>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>

                        <div class=" flex justify-center items-center min-h-screen my-5">
                            <div
                                class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Receipt</h5>
                                <div class="flex items-baseline text-gray-900 dark:text-white">
                                    <span class="text-3xl font-semibold">Rp</span>
                                    <span class="text-5xl font-extrabold tracking-tight">
                                        {{
                                        number_format($total, 0,',', '.')
                                        }}
                                    </span>
                                </div>
                                <ul role="list" class="space-y-5 my-7">
                                    <li class="flex space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-600 dark:text-gray-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                        <span
                                            class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Order
                                            ID: {{ $order_id }}</span>
                                    </li>
                                    <li class="flex space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-600 dark:text-gray-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Catatan
                                            transfer:
                                            {{ $order_id }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <a id="whatsapp-link" href="{{ $whatsappLink }}" target="_blank"
                                class="block w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded text-center">Kirim
                                bukti pembayaran via Whatsapp</a>
                            <a href="{{ $back_invoice }}"
                                class="block w-full border-2 border-gray-200 hover:bg-gray-100 text-gray-900 font-bold py-2 px-4 rounded text-center">Kembali
                                ke Invoice</a>
                        </div>
                        <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 mt-6" role="alert">
                            <p class="mb-3">Pembayaran Anda diproses secara manual. Setelah melakukan pembayaran, harap
                                bersabar menunggu konfirmasi. Terima kasih!</p>
                            @if($payment_confirmation_eta)
                            <p class="mb-3">Estimasi waktu konfirmasi pembayaran: {{ $payment_confirmation_eta }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script>
        window.onload = function () {
            const clipboards = FlowbiteInstances.getInstances('CopyClipboard');
            const tooltips = FlowbiteInstances.getInstances('Tooltip');

            clipboards['bank-account-0'].updateOnCopyCallback((clipboard) => {
                showSuccess('bank-account-0');
                // reset to default state
                setTimeout(() => {
                    resetToDefault('bank-account-0');
                }, 2000);
            })
            clipboards['bank-account-1'].updateOnCopyCallback((clipboard) => {
            showSuccess('bank-account-1');
            // reset to default state
            setTimeout(() => {
            resetToDefault('bank-account-1');
            }, 2000);
            })
            clipboards['bank-account-2'].updateOnCopyCallback((clipboard) => {
            showSuccess('bank-account-2');
            // reset to default state
            setTimeout(() => {
            resetToDefault('bank-account-2');
            }, 2000);
            })

            const showSuccess = (index) => {
                document.getElementById(`default-icon-${index}`).classList.add('hidden');
                document.getElementById(`success-icon-${index}`).classList.remove('hidden');;
                document.getElementById(`default-tooltip-message-${index}`).classList.add('hidden');
                document.getElementById(`success-tooltip-message-${index}`).classList.remove('hidden');
                tooltips[`tooltip-${index}`].show();
            }

            const resetToDefault = (index) => {
                document.getElementById(`default-icon-${index}`).classList.remove('hidden');
                document.getElementById(`success-icon-${index}`).classList.add('hidden');;
                document.getElementById(`default-tooltip-message-${index}`).classList.remove('hidden');
                document.getElementById(`success-tooltip-message-${index}`).classList.add('hidden');
                tooltips[`tooltip-${index}`].hide();
            }
        }
    </script>
</body>

</html>
