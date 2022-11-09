<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Answer
 * @package App\Models
 *
 * @property int $id
 * @property int $question_id
 * @property int $next_question_id
 * @property string $text
 */
class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['text'];

    /**
     * @return BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * @return HasOne
     */
    public function nextQuestion(): HasOne
    {
        return $this->hasOne(Question::class, 'id', 'next_question_id');
    }
}
