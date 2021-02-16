<?php
	include ("../connect.php");
	date_default_timezone_set("America/New_York");
	// if submit button is pressed, process inputs 
	
if (isset($_POST['fbSubmit']))
	{
		$callNo = $conn->real_escape_string($_POST['callno']);
		$found = $conn->real_escape_string($_POST['found']);
		if ($found == 'yes')
		{
			$found = 1;
		}
		else 
		{
			$found = 0;
		}
		$datetime = date('Y-m-d H:i:s');


		$query = "INSERT INTO FeedBack (CallNo, Found, Time) VALUES ('".$callNo."','".$found."','".$datetime."')";
		
		if ($conn->query($query) === TRUE)
		{
						//determine which shelf that  call number is fall into
			if ($data = $conn->query("SELECT CallNo FROM FeedBack"))
			{
				
				if ($data->num_rows > 0)
				{
				    while ($row = $data->fetch_object())
					{
				
						//using existing call number from feedBack table to find which shelf that book is in 
					   $updateShelfNo = "SELECT * FROM BookLocations1 WHERE '$row->CallNo' BETWEEN FIRST AND LAST order by ShelfNo desc limit 1";
					   //get list of shelf data 
					  if($shelfdata =$conn->query($updateShelfNo))
					  {   
							while ($r = $shelfdata ->fetch_object())
							{
								
								if(!$conn->query("UPDATE FeedBack SET ShelfNo = ($r->ShelfNo)  WHERE CallNo = '$row->CallNo'"))
								{
								    echo "ERROR: ShelfNo can't update in FeedBack data table!";
								}
								
							}
							
					}else{
						echo "ERROR: Wrong SQL query";
					}

				}	
			 }
			}

				   $subject = "Anthropology";
			       $callnopattern = "CallNo REGEXP '^GN'";
			       if (!$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern ") )
			       {          
					  $message = "ERROR: Can't update to the ".$subject." field";
					  echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
					}

				    $callnopattern = "";
				    $subject = "Arts, Fine Arts";
				    $callnopattern = "CallNo BETWEEN 'N' and 'NY'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
	                   $message = "ERROR: Can't update to the ".$subject." field";
		    	       echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }
				     $callnopattern = "";
				     $subject = "Biology";
				     $callnopattern = " CallNo BETWEEN 'QH' and 'QS'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				        $message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	
				    }

				     $callnopattern = "";
				     $subject = "Business";
				     $callnopattern=" CallNo BETWEEN 'HF' and 'HK'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				    	$message = "ERROR: Can't update to the ".$subject." field";
		            	echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";		        
				    }

			     	$callnopattern=" ";
				    $subject = "Chemistry";
				    $callnopattern = "CallNo REGEXP '^QD'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
					{   
					   $message = "ERROR: Can't update to the ".$subject." field";
					   echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";		    
				    }

				    $callnopattern=" ";
				    $subject = "Communication & Media";
				    $callnopattern = "CallNo BETWEEN 'P87' and 'P97'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
						$message = "ERROR: Can't update to the ".$subject." field";
						echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern=" ";
				    $subject = "Communication Disorders";
				    $callnopattern = "CallNo BETWEEN 'RC423' and 'RC429'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				        $message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }
				    
				    $callnopattern=" ";
				    $subject = "Computer Science & Mathematics";
				    $callnopattern = "CallNo REGEXP '^QA'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				    	$message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				   $callnopattern=" ";
				    $subject = "Economics";
				    $callnopattern = "CallNo BETWEEN 'HB' and 'HD'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				        $message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

			    	$callnopattern=" ";
				    $subject = "Education";
				    $callnopattern = "CallNo BETWEEN 'L' and 'LU'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
                   	  $message = "ERROR: Can't update to the ".$subject." field";
		         	  echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";				        
				    }

				    $callnopattern=" ";
				    $subject = "Engineering";
				    $callnopattern = "CallNo REGEXP '^TK'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
	                  $message = "ERROR: Can't update to the ".$subject." field";
		         	  echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern=" ";
				    $subject = "English/Language/Literature";
				    $callnopattern = "CallNo REGEXP '^P'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				    	$message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern=" ";
				    $subject = "Geography";
				    $callnopattern = "CallNo BETWEEN 'G' and 'GG'";
				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))  
					{   
				        $message = "ERROR: Can't update to the ".$subject." field";
		               	echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	    
				    }

				    $callnopattern="";
				    $subject = "Geology";
				    $callnopattern = "CallNo REGEXP '^QE'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
	                    $message = "ERROR: Can't update to the ".$subject." field";
		            	echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern="";
				    $subject = "History";
				    $callnopattern = "CallNo BETWEEN 'D' and 'G'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				    	$message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern="";
				    $subject = "Music";
				    $callnopattern = "CallNo BETWEEN 'M' and 'MU'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				    	$message = "ERROR: Can't update to the ".$subject." field";
		               	echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	
				    }

				    $callnopattern="";
				    $subject = "Nursing";
				    $callnopattern = "CallNo REGEXP '^RT'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				    	$message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	
				    }


				    $callnopattern="";
				    $subject = "Physics";
				    $callnopattern = "CallNo REGEXP '^QC'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				        $message = "ERROR: Can't update to the ".$subject." field";
		                echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }


				    $callnopattern = " ";
				    $subject = "Political Science";
				    $callnopattern = "CallNo BETWEEN 'J' and 'JY'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
	                    $message = "ERROR: Can't update to the ".$subject." field";
		           	    echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	
				    }


				    $callnopattern="";
				    $subject = "Psychology";
				    $callnopattern = "CallNo REGEXP '^BF'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				        $message = "ERROR: Can't update to the ".$subject." field";
		               	echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";		    
				    }

				    $callnopattern="";
				    $subject = "Religion";
				    $callnopattern = "CallNo BETWEEN 'BL' and 'BY'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
				        $message = "ERROR: Can't update to the ".$subject." field";
		    	        echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	
				    }

				    $callnopattern="";
				    $subject = "Sociology";
				    $callnopattern = "CallNo BETWEEN 'HM' and 'HY'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   
	                    $message = "ERROR: Can't update to the ".$subject." field";
		        	    echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern="";
				    $subject = "Theatre Arts";
				    $callnopattern = "CallNo BETWEEN 'PN2000' and 'PN3300'";

				    if ( !$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   		    
				        $message = "ERROR: Can't update to the ".$subject." field";
		             	echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";
				    }

				    $callnopattern="";
				    $subject = "Unknown";
				    $callnopattern= "Subject IS NULL OR Subject = ''";

				    if (!$conn->query ("UPDATE FeedBack SET Subject = '$subject' WHERE $callnopattern "))
				    {   				    
				        $message = "ERROR: Can't update to the ".$subject." field";
		                echo "<script type='text/javascript'>alert('$message'); window.location = '../../index.html';</script>";	
				    }

		
		}
		
  
		 echo " <script> alert('Feedback successfully submitted!'); </script>'";
		
	}	
?>

