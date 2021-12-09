<?php

namespace App\Http\Controllers;

use App\Http\Requests\CleanerRequest;
use App\Models\Cleaner;
use App\Models\City;
use Illuminate\Http\Request;

class CleanersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cleaners = Cleaner::latest()->paginate(10);
        $cities = City::all();
        $data = compact(['cleaners', 'cities']);
        return view('admin.cleaner', $data)
        ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cleaner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CleanerRequest $request)
    {
        $cleaner = Cleaner::create($request->all());

        $cleaner->cities()->attach($request->cities);

        return redirect('admin/cleaner')->with('success','Cleaner created successfully.');
    }

    public function get(Cleaner $cleaner)
    {
        $cities = Cleaner::with('cities')->get()->find($cleaner->id)->cities->pluck('id');

        $data = $cleaner->toArray();
        $data['cities'] = $cities;

        return response(['data' => $data] );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cleaner  $cleaner
     * @return \Illuminate\Http\Response
     */
    public function update(CleanerRequest $request, Cleaner $cleaner)
    {    
        $cleaner->update($request->all());
        $cleanerId = $cleaner->find($request->cleaner_id);
        $cleanerId->cities()->sync($request->cities);
    
        return response(['message' => 'Cleaner updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cleaner  $cleaner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cleaner::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
