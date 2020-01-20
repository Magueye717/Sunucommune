<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static video()
 * @method static static photo()
 * @method static static fichier()
 */
final class TypeMediatheque extends Enum
{
    const Vidéo =   'vidéo';
    const Photo =   'photo';
}

