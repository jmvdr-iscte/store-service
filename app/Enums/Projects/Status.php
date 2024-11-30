<?php

namespace App\Enums\Projects;

enum Status: string
{
    case PENDING = 'PENDING';
    case ACTIVE = 'ACTIVE';
    case FAILED = 'FAILED';
    case CANCELED = 'CANCELED';
}