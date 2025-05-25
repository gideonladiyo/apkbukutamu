<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'tb_reservasi';

    protected $fillable = [
        'nama',
        'alamat',
        'tujuan',
        'instansi',
        'keperluan',
        'jenis',
        'jadwal',
        'whatsapp',
    ];

    protected $casts = [
        'jadwal' => 'date',
        'jadwal_tamu_berkunjung' => 'date',
    ];

    // Define the primary key
    protected $primaryKey = 'id_reservasi';

    // Accessor to continue using 'id' in the code
    public function getIdAttribute()
    {
        return $this->attributes['id_reservasi'];
    }

    // Mutator to update 'id_pegawai' when setting 'id'
    public function setIdAttribute($value)
    {
        $this->attributes['id_reservasi'] = $value;
    }


    // Accessors (Getters)

    public function getNamaAttribute()
    {
        return $this->attributes['nama_tamu_reservasi'];
    }

    public function getAlamatAttribute()
    {
        return $this->attributes['alamat_tamu_reservasi'];
    }

    public function getInstansiAttribute()
    {
        return $this->attributes['instansi_tamu_reservasi'];
    }

    public function getKeperluanAttribute()
    {
        return $this->attributes['keperluan_tamu_reservasi'];
    }

    public function getTujuanAttribute()
    {
        return $this->attributes['tujuan_tamu_reservasi'];
    }

    public function getJenisAttribute()
    {
        return $this->attributes['jenis_konsultasi_tamu_reservasi'];
    }

    public function getWhatsappAttribute()
    {
        return $this->attributes['whatsapp_tamu_reservasi'];
    }

    public function getJadwalAttribute()
    {
        return Carbon::parse($this->attributes['jadwal_tamu_reservasi']);
        // return $this->attributes['jadwal_tamu_reservasi'];
    }

    // Mutators (Setters)

    public function setNamaAttribute($value)
    {
        $this->attributes['nama_tamu_reservasi'] = $value;
    }

    public function setAlamatAttribute($value)
    {
        $this->attributes['alamat_tamu_reservasi'] = $value;
    }

    public function setInstansiAttribute($value)
    {
        $this->attributes['instansi_tamu_reservasi'] = $value;
    }

    public function setKeperluanAttribute($value)
    {
        $this->attributes['keperluan_tamu_reservasi'] = $value;
    }

    public function setTujuanAttribute($value)
    {
        $this->attributes['tujuan_tamu_reservasi'] = $value;
    }

    public function setJenisAttribute($value)
    {
        $this->attributes['jenis_konsultasi_tamu_reservasi'] = $value;
    }

    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp_tamu_reservasi'] = $value;
    }

    public function setJadwalAttribute($value)
    {
        $this->attributes['jadwal_tamu_reservasi'] = $value;
    }
}
