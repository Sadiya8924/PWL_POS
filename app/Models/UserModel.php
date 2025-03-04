<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //Mendefiniskan nama tabel yang digunakan oleh model ini
    protected $primarykey = 'user_id'; //mendefinisikan primary key dari tabel yang dugunakan
    /**
     * the artributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['username', 'nama', 'level_id']; // Tambahkan atribut yang bisa diisi

}
