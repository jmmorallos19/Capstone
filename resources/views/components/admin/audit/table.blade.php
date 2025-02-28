<div class="w-100 overflow-y-auto overflow-x-hidden p-4 pt-0" style="height: fit-content; max-height: 90%; background-color: 1px solid #000;">
    <table class="table" id="auditLogtable" style=" table-layout: fixed;">
      <thead class="position-sticky top-0" style="background-color: #fff; z-index: 1;">
        <tr>
          <th class="fw-normal" scope="col">User</th>
          <th class="fw-normal" scope="col">Action</th>
          <th class="fw-normal" scope="col">Type</th>
          <th class="fw-normal" scope="col">Description</th>
          <th class="fw-normal" scope="col">Timestamp</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($auditLogs as $log)
        <tr>
          <td>
            <p class="m-0 text-capitalize" style="font-size: .9rem">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname}}</p>
            <p class="m-0 text-uppercase" style="font-size: .8rem; color: gray;">{{ Auth::user()->role }}</p>
          </td>

          @if ($log->action === 'Create' || $log->action === 'Login' || $log->action === 'Lend' || $log->action === 'Activate' || $log->action === 'Restore')
            <td class="text-capitalize" style="white-space: pre-wrap; font-weight: 500; color: green;">{{ $log->action }}</td>
          @endif

          @if ($log->action === 'Update' || $log->action === 'Return')
            <td class="text-capitalize" style="white-space: pre-wrap; font-weight: 500; color: blue;">{{ $log->action }}</td>
          @endif

          @if ($log->action === 'Delete' || $log->action === 'Archive' || $log->action === 'Logout' || $log->action === 'Deactivate')
            <td class="text-capitalize" style="white-space: pre-wrap; font-weight: 500; color: red;">{{ $log->action }}</td>
          @endif

          <td class="text-capitalize" style="white-space: pre-wrap;">{{ $log->type }}</td>
          <td  style="white-space: pre-wrap;">{{ ucfirst($log->activity_description) }}</td>
          <td>
              <p class="m-0">{{ \Carbon\Carbon::parse($log->created_at)->timezone('Asia/Manila')->format('d M Y')}}</p>
              <p class="m-0" style="color: gray; font-size: .9rem;">{{ \Carbon\Carbon::parse($log->created_at)->timezone('Asia/Manila')->format('g:i A')}}</p>
          </td>
        </tr>
        @endforeach
  
      </tbody>
    </table>
   </div>