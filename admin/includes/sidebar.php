<div id="sidebar" style="background-color:#080145"><a href="#" class="visible-phone"><i class="fas fa-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><span>Manage Members</span> <span class="label label-important"><?php include 'dashboard-usercount.php';?> </span></a>
      <ul>
        <li class="<?php if($page=='members'){ echo 'active'; }?>"><a href="members.php">List All Members</a></li>
        <li class="<?php if($page=='members-entry'){ echo 'active'; }?>"><a href="member-entry.php"> Member Entry Form</a></li>
        <li class="<?php if($page=='members-remove'){ echo 'active'; }?>"><a href="remove-member.php"> Remove Member</a></li>
        <li class="<?php if($page=='members-update'){ echo 'active'; }?>"><a href="edit-member.php"> Update Member Details</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><span>Gym Equipment</span> <span class="label label-important"><?php include 'dashboard-equipcount.php';?> </span></a>
    <ul>
        <li class="<?php if($page=='list-equip'){ echo 'active'; }?>"><a href="equipment.php"> List Gym Equipment</a></li>
        <li class="<?php if($page=='add-equip'){ echo 'active'; }?>"><a href="equipment-entry.php"> Add Equipment</a></li>
        <li class="<?php if($page=='remove-equip'){ echo 'active'; }?>"><a href="remove-equipment.php"> Remove Equipment</a></li>
        <li class="<?php if($page=='update-equip'){ echo 'active'; }?>"><a href="edit-equipment.php"> Update Equipment Details</a></li>
      </ul>
    </li>
    <li class="<?php if($page=='attendance'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><span>Attendance</span></a>
      <ul>
        <li class="<?php if($page=='attendance'){ echo 'active'; }?>"><a href="attendance.php"> Check In/Out</a></li>
          <li class="<?php if($page=='view-attendance'){ echo 'active'; }?>"><a href="view-attendance.php"> View</a></li>
        </ul>
      </li>


    
    
    <li class="<?php if($page=='manage-customer-progress'){ echo 'active'; }?>"><a href="customer-progress.php"><span>Manage Customer Progress</span></a></li>
    <li class="<?php if($page=='member-status'){ echo 'active'; }?>"><a href="member-status.php"><span>Member's Status</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"><span>Payments</span></a></li>
    <li class="<?php if($page=='staff-management'){ echo 'active'; }?>"><a href="staffs.php"><span>Staff Management</span></a></li>
    <li class="submenu"> <a href="#"><span>Reports</span></a>
    <ul>
        <li class="<?php if($page=='chart'){ echo 'active'; }?>"><a href="reports.php"> Chart Representation</a></li>
        <li class="<?php if($page=='member-repo'){ echo 'active'; }?>"><a href="members-report.php"> Members Report</a></li>
        <li class="<?php if($page=='c-p-r'){ echo 'active'; }?>"><a href="progress-report.php"> Customer Progress Report</a></li>
      </ul>
    </li>
  </ul>
</div>