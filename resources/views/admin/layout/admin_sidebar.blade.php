<!-- partial:partials/_settings-panel.html -->
<div class="theme-setting-wrapper">
  <div id="settings-trigger"><i class="ti-settings"></i></div>
  <div id="theme-settings" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <p class="settings-heading">SIDEBAR SKINS</p>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
    <p class="settings-heading mt-2">HEADER SKINS</p>
    <div class="color-tiles mx-0 px-4">
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
    </div>
  </div>
</div>
<div id="right-sidebar" class="settings-panel">
  <i class="settings-close ti-close"></i>
  <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
    </li>
  </ul>
  <div class="tab-content" id="setting-content">
    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
      <div class="add-items d-flex px-3 mb-0">
        <form class="form w-100">
          <div class="form-group d-flex">
            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
          </div>
        </form>
      </div>
      <div class="list-wrapper px-3">
        <ul class="d-flex flex-column-reverse todo-list">
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Team review meeting at 3.00 PM
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Prepare for presentation
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Resolve all the low priority tickets due today
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Schedule meeting for next week
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Project review
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
        </ul>
      </div>
      <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2">
          <i class="ti-control-record text-primary mr-2"></i>
          <span>Feb 11 2018</span>
        </div>
        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
        <p class="text-gray mb-0">The total number of sessions</p>
      </div>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2">
          <i class="ti-control-record text-primary mr-2"></i>
          <span>Feb 7 2018</span>
        </div>
        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
        <p class="text-gray mb-0 ">Call Sarah Graves</p>
      </div>
    </div>
    <!-- To do section tab ends -->
    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
      <div class="d-flex align-items-center justify-content-between border-bottom">
        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
      </div>
      <ul class="chat-list">
        <li class="list active">
          <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Thomas Douglas</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">19 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
          <div class="info">
            <div class="wrapper d-flex">
              <p>Catherine</p>
            </div>
            <p>Away</p>
          </div>
          <div class="badge badge-success badge-pill my-auto mx-2">4</div>
          <small class="text-muted my-auto">23 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Daniel Russell</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">14 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
          <div class="info">
            <p>James Richardson</p>
            <p>Away</p>
          </div>
          <small class="text-muted my-auto">2 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Madeline Kennedy</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">5 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Sarah Graves</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">47 min</small>
        </li>
      </ul>
    </div>
    <!-- chat tab ends -->
  </div>
</div>
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @if (auth('admin')->user()->type =='vendor')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="ti-settings menu-icon"></i>
          <span class="menu-title">Vendor Details</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.update.vendor.details','personal')}}">Personal Details</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.update.vendor.details','business')}}">Business Details</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.update.vendor.details','bank')}}">Bank Details</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-section" aria-expanded="false" aria-controls="ui-section">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Catelogue</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-section">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.coupons')}}">Cupons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Orders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-orders">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders')}}">Orders</a></li>
          </ul>
        </div>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
          <i class="ti-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-setting">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.update.admin.password')}}">Update Password</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.update.admin.details')}}">Update Details</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-admin-all" aria-expanded="false" aria-controls="ui-admin-all">
          <i class="ti-settings menu-icon"></i>
          <span class="menu-title">Admin Managment</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-admin-all">
          <ul class="nav flex-column sub-menu">
            {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.view.admins','admin')}}">Admins</a></li> --}}
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.view.admins','admin')}}">Admin</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.view.admins','vendor')}}">Vendor</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.view.admins')}}">All</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item  
        @if(Session::get('page')=='catelogue') 
          active @php $expand='true'; $collapse= 'collapse'; $show= 'show'; @endphp  
        @else    
          @php $expand='false'; $collapse=''; $show= ''; @endphp  
        @endif">
        <a class="nav-link {{$collapse}}" data-toggle="collapse" href="#ui-section" aria-expanded="{{$expand}}" aria-controls="ui-section">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Catelogue {{Session::get('page')}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{$show}}" id="ui-section">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.sections')}}">Section</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.categories')}}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.brands')}}">Brand</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.coupons')}}">Cupons</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.filters')}}">Filters</a></li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">User Managment</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-user">
          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users')}}">Users</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.subscribers')}}">Subscribers</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-banner" aria-expanded="false" aria-controls="ui-banner">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Banner Managment</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-banner">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.banners')}}">Silder Banners</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Orders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-orders">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders')}}">Orders</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Shipping Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-shipping">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.shipping')}}">Shipping Charges</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-rating" aria-expanded="false" aria-controls="ui-rating">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Rating Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-rating">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.ratings')}}">Rating Charges</a></li>
          </ul>
        </div>
      </li>
    @endif
  </ul>
</nav>