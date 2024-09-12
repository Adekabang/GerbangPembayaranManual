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
    <div class="container mx-auto py-10">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white shadow-xl rounded-lg">
                    <div class="p-8">
                        <h1 class="text-2xl font-bold mb-6 text-center">Gerbang Pembayaran Manual</h1>
                        <div class="flex justify-center mb-6">
                            <img id="Logo" src="/img/logo.png" alt="Logo" class="h-56" />
                        </div>

                        <h2 class="text-xl font-semibold mb-6 text-center">Pilih Metode Pembayaran:</h2>
                        @foreach ($bank_list as $bank_name)
                        <div class="mb-5">
                            <div class="flex items-center">
                                <span
                                    class="flex-shrink-0 z-10 inline-flex items-center text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg dark:bg-gray-600 dark:text-white dark:border-gray-600">
                                    <img id="Logo"
                                        src="https://cdn.jsdelivr.net/gh/Adekabang/indonesia-logo-library@main/{{ $bank_name }}.png"
                                        alt="Logo" class="w-16 h-16" />
                                </span>
                                <div class="relative w-full">
                                    <input id="bank-account-{{ $loop->index }}" type="text"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border border-e-0 border-gray-300 text-gray-500 dark:text-gray-400 text-sm border-s-0 focus:ring-gray-500 focus:border-gray-500 block w-full h-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                        value="{{ $bank_account_list[$loop->index] }}" readonly disabled />
                                </div>
                                <button data-tooltip-target="tooltip-bank-account-{{ $loop->index }}"
                                    data-copy-to-clipboard-target="bank-account-{{ $loop->index }}"
                                    class="flex-shrink-0 z-10 inline-flex items-center py-3 px-4 text-sm font-medium text-center text-white bg-gray-700 rounded-e-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 border border-gray-700 dark:border-gray-600 hover:border-gray-800 dark:hover:border-gray-700 h-16"
                                    type="button">
                                    <span id="default-icon-bank-account-{{ $loop->index }}">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 18 20">
                                            <path
                                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <span id="success-icon-bank-account-{{ $loop->index }}"
                                        class="hidden inline-flex items-center">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                    </span>
                                </button>
                                <div id="tooltip-bank-account-{{ $loop->index }}" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    <span id="default-tooltip-message-bank-account-{{ $loop->index }}">Copy</span>
                                    <span id="success-tooltip-message-bank-account-{{ $loop->index }}"
                                        class="hidden">Copied!</span>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <div class="mb-2 flex justify-between items-center">
                                <label for="bank-account-{{ $loop->index }}"
                                    class="text-sm font-medium text-gray-900 dark:text-white">Atas
                                    Nama:
                                    {{ $merchant_list[$loop->index] }}</label>
                            </div>
                        </div>
                        @endforeach

                        <div class=" flex justify-center items-center min-h-screen my-5">
                            <div
                                class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Receipt</h5>
                                <div class="flex items-baseline text-gray-900 dark:text-white">
                                    <span class="text-3xl font-semibold">Rp</span>
                                    <span class="text-5xl font-extrabold tracking-tight">{{ $total }}</span>
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
                                class="block w-full bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">Kirim
                                bukti pembayaran via Whatsapp</a>
                            <a href="{{ $back_invoice }}"
                                class="block w-full bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center">Back
                                to Invoice</a>
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
