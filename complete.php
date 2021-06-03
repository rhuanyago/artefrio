<?php

include("Connections/conexao.php");

 if(isset($_POST["nome"]))  

 $nome = $_POST["nome"];
 {  
      $output = '';  
      $query = "SELECT * FROM tbclientes WHERE nome LIKE '".$nome."%' limit 10 ";  
      $result = mysqli_query($conexao, $query);  
      $output = '<ul class="rhu list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="listin">'.$row["nome"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }
