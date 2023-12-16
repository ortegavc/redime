<?php

namespace App\Enums;

enum CategoryMaterialStatus: string
{
    case ACTIVE = 'ACTIVO';
    case CANCELED = 'CANCELADO';
    case DELETED = 'ELIMINADO';
}