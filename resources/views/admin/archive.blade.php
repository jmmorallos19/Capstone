<x-admin-layout>
    <div class="ms-2 pb-2 me-2 mb-3 table-container overflow-hidden"
        style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">

        {{-- Header --}}
        @includeIf('components.admin.archive.header')

        {{-- Archive Table --}}
        @includeIf('components.admin.archive.table')
        
    </div>
</x-admin-layout>