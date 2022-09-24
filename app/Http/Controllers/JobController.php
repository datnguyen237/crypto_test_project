<?php

namespace App\Http\Controllers;

use App\Helpers\JobHelper;
use App\Http\Requests\JobInputPost;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{

    private $job_service;
    private $job_helper;

    public function __construct(
        JobService $job_service,
        JobHelper $job_helper
    )
    {
        $this->job_service = $job_service;
        $this->job_helper = $job_helper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->job_service->getAllAsc();
        return view('job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobInputPost $request)
    {
        $imagePath = '';
        if ($request->hasFile('logo')) {
            $imagePath = $this->job_helper->uploadImage($request->logo);
        }
        $params = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'logo' => $imagePath
        ];
        $this->job_service->create($params);
        return redirect()->route('job.index');
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
        //
    }
}
