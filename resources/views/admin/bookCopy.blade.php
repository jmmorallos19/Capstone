<x-admin-layout>
    <div class="ms-2 pb-5 me-2 mb-3 table-container" style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;"> 
        @includeIf('components.admin.bookCopy.header')

        {{-- Book Details Components --}}
        @includeIf('components.admin.bookCopy.bookDetails')
    </div>
</x-admin-layout>