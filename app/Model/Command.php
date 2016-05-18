<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['name', 'command','category_id'];
    protected $hidden   = ['updated_at'];

    public function Category()
    {
       return $this->belongsTo(Category::class);
    }
}