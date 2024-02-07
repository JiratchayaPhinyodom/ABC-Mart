<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'itemID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['storeID', 'itemName', 'itemPrice', 'itemDescription', 'itemQuantity'];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'itemPrice' => 'float',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
