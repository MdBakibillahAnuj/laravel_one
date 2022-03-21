<?php

namespace App\Http\Controllers;

use App\Models\All;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Session;



class CrudCrontroller extends Controller
{
    public function showData()
    {
//        $showData = All::all();
//        $showData = All::paginate(5);
        $showData = All::simplepaginate(5);
        return view('show_data', compact('showData'));
    }
    public function addData()
    {
        return view('add_data');
    }
    public function storeData(Request $request)
    {
        $rules = [
          'name' =>'required|max:15',
          'email' =>'required|email',
        ];
        $cm = [
          'name.required' => 'Enter Your Name',
          'name.max' => 'You Can Not Use More Then 15 Char ',
          'email.required' => 'Enter Your Email',
          'email.max' => 'Email Must Be Valid Email',
        ];
        $this->validate($request, $rules, $cm);
        $all = new All();
        $all->name = $request->name;
        $all->email = $request->email;
        $all->save();
        Session::flash('msg', 'Data successfully Added');
       return redirect('/');
    }
    public function editData($id=null){
        $editData = All::find($id);
        Return view('edit_data',compact('editData'));

    }

    public function updateData(Request $request,$id)
    {
        $rules = [
            'name' =>'required|max:15',
            'email' =>'required|email',
        ];
        $cm = [
            'name.required' => 'Enter Your Name',
            'name.max' => 'You Can Not Use More Then 15 Char ',
            'email.required' => 'Enter Your Email',
            'email.max' => 'Email Must Be Valid Email',
        ];
        $this->validate($request, $rules, $cm);
        $all =  All::find($id);
        $all->name = $request->name;
        $all->email = $request->email;
        $all->save();
        Session::flash('msg', 'Data successfully Updated');
        return redirect('/');
    }
    public function deleteData($id=null)
    {
        $deleteData = All::find($id);
        $deleteData->delete();
        Session::flash('msg', 'Data successfully Deleted');
        return redirect('/');

    }
}
