<div class="card-body pt-0" style=" border: 1px solid #c4c2c2;">
    <table id="bookList" class="table table-striped bordered" style="height: fit-content; max-height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th class="fw-normal" scope="col">Accession No.</th>
                <th class="fw-normal" scope="col">Title</th>
                <th class="fw-normal" scope="col">Author</th>
                <th class="fw-normal" scope="col">Status</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ($books as $book)
            <tr>
                <td scope="row">{{ $book->accession_no }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                @if ($book->status === "available")
                <td class="text-capitalize" style="color: green;">{{ $book->status}}</td>
                @endif
                @if ($book->status === "borrowed")
                <td class="text-capitalize" style="color: red;">{{ $book->status}}</td>
                @endif
                {{-- <td><img src="{{ asset($book->barcode) }}" alt="Barcode"></td> --}}
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>

