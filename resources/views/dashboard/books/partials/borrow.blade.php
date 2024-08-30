@can('borrow', $book)
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#borrow-{{ $book->getKey() }}-modal">
        Borrow
    </button>

    <div class="modal fade" id="borrow-{{ $book->getKey() }}-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('books.borrow', $book) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Borrow Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="due_date">Due Date</label>
                            <input type="date" id="due_date" class="form-control" name="due_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Borrow</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endcan
