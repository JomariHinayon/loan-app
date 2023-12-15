<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <!-- OFFER: show if loan <= 3 -->
            <!-- <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-5xl font-bold text-gray-900 dark:text-white">OFFER</h5>
                <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">You still have a loan offer. Apply now and get approved as soon as possible.</p>
                <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                    <a href="{{route('application.view_form')}}" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        <div class="text-left rtl:text-right">
                            <div class="-mt-1 font-sans text-sm font-semibold">Apply Now</div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>
