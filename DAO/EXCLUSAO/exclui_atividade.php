<?php 
session_start();
$cpf = $_SESSION['cpf'];
$id_atividade = $_GET['id'];

// echo $cpf."\n";
// echo $id_projeto."\n";
// echo $data;
// echo $desc_atividade;
// echo $tempo;

$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');

    $query_select = ("update `atividade_funcionario_projeto` set ativo=0
                        where id_atividade = '$id_atividade'");
    mysqli_query($connect,$query_select);
    if ($_SESSION['func']==1){
        echo"<script language='javascript' type='text/javascript'>
        alert('Atividade excluida com sucesso :D');window.location.href='../../painel_func.php';</script>";

    }else if ($_SESSION['func']==0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Atividade excluida com sucesso :D');window.location.href='../../painel_gest.php';</script>";
    }
    // echo"<script language='javascript' type='text/javascript'>
    // alert('Atividade excluida com sucesso :D');window.location.href='../../painel_func.php';</script>";

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