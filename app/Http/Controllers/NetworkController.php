<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\Feeder;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function networks()
    {
        $feeders = Feeder::all();
        return view('networks', compact('feeders'));
    }

    public function network($feeder_id)
    {
        $types = EquipmentType::all();
        return view('network', compact('types', 'feeder_id'));
    }

    public function equipment($type_id,$feeder_id)
    {
        $type = EquipmentType::find($type_id)->type;
        $equipments = Equipment::where('user_id', auth()->id())->where('equipment_type', $type)->where('feeder_id', $feeder_id)->get();
        return view('equipment', compact('equipments', 'type_id','feeder_id'));
    }

    public function form_equipment($type_id,$feeder_id)
    {

        $feeder = Feeder::find($feeder_id);
        $feeder_number = $feeder->feeder_number;
        $station = $feeder->station;
        $type = EquipmentType::find($type_id)->type;

        return view('form_equipment', compact('type_id','feeder_id', 'type', 'feeder_number', 'station'));
    }
    public function add_equipment(Request $request,$type_id,$feeder_id)
    {

        $data = $request->validate([
            'number' => 'required|max:255',
            'serial_number' => 'max:255',
            'manufacture_company' => 'max:255',
            'location' => 'required|max:255',
        ]);
        $type = EquipmentType::find($type_id)->type;
        $data['user_id'] = auth()->id();
        $data['feeder_id'] = $feeder_id;
        $data['equipment_type'] = $type;
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
        Equipment::create($data);
        return redirect()->back();
    }
    
    public function delete_equipment($id)
    {
        Equipment::find($id)->delete();
        return redirect()->back();
    }

    
    
}
