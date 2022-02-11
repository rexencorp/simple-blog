<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class CommentController extends Controller
{
    public function getCommentsByArticleId($id) {
        $comments = Artikel::find($id)->comments;

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Mengambil Comments',
            'data' => $comments,
        ]);
    }
}
