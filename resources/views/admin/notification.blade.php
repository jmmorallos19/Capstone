<x-admin-layout>
    <div class="ms-2 pb-2 me-2 mb-3 table-container"
        style="height: fit-content !important; min-height: 82vh !important; max-height: fit-content !important;">
        {{-- Notification Header --}}
        @includeIf('components.notification_component.header')

        {{-- Notification Container --}}
        @includeIf('components.notification_component.notification_container')

    </div> 
</x-admin-layout>

