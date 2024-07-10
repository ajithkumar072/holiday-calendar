<?php

// app/Services/CalendarificService.php

namespace App\Services;

use GuzzleHttp\Client;

class CalendarificService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://calendarific.com/api/v2/']);
    }

    public function getHolidays($country, $year)
    {
        $response = $this->client->request('GET', 'holidays', [
            'query' => [
                'api_key' => env('CALENDARIFIC_API_KEY'),
                'country' => $country,
                'year' => $year,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
