
      <aside class="main-sidebar">
        <section class="sidebar">

          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>

            <li class="active">
              <a href="{{ route('home') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="active">
              <a href="{{ route('categories.index') }}">
                <i class="fa fa-dashboard"></i> <span>Categories</span>
              </a>
            </li>

            <li>
              <a href="{{ route('donations.index') }}">
                <i class="fa fa-inbox"></i> <span>Donations Center</span>
              </a>
            </li>


            <li>
              <a href="{{ route('partners.index') }}">
                <i class="fa fa-files-o"></i> <span>Partners</span>
              </a>
            </li>

            <li>
              <a href="{{ route('users.index') }}">
                <i class="fa fa-user"></i> <span>Users</span>
              </a>
            </li>

          </ul>
        </section>
      </aside>
