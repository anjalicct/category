<?php

namespace Anjalicct\Category\controllers;

use Anjalicct\Category\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('in controller');
        $categories = Category::with(['subcategories'])->whereNull('parent_category_id')->latest()->paginate(5);

        return view('category::index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name','category_id');
        return view('category::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'category_id' => 'required|unique:Anjalicct\Category\models\Category,category_id',
            // 'category_id' => 'unique',
            'category_name' => 'required',
            'category_status' => 'required'
        ]);

        Category::create($request->all());
     
        return redirect()->route('category.index')
                        ->with('success','Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Anjalicct\Category\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::pluck('category_name','category_id');
        return view('category::edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Anjalicct\Category\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            // 'category_id' => 'required|unique:App\Models\Category,category_id',
            'category_name' => 'required',
            'category_status' => 'required'

        ]);
    
        $category->update($request->all());
        
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Anjalicct\Category\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        dd($category);
        return view('category::show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Anjalicct\Category\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $child_categories = Category::where('parent_category_id', $category->category_id);
        
        if($child_categories->count() > 0) {
            /* foreach($child_categories->get()->all() as $child_category){
                if($category->delete()){
                    $category->update(['category_status' => 'Inactive']);
                    return redirect()->route('categories.index')->with('success','Category deleted successfully.');
                }
            } */
            return redirect()->route('categories.index')
                            ->with('warning','You can not delete this category as it is Parent Category, Delete all sub category to delete this category.');
        }else{
            if($category->delete()){
                $category->update(['category_status' => 'Inactive']);
                return redirect()->route('categories.index')
                            ->with('success','Category deleted successfully.');
            }else{
                return redirect()->route('categories.index')
                            ->with('danger','Something went wrong.');
            }
        }
    }

    /**
     * Display a listing of the trashed record.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash() 
    {
        $categories = Category::onlyTrashed()->latest()->paginate(5);
        if($categories->count() > 0){
            return view('categories.trash',compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->route('categories.index')->with('warning','No Trash Record Found..!!');
        }
    }

    /**
     * restore trashed record.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($category_id)
    {
        $category = Category::where('category_id', $category_id);
        if($category->restore()){
            $category->update(['category_status' => 'Active']);
            return redirect()->route('categories.index')->with('success','Record succesfully restored.');
        }else{
            return redirect()->route('categories.index')->with('danger','Something went wrong..!!');
        }
    }

    /**
     * Display Category Id-Name as Treeview
     */
    public function categoryTreeview(){
        
        $categories = Category::with(['subcategories'])->whereNull('parent_category_id')->latest()->paginate(5);

        return view('categories.treeview.categoryTreeview',compact('categories'));
    } 
}
