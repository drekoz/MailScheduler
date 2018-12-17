<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model {
    
//    function newStock($value)
//    {
//         $this->load->database();
//        
//        $mysql_query = "INSERT INTO Stock"
//                       ." (Name) VALUES "
//                       ." ('".$value."');";
//       
//        $result = $this->db->query($mysql_query);
//        
//        return $result;
//    }
//    
//     function addStockPrice($value)
//    {
//         $this->load->database();
//        
//        $mysql_query = "INSERT INTO StockDailyData
//                        (StockId,Price,Volume,DataDate)
//                        VALUES(".$value['Id']."
//                        ,".$value['Price']."
//                        ,".$value['Volume']."
//                        ,'".$value['Date']."')";
//       
//     
//        $result = $this->db->query($mysql_query);
//        
//        return $result;
//    }
//    
    function getUserList()
    {   
        $this->load->database();
       
        $mysql_query = "SELECT * FROM wpjq_participants_database ORDER BY Id;";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $userList = array();
        
        foreach ($mysql_result->result() as $row)
        {
            $userData['Id'] = $row->id;
            $userData['first_name'] = $row->first_name;
            $userData['last_name'] = $row->last_name;
            $userData['email'] = $row->email;
            $userData['phone'] = $row->phone;
            $userData['company'] = $row->company;
            $userData['date_recorded'] = $row->date_recorded;
            
         array_push($userList, $userData);
        }

        return $userList;
    }
    
}