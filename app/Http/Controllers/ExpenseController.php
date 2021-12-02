<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Currency;
use App\Models\Vehicle;
use App\Models\People;
use App\Models\ExpenseSubCategory;
use App\Models\ExpenseCategory;
use App\Http\Resources\ExpenseResource;
use App\Http\Resources\ExpenseSubCategoryResource;
use App\Http\Resources\VehicleResource;
use App\Http\Resources\PeopleResource;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'expenses' => ExpenseResource::collection(Expense::with('currency')->with('expense_subcategory')->with('vehicle')->with('person')->get()),
            'expenseSubcategories' => ExpenseSubCategoryResource::collection(ExpenseSubCategory::with('expense_category')->get()),
            'expenseCategories' => ExpenseCategory::all(),
            'vehicles' => VehicleResource::collection(Vehicle::all()),
            'people' => PeopleResource::collection(People::all()),
            'currency' => Currency::all()
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense;
        $expense->date = $request->input('date');
        $expense->expense_subcategory_id = $request->input('expenseSubcategoryId');
        if ($request->input('currencyId') == 1) {
            $expense->amount_tzs = $request->input('amount');
            $expense->amount_usd = 0;
        } else {
            $expense->amount_tzs = 0;
            $expense->amount_usd = $request->input('amount');
        }
        $expense->currency_id = $request->input('currencyId');
        $expense->exchange_rate = $request->input('exchangeRate');
        $expense->description = $request->input('description');
        $expense->vehicle_id = $request->input('vehicleId');
        $expense->person_id = $request->input('personId');
        $expense->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
