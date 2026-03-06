<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
{

public function index()
{

$moods = Mood::orderBy('date','desc')->get();

return view('moods.index',compact('moods'));

}



public function create()
{

$emojis = config('feels.emoji');
$words  = config('feels.words');

return view('moods.create',compact('emojis','words'));

}
public function store(Request $request)
{
    $request->validate([
        'level' => 'required',
        'word'  => 'required',
        'comment' => 'nullable'
    ]);

    $words = config('feels.words');

    $word = $request->word;

    $group = $words[$word]['group'];
    $color = $words[$word]['color'];

    Mood::create([
        'user_id' => 1,
        'date' => now(),
        'level' => $request->level,
        'word' => $word,
        'group' => $group,
        'color' => $color,
        'comment' => $request->comment
    ]);

    return redirect('/moods');
}



public function edit($id)
{
    $mood = Mood::findOrFail($id);

    $emojis = config('feels.emoji');
    $words  = config('feels.words');

    return view('moods.edit', compact('mood','emojis','words'));
}
public function update(Request $request, $id)
{
    $mood = Mood::findOrFail($id);

    $mood->update([
        'level' => $request->level,
        'word' => $request->word,
        'comment' => $request->comment,
    ]);

    return redirect('/moods');

}

public function destroy($id)
{
    $mood = Mood::findOrFail($id);

    $mood->delete();

    return redirect('/moods');
}

}