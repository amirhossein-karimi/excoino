<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrencyPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-currency-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $response = Http::get('https://6626085e052332d553215dbe.mockapi.io/api/v1/price');

        foreach ($response->json() as $currency) {
            
            $currency_model = Currency::where('name', $currency['name'])->first();

            if ($currency_model) {

                $currency_model->price = $currency['price'];
            } else {

                Currency::create([
                    'name' => $currency['name'],
                    'price' => $currency['price']
                ]);
            }
        }
    }
}
