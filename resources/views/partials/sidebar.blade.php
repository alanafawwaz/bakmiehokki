<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('images/logo.png') }}" alt="" width="150">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Xiehokki</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    @if(auth()->user()->role=="admin") @php $user="admin" @endphp
    @elseif(auth()->user()->role=="pegawai") @php $user="pegawai" @endphp
    @endif

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ 'dashboard' == request()->path() ? 'active' : ''}}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle" style="font-size: 1.3rem"></i>
                <div data-i18n="Analytics"  style="font-size: 1.3rem">Home</div>
            </a>
        </li>
        <li class="menu-item {{ $user.'/hadir' == request()->path() ? 'active' : ''}}">
            <a href="/{{ auth()->user()->role == 'admin' ? 'admin' : 'pegawai' }}/hadir" class="menu-link">
                <i class="menu-icon tf-icons bx bx-notepad" style="font-size: 1.3rem"></i>
                <div data-i18n="Analytics"  style="font-size: 1.3rem">Hadir</div>
            </a>
        </li>
        <li class="menu-item {{  $user.'/shift' == request()->path() ? 'active' : ''}}">
            <a href="/{{ auth()->user()->role == 'admin' ? 'admin' : 'pegawai' }}/shift" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar" style="font-size: 1.3rem"></i>
                <div data-i18n="Analytics"  style="font-size: 1.3rem">Shift</div>
            </a>
        </li>
        <li class="menu-item {{  $user.'/izin' == request()->path() ? 'active' : ''}}">
            <a href="/{{ auth()->user()->role == 'admin' ? 'admin' : 'pegawai' }}/izin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope" style="font-size: 1.3rem"></i>
                <div data-i18n="Analytics"  style="font-size: 1.3rem">Izin</div>
            </a>
        </li>
        <li class="menu-item {{  $user.'/stock' == request()->path() ? 'active' : ''}}">
            <a href="/{{ auth()->user()->role == 'admin' ? 'admin' : 'pegawai' }}/stock" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package" style="font-size: 1.3rem"></i>
                <div data-i18n="Analytics"  style="font-size: 1.3rem">Stock</div>
            </a>
        </li>

        @if (auth()->user()->role == 'admin')
            <li class="menu-item {{ 'admin/pegawai' == request()->path() ? 'active' : ''}}">
                <a href="/admin/pegawai" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user" style="font-size: 1.3rem"></i>
                    <div data-i18n="Analytics" style="font-size: 1.3rem">Pegawai</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
