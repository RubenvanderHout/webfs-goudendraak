<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;

class DishController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dishes.index');
    }


    public function getDishes(Request $request)
    {
        $search = $request->input('search');

        $dishItems = Dish::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            })
            ->get(['id', 'category_id', 'description', 'name','price']);

        return response()->json($dishItems);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dishes.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>['required','unique:dishes'],
            'name'=>['required','min:2','max:255'],
            'description'=>['max:255'],
            'price'=>['required','decimal:2'],
            'category'=>['required']
        ]);

        Dish::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category
        ]);
        return redirect('dishes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::find($id);
        $category = Category::find($dish->category_id);
        return view('dishes.show',compact('dish','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dish::find($id);
        $categories = Category::all();
        return view('dishes.edit',compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id'=>['required'],
            'name'=>['required','min:2','max:255'],
            'description'=>['max:255'],
            'price'=>['required','decimal:2'],
            'category'=>['required']
        ]);
        $dish = Dish::findOrFail($id);

        $dish->update([
            'id'=>$request->id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category
        ]);
        return redirect('dishes/'.$dish->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dish::findOrFail($id)->delete();
        return redirect('dishes');
    }
}
