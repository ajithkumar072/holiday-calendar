<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CalendarificService;
use App\Models\Holiday;

class FetchHolidays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:holidays {country} {year}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch holidays from Calendarific API and store them in the database';

    public function __construct(CalendarificService $calendarificService)
    {
        parent::__construct();
        $this->calendarificService = $calendarificService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $country = $this->argument('country');
        $year = $this->argument('year');
        $holidays = $this->calendarificService->getHolidays($country, $year);

        foreach ($holidays['response']['holidays'] as $holiday) {
            $date = substr($holiday['date']['iso'], 0, 10);
            Holiday::updateOrCreate(
                ['name' => $holiday['name'], 'date' => $date],
                ['type' => $holiday['type'][0]]
            );
        }

        $this->info('Holidays fetched and stored successfully.');
    }
}
