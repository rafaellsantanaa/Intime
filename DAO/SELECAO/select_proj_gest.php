
<!-- LISTA OS PROJEOS EM QUE O FUNCIONARIO ESTÁ ALOCADO-->
<?php 

$cpf = $_SESSION['cpf'];
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = ("SELECT PG.CPF,P.NOME_PROJETO,P.ID_PROJETO,sum(case when AFP.ATIVO=1 then tempo_atividade else null end) as tempo_atividade,count(distinct AFP.id_funcionario) as headcount FROM `projeto_gestor` PG 
                        INNER JOIN `cadastro_gestor` CG ON PG.CPF=CG.CPF 
                        INNER JOIN `projeto` P ON P.ID_PROJETO=PG.ID_PROJETO 
                        left JOIN `atividade_funcionario_projeto` AFP ON  AFP.id_projeto=P.Id_projeto
                    WHERE PG.CPF='$cpf' AND PG.ATIVO=1  AND P.DATA_INICIO=P.DATA_FIM
                    GROUP BY PG.CPF,P.NOME_PROJETO,P.ID_PROJETO
                    ORDER BY sum(case when AFP.ATIVO=1 then tempo_atividade else null end) DESC");
$select = mysqli_query($connect,$query_select);
$select2 = mysqli_query($connect,$query_select);
$linhas = mysqli_num_rows($select);
if($linhas>=1){
    echo ("<center><h4>Você gerencia $linhas projeto(s)</h4></center>");
    while ($proj = mysqli_fetch_assoc($select)){
        $nome_proj=$proj['NOME_PROJETO'];
        $id_proj=$proj['ID_PROJETO'];
        $tempo_atividade=$proj['tempo_atividade'];
        $query_select2 = ("SELECT count(distinct PF.cpf) as headcount FROM `projeto_funcionario` PF WHERE PF.ATIVO=1 AND PF.ID_PROJETO=$id_proj");
        $select3 = mysqli_query($connect,$query_select2);
        $HC = mysqli_fetch_assoc($select3);
        $headcount=$HC['headcount'];
        if (is_null($tempo_atividade)){$tempo_atividade=0;}
        echo '<center><div class="projeto_func_container">';
            echo '<div class="projeto_func">';
                echo '<div class="projeto_func_preview">';
                    echo '<h6>Projeto</h6>';
                        echo ("<a href='report_proj.php?id=$id_proj' id='projeto_nome'><h2> $nome_proj </h2></a><br>");
                        echo '</div>';
                echo '<div class="projeto_func_info">';
                    echo '<h6>Tempo dedicado</h6>';
                    echo "<h4>$tempo_atividade min</h4>";
                    echo ("<h6 style='color:#600080;'>Headcounts: $headcount </h6>");
                    echo "<button style='font-size:11px; margin-top:-100px;' class='btn' onclick=\"window.location.href='report_func_proj.php?id=$id_proj'\" id='btn_registro$id_proj'>Ver Equipe</button>";
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '</center>';
    }
}else if($linhas==0){
    echo '<br><center><span class="icon fa-meh-o fa-2x"></span>';
    echo '<h3>Poxa vida,</h3>';
    echo '<h3>Você ainda não gerencia <br> nenhum projeto</h3>';
}


?>