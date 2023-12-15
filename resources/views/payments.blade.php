<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loan Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto mt-5 mb-2 flex ">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138"/>
                </svg>
                <a class="font-bold text-xl mb-3 h1">PAYMENTS</a>
            </div>
           
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-5 mt-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Transaction Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Paid Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Loan Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($payments as $payment)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $payment->id }}
                            </th>
                            <td class="px-6 py-4">
                            {{  \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4">
                             {{ $payment->loan->application->loan_number }}
                            </td>
                            <td class="px-6 py-4">
                            ₱ {{ $payment->amount_paid }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            
           


        </div>
    </div>
</x-app-layout>
