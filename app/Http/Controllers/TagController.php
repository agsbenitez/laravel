<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Tag;
use App\PostsTags;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::orderByDesc('id')
        ->get();

        return view('tag.index')
            ->with('tag', $tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.formnew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Tag $tag)
    {
        return view('tag.formnew', ['tag'=>$tag]);
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

        Try {
            $tags = Tag::find($id);
            $tags->tag = $request->post('Tag');
            $tags->save();

            $msg = 'Seccion Actualizada';
            $flash = 'Ok';
        }catch (\Exception $e)
        {
            $flash = 'error';
            $msg = $e->getMessage();
        }

        return redirect()
            ->route('tag.index')
            ->with($flash, $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)

    {
        try{
        $post_tag = PostsTags::where('tag_id', $tag->id);

        $post_tag->delete();

        $tag->delete();
        $msg= 'Tag Eliminado';
        $flash= 'Ok';
        }catch (QueryException $e){
            $msg="Error de Borrado";
            $flash="error";
        }

        return redirect()->route('tag.index')
            ->with($flash, $msg);
    }
}
