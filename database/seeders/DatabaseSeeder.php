<?php

namespace Database\Seeders;

use App\Models\Avatar;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Memory;
use App\Models\Picture;
use App\Models\Type;
use App\Models\User;
use App\Models\Vehicle;
use Database\Factories\VehicleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Type::factory()
//            ->count(5)
//            ->create();

        $this->call(TypeSeeder::class);

        $user = User::factory()
            ->count(10)
            ->create();

        Vehicle::factory()
            ->has(Picture::factory()->count(4))
            ->has(Comment::factory()->count(5))
            ->count(10)
            ->create();

        Comment::factory()
            ->has(Memory::factory()->count(rand(0, 5)))
            ->count(20)
            ->create();

        Booking::factory()
            ->count(10)
            ->create();
    }
}
