<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $data = Subscriber::where('id', 1)->first();
        return view('comment-form', ['data' => $data]);
    }
}
