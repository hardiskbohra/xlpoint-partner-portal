<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/html/ltr/vertical-menu-template/index.html">
                    <div class="brand-logo"><img width="35px" src="/app-assets/images/logo/xlpoint-box-logo-white-bg.png"/></div>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                    <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class="navigation-header">
                <span>Partner Portal Management</span>
            </li>
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="User" style="color:white;">Dashboard</span></a>
            </li>
            <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
                <a href="/users"><i class="menu-livicon" data-icon="user"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Users</span></a>
            </li>
            <li class="nav-item {{ request()->is('partners') ? 'active' : '' }}">
                <a href="/partners"><i class="menu-livicon" data-icon="unlock"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Partners</span></a>
            </li>
            <li class="nav-item {{ request()->is('customers') ? 'active' : '' }}">
                <a href="/customers"><i class="menu-livicon" data-icon="list"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Customers</span></a>
            </li>
            <li class="nav-item {{ request()->is('transactions') ? 'active' : '' }}">
                <a href="/transactions"><i class="menu-livicon" data-icon="notebook"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Transactions</span></a>
            </li>
            <li class="nav-item {{ request()->is('transactions') ? 'active' : '' }}">
                <a href="/transactions"><i class="menu-livicon" data-icon="settings"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Settings</span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class="navigation-header">
                <span>CRM</span>
            </li>
            <li class="nav-item">
                <a href="#"><i class="menu-livicon" data-icon="notebook"></i><span class="menu-title" data-i18n="Invoice" style="color:white;">Leads</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List" style="color:white;">Contacts</span></a>
                    </li>
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Invoice" style="color:white;">Accounts</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->is('customers') ? 'active' : '' }}">
                <a href="/customers"><i class="menu-livicon" data-icon="lock"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Deals</span></a>
            </li>
            <li class="nav-item {{ request()->is('transactions') ? 'active' : '' }}">
                <a href="/transactions"><i class="menu-livicon" data-icon="notebook"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Tasks</span></a>
            </li>
            <li class="nav-item {{ request()->is('transactions') ? 'active' : '' }}">
                <a href="/transactions"><i class="menu-livicon" data-icon="settings"></i><span class="menu-title" data-i18n="Partner" style="color:white;">Settings</span></a>
            </li>
        </ul>
    </div>
</div>
