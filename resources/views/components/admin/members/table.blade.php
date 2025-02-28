<div class="w-100 pe-4 ps-4 overflow-y-auto overflow-x-hidden" style="height: fit-content; max-height: 90%;">
    <table class="table table-striped" id="allMembers" style="table-layout: fixed;">
      <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
        <tr>
          <th class="fw-normal" scope="col">Library Card No.</th>
          <th class="fw-normal" scope="col">FullName</th>
          <th class="fw-normal" scope="col">School Email</th>
          <th class="fw-normal" scope="col">Book Limit Status</th>
          <th class="fw-normal" scope="col">Created at</th>
          <th class="fw-normal" scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($members as $member)
          <tr>
            <td>{{ $member->library_card_no }}</td>
            <td>{{ $member->name}}</td>
            <td>{{ $member->email}}</td>
            <td>
              <div class="pt-1 pb-1 pe-2 ps-2" style=" width: fit-content;   border-radius: 5%; {{ $member->currently_borrowed_books !== $member->total_books_allowed ? 'background-color: rgba(5, 153, 5, 75%);' : 'background-color: red;' }}">
                <p class="m-0" style="font-size: .9rem; color: white;">{{ $member->currently_borrowed_books }}/{{ $member->total_books_allowed }}</p>
              </div>
            </td>
            <td>
              <p class="m-0">{{ \Carbon\Carbon::parse($member->created_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
              <p class="m-0" style="color: gray; font-size: .9rem;">{{ \Carbon\Carbon::parse($member->created_at)->timezone('Asia/Manila')->format('g:i A')}}</p>
            </td>
            <td>
              <a href="{{ route('admin.memberEdit', $member->id) }}" id="viewbtn" class="btn" style="background-color: #193c71; color: #fff; font-size: .9rem; padding: .4rem .6rem;"><i class="bi bi-eye"></i></a> 
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
   </div>