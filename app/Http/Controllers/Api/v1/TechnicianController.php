<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Technician;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class TechnicianController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $technicians = Technician::all();
        
        return $this->successResponse($technicians);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'user_id'=>'required|integer',
            'img_id'=>'required|integer',
            'speciality_id'=>'required|integer',
            'commercial_name'=>'required|string',
            'short_description'=>'required',
            'description'=>'required',
            'total_rates'=>'required|integer',
            
        ]);
       
        $technician = Technician::create($request->all());          
        return $this->successResponse($technician,Response::HTTP_CREATED);
       
    }

    /**
     * get one Rate
     *
     * @return Illuminate\Http\Response
     */
    public function show($technician)
    {
        //

        $technician = Technician::findOrFail($technician);
        return $this->successResponse($technician);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$technician)
    {

        $this->validate($request,[
            'user_id'=>'integer',
            'img_id'=>'integer',
            'speciality_id'=>'integer',
            'commercial_name'=>'string',
            'short_description'=>'string',
            'description'=>'string',
            'total_rates'=>'integer',
            
        ]);
        $technician = Technician::findOrFail($technician);
        $technician->fill($request->all());

        
        if($technician->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $technician->save();
        return $this->successResponse($technician);
    }

     /**
     * remove an existing one doctor
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($technician)
    {
        $technician = Technician::findOrFail($technician);
        $technician->delete();
        return $this->successResponse($technician);
      
    }

}
