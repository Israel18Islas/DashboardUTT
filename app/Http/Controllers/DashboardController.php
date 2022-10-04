<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //$matriculas = [];
        $usuariosArray = [];
        $nameArray = [];
        //$usuarios = HTTP::get('https://jsonplaceholder.typicode.com/users');
        $usuarios = HTTP::get('http://127.0.0.1:8000/api/alumno');
        //$usuariosArray = $usuarios->json();
        $data = json_decode($usuarios);
        
        foreach($data as $user){
            $usuariosArray[] = $user->matricula;
            $nameArray[] = $user->nombreCompleto;
            //echo "Matricula: ".$usuariosArray."\n";
        }
        
        return Inertia::render('Dashboard',compact('usuariosArray','nameArray'));
        //return view ('prueba', compact('usuariosArray'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
