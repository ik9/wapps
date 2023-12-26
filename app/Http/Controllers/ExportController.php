<?php

namespace App\Http\Controllers;

use App\Exports\AdapterExport;
use App\Exports\FeederExport;
use Illuminate\Http\Request;
use App\Models\Feeder;
use App\Models\Adapter;
use App\Models\Counter;
use App\Models\User;
use App\Models\Note;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;

class ExportController extends Controller
{
    public function export(Request $request, $feeder_id, Excel $export){
        $counters = Counter::all()->where('feeder_id', $feeder_id);

        $data = [];

        foreach($counters as $item){

            $notes_as_text = '';
            $notes = Note::where('type', 'counter')->where('type_id', $item->id)->take(3)->get();
            if(count($notes) > 0){
                $i=0;
                foreach($notes as $note){
                    $i+=1;
                    $notes_as_text .= $note->content;
                    if($i != count($notes)){
                        $notes_as_text .= ' - ';
                    }
                }
            }
            
            $feeder = Feeder::find($item->feeder_id);
            $adapter = Adapter::find($item->adapter_id);
            $user = User::find($item->user_id);
            if($user == null){
                continue;
            }
            $input  = $item->created_at;
            $date = \Carbon\Carbon::parse($input)->format('Y-m-d');
            $time = \Carbon\Carbon::parse($input)->format('H:i:s');
            $data[$item->id] = [
                $user->name,
                $user->job_number,
                $user->center,
                $feeder->station,
                $feeder->feeder_number,
                $adapter->adapter_number,
                $item->counter_number,
                $item->subscribe_number,
                $item->cutter_size,
                $item->current_meter_reading,
                $item->counter_coordinates,
                $item->counter_picture,
                $item->counter_class,
                $item->counter_status,
                $item->property_condition,
                $item->danger_q,
                $item->danger_type,
                $item->danger,
                $date,
                $time,
                $notes_as_text
            ];
        }
        // dd($data);

        // Excel
        // $export = new Excel();
        // return $export->download(new DataExport($data), 'data.xlsx');
        return Excel::download(new DataExport($data), 'data.xlsx');
    }

    public function export_all(Request $request, Excel $export){
        $counters = Counter::all();
        
        $data = [];
        foreach($counters as $item){

            $notes_as_text = '';
            $notes = Note::where('type', 'counter')->where('type_id', $item->id)->take(3)->get();
            if(count($notes) > 0){
                $i=0;
                foreach($notes as $note){
                    $i+=1;
                    $notes_as_text .= $note->content;
                    if($i != count($notes)){
                        $notes_as_text .= ' - ';
                    }
                }
            }

            $feeder = Feeder::find($item->feeder_id);
            $adapter = Adapter::find($item->adapter_id);
            $user = User::find($item->user_id);
            if($user == null){
                continue;
            }
            $input  = $item->created_at;
            $date = \Carbon\Carbon::parse($input)->format('Y-m-d');
            $time = \Carbon\Carbon::parse($input)->format('H:i:s');
            $data[$item->id] = [
                $user->name,
                $user->job_number,
                $user->center,
                $feeder->station,
                $feeder->feeder_number,
                $adapter->adapter_number,
                $item->counter_number,
                $item->subscribe_number,
                $item->cutter_size,
                $item->current_meter_reading,
                $item->counter_coordinates,
                $item->counter_picture,
                $item->counter_class,
                $item->counter_status,
                $item->property_condition,
                $item->danger_q,
                $item->danger_type,
                $item->danger,
                $date,
                $time,
                $notes_as_text
            ];
        }
        // dd($data);

        // Excel
        // $export = new Excel();
        // return $export->download(new DataExport($data), 'data.xlsx');
        return Excel::download(new DataExport($data), 'data.xlsx');
    }
    public function export_feeders(Request $request, Excel $export){
        $feeders = Feeder::all();

        $data = [];

        foreach($feeders as $item){
            $data[$item->id] = [
                $item->station,
                $item->feeder_number,
            ];
        }
        // dd($data);

        // Excel
        // $export = new Excel();
        // return $export->download(new DataExport($data), 'data.xlsx');
        return Excel::download(new FeederExport($data), 'data.xlsx');
    }

    public function export_adapters(Request $request, Excel $export){
        $adapters = Adapter::all();

        $data = [];

        foreach($adapters as $item){

            $notes_as_text = '';
            $notes = Note::where('type', 'adapter')->where('type_id', $item->id)->take(3)->get();
            if(count($notes) > 0){
                $i=0;
                foreach($notes as $note){
                    $i+=1;
                    $notes_as_text .= $note->content;
                    if($i != count($notes)){
                        $notes_as_text .= ' - ';
                    }
                }
            }

            $feeder = Feeder::find($item->feeder_id);
            $user = User::find($item->user_id);
            if($user == null){
                continue;
            }
            $input  = $item->created_at;
            $date = \Carbon\Carbon::parse($input)->format('Y-m-d');
            $time = \Carbon\Carbon::parse($input)->format('H:i:s');
            $data[$item->id] = [
                $user->name,
                $user->job_number,
                $user->center,
                $feeder->station,
                $feeder->feeder_number,
                $item->adapter_number,
                $item->adapter_size,
                $item->adapter_voltage,
                $item->adapter_type,
                $date,
                $time,
                $notes_as_text
            ];
        }
        // dd($data);

        // Excel
        // $export = new Excel();
        // return $export->download(new DataExport($data), 'data.xlsx');
        return Excel::download(new AdapterExport($data), 'data.xlsx');
    }
    // public function export_counters(Request $request, Excel $export){
    //     $counters = Counter::all();

    //     $data = [];

    //     foreach($counters as $item){
    //         $feeder = Feeder::find($item->feeder_id);
    //         $adapter = Adapter::find($item->adapter_id);
    //         $user = User::find($item->user_id);
    //         $data[$item->id] = [
    //             $user->name,
    //             $user->job_number,
    //             $user->center,
    //             $feeder->station,
    //             $feeder->feeder_number,
    //             $adapter->adapter_number,
    //             $item->counter_number,
    //             $item->subscribe_number,
    //             $item->cutter_size,
    //             $item->current_meter_reading,
    //             $item->counter_coordinates,
    //             $item->counter_picture,
    //             $item->counter_class,
    //             $item->counter_status,
    //             $item->property_condition,
    //             $item->danger_q,
    //             $item->danger_type,
    //             $item->danger,
    //         ];
    //     }
    //     // dd($data);

    //     // Excel
    //     // $export = new Excel();
    //     // return $export->download(new DataExport($data), 'data.xlsx');
    //     return Excel::download(new DataExport($data), 'counters.xlsx');
    // }
    
}
