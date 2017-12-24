<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Customer;
use Session;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // create a variable and store all of the routes in it
        $routes = Route::orderBy('name', 'asc')->paginate(10);
           
        // return a view and pass in the above variable
        return view('routes.index')->withRoutes($routes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routes.create');
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
            ));

        // store in the database
            $route = new Route;
            $route->name = $request->name;

            $route->save();

        Session::flash('success', 'The new route has been successfully saved!');

        // redirect to another page
        return redirect()->route('routes.show', $route->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = Route::find($id);
        $customers = Customer::orderBy('name', 'asc')->where('route_id', '=', $id)->paginate(25);
        
        return view('routes.show')->withroute($route)->withCustomers($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the route and save as a variable
        $route = Route::find($id);
        

        //$mappedRoutes = $routes->map(function ($item, $key) {
        //    return $item->name;
        //})->toArray();

        // dd($mappedRoutes);

        // return the view and pass in the variable previously created
        return view('routes.edit')
            ->withRoute($route);
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
            'name' => 'max:255|min:1',
            ));

        // save the data to the database
            $route = route::find($id);

            $route->name = $request->input('name');

            $route->save();


        // set flash data with success message
            Session::flash('success', 'The updates were successfully saved!');

        // redirect with flash to routes.show
            return redirect()->route('routes.show', $route->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
