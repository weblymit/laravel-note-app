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
    // $notes = Note::all();
    // $notes = Note::orderBy('created_at', 'desc')->get();
    $notes = Note::orderBy('created_at', 'desc')->paginate(15);
    return view('pages.index', compact('notes'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // dd($request->all());
    // validate the data
    $request->validate([
      'note' => ['required', 'string', 'max:255', 'min:3'],
    ]);

    // $data['user_id'] = auth()->id();
    // store in the database
    $note = Note::create([
      'note' => $request->note,
      'user_id' => 1,
      // 'user_id' => auth()->id(),
    ]);

    // redirect to the note create
    return redirect()->route('note.show', $note->id)->with('message', 'Note created successfully!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Note $note)
  {
    return view('pages.show', compact('note'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Note $note)
  {
    return view('pages.edit', compact('note'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Note $note)
  {
    $data = $request->validate([
      'note' => ['required', 'string', 'max:255', 'min:3'],
    ]);

    // store in the database
    $note->update($data);
    return redirect()->route('note.show', $note->id)->with('message', 'Note updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Note $note)
  {
    $note->delete();
    return redirect()->route('note.index')->with('message', 'Note deleted successfully!');
  }
}
