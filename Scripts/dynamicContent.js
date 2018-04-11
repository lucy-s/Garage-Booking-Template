$(document).ready(function(){
               //applying bootstrap css to tooltips
               $('[data-toggle="tooltip"]').tooltip();
               
               //dynamically change or delete fb profile 
               //setting variables needed to accept user input
               $("#submitFB").click(function(){
               var userProfile =$("#profileInput").val();
               
               if(userProfile =="") {
               alert("A blank search wont return a result");
               } else {
               $(".fb-page").attr("data-href", userProfile);
               };
               });
               
               
               //when the value of the colourpicker is changed its stored in a variable whose value is sent with ajax to styles.php
               $("#colorpicker").on("change",function(){
                   var backgroundColour = $(this).val();
                   console.log(backgroundColour);
                   
                   
                   $.ajax({url: 'styles.php', type: 'post', data: backgroundColour});
                   console.log(backgroundColour);
                  
                   });
               
               
               
               //dynamically editable heading on homepage
               $("#btnHomeHeading").click(function(){
                   $("#homeHeading").attr('contentEditable',false); //heading becomes un editable once the button is clicked
                   $("#homeHeading").tooltip('dispose'); // removes tooltip over heading
                   $(this).tooltip('dispose'); //removes tooltip over the heading button
                   $(this).remove(); //removes the 'save heading' button
               });
               
               //dynamically editable content on homepage
               $("#btnHomeContent").click(function() {
                $("#homeContent").attr('contentEditable',false);
                   $("#homeContent").tooltip('dispose');
                   $(this).tooltip('dispose');
                   $(this).remove();
               });
               
                //dynamically editable heading on about us page
               $("#btnAboutHeading").click(function(){
                   $("#aboutHeading").attr('contentEditable',false);
                   $("#aboutHeading").tooltip('dispose'); 
                   $(this).tooltip('dispose'); 
                   $(this).remove(); 
               });
               
               //dynamically editable content on about us page
               $("#btnAboutContent").click(function() {
                $("#aboutContent").attr('contentEditable',false);
                   $("#aboutContent").tooltip('dispose');
                   $(this).tooltip('dispose');
                   $(this).remove();
               });
               
               //dynamically editable heading on contact us page
               $("#btnContactHeading").click(function(){
                   $("#contactHeading").attr('contentEditable',false); 
                   $("#contactHeading").tooltip('dispose'); 
                   $(this).tooltip('dispose'); 
                   $(this).remove(); 
               });
               
               //dynamically editable content on contact us page
               $("#btnContactContent").click(function() {
                $("#contactContent").attr('contentEditable',false);
                   $("#contactContent").tooltip('dispose');
                   $(this).tooltip('dispose');
                   $(this).remove();
               });
               
                //dynamically editable heading on services page
               $("#btnServicesHeading").click(function(){
                   $("#servicesHeading").attr('contentEditable',false); 
                   $("#servicesHeading").tooltip('dispose'); 
                   $(this).tooltip('dispose'); 
                   $(this).remove(); 
               });
               
               //dynamically editable content on services page
               $("#btnServicesContent").click(function() {
                $("#servicesContent").attr('contentEditable',false);
                   $("#servicesContent").tooltip('dispose');
                   $(this).tooltip('dispose');
                   $(this).remove();
               });
               
                     
                     // removes the upload image form from homepage and all tooltips associated with it
                      $("#btnImageHome").click(function(){
                      $("#btnUploadHome").tooltip('dispose');
                      $("#inputHome").tooltip('dispose');
                      $("btnNoneHome").tooltip('dispose');
                      $(this).tooltip('dispose');
                      $("#uploadHome").remove();
                      });
                      
                      //removes the upload image form from homepage all tooltips associated with it and the image tag
                      $("#btnNoneHome").click(function(){
                      $("#btnUploadHome").tooltip('dispose');
                      $("#inputHome").tooltip('dispose');
                      $("btnImageHome").tooltip('dispose');
                      $(this).tooltip('dispose');                      
                      $("#uploadHome").remove();
                      $("#imgHome").remove();
                      });
                      
                      
                       // removes the upload image form from the about page and all tooltips associated with it
                      $("#btnImageAbout").click(function(){
                      $("#btnUploadAbout").tooltip('dispose');
                      $("#inputAbout").tooltip('dispose');
                      $("btnNoneAbout").tooltip('dispose');
                      $(this).tooltip('dispose');
                      $("#uploadAbout").remove();
                      });
                      
                      //removes the upload image form from the about page, all tooltips associated with it and the image tag
                      $("#btnNoneAbout").click(function(){
                      $("#btnUploadAbout").tooltip('dispose');
                      $("#inputAbout").tooltip('dispose');
                      $("btnImageAbout").tooltip('dispose');
                      $(this).tooltip('dispose');                      
                      $("#uploadAbout").remove();
                      $("#imgAbout").remove();
                      });
                      
                       // removes the upload image form from contact us page and all tooltips associated with it
                      $("#btnImageContact").click(function(){
                      $("#btnUploadContact").tooltip('dispose');
                      $("#inputContact").tooltip('dispose');
                      $("btnNoneContact").tooltip('dispose');
                      $(this).tooltip('dispose');
                      $("#uploadContact").remove();
                      });
                      
                      //removes the upload image form from contact us page, all tooltips associated with it and the image tag
                      $("#btnNoneContact").click(function(){
                      $("#btnUploadContact").tooltip('dispose');
                      $("#inputContact").tooltip('dispose');
                      $("btnImageContact").tooltip('dispose');
                      $(this).tooltip('dispose');                      
                      $("#uploadContact").remove();
                      $("#imgContact").remove();
                      });
                      
                       // removes the upload image form from services page and all tooltips associated with it
                      $("#btnImageServices").click(function(){
                      $("#btnUploadServices").tooltip('dispose');
                      $("#inputServices").tooltip('dispose');
                      $("btnNoneServices").tooltip('dispose');
                      $(this).tooltip('dispose');
                      $("#uploadServices").remove();
                      });
                      
                      //removes the upload image form from services page, all tooltips associated with it and the image tag
                      $("#btnNoneServices").click(function(){
                      $("#btnUploadServices").tooltip('dispose');
                      $("#inputServices").tooltip('dispose');
                      $("btnImageServices").tooltip('dispose');
                      $(this).tooltip('dispose');                      
                      $("#uploadServices").remove();
                      $("#imgServices").remove();
                      });
                            
                            });