<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::orderBy('time', 'DESC')->get();
        $response = [
            "message" => 'List transaction order by time',
            "data" => $transaction
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => ['required'],
            'amount' => ['required', 'numeric'],
            "type" => ['required', 'in:expense,revenue']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaction = Transaction::create($request->all());
            $respon = [
                'message' => 'Transaction created',
                'data' => $transaction,
            ];

            return response()->json($respon, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                "message" => "Failed " . $e->errorInfo,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trans = Transaction::findOrFail($id);
        $response = [
            "message" => 'Detail transaction',
            "data" => $trans
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trans = Transaction::findOrFail($id);

        $validator = Validator::make($request->all(), [
            "title" => ['required'],
            'amount' => ['required', 'numeric'],
            "type" => ['required', 'in:expense,revenue']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $trans->update($request->all());
            $respon = [
                'message' => 'Transaction updated',
                'data' => $trans,
            ];

            return response()->json($respon, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                "message" => "Failed " . $e->errorInfo,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trans = Transaction::findOrFail($id);

        try {
            $trans->delete();
            $respon = [
                'message' => "Transaction deleted",
            ];

            return response()->json($respon, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                "message" => "Failed " . $e->errorInfo,
            ]);
        }
    }
}
