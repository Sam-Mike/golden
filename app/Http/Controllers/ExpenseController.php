<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyResource;
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
            // 'expenses' => ExpenseResource::collection(Expense::with('currency')->with('expense_subcategory')->with('vehicle')->with('person')->get()),
            'expenseSubcategories' => ExpenseSubCategoryResource::collection(ExpenseSubCategory::with('expense_category')->get()),
            'expenseCategories' => ExpenseCategory::all(),
            'vehicles' => VehicleResource::collection(Vehicle::all()),
            'people' => PeopleResource::collection(People::all()),
            'currency' => CurrencyResource::collection(Currency::all())
        ];
    }
    public function load_expenses(Request $request)
    {
        $from = date_create($request->input('from'));
        $to = date_create($request->input('to'));
        return ['expensesFiltered' => ExpenseResource::collection(Expense::whereBetween('date', [$from, $to])->get())];
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
        $data = $request->input();
        foreach ($data['newExpenses'] as $key => $newExpense) {
            $expense = new Expense;
            $expense->date = $newExpense['date'];
            $expense->expense_subcategory_id = $newExpense['expenseSubcategory']['id'];
            $currencyId = $newExpense['currency']['id'];
            if ($currencyId == 1) {
                $expense->amount_tzs = $newExpense['amount'];
                $expense->amount_usd = 0;
            } else {
                $expense->amount_tzs = 0;
                $expense->amount_usd = $newExpense['amount'];
            }
            $expense->currency_id = $currencyId;
            $expense->exchange_rate = $newExpense['exchangeRate'];
            $expense->description = $newExpense['description'];
            $issuedTo = $newExpense['issuedTo'];
            if ($issuedTo) {
                $expense->person_id = $newExpense['person']['id'];
            } else {
                $expense->vehicle_id = $newExpense['vehicle']['id'];
            }
            $expense->save();
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
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return response()->json(['expense deleted successfully']);
    }
}
