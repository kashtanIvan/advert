<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    const UPDATED_AT = null;

    protected $table = 'adverts';
    
    protected $fillable = [
        'title',
        'description',
        'user_id'
        ];
    
    public $rules = [
        'title' => 'required|max:255',
        'description' => 'required|max:1000',
        'user_id' => 'exists:users,id'
        ];
    
    public function user() {
        
        return $this->hasOne('App\User', 'id', 'user_id');
        
    }

}
