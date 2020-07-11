
<!-- LISTA OS PROJEOS EM QUE O FUNCIONARIO ESTÁ ALOCADO-->
<?php 
$cpf = $_SESSION['cpf'];
$id_proj = $_GET['id'];
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = ("SELECT * FROM `cadastro_funcionario` A
                    WHERE A.CPF NOT IN (select distinct cpf from `projeto_funcionario` where ativo=1 and id_projeto=$id_proj) and A.ATIVO=1
                    order by nome_completo");
$select = mysqli_query($connect,$query_select);
$select2 = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);
if($linhas>=1){
    echo ("<center><h4>Você pode alocar $linhas funcionário(s)</h4></center>");

        echo '<center>';
            echo "<button class='btn' id='btn_registro$id_proj'>Alocar Funcionário</button>";
    /*POPUP PARA CADASTRO*/
        echo "<form action='DAO\CADASTRO\cad_func_proj.php?id=$id_proj' method='POST'>";    
        echo "<div class=\"popup_aloca$id_proj\" id=\"popup_aloca\">";
        echo '<div class="popup-content_aloca">';
            echo "<img src=\"images\close.png\" class=\"fechar_popup_aloca$id_proj\" id=\"fechar_popup_aloca\">";
            echo("<table><br>
                    <h3>Aloque novos funcionários </h3>
                    <thead>
                        <tr>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Cargo</th>
                        <th scope='col'>Email</th>
                        <th scope='col' id='alocar'></th>
                        
                        
                        </tr>
                    </thead>
                    <tbody>");
                    while ($func = mysqli_fetch_assoc($select)){
                        $nome=$func['nome_completo'];
                        $cargo=$func['cargo'];
                        $email=$func['email'];
                        $cpf_f=$func['cpf'];
                      echo'<tr>';
                      echo ("<td data-label='Nome'>$nome</td>");
                      echo ("<td data-label='Cargo'>$cargo</td>");
                      echo ("<td data-label='Email'>$email</td>");
                      echo ("<td data-label='______' id='alocar2'><a href='DAO/CADASTRO/cad_func_proj.php?id=$id_proj&cpf=$cpf_f'>Alocar</a></td>");
                      
                      echo'</tr>';}
                  
                  
                      echo '</tbody>';
                  echo'</table>';
                
            echo '</div>';
        echo '</div>';
        echo '</form>';
        echo '</center>';
    echo " \n";
    echo'<script>';
    while ($proj2 = mysqli_fetch_assoc($select2)){
        
        echo "\n";
        echo ("document.getElementById(\"btn_registro$id_proj\").addEventListener(\"click\", function(){");
			echo ("document.querySelector(\".popup_aloca$id_proj\").style.display=\"flex\";");
        echo'})';
        echo " \n";

		echo "document.querySelector(\".fechar_popup_aloca$id_proj\").addEventListener(\"click\", function(){";
			echo"document.querySelector(\".popup_aloca$id_proj\").style.display=\"none\";";
            echo'})';
            echo"\n";
       
    }
    
    echo'</script>';
}else if($linhas==0){
    echo '<CENTER><h4>Não há funcionários disponíveis para alocar   :(</h4></CENTER><br>';
}


?>