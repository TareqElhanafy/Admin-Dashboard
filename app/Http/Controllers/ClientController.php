<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index')->with('clients',Client::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create')->with('services',Service::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $client=Client::create([
            'title'=>$request->title,
        'description'=>$request->description,
        'status'=>$request->status,
        'phone'=>$request->phone,
        'contract_start_date'=>$request->contract_start_date,
        'contract_end_date'=>$request->contract_end_date,
        ]);
if($request->services){
    $client->services()->attach($request->services);
}
        return redirect(route('clients.index'));
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
    public function edit(Client $client)
    {
        return view('client.create')->with('client',$client)->with('services',Service::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $data=request()->only([
            'title',
            'description',
            'status',
            'phone',
            'contract_start_date',
            'contract_end_date',
        ]);
    if ($request->services) {
        $client->services()->sync($request->services);
    }
        $client->update($data);
        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
       return redirect(route('clients.index'));
    }
}
