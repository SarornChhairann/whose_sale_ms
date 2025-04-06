<!-- Add this style in your layout (e.g., in <head> section of master layout) -->
<style>
    .sidebar-menu > li.active > a {
        background-color: #00a65a !important;
        color: #fff !important;
    }
    .sidebar-menu > li.active > a i {
        color: #fff !important;
    }
</style>

<!-- Sidebar Menu -->
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ __('title.online') }}</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('title.dashboard') }}</span>
                </a>
            </li>

            @if (auth()->user()->level == 1)
                <li class="header">{{ __('title.master') }}</li>
                <li class="{{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}">
                        <i class="fa fa-cube"></i> <span>{{ __('title.category') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('produk.index') ? 'active' : '' }}">
                    <a href="{{ route('produk.index') }}">
                        <i class="fa fa-cubes"></i> <span>{{ __('title.product') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.index') ? 'active' : '' }}">
                    <a href="{{ route('member.index') }}">
                        <i class="fa fa-id-card"></i> <span>{{ __('title.member') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('supplier.index') ? 'active' : '' }}">
                    <a href="{{ route('supplier.index') }}">
                        <i class="fa fa-truck"></i> <span>{{ __('title.supplier') }}</span>
                    </a>
                </li>

                <li class="header">{{ __('title.transaction') }}</li>
                <li class="{{ request()->routeIs('pengeluaran.index') ? 'active' : '' }}">
                    <a href="{{ route('pengeluaran.index') }}">
                        <i class="fa fa-money"></i> <span>{{ __('title.expense') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('pembelian.index') ? 'active' : '' }}">
                    <a href="{{ route('pembelian.index') }}">
                        <i class="fa fa-download"></i> <span>{{ __('title.purchase') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('penjualan.index') ? 'active' : '' }}">
                    <a href="{{ route('penjualan.index') }}">
                        <i class="fa fa-dollar"></i> <span>{{ __('title.sales') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                    <a href="{{ route('transaksi.baru') }}">
                        <i class="fa fa-cart-plus"></i> <span>{{ __('title.new_transaction') }}</span>
                    </a>
                </li>

                <li class="header">{{ __('title.report') }}</li>
                <li class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}">
                        <i class="fa fa-file-pdf-o"></i> <span>{{ __('title.report') }}</span>
                    </a>
                </li>

                <li class="header">{{ __('title.system') }}</li>
                <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <i class="fa fa-users"></i> <span>{{ __('title.user') }}</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('setting.index') ? 'active' : '' }}">
                    <a href="{{ route('setting.index') }}">
                        <i class="fa fa-cogs"></i> <span>{{ __('title.setting') }}</span>
                    </a>
                </li>
            @else
                <li class="{{ request()->routeIs('transaksi.baru') ? 'active' : '' }}">
                    <a href="{{ route('transaksi.baru') }}">
                        <i class="fa fa-cart-plus"></i> <span>{{ __('title.new_transaction') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
</aside>
