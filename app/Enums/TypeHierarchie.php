<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Administration()
 * @method static static Equipe()
 */
final class TypeHierarchie extends Enum
{
    const Administration =   'Administration Municipale';
    const Equipe =   'Equipe Municipale';
}
