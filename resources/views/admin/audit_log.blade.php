<x-admin-layout>
    <div class="ms-2 pb-5 me-2 mb-3 table-container overflow-hidden" style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">
      @includeIf('components.admin.audit.header')
      
      @includeIf('components.admin.audit.table')
    </div>
  </x-admin-layout>