<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Route;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // create a variable and store all of the customers in it
        $customers = Customer::orderBy('name', 'asc')->paginate(10);

        $search = Customer::orderBy('name', 'asc')->get();
           
        // return a view and pass in the above variable
        return view('customers.index')->withCustomers($customers)->withSearch($search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Route::all();
        $rou = array();

        foreach ($routes as $route) {
            $rou[$route -> id] = $route->name;
        }

        return view('customers.create')->withRoutes($rou);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'name' => 'max:255',
            'email' => 'max:255',
            'phone' => 'max:255',
            'cell' => 'max:255',
            'address' => 'max:255',
            'city' => 'max:255',
            'route_id' => 'max:255',
            'qty' => 'max:255'
            ));

        // store in the database
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->cell = $request->cell;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->route_id = $request->route_id;
            $customer->qty = $request->qty;

            $customer->save();

        Session::flash('success', 'The new customer has been successfully saved!');

        // redirect to another page
        return redirect()->route('customers.show', $customer->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show')->withCustomer($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the customer and save as a variable
        $customer = Customer::find($id);
        $routes = Route::all();
        $rou = array();

        foreach ($routes as $route) {
            $rou[$route -> id] = $route->name;
        }

        //$mappedRoutes = $routes->map(function ($item, $key) {
        //    return $item->name;
        //})->toArray();

        // dd($mappedRoutes);

        // return the view and pass in the variable previously created
        return view('customers.edit')
            ->withCustomer($customer)
            ->withRoutes($rou);
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
        // validate the data
        $this->validate($request, array(
            'name' => 'max:255',
            'email' => 'max:255',
            'phone' => 'max:255',
            'cell' => 'max:255',
            'address' => 'max:255',
            'city' => 'max:255',
            'route_id' => 'max:255',
            'qty' => 'max:255'
            ));

        // save the data to the database
            $customer = Customer::find($id);

            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->cell = $request->input('cell');
            $customer->address = $request->input('address');
            $customer->city = $request->input('city');
            $customer->route_id = $request->input('route_id');
            $customer->qty = $request->input('qty');

            $customer->save();


        // set flash data with success message
            Session::flash('success', 'The updates were successfully saved!');

        // redirect with flash to customers.show
            return redirect()->route('customers.show', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer -> delete();

        Session::flash('success', 'The customer has been successfully deleted.');
        return redirect()->route('customers.index');
    }
}
