<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'comment' => 'required'
        ]);

        $data['feature_id'] = $feature->id;
        $data['user_id'] = Auth::id();

        Comment::create($data);

        return to_route('feature.show', $feature);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }

        $featureId = $comment->feature_id;
        $comment->delete();

        return to_route('feature.show', $featureId);
    }
}
