<!--sidebar-menu-->
<div id="sidebar" style="background-color:#080145"><a href="#" class="visible-phone" style="background-color:#080145"><i class="icon icon-home"></i> Dashboard</a>
  <ul style="background-color:#080145">
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>" style="background-color:#080145"><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if($page=='member'){ echo 'submenu active'; } else { echo 'submenu';}?>" style="background-color:#080145"> <a href="#"><i class="icon icon-group"></i> <span>Manage Members</span></a>
      <ul style="background-color:#080145">
        <li style="background-color:#080145"><a href="members.php">List All Members</a></li>
        <li style="background-color:#080145"><a href="member-entry.php">Member Entry Form</a></li>
        <li style="background-color:#080145"><a href="remove-member.php">Remove Member</a></li>
        <li style="background-color:#080145"><a href="edit-member.php">Update Member Details</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='equipment'){ echo 'submenu active'; } else { echo 'submenu';}?>" style="background-color:#080145"> <a href="#"><i class="icon icon-cogs"></i> <span>Gym Equipment</span> </a>
      <ul>
        <li style="background-color:#080145"><a href="equipment.php">List Gym Equipment</a></li>
        <li style="background-color:#080145" ><a href="equipment-entry.php">Add Equipment</a></li>
        <li style="background-color:#080145"><a href="remove-equipment.php">Remove Equipment</a></li>
        <li style="background-color:#080145"><a href="edit-equipment.php">Update Equipment Details</a></li>
      </ul>
    </li>
    <li class="<?php if($page=='membersts'){ echo 'active'; }?>" style="background-color:#080145"><a href="member-status.php" style="background-color:#080145"><i class="icon icon-eye-open"></i> <span>Member's Status</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>" style="background-color:#080145"><a href="payment.php" style="background-color:#080145"><i class="icon icon-money"></i> <span>Payments</span></a></li>
    <li class="<?php if($page=='attendance'){ echo 'active'; }?>" style="background-color:#080145"><a href="attendance.php" style="background-color:#080145"><i class="icon icon-calendar"></i> <span>Manage Attendance</span></a></li>

  </ul>
</div>
<!--sidebar-menu-->