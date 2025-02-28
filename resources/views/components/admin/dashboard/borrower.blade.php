<!-- Borrowers Tab -->
{{-- <div class="card-header d-flex justify-content-start pe-4 ps-3 pt-3 pb-3"
    style="border-bottom:  1px solid #c4c2c2">

    <h3 class="m-0">Borrowers</h3>

</div> --}}

<div class="card-body pt-0" style="border: 1px solid #c4c2c2;">
    <table id="borrower" class="table table-striped"  style="height: fit-content; max-height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th class="fw-normal" scope="col">FullName</th>
                <th class="fw-normal" scope="col">Status</th>
                <th class="fw-normal" scope="col">Member Group</th>
                <th class="fw-normal" scope="col">Borrowed date</th>
                <th class="fw-normal" scope="col">Due date</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ($borrowedMembers as $borrowedMember)
            <tr>
                <td scope="row">{{ $borrowedMember->member->name }}</td>
                <td style="{{ $borrowedMember->status !== 'Currently Borrowed' ? 'color: red; font-weight: 500;' : 'color: green; font-weight: 500;' }}">{{ ucfirst( $borrowedMember->status) }}</td>
                <td scope="row">{{ $borrowedMember->member->member_group }}</td>
                <td>{{ \Carbon\Carbon::parse($borrowedMember->borrowed_at)->format('d M Y') }}</td>
                @if ($borrowedMember->member->member_group === 'Faculty')
                    <td>No due date</td>
                @else
                    <td>{{ \Carbon\Carbon::parse($borrowedMember->due_date)->format('d M Y') }}</td>
                @endif
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>