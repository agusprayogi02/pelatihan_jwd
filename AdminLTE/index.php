<?php  
$title = "JWD B";

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $title = $page;

  include 'heading.php';
  if($page !== ""){
    include $page.'.php';
  }else{
    include 'dataBuku.php';  
  }
}else{
  include 'dataBuku.php';
}


include 'footer.php';
?>