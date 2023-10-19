-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2017 at 02:48 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_compras_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `prim_nome_admin` varchar(50) NOT NULL,
  `sobre_nome_admin` varchar(50) NOT NULL,
  `cpf_admin` varchar(15) NOT NULL,
  `telefone_admin` varchar(20) NOT NULL,
  `email_admin` varchar(70) NOT NULL,
  `cep_admin` varchar(10) NOT NULL,
  `senha_admin` varchar(100) NOT NULL,
  `nivel` varchar(5) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `prim_nome_admin`, `sobre_nome_admin`, `cpf_admin`, `telefone_admin`, `email_admin`, `cep_admin`, `senha_admin`, `nivel`) VALUES
(2, 'admin', 'admin', '001', '40028922', 'admin@email.com', '001', '$2y$10$EKZ9jB15qLHL.DNXChE32OrE28ULdT9ogVAWbhisImzeeC2GX.ifS', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `prim_nome_cliente` varchar(50) NOT NULL,
  `sobre_nome_cliente` varchar(45) NOT NULL,
  `cep_cliente` varchar(10) NOT NULL,
  `telefone_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(70) NOT NULL,
  `cpf_cliente` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` char(5) NOT NULL DEFAULT 'comum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_func`
--

CREATE TABLE `tb_func` (
  `id_func` int(10) UNSIGNED NOT NULL,
  `prim_nome_func` varchar(50) NOT NULL,
  `sobre_nome_func` varchar(50) NOT NULL,
  `cpf_func` varchar(15) NOT NULL,
  `telefone_func` varchar(20) NOT NULL,
  `email_func` varchar(70) NOT NULL,
  `cep_func` varchar(10) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `preco_produto` decimal(10,0) UNSIGNED NOT NULL,
  `qtd_estoque_produto` int(10) UNSIGNED NOT NULL,
  `img_produto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `preco_produto`, `qtd_estoque_produto`, `img_produto`) VALUES
(1, 'Watch Dogs PS4', '35', 10, 'watchdogs.jpg'),
(3, 'The Last of Us PS4', '59', 10, 'thelast.jpg'),
(4, 'Infamous Second Son PS4', '45', 5, 'infamous.jpg'),
(5, 'The Crew PS4', '40', 9, 'thecrew.jpg'),
(7, 'Battlefield 1', '85', 5, '122b11d836bbadfbd1043fcd3ef89ca7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `cpf_func_UNIQUE` (`cpf_admin`);

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`),
  ADD UNIQUE KEY `cpf_cliente_UNIQUE` (`cpf_cliente`);

--
-- Indexes for table `tb_func`
--
ALTER TABLE `tb_func`
  ADD PRIMARY KEY (`id_func`),
  ADD UNIQUE KEY `cpf_func_UNIQUE` (`cpf_func`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD UNIQUE KEY `id_produto_UNIQUE` (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_func`
--
ALTER TABLE `tb_func`
  MODIFY `id_func` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;