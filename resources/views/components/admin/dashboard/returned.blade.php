<!-- Returned Tab -->
{{-- <div class="card-header d-flex justify-content-start pe-4 ps-3 pt-3 pb-3"
    style="border-bottom:  1px solid #c4c2c2">

    <h3 class="m-0">Member's Returned Books</h3>

</div> --}}

<div class="card-body pt-0" style="border: 1px solid #c4c2c2;">
    <table id="returned" class="table table-striped"  style="height: fit-content; max-height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th class="fw-normal" scope="col">Library No.</th>
                <th class="fw-normal" scope="col">FullName</th>
                <th class="fw-normal" scope="col">Borrowed date</th>
                <th class="fw-normal" scope="col">Returned date</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ( $returnedMembers as  $returnedMember)
            <tr>
                <td scope="row">{{ $returnedMember->member->library_card_no }}</td>
                <td>{{$returnedMember->member->name }}</td>
                <td>{{ \Carbon\Carbon::parse($returnedMember->borrowed_at)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($returnedMember->returned_at)->format('d M Y') }}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>