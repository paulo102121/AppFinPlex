<?php 

namespace app\controller;

use app\session\Usuario;
use app\utils\ValidaData;
use app\model\{Transaction,Repository,Criteria, DBmanager};
use app\model\class\{Categoria,Receita as ReceitaModel};
use app\utils\{FlashMessage,Validacao,FiltraMoeda};

class User_profile extends Controller
{
    public function index()
    {

        Usuario::is_logado();       
        try{
                $db = new DBmanager();
                   $user = $db->from('usuarios')
                ->join('empresas', array('usuarios.empresa_id' => 'empresas.id', 'usuarios.id' => Usuario::get('id')))
                ->select("usuarios.*, empresas.name as empname")
                ->execute();
                 while ($obj = $user->fetch_object()) {$usuario = $obj;}
                if($obj==null){
                    $user = $db->from('usuarios')
                ->where('id', Usuario::get('id'))
                ->select()
                ->execute();
                 while ($obj = $user->fetch_object()) {$usuario = $obj;}
                 
                }
             
                
                $this->view([
                    'template/header',
                    'user/profile',
                    'template/footer'
                ],[
                    'usuario' => $usuario,
                    'msg' => FlashMessage::get()
                ]);  
            }
            catch (\Exception $e) {
                echo $e->getMessage();
                Transaction::rollback();
            }           
        }
        
        public function inserir()
        {
            Usuario::is_logado();
            
            try {
                Transaction::open('db');
                
                if(!empty($_POST) && isset($_POST['valor']))
                {
                    $conta = new Conta;
                    $conta->valor       = $_POST['valor'];
                    $conta->instFinanca = $_POST['instFinanceira'];
                    $conta->descricao   = $_POST['descricao'];
                    $conta->tipo_conta  = $_POST['tipo_conta'];
                    $conta->id_usuario  = Usuario::get('id');
                    
                    $resultado = $conta->store();
                    
                    Transaction::close();
                    
                    if($resultado)
                    {
                        FlashMessage::set('Conta criada com sucesso!');
                    }
                    else{
                        FlashMessage::set('Erro ao criar a conta!');
                    }
                }
                
            } catch (\Exception $e) {
                Transaction::rollback();
                echo $e->getMessage();
            }
            
            $this->view([
                'template/header',
                'conta/inserir',
                'template/footer'
            ],[
                'usuario_logado' => Usuario::get('nome'),
                'msg'            => FlashMessage::get()
            ]);
        }
        
        public function remover()
        {
            //Verifica se o Usuário está logado, caso contrário vai para a página de login
            Usuario::is_logado();
            
            if(!$id = Validacao::id('id')){header('location: ./?c=receita');exit;}
            
            try {
                Transaction::open('db');
                
                $receita = ReceitaModel::find($id);
                $resultado = $receita->delete();
                
                Transaction::close();
                
                if($resultado)
                {
                    FlashMessage::set('Receita removida com sucesso!','c=receita');
                }
                else{
                    FlashMessage::set('Erro ao remover receita','c=receita');
                }
                
            } catch (\Exception $e) {
                echo $e->getMessage();
                Transaction::rollback();
            }                    
        }      
        
        public function editar()
        {
            //Verifica se o Usuário está logado, caso contrário vai para a página de login
            Usuario::is_logado();
            
            //if(!$id = Validacao::id('id')){header('location: ./?c=erro404');exit;}
            
            $db = new DBmanager();
            // $db->setDb(array());
            
            /*
            $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'admin', 'hunter2');
            
            $db->setDb($pdo);
            
            https://github.com/mikecao/sparrow
            */
            
            
            
            try {
                $data = array(
                'nome' => $_POST['nome'], 
                'email' => $_POST['email'],
                'city' => $_POST['city'],
                'rua' => $_POST['rua'],
                'cep' => $_POST['cep']
                );
                
                $where = array('id' => Usuario::get('id'));
                
                $db->from('usuarios')
                ->where($where)
                ->update($data)
                ->execute();
                // ->sql();
                
                if(!$db->execute())
                {
                    FlashMessage::set('Atenção! Cadastre uma categoria para alterar a receita.',null,false);
                }else{
                FlashMessage::set('Cadastro atuallizado com sucesso!.',null,false);
                
                }
                
                  $user = $db->from('usuarios')
                ->join('empresas', array('usuarios.empresa_id' => 'empresas.id', 'usuarios.id' => Usuario::get('id')))
                ->select("usuarios.*, empresas.name as empname")
                ->execute();
                 while ($obj = $user->fetch_object()) {$usuario = $obj;}
                if($obj==null){
                    $user = $db->from('usuarios')
                ->where('id', Usuario::get('id'))
                ->select()
                ->execute();
                 while ($obj = $user->fetch_object()) {$usuario = $obj;}
                 
                }
                
                
                $this->view([
                    'template/header',
                    'user/profile',
                    'template/footer'
                ],[
                    'usuario_logado' => Usuario::get('nome'),
                    'usuario' => $usuario,
                    'msg' => FlashMessage::get()
                ]);            
                
            } catch (\Exception $e) {
                echo $e->getMessage();
                Transaction::rollback();
            }
            
        }          
    }