<form action="{{ route('books.store') }}" method="POST">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <label for="published_year">Published Year</label>
        <input type="number" name="published_year" id="published_year" required>
    </div>
    <div>
        <label for="genre">Genre</label>
        <input type="text" name="genre" id="genre" required>
    </div>
    <button type="submit">Add Book</button>
</form>
