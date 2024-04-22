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
    // check if the user is authenticated
    // if (!auth()->check()) {
    //   return redirect()->route('login');
    // }
    // $notes = Note::all();
    // $notes = Note::orderBy('created_at', 'desc')->get();
    $notes = Note::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(15);
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

    // message error
    $messages = [
      'note.required' => 'Champs obligatoire.',
      'note.string' => 'Le champ de note doit être une chaîne.',
      'note.max' => 'Le champ de note ne doit pas dépasser 255 caractères.',
      'note.min' => 'Le champ de note doit comporter au moins 3 caractères.',
    ];

    // validate the data
    $request->validate([
      'note' => ['required', 'string', 'max:255', 'min:3'],
    ], $messages);

    // dd($request->all());

    // $data['user_id'] = auth()->id();
    // store in the database
    $note = Note::create([
      'note' => $request->note,
      // 'user_id' => auth()->id(),
      'user_id' => auth()->id(),
    ]);

    // redirect to the note create
    return redirect()->route('note.show', $note->id)->with('message', 'Note created successfully!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Note $note)
  {
    // check if the note belongs to the authenticated user
    if ($note->user_id !== auth()->id()) {
      return redirect()->route('note.index');
      // or return abort(403);
    }
    return view('pages.show', compact('note'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Note $note)
  {
    // check if the note belongs to the authenticated user
    if ($note->user_id !== auth()->id()) {
      return redirect()->route('note.index');
      // or return abort(403);
    }
    return view('pages.edit', compact('note'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Note $note)
  {
    // check if the note belongs to the authenticated user
    if ($note->user_id !== auth()->id()) {
      return redirect()->route('note.index');
      // or return abort(403);
    }
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
    // check if the note belongs to the authenticated user
    if ($note->user_id !== auth()->id()) {
      return redirect()->route('note.index');
      // or return abort(403);
    }
    $note->delete();
    return redirect()->route('note.index')->with('message', 'Note deleted successfully!');
  }
}
