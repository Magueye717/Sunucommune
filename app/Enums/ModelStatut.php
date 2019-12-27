<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactif()
 * @method static static Actif()
 */
final class ModelStatut extends Enum
{
    const Inactif = 0;
    const Actif = 1;
}