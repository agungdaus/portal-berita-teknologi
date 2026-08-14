<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    public int $perPage = 5;

    public array $templates = [
        'default_full'   => 'App\Views\Pagers\bootstrap_full',
        'default_simple' => 'App\Views\Pagers\bootstrap_simple',
        'bootstrap_pagination' => 'App\Views\Pagers\bootstrap_full',
    ];
}
