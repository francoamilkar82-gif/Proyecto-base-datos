------------------------------------------------
--**Ventas por usuario**--
------------------------------------------------
SELECT
u.nombre,
u.apellido,
COUNT(v.id_venta) AS total_ventas

FROM usuario u

JOIN venta v
ON u.id_usuario=v.id_usuario

GROUP BY
u.nombre,
u.apellido;
------------------------------------------------
--**Total vendido**--
------------------------------------------------
SELECT

SUM(total_venta)

FROM venta;
------------------------------------------------
--**Productos por categoría**--
------------------------------------------------
SELECT

c.nombre_categoria,
COUNT(p.id_producto)

FROM categoria c

JOIN producto p
ON c.id_categoria=p.id_categoria

GROUP BY
c.nombre_categoria;
------------------------------------------------
--**Inventario por sucursal**--
------------------------------------------------
SELECT

s.nombre,
SUM(i.cantidad)

FROM sucursal s

JOIN inventario i
ON s.id_sucursal=i.id_sucursal

GROUP BY
s.nombre;