<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'show'];
    protected $hidden   = ['updated_at'];

    public function Services()
    {
        return $this->hasMany(Service::class);
    }

}
