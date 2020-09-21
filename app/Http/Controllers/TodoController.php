<?php

namespace App\Http\Controllers;

use App\Todo;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function compact;
use function dd;
use function dump;
use function redirect;
use function view;
// use App\Http\Controllers\DB;
use DB;


class TodoController extends Controller
{
    public function index(){
        $todo = Todo::all();

        return view('todo',compact('todo'));
    }

    public function create(Request $request){

        $this->validate($request,[
           "name"=>"required",
           "description"=>"required"
        ]);


       $todo = new Todo();

       $todo->name = $request->input('name');
       $todo->description = $request->input('description');

       $todo->save();



       return redirect::back()->with('status','working');
    }
    
        public function destroy($id) {
            DB::delete('delete from todos where id = ?',[$id]);
            return redirect()->back();
        }        

    // public function editPage(){
    //     $edit = Todo::all();
    //     return view('edit', compact('edit'));        
    // }
    public function edit(Request $request, $id){
        $this->validate($request,[
            "name"=>"required",
            "description"=>"required"
        ]);
            $todo = Todo::find($id);
        // $todo = new Todo();
        // $todo->name = $request->input('name');
        // $todo->description = $request->input('description');
        $todo->update(['name' => $request->name, 'description' => $request->description]);
        return redirect('/');
    }       
        
}

