//<script type="text/javascript">
function validate()
{ 
      
   if( document.uploadtutorial.Dtype.value == "0" )
   {
     alert( "Please select Department Type!" );
     
     return false;
   } 
     
   if( document.uploadtutorial.ctype.value == "0" )
   {
     alert( "Please select course !" );
    
     return false;
   }   
   
   if( document.uploadtutorial.year.value == "0" )
   {
     alert( "Please select year!" );
    
     return false;
   }   
   
   if( document.uploadtutorial.subject.value == "0" )
   {
     alert( "Please Select Subject!" );
     
     return false;
   }
  
  
  
   if( document.uploadtutorial.ls.value == "0" )
   {
     alert( "Please Select lesson type!" );
     
     return false;
   }
  
  
  if( document.uploadtutorial.Filetype.value == "0" )
   {
     alert( "Please Select file type!" );
     
     return false;
   }
  
  
   
  if( document.uploadtutorial.files.value == "" )
   {
     alert( "Please select tutorial files!" );
     document.uploadtutorial.files.focus() ;
     return false;
   }
   



}
//</script>
