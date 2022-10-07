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

        $result = HTTP::get('http://127.0.0.1:8080/api/alumnos');
        $result2 = HTTP::get('http://127.0.0.1:8080/api/grupos');
        $response = json_decode($result);
        $response2 = json_decode($result2);
        $alumnos = $response->alumnos;
        $grupos = $response2->grupos;

        foreach($alumnos as $alumno){
            $usuariosArray[] = (object) ["nombre" => $alumno->Nombre, "matricula" => $alumno->matricula];
            $alumnosEdades[] = $alumno->datosPersonales->edad;
        }

        foreach($grupos as $grupo){
            $carrera = (object) ["Carrera" => $grupo->carrera->nombre, 
                                    "Especialidad" => $grupo->especialidad->nombre,
                                    "Periodo" => $grupo->periodo->nombre,
                                    "Grupo" => $grupo->cuatrimestre.=$grupo->grupo];
        }

        $count =  array_count_values($alumnosEdades);

        foreach($count as $key => $value){
            $contadorEdades[] = (object) [ "edad" => strval($key), "cantidad" => $value ];
            $edades[] = strval($key);
            $cantidades[] = $value;
        }


        return Inertia::render('Dashboard',compact('usuariosArray', 'contadorEdades', 'carrera', 'edades','cantidades','alumnos'));
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
