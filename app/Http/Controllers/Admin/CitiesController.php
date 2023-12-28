<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequests;
use App\Models\City;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $cities = new City();
                $data = $cities->latest()->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="' . route('admin.cities.edit', $row->id) . '" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>                    
                    <div class="d-inline-block">
                    <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end m-0" style="">
                  
                    <div class="dropdown-divider"></div><li><a href="javascript:;" class="dropdown-item text-danger delete-record" data-id="' . $row->id . '">Delete</a></li></ul></div>';
                        return $actionBtn;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('backend.cities.index');
        } catch (\Exception $exception) {
            createLog('City list : exception');
            createLog($exception);
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city = new City();
        return view('backend.cities.create', compact( 'city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequests $request)
    {
        {
            try {
                if ($request->id) {
                    $cities = City::find($request->id);
                } else {
                    $cities = new City();
                }
                $cities->fill($request->all());
                $cities->save();
                return response()->json(['status' => 200, 'message' => "City created."]);
            } catch (\Exception $exception) {
                createLog('City store : exception');
                createLog($exception);
                return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('backend.cities.create', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        try {
            $city=City::where('id',$city->id)->first();
            if (!empty($city)) {
                $city->delete();
            }
            DB::beginTransaction();;
            $city->delete();
            DB::commit();
            return response()->json(['status' => 200, 'message' => "city deleted."]);
        } catch (\Exception $exception) {
            createLog('city delete : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }
}
