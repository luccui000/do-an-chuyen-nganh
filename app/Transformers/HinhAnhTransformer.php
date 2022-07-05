<?php

namespace App\Transformers;

use App\Models\HinhAnh;
use League\Fractal\TransformerAbstract;

class HinhAnhTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HinhAnh $hinhanh)
    {
        return [
            'id' => $hinhanh->id,
            'duong_dan' => url($hinhanh->duong_dan)
        ];
    }
}
