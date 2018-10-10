-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2018 às 22:32
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_cat`
--

CREATE TABLE `cad_cat` (
  `id` int(11) NOT NULL,
  `nome_cat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_cat`
--

INSERT INTO `cad_cat` (`id`, `nome_cat`) VALUES
(9, 'AcessÃ³rios'),
(10, 'CalÃ§ados'),
(12, 'calÃ§as'),
(11, 'camisas'),
(6, 'feminino'),
(7, 'infantil'),
(8, 'juvenil'),
(5, 'masculino'),
(13, 'oculos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `id_produto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `id_produto`) VALUES
(33, 'masculino', '6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mensagem` varchar(600) NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `assunto`, `numero`, `email`, `mensagem`, `hora`) VALUES
(47, 'david o.', 'Compra', '4949494949', 'luizdosphp@gmail.com', 'Comprei uma camisa da Lacoste', '2018-10-08 16:56:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE `cor` (
  `id` int(11) NOT NULL,
  `id_produto` int(20) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `cor2` varchar(100) NOT NULL,
  `cor3` varchar(100) NOT NULL,
  `cor4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id`, `id_produto`, `cor`, `cor2`, `cor3`, `cor4`) VALUES
(21, 6, 'vermelho', 'azul', 'preto', 'verde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `desejos`
--

CREATE TABLE `desejos` (
  `id` int(11) NOT NULL,
  `produto_c` varchar(100) NOT NULL,
  `valor_c` int(100) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `id_produto` int(20) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `imagem2` varchar(100) NOT NULL,
  `imagem3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `id_produto`, `imagem`, `imagem2`, `imagem3`) VALUES
(30, 6, '927ca17060eb5c15e68fae3b28bd9b81.jpg', '0adcabde0cbee1227e57a1bf4f687fc8.jpg', '01cadef7bcbf5e2d7e5db7eb9cfeeea2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id` int(11) NOT NULL,
  `nomeus` varchar(300) CHARACTER SET latin1 NOT NULL,
  `id_usu` int(11) NOT NULL,
  `endereco` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(300) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(300) CHARACTER SET latin1 NOT NULL,
  `pais` varchar(300) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `informacoes`
--

INSERT INTO `informacoes` (`id`, `nomeus`, `id_usu`, `endereco`, `cidade`, `estado`, `pais`, `cep`) VALUES
(9, 'DAVID OLIVEIRA', 25, 'Rua Dr. Jose Torquato', 'Sao Miguel', 'Rio Grande do Norte', 'Brasil', '59920000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `id_user`, `status`) VALUES
(35, 47, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `preco` float NOT NULL,
  `comprador` varchar(300) NOT NULL,
  `cod` varchar(40) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(300) NOT NULL,
  `imagem` varchar(40) NOT NULL,
  `quantidade` int(20) NOT NULL,
  `valor` float NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `imagem`, `quantidade`, `valor`, `categoria`, `descricao`) VALUES
(6, 'Camisa Polo Lacoste Original Fit Masculina', '927ca17060eb5c15e68fae3b28bd9b81.jpg', 20, 350, 'masculino', 'Massa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `id_produto` int(20) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `tamanho2` varchar(100) NOT NULL,
  `tamanho3` varchar(100) NOT NULL,
  `tamanho4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `size`
--

INSERT INTO `size` (`id`, `id_produto`, `tamanho`, `tamanho2`, `tamanho3`, `tamanho4`) VALUES
(21, 6, 'P', 'M', 'G', 'GG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_admin`
--

CREATE TABLE `users_admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `urlImg` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users_admin`
--

INSERT INTO `users_admin` (`id`, `usuario`, `senha`, `nome`, `email`, `urlImg`) VALUES
(1, 'admin', 'admin', 'Administrador', 'admin@admin.com', 'avatar5.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `urlImg` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`, `urlImg`) VALUES
(25, 'LUIZDOSPHP@GMAIL.COM', '12345', 'DAVID OLIVEIRA', 'a37b57f1a8a397b89ddefffd89e00941.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cad_cat`
--
ALTER TABLE `cad_cat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_cat` (`nome_cat`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desejos`
--
ALTER TABLE `desejos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomeus` (`nomeus`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cad_cat`
--
ALTER TABLE `cad_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `desejos`
--
ALTER TABLE `desejos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
