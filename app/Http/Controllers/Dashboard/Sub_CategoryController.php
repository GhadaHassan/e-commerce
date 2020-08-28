<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Redirect;

class Sub_CategoryController extends Controller
{

    public function index(Request $request){
        $data['title'] = "SUB CATEGORIES";
        // $q = SubCategory::with('categories');
        // dd($q->get());
        if(request()->ajax()){
            $q = SubCategory::with('categories');
            return datatables()
            ->eloquent($q)
            ->addColumn('category_name', function(SubCategory $subCategory){
                return $subCategory->categories->name;
            
            }) 
            
            ->addIndexColumn()
            ->addColumn('action','dashboard.datatable.sub_category-action')
            ->addColumn('status', 'datatable.status')
            ->rawColumns(['status', 'action' , 'category_name'])
            ->make(true);
        }
        // dd(SubCategory::get());
        // dd($data);
        return view('dashboard.sub_categories.list',$data);
    }

    public function create(){

        $data['title'] = 'ADD CATEGORY';
        $data['categories'] = Category::all();
        return view('dashboard.sub_categories.add-edit', $data);

    }

    public function store(Request $request){
        // dd($request->all());
        $id = $request->subcategoryId;
        $data = $request->validate([
            'name' => 'required',
            'c_id' => 'sometimes|nullable|numeric'
        ]);
        if (!empty($id)) {
            SubCategory::where(array('id' => $id))->update($data);
            return Redirect::to("dashboard/sub_categories")->withSuccess("GREAT INFO HAS BEEN UPDATED");
        } else {
           
           $category_id = SubCategory::create($data);
            return Redirect::to("dashboard/sub_categories")->withSuccess("GREAT INFO HAS BEEN CREATED");
        }
    }

    public function edit($id,Request $request){
        // dd($id);
        $data['title'] = 'EDIT CATEGORY';
        $data['categories'] = Category::all();
        $data['result'] = SubCategory::where('id',$id)
        ->first(['id','name','c_id']);
        // dd($data['result']);
        return view('dashboard.sub_categories.add-edit',$data);

    }

    public function delete($id){
        $subCategory = SubCategory::findOrFail($id)->delete();
        return Redirect::to("dashboard/sub_categories")->withSuccess("GREAT INFO HAS BEEN DELETE");
    }
}
