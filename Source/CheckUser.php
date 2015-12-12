<?php
header("Content-type: text/xml; charset=utf-8");
   
    include( "TbcPayTerminal.php" ); 
	
	
       $TbcPay  = new TbcPayTerminal();
  
       $TbcPay->SecurityCheck();
       
	   $TbcPay->InitilizeCheckUser()
  

       $UserObject = Momxmarebeli::TitoMomxmarebeli( $TbcPay->User);

	
	   
       if( $UserObject )
        {
	   
	      $TbcPay->ShowOkUser( $UserObject->Saxeli );
	      exit();
		  
		}else {
		
	       $TbcPay->FailUser();		
		
	    }
	  
	  
   

?>