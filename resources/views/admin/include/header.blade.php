<div class="kt-header__topbar">
	<div class="kt-header__topbar-item kt-header__topbar-item--user">
		<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
			<div class="kt-header__topbar-user">
				<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
				<span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</span>
				<img class="kt-hidden" alt="Pic" src="{{asset('admin/assets/media/users/300_25.jpg')}}" />
			</div>
		</div>
		<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
			<div class="kt-notification">
				<a href="{{route('admin.profile.edit')}}" class="kt-notification__item">
					<div class="kt-notification__item-icon">
						<i class="flaticon2-calendar-3 kt-font-success"></i>
					</div>
					<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
							My Profile
						</div>
					</div>
				</a>
				<a href="{{route('admin.password.index')}}" class="kt-notification__item">
					<div class="kt-notification__item-icon">
						<i class="flaticon2-calendar-3 kt-font-success"></i>
					</div>
					<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
							Change Password
						</div>
					</div>
				</a>
				<div class="kt-notification__custom">
					<a href="{{route('admin.logout.index')}}"class="btn btn-label-brand btn-sm btn-bold">Logout</a>
				</div>
			</div>
		</div>
	</div>
</div>