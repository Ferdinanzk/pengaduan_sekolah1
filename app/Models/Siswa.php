<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelaporan;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function pelaporan(){
        return $this->hasmany(Pelaporan::class);
    }
}
