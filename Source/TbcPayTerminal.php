<?php

class TbcPayTerminal {

	private $User;

	private $Amount;
	
	private $OrderID;

	public $FailUser  = "მომხმარებელი არ არსებობს";
	
	public $OkUser    = "მომხმარებელი არსებობს";
	
	public $OkPay     = "გადახდა წარმატებით განხორციელდა";

	public $FailPay   = "გადახდა ვერ განხორციელდა";

	public $OrderFail = "ტრანზაკცია უკვე არსებობს";




	function __construct()
	{

  	     $this->User     =  null;
	     $this->Amount   =  null;
	     $this->OrderID  =  null;

	 }


	public function SecurityCheck()
	{
        
            $hostip = $_SERVER['REMOTE_ADDR'];

	    if( $hostip === "92.241.77.174" || 
	        $hostip === "95.104.112.74"  ) 
            {

	       	    return 1;

	     }	

	     exit(); 

         }
	

       public function InitializePayment()
	{

	       if( isset($_GET["account"])    && 
	           isset($_GET["amount"])     && 
	           isset($_GET["orderid"])    ) 
    	       {	  

      	      		$this->User     =  $_GET["user"];
      	          	$this->Amount   =  $_GET["amount"];
     	        	$this->OrderID  =  $_GET["orderid"];
                 	return 1; 

	        }	 

	        exit();

	 }




        public	function InitilizeCheckUser()
	{

	         if( isset($_GET["user"]) ) 
	         {	  

	             $this->User     =  $_GET["user"];
	             $this->Amount   =  null;
	             $this->OrderID  =  null;
	             return 1;  

	          }	

	          exit();

	}



        public	function ShowOkUser($login)
	{

	   	$message = '<?xml version="1.0" encoding="utf-8"?><response>';
	   	$message .= '<result>105</result>';
	   	$message .= '<info>';
	   	$message .= '<extra name="username">'.$login.'</extra>';
	   	$message .= '</info>';
	   	$message .= '<comment>'.$this->OkUser.'</comment>';
	   	$message .= '</response>';
	   
	   	echo $message;

	}



	function ShowFailUser()
	{

  		 $message  = '<?xml version="1.0" encoding="utf-8"?> <response>';
	   	 $message .= '<result>101</result>';
		 $message .= '<comment>'.$this->OkUser.'</comment>';
	   	 $message .= '</response>';
	         echo $message;	

	}




	function ShowOkPay()
	{

	   	$message = '<?xml version="1.0" encoding="utf-8"?> <response>';
		$message .= '<result>205</result>';
	   	$message .= '<comment>'.$this->OkUser.'</comment>';
	   	$message .= '</response>';
	   	echo $message;	

	}



	function ShowOrderFail()
	{

	   	$message = '<?xml version="1.0" encoding="utf-8"?> <response>';
	   	$message .= '<result>201</result>';
	   	$message .= '<comment>'.$this->OrderFail.'</comment>';
	   	$message .= '</response>';
	  	echo $message;

	}


	function ShowError()
	{

	   	$message  = '<?xml version="1.0" encoding="utf-8"?> <response>';
	   	$message .= '<result>300</result>';
	   	$message .= '<comment>მოხდა შეცდომა</comment>';
	   	$message .= '</response>';
    		echo $message;	

	}


}

?>
