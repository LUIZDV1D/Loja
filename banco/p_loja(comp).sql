-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Out-2018 às 17:08
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(6, 'feminino'),
(7, 'infantil'),
(8, 'juvenil'),
(5, 'masculino');

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
(28, 'masculino', '1'),
(29, 'CalÃ§ados', '2'),
(30, 'masculino', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `produto_c` varchar(100) NOT NULL,
  `valor_c` int(100) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `numero` int(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mensagem` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `assunto`, `numero`, `email`, `mensagem`) VALUES
(21, 'David', 'testando', 99999999, 'david@gmail.com', 'testandoinhoinho'),
(22, 'JoÃ£o Carlos', 'reclamaÃ§Ã£o', 2147483647, 'joao@gmail.com', 'seus produtos sÃ£o um lixo!!'),
(23, 'Manoel Carvalho', 'Compra', 2147483647, 'manoel@gmail.com', 'compra realizada.');

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
(16, 1, 'vermelho', 'azul', 'preto', 'verde'),
(17, 2, 'vermelho', 'azul', 'preto', 'verde'),
(18, 3, 'vermelho', 'azul', 'preto', 'verde');

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
(25, 1, '59d0bb624b3abfc88053982e0263c042.jpg', 'e27836d5f3981133c80ce31356dd384a.jpg', '9e73942307f8484549e40d018aa80e70.jpg'),
(26, 2, 'cc88df17da569b9895b3b9d2616bc1c4.jpg', '647d882e10e14c78f461be875782deaa.jpg', '8ae9c96b2a87b32a44116444738bed8e.jpg'),
(27, 3, '106ff40605f22ffddfb007d08ba75d20.jpg', '1c0cc2dbca17b5703cae5d101ad07a5e.jpg', '6a51daf2235d0ed8adec409824401ef3.jpg');

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
(9, 21, 0),
(10, 22, 0),
(11, 23, 0);

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
(1, 'Camisa Polo e dois moletons Dragon Ball ', '59d0bb624b3abfc88053982e0263c042.jpg', 20, 249.9, 'masculino', '100% de qualidade'),
(2, 'TÃªnis basquete', 'cc88df17da569b9895b3b9d2616bc1c4.jpg', 10, 249.9, 'CalÃ§ados', 'TÃªnis Air Jordan de qualidade'),
(3, 'Moleton Dragon Ball Z', '106ff40605f22ffddfb007d08ba75d20.jpg', 15, 149.9, 'masculino', '100% topen');

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
(16, 1, 'P', 'M', 'G', 'GG'),
(17, 2, 'P', 'M', 'G', 'GG'),
(18, 3, 'P', 'M', 'G', 'GG');

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
  `nome` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`) VALUES
(4, 'david@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'LUIZ DAVID');

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
-- Indexes for table `compras`
--
ALTER TABLE `compras`
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
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `cor`
--
ALTER TABLE `cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
