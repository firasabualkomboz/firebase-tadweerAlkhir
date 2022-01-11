<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Firestore;

class PointController extends Controller
{

    public function __construct(Database $database , Firestore $firestore)
    {

        $this->database = $database;
        $this->firestore = $firestore;
        $this->database_table = 'points';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = $this->firestore->database()->collection('points')->documents();
        return view('admin.points.index' , [
            'points' => $points,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.points.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->doc_id == null){

            $request->validate([
            'name' => 'required',
            'location'       => 'required',
            ]);

            $partRef = $this->firestore->database()->collection('points')->newDocument();
            $partRef->set([
            'name' => $request->name,
            'location'       => $request->location
            ]);
            toastr()->success('تم إضافة نقطة جديدة بنجاح');
            return redirect()->route('points.index');
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
        $point = $this->firestore->database()->collection('points')->document($id)
        ->update([
         ['path' => 'name', 'value' => $request->name],
         ['path' => 'location', 'value' => $request->location],
        ]);
        toastr()->success('تم تحديث النقطة بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->firestore->database()->collection('points')->document($id)->delete();
        toastr()->error('تم حذف النقطة بنجاح');
        return back();
    }
}
