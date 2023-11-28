@extends('admin.layout.admin')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Books List</h2>
                <a href="{{ route('admin.books.create') }}" class="btn btn-success mb-2">Add Book</a>
                <!-- ... tabel dan baris data buku ... -->
            </div>
           
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Books Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Abstract</th>
                                    <th>ISBN</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->image }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->abstract }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>


                <!-- /.card -->
            </div>

            <!-- /.col -->
        </div>
    </div><!--/. container-fluid -->
</section>
@endsection