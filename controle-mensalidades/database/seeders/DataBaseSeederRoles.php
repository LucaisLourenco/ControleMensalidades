<?php

namespace Database\Seeders;

use App\Enum\Role\EnumRoles;
use App\Models\Gender\Gender;
use App\Models\Role\Role;
use Illuminate\Database\Seeder;

class DataBaseSeederRoles extends Seeder
{
    public function run(): void
    {
        foreach (EnumRoles::getArray() as $role) {
            if ($role instanceof Role) {
                $role->insertIfDoesNotExist();
            }
        }
    }
}
