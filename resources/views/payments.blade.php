<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- OFFER: show if loan <= 3 -->
           
        @if($applications->count() <= 3)
            <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 mb-10">
                <h5 class="mb-2 text-5xl font-bold text-gray-900 dark:text-white">OFFER</h5>
                <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">You still have a   offer. Apply now and get approved as soon as possible.</p>
                <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                    <a href="{{route('application.view_form')}}" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        <div class="text-left rtl:text-right">
                            <div class="-mt-1 font-sans text-sm font-semibold">Apply Now</div>
                        </div>
                    </a>
                </div>
            </div>
            @endif

            @if($payments->count() >= 1)
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
            @else
            <div class="my-5">
            <p class="text-center text-1xl">No Payment yet.</p>
            </div>
            @endif
            
           


        </div>
    </div>


    @extends('footer')
</x-app-layout>
