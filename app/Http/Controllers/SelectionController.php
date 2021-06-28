<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Selection;
use Illuminate\Support\Facades\DB;

class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Selection::orderBy('id', 'ASC')->get();

        
    }

    public function index_id($id)
    {
        

        $existingSelection = Selection::find( $id );

        if( $existingSelection ){
            
            
            return $existingSelection;
        }

        return "Selection not found";
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
        $existingSelection = Selection::find( $id );

        if( $existingSelection ){
            DB::update('update selections set counter = counter + 1 where id = ?', [$id]);
            DB::update('update suma_table set suma = (select sum(counter) from selections)');
            DB::update('update selections set percent = (select truncate (counter * 100 / (select suma from suma_table),2)) ');
            
            
            $existingSelection->save();
            return $existingSelection;
        }

        return "Selection not found";
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
