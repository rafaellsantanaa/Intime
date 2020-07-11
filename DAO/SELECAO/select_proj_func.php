
<!-- LISTA OS PROJEOS EM QUE O FUNCIONARIO ESTÁ ALOCADO-->
<?php 
$cpf = $_SESSION['cpf'];
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = ("SELECT PF.CPF,P.NOME_PROJETO,P.ID_PROJETO,sum(case when AFP.ATIVO=1 then tempo_atividade else null end) as tempo_atividade FROM `projeto_funcionario` PF 
                        INNER JOIN `cadastro_funcionario` CF ON PF.CPF=CF.CPF 
                        INNER JOIN `projeto` P ON P.ID_PROJETO=PF.ID_PROJETO 
                        left JOIN `atividade_funcionario_projeto` AFP ON AFP.id_funcionario=PF.CPF AND AFP.id_projeto=P.Id_projeto
                    WHERE PF.CPF='$cpf' AND PF.ATIVO=1    AND P.DATA_INICIO=P.DATA_FIM 
                    GROUP BY PF.CPF,P.NOME_PROJETO,P.ID_PROJETO
                    ORDER BY sum(case when AFP.ATIVO=1 then tempo_atividade else null end) DESC");
$select = mysqli_query($connect,$query_select);
$select2 = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);
if($linhas>=1){
    echo ("<center><h4>Você está alocado em  $linhas projeto(s)</h4></center>");
    while ($proj = mysqli_fetch_assoc($select)){
        $nome_proj=$proj['NOME_PROJETO'];
        $id_proj=$proj['ID_PROJETO'];
        $tempo_atividade=$proj['tempo_atividade'];
        if (is_null($tempo_atividade)){$tempo_atividade=0;}
        echo '<center><div class="projeto_func_container">';
            echo '<div class="projeto_func">';
                echo '<div class="projeto_func_preview">';
                    echo '<h6>Projeto</h6>';
                        echo ("<a href='report_func.php?id=$id_proj' id='projeto_nome'><h2> $nome_proj </h2></a>");
                        echo '</div>';
                echo '<div class="projeto_func_info">';
                    echo '<h6>Tempo dedicado</h6>';
                    echo "<h4>$tempo_atividade min </h4>";
                    echo "<button class='btn' id='btn_registro$id_proj'>Registrar</button>";
                echo '</div>';
            echo '</div>';
        echo '</div>';
    /*POPUP PARA CADASTRO*/
        echo "<form action='DAO\CADASTRO\cad_registro.php?id=$id_proj' method='POST'>";    
        echo "<div class=\"popup$id_proj\" id=\"popup\">";
        echo '<div class="popup-content">';
            echo "<img src=\"images\close.png\" class=\"fechar_popup$id_proj\" id=\"fechar_popup\">";
            echo "<br><h4>Atividades $nome_proj</h4>";
                echo '<h5>Descreva a atividade</h5>';
                echo '<input type="text" maxlength="49" id="atividade" name="atividade"  class="input_registro" placeholder="Descreva sua atividade" required="required"><br>';
                echo '<h5>Insira a data:</h5>';
                echo '<input type="date" id="data" name="data" class="input_registro"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="0+\.[0-9]*[1-9][0-9]*$" required="required"><br>';
                echo '<h5>Insira o tempo (minutos):</h5>';
                echo '<input type="number" name="tempo_min" class="input_registro" placeholder="000 minutos" max="1440" min="0"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="0+\.[0-9]*[1-9][0-9]*$" required="required"><br>';
                echo "<button class='btn' id='insere_registro'>Registrar</button>"; 
            echo '</div>';
        echo '</div>';
        echo '</form>';
        echo '</center>';
    }echo " \n";
    echo'<script>';
    while ($proj2 = mysqli_fetch_assoc($select2)){
        $id_proj=$proj2['ID_PROJETO'];
        echo "\n";
        echo ("document.getElementById(\"btn_registro$id_proj\").addEventListener(\"click\", function(){");
			echo ("document.querySelector(\".popup$id_proj\").style.display=\"flex\";");
        echo'})';
        echo " \n";

		echo "document.querySelector(\".fechar_popup$id_proj\").addEventListener(\"click\", function(){";
			echo"document.querySelector(\".popup$id_proj\").style.display=\"none\";";
            echo'})';
            echo"\n";
       
    }
    
    echo'</script>';
}else if($linhas==0){
    echo '<br><center><span class="icon fa-meh-o fa-2x"></span>';
    echo '<h3>Poxa vida,</h3>';
    echo '<h4>Você ainda não foi alocado em nenhum projeto</h4>';
}


?>