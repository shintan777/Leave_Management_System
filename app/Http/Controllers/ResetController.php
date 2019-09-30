<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Gate;
use App\User;
use App\Leave;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use DB;

class ResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.reset.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'city_name' => 'required',
            'zip_code' => 'required'
        ]);
        $city = new City();
        $city -> city_name = $request -> city_name;
        $city -> zip_code = $request -> zip_code;
        $city -> save();
        Toastr::success('City successfully added!','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $city = City::find($id);
        return view('admin.city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
           'city_name' => 'required',
           'zip_code' => 'required'
        ]);
        $city = City::find($id);
        $city -> city_name = $request -> city_name;
        $city -> zip_code = $request -> zip_code;
        $city -> save();
        Toastr::success('City successfully updated!','Success');
        return redirect()->route('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $city = City::find($id);
        $city -> delete();
        Toastr::error('City successfully deleted!','Deleted');
        return redirect()->route('city');
    }
    public function change( Request $request)
    {
        
        User::query()->update(['cl' => 8 , 'vac'=>70 , 'od'=>6]);
        User::query()->update(['sl' => DB::raw('sl+10')]);
        DB::table('vac_days')->insert([
            ['current_sem' => date('m-Y'), 'from_date' =>$request->fd2 , 'to_date' =>$request->td2 ]
            
        ]);
        Toastr::info('Updated data successfully!');
        //if(date('d')=='01'){
        //    User::query()->update(['early' =>'1']);  
        //} 
        // Y-m-d H:i:s 
        return redirect()->back();
    }
    public function changesem(Request $request )
    {    DB::table('vac_days')->insert([
        ['current_sem' => date('m-Y'), 'from_date' =>$request->fd , 'to_date' =>$request->td ]
        
    ]);
         
         User::where('vac','>','40')->update([ 'vac'=>40]);
         Toastr::info('Updated data successfully!');
        // Y-m-d H:i:s
        return redirect()->back();
    }
}
