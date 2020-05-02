<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactif()
 * @method static static Actif()
 */
final class StatutContrat extends Enum
{
    const En_cours = 'En cours';
    const Termine = 'términé';
    const En_negociation = 'En négociation';
    const En_suspension = 'En suspension';
}