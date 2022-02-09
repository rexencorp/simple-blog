<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Artikel::with('user')->orderBy('created_at','desc')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Mengambil Article',
            'data' => $articles,
        ]);
    }
}
