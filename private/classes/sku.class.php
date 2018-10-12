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

    //READ-PULL para paginations
    static public function find_all_offset_page($per_page='', $num_rows_offset=''){
    	$sql = "SELECT * FROM " . static::$table_name . "";
    	$sql .= " LIMIT ". self::$database->escape_string($per_page) ."";
    	$sql .= " OFFSET ". self::$database->escape_string($num_rows_offset) ."";
    	return static::find_by_sql($sql);
    }
    //READ-PULL para paginations con "like" value
    static public function find_all_offset_page_like($per_page='', $num_rows_offset='',$col='',$string=''){
    	$sql = "SELECT * FROM " . static::$table_name . "";
    	$sql .= " WHERE ".self::$database->escape_string($col)." LIKE '%".self::$database->escape_string($string)."%' ";
    	$sql .= " LIMIT ". self::$database->escape_string($per_page) ."";
    	$sql .= " OFFSET ". self::$database->escape_string($num_rows_offset) ."";
    	return static::find_by_sql($sql);
    }
    //READ-PULL para paginations con "like" value con 2 parametros
    static public function find_all_offset_page_like_2para($per_page='', $num_rows_offset='',$col='',$string='',$col2='',$string2=''){
    	$sql = "SELECT * FROM " . static::$table_name . "";
    	$sql .= " WHERE (".self::$database->escape_string($col)." LIKE '%".self::$database->escape_string($string)."%' ";
    	$sql .= " AND ".self::$database->escape_string($col2)." LIKE '%".self::$database->escape_string($string2)."%' )";
    	$sql .= " LIMIT ". self::$database->escape_string($per_page) ."";
    	$sql .= " OFFSET ". self::$database->escape_string($num_rows_offset) ."";
    	return static::find_by_sql($sql);
    }
    //READ-PULL para paginations con "like" value con 3 parametros
    static public function find_all_offset_page_like_3para($per_page='', $num_rows_offset='',$col='',$string='',$col2='',$string2='',$col3='',$string3=''){
      $sql = "SELECT * FROM " . static::$table_name . "";
      $sql .= " WHERE (".self::$database->escape_string($col)." LIKE '%".self::$database->escape_string($string)."%' ";
      $sql .= " AND ".self::$database->escape_string($col2)." LIKE '%".self::$database->escape_string($string2)."%' ";
      $sql .= " AND ".self::$database->escape_string($col3)." LIKE '%".self::$database->escape_string($string3)."%' )";
      $sql .= " ORDER BY ".self::$database->escape_string($col)."";
      $sql .= " LIMIT ". self::$database->escape_string($per_page) ."";
      $sql .= " OFFSET ". self::$database->escape_string($num_rows_offset) ."";
      return static::find_by_sql($sql);
    }
    //READ-PULL | like value en una columna
    static public function count_all_con_query($col='',$string=''){
    	$sql = "SELECT COUNT(*) FROM " . static::$table_name. ""; //se usa static y no self para que llame al child class
    	$sql .= " WHERE ".self::$database->escape_string($col)." LIKE '%".self::$database->escape_string($string)."%' ";
    	$return_set = self::$database->query($sql);
    	$row = $return_set->fetch_array();//fetch_array is used for 1 value result
    	return array_shift($row);
    }
    //READ-PULL | like value en dos columnas
    static public function count_all_con_query_2para($col='',$string='',$col2='',$string2=''){
    	$sql = "SELECT COUNT(*) FROM " . static::$table_name. ""; //se usa static y no self para que llame al child class
    	$sql .= " WHERE (".self::$database->escape_string($col)." LIKE '%".self::$database->escape_string($string)."%' ";
    	$sql .= " AND ".self::$database->escape_string($col2)." LIKE '%".self::$database->escape_string($string2)."%' )";
      $sql .= " ORDER BY ".self::$database->escape_string($col2)." ";
    	$return_set = self::$database->query($sql);
    	$row = $return_set->fetch_array();//fetch_array is used for 1 value result
    	return array_shift($row);
    }
    //READ-PULL | like value en tres columnas
    static public function count_all_con_query_3para($col='',$string='',$col2='',$string2='',$col3='',$string3=''){
      $sql = "SELECT COUNT(*) FROM " . static::$table_name. ""; //se usa static y no self para que llame al child class
      $sql .= " WHERE (".self::$database->escape_string($col)." LIKE '%".self::$database->escape_string($string)."%' ";
      $sql .= " AND ".self::$database->escape_string($col2)." LIKE '%".self::$database->escape_string($string2)."%' ";
      $sql .= " AND ".self::$database->escape_string($col3)." LIKE '%".self::$database->escape_string($string3)."%' )";
      $return_set = self::$database->query($sql);
      $row = $return_set->fetch_array();//fetch_array is used for 1 value result
      return array_shift($row);
    }
    //READ-PULL
    static public function find_all_filter($col,$string){
    	$sql = "SELECT * FROM ".static::$table_name." WHERE ".self::$database->escape_string($col)." = '".self::$database->escape_string($string)."' "; //escape string sirve para los sql injections
    	return static::find_by_sql($sql);
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
