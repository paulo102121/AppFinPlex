<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?=app\model\Configs::open('system_name')?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar " data-color="dark" data-active-color="success">
      <div class="logo">
        <a href="https://noplex.com.br" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="https://noplex.com.br/assets/logo_inverted.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://noplex.com.br" class="simple-text logo-normal">
          <?=app\session\Usuario::get('nome')?>
          <!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav" style="width:87%">
          
          
          
          <li class="c_home">
            <a href="./?c=home">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="c_contas">
            <a href="./?c=contas">
              <i class="nc-icon nc-diamond"></i>
              <p>Receitas</p>
            </a>
          </li>
          <li class="c_despesa">
            <a href="./?c=despesa">
              <i class="nc-icon nc-pin-3"></i>
              <p>Despesas</p>
            </a>
          </li>
          <li class="c_categorias">
            <a href="./?c=categorias">
              <i class="nc-icon nc-bell-55"></i>
              <p>Categorias</p>
            </a>
          </li>
          
          <li class="c_relatorios">
            <a href="./?c=relatorios">
              <i class="nc-icon nc-tile-56"></i>
              <p>Relatórios</p>
            </a>
            
          </li>
               <li class="c_consult">
            <a href="./?c=consult">
              <i class="nc-icon nc-zoom-split"></i>
              <p>Consulta</p>
            </a>
          </li>
          
        </ul>
        <div class="d-flex bg-light bg-opacity-50 m-3" style="height: 1px;">
          <div class="hr"></div>
        </div>
        
        <ul class="nav" style="width:87%">
          <li class="c_user_profile">
            <a href="./?c=user_profile">
              <i class="nc-icon nc-single-02"></i>
              <p>Perfil</p>
            </a>
          </li>
          
          
             <li class="c_users">
            <a href="./?c=users">
              <i class="nc-icon nc-badge"></i>
              <p>Usuários</p>
            </a>
          </li>
          
              <li class="c_companies">
            <a href="./?c=companies">
              <i class="nc-icon nc-shop"></i>
              <p>Empresas</p>
            </a>
          </li>
          
         
        </ul>
        
        
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border d-none">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item d-none">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                  <i class="nc-icon nc-single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./?c=deslogar">Sair</a>
                  <a class="dropdown-item" href="./?c=user_profile">Perfil</a>
                </div>
              </li>
              <li class="nav-item d-none">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content container" style="min-height:700px;">
        
        
        
        
        
        
        
        
        