<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Table;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $tables = Table::all();
        return view('restaurant.index',compact('tables'));
    }

    public function show(string $id){
       $table = Table::findOrFail($id);
        $customers = Customer::where('table_id',$id)->get();
        return view('restaurant.show',compact('customers','table'));
    }
}
