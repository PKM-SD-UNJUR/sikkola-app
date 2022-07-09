<?php

namespace App\Http\Controllers;

use App\Models\submission;
use App\Http\Requests\StoresubmissionRequest;
use App\Http\Requests\UpdatesubmissionRequest;

class SubmissionController extends Controller
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
     * @param  \App\Http\Requests\StoresubmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubmissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubmissionRequest  $request
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubmissionRequest $request, submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(submission $submission)
    {
        //
    }
}
