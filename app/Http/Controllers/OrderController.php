<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Models\Costumer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('order.index')->with('name', 'Victoria');
        return view('order.index')->with('orders', Order::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create')->with('products', Product::all())->with('costumers', Costumer::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {
        $orders = [
            "order_status" => $request->order_status,
            "costumer_id" => $request->costumer_id
        ];
        $products = $request->input()['product_id'];
        $amounts = $request->input()['amount'];

        $data = [];

        foreach ($products as $key => $value) {
            $data[] = ["product_id" => $value, "amount" => $amounts[$key]];
        }

        $insert = Order::create($orders);
        $insert->products()->attach($data);
//        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit')->with('order', $order)->with('costumers', Costumer::all())->with('products', Product::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orders = [
            "order_status" => $request->input()['order_status'],
            "costumer_id" => $request->input()['costumer_id']
        ];
        $products = $request->input()['product_id'];
        $amounts = $request->input()['amount'];

        $data = [];

        foreach ($products as $key => $value) {
            $data[] = ["product_id" => $value, "amount" => $amounts[$key]];
        }
//        dd($orders);

        $order = Order::find($id);
        $insert_order = $order->save($orders);
        if ($insert_order):
            $order->products()->sync($data);
            return redirect("order/" . $id . "/edit");
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $del = $order->products()->detach();
        if ($del):
            $order->delete();
            return redirect("order");
        endif;
    }
}
