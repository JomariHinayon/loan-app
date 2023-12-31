<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Application') }}
        </h2>
    </x-slot>

    <section class="flex justify-center mx-auto container m-5">
        <ol class="flex items-center justify-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
            <li class="flex items-center text-blue-600 dark:text-blue-500">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                    1
                </span>
                Personal <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                </svg>
            </li>
            <li class="flex items-center text-blue-600 dark:text-blue-500">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                    2
                </span>
                Address <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                </svg>
            </li>
            <li class="flex items-center text-blue-600 dark:text-blue-500">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                    3
                </span>
                Financial and <span class="hidden sm:inline-flex sm:ms-2">identification information</span>
                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                </svg>
            </li>
            <li class="flex items-center text-blue-600 dark:text-blue-500">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                    4
                </span>
                Loan <span class="hidden sm:inline-flex sm:ms-2">Details</span>
                <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                </svg>
            </li>
            <li class="flex items-center">
                <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                    5
                </span>
                <span class="hidden sm:inline-flex sm:ms-2">Review</span>
            </li>
        </ol>
    </section>

    <section class=" dark:bg-gray-900">
    @if($errors->any())
    <div class="alert alert-danger text-center p-5">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    <p class="text-red-500">
                    {{ $error }}
                    </p>

                </li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="bg-white py-16 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Information about your loan</h2>
            <form action="{{route('application.storeLoan')}}" method="POST">
                @csrf
                @method('POST')

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="col-span-2">
                        <label for="loan_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan Amount (₱10,000 - ₱50,000)</label>
                        <input type="number" name="loan_amount" id="loan_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="months_to_pay" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Months To Pay</label>
                        <select name="months_to_pay" id="months_to_pay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select Months</option>
                            <option value="9">9 months</option>
                            <option value="12">12 months</option>
                            <option value="24">24 months</option>
                            <option value="32">32 months</option>
                            <option value="46">46 months</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                        <select id="payment_method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select Method</option>
                            <option value="g-cash">G-Cash </option>
                            <option value="paymaya">PayMaya</option>
                            <option value="manual">Manual</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="interest_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interest Amount</label>
                        <input readonly type="number" name="interest_amount" id="interest_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="interest" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interest</label>
                        <input readonly type="text" name="interest" value="5%" id="interest" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="minimum_payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Payment</label>
                        <input readonly type="number" name="minimum_payment" id="minimum_payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="full_payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Payment</label>
                        <input readonly type="number" name="full_payment" id="full_payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose of Loan</label>
                        <textarea id="description" rows="8" name="loan_purpose" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="Write a product description here..." required=""></textarea>
                    </div>
                    
                </div>
                <button type="submit" class=" items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Next
                </button>
            </form>
        </div>
    </section>



</x-app-layout>

<script>
    // Get the select element
    var selectElement = document.getElementById("months_to_pay");
    // Get the input element
    var loanAmountInput = document.getElementById("loan_amount");

    // Add an event listener to the change event
    selectElement.addEventListener("change", function () {
        // Get the selected option
        var selectedOption = selectElement.options[selectElement.selectedIndex].value;
        var loanAmountValue = loanAmountInput.value;

        var interest= parseInt(loanAmountValue) * 0.05 
        var fullPayment = interest + parseInt(loanAmountValue)
        var minPayment = fullPayment / parseInt(selectedOption)
        

        // Set the value of the minimum payment field
        var minimumPaymentInput = document.getElementById("interest_amount");
        minimumPaymentInput.value = interest;
        var fullPaymentInput = document.getElementById("full_payment");
        fullPaymentInput.value = fullPayment;
        var minPaymentInput = document.getElementById("minimum_payment");
        minPaymentInput.value = minPayment;

        console.log(interest)
        console.log("Loan Amount:", loanAmountValue);
        console.log("Selected option:", selectedOption);
    });
</script>
