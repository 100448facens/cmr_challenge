<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return array|mixed
     */
    public function getRemoteUsers()
    {
//        $response = Http::get('http://localhost:8081/api/users');
        $response = Http::get(env('CORE_API_HOST') . '/api/users');

        return $response->json();
//        dd(DB::connection());
//        return User::all();

//        return "App-one";
    }
}
