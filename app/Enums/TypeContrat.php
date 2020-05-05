<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactif()
 * @method static static Actif()
 */
final class TypeContrat extends Enum
{
    const CDD = 'CDD';
    const CDI = 'CDI';
    const Temps_partiel = 'Temps partiel';
}