@can('return', $book)
    <form action="{{ route('books.return', $book) }}" method="post" style="display:inline-block;">
        @csrf
        <button type="submit" class="btn btn-success btn-sm">Return</button>
    </form>
@endcan
