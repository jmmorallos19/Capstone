<x-admin-layout>
    <div class="ms-2 pb-2 me-2 mb-3 table-container overflow-hidden"
        style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">

        {{-- Header --}}
        @includeIf('components.admin.manageAccount.header')

        {{-- Account table --}}
        @includeIf('components.admin.manageAccount.table')
        
    </div>
</x-admin-layout>