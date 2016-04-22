<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sampletable extends Model
{
    //verify if any of theses is case sensitive
    protected $table = 'sampleTable';
    protected $fillable=['AName', 'DateOfBirth', 'Weight', 'Gender', 'RegionID','userid'];
    public $timestamps=false;
	public static  $rules =	 [        
	 	'aname' => 'required|min:3|max:20',
        'weight'=>'numeric|required',
        'gender'=>'in:0,1'
  		  ];    
  	public static  $messages=['aname.required'=>'Your  is needed',
  		  				'aname.min'=>'Your name should be at least 3 chars long'
  		  					];
  		
 
    public function region()
    {
     return $this->belongsTo('\App\Models\Region', 'RegionID', 'ID');
     //nb: regionID is FK in sampleTable. ID is PK in Regions table
    }
    
}
