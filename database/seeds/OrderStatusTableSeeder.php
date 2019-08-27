<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['title' => 'init'],
            ['title' => 'submitted'],
            ['title' => 'delivered'],
            ['title' => 'canceled'],
        ];


        DB::table('order_status')->insert($status);
    }
}
