<?php

namespace App\Listeners;

use App\Models\Application;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use App\Events\LoanCreated;

class GenerateLoanNumberListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(LoanCreated $event)
    {
        $application = $event->application; // Assuming 'loan' is the name of the loan property in your LoanCreated event

        // Check if the loan_number is already set
        if (!$application->loan_number) {
            // Generate a unique loan number (customize this based on your requirements)
            $application->loan_number = 'LN' . Str::random(8);
            $application->save(); // Save the application model after assigning the loan_number
        }
    }
}
