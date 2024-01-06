<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebStoryRequest;
use App\Http\Requests\UpdateWebStoryRequest;
use App\Models\Category;
use App\Models\WebStory;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use DataTables;
use Illuminate\Support\Facades\DB;


class WebStoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $news = new WebStory();
                $data = $news->latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="' . route('admin.web_stories.edit', $row->id) . '" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>                    
                    <a href="javascript:;" class=" text-danger delete-record" data-id="' . $row->id . '">Delete</a>';
                        return $actionBtn;
                    })
                    ->addColumn('status', function ($row) {
                        $isChecked = $row->status ? 'checked' : '';
                        return '<input type="checkbox" class="change-status" name="status" ' . $isChecked . ' data-id="' . $row->id . '" />';
                    })
                    ->addColumn('category', function ($row) {
                        return $row->category->title;
                    })
                    ->rawColumns(['action', 'status','category'])
                    ->make(true);
            }
            return view('backend.web_stories.index');
        } catch (\Exception $exception) {
            createLog('web_stories list : exception');
            createLog($exception);
            return view('backend.web_stories.index');
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = new WebStory();
        $categories = Category::pluck('title', 'id');
        return view('backend.web_stories.create', compact('news', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWebStoryRequest $request)
    {
        try {
            DB::beginTransaction();
            foreach ($request->title as $key => $val) {
                if (!$key && $request->id) {
                    $news = WebStory::find($request->id);
                } else {
                   $news = new WebStory();
                }
                $news->category_id = $request->category_id;
                $news->city = $request->city[$key];
                $news->title = $request->title[$key];
                $news->short_description = $request->short_description[$key];
               
                $news->status = $request->status[$key];
                if (isset($request->image[$key]) && $file = $request->image[$key]) {
                    $folder = public_path('/uploads/news-images');
                    $news->image = $this->uploadFile($file, $folder);
                }
                $news->save();
            }
            DB::commit();
            return response()->json(['status' => 200, 'message' => "Web stories created."]);
        } catch (\Exception $exception) {
            createLog('web_stories store : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WebStory $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebStory $news, $id)
    {
        $news = $news->find($id);
        $categories = Category::pluck('title', 'id');
        return view('backend.web_stories.create', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, WebStory $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebStory $news, $id)
    {
        try {
    
            DB::beginTransaction();
            $news = $news->find($id);
            $news->delete();
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
            $news = WebStory::find($id);
            $news->status = $news->status ? 0 : 1;
            $news->save();
            DB::commit();
            return response()->json(['status' => 200, 'message' => "status change success."]);
        } catch (\Exception $exception) {
            createLog('news delete : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    public function getLayout(Request $request)
    {
        $categoryId = $request->input('category_id');

        // Retrieve the category based on the selected ID
        $category = Category::find($categoryId);

        // Return the layout in the response
        return response()->json(['layout' => 'Layout ' . $category->layout ?? '']);
    }
}
