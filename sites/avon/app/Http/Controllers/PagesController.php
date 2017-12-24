<?php

namespace App\Http\Controllers;
use App\Sale;
use App\Route;
use App\Customer;

class PagesController extends Controller {

	public function getIndex() {
		$sales = Sale::sum('campaign_sales');
		//$target = Sale::all('sales_target')->first();
		return view('welcome')->withSales($sales);
		//->withTarget($target);
	}

	public function getRoutes() {
		return view('pages.routes');
	}

	public function getCustomers() {
		return view('pages.customers');
	}

	public function getSingle() {
		$customers = Customer::all();
		return view('pages.single')->withCustomers($customers);
	}

	public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show')->withCustomer($customer);
    }

	//$customer = Customer::find($id);
        //return view('customers.show')->withCustomer($customer);


}