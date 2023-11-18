<?php

namespace App\Http\Controllers\User\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\CCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $categories = CCategory::on('mysql2')->where(['parent_id' => 0])->orderBy('sort', 'ASC')->get();
        return view('user.company.categories.index', compact('categories'));
    }

    public function saveNestedCategories(Request $request){

        $json = $request->nested_category_array;
        $decoded_json = json_decode($json, TRUE);

        $simplified_list = [];
        $this->recur1($decoded_json, $simplified_list);

        DB::beginTransaction();
        try {
            $info = [
                "success" => FALSE,
            ];

            foreach($simplified_list as $k => $v){
                $category = CCategory::on('mysql2')->find($v['id']);
                $category->fill([
                    "parent_id" => $v['parent_id'],
                    "sort" => $v['sort'],
                ]);

                $category->save();
            }

            DB::commit();
            $info['success'] = TRUE;
        } catch (\Exception $e) {
            DB::rollback();
            $info['success'] = FALSE;
        }

        if($info['success']){
            $request->session()->flash('success', "All Categories updated.");
        }else{
            $request->session()->flash('error', "Something went wrong while updating...");
        }

        return redirect(route('company.categories.index', auth()->user()->site->title));
    }

    public function recur1($nested_array=[], &$simplified_list=[]){

        static $counter = 0;

        foreach($nested_array as $k => $v){

            $sort = $k+1;
            $simplified_list[] = [
                "id" => $v['id'],
                "parent_id" => 0,
                "sort" => $sort
            ];

            if(!empty($v["children"])){
                $counter+=1;
                $this->recur2($v['children'], $simplified_list, $v['id']);
            }

        }
    }

    public function recur2($sub_nested_array=[], &$simplified_list=[], $parent_id = NULL){

        static $counter = 0;

        foreach($sub_nested_array as $k => $v){

            $sort = $k+1;
            $simplified_list[] = [
                "id" => $v['id'],
                "parent_id" => $parent_id,
                "sort" => $sort
            ];

            if(!empty($v["children"])){
                $counter+=1;
                return $this->recur2($v['children'], $simplified_list, $v['id']);
            }
        }
    }

    public function create()
    {
        $categories = CCategory::on('mysql2')->orderBy('title', 'ASC')->get();
        return view('user.company.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        CCategory::on('mysql2')->create([
            'title' => $request->title,
            'slug' => $request->slug ?: $request->title,
            'parent_id' => (!empty($request->parent_id))? $request->parent_id : 0,
            'image' => $request->image,
            'alt_image' => $request->alt_image,
            'content' => $request['content'],
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'site_id' => 1
        ]);
        return response()->json();
    }

    public function edit($id){
        $categories = CCategory::on('mysql2')->orderBy('title', 'ASC')->get();
        $category = CCategory::on('mysql2')->find($id);
        return view('user.company.categories.edit', compact('categories', 'category'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = CCategory::on('mysql2')->findOrFail($id);
        $category->update([
            'title' => $request->title,
            'slug' => $request->slug ?: $request->title,
            'image' => $request->image,
            'alt_image' => $request->alt_image,
            'content' => $request['content'],
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description
        ]);

        return response()->json();
    }

    public function destroy($id){
        $category = CCategory::on('mysql2')->find($id);
        $category->delete();

        return redirect(route('company.categories.index'))->with('success', "Category removed successfully.");
    }
}
