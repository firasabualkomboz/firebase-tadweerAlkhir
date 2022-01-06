<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Firestore;

class PartnerController extends Controller
{

    public function __construct(Database $database , Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->database = $database;
        $this->database_table = 'partners';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $partners = $this->database->getReference($this->database_table)->getValue();
        $partners = $this->firestore->database()->collection('partners')->documents();

        return view('admin.partners.index' , [
            'partners' => $partners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
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
            ]);

            $partRef = $this->firestore->database()->collection('partners')->newDocument();
            $partRef->set([
            'name' => $request->name,
            ]);
            toastr()->success('تم إضافة شريك جديد بنجاح');
            return redirect()->route('partners.index');
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
        $this->firestore->database()->collection('partners')->document($id)->delete();
        return back();
    }
}
