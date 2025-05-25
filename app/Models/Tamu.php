<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    // Update the table name
    protected $table = 'tb_tamu';

    // Maintain the original fillable fields but map them to the new column names in the database
    protected $fillable = [
        'nama',
        'alamat',
        'keperluan',
        'tujuan',
        'kontak',
        'instansi'
    ];

    // Define the primary key
    protected $primaryKey = 'id_berkunjung';

    // Accessor to continue using 'id' in the code
    public function getIdAttribute()
    {
        return $this->attributes['id_berkunjung'];
    }

    // Mutator to update 'id_pegawai' when setting 'id'
    public function setIdAttribute($value)
    {
        $this->attributes['id_berkunjung'] = $value;
    }

    // Accessors

    public function getNamaAttribute()
    {
        return $this->attributes['nama_tamu_berkunjung'];
    }

    public function getAlamatAttribute()
    {
        return $this->attributes['alamat_tamu_berkunjung'];
    }

    public function getKeperluanAttribute()
    {
        return $this->attributes['keperluan_tamu_berkunjung'];
    }

    public function getTujuanAttribute()
    {
        return $this->attributes['tujuan_tamu_berkunjung'];
    }

    public function getKontakAttribute()
    {
        return $this->attributes['kontak_tamu_berkunjung'];
    }

    public function getInstansiAttribute()
    {
        return $this->attributes['instansi_tamu_berkunjung'];
    }

    // Mutators

    public function setNamaAttribute($value)
    {
        $this->attributes['nama_tamu_berkunjung'] = $value;
    }

    public function setAlamatAttribute($value)
    {
        $this->attributes['alamat_tamu_berkunjung'] = $value;
    }

    public function setKeperluanAttribute($value)
    {
        $this->attributes['keperluan_tamu_berkunjung'] = $value;
    }

    public function setTujuanAttribute($value)
    {
        $this->attributes['tujuan_tamu_berkunjung'] = $value;
    }

    public function setKontakAttribute($value)
    {
        $this->attributes['kontak_tamu_berkunjung'] = $value;
    }

    public function setInstansiAttribute($value)
    {
        $this->attributes['instansi_tamu_berkunjung'] = $value;
    }
}
