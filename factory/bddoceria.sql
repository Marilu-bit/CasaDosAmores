-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Set-2025 às 21:55
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bddoceria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `codproduto` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `tipo` varchar(90) NOT NULL,
  `preco` varchar(90) NOT NULL,
  `quantidade` varchar(90) NOT NULL,
  `imagem` varchar(90) NOT NULL,
  `coduser` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`codproduto`, `nome`, `tipo`, `preco`, `quantidade`, `imagem`, `coduser`) VALUES
(1, 'Sorvete', 'sorvete', '5', '1', '7bcee9789a4501bf94d8bcf0ca2cc3ae.jpg', '1'),
(2, 'Sorvete', 'sorvete', '5', '1', 'ff0369b86fb7e3c0a513a1ab068a8714.jpg', '1'),
(3, 'Sorvete', 'sorvete', '5', '1', 'bc3da01dba4ba9ac344b5cdd2a33f981.jpg', '1'),
(4, 'Sorvete', 'sorvete', '5', '1', '1840eaf240870702a001565b5ef1b1f2.jpg', '1'),
(5, 'Sorvete', 'sorvete', '5', '1', 'eed3d64a264faa5c3ed3fcfdb0842384.jpg', '1'),
(6, 'Sorvete', 'sorvete', '5', '1', '4a4d7a1393572bb91604cdaf3de9dc31.jpg', '1'),
(7, 'Doce de leite', 'doce', '6', '1', '79b04e42783502d6505093e7ecf889c7.jpg', '1'),
(8, 'Enroladinho Dos Seus Sonho', 'doce', '10', '1', 'f8e3c087e5cb8a6e36d8206ba1a49918.jpg', '1'),
(9, 'Morango do Cão', 'doce', '10', '1', 'bec22bba2e9d86868be2210fb2239a4f.jpg', '1'),
(10, 'Beijo com Chocolate', 'doce', '6', '1', 'e17c2ac638c6e4426b574b5f07736be1.png', '1'),
(11, 'Beijo de Moça com Mimos', 'doce', '14', '1', '0797a08d3a1653491d51213409c2b53c.png', '1'),
(12, 'Brigadeiro', 'doce', '6', '1', '4ea3d74e223367344a70d0f7ea444966.png', '1'),
(13, '4 Amores', 'bolo', '200', '4', '92cd74b29f5f47002d635081ad1be9a8.jpg', '1'),
(14, 'Casamenteiro', 'bolo', '500', '1', 'fe98f9ec69066e398ce962ae97ca4a18.jpeg', '1'),
(15, 'Combo 3 Corações', 'bolo', '600', '1', '4b5f08b448c0ec63467e0e495b3772b4.jpg', '1'),
(16, 'Morango da Perdição', 'bolo', '200', '1', 'dc324f47d7e314abaa8344119856d3a8.jpg', '1'),
(17, 'Tulipas', 'bolo', '300', '1', '4c8b306c685855e355444950de0ce8f5.jpg', '1'),
(18, 'Bomba de Chocolate Com Morango', 'bolo', '300', '1', '9823d7e56f9f3d9be0852f72890772d9.jpg', '1'),
(19, 'Bomba de Leite Ninho', 'bolo', '200', '1', '1e2f184eb22c58b1d745e48ab8c13fd9.jpg', '1'),
(20, '6 Amores', 'bolo', '300', '1', 'd2deb4a1dadff6c4ed6b385c22e9ddf9.jpg', '1'),
(21, 'Bolo do  Orgulho', 'bolo', '600', '1', '9b51dd4156f93a7572a9c557d3b08b5d.jpg', '1'),
(22, 'Torta de Morango', 'torta', '200', '1', '451fc0501c78e5adc7a1533b68f82382.jpg', '1'),
(23, 'Pudim de Sorvete do Amor', 'sorvete', '100', '1', '27406ec063c5f268481c1e6653e0683f.jpg', '1'),
(24, 'Torta de Gelatina', 'torta', '50', '1', 'd8314a3ffde8437d420e5a158a110d26.jpg', '1'),
(25, 'Torta da Casa', 'torta', '300', '3', '60a3409e37ba02d6d07b145831de5c1d.jpg', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `coduser` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `senha` varchar(90) NOT NULL,
  `imagem` varchar(90) NOT NULL,
  `pro_salvo` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbuser`
--

INSERT INTO `tbuser` (`coduser`, `nome`, `senha`, `imagem`, `pro_salvo`) VALUES
(1, 'Evelyn & Maria', '$2y$10$bVxVxULhjut7mMvdEb8vYOi7ZbZQkitEF/YQ6ke/At/sLCCeCvz.q', '55302ece0b53a1fdf80d3fc0e2269bcb.jpg', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`codproduto`);

--
-- Índices para tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`coduser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `codproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `coduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
