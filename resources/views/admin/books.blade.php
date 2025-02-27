<x-admin-layout>
  <div class="row ms-2 pb-5 me-2 mb-3 table-container overflow-hidden" style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">
    @includeIf('components.admin.books.header')
    
    @includeIf('components.admin.books.table')
  </div>
</x-admin-layout>