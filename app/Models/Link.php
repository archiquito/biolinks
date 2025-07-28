<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'url',
        'title',
        'description',
        'user_id',
        'position',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function moveUp()
    {
        $this->move(-1);
    }

    public function moveDown()
    {
        $this->move(+1);
    }

    private function move($to)
    {
        $currentPos = $this->user->links()->where('position', $this->position)->first();
        $nextPos = $this->user->links()->where('position', $this->position + $to)->first();
        if ($to === +1) {
            $currentPos->increment('position');
            $nextPos->decrement('position');
        } else {
            $currentPos->decrement('position');
            $nextPos->increment('position');
        }

        $currentPos->save();
        $nextPos->save();
    }


    public static function getNextAvailablePosition($userId)
    {
        // Get the highest position number for this user's links
        $maxPosition = self::where('user_id', $userId)->max('position');

        // Return the next available position (max + 1, or 1 if no links exist)
        return $maxPosition ? $maxPosition + 1 : 1;
    }

    public function createLink($data, $userId)
    {
        $nextPosition = self::getNextAvailablePosition($userId);
        $data['position'] = $nextPosition;
        $data['user_id'] = $userId;
        self::create($data);
    }
}
