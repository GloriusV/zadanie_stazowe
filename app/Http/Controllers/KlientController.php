<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Klient;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\RedirectResponse;



class KlientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return 
     */
    public function index()
    {
        $klients = Klient::all();
        return Inertia::render('Klienci/index', ['klients' => $klients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return 
     */
    public function create()
    {   
        $klients = Klient::all();
        return Inertia::render('Klienci/create', ['klients' => $klients]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone_number' => 'required|string|max:50',
        ]);
        Klient::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone_number' => $request->phone_number

        ]);
        sleep(1);

        return redirect()->route('Klient.index')->with('message', 'Klient Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  Klient $klient
     * @return \Illuminate\Http\Response
     */
    public function show(Klient $klient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klient  $klient
     * @return 
     */
    public function edit(Klient $klient)
    {
        return Inertia::render(
            'Klienci/edit',
            [
                'klient' => $klient
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @param  \App\Models\Klient  $klient
     * @return 
     */
    public function update(Request $request, Klient $klient, $id): RedirectResponse
    {
        Klient::where('id', $id )
                ->update(['name' => $request->input('name'),
                         'surname'=>$request->input('surname'),
                         'email'=>$request->input('email'),
                         'phone_number'=>$request->input('phone_number')
                         ]
                        );
        sleep(1);

        return redirect()->route('Klient.index')->with('message', 'Klient Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *  @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Klient $klient
     * @return 
     */
    public function destroy(Klient $klient, $id)
    {   
        
        Klient::find($id)
        ->delete();
        
        sleep(1);

        return redirect()->route('Klient.index')->with('message', 'Klient Delete Successfully');
    }
}
