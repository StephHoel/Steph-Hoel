
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 02/01/2017 às 16:25:07
-- Versão do Servidor: 10.0.28-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u313230586_blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `visible` enum('y','n','d') COLLATE utf8_unicode_ci NOT NULL COMMENT 'yes, no, del',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`visible`, `id`, `title`, `subtitle`, `text`, `date`, `by`) VALUES
('n', 1, 'Titulo 1 ', 'Subtitulo 1', 'Texto 1', '0000-00-00', '1'),
('y', 2, 'Titulo 2', 'Subtitulo 2', 'Texto 2', '2014-06-05', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(130) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `user`, `email`, `pass`) VALUES
(1, 'Steph', 'steph.hoel@gmail.com', 'hoel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `privateMensage`
--

CREATE TABLE IF NOT EXISTS `privateMensage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userSend` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userRecived` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTitle` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(130) COLLATE utf8_unicode_ci NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
