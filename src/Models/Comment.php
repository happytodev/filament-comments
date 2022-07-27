<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Comment extends Model
{
    use Orbital;

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->morphs('commentable');
        $table->text('comment');
        $table->boolean('is_approved')->default(false);
        $table->unsignedBigInteger('user_id')->nullable();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'commentable',
        'comment',
        'is_approved',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];


    /**
     * Find user associated with this post
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
