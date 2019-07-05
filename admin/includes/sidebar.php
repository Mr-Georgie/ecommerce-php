<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
        <!--<img id="logo" src="" alt="Logo"/>-->
    </a> </div>
    <div class="menu">
      <ul id="menu" >
        <li id="menu-home" ><a href="index.php?dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
        <li><a href="#"><i class="fa fa-tag"></i><span>Products</span><span class="fa fa-angle-right" style="float: right"></span></a>
          <ul>
            <li><a href="index.php?insert_products">Insert Products</a></li>
            <li><a href="index.php?view_products">View Products</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-edit"></i><span>Products Categories</span><span class="fa fa-angle-right" style="float: right"></span></a>
          <ul>
            <li><a href="index.php?insert_p_cats">Insert Product Category</a></li>
            <li><a href="index.php?view_p_cats">View Product Category</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-pencil"></i><span>Categories</span><span class="fa fa-angle-right" style="float: right"></span></a>
          <ul>
            <li><a href="index.php?insert_cats">Insert Category</a></li>
            <li><a href="index.php?view_cats">View Categories</a></li>
          </ul>
        </li>
        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Slides</span><span class="fa fa-angle-right" style="float: right"></span></a>
          <ul id="menu-academico-sub" >
             <li id="menu-academico-boletim" ><a href="index.php?insert_slides"> Insert Slides</a></li>
            <li id="menu-academico-avaliacoes" ><a href="index.php?view_slides"> View Slides</a></li>
          </ul>
        </li>

        <li><a href="index.php?view_customers"><i class="fa fa-users"></i><span>View Customers</span></a></li>
        <li><a href="index.php?view_orders"><i class="fa fa-book"></i><span>View Orders</span></a></li>
        <li><a href="index.php?view_payment"><i class="fa fa-money"></i><span>View Payments</span></a></li>
        <li><a href="#"><i class="fa fa-user"></i><span>Users</span><span class="fa fa-angle-right" style="float: right"></span></a>
           <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="index.php?insert_user">Insert User</a></li>
              <li id="menu-academico-boletim" ><a href="index.php?view_users">View Users</a></li>
              <li id="menu-academico-boletim" ><a href="index.php?user_profile=<?php echo $admin_id; ?>">Edit User Profile</a></li>
             </ul>
        </li>
      </ul>
    </div>
</div>
