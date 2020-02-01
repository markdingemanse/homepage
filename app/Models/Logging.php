<?php

namespace App\Models;

use App\Models\Heroine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logging extends Model
{
    protected $connection = 'mysql';

    /**
     * {@inheritdoc}
     */
    protected $table = 'logging';

    public $timestamps = false;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'heroine',
        'promoted',
        'new_level',
        'promotion_received',
    ];

    public function heroine() : BelongsTo
    {
        return $this->belongsTo(Heroine::class, 'heroine', 'id');
    }
}
