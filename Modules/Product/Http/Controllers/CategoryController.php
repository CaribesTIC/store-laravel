<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::get((object)['type'=>'list']);
        return view('category.index', compact('categories'));
    }

    public function get(Request $request)
    {      
        return Category::get($request);
    }
   
    public function create()
    {   
        $categories = Category::get((object)['type'=>'nivel', 'value'=>0]);
        $select = (object)['display' => true]; 
        return view('category.create', compact('categories', 'select'));
    }

    public function show(Request $request, $id)
    {
        $request->type = 'regist';
        $request->value = $id;        
        $category = json_decode(Category::get($request));
        $select = (object)['display' => false];
        return view('category.show', compact('category', 'select'));
    }

    public function edit(Request $request, $id)
    {        
        $request->type = 'regist';
        $request->value = $id;        
        $category = json_decode(Category::get($request));
        $select = (object)['display' => false];
        return view('category.edit', compact('category', 'select'));
    }

    public function regist(Request $request)
    {
        $request->id        = $request->id        ? $request->id        : 0;
        $request->parent_id = $request->parent_id ? $request->parent_id : 0;
        $response = Category::regist($request);
        if ($response[0]=='t')
            $msgType = 'success';
        elseif ($response[0]=='f')
            $msgType = 'error';     
        return redirect()->route('category.index')->with($msgType, $response[1]); 
    }

    public function destroy($id)
    {        
        $response = Category::remove($id);
        if ($response[0]=='t')
            $msgType = 'success';
        elseif ($response[0]=='f')
            $msgType = 'error';       
        return redirect()->route('category.index')->with($msgType, $response[1]);
    }
}

