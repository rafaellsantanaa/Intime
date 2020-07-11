<?php 
session_start();
$cpf = $_SESSION['cpf'];
$id_projeto = $_GET['id'];
$data = $_POST['data'];
$desc_atividade = $_POST['atividade'];
$tempo = $_POST['tempo_min'];
// echo $cpf."\n";
// echo $id_projeto."\n";
// echo $data;
// echo $desc_atividade;
// echo $tempo;

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select2 = ("SELECT sum(tempo_atividade) as tempo_atividade FROM `atividade_funcionario_projeto` A
                    INNER JOIN `projeto_funcionario` B
                        ON A.id_funcionario=B.CPF AND A.id_projeto=B.id_projeto
                    INNER JOIN `projeto` C
                        ON A.id_projeto=C.id_projeto
                    WHERE B.ATIVO=1 AND C.DATA_INICIO=C.DATA_FIM AND A.ID_PROJETO='$id_projeto' AND A.ID_FUNCIONARIO='$cpf' AND A.DT_ATIVIDADE='$data'");
$select2 = mysqli_query($connect,$query_select2);
$RES=mysqli_fetch_assoc($select2);
$tempo_parcial = $RES['tempo_atividade'];
if($tempo+$tempo_parcial > 1440){
    echo"<script language='javascript' type='text/javascript'>
    alert('Não é possível trabalhar mais que 24 horas ao dia, verifique os campos!');window.location.href='../../painel_func.php';</script>";
}else{
    $query_select = ("insert into `atividade_funcionario_projeto`(id_funcionario,id_projeto,dt_atividade,tempo_atividade,desc_atividade)
                        values ('$cpf','$id_projeto','$data','$tempo','$desc_atividade')");
    mysqli_query($connect,$query_select);
    echo"<script language='javascript' type='text/javascript'>
    alert('Atividade inserida com sucesso :D');window.location.href='../../painel_func.php';</script>";
}
// $query_select = ("SELECT id_atividade,dt_atividade,desc_atividade,tempo_atividade,nome_projeto FROM `atividade_funcionario_projeto` A
//                     INNER JOIN `projeto_funcionario` B
//                         ON A.id_funcionario=B.CPF AND A.id_projeto=B.id_projeto
//                     INNER JOIN `projeto` C
//                         ON A.id_projeto=C.id_projeto
//                     WHERE B.ATIVO=1 AND C.ATIVO=1 AND A.ID_PROJETO='$id_projeto' AND A.ID_FUNCIONARIO='$cpf'
//                     ORDER BY dt_atividade DESC");


// $select = mysqli_query($connect,$query_select);
// $select2 = mysqli_query($connect,$query_select2);
// $linhas = mysqli_num_rows($select);
// if($linhas>=1){
//  $proj = mysqli_fetch_assoc($select2);
//  $nome_proj= $proj['nome_projeto'];
//  $horas_proj = $proj['tempo_atividade'];
// echo("<table>
//   <caption>Relátorio de atividades $nome_proj <h6>Total trabalhado: $horas_proj </h6></caption>
//   <thead>
//     <tr>
//       <th scope='col'>Data</th>
//       <th scope='col'>Descrição</th>
//       <th scope='col'>Tempo</th>
//     </tr>
//   </thead>
//   <tbody>");
//   while ($atividade = mysqli_fetch_assoc($select)){
//       $data = $atividade['dt_atividade'];
//       $tempo = $atividade['tempo_atividade'];
//       $desc = $atividade['desc_atividade'];
//     echo'<tr>';
//     echo ("<td data-label='Data'>$data</td>");
//     echo ("<td data-label='Descrição'>$desc</td>");
//     echo ("<td data-label='Tempo'>$tempo</td>");
//     echo'</tr>';}


//     echo '</tbody>';
// echo'</table>';

//   }else if($linhas==0){
//     echo '<br><center><span class="icon fa-meh-o fa-2x"></span>';
//     echo '<h3>Poxa vida,</h3>';
//     echo '<h4>Você ainda não possui <br>tarefas cadastradas</h4>';
// }
?>