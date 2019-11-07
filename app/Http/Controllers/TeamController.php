<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(5);
        return view('admin.teams',compact('teams'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'details' => 'required',
            'image' => 'required|image',
        ]);
        $team = new Team();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = date('mdYHis'). '.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
        }else{
            $new_name = "no image available";
        }
        
        $team->name = $request->name;
        $team->position = $request->position;
        $team->image = $new_name;
        $team->details = $request->details;
        $team->save();
        return back()->with('success', "data added successfully");        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'details' => 'required',
          /*   'image' => 'required|image', */
        ]);
        $team = Team::find($request->id);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = date('mdYHis'). '.'. $image->getClientOriginalExtension();
            //for production on server
            //$image->move(public_path('../../public_html/images'), $new_name);
            $image->move(public_path('images'), $new_name);
        }else{
            $new_name = $team->image;
        }

        $team->name = $request->name;
        $team->position = $request->position;
        $team->details = $request->details;
        $team->image = $new_name;
        $team->save();
        return back()->with('success', "updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        $image_path = public_path('images/'.$team->image);
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        return back()->with('success', "deleted successfully");
    }
}
