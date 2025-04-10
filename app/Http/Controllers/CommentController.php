<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Comment::where('status' , '=', 1 )->orderBy('created_at', 'DESC')->get();
        return view('pages.comment.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->rating = $request->rating;
        $comment->category_id = $request->category_id;
        $comment->visible = false;

        if (Auth::check()) {
            $comment->user_id = Auth::id();
            $comment->name = $comment->name ?? Auth::user()->name;
            $comment->is_anonymous = false;
        } else {
            $comment->name = $request->name ?? 'Anónimo';
            if ($comment->name == 'Anónimo') {
                $comment->is_anonymous = true;
            }   
        }

        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'Comentario publicado correctamente.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = Comment::findOrFail($id);
        return view('pages.comment.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function borrar(Request $request)
    {

        $mensaje = Comment::findOrFail($request->id);
        $mensaje->status = 0; 
        $mensaje->save();

        return response()->json(['success' => true]);

    }

    public function updateVisible(Request $request)
  {
    $id = $request->id;
    $field = $request->field;
    $status = $request->status;
    $service = Comment::findOrFail($id);
    $service->$field = $status;
    $service->save();

    return response()->json(['message' => 'Servicio eliminado.']);
  }
}
