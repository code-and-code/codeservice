<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    protected $hidden   = ['updated_at'];


    public function Commands()
    {
        return $this->hasMany(Command::class);
    }

}
