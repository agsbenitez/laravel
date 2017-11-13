<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

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
        //
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
        
        $tag->delete();
        $msg= 'Tag Eliminado';
        $flash= 'Ok';

        return redirect()->route('tag.index')
            ->with($flash, $msg);
    }
}
