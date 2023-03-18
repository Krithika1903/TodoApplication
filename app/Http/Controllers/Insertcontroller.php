<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class Insertcontroller extends Controller
{
   function addTodo(request $request){
      $request->validate([
      'title'=>'required',
      'description'=>'required'
   ]);

   $userId=Auth::user()->id;
   
    $todo=new Todo;
    $todo->id=$request->id;
    $todo->title=$request->title;
    $todo->description=$request->description;
    $todo->deadline=$request->deadline;
    $todo->created_by=$userId;
    $todo->updated_by=$userId;
    $todo->save(); 

    return redirect('/display');
   }
   
   function fetchData(Request $request){
      $data=$request->input();
      $data=Todo::all()->where('created_by',Auth::user()->id);

      return view('display',['todo'=>$data]);
   }

   function delete($id){
      $data=Todo::find($id);
      $data->delete();

      return redirect('display');
   }

   function edit($id){
      $id=Crypt::decryptString($id);
      $data=Todo::find($id);

      return view('edit',['data'=>$data]);
   }

   function update(Request $request){
      //find the id of updating data
      $data=Todo::find($request->id);
      $data->id=$request->id;
      $data->title=$request->title;
      $data->description=$request->description;
      $data->deadline=$request->deadline; 
      $data->updated_by=$request->updated_by;
      $data->save();

      return redirect('display');

   } 
   
}
