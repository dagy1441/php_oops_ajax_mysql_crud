<?php  
 class Crud  
 {  
      //crud class  
      public $connect;  
      private $host = "localhost";  
      private $username = 'root';  
      private $password = '';  
      private $database = 'tuto_php_ajax';  

    //   constructeur
      function __construct()  
      {  
           $this->database_connect();  
      }  

    //   cree la connection avec la base de donnee
      public function database_connect()  
      {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
      }  

    //   execute une requete passe en parametre 
      public function execute_query($query)  
      {  
           return mysqli_query($this->connect, $query);  
      }  

    //    recupere les donnees de la base de donnee et l'affiche a l'utilisateur en fonction de la requete demande
      public function get_data_in_table($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="10%">Image</th>  
                     <th width="35%">First Name</th>  
                     <th width="35%">Last Name</th>  
                     <th width="10%">Update</th>  
                     <th width="10%">Delete</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td><img src="upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /></td>  
                     <td>'.$row->first_name.'</td>  
                     <td>'.$row->last_name.'</td>  
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Update</button></td>  
                     <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      }      
       
     //  charger une image a parti d'un dossier local puis l'inserer dans la base de donne
     function upload_file($file){
          if (isset($file)) {
               $extension = explode('.', $file['name']);
               $new_name = rand() . '.' . $extension[1];
               $destination = './upload/' .$new_name;
               move_uploaded_file($file['tmp_name'], $destination);
               return $new_name;
          }
     }
 }  
 ?>  