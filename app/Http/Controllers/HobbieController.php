<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobbie;

class HobbieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hobbie.index', [
            'hobbies' => Hobbie::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobbie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required'
        ]);
        // dd($validateData);

        $hobbie = new Hobbie();
        // $hobbie->title = $request->get('title');
        $hobbie->title = $validateData['title'];
        $hobbie->description = $validateData['description'];
        $hobbie->save();

        return redirect('/hobbies');
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
        $hobbie = Hobbie::findOrFail($id);
        
        return view('/hobbie.edit', [ 
            'hobbie' => $hobbie
         ]);
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
        $hobbie = Hobbie::find($id);
        $hobbie->title = $request->get('title');
        $hobbie->description = $request->get('description');
        $hobbie->save();
        return redirect('/hobbies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobbie = Hobbie::find($id);
        $hobbie->delete();

        return redirect('/hobbies');
    }


    public function delete($id)
    {
        $hobbie = Hobbie::find($id);
        
        return view('/hobbie.confirmDelete', [ 
            'hobbie' => $hobbie
         ]);
    }
}
