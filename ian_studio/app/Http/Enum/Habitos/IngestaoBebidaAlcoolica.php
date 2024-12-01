<?php

namespace App\Http\Enum\Habitos;

enum IngestaoBebidaAlcoolica : string
{
    case MUITO = 'MUITO';
    case MODERADO = 'MODERADO';

    case NAO_CONSOME = 'NAO_CONSOME';
}
