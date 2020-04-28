<?php

declare(strict_types=1);

return [
    'path'          => 'exchange',
    'import_dir'    => storage_path('app/exchange'),
    'login'         => 'admin',
    'password'      => 'admin',
    'use_zip'       => false,
    'file_part'     => 0,
    'models'        => [
        \Jurager\Exchange1C\Interfaces\GroupInterface::class   => \App\Models\Category::class,
        \Jurager\Exchange1C\Interfaces\ProductInterface::class => \App\Models\Product::class,
        \Jurager\Exchange1C\Interfaces\OfferInterface::class   => \App\Models\Offer::class,
    ],
];
