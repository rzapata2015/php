<?php
abstract class basedatos{
    
    private $BaseDatos = "bd_hoja_vida_pc";
    private $Servidor = "localhost";
    private $Usuario = "root";
    private $Clave = "";

    /*
    private $BaseDatos = "bd_hoja_vida_pc";
    private $Servidor = "localhost";
    private $Usuario = "user_hoja_vidapc";
    private $Clave = "UserHoja2017";
    */
    protected $Conexion_ID;
    protected $Consulta_ID;
    protected $Consulta_SQL;
    protected $ResultadoCon;

    protected $ErrNo;
    protected $ErrTxt;

    protected $tabla = "";

    abstract protected function consultar();
    abstract protected function insertar();
    abstract protected function actualizar();
    abstract protected function eliminar();

    public function conectar(){
        $this->limpiarerror();
        try{
            $this->Conexion_ID = new PDO('mysql:host='.$this->Servidor.';dbname='.$this->BaseDatos, $this->Usuario, $this->Clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'", PDO::MYSQL_ATTR_LOCAL_INFILE => true));
        }catch(PDOException $e){
            $this->ErrNo = -1;
            $this->ErrTxt = $e->getMessage();
        }
     }

    protected function desconectar(){
        $this->Conexion_ID = NULL;
    }

    private function prepararSQL($sql){
        $this->Consulta_SQL = $sql;
        $this->conectar();
        if($this->validarerror() && $this->Conexion_ID){
            try{
   	           $this->Consulta_ID = $this->Conexion_ID->prepare($this->Consulta_SQL);
                return true;
            }catch(PDOException $e){
                $this->ErrNo = -1;
                $this->ErrTxt = $e->getMessage();
                $this->desconectar();
                return false;
            }
        }
        $this->desconectar();
        return false;
    }

    private function ejecutarSQL($parametros){
        if($this->Conexion_ID && $this->validarerror()){
            try{
                if($parametros){
                    $this->Consulta_ID->execute($parametros);
                }else{
                    $this->Consulta_ID->execute();
                }
                $errores = $this->Consulta_ID->errorInfo();
                $this->ErrNo = $errores[0];
                $this->ErrTxt = $errores[2];

                return $this->validarerror();
            }catch(PDOException $e){
                $this->ErrTxt = $e->getMessage();
                return false;
            }
        }
        return false;
    }

    protected function cargarTodo(){
        if($this->validarerror()){
            $this->ResultadoCon = $this->Consulta_ID->fetchAll();
        }else{
            $this->ResultadoCon = false;
        }
        $this->desconectar();
        return($this->ResultadoCon);
    }

    protected function cargarRegistro(){
        if($this->validarerror()){
            $this->ResultadoCon = $this->Consulta_ID->fetch(PDO::FETCH_BOTH);
        }else{
            $this->ResultadoCon = false;
        }
        return($this->ResultadoCon);
    }

    protected function consultaSQL($sql, $parametros = NULL){
        if(!$this->Conexion_ID){
            if($this->prepararSQL($sql)){
                return $this->ejecutarSQL($parametros);
            }
            $this->desconectar();
            return false;
        }
        $this->desconectar();
        return false;
    }

    public function listarTodos(){
        $sql = sprintf("SELECT * FROM %s ", $this->tabla);
        $this->consultaSQL($sql);
        return $this->cargarTodo();
    }

    public function insertarRegistros($campos, $valores){
        $lerror = array();
        $i = 0;
        $parametros = "";
        $lcampos = "";

        foreach($campos as $x){
            $lcampos .= sprintf("%s, ", $x);
            $parametros .= sprintf(":campo%s, ", $i);
            $i++;
        }

        $lcampos = substr($lcampos, 0, -2);
        $parametros = substr($parametros, 0, -2);

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $this->tabla, $lcampos, $parametros);

        if($this->prepararSQL($sql)){
            $cont = 0;
            for($i=0; $i<count($valores); $i++){
                $this->limpiarerror();
                if(count($campos) != count($valores[$i])){
                    $lerror[$i] = "Los campos no coinciden con los valores";
                }else{
                    $lvalores = array();
                    for($j=0; $j<count($valores[$i]); $j++){
                        $lvalores["campo".$j] = $valores[$i][$j];
                    }
                    if($this->ejecutarSQL($lvalores)){
                        $lerror[$i] = "OK";
                        }else{
                            $lerror[$i] = $this->imprimirError();
                        }
                        $lvalores = NULL;
                    }
                }
                $this->desconectar();
                return $lerror;
            }else{
                $this->desconectar();
                return false;
            }
        }

    public function actualizarRegistros($campos, $valores, $llaveprimaria, $valorllaveprimaria){
        $i = 0;
        $act = "";

        foreach($campos as $x){
            $act .= sprintf("%s = :campo%s, ", $x, $i);
            $i++;
        }

        $act = substr($act, 0, -2);

        $i=0;
        $cond = sprintf("%s = :campocon ", $llaveprimaria);

        $sql = sprintf("UPDATE %s SET %s WHERE %s", $this->tabla, $act, $cond);

        if($this->prepararSQL($sql)){
            if(count($campos) != count($valores)){
                $this->ErrTxt = "Los campos no coinciden con los valores";
                $this->ErrNo = "XXXX";
                return false;
            }
            for( $i=0; $i<count($valores); $i++){
                $lvalores["campo".$i] = $valores[$i];
            }
            $lvalores["campocon"] = $valorllaveprimaria;

            if(!$this->ejecutarSQL($lvalores)){
                return false;
            }
        }else{
            return false;
        }
        return true;
    }

    public function imprimirError(){
        return sprintf("Error: %s - %s", $this->ErrNo, $this->ErrTxt);
    }

    private function validarerror(){
        $estado = true;
        if($this->ErrNo != '00000' && $this->ErrNo != '' && $this->ErrTxt != '00000' && $this->ErrTxt != ''){
            $estado = false;
        }
        return $estado;
    }

    private function limpiarerror(){
        $this->ErrNo = "";
        $this->ErrTxt = "";
    }

    public function imprimirsql(){
        return $this->Consulta_SQL;
    }
    public function validarNULL($valor){
        if($valor == "")
            return NULL;
        return $valor;
    }
}
?>
