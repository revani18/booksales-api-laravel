<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found!',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $transactions
        ]);
    }


    public function store(Request $request)
    {
        // Validasi data request
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validator error',
                'data' => $validator->errors()
            ], 422);
        }

        // Ambil user yang sedang login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 401);
        }

        // Cari data buku berdasarkan ID
        $book = Book::find($request->book_id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan!'
            ], 404);
        }

        // Cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!'
            ], 400);
        }

        // Hitung total harga
        $totalAmount = $book->price * $request->quantity;

        // Kurangi stok buku
        $book->stock -= $request->quantity;
        $book->save();

        // Generate order number
        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        // Simpan data transaksi
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transaction
        ], 201);
    }

    // Customer: melihat detail transaksi miliknya
    public function show($id)
    {
        $user = auth('api')->user();

        $transaction = Transaction::with('user', 'book')
            ->where('customer_id', $user->id)
            ->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Transaction detail',
            'data' => $transaction
        ]);
    }

    // Customer: mengubah transaksi miliknya
    public function update(Request $request, $id)
    {
        $user = auth('api')->user();

        $transaction = Transaction::where('customer_id', $user->id)
            ->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'sometimes|required|exists:books,id',
            'total_amount' => 'sometimes|required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validator error',
                'data' => $validator->errors()
            ], 422);
        }

        $transaction->fill($request->only([
            'book_id',
            'total_amount'
        ]));
        $transaction->save();

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully!',
            'data' => $transaction->load('user', 'book')
        ]);
    }

    // Admin: menghapus transaksi
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan!'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully!'
        ]);
    }
}
