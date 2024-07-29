<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : Response
    {
        // $filter = "";
        // $filterRequest = $request->input('filter');

        // dd($filterRequest);

        // if(isset($filterRequest)){
        //     $filter = $filterRequest;
        // }

        // $dishItems = Dish::all();

        $filter = $request->input('filter', '');

        $dishItems = Dish::query()
            ->when($filter, function ($query, $filter) {
                return $query->where('name', 'like', "%{$filter}%")
                    ->orWhere('description', 'like', "%{$filter}%");
            })
            ->get();

        return Inertia::render('Dishes/Index', [
            'dishes' => $dishItems,
            'filter' => '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dishes/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
