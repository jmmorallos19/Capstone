<x-admin-layout>
    <div class="ms-2 pb-2 me-2 mb-3 table-container"
    style="height: fit-content  !important; min-height: 82vh !important; max-height: fit-content !important;">
        {{-- Member Details Components --}}
        @includeIf('components.admin.memberEdit.header')

        {{-- Member Details Components --}}
        @includeIf('components.admin.memberEdit.memberDetailsTab')
    </div>
</x-admin-layout>