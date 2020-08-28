<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(Request $request){
        $data['title'] = "CATEGORIES";
        if(request()->ajax()){
            return datatables()->of(Category::select([
                'id','name',
               ])
            )
            
            ->addIndexColumn()
            ->addColumn('action','dashboard.datatable.category-action')
            ->rawColumns(['status', 'action'])
            ->make(true);
        }
        // dd(Category::all());
        return view('dashboard.categories.list',$data);
    }

    public function create(){

        $data['title'] = 'ADD CATEGORY';
        return view('dashboard.categories.add-edit', $data);

    }

    public function store(Request $request){
        // dd($request->all());
        $id = $request->categoryId;
        $data = $request->validate([
            'name' => 'required',
        ]);
        if (!empty($id)) {
            Category::where(array('id' => $id))->update($data);
            return Redirect::to("dashboard/categories")->withSuccess("GREAT INFO HAS BEEN UPDATED");
        } else {
            $category_id = Category::insertGetId($data);
            return Redirect::to("dashboard/categories")->withSuccess("GREAT INFO HAS BEEN CREATED");
        }
    }

    public function edit($id,Request $request){
        // dd($id);
        $data['title'] = 'EDIT CATEGORY';
        $data['result'] = Category::where('id',$id)
        ->first(['id','name']);
        // dd($data['result']);
        return view('dashboard.categories.add-edit',$data);

    }

    public function delete($id){
        $user = Category::findOrFail($id)->delete();
        return Redirect::to("dashboard/categories")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }
}
