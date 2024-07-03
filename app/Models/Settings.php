<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $guarded = [];

    public static function getValue($key) {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : null;
    }

    public static function setValue($key, $value) {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            $setting->update([
                'value' => $value,
            ]);
        } else {
            self::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }   
}
