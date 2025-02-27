<x-admin-layout>
    <div class="ms-2 pb-2 me-2 mb-3 table-container"
    style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">

        @includeIf('components.admin.bookEdit.header')

        {{-- Book Details Components --}}
        @includeIf('components.admin.bookEdit.bookDetails')
        
        {{-- Book Copy Table Components --}}
        @includeIf('components.admin.bookEdit.table')

        
    </div>
</x-admin-layout>