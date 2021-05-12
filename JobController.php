<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;


class JobController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::all();
        return view('index', compact('job'));
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
        $storeData = $request->validate([
            /* General questions */
            'job_number' => 'required|numeric',
            'job_type' => 'required|string|max:255',
            'modality' => 'required|string|max:255',
            'g_01' => 'string|max:255',
            'g_02' => 'string|max:255',
            'g_03' => 'numeric',
            'g_04' => 'numeric',
            'g_05' => 'string|max:255',
            'g_06' => 'numeric',
            /* Wholesale CT questions */
            'w_ct_001' => 'string|max:255',
            'w_ct_002' => 'string|max:255',
            'w_ct_003' => 'string|max:255',
            'w_ct_004' => 'string|max:255',
            'w_ct_005' => 'string|max:255',
            'w_ct_006' => 'string|max:255',
            'w_ct_007' => 'string|max:255',
            'w_ct_008' => 'string|max:255',
            'w_ct_009' => 'string|max:255',
            'w_ct_010' => 'string|max:255',
            'w_ct_011' => 'string|max:255',
            'w_ct_012' => 'numeric'
        ]);

        $job = Job::create($storeData);

        return redirect('/jobs')->with('completed', 'Job created!');
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
        $job = Job::findOrFail($id);
        return view('update', compact('job'));
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
        $data = $request->validate([
            'job_number' => 'required|numeric',
            'job_type' => 'required|max:255',
            'modality' => 'required|max:255',
        ]);

        Job::whereId($id)->update($data);
        return redirect('/jobs')->with('completed', 'Job updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect('/jobs')->with('completed', 'Job deleted');
    }   
}