<?php

include("Connections/conexao.php");

 if(isset($_POST["juridico"]))  

 $nome = $_POST["juridico"];
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
           $output .= '<li class="listin">Nome não encontrado!</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }
