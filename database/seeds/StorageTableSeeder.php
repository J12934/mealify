<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Storage;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        $user->storages()->create([
            'name' => 'Kühlschrank'
        ])->ingredients()->sync([
            1 => [ 'amount' => 70],
            3 => [ 'amount' => 220],
            5 => [ 'amount' => 600],
            2 => [ 'amount' => 300],
        ]);

        $user->storages()->create([
            'name' => 'Keller'
        ]);
    }
}
