<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Firestore;

class UserController extends Controller
{
    public function __construct(Database $database , Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->database = $database;
        $this->database_table = 'users';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = $this->database->getReference($this->database_table)->getValue();
        $users = $this->firestore->database()->collection('users')->documents();
        return view('admin.users.index' , [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'                => $request->name,
            'phone'               => $request->phone,
            'address'             => $request->address,
            'email'               => $request->email,
            'type'     => $request->type,
            'count_donations'     => $request->count_donations,
            ];
            $dataRef  = $this->database->getReference($this->database_table)->push($data);
            if($dataRef){
                toastr()->success('تم إضافة مستخدم جديد بنجاح');
                return redirect()->route('users.index');
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
        $user = $this->firestore->database()->collection('users')->document($id)
        ->update([
         ['path' => 'name', 'value' => $request->name],
         ['path' => 'phoneNumber', 'value' => $request->phoneNumber],
         ['path' => 'email', 'value' => $request->email],
        ]);
        toastr()->success('تم تحديث السمتخدم بنجاح');
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
        $key = $id;
        $dataRef_delete  = $this->database->getReference($this->database_table .'/'. $key)->remove();
        if($dataRef_delete){
        toastr()->error('تم حذف المستخدم بنجاح');
        return redirect()->route('users.index');
        }else{
        return "no false";
        }
    }
}
