<?php

namespace App\Modules\BaseApp\Enums;

class BaseAppEnums
{
    public const
        COUNTRY = 'country',
        DASHBOARD = 'dashboard',
        COUNTRY_MODULE_PREFIX = 'countries',
        SUCCESS = 'success',
        ERROR = 'error',
        INFO = 'info',
        WARNING = 'warning';


    public function getModules(): array
    {
        return [
            self::COUNTRY,
        ];
    }
}
