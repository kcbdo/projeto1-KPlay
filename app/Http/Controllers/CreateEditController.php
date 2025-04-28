<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreateEditRequest;
use App\Http\Requests\UpdateCreateEditRequest;
use App\Models\CreateEdit;

class CreateEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $createedit = CreateEdit::where("id", 1)->get();

        return view('pages.video.create-edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCreateEditRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreateEditRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreateEdit  $createEdit
     * @return \Illuminate\Http\Response
     */
    public function show(CreateEdit $createEdit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreateEdit  $createEdit
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateEdit $createEdit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCreateEditRequest  $request
     * @param  \App\Models\CreateEdit  $createEdit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCreateEditRequest $request, CreateEdit $createEdit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateEdit  $createEdit
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateEdit $createEdit)
    {
        //
    }
}
