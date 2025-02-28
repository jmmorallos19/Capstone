<div class="w-100 overflow-y-auto overflow-x-hidden p-4 pt-0"
  style="height: fit-content; max-height: 90%;">
  <table class="table" id="accounttable" style=" table-layout: fixed;">
    <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
      <tr>
        <th class="fw-normal" scope="col">Role</th>
        <th class="fw-normal" scope="col">FullName</th>
        <th class="fw-normal" scope="col">Account Email</th>
        <th class="fw-normal" scope="col">Account Status</th>
        <th class="fw-normal" scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($staffLists as $stafflist)
      <tr>
        <td class="text-capitalize">{{ $stafflist->role }}</td>
        <td class="text-capitalize">{{ $stafflist->firstname . " " . $stafflist->lastname}}</td>

        <td>{{ $stafflist->staff_email }}</td>

        @if ($stafflist->status === 'active')
        <td class="text-capitalize" style="color: green; font-weight: 500;;">{{ $stafflist->status }}</td>
        @endif

        @if ($stafflist->status === 'inactive')
        <td class="text-capitalize" style="color: red; font-weight: 500;;">{{ $stafflist->status }}</td>
        @endif



        <td>
          <div class="d-flex gap-1 flex-wrap">
          <a href="{{ route('showStaff', $stafflist->id) }}" id="viewbtn" class="btn btn-sm" style="background-color: #193c71; color: #fff; font-size: .9rem; "><i class="bi bi-eye"></i>
          </a>

          @if ($stafflist->status === 'active')
            @includeIf('components.inactiveUserModal')
          @endif

          @if ($stafflist->status === 'inactive')
            @includeIf('components.activeUserModal')
          @endif

          {{-- Delete User Modal --}}
          @include('components.deleteUserModal')
         
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>