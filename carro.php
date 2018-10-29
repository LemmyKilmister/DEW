<?php
error_reporting(E_WARNING);

class Cart
{

    public $articulos = array();

    // Funcion Meter
    function meter($nombrePedido, $cantidad)
    {
        if (array_key_exists($nombrePedido, $this->articulos)) {

            $this->articulos[$nombrePedido] += $cantidad;
        } else {

            $this->articulos[$nombrePedido] = $cantidad;
        }
    }

    // Funcion Sacar
    function sacar($nombrePedido, $cantidad)
    {
        if (array_key_exists($nombrePedido, $this->articulos)) {

            $this->articulos[$nombrePedido] -= $cantidad;
        } else {

            echo "No existe";
        }

        foreach ($this->articulos as $index => $valor) {

            if ($valor <= 0) {

                unset($this->articulos[$index]);
            }
        }
    }

    function __constructor($idArticulo, $cantidad)
    {
        $this->articulos["$idArticulo"] = $cantidad;
    }
}

class SubC extends Cart
{

    public $cliente = "";

    public $pedido = array();

    function __constructor()
    {
        $cliente = "";
        $this->$pedido = new Cart("hola", 3);
        $this->pedido->meter($this->pedido->idArticulo, $this->pedido->cantidad);
    }

    function establecer($nuevo)
    {
        $this->cliente = "$nuevo";
        echo "Ha sido establecido el cliente: $nuevo";
    }
    
      
}

$carro = new SubC("jamones", 34);
$carro->establecer("Cliente");
echo "<br>  ";

$carro->meter("jamones", 100);
/*
foreach ($carro->articulos as $index => $valor) {

    echo $carro->cliente . " ha pedido " . $carro->articulos[$index] . " unidad/es de $index" . "<br>";
}



$carro->meter("cosas", 23);
foreach ($carro->articulos as $index => $valor) {

    echo $carro->cliente . " ha pedido " . $carro->articulos[$index] . " unidad/es de $index" . "<br>";
}
*/

$carro->sacar("jamones", 13);
foreach ($carro->articulos as $index => $valor) {

    echo $carro->cliente . " ha extraido cantidades y ahora hay  " . $carro->articulos[$index] . " unidad/es de $index" . "<br>";
}
/*

echo $carro->cliente . " Es el cliente actual";
echo "<br>";
*/

?>
