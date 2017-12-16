//<script type="text/javascript">
function validate()
{
   if( document.student_registration.firstname.value == "" )
   {
     alert( "Please provide your First Name!" );
     document.student_registration.firstname.focus() ;
     return false;
   }
   if( document.student_registration.lastname.value == "" )
   {
     alert( "Please provide your Last Name!" );
     document.student_registration.lastname.focus() ;
     return false;
   }
   if ( ( student_registration.sex[0].checked == false ) && ( student_registration.sex[1].checked == false ) )
   {
    alert ( "Please choose your Gender: Male or Female" );
    return false;
   }   
  var email = document.student_registration.emailid.value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
  if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
  {
      alert("Please enter correct email ID")
      document.student_registration.emailid.focus() ;
      return false;
  }
  if( document.student_registration.dob.value == "" )
  {
     alert( "Please provide your DOB!" );
     document.student_registration.dob.focus() ;
     return false;
  }
  if( document.student_registration.mobileno.value == "" || isNaN( document.student_registration.mobileno.value))
   {
     alert( "Please provide a Mobile No in the format 123." );
     document.student_registration.mobileno.focus() ;
     return false;
   }
   
  if( document.student_registration.photo.value == "" )
   {
     alert( "Please provide your Photo!" );
     document.student_registration.photo.focus() ;
     return false;
   }

   var firstName = document.student_registration.firstname.value;
   var lastName = document.student_registration.lastname.value;
   var sex = (student_registration.sex[0].checked) ? 'M' : 'F';
   var emailId = document.student_registration.emailid.value;
   var dob = document.student_registration.dob.value;
   var mobileno = document.student_registration.mobileno.value;  
   var photo = document.student_registration.photo.value;
   var fingerPrint = document.student_registration.SF.value;

   document.student_registration.submit();
}

function Capture()
{
  try {
//    document.StudentRegistration.SF.value = "";
    var res = CaptureFinger(60, 10); // 60 Quality, 10sec timeout.
    if(res.data.ErrorCode == "0")
    {
      document.student_registration.imgFinger.src = "data:image/bmp;base64, " + res.data.BitmapData;
      document.student_registration.SF.value = res.data.IsoTemplate;
    }
    else
    {
      alert("Error: " + res.err);
    }
  }
  catch(e)
  {
    alert("Exception: " + e);
  }
  return false;
}
//</script>

function CaptureForPrintHT()
{
  try {
    var res = CaptureFinger(60, 10); // 60 Quality, 10sec timeout.
    if(res.data.ErrorCode == "0")
    {
      document.print_ht_form.imgFinger.src = "data:image/bmp;base64, " + res.data.BitmapData;
      document.print_ht_form.fingerbase64.value = res.data.IsoTemplate;
    }
    else
    {
      alert("Error: " + res.err);
    }
  }
  catch(e)
  {
    alert("Exception: "+e);
  }
  return false;
}

function validatePrintHT()
{
  document.student_registration.submit();
  return true;
}

function MatchFingerPrint(isoTemlate)
{
  try {
    var res = MatchFinger(60, 10, isoTemlate);
    if(res.data.Status)
    {
      alert("FingersMatched");
    }
    else
    {
      if(res.data.ErrorCode != "0")
      {
        alert(res.data.ErrorDescription);
      }
      else
      {
        alert("Fingers does not matched.");
      }
    }
  }
  catch(e)
  {
    alert("Exception: "+e);
  }
  return false;
}
