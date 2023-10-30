<?= $msg ?>

<div class="col-md-10">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Editar Perfil</h5>
              </div>
              <div class="card-body">
                <form action="./?c=user_profile&m=editar" method="POST">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Empresa (Indisponível)</label>
                        <input type="text" readonly="true" class="form-control" placeholder="Empresa" value="<?=$usuario->empname??"Não Informado"?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Tipo de usuário</label>
                        <input type="text" disabled="" class="form-control" placeholder="Username"  value="<?=@$usuario->is_admin==0?'usuário':'admin'?> ">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?=$usuario->email?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?=$usuario->nome?>">
                      </div>
                    </div>
                    
                     <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Whatsapp/Celular</label>
                        <input type="text" class="form-control" placeholder="(XX) 9XXXX-XXXX" name="whatsapp" value="<?=$usuario->whatsapp?>">
                      </div>
                    </div>
                
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>Rua</label>
                        <input type="text" class="form-control" placeholder="Rua para correspondência" name="rua" value="<?=$usuario->rua?>">
                      </div>
                    </div>
                      <div class="col-md-2">
                      <div class="form-group">
                        <label>Número</label>
                        <input type="text" class="form-control" placeholder="Número" name="numero" value="<?=$usuario->number?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" class="form-control" placeholder="Cidade" name="city" value="<?=$usuario->city?>">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Estado</label>
                        <input type="text"  class="form-control" placeholder="Estado" name="state" value="<?=$usuario->state?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>CEP</label>
                        <input type="number" class="form-control" placeholder="Código Postal" name="cep" value="<?=$usuario->cep?>">
                      </div>
                    </div>
                  </div>
           
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Atualiar Perfil</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>