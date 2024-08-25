<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Table;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::all();
        return view('customers.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table = Table::findOrFail($request->table);
        $currentCustomerCount = $table->Customers()->count();
        if ($currentCustomerCount >= 8) {
            return redirect()->back()->withErrors(['error' => 'Table is full. No more customers can be seated.']);
        }
        $request->validate([
            'customerage'=>['required'],
            'table'=>['required']
        ]);
        Customer::create([
            'age'=>$request->customerage,
            'deluxe'=>$request->has('deluxe'),
            'table_id'=>$request->table,
        ]);
        return redirect('restaurant');
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
        Customer::findOrFail($id)->delete();
        return redirect('restaurant');
    }
}
