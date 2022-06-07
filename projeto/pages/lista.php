<title>Lista de contatos</title>
<div style="text-align:center; margin: 0 10rem">
    <h1 class="mt-5"> Lista de Contatos </h1>
    <hr>
    <table class="table table-hover table-striped" style="width: 100%; margin:0;">
        <thead class="table-dark">
            <tr>
                <th >Nome</th>
                <th >Email</th>
                <th >Telefone</th>
                <th style="text-align:center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($contatos as $posicao => $cadaContato){
                    $partes = explode(';', $cadaContato);
                    echo '<tr>';
                        echo '<td>' . $partes[0] . '</td>';
                        echo '<td>' . $partes[1] . '</td>';
                        echo '<td>' . $partes[2] . '</td>';
                        echo "<td style='text-align:center'>
                            <a href='/excluir?id={$posicao}' class='btn btn-danger btn-sm'>Excluir</a>
                            <a href='/editar?id={$posicao}' class='btn btn-warning btn-sm'>Editar</a>
                             </td>";
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>