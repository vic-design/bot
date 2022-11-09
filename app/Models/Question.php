<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Question
 * @package App\Models
 *
 * @property int $id
 * @property int $survey_id
 * @property int $next_question_id
 * @property string $text
 * @property int $order
 */
class Question extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * @return HasOne
     */
    public function nextQuestion(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'next_question_id');
    }

    /**
     * @return BelongsTo
     */
    public function prevQuestion(): BelongsTo
    {
        return $this->belongsTo(self::class, 'next_question_id');
    }

    /**
     * @return BelongsTo
     */
    public function prevAnswer(): BelongsTo
    {
        return $this->belongsTo(Answer::class, 'next_question_id');
    }
}
