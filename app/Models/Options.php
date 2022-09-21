<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Options extends Model
{
    use HasFactory;

    /**
     * Связь опций с помещениями
     * @return BelongsToMany
     */
    public function houses(): BelongsToMany
    {
        return $this->belongsToMany(Houses::class, 'houses_options', 'option_id', 'houses_id');
    }
}
