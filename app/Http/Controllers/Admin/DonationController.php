<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class DonationController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->database_table = 'donations';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = $this->database->getReference($this->database_table)->getValue();
        return view('admin.donations.index',[
            'donations' => $donations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name'          => $request->name,
            'description'   => $request->description,
            'address'       => $request->address,
            'data'          => $request->data,
            'status'        => $request->status,
            ];
            $dataRef  = $this->database->getReference($this->database_table)->push($data);
            if($dataRef){
                toastr()->success('تم إضافة التبرع بنجاح');
                return redirect()->route('donations.index');

            }else{
            return "ok false";
            }
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
        $key = $id;
        $dataRef_delete  = $this->database->getReference($this->database_table .'/'. $key)->remove();
        if($dataRef_delete){
        toastr()->error('تم حذف التبرع بنجاح');
        return redirect()->route('donations.index');
        }else{
        return "no false";
        }
    }
}
