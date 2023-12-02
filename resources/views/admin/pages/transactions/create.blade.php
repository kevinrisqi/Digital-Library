<!-- resources/views/admin/transactions/create.blade.php -->

@extends('admin.layout.admin')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card-header">
                    <h4>Create Transaction</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transactions.store', ['book_id' => $book_id ]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book_id }}">
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="borrow_days">Borrow Days</label>
                            <input type="number" class="form-control" id="borrow_days" name="borrow_days" required>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>

        </div><!--/. container-fluid -->
    </div>
</section>

@endsection
