<?php 
$cpf = $_SESSION['cpf'];
$id_projeto = $_GET['id'];
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = ("SELECT nome_projeto,nome_completo,D.cpf,CARGO FROM `projeto_funcionario` A
                    INNER JOIN `projeto` C
                        ON A.id_projeto=C.id_projeto
                    INNER JOIN `cadastro_funcionario` D
                        ON A.cpf=D.cpf
                    WHERE  C.data_inicio=C.data_fim AND A.ATIVO=1 AND A.ID_PROJETO='$id_projeto' AND D.ATIVO=1
                    ORDER BY d.nome_completo DESC");
$query_select2 = ("SELECT nome_projeto,nome_completo,D.cpf,CARGO FROM `projeto_funcionario` A
                    INNER JOIN `projeto` C
                        ON A.id_projeto=C.id_projeto
                    INNER JOIN `cadastro_funcionario` D
                        ON A.cpf=D.cpf
                    WHERE  C.data_inicio=C.data_fim AND A.ATIVO=1 AND A.ID_PROJETO='$id_projeto' AND D.ATIVO=1
                    ORDER BY d.nome_completo");

$select = mysqli_query($connect,$query_select);
$select2 = mysqli_query($connect,$query_select2);
$linhas = mysqli_num_rows($select);
if($linhas>=1){
 $proj = mysqli_fetch_assoc($select2);
 $nome_proj= $proj['nome_projeto'];
echo("<table>
  <caption>Relatório de funcionários <br> projeto $nome_proj </caption>
  <thead>
    <tr>
      <th scope='col'>Nome</th>
      <th scope='col'>Cargo</th>
      <th scope='col'>Remover</th>
      
    </tr>
  </thead>
  <tbody>");
  while ($atividade = mysqli_fetch_assoc($select)){
      $nome = $atividade['nome_completo'];
      $cargo = $atividade['CARGO'];
      $cpf_f = $atividade['cpf'];
    echo'<tr>';
    echo ("<td data-label='Nome'>$nome</td>");
    echo ("<td data-label='Cargo'>$cargo</td>");
    echo ("<td data-label='Remover'><a href='DAO/EXCLUSAO/exclui_func_proj.php?id=$id_projeto&cpf=$cpf_f'>X</a></td>");
    echo'</tr>';}


    echo '</tbody>';
echo'</table>';

  }else if($linhas==0){
    echo '<br><center><span class="icon fa-meh-o fa-2x"></span>';
    echo '<h3>Poxa vida,</h3>';
    echo '<h4>Você seu projeto não possui <br>funcionários alocados</h4>';
}
?>