<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','category_id','slug'];
    protected $hidden   = ['updated_at'];

    public function Category()
    {
       return $this->belongsTo(Category::class);
    }

    public function Commands()
    {
        return $this->hasMany(Command::class);
    }
}