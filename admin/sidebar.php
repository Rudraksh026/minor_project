<?php
echo '
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="adminIndex.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a> 
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#" data-bs-collapse="false">
      <i class="bi bi-menu-button-wide"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="services-nav" class="nav-content collapse  " data-bs-parent="#sidebar-nav">
    <li>
    <a href="list.php">
      <i class="bi bi-circle"></i><span>All List</span>
    </a>
  </li>
    <li>
    <a href="inList.php">
      <i class="bi bi-circle"></i><span>Inactive List</span>
    </a>
  </li>
  <li>
    <a href="acList.php">
      <i class="bi bi-circle"></i><span>Active List</span>
    </a>
  </li>
    </ul>
  </li>
  
  
  
</ul>

</aside>';
?>