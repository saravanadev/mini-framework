# Mini Framework

# Requisitos

- PHP >= 5.1
- MYSQL >= 4.1.2
- mod_rewrite habilitado

# Instalação

- Extrair os arquivos no diretório desejado
- Acessar o diretório application/config/routes.php e completar a base_url
- Pronto!

# Estrutura de diretórios

- config
- controllers
- helpers
- models
- views

# Estrutura de URL's
```
seusite.com/classe/metodo/parametros
```

#Configurações

### application/config/routes.php
- $route['default_controller']	= 'main'; 
- $route['error_controller'] 		= 'erro';

##Banco de Dados
### application/config/database.php
- $db['db_host']      = ''; 
- $db['db_name']      = ''; 
- $db['db_username']  = ''; 
- $db['db_password']  = ''; 

#Loaders

- loadModel($nome)
- loadView($nome)
- loadHelper($nome)
- redirect($url)

#Controllers

```
<?php

class Main extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo "Olá mundo!";
    }
    
}
```
#Views

```
<?php

class Main extends Controller {
	
    function index()
    {
        $data['title'] = 'Mini Framework';
        $this->loadView('main_view', $data);
    }
    
}
```
então é chamado na view assim

```
<?php echo $title; ?>
```

#Models
```
<?php

class Usuarios_model extends Model {
	
    public function get_users($id)
    {
        $id         = $this->escapeString($id);
        $resultado  = $this->query('SELECT * FROM usuarios WHERE id="'. $id .'"');
        return $resultado;
    }

}
```

no controller então é chamado da seguinte maneira

```
function index()
{
    $usuario_model  = $this->loadModel('Usuarios_model');
    $resultado      = $usuario_model->get_users($id);
    
    $this->loadView('main', $resultado);
}
```
