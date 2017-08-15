<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;
class todocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = todo::all();
        return view('welcome',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new todo;
        $this->validate($request,[
                'body'=>'required',
            ]);
        $this->validate($request,[
                'title'=>'required|unique:todos',
            ]);
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();
        return redirect('/todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = todo::find($id);
        return view('show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = todo::find($id);
        return view('edit',compact('item'));
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
         $todo = todo::find($id);
        $this->validate($request,[
                'body'=>'required',
            ]);
        $this->validate($request,[
                'title'=>'required',
            ]);
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();
        session()->flash('message','Updated Successfully');
        return redirect('/todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = todo::find($id);
        $item->delete();
        session()->flash('message','Deleted Successfully');
        return redirect('/todo');
    }
}
