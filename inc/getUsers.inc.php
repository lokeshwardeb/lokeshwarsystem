<?php 

class getUsers extends connection{

    protected function users($table){
   $sql = "SELECT * FROM `$table`";
   $result = $this->connect()->query($sql);
   $numRows = $result->num_rows;

   if($numRows > 0){
    while ($row = $result->fetch_assoc()){
        $datas[] = $row;

    }

    return $datas;
    
   }
    
    

    
    
    }
    
    }








?>