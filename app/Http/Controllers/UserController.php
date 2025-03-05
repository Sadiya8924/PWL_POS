<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    public function index(){
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager 3',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

    $user = UserModel::findOr(20, ['username', 'nama'], function(){
        abort(404);
    });
        return view('user',['data' => $user]);
    }
}
