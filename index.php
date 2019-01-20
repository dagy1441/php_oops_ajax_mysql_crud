<?php  
 //index.php  
 include 'crud.php';  
 $object = new Crud();  
 ?>  
 <html>  
      <head>  
          <title>PHP Mysql Ajax Crud using OOPS - Fetch Data</title>  
           
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
          <link rel="stylesheet" href="style.css">  
      </head>  
      <body>  
           <div class="container box">  
                <h3 align="center">PHP Mysql Ajax Crud using OOPS - Fetch Data</h3><br /> 
                <button class="btn btn-success" type="button" name="add" data-toggle="collapse" data-target="#user_collapse">Add</button> 
                <br />  <br/>
                <div class="collapse" id="user_collapse">
                    <form  method="post" id="user_form">

                    <!-- <div class="input-group"> -->
                         <!-- <span class="input-group-addon" id="sizing-addon2">@</span> -->
                         <label class="for-control">Enter First Name</label>  
                         <input type="text" name="first_name" id="first_name" class="form-control" placeholder="first name" require aria-describedby="sizing-addon2"/><br/>
                    <!-- </div><br/> -->

                    <!-- <div class="input-group"> -->
                         <!-- <span class="input-group-addon" id="sizing-addon2">@</span> -->
                         <label>Enter Last Name</label>  
                         <input type="text" name="last_name" id="last_name" class="form-control" require placeholder="last name" aria-describedby="sizing-addon2"/><br/>
                    <!-- </div><br/> -->

                    <!-- <div class="input-group"> -->
                         <!-- <span class="input-group-addon" id="sizing-addon2">+</span> -->
                         <label>Select User Image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" require /><br/>
                        <input type="hidden" name="hidden_user_image" id="hidden_user_image"/>
                        <span id="updated_image"></span>
                    <!-- </div> <br/> -->
                    
                        <div align="center">
                            <input type="hidden" name="action" id="action">
                            <input type="hidden" name="user_id" id="user_id"/>
                            <input type="submit" name="button_action" id="button_action"  class="btn btn-primary" value="Insert"/>

                        </div>

                    </form>
                </div>
                <div id="user_table" class="table-responsive">  
                </div>  
           </div>  


           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script type="text/javascript" src="scripte.js"></script> 
      </body>  
 </html>  
 