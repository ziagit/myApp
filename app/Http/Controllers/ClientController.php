<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->paginate(5);
        return view('admin.clients',compact('clients'))
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
            'logo' => 'required|image',
            'details' => 'required',
        ]);
        $client = new Client();

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $new_name = date('mdYHis'). '.'. $logo->getClientOriginalExtension();
            //for production on server
            //$image->move(public_path('../../public_html/images'), $new_name);
            $logo->move(public_path('images'), $new_name);
        }else{
            $new_name = "no logo available";
        }
        
        $client->name = $request->name;
        $client->logo = $new_name;
        $client->details = $request->details;
        $client->save();
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
            /* 'logo' => 'required|image', */
            'details' => 'required',
        ]);
        $client = Client::find($request->id);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $new_name = date('mdYHis'). '.'. $logo->getClientOriginalExtension();
            //for production on server
            //$image->move(public_path('../../public_html/images'), $new_name);
            $logo->move(public_path('images'), $new_name);
        }else{
            $new_name = $client->logo;
        }

        $client->name = $request->name;
        $client->details = $request->details;
        $client->logo = $new_name;
        $client->save();
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
        $client = Client::find($id);
        $client->delete();
        $image_path = public_path('images/'.$client->image);
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        return back()->with('success', "deleted successfully");
    }
}
