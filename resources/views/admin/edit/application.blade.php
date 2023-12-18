@extends('layouts.admin')
 
@section('content')
    
<section class="bg-white dark:bg-gray-900">
  <div class=" px-4 py-8 mx-10 lg:py-16">
    <div class="flex justify-between mb-10 ">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white ">LOAN NUMBER: 
            <span class="text-red-700">
            {{ strtoupper($application->loan_number) }}
            </span>
            <div class=" me-2">
                        @if ( $application->loan_status == "pending" )
                        <span class="bg-yellow-600 text-yellow-100 text-sm font-bold  me-2 px-3 py-1 rounded-md ">Pending</span>
                        @elseif ($application->loan_status == "process" )
                        <span class="bg-gray-800 text-gray-100 text-sm font-bold  me-2 px-3 py-1 rounded-md ">In Process</span>
                        @elseif ($application->loan_status == "failed" )
                        <span class="bg-red-800 text-red-100 text-sm font-bold  me-2 px-3 py-1 rounded-md ">Failed</span>
                        @elseif ($application->loan_status == "approved" )
                        <span class="bg-green-600 text-green-100 text-sm font-bold  me-2 px-3 py-1 rounded-md ">Approved</span>
                        @endif
                        </div>
        </h2>
        <div class="flex items-center gap-3">
            <p class="text-lg font-bold text-gray-900 dark:text-white">STATUS: </p>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" 
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2  dark:border-blue-500 dark:text-blue-500 
            dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800
            rounded-lg text-md px-5 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
            type="button"> {{ strtoupper($application->loan_status) }} <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white  divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <form method="POST" action="{{ route('application.update.loanStatus', ['application' => $application->id, 'loan_status' => 'failed'])}}">
                    @csrf
                    @method('PUT')
                        <button type="submit"
                        class="block px-4 text-red-500 font-semibold w-[100%] py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Failed</button>
                </form>
                <form method="POST" action="{{ route('application.update.loanStatus', ['application' => $application->id, 'loan_status' => 'process'])}}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="block px-4 w-[100%] text-gray-500 font-semibold  py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">In Process</button>
                </form>
                <form method="POST" action="{{ route('application.update.loanStatus', ['application' => $application->id, 'loan_status' => 'pending'])}}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="block px-4 w-[100%] text-yellow-500 font-semibold  py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Pending</button>
                </form>
                <form method="POST" action="{{ route('application.update.loanStatus', ['application' => $application->id, 'loan_status' => 'approved'])}}">
                    @csrf
                    @method('PUT')
                    <button type="submit" href="#" class="block px-4 w-[100%] text-green-500  font-semibold py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Approved</button>
                </form>
                </ul>
            </div>  
        </div>

    </div>

    
      <form action="#">
        <div class="grid gap-4 mb-4 sm:grid-cols-1 sm:gap-6 sm:mb-5">
            <div class="grid gap-4 mb-4 sm:grid-cols-10 sm:gap-6 sm:mb-8 w-full">
                <div class="sm:col-span-12">
                    <p class="text-lg font-semibold">Personal Info</p>
                </div>
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" name="first_name" id="name" 
                    value="{{$application->first_name}}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="Apple iMac 27&ldquo;" placeholder="Type product name" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                    <input type="text" name="middle_name" value="{{$application->middle_name}}" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="Apple" placeholder="Product brand" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" name="last_name" value="{{$application->last_name}}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="2999" placeholder="$299" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                    <select id="category" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" >Select Gender</option>
                        <option value="male" {{ "male" == $application->gender ? 'selected=""' : '' }}>Male</option>
                        <option value="female" {{ "male" == $application->gender ? 'selected=""' : '' }}>Female</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                    <input type="text" name="phone_numbeer" value="{{$application->phone_number}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
            </div>
            <div class="grid gap-4 mb-4 sm:grid-cols-10 sm:gap-6 sm:8 w-full">
                <div class="sm:col-span-12">
                    <p class="text-lg font-semibold">Address Details</p>
                </div>
                <div class="sm:col-span-2">
                    <label for="home_ownership" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home ownership</label>
                    <select name="home_ownership" id="home_ownership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>Select category</option>
                        <option value="Renting" {{ "Renting" == $address->home_ownership ? 'selected=""' : '' }}>Renting</option>
                        <option value="Own - mortgaged" {{ "Own - mortgaged" == $address->home_ownership ? 'selected=""' : '' }}>Own - mortgaged</option>
                        <option value="Staying with relatives" {{ "Staying with relatives" == $address->home_ownership ? 'selected=""' : '' }}>Staying with relatives</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Rent</label>
                    <input type="number" name="monthly_rent" value="{{$address->monthly_rent}}" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="Apple" placeholder="Product brand" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                    <input type="text" name="province" value="{{$address->province}}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="2999" placeholder="$299" required="">
                </div>
                <div class="sm:col-span-4">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Address</label>
                    <input type="text" name="current_address" value="{{$address->current_address}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-2">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <input type="text" name="city" value="{{$address->city}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-2">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                    <input type="text" name="barangay" value="{{$address->barangay}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-2">
                    <label for="years_living" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Years living in your current address</label>
                    <select name="years_living" id="years_living" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="Less than 1 year" {{ "Less than 1 year" == $address->years_living ? 'selected=""' : '' }}>Less than 1 year</option>
                            <option value="1-3 years" {{ "1-3 years" == $address->years_living ? 'selected=""' : '' }}>1-3 years</option>
                            <option value="3-5 years" {{ "3-5 years" == $address->years_living ? 'selected=""' : '' }} >3-5 years</option>
                            <option value="More than 5 years" {{ "More than 5 years" == $address->years_living ? 'selected=""' : '' }}>More than 5 years</option>
                    </select>
                </div>
            </div>
            <div class="grid gap-4 mb-4 sm:grid-cols-10 sm:gap-6 sm:8 w-full">
                <div class="sm:col-span-12">
                    <p class="text-lg font-semibold">Financial and Identification Information</p>
                </div>
                <div class="sm:col-span-4">
                    <label for="employment_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of employment</label>
                        <select name="employment_type" id="employment_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="Buiness Owner" {{ "Buiness Owner" == $employment->employment_type ? 'selected=""' : '' }}>Buiness Owner</option>
                            <option value="Freelancer" {{ "Freelancer" == $employment->employment_type ? 'selected=""' : '' }}>Freelancer</option>
                            <option value="Government Employee" {{ "Government Employee" == $employment->employment_type ? 'selected=""' : '' }}>Government Employee</option>
                            <option value="Private Company Employee" {{ "Private Company Employee" == $employment->employment_type ? 'selected=""' : '' }}>Private Company Employee</option>
                            <option value="Self Employed" {{ "Self Employed" == $employment->employment_type ? 'selected=""' : '' }}>Self Employed</option>
                            <option value="Student" {{ "Student" == $employment->employment_type ? 'selected=""' : '' }}>Student</option>
                            <option value="Unemployed" {{ "Unemployed" == $employment->employment_type ? 'selected=""' : '' }}>Unemployed</option>
                        </select>
                </div>
                <div class="sm:col-span-4">
                    <label for="work_nature" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nature of work</label>
                        <select name="work_nature" id="work_nature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="BPO" {{ "BPO" == $employment->work_nature ? 'selected=""' : '' }}>BPO</option>
                            <option value="Business / Entrepreneur" {{ "Business / Entrepreneur" == $employment->work_nature ? 'selected=""' : '' }}>Business / Entrepreneur</option>
                            <option value="Freelance and Online-Based Work" {{ "Freelance and Online-Based Work" == $employment->work_nature ? 'selected=""' : '' }}>Freelance and Online-Based Work</option>
                            <option value="Government Officer" {{ "Government Officer" == $employment->work_nature ? 'selected=""' : '' }}>Government Officer</option>
                            <option value="OFW / Seaferer" {{ "OFW / Seaferer" == $employment->work_nature ? 'selected=""' : '' }}>OFW / Seaferer</option>
                            <option value="Other" {{ "Other" == $employment->work_nature ? 'selected=""' : '' }}>Other</option>
                        </select>
                </div>
                <div class="sm:col-span-4">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
                    <input type="text" name="company_name" value="{{$employment->company_name}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-3">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Phone</label>
                    <input type="text" name="company_phone" value="{{$employment->company_phone}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-3">
                <label for="months_working" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of months working for current employer</label>
                        <select name="months_working" id="months_working" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="Less than 1 year" {{ "Less than 1 year" == $employment->months_working ? 'selected=""' : '' }}>Less than 1 year</option>
                            <option value="1-3 years" {{ "1-3 years" == $employment->months_working ? 'selected=""' : '' }}>1-3 years</option>
                            <option value="3-5 years" {{ "3-5 years" == $employment->months_working ? 'selected=""' : '' }}>3-5 years</option>
                            <option value="More than 5 years" {{ "More than 5 years" == $employment->months_working ? 'selected=""' : '' }}>More than 5 years</option>
                        </select>
                </div> 
                <div class="sm:col-span-3">
                    <label for="years_living" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Years living in your current address</label>
                    <select name="years_living" id="years_living" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="Less than 1 year" {{ "Less than 1 year" == $address->years_living ? 'selected=""' : '' }}>Less than 1 year</option>
                            <option value="1-3 years" {{ "1-3 years" == $address->years_living ? 'selected=""' : '' }}>1-3 years</option>
                            <option value="3-5 years" {{ "3-5 years" == $address->years_living ? 'selected=""' : '' }} >3-5 years</option>
                            <option value="More than 5 years" {{ "More than 5 years" == $address->years_living ? 'selected=""' : '' }}>More than 5 years</option>
                    </select>
                </div>
                <div class="sm:col-span-3">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly Income</label>
                    <input type="number" name="monthly_income" value="{{$employment->monthly_income}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-6">
                    <label for="salary_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How often do you get your salary in a month</label>
                        <select name="salary_day" id="salary_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="Once a month" {{ "Once a month" == $address->salary_day ? 'selected=""' : '' }}>Once a month</option>
                            <option value="Twice a month" {{ "Twice a month" == $address->salary_day ? 'selected=""' : '' }}>Twice a month</option>
                            <option value="Weekly" {{ "Weekly" == $address->salary_day ? 'selected=""' : '' }}>Weekly</option>
                        </select>
                </div>
                <div class="sm:col-span-12">
                    <label for="valid_id1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valid Id 1</label>
                    <img class="h-auto max-w-full" src="{{ url('storage/images/'.$application->valid_id1) }}" alt="image description">
                </div>
                <div class="sm:col-span-12">
                    <label for="valid_id2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valid Id 2</label>
                    <img class="h-auto max-w-full" src="{{ url('storage/images/'.$application->valid_id2) }}" alt="image description">
                </div>
            </div>

            <div class="grid gap-4 mb-4 sm:grid-cols-10 sm:gap-6 sm:8 w-full">
                <div class="sm:col-span-12">
                    <p class="text-lg font-semibold">Loan Details</p>
                </div>
                <div class="sm:col-span-6">
                    <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Select category</option>
                            <option value="paymaya" {{ "paymaya" == $application->payment_method ? 'selected=""' : '' }}>PayMaya</option>
                            <option value="g-cash" {{ "g-cash" == $application->payment_method ? 'selected=""' : '' }}>G-Cash</option>
                            <option value="manual" {{ "manual" == $application->payment_method ? 'selected=""' : '' }}>Manual</option>
                        </select>
                </div>
                <div class="sm:col-span-6">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loan Amount</label>
                    <input type="text" name="company_name" value="{{$application->loan_amount}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-12">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interest Amount</label>
                    <input type="text" name="company_name" value="{{$application->interest_amount}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-12">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Payment Amount</label>
                    <input type="text" name="company_name" value="{{$application->full_payment}}"  id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="15" placeholder="Ex. 12" required="">
                </div> 
                <div class="sm:col-span-12">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose of Loan</label>
                        <textarea id="description" rows="8" name="loan_purpose" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="Write a product description here..." required="" value="{{$application->loan_purpose}}">{{$application->loan_purpose}}
                    </textarea>
                    </div>
            </div>

        </div>
            <!-- <div class="flex items-center space-x-4">
                <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete
                </button>
                <button type="button" class="text-blue-600 inline-flex items-center hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-red-900">
                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12V1m0 0L4 5m4-4 4 4m3 5v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                    </svg>                  
                    Update
                </button>
            </div> -->

      </form>
  </div>
</section>


@endsection
