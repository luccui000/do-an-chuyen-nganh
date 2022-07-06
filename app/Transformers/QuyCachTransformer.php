<?php

namespace App\Transformers;

use App\Models\QuyCach;
use League\Fractal\TransformerAbstract;

class QuyCachTransformer extends TransformerAbstract
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
    public function transform(QuyCach $quycach)
    {
        return [
            'id' => (int)$quycach->id,
            'ten_quy_cach' => $quycach->ten_quy_cach,
            'mo_ta' => $quycach->mo_ta
        ];
    }
}
