<?php

namespace App\Enums;

use Closure;
use Jiannei\Enum\Laravel\Enum;

class RoleEnum extends Enum
{
    // guard_name:role_name
    public const SUPER_ADMIN = 'admin:super-admin';
    public const ADMIN = 'admin:admin';

    /**
     * 前置-授权拦截检查.
     *
     * @return Closure
     */
    public static function gateBeforeCallback(): Closure
    {
        return function ($user, $ability) {
            return $user->isSuperAdmin() ?: null;
        };
    }
}