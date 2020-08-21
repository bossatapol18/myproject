<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\StaffsModel;
use Illuminate\Http\Request;



class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 2; 
    
        $search = $request->get('search');        
        if (!empty($search)) {
        //กรณีมีข้อมูลที่ต้องการ search จะมีการใช้คำสั่ง where และ orWhere
            $staffs = StaffsModel::where('name', 'LIKE', "%$search%")
                ->orWhere('age', 'LIKE', "%$search%")
                ->orWhere('salary', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->orderBy('id', 'asc')->paginate($perPage);
        } else {
        //กรณีไม่มีข้อมูล search จะทำงานเหมือนเดิม
            $staffs = StaffsModel::orderBy('id', 'asc')->paginate($perPage);
        }  

                
         return view('staffs/index' , compact('staffs') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
            $requestData = $request->all();
            
            StaffsModel::create($requestData);
    
            return redirect('staffs');
    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffsModel  $staffsModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staffs = StaffsModel::findOrFail($id);

        return view('staffs.show', compact('staffs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffsModel  $staffsModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffs = StaffsModel::findOrFail($id);

        return view('staffs.edit', compact('staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffsModel  $staffsModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffsModel $staffsModel,$id)
    {
        $requestData = $request->all();        
        $staffs = StaffsModel::findOrFail($id);
        $staffs->update($requestData);
        return redirect('staffs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffsModel  $staffsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaffsModel::destroy($id);

        return redirect('staffs');
    }
}
