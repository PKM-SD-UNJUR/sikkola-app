b<?php

namespace App\Http\Controllers;

use App\Models\submitForm;
use App\Http\Requests\StoresubmitFormRequest;
use App\Http\Requests\UpdatesubmitFormRequest;

class SubmitFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoresubmitFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubmitFormRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\submitForm  $submitForm
     * @return \Illuminate\Http\Response
     */
    public function show(submitForm $submitForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\submitForm  $submitForm
     * @return \Illuminate\Http\Response
     */
    public function edit(submitForm $submitForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubmitFormRequest  $request
     * @param  \App\Models\submitForm  $submitForm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubmitFormRequest $request, submitForm $submitForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\submitForm  $submitForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(submitForm $submitForm)
    {
        //
    }
}
