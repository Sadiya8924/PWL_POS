<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //Mendefiniskan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang dugunakan
    
    protected $fillable = ['username', 'nama', 'password', 'level_id']; // Tambahkan atribut yang bisa diisi

    public function level():BelongsTo{
        return $this->belongsTo(LevelModel::class, 'level_id','level_id');
    }

}
