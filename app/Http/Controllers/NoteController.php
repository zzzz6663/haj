<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes=Note::all();
        return view('admin.note.all', compact(['notes']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.note.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data= $request->validate([
        'note'=>"required",
        'info'=>"required",
      ]);
      Note::create( $data);
      toast()->success("یادداشت با موفقیت اضافه شد");
      return redirect()->route("note.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Note $note)
    {
        return view('admin.note.edit', compact(["note"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data= $request->validate([
            'note'=>"required",
            'info'=>"required",
          ]);
          $note->update( $data);
          toast()->success("یادداشت با موفقیت اضافه به روز شد ");
       return redirect()->route("note.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
