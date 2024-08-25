<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Dish;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::with('dishes')->get();
        return view('order.index',compact('categories'));
    }


    public function addToOrder(Request $request)
    {
        $item = $request->only('id', 'name', 'price', 'quantity', 'remark');

        // Retrieve the current order or create a new one
        $order = session()->get('order', []);

        // If the item exists, update the quantity
        if (isset($order[$item['id']])) {
            $order[$item['id']]['quantity'] += $item['quantity'];
            $order[$item['id']]['remark'] += $item['remark'];

        } else {
            // Add new item to the order
            $order[$item['id']] = $item;
        }




        // Store the order in session
        session()->put('order', $order);

        return redirect()->route('order.view')->with('success', 'Item added to order.');
    }

    // View the order
    public function viewOrder()
    {
        // Get the order from session
        $order = session()->get('order', []);

        // Return order view
        $categories = Category::with('dishes')->get();
        return view('order.show', compact('order','categories'));
    }

    // Update order item quantities
    public function updateOrder(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id',
            'quantity' => 'required|integer|min:1',
            'remark' => 'nullable|string|max:255', // Validation rule for remark
        ]);

        $order = session()->get('order', []);

        // Update the quantity and remark of the specific item
        $order[$request->id]['quantity'] = $request->quantity;
        $order[$request->id]['remark'] = $request->remark;

        // Save the updated order in the session
        session()->put('order', $order);

        return redirect()->route('order.view')->with('success', 'Order updated successfully.');
    }

    // Remove item from the order
    public function removeFromOrder(Request $request)
    {
        $order = session()->get('order', []);

        // Remove the item from the order
        unset($order[$request->id]);

        // Save the updated order
        session()->put('order', $order);

        return redirect()->route('order.view')->with('success', 'Item removed from order.');
    }
    //store the order
    public function store(Request $request)
    {
        // Get the order items (this could be from session, or a Cart model/service)
        $order = session()->get('order', []);

        if (empty($order)) {
            return redirect()->back()->with('error', 'Your order is empty!');
        }

        // Create a new order
        $order = Order::create([
            'user_id' => Auth::id(), // Assuming user is logged in
            'total_price' => $this->calculateTotal($order),
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($order as $item) {
            Order_Dish::create([
                'order_id' => $order->id,
                'dish_id' => $item['id'],
                'quantity' => $item['quantity'],
                'remark' => $item['remark'],
                'price' => $item['price'],
            ]);
        }

        // Clear the order
        session()->forget('order');

        // Redirect with a success message
        return redirect()->route('order.index')->with('success', 'Order placed successfully!');
    }
    private function calculateTotal($order)
    {
        return collect($order)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }
}
