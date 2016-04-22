<?php

namespace App\Http\Controllers;


use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//include my tables
use App\Models\SampleTable;


class SampleTableController extends Controller
{
/*
	 private $_rules =	 [        
	 	'aname' => 'required|min:3|max:10',
        'age'=>'integer',
        'gender'=>'in:0,1'
    ];     
   
   */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        echo "list will show here"; 
        echo"</br>";
        printf( "<a href=\"sampletable/create\"> create new </a>");
        */
        $rows=\App\Models\Sampletable::with('region')->get();  
        //specify path from root above , else Class 'App\Http\Controllers\App\Models\Sampletable' not found
       return view('sampletable.list')->with(compact('rows'));
 //       return view('sampletable.list', compact('rows'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('sampletable.create');
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
        
        $_rules =	 [        
	 	'aname' => 'required|min:3|max:10',
        'weight'=>'numeric|required',
        'gender'=>'in:0,1'
  		  ];    
  		  $_messages=['aname.required'=>'Your  is needed',
  		  				'aname.min'=>'Your name should be at least 3 chars long'
  		  					];
  		  					

//  $validation = Validator::make($request->all(), SampleTable::$rules, SampleTable::$messages);  //<-- ok too if specified in model
  // $validation = Validator::make($request->all(), $_rules, $_messages);  //<-- ok too
    	$input = $request->all();								
        $validation = Validator::make($input, $_rules);

        if ($validation->passes())
        {
            $sampletable = new SampleTable();
            $sampletable->aname=$request->aname;
        	$sampletable->weight=$request->weight;
        	
			$sampletable->save();			
            return redirect('sampletable');
            
        }

//  return back()
        return redirect('sampletable/create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$row= \App\Models\SampleTable::with('region')->find($id);
    	if (is_null($row))
        {
            return redirect('sampletable.index');
        }
        
        return view('sampletable.show')->with(compact('row'));
                		
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
    	$row= \App\Models\SampleTable::find($id);
        $row->delete();
    }
}
