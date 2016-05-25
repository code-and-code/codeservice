<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['date', 'command_id', 'cron'];
    protected $hidden   = ['updated_at'];

    public function Command()
    {
       return $this->belongsTo(Command::class);
    }

    //delete Task
    function delete()
    {
        \Log::critical('Tarefa: "'.  $this->name .'" foi excluida pelo Usuario: '. \Auth::user()->name);
        parent::delete();
    }
}