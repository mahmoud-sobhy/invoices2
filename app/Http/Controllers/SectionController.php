<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.sections', compact('sections'));
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
    public function store(StoreSectionRequest $request)
    {
        Section::create([
            'section_name' => $request->section_name,
            'description' =>  $request->description,
            'created_by' => auth()->user()->name,
        ]);

        return redirect()->route('sections.index')->with('add', 'تم إضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $sec = Section::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSectionRequest $request, $id)
    {
        $section = Section::find($id);

        $section->update([
            'section_name' => $request->section_name,
            'description' =>  $request->description,
            'created_by' => auth()->user()->name,
        ]);

        return redirect()->route('sections.index')->with('add', 'تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = Section::find($id)->delete();
        return redirect()->route('sections.index')->with('deleted', 'تم حذف القسم بنجاح');
    }
}
