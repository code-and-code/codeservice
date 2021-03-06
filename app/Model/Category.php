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

    //delete Services Cascade Sqlite
    function delete()
    {
        \Log::critical('Cetegoria: "'.$this->name .'" foi excluida pelo Usuario: '. \Auth::user()->name);
        $this->Services()->delete();
        parent::delete();
    }

}
