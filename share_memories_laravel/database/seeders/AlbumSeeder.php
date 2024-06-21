<?php

namespace Database\Seeders;

use App\Enum\RightsEnum;
use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->getData();
    }

    private function getData()
    {
        $users = User::all();
        $arrRights = [
            RightsEnum::AP->value,
            RightsEnum::AU->value,
            RightsEnum::FS->value,
            RightsEnum::FR->value,
            RightsEnum::ME->value,
        ];

        foreach ($users as $user)
        {
            $quantityAlbums = rand(3, 10);

            for ($i = 0; $i < $quantityAlbums; $i++)
            {
                $rightsKey = array_rand($arrRights);
                $album = Album::factory([
                    'user_id' => $user->id,
                    'rights' => $arrRights[$rightsKey],
                ]);
                $album->create();
            }
        }
    }

}
