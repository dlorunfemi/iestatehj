<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('global.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('images/'.auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.home') }}" class="d-block display-6 text-left">{{ Auth::user()->name  }}</a>
                <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
            </div>
          </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                      <i class="fas fa-tachometer-alt">

                      </i>
                        <p>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('landlord_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.landlords.index") }}" class="nav-link {{ request()->is('admin/landlords') || request()->is('admin/landlords/*') ? 'active' : '' }}">
                            <i class="fas fa-user-shield">

                            </i>
                            <p>
                                <span>{{ trans('global.landlord.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('tenant_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.tenants.index") }}" class="nav-link {{ request()->is('admin/tenants') || request()->is('admin/tenants/*') ? 'active' : '' }}">
                            <i class="fas fa-user-tag">

                            </i>
                            <p>
                                <span>{{ trans('global.tenant.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('property_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/property-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/property-tags*') ? 'menu-open' : '' }} {{ request()->is('admin/properties*') ? 'menu-open' : '' }} {{ request()->is('admin/vacancies*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-building">

                            </i>
                            <p>
                                <span>{{ trans('global.propertyManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('property_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.property-categories.index") }}" class="nav-link {{ request()->is('admin/property-categories') || request()->is('admin/property-categories/*') ? 'active' : '' }}">
                                        <i class="far fa-circle">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.propertyCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('property_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.property-tags.index") }}" class="nav-link {{ request()->is('admin/property-tags') || request()->is('admin/property-tags/*') ? 'active' : '' }}">
                                        <i class="far fa-circle">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.propertyTag.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('property_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.properties.index") }}" class="nav-link {{ request()->is('admin/properties') || request()->is('admin/properties/*') ? 'active' : '' }}">
                                        <i class="far fa-circle">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.property.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vacancy_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vacancies.index") }}" class="nav-link {{ request()->is('admin/vacancies') || request()->is('admin/vacancies/*') ? 'active' : '' }}">
                                        <i class="far fa-circle">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.vacancy.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payment_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is('admin/payments') || request()->is('admin/payments/*') ? 'active' : '' }}">
                            <i class="fas fa-money-bill-wave">

                            </i>
                            <p>
                                <span>{{ trans('global.payment.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('receipt_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.receipts.index") }}" class="nav-link {{ request()->is('admin/receipts') || request()->is('admin/receipts/*') ? 'active' : '' }}">
                            <i class="fas fa-receipt">

                            </i>
                            <p>
                                <span>{{ trans('global.receipt.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('requistion_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.requistions.index") }}" class="nav-link {{ request()->is('admin/requistions') || request()->is('admin/requistions/*') ? 'active' : '' }}">
                            <i class="fas fa-donate">

                            </i>
                            <p>
                                <span>{{ trans('global.requistion.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('expense_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/expense-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/income-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/expenses*') ? 'menu-open' : '' }} {{ request()->is('admin/incomes*') ? 'menu-open' : '' }} {{ request()->is('admin/expense-reports*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-shopping-cart">

                            </i>
                            <p>
                                <span>{{ trans('global.expenseManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('expense_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-categories.index") }}" class="nav-link {{ request()->is('admin/expense-categories') || request()->is('admin/expense-categories/*') ? 'active' : '' }}">
                                        <i class="fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.expenseCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-categories.index") }}" class="nav-link {{ request()->is('admin/income-categories') || request()->is('admin/income-categories/*') ? 'active' : '' }}">
                                        <i class="fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.incomeCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is('admin/expenses') || request()->is('admin/expenses/*') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.expense.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is('admin/incomes') || request()->is('admin/incomes/*') ? 'active' : '' }}">
                                        <i class="fas fa-arrow-circle-right">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.income.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-reports.index") }}" class="nav-link {{ request()->is('admin/expense-reports') || request()->is('admin/expense-reports/*') ? 'active' : '' }}">
                                        <i class="fas fa-line-chart">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.expenseReport.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('message_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.messages.index") }}" class="nav-link {{ request()->is('admin/messages') || request()->is('admin/messages/*') ? 'active' : '' }}">
                            <i class="fas fa-comments">

                            </i>
                            <p>
                                <span>{{ trans('global.message.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('email_acces')
                    <li class="nav-item">
                        <a href="{{ route("admin.emails.index") }}" class="nav-link {{ request()->is('admin/emails') || request()->is('admin/emails/*') ? 'active' : '' }}">
                            <i class="fas fa-envelope">

                            </i>
                            <p>
                                <span>{{ trans('global.email.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('report_acces')
                    <li class="nav-item">
                        <a href="{{ route("admin.reports.index") }}" class="nav-link {{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt">

                            </i>
                            <p>
                                <span>{{ trans('global.report.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('global.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
