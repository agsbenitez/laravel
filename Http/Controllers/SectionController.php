<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderByDesc('id')
            ->get();



        return view('sections.index')
            ->with('sections', $sections);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('sections.formnew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try
        {
            $sec = new Section();
            $sec->section = $request->post('section');
            $sec->save();

            $flash='ok';
            $msg='Creado';
        }catch (\Exception $e)
        {
            $flash = 'error';
            $msg = $e->getMessage();
        }


        return redirect()
            ->route('section.index')
            ->with($flash, $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('sections.show', ['section'=>$section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('sections.formnew', ['section'=>$section]);
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
            $section = Section::find($id);
            $section->section = $request->post('section');
            $section->save();

            $msg = 'Seccion Actualizada';
            $flash = 'Ok';
            }catch (\Exception $e)
        {
            $flash = 'error';
            $msg = $e->getMessage();
        }

        return redirect()
            ->route('section.index')
            ->with($flash, $msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)

    {
        $section->delete();
        $msg= 'Post Eliminado';
        $flash= 'Ok';

        return redirect()->route('section.index')
            ->with($flash, $msg);
    }
}
