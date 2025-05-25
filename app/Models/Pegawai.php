<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'tb_pegawai';
    protected $fillable = [
        'nama',
        'jabatan',
        'jobdesc',
    ];

    // Define the primary key
    protected $primaryKey = 'id_pegawai';

    // Accessor to continue using 'id' in the code
    public function getIdAttribute()
    {
        return $this->attributes['id_pegawai'];
    }

    // Mutator to update 'id_pegawai' when setting 'id'
    public function setIdAttribute($value)
    {
        $this->attributes['id_pegawai'] = $value;
    }

    public function getNamaAttribute()
    {
        return $this->attributes['nama_pegawai'];
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama_pegawai'] = $value;
    }

    public function getJabatanAttribute()
    {
        return $this->attributes['devisi_pegawai'];
    }

    public function setJabatanAttribute($value)
    {
        $this->attributes['devisi_pegawai'] = $value;
    }

    public function getJobdescAttribute()
    {
        return $this->attributes['jobdesk_pegawai'];
    }

    public function setJobdescAttribute($value)
    {
        $this->attributes['jobdesk_pegawai'] = $value;
    }
}