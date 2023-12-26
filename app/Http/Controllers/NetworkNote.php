<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetworkNote extends Controller
{
    public function create(Request $request, $id)
    {
        $request->validate(['type' => 'required|max:255']);
        $type='';
        if($request->type == 'عطل'){
            $type = $request->type.'/'.$request->type1;
        }
        if($request->type == 'تعدي'){
            $type = $request->type.'/'.$request->type2;
        }
        if($request->type == 'حالة خطرة'){
            $type = $request->type.'/'.$request->type3;
        }
        $data = $request->validate([
            'equipment_number' => 'max:255',
            'location' => 'max:255',
            'content' => 'required|max:255',
        ]);
        $data['type_id'] = $id;
        $data['type'] = $type;
        $data['user_id'] = auth()->id();

        $files = $request->file('photos');
        $photos = '';
        if($files){
            $i=0;
            foreach ($files as $file) {
                if ($file) {
                    $i+=1;
                    $path = $file->store('public/uploads');
                    $filename = $file->hashName();
                    if($i == count($files)){
                        $photos.=$filename;
                    }else{
                        $photos.=$filename.'*/***/*';
                    }
                }
            }
        }
        
        $data['photos'] = $photos;

        \App\Models\NetworkNote::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $notes = \App\Models\NetworkNote::where('type_id', $id)->get();

        return view('network_note', compact(['id', 'notes']));
    }
    public function form($id)
    {

        return view('network_note_form', compact(['id']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \App\Models\NetworkNote::find($id)->delete();
        return redirect()->back();
    }
}
