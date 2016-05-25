<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['name', 'command','src','file','service_id'];
    protected $hidden   = ['updated_at'];

    public function Service()
    {
       return $this->belongsTo(Service::class);
    }

    public function Tasks()
    {
        return $this->hasMany(Task::class);
    }

    //delete Tasks Cascade Sqlite
    function delete()
    {
        \Log::critical('Commando: "'.  $this->name .'" foi excluida pelo Usuario: '. \Auth::user()->name);
        $this->Tasks()->delete();
        parent::delete();
    }
}