<?php
function email_formdata($to, $cc, $subject)
{  if (mail($to, $subject, formdata(), "Cc: $cc"))
   {  return TRUE;  }
   return FALSE;
}

function formdata()
{  $data="";
   reset($_REQUEST);
   foreach($_REQUEST as $key => $val) 
   {  if ( is_array($val) )
      {  $data .= ("$key:  " . implode(", ", $val) . "\n");  }
      else
      {  $data .= "$key:  $val\n";  }
   }
   return $data;
}

// bool mail ( string $to , string $subject , string $message 
//   [, string $additional_headers [, string $additional_parameters ]] )
?>
