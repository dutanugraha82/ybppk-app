<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MA extends Model
{
    use HasFactory;
    protected $table = 'ma';
    protected $fillable = ['id','ma'];

    public function coa(){
        return $this->hasMany(COA::class);
    }
}
