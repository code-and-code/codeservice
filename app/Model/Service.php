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

    //delete Commands Cascade Sqlite
    function delete()
    {
        \Log::critical('Serviço: "'.$this->name .'" foi excluida pelo Usuario: '. \Auth::user()->name);
        $this->Commands()->delete();
        parent::delete();
    }
}