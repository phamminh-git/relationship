<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $article=Article::with('category')->with('user')->find($id);
        $this->authorize('viewAny', [Comment::class, $article]);

        $comments=$article->comments;
        return view('comment.index', compact('comments', 'id', 'article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $article=Article::with('category')->with('user')->find($id);
        $this->authorize('create', [Comment::class, $article]);
        return view('comment.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->user()->associate(Auth::id());
        $article=Article::find($request->article_id);
        $article->comments()->save($comment);
        return redirect()->route('articles.show', $request->article_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment, $id)
    {
        $this->authorize('update',[Comment::class, $comment]);
        return view('comment.edit', compact('comment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update',[Comment::class, $comment]);
        $comment->update($request->all());
        return redirect()->route('comments.index', $request->article_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $this->authorize('delete',[Comment::class, $comment]);
        $comment->delete();
        return redirect()->route('articles.show', $request->article_id);
    }
}
