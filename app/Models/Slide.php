<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;

class Slide extends AbstractModel
{
    use HasFactory, HasCover;
    
    protected $guarded = ['id'];

    protected $with = ['cover','mobile','tablet'];

    protected $casts = [
        'active' => 'boolean',
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];

    // If empty set head based on title
    public function getHeadAttribute($value)
    {
        return $value ?: $this->title;
    }

    // This scope returns only the active pages and in the right order
    public function scopeActive($query)
    {
        $query->where('active', 1)->orderBy('sort');
    }

    public function getVideoUrlAttribute($value)
    {
        if ($this->video_id) {
            if (is_numeric($this->video_id)) {
                return 'https://vimeo.com/' . $this->video_id;
            } else {
                return 'https://www.youtube.com/watch?v=' . $this->video_id;
            }
        }
    }

    public function getImageStyleAttribute($value)
    {
        return $value ?: ($this->image ? "background-image:url('" . asset('media/' . $this->image('image')) . "')" : '');
    }

    public function getButtonsAttribute()
    {
        $buttons = [];
        for ($i = 1; $i <= 4; $i++) {
            if ($this['button' . $i] && $this['link' . $i]) {
                $buttons[$this['button' . $i]] = [
                    'button' => $this['button' . $i],
                    'link' => $this['link' . $i],
                ];
            }
        }
        return $buttons;
    }

    public function getBackgroundStyleAttribute($value)
    {
        $background = $this->image('background');
        if (!$background) {
            $backgrounds = glob('media/backgrounds/*');
            $background = $backgrounds[array_rand($backgrounds)];
        }
        return $value ?: "background-image:url('" . asset($background) . "')";
    }
}
