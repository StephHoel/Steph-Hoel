
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 02/01/2017 às 16:24:48
-- Versão do Servidor: 10.0.28-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u313230586_conta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `login_2` (`login`),
  UNIQUE KEY `login_3` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `login`, `senha`) VALUES
(1, 'senna', 'stephhoe1996'),
(2, 'steph', 'hoelbriegel96'),
(3, 'test', '123'),
(4, 'Text', ''),
(5, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

CREATE TABLE IF NOT EXISTS `movimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onde` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'estabelecimento',
  `valor` decimal(10,2) NOT NULL,
  `como` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'corrente, poupanca, especie, paypal, alimentacao, loja',
  `forma` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'recebido, pago',
  `quem` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=178 ;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`id`, `onde`, `valor`, `como`, `forma`, `quem`, `mes`, `ano`, `data`) VALUES
(1, 'EXTRA SUPERMERCADO', '13.30', 'especie', 'pago', 'senna', 4, 2014, '2014-04-12'),
(2, 'PADARIA', '7.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-12'),
(3, 'SACOLÃO', '22.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-13'),
(4, 'GUANABARA', '41.55', 'especie', 'pago', 'senna', 4, 2014, '2014-04-13'),
(5, 'MANDARIM', '3.70', 'especie', 'pago', 'senna', 4, 2014, '2014-04-12'),
(6, 'XAPIC C.DOCES MADUREIRA', '8.60', 'especie', 'pago', 'senna', 4, 2014, '2014-04-15'),
(7, 'MERCADÃO MADUREIRA', '29.28', 'especie', 'pago', 'senna', 4, 2014, '2014-04-15'),
(8, 'CRED CARD', '110.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-15'),
(9, 'VELAS 7 DIAS', '52.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-15'),
(10, 'NAZARITA(KSA BISCOITO)', '27.37', 'especie', 'pago', 'senna', 4, 2014, '2014-04-15'),
(11, 'MANDARIM', '25.72', 'especie', 'pago', 'senna', 4, 2014, '2014-04-16'),
(12, 'D. COUTINHO', '20.52', 'especie', 'pago', 'senna', 4, 2014, '2014-04-17'),
(13, 'PADARIA ', '3.94', 'especie', 'pago', 'senna', 4, 2014, '2014-04-19'),
(14, 'RECARGA LEADER', '27.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-19'),
(15, 'ITAÚ', '1750.00', 'corrente', 'recebido', 'senna', 3, 2014, '2014-03-31'),
(16, 'BRADESCO(ITAÚ)', '599.18', 'corrente', 'recebido', 'senna', 4, 2014, '2014-04-07'),
(17, 'PLANO FUNERÁRIO(MÃE)', '27.00', 'especie', 'recebido', 'senna', 4, 2014, '2014-04-09'),
(18, 'AÇOUGUE', '48.71', 'especie', 'pago', 'senna', 4, 2014, '2014-04-19'),
(19, 'TELEFONE E INTERNET', '122.40', 'especie', 'pago', 'senna', 4, 2014, '2014-04-06'),
(20, 'CEDAE', '60.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-06'),
(21, 'light', '20.22', 'especie', 'pago', 'senna', 4, 2014, '2014-04-07'),
(22, 'PLANO FUNERÁRIO', '27.16', 'especie', 'pago', 'senna', 4, 2014, '2014-04-07'),
(23, 'DIGITAL MAX', '200.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-20'),
(24, 'SEVEN', '190.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-26'),
(25, 'IPTU', '32.95', 'especie', 'pago', 'senna', 4, 2014, '2014-04-10'),
(26, 'ITAU', '1809.35', 'corrente', 'recebido', 'senna', 4, 2014, '2014-04-10'),
(27, 'NEXTEL', '62.50', 'especie', 'pago', 'senna', 4, 2014, '2014-04-06'),
(28, 'ITAÚ', '900.33', 'corrente', 'recebido', 'senna', 4, 2014, '2014-04-30'),
(29, 'C.BANCO BRASIL', '75.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-10'),
(30, 'D. MARIA HELENA', '110.00', 'especie', 'pago', 'senna', 4, 2014, '2014-04-10'),
(31, 'ATACADÃO PAVUNENSE', '41.30', 'especie', 'pago', 'senna', 4, 2014, '2014-04-29'),
(32, 'DROGARIA CAMPOS SALES', '76.13', 'especie', 'pago', 'senna', 4, 2014, '2014-04-25'),
(33, 'PREZUNIC', '41.97', 'especie', 'pago', 'senna', 5, 2014, '2014-05-02'),
(34, 'D. COUTINHO', '119.37', 'especie', 'pago', 'senna', 5, 2014, '2014-05-03'),
(35, 'NEXTEL', '62.50', 'especie', 'pago', 'senna', 5, 2014, '2014-05-03'),
(40, 'C.ITAÚ', '26.74', 'especie', 'pago', 'senna', 4, 2014, '2014-04-12'),
(36, 'LIGHT', '20.15', 'especie', 'pago', 'senna', 5, 2014, '2014-05-05'),
(37, 'CEDAE', '53.27', 'especie', 'pago', 'senna', 5, 2014, '2014-05-05'),
(38, 'D. MARIA HELENA', '110.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-08'),
(39, 'C.BANCO BRASIL', '63.85', 'especie', 'pago', 'senna', 5, 2014, '2014-05-09'),
(41, 'C&A MODAS', '204.08', 'especie', 'pago', 'senna', 4, 2014, '2014-04-08'),
(42, 'BRADESCO(ITAÚ)', '500.00', 'corrente', 'recebido', 'senna', 5, 2014, '2014-05-08'),
(43, 'C&A MODAS', '51.58', 'especie', 'pago', 'senna', 5, 2014, '2014-05-09'),
(44, 'C.ITAÚ', '73.64', 'especie', 'pago', 'senna', 5, 2014, '2014-05-08'),
(45, 'TELEFONE E INTERNET', '122.40', 'especie', 'pago', 'senna', 5, 2014, '2014-05-02'),
(70, 'DOXX COMERCIO DE ALIMENTOS', '9.50', 'especie', 'pago', 'senna', 5, 2014, '2014-05-14'),
(46, 'AVICOLA BEIJA FLOR', '17.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-03'),
(47, 'LOTERIA RECARGA C', '13.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-03'),
(48, 'PADARIA', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-06'),
(49, 'D. COUTINHO', '32.45', 'especie', 'pago', 'senna', 5, 2014, '2014-05-07'),
(50, 'D.PACHECO', '10.62', 'especie', 'pago', 'senna', 5, 2014, '2014-05-09'),
(51, 'TRANSFERENCIA P STEPH', '100.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-05'),
(52, 'PLANO FUNERÁRIO(MÃE)', '20.00', 'especie', 'recebido', 'senna', 5, 2014, '2014-05-02'),
(53, 'PLANO FUNERÁRIO', '27.16', 'especie', 'pago', 'senna', 5, 2014, '2014-05-07'),
(54, 'FARMA FORMULA(DIVIDIDO 3X', '140.00', 'corrente', 'pago', 'senna', 5, 2014, '2014-05-03'),
(55, 'CINEMA S.J.MERITI', '7.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-11'),
(56, 'BOBS MAX, SHOP S.J.M.', '6.50', 'especie', 'pago', 'senna', 5, 2014, '2014-05-11'),
(57, 'CAMARÃO E CIA', '20.90', 'especie', 'pago', 'senna', 5, 2014, '2014-05-11'),
(58, 'BERINGELA GRILL', '27.71', 'especie', 'pago', 'senna', 5, 2014, '2014-05-11'),
(59, 'KALUNGA', '17.30', 'especie', 'pago', 'senna', 5, 2014, '2014-05-11'),
(60, 'CINEMA S.J.MERITI', '19.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-11'),
(61, 'PÃO', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-12'),
(62, 'MANDARIM', '28.14', 'especie', 'pago', 'senna', 5, 2014, '2014-05-12'),
(63, 'PRESENTE DIA DAS MÃES(G)', '100.00', 'especie', 'recebido', 'senna', 5, 2014, '2014-05-10'),
(64, 'Juntei', '23.00', 'especie', 'recebido', 'steph', 5, 2014, '2014-05-13'),
(65, 'Para o Taxi', '10.00', 'especie', 'recebido', 'steph', 5, 2014, '2014-05-14'),
(66, 'coca-cola (2)', '4.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-13'),
(67, 'PIPOCA', '3.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-13'),
(68, 'RAÇÃO', '24.20', 'especie', 'pago', 'senna', 5, 2014, '2014-05-13'),
(69, 'ÁGUA COM GÁS', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-13'),
(71, 'AÇOUQUE', '39.30', 'especie', 'pago', 'senna', 5, 2014, '2014-05-14'),
(72, 'CREME SFERA (CABELO)', '7.90', 'especie', 'pago', 'senna', 5, 2014, '2014-05-14'),
(73, 'ÁGUA MINERAL COM GÁS', '3.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-16'),
(74, 'PÃO', '2.00', 'especie', 'pago', 'senna', 5, 2015, '2015-05-16'),
(75, 'PÃO', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-16'),
(76, 'LÂMPADAS 4=15W E 1=25W', '44.50', 'especie', 'pago', 'senna', 5, 2014, '2014-05-17'),
(77, 'GILBERTO', '52.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-17'),
(78, 'coca-cola', '3.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-17'),
(79, 'CHURROS 2', '4.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-17'),
(80, 'CASA DO BISCOITO DA PAVUNA', '9.20', 'especie', 'pago', 'senna', 5, 2014, '2014-05-21'),
(81, 'PADARIA', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-21'),
(82, 'SUBWAY', '6.25', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(83, 'D. COUTINHO', '52.42', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(84, 'D. COUTINHO', '42.50', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(85, 'EXTRA ARROZ (B.VILLE)', '10.95', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(86, 'EXTRA RECARGA TIM', '27.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(87, 'AVICOLA BEIJA FLOR', '28.80', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(88, 'PADARIA', '1.70', 'especie', 'pago', 'senna', 5, 2014, '2014-05-22'),
(89, 'CARTUCHO NO KALUNGA', '29.90', 'especie', 'pago', 'senna', 5, 2014, '2014-05-29'),
(90, 'GILBERTO', '80.00', 'especie', 'recebido', 'senna', 5, 2014, '2014-05-26'),
(91, 'MINHA MÃE', '39.00', 'especie', 'recebido', 'senna', 5, 2014, '2014-05-28'),
(92, 'MANDARIM', '9.16', 'especie', 'pago', 'senna', 5, 2014, '2014-05-29'),
(93, 'DROGARIA', '4.35', 'especie', 'pago', 'senna', 5, 2014, '2014-05-27'),
(94, 'FRUTAS', '9.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-27'),
(95, 'LEGUMES', '12.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-27'),
(96, 'GOIABA', '6.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-26'),
(97, 'PADARIA', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-27'),
(98, 'PADARIA ANDREIA', '2.00', 'especie', 'pago', 'senna', 5, 2014, '2014-05-28'),
(99, 'GUANABARA', '44.02', 'especie', 'pago', 'senna', 5, 2014, '2014-05-27'),
(100, 'GILBERTO', '150.00', 'especie', 'recebido', 'senna', 6, 2014, '2014-06-07'),
(101, 'GILBERTO', '40.00', 'especie', 'recebido', 'senna', 6, 2014, '2014-06-07'),
(102, 'GILBERTO', '60.19', 'especie', 'recebido', 'senna', 6, 2012, '2012-06-01'),
(103, 'RAÇÃO/LANCHE', '60.19', 'especie', 'pago', 'senna', 6, 2014, '2014-06-01'),
(104, 'COMPRAS', '146.00', 'especie', 'pago', 'senna', 6, 2014, '2014-06-07'),
(105, 'TAXI (3/6 - 6/6)', '40.00', 'especie', 'pago', 'senna', 6, 2014, '2014-06-07'),
(106, 'PÃO', '2.00', 'especie', 'pago', 'senna', 6, 2014, '2014-06-09'),
(107, 'GILBERTO', '10.00', 'especie', 'recebido', 'senna', 6, 2014, '2014-06-08'),
(108, 'PÃO', '2.00', 'especie', 'pago', 'senna', 6, 2014, '2014-06-11'),
(109, 'MANDARIM', '2.89', 'especie', 'pago', 'senna', 6, 2014, '2014-06-09'),
(110, 'MINHA MÃE', '27.00', 'especie', 'recebido', 'senna', 6, 2014, '2014-06-09'),
(111, 'ITAU C. CREDITO', '46.90', 'especie', 'pago', 'senna', 6, 2014, '2014-06-11'),
(112, 'TELEFONE E INTERNET', '122.54', 'especie', 'pago', 'senna', 5, 2014, '2014-05-30'),
(113, 'PLANO FUNERÁRIO', '27.16', 'especie', 'pago', 'senna', 5, 2014, '2014-05-30'),
(114, 'NEXTEL', '62.50', 'especie', 'pago', 'senna', 5, 2014, '2014-05-31'),
(115, 'LEADER', '59.90', 'especie', 'pago', 'senna', 6, 2014, '2014-06-04'),
(116, 'C&A MODAS', '51.58', 'especie', 'pago', 'senna', 6, 2014, '2014-06-06'),
(117, 'CHEQUE', '179.90', 'especie', 'pago', 'senna', 6, 2014, '2014-06-15'),
(118, 'DIVIDA ITAU', '85.00', 'especie', 'pago', 'senna', 6, 2014, '2014-06-26'),
(119, 'CRED CARD', '94.00', 'especie', 'pago', 'senna', 6, 2014, '2014-06-17'),
(120, 'BRADESCO(ITAÚ)', '200.00', 'especie', 'recebido', 'senna', 6, 2014, '2014-06-06'),
(121, 'BRADESCO(ITAÚ)', '50.00', 'especie', 'recebido', 'senna', 6, 2014, '2014-06-09'),
(123, 'McDonald''s', '3.50', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-16'),
(122, 'Saque da Poupança', '50.00', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-19'),
(127, 'Dominos Nova America', '16.40', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-10'),
(124, 'Livorno Grill', '27.03', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-13'),
(128, 'Studio Gourmet NorteShop', '43.40', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-09'),
(129, 'Ração Cachorro', '103.80', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-07'),
(125, 'Subway', '6.50', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-07'),
(126, 'Subway', '6.50', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-10'),
(130, 'Karibu Nova America', '38.98', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-16'),
(131, 'Drogasmil Nova America', '6.53', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-10'),
(132, 'Carrefour NorteShop', '22.16', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-09'),
(133, 'Novo Gás SJM', '1.80', 'especie', 'pago', 'steph', 4, 2015, '2015-04-11'),
(134, 'McDonald''s Nova America', '10.00', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-13'),
(135, 'KFC TijucaShop', '39.00', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-01'),
(136, 'Space Farma', '81.97', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-01'),
(137, 'Dentista Mãe', '200.00', 'poupanca', 'pago', 'steph', 3, 2015, '2015-03-19'),
(138, 'Subway Caxias', '6.50', 'poupanca', 'pago', 'steph', 3, 2015, '2015-03-21'),
(139, 'Transferencia', '89.90', 'poupanca', 'recebido', 'steph', 3, 2015, '2015-03-24'),
(140, 'Charme do Bairro', '21.00', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-07'),
(141, 'Bob''s Nova America', '21.50', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-22'),
(142, 'Doce Nova America', '12.82', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-22'),
(143, 'Digital Max', '199.90', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-20'),
(144, 'Digital Max', '199.90', 'poupanca', 'pago', 'steph', 3, 2015, '2015-03-16'),
(145, 'Loja de Material de Construção (Campo Grande)', '105.20', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-24'),
(146, ' Bobs Nova America', '10.00', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-28'),
(147, 'Shell Tijuca', '3.50', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-16'),
(148, 'Subway Maracana', '13.00', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-28'),
(149, 'Ortopride Duque de Caxias', '89.90', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-28'),
(150, 'Drogaria Duque de Caxias', '7.15', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-02'),
(151, 'Estúdio de Tatuagem Duque de Caxias', '85.00', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-02'),
(152, 'Quiosque de Doce Nova America', '8.01', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-30'),
(153, 'BurgerKing Nova America', '16.80', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-30'),
(154, 'Parme Nova America', '15.50', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-30'),
(155, 'Transferencia', '17.00', 'poupanca', 'recebido', 'steph', 4, 2015, '2015-04-28'),
(156, 'McDonalds Nova America', '6.50', 'alimentacao', 'pago', 'steph', 4, 2015, '2015-04-29'),
(157, 'Casa do Biscoito Metro da Pavuna', '2.00', 'especie', 'pago', 'steph', 4, 2015, '2015-04-28'),
(158, 'Quiosque de Doce Nova America', '6.94', 'poupanca', 'pago', 'steph', 4, 2015, '2015-04-28'),
(159, 'TAM Galeao Remarcação/Perda de Voo', '2195.48', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-16'),
(160, 'Lojas Americanas Nova America', '9.98', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-05'),
(161, 'Majestic Palace Hotel', '645.00', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-17'),
(162, 'Subway Beira Mar', '6.75', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-17'),
(163, 'Parme Nova America', '47.00', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-06'),
(164, 'Lojas Americanas Nova America', '19.96', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-06'),
(165, 'Subway Plaza Shopping', '13.00', 'alimentacao', 'pago', 'steph', 5, 2015, '2015-05-04'),
(166, 'Bobs Nova America', '10.00', 'especie', 'pago', 'steph', 5, 2015, '2015-05-08'),
(167, 'Subway Duque de Caxias', '24.25', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-11'),
(168, 'Deposito', '150.00', 'poupanca', 'recebido', 'steph', 5, 2015, '2015-05-11'),
(169, 'Subway Maracana', '13.00', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-12'),
(170, 'Lojas Americanas', '19.97', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-12'),
(171, 'Bobs Nova America', '7.40', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-15'),
(172, 'Bobs Beira Mar', '21.50', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-17'),
(173, 'Karibune Nova America', '11.99', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-14'),
(174, 'Dominos Nova America', '12.90', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-13'),
(175, 'Subway Maracana', '13.00', 'poupanca', 'pago', 'steph', 5, 2015, '2015-05-13'),
(176, 'McDonalds Nova America', '7.00', 'especie', 'pago', 'steph', 5, 2015, '2015-05-15'),
(177, 'McDonalds Nova America', '7.00', 'especie', 'pago', 'steph', 5, 2015, '2015-05-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
