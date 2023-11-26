<!-- resources/views/categories/create.blade.php -->

<h1>Create Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <button type="submit">Create</button>
</form>
