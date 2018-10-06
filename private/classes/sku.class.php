<?php

class sku extends BDobject {
//-- Start of active record code --//
//static protected $database; ya no hace falta declararlo aca xq en extends esta declarado
static protected $table_name = 'productos_terminados';
static protected $db_columns = ['id', 'SKU','item_tipo','item_nombre','precio_doc','precio_unit','precio_web','precio_catalogo','precio_usd','tipo_color','estampado_color_uno','tipo_color_dos','estampado_color_dos','tipo_talla','talla','insert_date'];

  //INSERT-PUSH
  public function __construct($args=[]) {
    $this->SKU = $args['SKU'] ?? '';
    $this->item_tipo = $args['item_tipo'] ?? '';
    $this->item_nombre = $args['item_nombre'] ?? '';
    $this->precio_doc = $args['precio_doc'] ?? '';
    $this->precio_unit = $args['precio_unit'] ?? '';
    $this->precio_web = $args['precio_web'] ?? '';
    $this->precio_catalogo = $args['precio_catalogo'] ?? '';
    $this->precio_usd = $args['precio_usd'] ?? '';
    $this->tipo_color = $args['tipo_color'] ?? '';
    $this->estampado_color_uno = $args['estampado_color_uno'] ?? '';
    $this->tipo_color_dos = $args['tipo_color_dos'] ?? '';
    $this->estampado_color_dos = $args['estampado_color_dos'] ?? '';
    $this->tipo_talla = $args['tipo_talla'] ?? '';
    $this->talla = $args['talla'] ?? '';
  }

  //data validations para los formularios, input formularios
  //es unico para cada class, ver pag. funciones_validacion.php
    protected function validate(){
  		$this->errors = [];
  		if(is_blank($this->item_nombre)){
  			$this->errors[] = "completar nombre del producto";
  		}
      return $this->errors;
    }



//-- END of active record code --//
//MYSQL-Columnas de la tabla
  public $id;
  public $SKU;
  public $item_tipo;
  public $item_nombre;
  public $precio_doc;
  public $precio_unit;
  public $precio_web;
  public $precio_catalogo;
  public $precio_usd;
  public $tipo_color;
  public $estampado_color_uno;
  public $tipo_color_dos;
  public $estampado_color_dos;
  public $tipo_talla;
  public $talla;

  public $inserted_id;
}//END CLASS

?>
