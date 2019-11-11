<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\books;

class users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(books::class, 'users_borrow_books', 'user_id','book_id')->withTimestamps();
    }

}
