@extends('layouts.admin')
 
@section('content')


<section class="bg-white dark:bg-gray-900">
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

  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Create Payment</h2>
      <form action="{{route('admin.payments.add')}}" method="POST">
        @csrf
        @method('POST')
        
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                  <select id="payment_method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      <option selected="">Select Method</option>
                      <option value="g-cash">G-Cash </option>
                      <option value="paymaya">PayMaya</option>
                      <option value="manual">Manual</option>
                  </select>
              </div>
              <div class="sm:col-span-2">
                  <label for="month_paid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month To Pay</label>
                  <select id="month_paid" name="month_paid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @for ($i = 1; $i <= 46; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
              </div>
              <div class="sm:col-span-2">
                  <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number (If manual payment method leave it empty)</label>
                  <input type="text" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Phone Number" required="">
              </div>
              
              <div class="sm:col-span-2">
                  <label for="loan_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan Number</label>
                  <input type="text" name="loan_number" id="loan_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Loan Number" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                  <input type="number" name="amount_paid" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Amount to Pay" required="">
              </div>

                <div class="sm:col-span-2">
                        <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pay Date</label>
                        <div class="absolute inset-y-12 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker type="text" name="pay_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
              Add Payment
          </button>
      </form>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>


@endsection