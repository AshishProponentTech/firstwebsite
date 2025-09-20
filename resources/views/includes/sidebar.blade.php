<div class="sidebar">
    <h3>Admin Panel</h3>
    <ul class="sidebar-menu">
        <li><a href="#">Manage Header</a></li>
        <li><a href="#">Manage Footer</a></li>
        <li><a href="#">Contact Details</a></li>
        <li class="has-dropdown">
            <span>Courses Page</span>
            <ul class="dropdown">
                <li><a href="{{ route('admin.course-pages.index') }}">View All Course Pages</a></li>
                <li><a href="{{ route('admin.add-course') }}">Add New Course Page</a></li>
            </ul>
        </li>
        <li class="has-dropdown">
            <span>Enquires</span>
            <ul class="dropdown">
                <li><a href="">View All Enquires</a></li>
                <li><a href="">Mail Settings</a></li>
            </ul>
        </li>
        <li class="has-dropdown">
            <span>Others</span>
            <ul class="dropdown">
                <li><a href="">Teachers</a></li>
                <li><a href="">Faqs</a></li>
                <li><a href="">Gallery</a></li>
            </ul>
        </li>
        <li><a href="#">Social Links</a></li>
    </ul>
    <!-- Logout Form -->
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button class="logout-btn" type="submit">Logout</button>
    </form>
</div>
