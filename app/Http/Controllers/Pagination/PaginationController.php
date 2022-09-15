<?php

namespace App\Http\Controllers\Pagination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->paginate(3);
        return view('pagination.user', ['users' => $users]);
    }
}
