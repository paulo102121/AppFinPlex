<div class="row">


   <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-sound-wave text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Saldo</p>
                      <p class="card-title">  <b style="color: <?= $total_saldo >= 0 ? 'green' : 'red' ?>;">R$ <?= $total_saldo ?></b><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  Atualizado
                </div>
              </div>
            </div>
          </div>



  <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-cloud-download-93 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Receitas</p>
                      <p class="card-title"><b>R$ <?= $total_receitas ?></b><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Atualizado
                </div>
              </div>
            </div>
          </div>


   <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-cloud-upload-94 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Despesas</p>
                      <p class="card-title"><b style="color: red;">R$ <?= $total_despesas ?></b><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Atualizado
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Contas</p>
                      <p class="card-title"><b>R$ <?= $total_contas ?></b><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Atualizado
                </div>
              </div>
            </div>
          </div>




<div id="gf">
    <div class="graf g1 card">
        <canvas id="myChart"></canvas>
    </div>
    <div class="graf g2 card"><canvas id="myChart2"></canvas></div>
    <div class="graf g3 card"><canvas id="myChart3"></canvas></div>
</div>  
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var get_ListaValoresReceita=<?=$ListaValoresReceita?>;
var get_listaCategoriaReceita=<?=$listaCategoriaReceita?>;
var get_lista_categoria=<?=$lista_categoria?>;
var get_listaValores=<?=$listaValores?>;
var get_listaValoresDespesaMes=<?=$listaValoresDespesaMes?>;
var get_listaValoresReceitaMes=<?=$listaValoresReceitaMes?>;
</script>
<script src="assets/js/home.js"></script>