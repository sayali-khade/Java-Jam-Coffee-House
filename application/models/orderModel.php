<?php

	class orderModel extends CI_Model
	{
		 //This methods inserts order and orderItems to Db
    public function insertToDbOrder(){

        $numberofRecords = $_SESSION['numberOfRecords'];
        //echo $numberofRecords;
        $myName = $_POST["myName"];
        $myEmail = $_POST["myEmail"];
        $myAddress = $_POST["myAddress"];
        $myCity = $_POST["myCity"];
        $myState = $_POST["myState"];
        $myZip = $_POST["myZip"];
        $myCredit = hash('md5',$_POST["myCredit"]);
        $myMonth = $_POST["myMonth"];
        $myYear = $_POST["myYear"];

     
        $data = array(

                  'OrderId'=> 'DEFAULT',
                  'Name'=> $myName,
                  'EmailId'=> $myEmail,
                  'Address'=> $myAddress,
                  'City' => $myCity,
                  'State' => $myState,
                  'Zip' => $myZip,
                  'Credit_Card' => $myCredit,
                  'Month' => $myMonth,
                  'Year'=>$myYear

                );
        $orderId = $this->db->insert('orders',$data);
        $sql = $this->db->query('SELECT OrderId FROM orders ORDER BY orderId desc');
        $query = $sql->result();
        $i = 1;
        $orderId = 0;

        foreach($query as $row){

            if($i == 1){
                
                $orderId = $row->OrderId;
               
                break;

            }

        }

        $prodNumber = 0;
       
        while($numberofRecords>=0){

            if(isset($_SESSION['proId'.$prodNumber])){
             
                $data = array(
                    'orderId'=> $orderId,
                    'productId' => $_SESSION['proId'.$prodNumber],
                    'price'=> $_SESSION['cost'.$prodNumber],
                    'quantity' => $_SESSION['Qty'.$prodNumber]
                  );    
                  $this->db->insert('orderItems', $data);                    
            }
            $prodNumber = $prodNumber + 1;
            $numberofRecords = $numberofRecords - 1;
        }
    }

   
   
		
	}
?>