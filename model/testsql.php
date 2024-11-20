  <?php
  
  //   include_once "/laragon/www/project_akhir/init.php";
  include_once "/laragon/www/project_akhir/model/dbConnect.php";
  include_once "/laragon/www/project_akhir/model/modelMemberSql.php";

  $modelMember = new modelMember();
  
  $obj_members = $modelMember->getAllMembers();
  var_dump($obj_members);
  
  foreach ($obj_members as $member) {
      echo "ID: " . $member->id . "<br>";
      echo "Name: " . $member->name . "<br>";
      echo "Password: " . $member->password . "<br>";
      echo "Phone: " . $member->phone . "<br>";
      echo "Point: " . $member->point . "<br>";
      echo "-----------------------<br>";
  }
  
  ?>