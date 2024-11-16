<?php

namespace App\Core\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property integer $quantity
 * @property string $sku
 * @property string $description
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'sku',
        'description'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'float',
            'quantity' => 'integer',
        ];
    }
}
