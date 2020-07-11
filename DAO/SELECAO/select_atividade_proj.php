<?php 

$cpf = $_SESSION['cpf'];
$id_projeto = $_GET['id'];
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = ("SELECT CF.nome_completo,CF.cpf,CF.cargo,id_atividade,dt_atividade,desc_atividade,tempo_atividade,nome_projeto 
                    FROM `atividade_funcionario_projeto` A 
                INNER JOIN `projeto_funcionario` B ON A.id_funcionario=B.CPF AND A.id_projeto=B.id_projeto 
                INNER JOIN `projeto` C ON A.id_projeto=C.id_projeto 
                INNER JOIN cadastro_funcionario CF ON A.id_funcionario=CF.cpf 
                    WHERE  C.data_inicio=C.data_fim AND A.ATIVO=1 AND A.ID_PROJETO='$id_projeto' 
                ORDER BY dt_atividade desc,tempo_atividade desc");
$query_select2 = ("SELECT sum(tempo_atividade) as tempo_atividade,nome_projeto FROM `atividade_funcionario_projeto` A
                    INNER JOIN `projeto_funcionario` B
                        ON A.id_funcionario=B.CPF AND A.id_projeto=B.id_projeto
                    INNER JOIN `projeto` C
                        ON A.id_projeto=C.id_projeto
                    WHERE  C.data_inicio=C.data_fim AND A.ATIVO=1 AND  A.ID_PROJETO='$id_projeto' 
                    GROUP BY NOME_PROJETO");

$select = mysqli_query($connect,$query_select);
$select2 = mysqli_query($connect,$query_select2);
$linhas = mysqli_num_rows($select);
if($linhas>=1){
 $proj = mysqli_fetch_assoc($select2);
 $nome_proj= $proj['nome_projeto'];
 $horas_proj = $proj['tempo_atividade'];
echo("<table>
  <caption>Relátorio de atividades $nome_proj <h6>Total trabalhado: $horas_proj </h6></caption>
  <thead>
    <tr>
      <th scope='col'>Funcionário</th>
      <th scope='col'>Cargo</th>
      <th scope='col'>Data</th>
      <th scope='col'>Descrição</th>
      <th scope='col'>Tempo</th>
      <th scope='col'>Remover Atividade</th>
    </tr>
  </thead>
  <tbody>");
  while ($atividade = mysqli_fetch_assoc($select)){
      $id_atividade=$atividade['id_atividade'];
      $funcionario = $atividade['nome_completo'];
      $cargo = $atividade['cargo'];
      $data = $atividade['dt_atividade'];
      $desc = $atividade['desc_atividade'];
      $tempo = $atividade['tempo_atividade'];
    echo'<tr>';
    echo ("<td data-label='Funcionário'>$funcionario</td>");
    echo ("<td data-label='Cargo'>$cargo</td>");
    echo ("<td data-label='Data'>$data</td>");
    echo ("<td data-label='Descrição'>$desc</td>");
    echo ("<td data-label='Tempo'>$tempo</td>");
    echo ("<td data-label='Remover Atividade'><a a href='DAO/EXCLUSAO/exclui_atividade.php?id=$id_atividade'>X</a></td>");
    
    echo'</tr>';}


    echo '</tbody>';
echo'</table>';

  }else if($linhas==0){
    echo '<br><center><span class="icon fa-meh-o fa-2x"></span>';
    echo '<h3>Poxa vida,</h3>';
    echo '<h4>Você ainda não possui <br>tarefas cadastradas</h4>';
}
?>