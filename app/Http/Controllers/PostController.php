<?php

namespace App\Http\Controllers;

use App\Post;
use App\Section;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')
            ->get();

        return view('post.index')
            ->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sect=Section::all();

        return view('post.formnew', ['secciones'=>$sect]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulo = $request->get('title');
        $body = $request->body;
        $section = $request->get('section');
        try
        {
            $post = new Post();
            $post->title = $titulo;
            $post->body = $body;
            $post->section_id=$section;
            $post->save();
            $flash='ok';
            $msg='Creado';
        }catch (\Exception $e)
        {
         $flash = 'error';
         $msg = $e->getMessage();
        }



        return redirect()
            ->route('post.index')
            ->with($flash, $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
