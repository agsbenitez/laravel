<?php

namespace App\Http\Controllers;

use App\Post;
use App\Section;
use App\Tag;
use App\PostsTags;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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
        $sect = Section::all();
        $tag = Tag::all();

        return view('post.formnew', ['secciones'=>$sect, 'tags'=>$tag]);

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
        $tag = $request->get('tags');


        try
        {
            $post = new Post();
            $post->title = $titulo;
            $post->body = $body;
            $post->section_id=$section;
            $post->save();
            foreach ($tag as $tag_id)
            {
                $postTag = new PostsTags();
                $postTag->post_id = $post->id;
                $postTag->tag_id = $tag_id;
                $postTag->save();
            }
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
    public function show(Post $post)
    {
        return view('post.view')
            ->with('post', $post);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)

    {
        $sect = Section::all();
        $tag = Tag::all();
        return view('post.formnew', ['post'=>$post, 'secciones'=>$sect, 'tags'=>$tag])
            ->with('post', $post);
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

        Try
        {
        $registro = Post::find($id);
        $registro->title = $request->post('title');
        $registro->body = $request->post('body');
        $registro->section_id = $request->post('section');
        $registro->save();

        PostsTags::where('post_id', $id)
            ->delete();

        foreach ($request->post('tags') as $tag_id)
            {
                $postTag = new PostsTags();
                $postTag->post_id = $id;
                $postTag->tag_id = $tag_id;
                $postTag->save();
            }

        $msg = 'Post Actualizado';
        $flash = 'Ok';


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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        PostsTags::where('post_id', $post->id)
        ->delete();

        $post->delete();
        $msg= 'Post Eliminado';
        $flash= 'Ok';

        return redirect()->route('post.index')
            ->with($flash, $msg);

    }
}
