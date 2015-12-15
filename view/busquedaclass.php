<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php
/**
**/
class Busqueda
{
	public $nombre;	
	public $apellidos;	
	public $sexo;	
    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre 
     *
     * @return self
     */
    private function _setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of apellidos.
     *
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }
    
    /**
     * Sets the value of apellidos.
     *
     * @param mixed $apellidos the apellidos 
     *
     * @return self
     */
    private function _setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Gets the value of sexo.
     *
     * @return mixed
     */
    public function getSexo()
    {
        echo "asdkjf";
        return $this->sexo;
    }
    
    /**
     * Sets the value of sexo.
     *
     * @param mixed $sexo the sexo 
     *
     * @return self
     */
    private function _setSexo($sexo)
    {
        $this->sexo = $sexo;
        
        return $this;
    }
}
?>