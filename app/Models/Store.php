<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Items;

class Store extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'storeID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['storeName'];

    /**
     * Get the items for the store. 
     * Adding the 'storeID', 'storeID' to compare columns storeID in Items and Store table
     */
    public function items()
    {
        return $this->hasMany(Items::class, 'storeID', 'storeID');
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
