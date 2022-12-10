<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

/**
 * Class BillController
 * @package App\Http\Controllers
 */
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::paginate();

        return view('bill.index', compact('bills'))
            ->with('i', (request()->input('page', 1) - 1) * $bills->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bill = new Bill();
        return view('bill.create', compact('bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bill::$rules);

        $bill = Bill::create($request->all());

        return redirect()->route('bills.index')
            ->with('success', 'Bill created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);

        return view('bill.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::find($id);

        return view('bill.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bill $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        request()->validate(Bill::$rules);

        $bill->update($request->all());

        return redirect()->route('bills.index')
            ->with('success', 'Bill updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bill = Bill::find($id)->delete();

        return redirect()->route('bills.index')
            ->with('success', 'Bill deleted successfully');
    }
}
