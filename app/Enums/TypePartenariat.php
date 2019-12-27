<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TypePartenariat extends Enum
{
    const Publique =   'public';
    const Prive =   'prive';
}
