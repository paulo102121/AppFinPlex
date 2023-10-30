<?= $msg ?>
<a href="./?c=receita&m=inserir" id="btn-recInserir"><b>+ Empresa</b></a>
 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de empresas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsives">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nome
                      </th>
                      <th>
                        Cidade
                      </th>
                      <th>
                        Whatsapp
                      </th>
                      <th class="text-right">
                        email
                      </th>
                        <th class="text-right">
                        Cadastro
                      </th>
                    </thead>
                    <tbody>
                    <? 

                    while ($row = $empresas->fetch_object()) {?>
                      <tr>
                        <td>
                          <?=$row->name?>
                        </td>
                        <td>
                          <?=$row->city?>
                        </td>
                        <td>
                          <?=$row->whatsapp?>
                        </td>
                        <td class="text-right">
                          <?=$row->email?>
                        </td>
                          <td class="text-right">
                          <?=date("d/m/Y", strtotime($row->created_at))?>
                        </td>
                      </tr>
                  <?}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</div>
</div>