@extends('layouts.admin')
 
@section('content')
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center p-5 justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Loan Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Payment Start
                </th>
                <th scope="col" class="px-6 py-3">
                    Payment End
                </th>
                <th scope="col" class="px-6 py-3">
                    Approved Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Months
                </th>
                <th scope="col" class="px-6 py-3">
                    Monthly Payment
                </th>
                <th scope="col" class="px-6 py-3">
                    Fully Paid
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <!-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image"> -->
                        <div class="ps-3">
                            <a href="{{ route('application.edit', ['id' => $loan->id])}}">
                                <div class="text-base font-semibold">{{ $loan->application->loan_number }}</div>
                            </a>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                    {{ $loan->start_payment_date }}
                    </td>
                    <td class="px-6 py-4">
                        <div class=" me-2">
                        {{ $loan->end_payment_date }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class=" me-2">
                        {{ $loan->application->created_at }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class=" me-2">
                        {{ $loan->application->months_to_pay }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class=" me-2">
                        {{ $loan->application->minimum_payment }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                                @if($loan->fully_paid)
                                <svg class="w-6 h-6 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                </svg>
                                @else
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10 2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                @endif
                            </td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection