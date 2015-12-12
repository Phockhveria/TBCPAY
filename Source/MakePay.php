<?php
header("Content-type: text/xml; charset=utf-8");
   
     include( "TbcPayTerminal.php" ); 
	
	
       $TbcPay  = new TbcPayTerminal();
  
       $TbcPay->SecurityCheck();

       $TbcPay->InitializePayment();
  
  
    
        $Transaction  = Transactions::CheckTransaction( $TbcPay->OrderID );
        $UserObject   = Momxmarebeli::TitoMomxmarebeli( $TbcPay->User );


	   
       if( !$Transaction )
        {
	   
	       if( $UserObject )
               {
	   
	             $UserObjec->Daricxva( $TbcPay->Amount ) ;
	             exit();
		  
		 }else {
		
	              $TbcPay->FailUser();		
		
	         }
		  
	
		  
           } else {
		
	          $TbcPay->ShowOrderFail()();	
		
	   }
	  
	  
	  
    

  
    

?>
