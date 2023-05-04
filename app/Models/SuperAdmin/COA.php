<?php

namespace App\Models\SuperAdmin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COA extends Model
{
    use HasFactory;
    protected $table = 'coa';
    protected $fillable = [
        'id',
        'no_akun',
        'nama_akun',
        'ma_id',
        'created_at',
        'updated_at'
    ];

    public function ma(){
        return $this->belongsTo(MA::class);
    }
}
