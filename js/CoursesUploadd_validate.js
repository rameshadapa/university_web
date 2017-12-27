//<script type="text/javascript">
function validate()
{
   if( document.coursesUploadd.Dtype.value == "0" )
   {
     alert( "Please select Department Type!" );
     
     return false;
   }
   if( document.coursesUploadd.SC.value == "0" )
   {
     alert( "Please select course !" );
    
     return false;
   }
   if( document.coursesUploadd.year.value == "0" )
   {
     alert( "Please select year!" );
    
     return false;
   }
   if( document.coursesUploadd.desc.value == "" )
   {
     alert( "Please provide description!" );
     document.coursesUploadd.desc.focus() ;
     return false;
   }
  if( document.coursesUploadd.img.value == "" )
   {
     alert( "Please select image files!" );
     document.coursesUploadd.img.focus() ;
     return false;
   }
  document.coursesUploadd.submit();
}
//</script>
