<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $todos=auth()->user()->todos()->where('completed',0)->get();
        $todocom=auth()->user()->todos()->where('completed',1)->get();
        // $todos=Todo::orderBy('completed')->get();
        return view('todos.index',compact('todos','todocom'));
    }
    public function store(StoreTodoRequest $request){
        // return $request->all();
        $todo = new Todo;
        $todo->user_id =auth()->user()->id;
        $todo->title = $request->title;
        // $todo->description = $request->description;
        $todo->save();
        // auth()->user()->todos()->create($request->all());
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message','Todo created successfully');
    }
    public function edit($id){
        $todos=auth()->user()->todos()->where('completed',0)->get();
        $todocom=auth()->user()->todos()->where('completed',1)->get();
        $todo = Todo::find($id);
        return view('todos.edit',compact('todo','todos','todocom'));
    }
    public function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back()->with('message','todo deleted successfully');
    }
    public function update(Request $request,$id){
         $todo=Todo::find($request->id);
         $todo->title=$request->title;
         $todo->save();
         return redirect(route('todo.index'))->with('message','Todo Updated successfully');
    }
    public function complete(Request $request,$id){
        $todo=Todo::find($request->id);
        $todo->completed=true;
        $todo->save();
        return redirect()->back()->with('message','Todo mark as completed');
   }
}
