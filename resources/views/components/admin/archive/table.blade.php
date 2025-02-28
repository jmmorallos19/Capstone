<div class="w-100 overflow-y-auto overflow-x-hidden p-4 pt-0"
  style="height: fit-content; max-height: 90%; background-color: 1px solid #000;">
  <table class="table" id="accounttable" style=" table-layout: fixed;">
    <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
      <tr>
        <th class="fw-normal" scope="col">Accession No.</th>
        <th class="fw-normal" scope="col">Title</th>
        <th class="fw-normal" scope="col">Author</th>
        <th class="fw-normal" scope="col">Status</th>
        <th class="fw-normal" scope="col">Archived at</th>
        <th class="fw-normal" scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($archivedBooks as $book)
        <tr>
          <td scope="row">{{ $book->accession_no }}</td>
          <td class="text-capitalize">{{ $book->title }}</td>
          <td class="text-capitalize">{{ $book->author }}</td>
          <td class="text-capitalize" style="color: red">Archived</td>

          <td>
            <p class="m-0">{{ \Carbon\Carbon::parse($book->archived_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
            <p class="m-0" style="color: gray; font-size: .9rem;">{{ \Carbon\Carbon::parse($book->archived_at)->timezone('Asia/Manila')->format('g:i A')}}</p>
          </td>
          
          {{-- @foreach ($book->bookCopies as $bookCopy)
          <td>{{ $bookCopy->copy_no}}</td>
          @endforeach --}}

          <td>
            <div class="action-buttons d-flex gap-1">
            <a href="{{ route('admin.showArchiveEdit', $book->id)}}" id="viewbtn" class="btn"
              style="background-color: #193c71; color: #fff; font-size: .9rem; padding: .4rem .6rem;"
              ><i class="bi bi-eye"></i>
            </a>
            
            {{-- Archive Modal --}}
            @includeIf('components.restoreBookModal')

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>