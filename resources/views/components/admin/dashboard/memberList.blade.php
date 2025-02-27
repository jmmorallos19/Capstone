<!-- Member List Tab -->
{{-- <div class="card-header d-flex flex-wrap  align-items-center pe-3 ps-3 pt-2 pb-2"
    style="border-bottom:  1px solid #c4c2c2">
    <h3 class="m-0">Member List</h3>

    <div class="card-button-container d-flex justify-content-end gap-2 p-0" style="width: fit-content">
        <button class="w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;" type="button" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add Member</button> --}}
        {{-- Add Member Modal --}}
        {{-- @includeIf('components.addMemberModal')

        <a href="{{ route('admin.member') }}" class="btn w-min-fit button-2 pt-1 pb-1 ps-3 pe-3" style="white-space: nowrap;">View All</a>
    </div>
</div> --}}

<div class="card-body pt-0" style="border: 1px solid #c4c2c2;">
    <table id="memberList" class="table table-striped"  style="height: fit-content; max-height: 33rem; table-layout: fixed;">
        <thead style="position: sticky; top: 0%;">
            <tr>
                <th class="fw-normal" scope="col">Library Card No.</th>
                <th class="fw-normal" scope="col">FullName</th>
                <th class="fw-normal" scope="col">Group Level</th>
                <th class="fw-normal" scope="col">Year & Course</th>
            </tr>
        </thead>

        <tbody class="pt-0">
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->library_card_no }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->member_group }}</td>
                <td>{{ $member->year_and_course }}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>