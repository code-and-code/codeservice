<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['name', 'command','service_id'];
    protected $hidden   = ['updated_at'];

    public function Service()
    {
       return $this->belongsTo(Service::class);
    }
}