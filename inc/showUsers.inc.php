
<?php 

class viewUsers extends getUsers{

    public function showUsers(){
   $datas = $this->users("cus_users");

     
   foreach($datas as $data){
  echo  $username = $data['cus_username'];
   echo  $useremail = $data['cus_email']. '<br>';

//    echo '
//    <tr><td>'.$username.'</td></tr>
//    <tr><td>'.$useremail.'</td></tr>
//    <tr><td>'.$username.'</td></tr>
//    <tr><td>'.$username.'</td></tr>
   
//    ';

//  $userResult = array($username, $useremail);
 

   }
//    print_r($userResult);

    
    
    }
    
    }








?>

   
