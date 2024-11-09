-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2024 a las 19:54:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeinventarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id_detalle_compra` int(11) NOT NULL,
  `identificador_compra` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_compra` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Disparadores `detalle_compras`
--
DELIMITER $$
CREATE TRIGGER `after_insert_compra` AFTER INSERT ON `detalle_compras` FOR EACH ROW BEGIN
    UPDATE tb_almacen
    SET stock = stock + NEW.cantidad
    WHERE identificador = NEW.id_producto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_venta` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Disparadores `detalle_ventas`
--
DELIMITER $$
CREATE TRIGGER `after_insert_venta` AFTER INSERT ON `detalle_ventas` FOR EACH ROW BEGIN
    UPDATE tb_almacen
    SET stock = stock - NEW.cantidad
    WHERE identificador = NEW.id_producto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `identificador` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` decimal(15,2) NOT NULL,
  `precio_venta` decimal(15,2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`identificador`, `codigo`, `nombre`, `descripcion`, `stock`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`) VALUES
(28, '004', 'ORDENADOR PAVILON', 'Ordenador de mesa', 20, 400.00, 750.00, '2024-10-21', '2024-07-27-07-59-30__ordenador de sobremesa hp pavilion.jpg', 0),
(29, '0020', 'ORDENADOR PAVILON', 'ordenador de mesa', 20, 400.00, 700.00, '2024-10-21', '2024-07-27-07-59-30__ordenador de sobremesa hp pavilion.jpg', 0),
(30, '0020', 'ORDENADOR HP', 'ordenador de mesa', 20, 200.00, 400.00, '2024-10-21', '2024-07-27-07-59-30__ordenador de sobremesa hp pavilion.jpg', 0),
(31, '0036', 'TECLADO', 'TECLADO INHALAMBRICO', 20, 40.00, 60.00, '2024-10-21', '2024-07-27-07-59-30__ordenador de sobremesa hp pavilion.jpg', 0),
(33, '0001', 'monitor', 'LG', 20, 100.00, 150.00, '2024-10-21', '2024-07-27-07-59-30__ordenador de sobremesa hp pavilion.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen_categoria`
--

CREATE TABLE `tb_almacen_categoria` (
  `id_Almacen_Categoria` int(11) NOT NULL,
  `id_Almacen` int(11) NOT NULL,
  `id_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_almacen_categoria`
--

INSERT INTO `tb_almacen_categoria` (`id_Almacen_Categoria`, `id_Almacen`, `id_Categoria`) VALUES
(10, 29, 1),
(11, 30, 1),
(12, 31, 12),
(14, 33, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id_carrito` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `identificador_cat` int(11) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`identificador_cat`, `categoria`) VALUES
(1, 'Ordenadores: \"de Escritorio\"'),
(2, 'Ordenadores: \"Laptops y portátiles\"'),
(3, 'Ordenadores: \"Estaciones de trabajo\"'),
(4, 'Ordenadores: \"Servidores\"'),
(5, 'Componentes de Hardware: \"Discos duros\"'),
(6, 'Componentes de Hardware: \"Tarjetas de video\"'),
(7, 'Componentes de Hardware: \"Memorias RAM\"'),
(8, 'Componentes de Hardware: \"Procesadores\"'),
(9, 'Componentes de Hardware: \"Placas base\"'),
(10, 'Componentes de Hardware: \"Fuentes de Alimentación\"'),
(11, 'Accesorios para Ordenadores: \"Monitores\"'),
(12, 'Accesorios para Ordenadores: \"Teclados y ratones\"'),
(13, 'Accesorios para Ordenadores: \"Altavoces y auriculares\"'),
(14, 'Accesorios para Ordenadores: \"Cables y adaptadores\"'),
(15, 'Accesorios para Ordenadores: \"Fundas y maletines\"'),
(18, 'Impresoras y Escáneres: \"Impresoras multifunción\"'),
(21, 'Software: \"Suites de oficina\"'),
(23, 'Software:  \"Aplicaciones de diseño gráfico\"'),
(25, 'Redes y comunicaciones: \"Routers y switches\"'),
(26, 'Redes y comunicaciones: \"Tarjetas de red\"'),
(27, 'Redes y comunicaciones: \"Cables de red\"'),
(28, 'Redes y comunicaciones: \"Firewalls y dispositivos de seguridad\"'),
(29, 'Redes y comunicaciones: \"Teléfonos IP\"'),
(31, 'Almacenamiento: \"Unidades de estado sólido SSD\"'),
(32, 'Almacenamiento: \"Servidores de almacenamiento en red (NAS)\"'),
(33, 'Almacenamiento: \"Soluciones de almacenamiento en la nube\"'),
(34, 'Electrónica de consumo: \"Teléfonos inteligentes y tabletas\"'),
(35, 'Electrónica de consumo: \"Cámaras digitales y videocámaras\"'),
(36, 'Electrónica de consumo: \"Televisores y monitores de alta definición\"'),
(37, 'Electrónica de consumo: \"Dispositivos de streaming de medios\"'),
(38, 'Componentes Electrónicos: \"Circuitos integrados y microcontroladores\"'),
(39, 'Componentes Electrónicos: \"Sensores\"'),
(40, 'Componentes Electrónicos: \"Pantallas táctiles y pantallas LCD\"'),
(41, 'Componentes Electrónicos: \"Baterías y pilas\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `identificador` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `nif_cliente` varchar(255) NOT NULL,
  `telefono_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`identificador`, `nombre_cliente`, `nif_cliente`, `telefono_cliente`, `email_cliente`, `fyh_creacion`) VALUES
(6, 'Jose  Velez', '0914xxxxF', '615624xxxx', 'jose@gmail.com', '2024-10-21 00:00:00'),
(7, 'Lukas Perez', '0914xxxxF', '9124578365', 'lukas@gmail.com', '2024-10-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `identificador` int(11) NOT NULL,
  `empresa_proveedor` varchar(255) NOT NULL,
  `nif_proveedor` varchar(50) NOT NULL,
  `contacto_proveedor` varchar(255) NOT NULL,
  `telefono_proveedor` varchar(50) DEFAULT NULL,
  `email_proveedor` varchar(50) DEFAULT NULL,
  `direccion_proveedor` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`identificador`, `empresa_proveedor`, `nif_proveedor`, `contacto_proveedor`, `telefono_proveedor`, `email_proveedor`, `direccion_proveedor`, `fyh_creacion`) VALUES
(14, 'CABLES Y REDES', 'B8202020', 'Roberto Medina', '69012xxxx', 'cablesyredes@gmail.com', 'LA VAGUADA MADRID', '2024-10-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `identificador_rol` int(11) NOT NULL,
  `nombreRol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`identificador_rol`, `nombreRol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2023-01-23 23:15:19', '2023-01-23 23:15:19'),
(2, 'ALMACEN', '2023-01-24 08:28:24', '0000-00-00 00:00:00'),
(26, 'ESPECIALISTA ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `identificador` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`identificador`, `nombres`, `email`, `password_user`) VALUES
(3, 'MARTHA LILIANA GIRALDO CABALLERO', 'cegc35@hotmail.com', '12345678'),
(95, 'Ricardo Perez', 'ricardo@gmail.com', '$2y$10$Pl6u4CHH1lrcIWRF3rY0Tect/PpEXmEJ8TKOIGN0xcUmeR0UMSsyq'),
(96, 'otros', 'otros@gmail.com', '$2y$10$bwLG9AmU4qEiVZormLwAGOTiBMZX7Km3nUVNO2PSeDc1fu8tRymza'),
(97, 'usuario', 'usuario@gmail.com', '$2y$10$WI5cAVUDSHYf4.JdDQReGOgTSIPs/g5ZPsG44AEVz7ZYgKBSoK4B2'),
(101, 'rafael', 'rafael@gmail.com', '$2y$10$9U1fEIyJHhm9vBiu.uG5mufMIc8h/uzPCqD3LZYkbiBfw.BWNzvYS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios_roles`
--

CREATE TABLE `tb_usuarios_roles` (
  `user_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios_roles`
--

INSERT INTO `tb_usuarios_roles` (`user_id`, `rol_id`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id_detalle_compra`),
  ADD KEY `identificador_compra` (`identificador_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `fk_venta` (`id_venta`),
  ADD KEY `fk_producto` (`id_producto`) USING BTREE;

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `tb_almacen_categoria`
--
ALTER TABLE `tb_almacen_categoria`
  ADD PRIMARY KEY (`id_Almacen_Categoria`),
  ADD KEY `id_Almacen` (`id_Categoria`) USING BTREE,
  ADD KEY `id_Almacen_2` (`id_Almacen`) USING BTREE;

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_venta` (`nro_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`identificador_cat`) USING BTREE;

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`identificador`) USING BTREE;

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`identificador`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`identificador_rol`) USING BTREE;

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`identificador`) USING BTREE;

--
-- Indices de la tabla `tb_usuarios_roles`
--
ALTER TABLE `tb_usuarios_roles`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD KEY `rol_id` (`rol_id`) USING BTREE;

--
-- Indices de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tb_almacen_categoria`
--
ALTER TABLE `tb_almacen_categoria`
  MODIFY `id_Almacen_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `identificador_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `identificador_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios_roles`
--
ALTER TABLE `tb_usuarios_roles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`identificador_compra`) REFERENCES `tb_compras` (`id_compra`),
  ADD CONSTRAINT `detalle_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`identificador`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`identificador`),
  ADD CONSTRAINT `fk_venta` FOREIGN KEY (`id_venta`) REFERENCES `tb_ventas` (`id_venta`);

--
-- Filtros para la tabla `tb_almacen_categoria`
--
ALTER TABLE `tb_almacen_categoria`
  ADD CONSTRAINT `tb_almacen_categoria_ibfk_1` FOREIGN KEY (`id_Almacen`) REFERENCES `tb_almacen` (`identificador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_categoria_ibfk_2` FOREIGN KEY (`id_Categoria`) REFERENCES `tb_categorias` (`identificador_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`identificador`);

--
-- Filtros para la tabla `tb_usuarios_roles`
--
ALTER TABLE `tb_usuarios_roles`
  ADD CONSTRAINT `tb_usuarios_roles_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `tb_roles` (`identificador_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usuarios_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_usuarios` (`identificador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`identificador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
