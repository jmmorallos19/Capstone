<!-- Available Books Tab -->
{{-- <div class="card-header d-flex justify-content-start pe-4 ps-3 pt-3 pb-3"
    style="border-bottom:  1px solid #c4c2c2">

    <h3 class="m-0">Available Books</h3>

</div> --}}
<div class="card-body pt-0" style=" border: 1px solid #c4c2c2;">
    <table id="availableBooks" class="table table-striped"  style="height: 33rem; table-layout: fixed;">
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