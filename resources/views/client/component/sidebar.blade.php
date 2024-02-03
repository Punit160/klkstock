

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group mt-2" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                
                    <li class="nav-item">
                        <a href="./index.html" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Ajustment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-product')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Adjustment List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-product-category')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-product-type')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Print Barcode Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-product')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Product List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Stock Count</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Purchase
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a  href="{{route('add-purchase')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Purchase</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Import Purchase By CSV</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a  href="{{route('view-purchase')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Purchase List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-truck-loading"></i>
                            <p>Sale<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Sale</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Coupon List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Courier List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Delivery List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Gift Card List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Import Sale By CSV</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>POS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Sale List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Expense
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('view-expense-category')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Expense Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-expense')}}"  class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Expense List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>
                            Quotation
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Quotation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Quotation list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exchange"></i>
                        <p>
                            Transfer
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Transfer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Import Transfer By CSV</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Transfer list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-share"></i>
                        <p>
                            Return
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Purchase</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Sale</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-dollar"></i>
                            <p>Accounting<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Account List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Account Statement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Account</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Balance Sheet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Money Transfer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            HRM
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Attendance</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-department')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Department</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-employee')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Employee</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-holiday')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Holiday</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Payroll</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            People
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('add-biller')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Biller</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a  href="{{route('add-supplier')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add Supplier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-user')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Add User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-biller')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Biller List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-supplier')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Supplier List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-user')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>User List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Best Seller</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Customer Due Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Customer Group Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Customer Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Daily Purchase</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Daily Sale</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Daily Sale Objective Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Monthly Purchase</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Monthly Sale</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Payment Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Product Expiry Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Product Quantity Alert</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Product Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Purchase Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Sale Due Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Sale Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Sale Report chart</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Summery Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Supplier Due Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Supplier Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>User Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Warehouse Stock Chart</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Warehouse Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>All Notifications</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-brand')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Brand</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Create SMS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-currency')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Currency</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Custom Field List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-customerGroup')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i> 
                                <p>Customer Group</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-discount')}}" class="nav-link">  
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Discount</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-general')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>General Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-hrmSetting')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>  
                                <p>HRM Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Mail Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>POS Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-reward-point')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i> 
                                <p>Reward Point Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-role')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Role Permission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Send Notification</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>SMS Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-tax')}}" class="nav-link"> 
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Tax</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-unit')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Unit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>User Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('view-warehouse')}}" class="nav-link">
                                <i class="fas fa-arrow-right nav-icon" style="font-size: small;"></i>
                                <p>Warehouse</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
