<?php 

    namespace app\model;
    


    final class Configs
    {
        private function __construct(){}
        
            public static function dadodsdb(){
    
            $db['user'] = 'manager'; 
            $db['pass'] = 'coloqueumasenha'; 
            $db['name'] =  'appfinancas';
            $db['host'] = 'localhost';
            $db['type'] = 'mysql';
            $db['port'] = '80';
            
            return $db;
    }

        public static function open($item)
        {
            if(file_exists(__DIR__."/../config/configs.ini"))
            {
                $data = parse_ini_file(__DIR__."/../config/configs.ini");
            }
            else{
                throw new \Exception("Arquivo config.ini não Encontrado!");
            }
            $config[$item] = isset($data[$item]) ? $data[$item]:'Sys Manager'; 
            return $config[$item];
        }
    }   