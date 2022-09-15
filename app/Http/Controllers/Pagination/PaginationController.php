<?php

namespace App\Http\Controllers\Pagination;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->simplePaginate(3);
        return view('pagination.user', ['users' => $users]);
    }

    public function indexApi(Request $request){
        $perPage = $request->query('per_page');
        $page = $request->query('page');

        if($perPage == null){
            $perPage = 10;
        }

        if($page == null){
            $page = 1;
        }

        $count = User::query()->count();
        $data = User::query()->take($perPage)->skip(($page - 1) * $perPage)->get();

        return response()->json([
            'total' => $count,
            'data' => $data
        ]);
    }
}
