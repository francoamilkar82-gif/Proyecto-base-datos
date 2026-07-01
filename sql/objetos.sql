------------------------------------------------
--***View1***--
------------------------------------------------
CREATE OR REPLACE VIEW vista_productos AS
SELECT
    p.id_producto,
    p.nombre,
    p.descripcion,
    p.precio,

    c.nombre_categoria,
    m.nombre_marca,
    pr.nombre_proveedor,
    t.nombre_talla,
    co.nombre_color,
    s.nombre AS sucursal

FROM producto p

INNER JOIN categoria c
ON p.id_categoria = c.id_categoria

INNER JOIN marca m
ON p.id_marca = m.id_marca

INNER JOIN proveedor pr
ON p.id_proveedor = pr.id_proveedor

INNER JOIN talla t
ON p.id_talla = t.id_talla

INNER JOIN color co
ON p.id_color = co.id_color

INNER JOIN sucursal s
ON p.id_sucursal = s.id_sucursal;
------------------------------------------------
--***View2***--
------------------------------------------------
CREATE OR REPLACE VIEW vista_inventario AS

SELECT

i.id_inventario,
p.nombre,
i.cantidad,
s.nombre AS sucursal

FROM inventario i

INNER JOIN producto p
ON i.id_producto=p.id_producto

INNER JOIN sucursal s
ON i.id_sucursal=s.id_sucursal;
------------------------------------------------
--***View3**--
------------------------------------------------
CREATE OR REPLACE VIEW vista_ventas AS

SELECT

v.id_venta,
u.nombre,
u.apellido,
v.fecha_venta,
v.total_venta

FROM venta v

INNER JOIN usuario u
ON v.id_usuario=u.id_usuario;
------------------------------------------------
--**Trigger Function 1**--
------------------------------------------------
CREATE OR REPLACE FUNCTION calcular_subtotal()

RETURNS TRIGGER

AS $$

BEGIN

NEW.subtotal:=NEW.cantidad*NEW.precio_unitario;

RETURN NEW;

END;

$$ LANGUAGE plpgsql;
------------------------------------------------
--**Trigger 1**--
------------------------------------------------
CREATE TRIGGER trg_calcular_subtotal

BEFORE INSERT

ON detalle_venta

FOR EACH ROW

EXECUTE FUNCTION calcular_subtotal();
------------------------------------------------
--**Trigger Function 2**--
------------------------------------------------
CREATE OR REPLACE FUNCTION disminuir_inventario()

RETURNS TRIGGER

AS $$

BEGIN

UPDATE inventario

SET cantidad=cantidad-NEW.cantidad

WHERE id_inventario=NEW.id_inventario;

RETURN NEW;

END;

$$ LANGUAGE plpgsql;
------------------------------------------------
--**Trigger 2**--
------------------------------------------------
CREATE TRIGGER trg_disminuir_inventario

AFTER INSERT

ON detalle_venta

FOR EACH ROW

EXECUTE FUNCTION disminuir_inventario();
------------------------------------------------
--**Procedimiento 1**--
------------------------------------------------
CREATE OR REPLACE PROCEDURE registrar_categoria(

p_nombre VARCHAR,
p_descripcion TEXT

)

LANGUAGE plpgsql

AS $$

BEGIN

INSERT INTO categoria

(nombre_categoria,descripcion)

VALUES

(p_nombre,p_descripcion);

END;

$$;
------------------------------------------------
--**Procedimiento 2**--
------------------------------------------------
CREATE OR REPLACE PROCEDURE registrar_marca(

p_nombre VARCHAR

)

LANGUAGE plpgsql

AS $$

BEGIN

INSERT INTO marca

(nombre_marca)

VALUES

(p_nombre);

END;

$$;
------------------------------------------------
--**Procedimiento 3**--
------------------------------------------------
CREATE OR REPLACE PROCEDURE registrar_producto(
    p_nombre VARCHAR,
    p_descripcion TEXT,
    p_precio NUMERIC,
    p_categoria INT,
    p_marca INT,
    p_proveedor INT,
    p_talla INT,
    p_color INT,
    p_sucursal INT
)

LANGUAGE plpgsql

AS $$

BEGIN

INSERT INTO producto
(
nombre,
descripcion,
precio,
id_categoria,
id_marca,
id_proveedor,
id_talla,
id_color,
id_sucursal
)

VALUES
(
p_nombre,
p_descripcion,
p_precio,
p_categoria,
p_marca,
p_proveedor,
p_talla,
p_color,
p_sucursal
);

END;

$$;
------------------------------------------------
--**REGISTRO**--
------------------------------------------------
CREATE TABLE auditoria_productos (
    id_auditoria SERIAL PRIMARY KEY,
    id_producto INT,
    accion VARCHAR(20),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE OR REPLACE FUNCTION fn_auditoria_producto()
RETURNS TRIGGER
AS $$
BEGIN

    INSERT INTO auditoria_productos(
        id_producto,
        accion
    )
    VALUES(
        NEW.id_producto,
        'INSERT'
    );

    RETURN NEW;

END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER trg_auditoria_producto
AFTER INSERT
ON producto
FOR EACH ROW
EXECUTE FUNCTION fn_auditoria_producto();