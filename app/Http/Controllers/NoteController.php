<?php

namespace App\Http\Controllers;

use App\Models\Adapter;
use App\Models\Counter;
use App\Models\Feeder;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $type, $id)
    {
        $request->validate([
            'note' => 'required|max:255'
        ]);
        $data = [
            'type' => $type,
            'type_id' => $id,
            'user_id' => auth()->id(),
            'content' => $request->note
        ];
        Note::create($data);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($type, $id)
    {
        if($type == 'feeder'){
            $item = Feeder::find($id);
            $params = '';
        }elseif($type == 'adapter'){
            $item = Adapter::find($id);
            $params = [$item->feeder_id];
        }else{
            $item = Counter::find($id);
            $params = [$item->feeder_id, $item->adapter_id];
        }

        $notes = Note::where('type', $type)->where('type_id', $id)->get();

        return view('note', compact(['type', 'id', 'item', 'params', 'notes']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::find($id)->delete();
        return redirect()->back();
    }
}
