
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 02/01/2017 às 16:26:19
-- Versão do Servidor: 10.0.28-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u313230586_algiz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id_aval` int(11) NOT NULL AUTO_INCREMENT,
  `id_membro` int(11) NOT NULL,
  `id_adm` int(11) NOT NULL,
  `status` enum('ap','rp') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_aval`),
  UNIQUE KEY `id_membro` (`id_membro`),
  UNIQUE KEY `id_membro_2` (`id_membro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comparecimento`
--

CREATE TABLE IF NOT EXISTS `comparecimento` (
  `id_comp` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) NOT NULL,
  `id_membro` int(11) NOT NULL,
  `comentou` enum('s','n') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_comp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg_privada`
--

CREATE TABLE IF NOT EXISTS `msg_privada` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `id_membro_env` int(11) NOT NULL,
  `id_membro_rec` int(11) NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('env','lido','resp') COLLATE utf8_unicode_ci NOT NULL,
  `data_env` date NOT NULL,
  `data_lida` date NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_membro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('adm','membro','cand','desativo') COLLATE utf8_unicode_ci NOT NULL COMMENT '''administrador'', ''membro'', ''candidato'', ''desativo''',
  `apelido` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` text COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome_canal` text COLLATE utf8_unicode_ci NOT NULL,
  `link_canal` text COLLATE utf8_unicode_ci NOT NULL,
  `link_page` text COLLATE utf8_unicode_ci NOT NULL,
  `link_instagram` text COLLATE utf8_unicode_ci NOT NULL,
  `link_twitter` text COLLATE utf8_unicode_ci NOT NULL,
  `descricao_canal` text COLLATE utf8_unicode_ci NOT NULL,
  `membro_desde` date NOT NULL,
  PRIMARY KEY (`id_membro`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `whatsapp` (`whatsapp`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_membro`, `nome`, `status`, `apelido`, `email`, `senha`, `whatsapp`, `nome_canal`, `link_canal`, `link_page`, `link_instagram`, `link_twitter`, `descricao_canal`, `membro_desde`) VALUES
(1, 'Stephanye', 'adm', 'Yui', 'steph.hoel@gmail.com', 'hoelbriegel96', '21964772882', 'Steph Hoel', 'http://youtube.com/stephhoe', 'http://facebook.com/StephHoel', '', 'http://twitter.com/steph.hoel', 'Falando sobre tudo com opinião! Notícias, audiobooks, cultura brasileira e muito mais!', '2016-02-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pergunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id_pergunta`, `pergunta`) VALUES
(1, 'Você acha que está pronto para participar de um grupo onde você tem que ajudar os parceiros a todo momento?'),
(2, 'Qual seu maior interesse em entrar no grupo?'),
(3, 'Você está preparado para ajudar os outros no canal deles? No que pode ajudar?'),
(4, 'Qual câmera e editor tu usa?'),
(5, 'Quanto tempo de canal?'),
(6, 'Qual network?'),
(7, 'Pretende fazer o que no canal daqui para frente?'),
(8, 'Pretende largar o canal?'),
(9, 'O que faria para ajudar um parceiro querendo largar o canal? Seja por problemas pessoais, equipamento ou estímulo.'),
(10, 'Que tipo de ajuda você tem a oferecer?'),
(11, 'Se algum de nós precisarmos de alguém pra editar um vídeo, você estaria disposto a ajudar?'),
(12, 'Supondo que você alcance 1 milhão de inscritos da noite pro dia, você vira as costas ou ajuda os parceiros? Se ajuda, como?'),
(13, 'De onde você tira as ideias pros seus vídeos?'),
(14, 'Pensa em levar o canal como carreira ou só como hobby?'),
(15, 'Entrou no youtube com qual finalidade?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE IF NOT EXISTS `respostas` (
  `id_respostas` int(11) NOT NULL AUTO_INCREMENT,
  `id_pergunta` int(11) NOT NULL,
  `id_membro` int(11) NOT NULL,
  `resposta` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_respostas`),
  KEY `id_pergunta` (`id_pergunta`,`id_membro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `nome_canal` text COLLATE utf8_unicode_ci NOT NULL,
  `link_video` text COLLATE utf8_unicode_ci NOT NULL,
  `data_video` date NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
