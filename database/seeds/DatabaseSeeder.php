<?php

use App\Country;
use App\Customer;
use App\Transaction;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->command->info('Seeding starts');

        $this->command->info('Droping data');

        DB::table('customers')->delete();
        DB::table('countries')->delete();
        DB::table('transactions')->delete();

        $this->command->info('Creating countries and customers');

        $country1 = new Country;
        $country1->name = 'Country one';
        $country1->save();

        $customer1 = $country1->customers()->create([
            'full_name' => 'Customer One'
        ]);
        $customer2 = $country1->customers()->create([
            'full_name' => 'Customer Two'
        ]);
        $customer3 = $country1->customers()->create([
            'full_name' => 'Customer Three'
        ]);

        $country2 = Country::create(['name' => 'Country Two']);

        $country2->customers()->create([
            'full_name' => 'Customer Four'
        ]);
        $country2->customers()->create([
            'full_name' => 'Customer Five'
        ]);

        $this->command->info('Creating transactions');
        $date = new DateTime();

        Transaction::create([
            'customer_id' => $customer1->id,
            'country_id' => $country1->id,
            'amount' => 25.50,
            'date' => $date
        ]);

        Transaction::create([
            'customer_id' => $customer1->id,
            'country_id' => $country1->id,
            'amount' => 30.50,
            'date' => $date->add(new DateInterval('P15D'))
        ]);

        Transaction::create([
            'customer_id' => $customer2->id,
            'country_id' => $country1->id,
            'amount' => 30.50,
            'date' => $date->add(new DateInterval('P10D'))
        ]);

        Transaction::create([
            'customer_id' => $customer3->id,
            'country_id' => $country1->id,
            'amount' => 300.50,
            'date' => $date->add(new DateInterval('P10D'))
        ]);

        Transaction::create([
            'customer_id' => $customer3->id,
            'country_id' => $country2->id,
            'amount' => 100.50,
            'date' => $date
        ]);

        $this->command->info('Seeding complete');
    }
}
