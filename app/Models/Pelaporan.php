<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;

class Pelaporan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
      
        $query->when($filters['search'] ?? false, function($query, $search) {
          return $query->where('lokasi', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%');
        });
      }

    public function siswa(){
        return $this->belongsto(Siswa::class);
    }

    public function kategori(){
        return $this->belongsto(Kategori::class);
    }

    public function asperasi(){
        return $this->hasone(Aspirasi::class);
    }
}
