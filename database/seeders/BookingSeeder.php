<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Bookings;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = new Bookings;
        $bookings->namaClient = 'yefando';
        $bookings->namaIstansi = 'DISPORA';
        $bookings->noHp = '081120500658';
        $bookings->start = '2023-03-04';
        $bookings->end = '2023-03-04';
        $bookings->save();
    }
}
