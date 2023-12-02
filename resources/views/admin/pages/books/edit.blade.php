@extends('admin.layout.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4>Edit Book</h4>
                    <div class="form-group"></div>
                    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use the PUT method for updates -->

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type=text class="form-control" id="description" name="description" value="{{ $book->description }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-group" for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                {{-- Assume $categories is available, containing a collection of categories --}}
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher }}" required>
                        </div>
                        <div class="form-group">
                            <label for="abstract">Abstract</label>
                            <input type=text class="form-control" id="abstract" name="abstract" value="{{ $book->abstract }}" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
                        </div>
                        <label for="image">Image</label>
                        <div class="form-group">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" class="img-thumbnail">
                            <!-- Upload new image if needed -->
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop