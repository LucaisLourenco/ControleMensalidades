<?php

namespace App\Http\Controllers\Auth\User\Interface;

use App\Http\Controllers\Standard\Interface\VariableStandard;

interface VariableAuthController extends VariableStandard
{
    const API = 'api';
    const USERNAME = 'username';
    const PASSWORD = 'password';
    const TOKEN = 'token';
    const USER = 'user';
}
