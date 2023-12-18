<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <!-- OFFER: show if loan <= 3 -->

 
           
           @if($applications->count() < 3)
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

            <div class="relative overflow-x-auto mt-5 mb-2 px-2">
                <p class="font-bold text-lg">Activate Loans</p>
            </div>

            @if($loans->count() >= 1)
            <div class="grid grid-cols-3 gap-5">
                @foreach ($loans as $loan)

                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('profile.loan', $loan->id) }}">
                        <p class=" font-normal text-xs text-gray-700 dark:text-gray-400">DUE PAYMENT </p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">₱ {{ $loan->application->minimum_payment}}</h5>
                        </a>
                        <div class="flex flex-col items-left mb-3">
                            <p class=" font-normal text-sm text-gray-700 dark:text-gray-400">Loan Account Number: </p>
                            <p class=" text-1xl text-gray-700 dark:text-gray-400 font-bold">{{ $loan->application->loan_number}}</p>
                        </div>
                        <div class="flex flex-col items-left mb-3">
                            <p class=" font-normal text-sm text-md text-gray-700 dark:text-gray-400">Pay on or before </p>
                            <p class=" text-1xl text-gray-700 dark:text-gray-400 font-bold">{{ \Carbon\Carbon::parse($loan->application->first_payment_date)->format('Y-m-d')}}</p>
                        </div>
                        <a href="{{ route('profile.loan', $loan->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Loan Details
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                @endforeach
                </div>
            @else
            <div class="my-5">
            <p class="text-center text-1xl">No active Loans.</p>
            </div>
            @endif

        </div>
    </div>

    @extends('footer')
</x-app-layout>
