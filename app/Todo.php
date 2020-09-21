<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        "id","name","description"
    ];
    //
    public function deleteData($id){
        DB::table('todo')->where('id', '=', $id)->delete();
    }
    public function editData(Request $request, $id){
        //$request = new Request;
        DB::table('todo')->where('id','=', $id)->update(['id' => $request->id, 'name' => $request->name, 'description'=>$request->description]);
    }
    
}
