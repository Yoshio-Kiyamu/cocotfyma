create table productos_terminados (
id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
SKU VARCHAR(255) NOT NULL,
item_tipo VARCHAR(50) NOT NULL,
item_nombre VARCHAR(255) NOT NULL,
precio_doc Decimal(4,2) not null,
precio_unit Decimal(4,2) not null,
precio_web Decimal(4,2) not null,
precio_catalogo Decimal(4,2) not null,
precio_usd Decimal(4,2) not null,
tipo_color VARCHAR(50) NOT NULL,
estampado_color_uno VARCHAR(255) NOT NULL,
tipo_color_dos VARCHAR(50) NOT NULL,
estampado_color_dos VARCHAR(255) NOT NULL,
tipo_talla VARCHAR(50) NOT NULL,
talla VARCHAR(50) NOT NULL,
insert_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


SKU, item_tipo, item_nombre, precio_doc, precio_unit, precio_web, precio_catalogo, precio_usd, tipo_color, estampado_color_uno, tipo_color_dos, estampado_color_dos, tipo_talla, talla, insert_date
