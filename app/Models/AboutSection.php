<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'heading', 'subheading', 'subtext', 'body_text',
        'col1_heading', 'col1_text',
        'col2_heading', 'col2_text',
        'col3_heading', 'col3_text',
    ];

    public static function instance(): self
    {
        return static::firstOrCreate([], [
            'heading'      => 'THE WAY STUDIO',
            'subheading'   => 'ABOUT US.',
            'subtext'      => 'Cum sociis natoque penatibus et magnis dis parturient montes.',
            'body_text'    => 'Maecenas diam sapien, auctor sed blandit nec, adipiscing eget elit.',
            'col1_heading' => 'WHAT WE DO.',
            'col1_text'    => 'Cum sociis natoque penatibus et magnis dis parturient montes.',
            'col2_heading' => 'WHAT WE ACHIEVE.',
            'col2_text'    => 'Cum sociis natoque penatibus et magnis dis parturient montes.',
            'col3_heading' => 'AT THE END.',
            'col3_text'    => 'Cum sociis natoque penatibus et magnis dis parturient montes.',
        ]);
    }
}
