<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Gym;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GymsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $gyms = Gym::where('deleted' , 'no')->get();
        return view('gyms.index' , compact('gyms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('gyms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'name_en' => 'required',
                'name_ar' => 'required',
                'phone' => 'required|numeric',
            ]
        );

        $gym = [
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'phone'=> $request->phone,
            'status'=> $request->status,
            'deleted'=> 'no',
            'status'=> $request->status,
        ];
        $gym = new Gym($gym);
        $gym->save();

        return redirect('gyms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gym = Gym::findOrFail($id);

        return view('gyms.edit', compact('gym'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gym = Gym::findOrFail($id);

        $gym->name_en = $request->name_en;
        $gym->name_ar = $request->name_ar;
        $gym->phone = $request->phone;
        $gym->status = $request->status;

        $gym->update();
        $gym->save();

        
        flash()->success('Gym details was successfully updated');

        return redirect('gyms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Gym::where('id' , $id)->update([
            'deleted' => 'yes',
            'deleted_by' => Auth::user()->id,
            'deletion_date'=>date('Y-m-d H:i:s')
        ]);
    }
}
