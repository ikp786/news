<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\State;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;

class NewsController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $news = new News();
                $data = $news->latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="' . route('admin.news.edit', $row->id) . '" class="btn btn-sm btn-text-secondary rounded-pill btn-icon item-edit"><i class="mdi mdi-pencil-outline"></i></a>                    
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
            return view('backend.news.index');
        } catch (\Exception $exception) {
            createLog('news list : exception');
            createLog($exception);
            return view('backend.news.index');
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = new News();
        $categories = Category::pluck('title', 'id');
        $states = State::pluck('name', 'id');
        return view('backend.news.create', compact('news', 'categories', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        try {
            DB::beginTransaction();
            foreach ($request->view_type as $key => $val) {
                if (!$key && $request->id) {
                    $news = News::find($request->id);
                } else {
                    $news = new News();
                }
                $news->category_id = $request->category_id;
                $news->news_type = $request->news_type;
                $news->title = $request->title;
                $news->view_type = $val;
                $news->state_id = $request->state_id[$key];
                $news->city = $request->city[$key];
                $news->title = $request->title[$key];
                $news->short_description = $request->short_description[$key];
                $news->description = $request->description[$key];
                $news->status = $request->status[$key];
                if (isset($request->image[$key]) && $file = $request->image[$key]) {
                    $folder = public_path('/uploads/news-images');
                    $news->image = $this->uploadFile($file, $folder);
                }
                $news->save();
            }
            DB::commit();
            return response()->json(['status' => 200, 'message' => "news created."]);
        } catch (\Exception $exception) {
            createLog('news store : exception');
            createLog($exception);
            DB::rollBack();
            return response()->json(['status' => 500, 'message' => 'Something went wrong!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::pluck('title', 'id');
        $states = State::pluck('name', 'id');
        return view('backend.news.create', compact('news', 'categories', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            DB::beginTransaction();
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
            $news = News::find($id);
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
