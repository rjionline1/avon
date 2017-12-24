<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Session;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all of the customers in it
        $sales = Sale::orderBy('campaign_no', 'asc')->paginate(10);
        $total = Sale::sum('campaign_sales');
        $target = Sale::all('sales_target')->first();

        // return a view and pass in the above variable
        return view('sales.index')
        ->withSales($sales)
        ->withTotal($total)
        ->withTarget($target);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
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
            'sales_year' => 'required|max:255',
            'campaign_no' => 'required|max:255',
            'campaign_sales' => 'required|max:255',
            'sales_target' => 'required|max:255',
            ));

        // store in the database
            $sale = new Sale;
            $sale->sales_year = $request->sales_year;
            $sale->campaign_no = $request->campaign_no;
            $sale->campaign_sales = $request->campaign_sales;
            $sale->sales_target = $request->sales_target;

            $sale->save();

        Session::flash('success', 'The new sale has been successfully saved!');

        // redirect to another page
        return redirect()->route('sales.show', $sale->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id); 
       
        return view('sales.show')->withSale($sale);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // find the sale and save as a variable
        $sale = Sale::find($id);

        // return the view and pass in the variable previously created
        return view('sales.edit')->withSale($sale);
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
            'sales_year' => 'required|max:255',
            'campaign_no' => 'required|max:255',
            'campaign_sales' => 'required|max:255',
            'sales_target' => 'required|max:255',
            ));

        // save the data to the database
            $sale = Sale::find($id);

            $sale->sales_year = $request->input('sales_year');
            $sale->campaign_no = $request->input('campaign_no');
            $sale->campaign_sales = $request->input('campaign_sales');
            $sale->sales_target = $request->input('sales_target');

            $sale->save();


        // set flash data with success message
            Session::flash('success', 'The updates were successfully saved!');

        // redirect with flash to customers.show
            return redirect()->route('sales.show', $sale->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);

        $sale -> delete();

        Session::flash('success', 'The sale has been successfully deleted.');
        return redirect()->route('sales.index');
    }
}
