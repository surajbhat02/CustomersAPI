<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all customers
        $customers=Customer::paginate();

        //Collect these customers as a single resource
        return CustomerResource::collection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer=$request->isMethod('put')?Customer::findOrFail($request->customer_id):new Customer;

        $customer->id=$request->input('customer_id');
        $customer->first_name=$request->input('first_name');
        $customer->last_name=$request->input('last_name');
        $customer->phone=$request->input('phone');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->city=$request->input('city');
        $customer->state=$request->input('state');

        if($customer->save())
        {
            return new CustomerResource($customer);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get a customer
        $customer=Customer::findOrFail($id);

        //Return a customer as a single Resource
        return new CustomerResource($customer);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::findOrFail($id);

        if($customer->delete())
        {
            return new CustomerResource($customer);
        }
    }
}
