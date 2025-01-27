<x-admin-layout>
    <div class="row ms-2 pb-5 me-2 table-container overflow-hidden" style="height: 80vh !important; min-height: 80vh !important; max-height: 80vh !important;">
      @includeIf('components.admin.members.header')
      
      @includeIf('components.admin.members.table')
    </div>
  </x-admin-layout>