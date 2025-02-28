<div class="notification_container container-lg p-0 position-relative"  style=" height: 40rem; background-color: #f9f9f9;">
    <div class="notification_container_subheader d-flex justify-content-between p-3 align-items-center">
        @if (Auth::user()->role === 'admin')
            <p class="m-0 fw-bold" style="font-size: .9rem;">{{$adminNotificationsCount}} Notifications</p>
        @endif

        @if (Auth::user()->role === 'staff')
            <p class="m-0 fw-bold" style="font-size: .9rem;">{{$staffNotificationsCount}} Notifications</p>
        @endif
    </div>

    @if (Auth::user()->role === 'admin')
        @foreach ($adminNotifications as $adminNotification)
            <div class="pt-2 pb-2 pe-3 ps-3 notification-content" style="width: 100%; border-bottom: 1px solid #e9e9e9; border-top: 1px solid #e9e9e9; ">
                <a href="{{ route('admin.notificationView' ,$adminNotification->id) }}" class="d-flex align-items-center gap-4">
                    
                    <img src="{{ asset($adminNotification->user->image_url ?? 'images/userProfile/default-user-profile-pic.jpg') }}" alt="user-img" style="border-radius: 50%; width: 32px; height: 32px;">

                    <div class="notification_description col" style="max-height: 4rem; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        <p class="m-0" style="font-size: .9rem; color: #000;">
                            {{ ucfirst($adminNotification->description) }}
                        </p>
                    </div>

                    
                    <p class="m-0" style="font-size: .9rem; color: rgb(110, 109, 109); font-weight: 500;">{{ \Carbon\Carbon::parse($adminNotification->created_at)->diffForHumans()}}</p>
                </a>
            </div>
        @endforeach

        <div class="pagination-container position-absolute bottom-0 w-100 pt-2 pb-2 ps-3 pe-3" >
            {{ $adminNotifications->links('pagination::bootstrap-5') }}
        </div>
    @endif


    @if (Auth::user()->role === 'staff')
        @foreach ($staffNotifications as $staffNotification)
            <div class=" pt-2 pb-2 pe-3 ps-3 notification-content" style="width: 100%; border-bottom: 1px solid #e9e9e9; border-top: 1px solid #e9e9e9;">
                <a href="{{ route('admin.notificationView', $staffNotification->id) }}" class="d-flex align-items-center gap-4">         

                    <img src="{{ asset($staffNotification->user->image_url ?? 'images/userProfile/default-user-profile-pic.jpg') }}" style="border-radius: 50%; width: 32px; height: 32px;">

                    <div class="notification_description col" style="max-height: 4rem; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        <p class="m-0" style="font-size: .9rem; color: #000;">
                            {{ ucfirst($staffNotification->description) }}
                        </p>
                    </div>
                    
                    <p class="m-0" style="font-size: .9rem; color: rgb(110, 109, 109); font-weight: 500;">{{ \Carbon\Carbon::parse($staffNotification->created_at)->diffForHumans()}}</p>
                </a>
            </div>
        @endforeach

        <div class="pagination-container position-absolute bottom-0 w-100  pt-2 pb-2 ps-3 pe-3">
            {{ $staffNotifications->links('pagination::bootstrap-5') }}
        </div>
    @endif

</div>


<style>
    .notification-content:hover {
        background-color: #e9e9e9 !important;
    }
</style>