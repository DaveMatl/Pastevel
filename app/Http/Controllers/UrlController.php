<?php

namespace App\Http\Controllers;

use App\Url;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Faker\Factory as Faker;

class UrlController extends Controller
{
    /**
     * UrlController constructor.
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
        $urls = Url::all();

        $defaultKey = Faker::create()->word() . random_int(1, 100);

        return view('url.index')->with(['urls'=>$urls, 'key'=>$defaultKey]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'key' => 'required|unique:urls|max:25',
            'url' => 'required|url',
        ]);

        $url = new Url();

        $url->user_id = $request->user()->id;

        $url->key = $request->get('key');
        $url->url = $request->get('url');

        $url->save();

        return back()->with('status', 'URL added!');
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

        $url = Url::withoutGlobalScope('currentUser')->whereKey($key)->firstOrFail();

        return Redirect::to($url->url, 302);
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
        $url = Url::findOrFail($id);
        $url->delete();

        return back()->with('status', 'URL deleted!');
    }
}
