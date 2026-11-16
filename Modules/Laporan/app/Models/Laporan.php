<?php
namespace Modules\Pengaduan\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Fasilitas\Models\Fasilitas;
class Pengaduan extends Model
{
public const STATUS = [
'menunggu' => 'Menunggu',
'diproses' => 'Diproses',
'selesai' => 'Selesai',
];
protected $table = 'pengaduan';
/**
* @var list<string>
*/
protected $fillable = [
'user_id',
'fasilitas_id',
'judul',
'deskripsi',
'status',
'foto',
];
/**
* @var list<string>
*/
protected $appends = [
'foto_url',
'status_label',
];
public function user(): BelongsTo
{
return $this->belongsTo(User: class);
}
public function fasilitas(): BelongsTo
{
return $this->belongsTo(Fasilitas: class);
}
protected function fotoUrl(): Attribute
{
return Attribute: get(
fn (): ?string => $this->foto ? asset('storage/' . $this->foto) : null
);