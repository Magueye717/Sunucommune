<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Publique()
 * @method static static Prive()
 */
final class TypePartenariat extends Enum
{
    const Publique =   'public';
    const Prive =   'prive';
}
