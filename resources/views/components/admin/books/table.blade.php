<div class="w-100 overflow-auto table-responsive"  style="height: fit-content; max-height: 90%;">
  <table class="table table-striped" id="allBooks"
    style="min-width: fit-content; max-height: 100%; height: 100%; table-layout: fixed;">
    <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
      <tr>
        <th class="fw-normal" scope="col">Accession No.</th>
        <th class="fw-normal" scope="col">Title</th>
        <th class="fw-normal" scope="col">Author</th>
        <th class="fw-normal" scope="col">Copies</th>
        <th class="fw-normal" scope="col">Status</th>
        <th class="fw-normal" scope="col">Created at</th>
        <th class="fw-normal" scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($books as $index => $book)

        @foreach ($book->bookCopies as $bookCopy)
          <tr>
            <td>{{ $bookCopy->accession_no }}</td>
            <td>{{ $bookCopy->title }}</td>
            <td>{{ $bookCopy->author }}</td>
            <td>
              <div class="pt-1 pb-1 pe-2 ps-2" style="background-color: rgba(5, 153, 5, 75%); width: fit-content; border-radius: 5%;">
                <p class="m-0" style="color: white; font-size: .9rem;">{{ $bookCopy->copy_no }}</p>
              </div>
            </td>

            @if ($bookCopy->status === 'available')
              <td class="text-capitalize" style="color: green">{{ $bookCopy->status}}</td>
            @endif

            @if ($bookCopy->status === 'borrowed')
              <td class="text-capitalize" style="color: red">{{ $bookCopy->status}}</td>
            @endif

            <td>
                <p class="m-0">{{ \Carbon\Carbon::parse($bookCopy->created_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
                <p class="m-0" style="color: gray; font-size: .9rem;">{{ \Carbon\Carbon::parse($bookCopy->created_at)->timezone('Asia/Manila')->format('g:i A')}}</p>
            </td>

            <td>
              <div class="action-buttons d-flex gap-1">
              <a href="{{ route('admin.bookEdit', $book->id)}}" id="viewbtn" class="btn"
                style="background-color: #193c71; color: #fff; font-size: .9rem; padding: .4rem .6rem;"
                ><i class="bi bi-eye"></i>
              </a>
              
              {{-- Archive Modal --}}
              @includeIf('components.archiveBookModal')

            </td>
          </tr>
        @endforeach


        <tr>
          <td scope="row">{{ $book->accession_no }}</td>
          <td class="text-capitalize">{{ $book->title }}</td>
          <td class="text-capitalize">{{ $book->author }}</td>
          <td class="text-capitalize">
            <div class="pt-1 pb-1 pe-2 ps-2" style="background-color: rgba(5, 153, 5, 75%); width: fit-content; border-radius: 5%;">
              <p class="m-0" style="color: white; font-size: .9rem;">{{ $book->bookCopies()->where('status', 'available')->count() }}/{{ $book->total_copies }}</p>
            </div>
          </td>

          @if ($book->status === 'available')
          <td class="text-capitalize" style="color: green">{{ $book->status}}</td>
          @endif

          @if ($book->status === 'borrowed')
          <td class="text-capitalize" style="color: red">{{ $book->status}}</td>
          @endif

         <td>
            <p class="m-0">{{ \Carbon\Carbon::parse($book->created_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
            <p class="m-0" style="color: gray; font-size: .9rem;">{{ \Carbon\Carbon::parse($book->created_at)->timezone('Asia/Manila')->format('g:i A')}}</p>
         </td>
          
          {{-- @foreach ($book->bookCopies as $bookCopy)
          <td>{{ $bookCopy->copy_no}}</td>
          @endforeach --}}

          <td>
            <div class="action-buttons d-flex gap-1">
            <a href="{{ route('admin.bookEdit', $book->id)}}" id="viewbtn" class="btn"
              style="background-color: #193c71; color: #fff; font-size: .9rem; padding: .4rem .6rem;"
              ><i class="bi bi-eye"></i>
            </a>
            
            {{-- Archive Modal --}}
            @includeIf('components.archiveBookModal')

          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>
