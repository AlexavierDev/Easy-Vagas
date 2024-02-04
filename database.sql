-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Fev-2024 às 09:47
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `parksystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nivel_permissao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_permissao`) VALUES
(17, 'Admin', 'admin@easyvagas.com', '$2y$10$cNO7qWWZdnXh9xQdIUF6QesFU57VXgZp7CziiBGWRoMrRBT1i8KFO', 'ADMIN'),
(16, 'Funcionario 01', 'funcionario@easyvagas.com', '$2y$10$0UiyD7R670.WfECvbHQqiudp/MIUQrWK43uZuObA7q601u6/z5vlC', 'FUNCIONARIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_proprietario` varchar(100) NOT NULL,
  `categoria` enum('CARRO','MOTO','CAMINHAO') NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `data_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `hora_saida` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `nome_proprietario`, `categoria`, `modelo`, `placa`, `cor`, `data_registro`, `hora_saida`) VALUES
(19, 'CARLOS', 'CARRO', 'CELTA', 'ABC1234', 'AMARELO', '2023-09-13 11:55:06', '2023-09-13 10:13:27'),
(6, 'ALEXSANDRO', 'CARRO', 'HILUX', 'NCO-4920', 'PRETO', '2023-07-24 23:27:58', '2023-07-25 13:32:20'),
(7, 'ALEXSANDRO', 'CARRO', 'HILUX', 'NCO-4920', 'PRETO', '2023-07-24 23:29:36', '2023-07-25 13:34:34'),
(8, 'ALEXSANDRO', 'CARRO', 'HILUX', 'NCO-4920', 'PRETO', '2023-07-24 23:34:24', '2023-07-25 13:36:56'),
(9, 'DSDS', 'CAMINHAO', 'HILUX', 'IAC-123444S', 'PRETO', '2023-07-25 01:44:59', '2023-07-25 13:23:41'),
(10, 'ALEXSANDRO', 'CARRO', 'HILUX', 'ABC-1234', 'PRETO', '2023-07-25 02:08:05', '2023-07-25 13:41:17'),
(11, 'ALEXSANDRO', 'CAMINHAO', 'HILUX', 'ASASASAS', 'PRETO', '2023-07-25 02:08:56', '2023-07-25 13:23:10'),
(12, 'ALEXSANDRO', 'CARRO', 'HILUX', 'ABC-1234', 'PRETO', '2023-07-25 02:26:29', '2023-07-25 14:32:44'),
(13, 'ALEXSANDRO', 'CARRO', 'HILUX', 'ABC1234', 'PRETO', '2023-07-25 12:49:29', '2023-07-25 14:41:15'),
(14, 'ALEXSANDRO', 'CAMINHAO', 'HILUX', 'ABC1234', 'PRETO', '2023-07-25 13:06:58', '2023-07-25 14:43:21'),
(15, 'ALEXSANDRO', 'CARRO', 'HILUX', 'NCO-4920', 'PRETO', '2023-07-25 17:41:26', '2023-07-26 21:13:22'),
(16, 'JOSE', 'CAMINHAO', 'HILUX', 'ABC1234', 'PRETO', '2023-07-25 17:41:42', '2023-07-27 11:06:24'),
(17, 'JOSE', 'CAMINHAO', 'MERCEDES', 'ABC1234', 'PRETO', '2023-07-25 19:20:47', '2023-07-25 16:20:58'),
(18, 'JOSE', 'CARRO', 'HILUX', 'ABC1234', 'SDSDS', '2023-07-26 22:54:34', '2023-09-13 08:42:28'),
(20, 'ROBSON', 'MOTO', 'HONDA 160', 'ABC1234', 'PRETO', '2023-09-13 11:56:32', '2023-09-13 10:13:52'),
(21, 'ROBSON', 'MOTO', 'HONDA 160', 'ABC1234', 'PRETO', '2023-09-13 11:57:12', '2023-09-13 10:16:30'),
(22, 'ROBSON', 'CAMINHAO', 'SCANIA', 'ABC1234', 'PRETO', '2023-09-13 11:57:33', '2023-09-13 10:22:34'),
(23, 'ROBSON', 'CAMINHAO', 'SCANIA', 'ABC1234', 'PRETO', '2023-09-13 11:58:18', '2024-02-04 05:36:36'),
(24, 'TESTE', 'CARRO', 'SCANIA', 'ABC1234', 'PRETO', '2024-02-04 08:37:11', '2024-02-04 05:37:43'),
(25, 'JOSE', 'CARRO', 'HILUX', 'ABC1234', 'PRETO', '2024-02-04 08:38:09', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
