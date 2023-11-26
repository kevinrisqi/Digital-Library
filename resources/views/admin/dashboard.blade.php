<!-- resources/views/admin/dashboard.blade.php -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <p>Welcome to the Admin Dashboard, {{ Auth::guard('admin')->user()->name }}!</p>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <p><a href="{{ route('admin.create') }}">Create a new admin</a></p>
                    <p><a href="{{ route('admin.index') }}">View admin list</a></p>
                </div>
            </div>
        </div>
    </div>
</div>