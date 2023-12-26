<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeder;
use App\Models\Adapter;
use App\Models\Counter;

class PollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function feeders()
    {
        $feeders = Feeder::all();
        return view('feeders', compact('feeders'));
    }
    public function user_feeders()
    {
        $feeders = Feeder::where('user_id', auth()->id())->get();
        return view('feeders', compact('feeders'));
    }
    public function add_feeder(Request $request){
        $data = $request->validate([
            'station' => 'required|max:255',
        ]);
        if($request->station == 'الليث'){
            $request->validate([
                'allaith' => 'required|max:255',
            ]);
            $data['feeder_number'] = $request->allaith;
        }elseif($request->station == 'الصواملة'){
            $request->validate([
                'alsawamla' => 'required|max:255',
            ]);
            $data['feeder_number'] = $request->alsawamla;
        }elseif($request->station == 'اضم'){
            $request->validate([
                'adham' => 'required|max:255',
            ]);
            $data['feeder_number'] = $request->adham;
        }elseif($request->station == 'الشعيبة 1'){
            $request->validate([
                'alshuaiba1' => 'required|max:255',
            ]);
            $data['feeder_number'] = $request->alshuaiba1;
        }elseif($request->station == 'الشعيبة 3'){
            $request->validate([
                'alshuaiba3' => 'required|max:255',
            ]);
            $data['feeder_number'] = $request->alshuaiba1;
        }elseif($request->station == 'ثقيف'){
            $request->validate([
                'thaqeef' => 'required|max:255',
            ]);
            $data['feeder_number'] = $request->thaqeef;
        }else{
            return redirect()->back()->with('error','station is not okay');
        }


        $data['user_id'] = auth()->id();
        $feeder = Feeder::create($data);
        return redirect()->to(route('adapters', $feeder->id));
    }

    public function adapters($feeder_id){
        $adapters = Adapter::all()->where('feeder_id',$feeder_id);
        return view('adapters', compact('feeder_id', 'adapters'));
    }
    public function counters($feeder_id, $adapter_id){
        $counters = Counter::all()->where('adapter_id',$adapter_id);
        return view('counters', compact('feeder_id', 'adapter_id', 'counters'));
    }
    public function feeder(){
        return view('add_feeder');
    }
    public function adapter($feeder_id){
        return view('add_adapter', compact('feeder_id'));
    }
    public function counter($feeder_id, $adapter_id){
        return view('add_counter', compact('feeder_id', 'adapter_id'));
    }

    public function add_adapter(Request $request, $feeder_id){
        $data = $request->validate([
            'adapter_number' => 'required|max:255',
            'adapter_size' => 'required|max:255',
            'adapter_voltage' => 'required|max:255',
            'adapter_type' => 'required|max:255',
        ]);

        if($request->danger_q == 'yes'){
            $request->validate(['danger' => 'required']);
        }

        // $check = Adapter::where('adapter_number', $request->adapter_number)->get();
        // if(count($check) != 0){
        //     return redirect()->back();
        // }

        $data['user_id'] = auth()->id();
        $data['feeder_id'] = $feeder_id;
        $dangerFiles = $request->file('danger');
        $danger = '';
        $i=0;
        if($dangerFiles){
            foreach ($dangerFiles as $file) {
                // Ensure that the file is not empty before attempting to store it
                if ($file) {
                    $i+=1;
                    $path = $file->store('public/uploads'); // Customize the storage path as needed
                    $filename = $file->hashName();
                    if($i == count($dangerFiles)){
                        $danger.=$filename;
                    }else{
                        $danger.=$filename.'*/***/*';
                    }
                    // Save the file information to the database or perform any other necessary actions
                }
            }
        }
        
        $data['danger'] = $danger;
        $adapter = Adapter::create($data);
        return redirect()->to(route('counters', [$feeder_id, $adapter->id]));
    }

    public function add_counter(Request $request, $feeder_id, $adapter_id){
        $data = $request->validate([
            'counter_number' => 'required|max:255',
            'subscribe_number' => 'required|max:255',
            'cutter_size' => 'required|max:255',
            'current_meter_reading' => 'required|max:255',
            'counter_coordinates' => 'required|max:255',
            'counter_picture' => 'required',
            'counter_picture.*' => 'required|mimes:jpeg,png|max:1000000',
            'counter_class' => 'required|max:255',
            'counter_status' => 'required|max:255',
            'property_condition' => 'required|max:255',
            'danger_q' => 'required|max:255',
            'danger_type' => 'max:255',
            'danger.*' => 'mimes:jpeg,png|max:1000000',
        ]);

        // $check = Counter::where('counter_number', $request->adapter_number)->get();
        // if(count($check) != 0){
        //     return redirect()->back();
        // }

        if($request->property_condition == 'مهجور غير صالح للإستخدام'){
            $request->validate([
                'property_picture.*' => 'required|mimes:jpeg,png|max:1000000'
            ]);
            $files = $request->file('property_picture');
            $f = '';
            $i=0;
            foreach ($files as $file) {
                // Ensure that the file is not empty before attempting to store it
                if ($file) {
                    $path = $file->store('public/uploads'); // Customize the storage path as needed
                    $filename = $file->hashName();
                    if($i == count($files)){
                        $f.=$filename;
                    }else{
                        $f.=$filename.'*/***/*';
                    }
                    $i+=1;
                    // Save the file information to the database or perform any other necessary actions
                }
            }
            $data['property_picture'] = $f;
        }

        $data['user_id'] = auth()->id();
        $data['adapter_id'] = $adapter_id;
        $data['feeder_id'] = $feeder_id;
        $files = $request->file('counter_picture');
        $f = '';
        $i=0;
        foreach ($files as $file) {
            // Ensure that the file is not empty before attempting to store it
            if ($file) {
                $path = $file->store('public/uploads'); // Customize the storage path as needed
                $filename = $file->hashName();
                if($i == count($files)){
                    $f.=$filename;
                }else{
                    $f.=$filename.'*/***/*';
                }
                $i+=1;
                // Save the file information to the database or perform any other necessary actions
            }
        }

        $dangerFiles = $request->file('danger');
        $danger = '';
        $i=0;
        if($dangerFiles){
            $request->validate([
                'danger_type'=> 'required|max:255',
            ]);
            foreach ($dangerFiles as $file) {
                // Ensure that the file is not empty before attempting to store it
                if ($file) {
                    $i+=1;
                    $path = $file->store('public/uploads'); // Customize the storage path as needed
                    $filename = $file->hashName();
                    if($i == count($dangerFiles)){
                        $danger.=$filename;
                    }else{
                        $danger.=$filename.'*/***/*';
                    }
                    // Save the file information to the database or perform any other necessary actions
                }
            }
        }
        
        $data['danger'] = $danger;
        $data['counter_picture'] = $f;
        
        Counter::create($data);
        return redirect()->back();
    }

    public function delete_feeder(Request $request, $id){
        Feeder::find($id)->delete();

        $items = Adapter::where('feeder_id', $id)->get();
        foreach($items as $item){
            Adapter::find($item->id)->delete();
        }

        $items = Counter::where('feeder_id', $id)->get();
        foreach($items as $item){
            Counter::find($item->id)->delete();
        }

        return redirect()->back();
    }
    public function delete_adapter(Request $request, $id){
        Adapter::find($id)->delete();

        $items = Counter::where('adapter_id', $id)->get();
        foreach($items as $item){
            Counter::find($item->id)->delete();
        }

        return redirect()->back();
    }
    public function delete_counter(Request $request, $id){
        Counter::find($id)->delete();
        return redirect()->back();
    }

}
