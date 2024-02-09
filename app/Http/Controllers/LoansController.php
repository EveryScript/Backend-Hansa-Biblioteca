<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Models\Author;
use App\Models\Loans;

class LoansController extends Controller
{
    public $BOOK_BORROWED;
    public $BOOK_RETURNED;

    public function __construct()
    {
        $this->BOOK_BORROWED = 'En Prestamo';
        $this->BOOK_RETURNED = 'Devuelto';
    }
    // Get all loans
    public function index()
    {
        $loans = Loans::with('book')
            ->with('client')
            ->orderBy('date_loan', 'DESC')
            ->get();

        foreach ($loans as $loan) {
            $author = Author::where('id', $loan->book->author_id)->first();
            $loan->book->author = $author;
        }

        return response()->json([
            'status' => 'success',
            'loans' => $loans
        ]);
    }
    // Get loan by id
    public function show($id)
    {
        $loan = Loans::find($id)->load('book')->load('client');

        return response()->json([
            'status' => 'success',
            'loan' => $loan
        ]);
    }
    // Register loan
    public function store(LoanRequest $request)
    {
        $validated = $request->validated();
        $validated['date_loan'] = now();
        $validated['status'] = $this->BOOK_BORROWED;

        Loans::create($validated);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Loan registred'
        ], 200);
    }
    // Register devolution by id loan
    public function update($id)
    {
        $validated = array();
        $validated['status'] = $this->BOOK_RETURNED;

        Loans::where('id', $id)->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Devolution registred'
        ], 200);
    }
    // Delete loan
    public function destroy($id)
    {
        $loan = Loans::where('id', $id);
        if (is_object($loan)) {
            $loan->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Loan deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error on loan deleted',
            ], 500);
        }
    }
}
