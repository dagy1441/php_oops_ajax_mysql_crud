 
      $(document).ready(function(){  
        
        // 
        load_data();  

        // 
        $('#action').val("Insert");
     
        //    
        $('#add').click(function(){  
          $('#user_form')[0].reset();  
          $('#uploaded_image').html('');  
          $('#button_action').val("Insert");  
     });
        
        //    charger les donnees depuis la base de donnee puis les afficher dans une page html--php
           function load_data()  
           {  
                var action = "Load";  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data:{action:action},  
                     success:function(data)  
                     {  
                          $('#user_table').html(data);  
                     }  
                });  
           } 

        // 
           $('#user_form').on('submit', function(event) {
                event.preventDefault();
               //  
               var firstName = $('#first_name').val();
               var lastName = $('#last_name').val();
               var extension = $('#user_image').val().split('.').pop().toLowerCase();
               if (extension != '') {
                    if (jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1) {
                         alert("Invalide Image File");
                         // <div class="alert alert-danger" role="alert">
                         //   <h4 class="alert-heading">Invalide Image File</h4> 
                         // </div>
                         $('#user_image').val();
                         return false;
                    }
               }
               if (firstName != '' && lastName != '') {
                    // 
                    $.ajax({
                         url: "action.php",
                         methode: "POST",
                         data: new FormData(this),
                         contentType: false,
                         processData: false,
                         success: function (data) {
                              alert(data);
                              $('#user_form')[0].reset();
                              load_data();
                              $("#action").val("Insert");
                              $('#button_action').val("Insert");
                              $('#uploaded_image').html('');
                         }
                    });
               } else {
                    alert("Both fields are required");
                    // <div class="alert alert-danger" role="alert">
                    //      <h4 class="alert-heading">Both field are required</h4> 
                    // </div>
               }
           });

          //  afficher les information du tableau dans les differents champs lorsqu'on clic sur le bouton update
           $(document).on('click', '.update', function(){
               var user_id = $(this).attr("id");
               var action = "Fetch Single Data";
               $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {user_id:user_id, action:action},
                    dataType: "json",
                    success: function (data) {
                         $('.collapse').collapse("show");
                         $('#first_name').val(data.firstName);
                         $('#last_name').val(data.lastName);
                         $('#uploaded_image').html(data.image);
                         $('#hidden_user_image').val(data.user_image);
                         $('#button_action').val("Edit");
                         $('#action').val("Edit");
                         $('#user_id').val(user_id);
                    }
               });
           });


      });  
  