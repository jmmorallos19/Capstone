<x-admin-layout>
  <div class="row ms-2 pb-5 me-2 table-container overflow-hidden" style="height: 48rem !important; min-height: 48rem !important; max-height: 48rem !important;">
    @includeIf('components.admin.books.header')
    
    @includeIf('components.admin.books.table')
  </div>
</x-admin-layout>