<!-- resources/views/admin/transactions/index.blade.php -->

@extends('admin.layout.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Transaction History</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Borrowed Date</th>
                                <th>Returned Date</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Borrow Days</th>
                                <th>Due Date</th>
                                <th>Returned</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->book->title }}</td>
                                <td>{{ $transaction->borrowed_date }}</td>
                                <td>{{ $transaction->returned_date }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>{{ $transaction->borrow_days }}</td>
                                <td>{{ $transaction->due_date }}</td>
                                <td>{{ $transaction->returned }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
