<?php

declare(strict_types=1);

return [
    'path'          => 'exchange',
    'import_dir'    => storage_path('app/exchange'),
    'login'         => 'admin',
    'password'      => 'admin',
    'use_zip'       => false,
    'file_part'     => 0,
    'product_limit' => 150,
    'product_import_delay' => 4,
    'models'        => [
        \Jurager\Exchange1C\Interfaces\WarehouseInterface::class   => \App\Models\ProductWarehouse::class,
        \Jurager\Exchange1C\Interfaces\GroupInterface::class   => \App\Models\ProductGroup::class,
        \Jurager\Exchange1C\Interfaces\ProductInterface::class => \App\Models\Product::class,
        //\Jurager\Exchange1C\Interfaces\OfferInterface::class   => \App\Models\Offer::class,
    ],
    'services'       => [
        \Jurager\Exchange1C\Services\AuthService::class => \App\Extended\Jurager\exchange1c\AuthService::class,
    ],
];
