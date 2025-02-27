<x-admin-layout>
    <div class="ms-2 pb-5 me-2 mb-3 table-container"
        style="height: 82vh !important; min-height: 82vh !important; max-height: 82vh !important;">

        {{-- Member Details Components --}}
        @includeIf('components.admin.staffEdit.header')

        {{-- Member Details Components --}}
        @includeIf('components.admin.staffEdit.staffDetails')

    </div>
</x-admin-layout>