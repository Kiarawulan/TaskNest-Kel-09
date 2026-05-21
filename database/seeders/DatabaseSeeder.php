<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'username' => 'Demo User',
            'email'    => 'demo@tasknest.com',
            'password' => Hash::make('password'),
        ]);

        $cats = [];
        foreach (['Pekerjaan', 'Pribadi', 'Belanja', 'Kesehatan'] as $name) {
            $cats[] = Category::create(['name' => $name, 'user_id' => $user->id_user]);
        }

        Task::create([
            'title'       => 'Desain sistem TaskNest',
            'description' => 'Buat wireframe dan prototype aplikasi.',
            'due_date'    => now()->addDays(3)->toDateString(),
            'status'      => 'belum selesai',
            'category_id' => $cats[0]->id_category,
            'user_id'     => $user->id_user,
        ]);
    }
}
