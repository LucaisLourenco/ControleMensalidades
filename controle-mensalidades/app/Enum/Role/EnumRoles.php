<?php

namespace App\Enum\Role;

use App\Enum\Label\EnumRotuloPadrao;
use App\Models\Role\Role;

enum EnumRoles
{
    const ADMINISTRADOR = 1;
    const CLIENTE = 2;

    public static function  getArray(): array
    {
        $roles = [];

        $roles[self::ADMINISTRADOR] = (new Role())->fill([Role::$id => self::ADMINISTRADOR, Role::$name => EnumRotuloPadrao::ADMINISTRADOR]);
        $roles[self::CLIENTE] = (new Role())->fill([Role::$id => self::CLIENTE, Role::$name => EnumRotuloPadrao::CLIENTE]);

        return $roles;
    }

    public static function getObject(int $idStatus)
    {
        if (array_key_exists($idStatus, ($roles = static::getArray())))
        {
            return $roles[$idStatus];
        }

        return null;
    }
}
