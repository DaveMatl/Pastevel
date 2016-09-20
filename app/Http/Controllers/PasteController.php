<?php

namespace App\Http\Controllers;

use App\Paste;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasteController extends Controller
{
    /**
     * PasteController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastes = Paste::all();

        return view('paste.index')->with(['pastes'=>$pastes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'key' => 'required|unique:pastes|max:25',
            'paste' => 'required',
        ]);

        $paste = new Paste();

        $paste->user_id = $request->user()->id;

        $paste->key = $request->get('key');
        $paste->paste = $request->get('paste');
        $paste->lang = $request->get('lang', 'auto');
        $paste->save();

        $request->session()->flash('status', 'Paste added!');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $key = $id;

        $paste = Paste::withoutGlobalScope('currentUser')->whereKey($key)->firstOrFail();

        return view('paste.show')->with(['paste'=>$paste]);
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
        $url = Paste::findOrFail($id);
        $url->delete();

        return back()->with('status', 'Paste deleted!');
    }
}
