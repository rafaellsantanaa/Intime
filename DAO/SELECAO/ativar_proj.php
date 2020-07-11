<?php 
$cpf = $_SESSION['cpf'];
$connect = mysqli_connect('localhost','root',null,'intime');
$db = mysqli_select_db($connect,'intime');
$query_select = ("SELECT A.id_projeto,A.nome_projeto,A.descricao,A.data_fim FROM `projeto` A
                    INNER JOIN `projeto_gestor` B
                        ON A.id_projeto=B.id_projeto
                    INNER JOIN `cadastro_gestor` C
                        ON B.CPF=C.CPF
                    WHERE B.ATIVO=1 AND C.ATIVO=1  AND b.cpf='$cpf' AND A.data_inicio<>A.data_fim
                    ORDER BY A.DATA_INICIO ");

$select = mysqli_query($connect,$query_select);

$linhas = mysqli_num_rows($select);
if($linhas>=1){

 
echo("<table>
  <caption>Ativar Projetos</caption>
  <thead>
    <tr>
      <th scope='col'>Nome do projeto</th>
      <th scope='col'>Descrição</th>
      <th scope='col'>Data Encerramento</th>
      <th scope='col'>Ativar</th>
      
    </tr>
  </thead>
  <tbody>");
  while ($projeto = mysqli_fetch_assoc($select)){
      $nome_proj = $projeto['nome_projeto'];
      $desc = $projeto['descricao'];
      $dt_ini = $projeto['data_fim'];
      $id_proj = $projeto['id_projeto'];
    echo'<tr>';
    echo ("<td data-label='Nome do projeto'>$nome_proj</td>");
    echo ("<td data-label='Descrição'>$desc</td>");
    echo ("<td data-label='Data Encerramento'>$dt_ini</td>");
    echo ("<td data-label='Ativar' style='background-color:#85e085;'><a href='DAO/CADASTRO/ativa_proj.php?id=$id_proj' style='color:white; font-size:20px'>O</a></td>");
    echo'</tr>';}


    echo '</tbody>';
echo'</table>';

  }else if($linhas==0){
    echo '<br><center><span class="icon fa-meh-o fa-2x"></span>';
    echo '<h3>Poxa vida,</h3>';
    echo '<h4>Você não possui projetos encerrados </h4>';
}
?>