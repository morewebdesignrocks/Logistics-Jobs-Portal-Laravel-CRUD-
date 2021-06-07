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
            'job_number' => 'numeric|required',
            'job_type' => 'string|max:255|required',
            'modality' => 'string|max:255|required',
            'g_01' => 'string|max:255|required',
            'g_02' => 'string|max:255|required',
            'g_03' => 'numeric|nullable',
            'g_04' => 'numeric|nullable',
            'g_05' => 'string|max:255|nullable',
            'g_06' => 'numeric|nullable',
            /* Reatail CT questions */
            'r_ct_001' => 'string|max:255|nullable',
            'r_ct_002' => 'string|max:255|nullable',
            'r_ct_003' => 'string|max:255|nullable',
            'r_ct_004' => 'string|max:255|nullable',
            'r_ct_005' => 'string|max:255|nullable',
            'r_ct_006' => 'string|max:255|nullable',
            'r_ct_007' => 'string|max:255|nullable',
            'r_ct_008' => 'string|max:255|nullable',
            'r_ct_009' => 'string|max:255|nullable',
            'r_ct_010' => 'string|max:255|nullable',
            'r_ct_011' => 'string|max:255|nullable',
            'r_ct_012' => 'numeric|nullable',
            /* Inventory CT questions */
            'i_ct_001' => 'string|max:255|nullable',
            'i_ct_002' => 'string|max:255|nullable',
            'i_ct_003' => 'string|max:255|nullable',
            'i_ct_004' => 'string|max:255|nullable',
            'i_ct_005' => 'string|max:255|nullable',
            'i_ct_006' => 'string|max:255|nullable',
            'i_ct_007' => 'string|max:255|nullable',
            /* Mix CT questions */
            'rw_ct_001' => 'string|max:255|nullable',
            'ri_ct_002' => 'string|max:255|nullable'
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
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $job = Job::query()
            ->where('job_number', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the results compacted
        return view('search', compact('job'));
        //return view('search', compact(12345));
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
            'job_number' => 'numeric',
            'job_type' => 'max:255',
            'modality' => 'max:255',
            'g_01' => 'string|max:255',
            'g_02' => 'string|max:255',
            'g_03' => 'numeric|nullable',
            'g_04' => 'numeric|nullable',
            'g_05' => 'string|max:255|nullable',
            'g_06' => 'numeric|nullable',
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