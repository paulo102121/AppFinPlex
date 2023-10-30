<?php 
namespace app\controller;
use app\session\Usuario as UsuarioSession;
use app\model\{Connection,Transaction,Criteria,Repository,Configs};
use app\model\class\Usuario;
use app\model\User;
use App\Custom\HashManager;
use app\utils\FlashMessage;


class Login extends Controller
{
    
    public function esqueceuSenha()
    {
        UsuarioSession::is_deslogado();
        
        if(!empty($_POST))
        {
            try {
                Transaction::open('db');
                $criteria = new Criteria;
                $criteria->add('email','=',$_POST['email']);
                
                $respUsuario = new Repository('app\model\class\Usuario');
                $objUsuario = $respUsuario->load($criteria);
                Transaction::close();
                
                if(empty($objUsuario))
                {
                    FlashMessage::set('E-mail não encontrado!');
                }
                if($_POST['senha'] != $_POST['confSenha'])
                {
                    FlashMessage::set("Senha e confirmar senha devem ser iguais!");
                }
                if(strlen($_POST['senha'])<8) // || strlen($_POST['senha'])>50)
                {
                    FlashMessage::set("Insira senha maior do que 8 caracteres!");
                }
                
                Transaction::open('db');
                $usuObj = $objUsuario[0];
                $usuObj->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); //$_POST['senha'];
                
                $resultado = $usuObj->store();
                Transaction::close();
                
                if(  $resultado)
                {
                    FlashMessage::set('Senha alterada com sucesso!');
                }
                else{
                    FlashMessage::set('Erro ao alterar senha!');
                }
                
            } catch (\Exception $e) {
                echo $e->getMessage();
            }   
        }
        $this->view(['esqueceuSenha'],['msg' => FlashMessage::get()]);
        
        
        
    }
    
    public function index()
    {   
        //Verifica se o usuário está deslogado, caso contrário, o encaminhará para a página Home
        UsuarioSession::is_deslogado();
        
        if(isset($_POST['email']) && isset($_POST['senha']))
        {
            try {
                Transaction::open('db');
                
                $password = $_POST['senha'];
               

                
            
                $usuario = User::where("email", $_POST['email']);
                
                
            
                
                if(! $usuario->exists()){
                  FlashMessage::set('Usuario não existe!');
                header('location: ./?c=login');
                exit();
                
                }
                
               $usuario = $usuario->first();
               $senha = $_POST['senha'];
               
                
                 if(!HashManager::checkPassUser($usuario->senha, $senha)){
                  FlashMessage::set('Senha não incorreta!');
                header('location: ./?c=login');
                exit();
                
                }
                
                $criteria = new Criteria;
                $criteria->add('email','=',$_POST['email']);


                $usuario = new Repository('app\model\class\Usuario');
                $usuario = $usuario->load($criteria);
                
                Transaction::close();
                
                if(isset($usuario) && !empty($usuario))
                {
                    UsuarioSession::iniciar([
                        'id' => $usuario[0]->id,
                        'nome' => $usuario[0]->nome
                    ]);
                }
                
                FlashMessage::set('Usuario ou Senha incorreto!');
                header('location: ./?c=login');
                exit();
                
            } catch (\Exception $e) {
                $e->getMessage();
                Transaction::rollback();
            }
        }
        
        $this->view(['login'],['msg' => FlashMessage::get()]);
    }
}