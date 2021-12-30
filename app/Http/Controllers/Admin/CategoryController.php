<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Kreait\Firebase\Firestore;

class CategoryController extends Controller
{
    public function __construct(Database $database , Firestore $firestore)
    {

        $this->database = $database;
        $this->firestore = $firestore;
        $this->database_table = 'categories';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = $this->database->getReference($this->database_table)->getValue();
        $categories = $this->firestore->database()->collection('categories')->documents();
        return view('admin.categories.index' , [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->doc_id == null) {
            // Uplode Data
            $request->validate([
              'name' => 'required',
              'imageUrl' => 'required',
             ]);
            $stuRef = $this->firestore->database()->collection('categories')->newDocument();
            $stuRef->set([
              'name' => $request->name,
              'imageUrl' => $request->imageUrl,
            ]);
                toastr()->success('تم إضافة الفئة بنجاح');
                return redirect()->route('categories.index');
          }
          else {

            $student = $this->firestore->database()->collection('categories')->document($request->doc_id)->snapshot();

            $name = $student->data()['name'];
            $imageUrl = $student->data()['imageUrl'];

            $data = sprintf("Name : %s %s \n and imageUrl : %s", $name ,$imageUrl);

            toastr()->success('تم إضافة الفئة بنجاح');
            return back()->withInput();

          }


        // $image = $request->file('image');
        // $category   = app('firebase.storage')->database()->collection('category_image')->document('defT5uT7SDu9K5RFtIdl');
        // $firebase_storage_path = 'category_image/';
        // $name     = $category->id();
        // $localfolder = public_path('firebase-temp-uploads') .'/';
        // $extension = $image->getClientOriginalExtension();
        // $file      = $name. '.' . $extension;
        // if ($image->move($localfolder, $file)) {
        //     $uploadedfile = fopen($localfolder.$file, 'r');
        //     app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $name]);
        //     unlink($localfolder . $file);
        //     echo 'success';
        // } else {
        //     echo 'error';
        // }

        // $data = [
        //     'name' => $request->name,
        //     // 'image' => $request->image,
        //     ];
        //     $dataRef  = $this->database->getReference($this->database_table)->push($data);
        //     if($dataRef){
        //         toastr()->success('تم إضافة الفئة بنجاح');
        //         return redirect()->route('categories.index');
        //     }else{
        //     return "ok false";
        //     }
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
        $key = $id;
        $edit_data = $this->database->getReference($this->database_table)->getChild($key)->getValue();
        if($edit_data){
            return view('admin.categories.edit',[
                'key' => $key,
                'edit_data' => $edit_data,
            ]);
        }else{
            toastr()->error('يوجد خطأ في المعرف');
        }
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
        $key = $id;
        $update_data = [
        'name' => $request->name,
        ];
        $dataRef  = $this->database->getReference($this->database_table .'/'. $key)->update($update_data);
        if($dataRef){
            toastr()->success('تم تحديث الفئة بنجاح');
            return redirect()->route('categories.index');
        }else{
        return "no false";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $key = $id;
        // $dataRef_delete  = $this->database->getReference($this->database_table .'/'. $key)->remove();
        // if($dataRef_delete){
        // toastr()->error('تم حذف الفئة بنجاح');
        // return redirect()->route('categories.index');
        // }else{
        // return "no false";
        // }
        $this->firestore->database()->collection('categories')->document($id)->delete();
        return back();

    }
}
