<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;


class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $params = "";
        $sort = 'departure_date';
        $order = "desc";
        $params = (object) $request->all(); 
        $select = "";

        if(isset($params->sort_by) and isset($params->order_by)){
            $sort = $params->sort_by;
            $order = $params->order_by;
            $select = $sort . "-" . $order;
        }
        
        $data = Tour::orderBy($sort, $order)->Paginate(10);

        $SEND_TO_VIEW = [
            'tours' => $data,
            'selected' => $select
        ];

        return view('tours.lists.index', $SEND_TO_VIEW);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tours.add.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $data = $request->all();
        
        if(!empty($data)){
            $data["departure_date"] = date("Y-m-d h:i:s", strtotime($data["departure_date"]));
            $data["return_date"] =  date("Y-m-d h:i:s", strtotime($data["return_date"]));
                
            if(Tour::create($data)){
                return redirect()->route("tour.index")->with("success", "Viagem adicionada! ");
                
            }else{
                
                // return view("clients.add", ["mensagem" => "Já existe"]);
                return redirect()->route("tour.create")->with("error", "Não foi possível adicionar esta excursão");
            }
            
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {   
        
        return view('tours.edit.index', ["tour" => $tour]);
    }

    /**
 * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {

        $res = $request->all();
        $res["departure_date"] = date("Y-m-d h:i:s", strtotime($res["departure_date"]));
        $res["return_date"] =  date("Y-m-d h:i:s", strtotime($res["return_date"]));
        
        if($request != null and $tour != null){
            $tour->update($res);
            $tour->save();
            return redirect()->route("tour.edit", [$tour->id]);
        }
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        if(!is_null($tour)) $tour->delete();
        return redirect()->route('tour.index');
    }
}
