<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $reviews = new Review();
        $reviews->product_id = "1";
        $reviews->customer_id = "ZANI";
        $reviews->rating = 5;
        $reviews->comment = "Amazing!";
        $reviews->save();

        $reviews2 = new Review();
        // point second review to the same product under FOOD
        $reviews2->product_id = "1";
        $reviews2->customer_id = "ZANI";
        $reviews2->rating = 3;
        $reviews2->comment = "Good!";
        $reviews2->save();
    }
}
