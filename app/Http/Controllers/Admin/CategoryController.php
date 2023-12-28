<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $category = new Category();
                $data = $category->latest()->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="' . route('admin.categories.edit', $row->id) . '" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>                    
                    <a href="javascript:;" class=" text-danger delete-record" data-id="' . $row->id . '">Delete</a>';
                        return $actionBtn;
                    })
                    ->addColumn('status', function ($row) {
                        $isChecked = $row->status ? 'checked' : '';
                        return '<input type="checkbox" class="change-status" name="status" ' . $isChecked . ' data-id="' . $row->id . '" />';
                    })
                    ->addColumn('layout', function ($row) {
                        return config('constants.LAYOUT') . ' ' . $row->layout;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('backend.categories.index');
        } catch (\Exception $exception) {
            createLog('category list : exception');
            createLog($exception);
            return view('backend.categories.index');
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('backend.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = $request->id ? Category::find($request->id) : new Category();
            $category->fill($request->validated());
            $category->save();
            DB::commit();
            return response()->json(['status' => 200, 'message' => "category created."]);
        } catch (\Exception $exception) {
            createLog('category store : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {

        return view('backend.categories.create', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return response()->json(['status' => 200, 'message' => "category deleted."]);
        } catch (\Exception $exception) {
            createLog('category delete : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    public function status($id)
    {
        try {
            DB::beginTransaction();
            $category = Category::find($id);
            $category->status = $category->status ? 0 : 1;
            $category->save();
            DB::commit();
            return response()->json(['status' => 200, 'message' => "status change success."]);
        } catch (\Exception $exception) {
            createLog('category delete : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

}