-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2017 às 15:17
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usuarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `categorias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categorias`) VALUES
('Brinquedos'),
('Eletrônicos'),
('Material de construção'),
('Móveis'),
('Papelaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `nome_imagem` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` varchar(100) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`nome_imagem`, `nome`, `preco`, `descricao`, `categoria`) VALUES
('33517db000f37c4092586d045c1250e6.jpg', 'Caderno', 'R$9,88', 'Caderno universitário capa dura com calendários 2017 / 2018 / 2019, Planejamento Anual. Contém 100 folhas perfuradas com 4 furos.', 'Papelaria'),
('068d429cd4bc2f443af3a9bf3119e63b.jpg', 'Tijolo', 'R$0,99', 'Tijolos de Barro.Medida: 23x0,5x10,50(cm).', 'Material De Construção'),
('eb8fc82b9c9efdf43c8ac8993781bff1.jpg', 'Smartphone Samsung Galaxy J7', 'R$400,00', 'Smartphone Samsung Galaxy J7 Metal Dual Chip Android 6.0 Tela 5.5\" 16GB 4G Câmera 13MP - Dourado', 'Eletrônicos'),
('a7d8f145fd1f4ff58bfb37f05ad0ecda.jpg', 'Carrinhos Hot Wheels', 'R$12,00', 'Hot Wheels Pacote de 10 Carros Sortidos.', 'Brinquedos'),
('495a7e773887475cd8cba9b130c70684.jpg', 'Mini Carro Elétrico Infantil BMW X6', 'R$200,99', 'Mini Carro Elétrico Infantil BMW X6 - com Controle Remoto 2 Marchas.', 'Brinquedos'),
('e730bb7bdfacfb00511edaca4b13ec2c.jpg', 'Caneta', 'R$30,00', 'Caneta Cross Nile - Esferográfica - Preta Fosca.', 'Papelaria'),
('885b57de4093d9cea6bcb350f2613ec0.jpg', 'Quebra-cabeça', 'R$40,99', 'Quebra-cabeça de 1000 peças.', 'Brinquedos'),
('dd790f632370877cf4f431c6dd66674a.jpg', 'Armário de cozinha', 'R$450,00', 'Armário Cozinha Compacta Julia 4 Peças branco Poquema.', 'Móveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `usuario`, `senha`, `email`, `endereco`) VALUES
('Alessandra Harumi Lopes Kikuchi', 'alessandra', '4f0113f6b71eb5cee02e52a509281417', 'alessandrahlk@gmail.com', 'Rua Maria, 54 Centro Ourinhos - SP'),
('vendedor', 'vendedor', '0407e8c8285ab85509ac2884025dcf42', 'vendedor', 'vendedor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categorias`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
