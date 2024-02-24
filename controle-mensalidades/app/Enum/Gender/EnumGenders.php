<?php

namespace App\Enum\Gender;

use App\Enum\Label\EnumRotuloPadrao;
use App\Models\Gender\Gender;

enum EnumGenders
{
    const MASCULINO = 1;public function getId()
    {
        return $this->id;
    }
    const FEMININO = 2;
    const OUTROS = 3;

    public static function  getArray(): array
    {
        $genders = [];

        $genders[self::MASCULINO] = (new Gender())->fill([Gender::$id => self::MASCULINO, Gender::$name => EnumRotuloPadrao::MASCULINO]);
        $genders[self::FEMININO] = (new Gender())->fill([Gender::$id => self::FEMININO, Gender::$name => EnumRotuloPadrao::FEMININO]);
        $genders[self::OUTROS] = (new Gender())->fill([Gender::$id => self::OUTROS, Gender::$name => EnumRotuloPadrao::OUTROS]);

        return $genders;
    }

    public static function getObject(int $idStatus)
    {
        if (array_key_exists($idStatus, ($genders = static::getArray())))
        {
            return $genders[$idStatus];
        }

        return null;
    }
}
