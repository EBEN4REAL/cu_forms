<?php
$connect = mysqli_connect("localhost","igbinobaebenezer@gmail.com","mycountry","medical_app");

if (isset($_POST['query'])) {
    # code...
    $output = '';
    $query = "SELECT * FROM  user WHERE first_name  LIKE  '%".$_POST["query"]."%' ";
    $result = mysqli_query($connect , $query);
    $output = '<ul class="list-unstyled">';
    if (mysqli_num_rows($result) == 1) {
        # code...
        while ($row = mysqli_fetch_array($result)) {
            # code...

            $output .= "<li><a href='user_record.php?user_id=".$row['email']."'>".$row['first_name'].'&nbsp;'.$row['last_name']."</a></li>";
        }
    }
}

else{
    $output  .= '<li>No member found</li>';
}
$output .= '<ul>';

echo "$output";

// if ($connect) {
//  echo "connection successful";
//  # code...
// }
// else{
//  echo "connetion Failed";
// }


?>
