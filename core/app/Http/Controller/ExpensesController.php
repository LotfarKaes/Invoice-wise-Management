<?php namespace App\Http\Controllers;

use App\Http\Requests\ExpenseFormRequest;
use App\Invoicer\Repositories\Contracts\ExpenseInterface as Expense;

class ExpensesController extends Controller {

    private $expense;

    public function __construct(Expense $expense){
        $this->expense = $expense;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $expenses = $this->expense->all();
		return view('expenses.index', compact('expenses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('expenses.create');
	}

    /**
     * Store a newly created resource in storage.
     * @param ExpenseFormRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(ExpenseFormRequest $request)
	{
        if($this->expense->create($request->all())){
            flash()->success('Expense has been added');
            return response()->json(array('success'=>true, 'msg' => 'expense created'), 201);
        }
        return response()->json(array('success'=>false, 'msg' => 'expense not added'), 422);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $expense = $this->expense->getById($id);
        return view('expenses.edit', compact('expense'));
	}

    /**
     *  Update the specified resource in storage.
     * @param ExpenseFormRequest $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(ExpenseFormRequest $request, $id)
	{
        if($this->expense->updateById($id,$request->all())){
            flash()->success('Expense has been updated');
            return response()->json(array('success'=>true, 'msg' => 'Expense updated'), 201);
        }
        return response()->json(array('success'=>false, 'msg' => 'Expense not updated'), 422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if($this->expense->deleteById($id))
            flash()->success('Expense deleted');
        else
            flash()->error('Expense delete failed');

        return redirect('expenses');
	}

}
