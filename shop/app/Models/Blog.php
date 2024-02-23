<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'active',
        'thumb'
    ];

    public static function search() {
        $query = self::query();

        if (request('key')) {
            $key = request('key');
            $query = $query->where('name', 'like', '%' . $key . '%');
        }

        return $query;
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }
}
