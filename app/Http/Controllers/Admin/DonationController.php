<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Firestore;

class DonationController extends Controller
{
    public function __construct(Database $database , Firestore $firestore)
    {
        $this->firestore = $firestore;
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
        // $donations = $this->database->getReference($this->database_table)->getValue();
        $donations = $this->firestore->database()->collection('donations')->documents();
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
        // $data = [
        //     'name'          => $request->name,
        //     'description'   => $request->description,
        //     'address'       => $request->address,
        //     'data'          => $request->data,
        //     'status'        => $request->status,
        //     ];
        //     $dataRef  = $this->database->getReference($this->database_table)->push($data);
        //     if($dataRef){
        //         toastr()->success('تم إضافة التبرع بنجاح');
        //         return redirect()->route('donations.index');

        //     }else{
        //     return "ok false";
        //     }

        if ($request->doc_id == null) {
            // Uplode Data
            $request->validate([
              'name' => 'required',
            //   'imageUrl' => 'required',
             ]);
            $stuRef = $this->firestore->database()->collection('donations')->newDocument();
            $stuRef->set([
            // 'imageUrl' => $request->imageUrl,
            'name'          => $request->name,
            'description'   => $request->description,
            'address'       => $request->address,
            'data'          => $request->data,
            'status'        => $request->status,
            ]);
                toastr()->success('تم إضافة الفئة بنجاح');
                return redirect()->route('donations.index');
          }
          else {

            $student = $this->firestore->database()->collection('donations')->document($request->doc_id)->snapshot();

            $name = $student->data()['name'];
            // $imageUrl = $student->data()['imageUrl'];
            $description = $student->data()['description'];
            $address = $student->data()['address'];
            $data = $student->data()['data'];
            $status = $student->data()['status'];


            $data = sprintf("Name : %s %s \n and imageUrl : %s", $name  , $description ,$address ,$data , $status );

            toastr()->success('تم إضافة الفئة بنجاح');
            return back()->withInput();
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
        $this->firestore->database()->collection('donations')->document($id)->delete();
        return back();
    }
}
