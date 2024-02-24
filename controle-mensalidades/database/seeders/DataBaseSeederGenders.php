<?php

namespace Database\Seeders;

use App\Enum\Gender\EnumGenders;
use App\Models\Gender\Gender;
use Illuminate\Database\Seeder;

class DataBaseSeederGenders extends Seeder
{
    public function run(): void
    {
        foreach (EnumGenders::getArray() as $gender) {
            if ($gender instanceof Gender) {
                $gender->insertIfDoesNotExist();
            }
        }
    }
}
