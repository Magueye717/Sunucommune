<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Administration()
 * @method static static Equipe()
 */
final class ReseauxSociaux extends Enum
{
    const Facebook =   'Facebook';
    const Whatsapp =   'Whatsapp';
    const LinkedIn =   'LinkedIn';
    const Insatgrame =  'Insatgrame';
    const Youtube =   'Youtube';
    const Twitter=  'Twitter';
}
