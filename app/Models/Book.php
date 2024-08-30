<?php

namespace App\Models;

use App\Models\Helpers\BookHelpers;
use App\Models\Relations\BookRelations;
use App\Models\Scopes\BookScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use BookRelations;
    use BookHelpers;
    use BookScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'author',
        'category',
        'price',
        'quantity'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'double',
            'quantity' => 'integer',
        ];
    }
}
