<!-- BorrowedBooks Tab -->

{{-- <div class="card-header d-flex flex-wrap  align-items-center pe-3 ps-3 pt-2 pb-2"
    style="border-bottom:  1px solid #c4c2c2">
    <h3 class="m-0">Borrowed Books</h3>

    <div class="card-button-container d-flex justify-content-end gap-2 p-0" style="width: fit-content">
        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#borrowModal">Borrow (not working)</button> --}}
        {{-- Borrow Modal --}}
        {{-- @includeIf('components.borrowModal')

        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#returnModal">Return (not working)</button> --}}
        {{-- Return Modal --}}
        {{-- @includeIf('components.returnModal')

    </div>
</div> --}}

<div class="card-body pt-0" style="border: 1px solid #c4c2c2;">
    <table id="borrowed" class="table table-striped"  style="height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th scope="col">Accession No.</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ($books as $book)
            <tr>
                <td scope="row">{{ $book->accession_no }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>