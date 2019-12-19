-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2019 às 13:34
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
-- Database: `thorin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_acesso`
--

CREATE TABLE `c_acesso` (
  `c_acesso_id` int(11) NOT NULL,
  `c_tipousuario_id` int(11) NOT NULL,
  `c_rotina_id` int(11) NOT NULL,
  `c_subrotina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_acesso`
--

INSERT INTO `c_acesso` (`c_acesso_id`, `c_tipousuario_id`, `c_rotina_id`, `c_subrotina_id`) VALUES
(3, 1, 2, 3),
(4, 1, 2, 4),
(5, 1, 3, 5),
(9, 1, 3, 6),
(12, 1, 1, 7),
(13, 1, 1, 8),
(14, 1, 1, 9),
(15, 1, 1, 10),
(16, 1, 2, 11),
(17, 1, 2, 12),
(18, 1, 2, 13),
(19, 1, 2, 14),
(20, 1, 3, 15),
(33, 2, 1, 9),
(34, 2, 1, 10),
(35, 2, 2, 3),
(36, 2, 2, 4),
(37, 2, 2, 11),
(38, 2, 2, 12),
(39, 2, 2, 13),
(40, 2, 2, 14),
(41, 2, 3, 5),
(42, 2, 3, 6),
(43, 2, 3, 15),
(44, 2, 3, 16),
(45, 2, 3, 17),
(46, 2, 4, 18),
(47, 2, 4, 19),
(48, 2, 4, 20),
(49, 2, 4, 21),
(50, 2, 4, 22),
(51, 2, 4, 23),
(54, 4, 1, 10),
(58, 7, 3, 5),
(59, 7, 3, 6),
(60, 7, 3, 15),
(61, 7, 3, 16),
(62, 7, 3, 17),
(74, 7, 4, 21),
(75, 7, 4, 22),
(77, 2, 1, 1),
(78, 2, 1, 2),
(86, 1, 4, 19),
(87, 1, 4, 20),
(88, 1, 4, 21),
(89, 1, 4, 22),
(90, 1, 4, 23),
(94, 3, 1, 8),
(95, 3, 1, 9),
(96, 3, 1, 10),
(97, 3, 1, 1),
(98, 3, 1, 2),
(99, 3, 1, 7),
(100, 3, 2, 3),
(101, 3, 2, 4),
(104, 1, 1, 2),
(105, 1, 4, 18),
(106, 1, 5, 26),
(107, 1, 6, 27),
(108, 2, 6, 27),
(109, 3, 6, 27),
(110, 4, 6, 27),
(111, 5, 6, 27),
(112, 6, 6, 27),
(113, 7, 6, 27),
(115, 1, 1, 1),
(116, 2, 2, 24),
(117, 2, 2, 25),
(118, 2, 5, 26),
(119, 2, 7, 28),
(120, 1, 3, 16),
(121, 1, 3, 17),
(122, 2, 5, 29),
(123, 1, 5, 29),
(124, 3, 5, 29),
(125, 3, 5, 26),
(127, 4, 7, 28),
(128, 2, 1, 7),
(129, 2, 1, 8),
(130, 1, 4, 30),
(131, 1, 2, 24),
(132, 1, 2, 25),
(133, 1, 7, 28),
(134, 1, 4, 31),
(135, 2, 4, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_cobranca`
--

CREATE TABLE `c_cobranca` (
  `c_cb_id` int(11) NOT NULL,
  `c_cb_descricao` varchar(255) DEFAULT NULL,
  `c_pessoa_id` int(11) DEFAULT NULL,
  `c_matricula_id` int(11) DEFAULT NULL,
  `c_cb_valor` decimal(10,0) DEFAULT NULL,
  `c_cb_datavencimento` date DEFAULT NULL,
  `c_cb_datapagamento` date DEFAULT NULL,
  `c_cb_status` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_cobranca`
--

INSERT INTO `c_cobranca` (`c_cb_id`, `c_cb_descricao`, `c_pessoa_id`, `c_matricula_id`, `c_cb_valor`, `c_cb_datavencimento`, `c_cb_datapagamento`, `c_cb_status`) VALUES
(99, '1 Mensalidade', NULL, 29, '500', '2019-01-05', NULL, 'NP'),
(100, '2 Mensalidade', NULL, 29, '500', '2019-02-05', NULL, 'NP'),
(101, '3 Mensalidade', NULL, 29, '500', '2019-03-05', NULL, 'NP'),
(102, '4 Mensalidade', NULL, 29, '500', '2019-04-05', NULL, 'NP'),
(103, '5 Mensalidade', NULL, 29, '500', '2019-05-05', NULL, 'NP'),
(104, '6 Mensalidade', NULL, 29, '500', '2019-06-05', NULL, 'NP'),
(105, '7 Mensalidade', NULL, 29, '500', '2019-07-05', NULL, 'NP'),
(106, '8 Mensalidade', NULL, 29, '500', '2019-08-05', NULL, 'NP'),
(107, '9 Mensalidade', NULL, 29, '500', '2019-09-05', NULL, 'NP'),
(108, '10 Mensalidade', NULL, 29, '500', '2019-10-05', NULL, 'NP'),
(109, '11 Mensalidade', NULL, 29, '500', '2019-11-05', NULL, 'NP'),
(110, '12 Mensalidade', NULL, 29, '500', '2019-12-05', NULL, 'NP'),
(111, '1 Mensalidade', NULL, 30, '250', '2019-01-02', NULL, 'NP'),
(112, '2 Mensalidade', NULL, 30, '250', '2019-02-02', NULL, 'NP'),
(113, '3 Mensalidade', NULL, 30, '250', '2019-03-02', NULL, 'NP'),
(114, '4 Mensalidade', NULL, 30, '250', '2019-04-02', NULL, 'NP'),
(115, '5 Mensalidade', NULL, 30, '250', '2019-05-02', NULL, 'NP'),
(116, '6 Mensalidade', NULL, 30, '250', '2019-06-02', NULL, 'NP'),
(117, '7 Mensalidade', NULL, 30, '250', '2019-07-02', NULL, 'NP'),
(118, '8 Mensalidade', NULL, 30, '250', '2019-08-02', NULL, 'NP'),
(119, '9 Mensalidade', NULL, 30, '250', '2019-09-02', NULL, 'NP'),
(120, '10 Mensalidade', NULL, 30, '250', '2019-10-02', NULL, 'NP'),
(121, '11 Mensalidade', NULL, 30, '250', '2019-11-02', NULL, 'NP'),
(122, '12 Mensalidade', NULL, 30, '250', '2019-12-02', NULL, 'NP'),
(123, '1 Mensalidade', NULL, 31, '250', '2019-01-07', NULL, 'NP'),
(124, '2 Mensalidade', NULL, 31, '250', '2019-02-07', NULL, 'NP'),
(125, '3 Mensalidade', NULL, 31, '250', '2019-03-07', NULL, 'NP'),
(126, '4 Mensalidade', NULL, 31, '250', '2019-04-07', NULL, 'NP'),
(127, '5 Mensalidade', NULL, 31, '250', '2019-05-07', NULL, 'NP'),
(128, '6 Mensalidade', NULL, 31, '250', '2019-06-07', NULL, 'NP'),
(129, '7 Mensalidade', NULL, 31, '250', '2019-07-07', NULL, 'NP'),
(130, '8 Mensalidade', NULL, 31, '250', '2019-08-07', NULL, 'NP'),
(131, '9 Mensalidade', NULL, 31, '250', '2019-09-07', NULL, 'NP'),
(132, '10 Mensalidade', NULL, 31, '250', '2019-10-07', NULL, 'NP'),
(133, '11 Mensalidade', NULL, 31, '250', '2019-11-07', NULL, 'NP'),
(134, '12 Mensalidade', NULL, 31, '250', '2019-12-07', NULL, 'NP'),
(135, '1 Mensalidade', NULL, 32, '500', '2019-01-15', NULL, 'NP'),
(136, '2 Mensalidade', NULL, 32, '500', '2019-02-15', NULL, 'NP'),
(137, '3 Mensalidade', NULL, 32, '500', '2019-03-15', NULL, 'NP'),
(138, '4 Mensalidade', NULL, 32, '500', '2019-04-15', NULL, 'NP'),
(139, '5 Mensalidade', NULL, 32, '500', '2019-05-15', NULL, 'NP'),
(140, '6 Mensalidade', NULL, 32, '500', '2019-06-15', NULL, 'NP'),
(141, '7 Mensalidade', NULL, 32, '500', '2019-07-15', NULL, 'NP'),
(142, '8 Mensalidade', NULL, 32, '500', '2019-08-15', NULL, 'NP'),
(143, '9 Mensalidade', NULL, 32, '500', '2019-09-15', NULL, 'NP'),
(144, '10 Mensalidade', NULL, 32, '500', '2019-10-15', NULL, 'NP'),
(145, '11 Mensalidade', NULL, 32, '500', '2019-11-15', NULL, 'NP'),
(146, '12 Mensalidade', NULL, 32, '500', '2019-12-15', NULL, 'NP'),
(147, '1 Mensalidade', NULL, 33, '250', '2019-02-01', NULL, 'NP'),
(148, '2 Mensalidade', NULL, 33, '250', '2019-03-01', NULL, 'NP'),
(149, '3 Mensalidade', NULL, 33, '250', '2019-04-01', NULL, 'NP'),
(150, '4 Mensalidade', NULL, 33, '250', '2019-05-01', NULL, 'NP'),
(151, '5 Mensalidade', NULL, 33, '250', '2019-06-01', NULL, 'NP'),
(152, '6 Mensalidade', NULL, 33, '250', '2019-07-01', NULL, 'NP'),
(153, '7 Mensalidade', NULL, 33, '250', '2019-08-01', NULL, 'NP'),
(154, '8 Mensalidade', NULL, 33, '250', '2019-09-01', NULL, 'NP'),
(155, '9 Mensalidade', NULL, 33, '250', '2019-10-01', NULL, 'NP'),
(156, '10 Mensalidade', NULL, 33, '250', '2019-11-01', NULL, 'NP'),
(157, '11 Mensalidade', NULL, 33, '250', '2019-12-01', NULL, 'NP'),
(158, '12 Mensalidade', NULL, 33, '250', '2020-01-01', NULL, 'NP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_curso`
--

CREATE TABLE `c_curso` (
  `c_curso_i_id` int(11) NOT NULL,
  `c_curso_s_nome` varchar(45) DEFAULT NULL,
  `c_curso_i_cargahoraria` int(11) DEFAULT NULL,
  `c_nivel_i_id` int(11) DEFAULT NULL,
  `c_curso_f_valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_curso`
--

INSERT INTO `c_curso` (`c_curso_i_id`, `c_curso_s_nome`, `c_curso_i_cargahoraria`, `c_nivel_i_id`, `c_curso_f_valor`) VALUES
(3, '1 ano', 500, 17, 250),
(5, '1Âº ano', 1000, 19, 250),
(6, '2Âº ano', 1000, 20, 550),
(8, '2Âº ano', 1000, 19, 500),
(9, '3Âº ano', 5000, 20, 250),
(10, '5Âª SÃ©rie', 500, 20, 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_disciplina`
--

CREATE TABLE `c_disciplina` (
  `c_disciplina_i_id` int(11) NOT NULL,
  `c_disciplina_s_nome` varchar(155) DEFAULT NULL,
  `c_curso_i_id` int(11) DEFAULT NULL,
  `c_disciplina_i_cargahoraria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_disciplina`
--

INSERT INTO `c_disciplina` (`c_disciplina_i_id`, `c_disciplina_s_nome`, `c_curso_i_id`, `c_disciplina_i_cargahoraria`) VALUES
(2, 'Portugues', 8, 520),
(3, 'MatemÃ¡tica', 5, 250),
(7, 'PortuguÃªs', 5, 500),
(8, 'HistÃ³ria', 5, 500),
(9, 'Geografia', 5, 500),
(10, 'Ensino Religioso', 5, 500),
(11, 'Artes', 5, 500),
(12, 'InglÃªs', 5, 500),
(13, 'MatemÃ¡tica', 8, 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_evento`
--

CREATE TABLE `c_evento` (
  `c_evento_id` int(11) NOT NULL,
  `c_evento_data` date DEFAULT NULL,
  `c_evento_hora` varchar(45) DEFAULT NULL,
  `c_evento_descricao` varchar(45) DEFAULT NULL,
  `c_evento_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_frequencia`
--

CREATE TABLE `c_frequencia` (
  `c_frequencia_id` int(11) NOT NULL,
  `c_dp_id` int(11) NOT NULL,
  `c_frequencia_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_frequencia`
--

INSERT INTO `c_frequencia` (`c_frequencia_id`, `c_dp_id`, `c_frequencia_data`) VALUES
(20, 7, '2019-01-25'),
(21, 7, '2019-01-24'),
(22, 7, '2019-01-31'),
(23, 7, '2019-01-03'),
(25, 7, '2019-01-29'),
(26, 8, '2019-01-31'),
(27, 7, '2019-03-20'),
(28, 7, '2019-09-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_matricula`
--

CREATE TABLE `c_matricula` (
  `c_matricula_i_id` int(11) NOT NULL,
  `c_pessoa_i_id` int(11) DEFAULT NULL,
  `c_curso_i_id` int(11) DEFAULT NULL,
  `c_tur_id` int(11) NOT NULL,
  `c_matricula_s_cod` varchar(45) DEFAULT NULL,
  `c_matricula_d_datainicio` date DEFAULT NULL,
  `c_matricula_b_status` char(1) DEFAULT NULL,
  `c_matricula_datavencimento` int(11) NOT NULL,
  `c_matricula_desconto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_matricula`
--

INSERT INTO `c_matricula` (`c_matricula_i_id`, `c_pessoa_i_id`, `c_curso_i_id`, `c_tur_id`, `c_matricula_s_cod`, `c_matricula_d_datainicio`, `c_matricula_b_status`, `c_matricula_datavencimento`, `c_matricula_desconto`) VALUES
(29, 29, 5, 3, NULL, '2019-01-15', 'r', 5, 0),
(30, 7, 5, 4, NULL, '2019-01-15', 'r', 5, 50),
(31, 31, 5, 4, NULL, '2019-02-04', 'r', 5, 50),
(32, 34, 5, 4, NULL, '2019-02-04', 'r', 5, 0),
(33, 35, 5, 4, NULL, '2019-02-01', 'r', 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_matricula_disciplina`
--

CREATE TABLE `c_matricula_disciplina` (
  `c_md_id` int(11) NOT NULL,
  `c_mat_id` int(11) DEFAULT NULL,
  `c_disc_id` int(11) DEFAULT NULL,
  `c_md_situacao` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_matricula_disciplina`
--

INSERT INTO `c_matricula_disciplina` (`c_md_id`, `c_mat_id`, `c_disc_id`, `c_md_situacao`) VALUES
(70, 29, 3, 'regular'),
(71, 29, 7, 'regular'),
(72, 29, 8, 'regular'),
(73, 29, 9, 'regular'),
(74, 29, 10, 'regular'),
(75, 29, 11, 'regular'),
(76, 29, 12, 'regular'),
(77, 30, 3, 'regular'),
(78, 30, 7, 'regular'),
(79, 30, 8, 'regular'),
(80, 30, 9, 'regular'),
(81, 30, 10, 'regular'),
(82, 30, 11, 'regular'),
(83, 30, 12, 'regular'),
(84, 31, 3, 'regular'),
(85, 31, 7, 'regular'),
(86, 31, 8, 'regular'),
(87, 31, 9, 'regular'),
(88, 31, 10, 'regular'),
(89, 31, 11, 'regular'),
(90, 31, 12, 'regular'),
(91, 32, 3, 'regular'),
(92, 32, 7, 'regular'),
(93, 32, 8, 'regular'),
(94, 32, 9, 'regular'),
(95, 32, 10, 'regular'),
(96, 32, 11, 'regular'),
(97, 32, 12, 'regular'),
(98, 33, 3, 'regular'),
(99, 33, 7, 'regular'),
(100, 33, 8, 'regular'),
(101, 33, 9, 'regular'),
(102, 33, 10, 'regular'),
(103, 33, 11, 'regular'),
(104, 33, 12, 'regular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_media`
--

CREATE TABLE `c_media` (
  `c_media_id` int(11) NOT NULL,
  `c_media_nome` varchar(25) NOT NULL,
  `c_media_corte` float NOT NULL,
  `c_media_tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_media`
--

INSERT INTO `c_media` (`c_media_id`, `c_media_nome`, `c_media_corte`, `c_media_tipo`) VALUES
(3, 'MÃ©dia - 1 bimestre', 7, 'b'),
(4, 'MÃ©dia - 2 bimestre', 7, 'b'),
(5, 'MÃ©dia - 3 bimestre', 7, 'b'),
(6, 'MÃ©dia - 4 bimestre', 7, 'b'),
(8, 'MÃ©dia Final', 7, 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_negociacao`
--

CREATE TABLE `c_negociacao` (
  `c_neg_id` int(11) NOT NULL,
  `c_neg_descricao` varchar(255) DEFAULT NULL,
  `c_neg_data` date DEFAULT NULL,
  `c_neg_status` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_nivel`
--

CREATE TABLE `c_nivel` (
  `c_nivel_i_id` int(11) NOT NULL,
  `c_nivel_s_nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_nivel`
--

INSERT INTO `c_nivel` (`c_nivel_i_id`, `c_nivel_s_nome`) VALUES
(18, 'ENSINO MEDIO'),
(19, 'ENSINO INFANTIL'),
(20, 'ENSINO FUNDAMENTAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_nota`
--

CREATE TABLE `c_nota` (
  `c_nota_id` int(11) NOT NULL,
  `c_md_id` int(11) DEFAULT NULL,
  `c_nota_dataAvaliacao` date NOT NULL,
  `c_nota_dataLancamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `c_nota_valor` float DEFAULT NULL,
  `c_ta_id` int(11) DEFAULT NULL,
  `c_pessoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_nota`
--

INSERT INTO `c_nota` (`c_nota_id`, `c_md_id`, `c_nota_dataAvaliacao`, `c_nota_dataLancamento`, `c_nota_valor`, `c_ta_id`, `c_pessoa_id`) VALUES
(10, 70, '2019-01-01', '2019-01-08 12:53:03', 3.5, 1, 32),
(11, 70, '2019-01-01', '2019-01-08 12:53:25', 8, 3, 1),
(12, 72, '2019-01-01', '2019-01-08 12:54:36', 7.5, 1, 1),
(13, 75, '2019-01-01', '2019-01-08 12:56:13', 7.75, 1, 1),
(14, 70, '2019-01-03', '2019-01-08 13:53:19', 6, 8, 32),
(15, 76, '2019-01-04', '2019-01-08 19:33:10', 9.5, 1, 1),
(16, 70, '2019-02-21', '2019-01-08 19:35:30', 7, 9, 32),
(17, 71, '2019-01-03', '2019-01-09 12:56:32', 9.5, 1, 1),
(18, 77, '2019-01-01', '2019-01-09 17:53:35', 8, 1, 1),
(20, 77, '2019-01-08', '2019-01-12 00:20:27', 9, 3, 32),
(22, 84, '2019-01-01', '2019-01-17 11:51:36', 10, 1, 32),
(24, 84, '2019-01-16', '2019-01-22 16:09:03', 10, 3, 32),
(25, 84, '2019-03-06', '2019-01-22 16:09:28', 8.5, 8, 32),
(26, 98, '2019-01-24', '2019-01-24 23:39:33', 10, 1, 32),
(27, 98, '2019-02-06', '2019-01-25 19:11:40', 8.5, 3, 32),
(28, 91, '2019-01-03', '2019-01-25 20:21:46', 8, 1, 32),
(29, 77, '2019-04-04', '2019-01-25 23:12:40', 10, 8, 32),
(30, 84, '2019-02-21', '2019-01-30 00:11:36', 10, 9, 32),
(31, 84, '2019-04-11', '2019-01-31 19:07:33', 9.75, 10, 1),
(32, 84, '2019-08-15', '2019-01-31 20:44:12', 7, 11, 1),
(33, 84, '2019-09-12', '2019-01-31 20:44:38', 7, 12, 32),
(35, 77, '2019-02-15', '2019-02-11 19:25:40', 9, 9, 32),
(36, 70, '2019-02-08', '2019-02-11 19:41:56', 3, 10, 32),
(37, 70, '2019-06-13', '2019-02-11 19:45:13', 8, 11, 32),
(38, 70, '2019-02-14', '2019-02-12 16:29:40', 8, 12, 32),
(40, 70, '0000-00-00', '2019-02-13 12:18:05', 10, NULL, 1),
(41, 71, '2019-03-07', '2019-02-13 12:25:36', 10, 3, 1),
(42, 73, '2019-02-15', '2019-02-13 14:32:06', 10, 1, 1),
(43, 75, '2019-03-28', '2019-02-20 15:58:56', 10, 3, 1),
(44, 71, '2019-02-15', '2019-02-20 18:51:26', 10, 8, 1),
(45, 71, '2019-02-21', '2019-02-20 18:52:37', 6, 9, 1),
(46, 71, '2019-03-08', '2019-02-20 18:53:24', 8, 10, 1),
(47, 71, '2019-02-22', '2019-02-20 19:01:03', 5, 11, 1),
(48, 70, '2019-12-19', '2019-02-22 14:33:51', 10, 13, 1),
(49, 98, '2019-04-17', '2019-04-18 11:52:03', 7.5, 8, 1),
(50, 72, '2019-07-10', '2019-07-01 19:13:46', 10, 3, 1),
(51, 85, '2019-09-17', '2019-09-13 16:50:02', 7, 1, 1),
(52, 85, '2019-10-03', '2019-09-13 16:50:20', 7, 3, 1),
(53, 84, '2019-09-26', '2019-09-13 16:52:56', 7, 13, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_pessoa`
--

CREATE TABLE `c_pessoa` (
  `c_pessoa_id` int(11) NOT NULL,
  `c_pessoa_nome` varchar(255) DEFAULT NULL,
  `c_pessoa_login` varchar(100) NOT NULL,
  `c_pessoa_datanascimento` date DEFAULT NULL,
  `c_pessoa_sexo` char(1) NOT NULL,
  `c_pessoa_email` varchar(255) DEFAULT NULL,
  `c_pessoa_senha` varchar(45) DEFAULT NULL,
  `c_pessoa_fone` varchar(45) DEFAULT NULL,
  `c_pessoa_celular` varchar(15) NOT NULL,
  `c_tipousuario_id` int(11) DEFAULT NULL,
  `c_pessoa_cpf` varchar(45) DEFAULT NULL,
  `c_pessoa_codinterno` varchar(45) DEFAULT NULL,
  `c_pessoa_endereco_cep` varchar(15) NOT NULL,
  `c_pessoa_endereco_rua` varchar(255) NOT NULL,
  `c_pessoa_endereco_numero` varchar(10) NOT NULL,
  `c_pessoa_endereco_complemento` varchar(30) NOT NULL,
  `c_pessoa_endereco_bairro` varchar(100) NOT NULL,
  `c_pessoa_id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_pessoa`
--

INSERT INTO `c_pessoa` (`c_pessoa_id`, `c_pessoa_nome`, `c_pessoa_login`, `c_pessoa_datanascimento`, `c_pessoa_sexo`, `c_pessoa_email`, `c_pessoa_senha`, `c_pessoa_fone`, `c_pessoa_celular`, `c_tipousuario_id`, `c_pessoa_cpf`, `c_pessoa_codinterno`, `c_pessoa_endereco_cep`, `c_pessoa_endereco_rua`, `c_pessoa_endereco_numero`, `c_pessoa_endereco_complemento`, `c_pessoa_endereco_bairro`, `c_pessoa_id_responsavel`) VALUES
(1, 'Marcus Martins', 'marcusmartins', '1992-10-09', 'm', 'markus.gustavu@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, '', 1, '04550527358', 'marcusmartins', '', '', '', '', '', 0),
(5, 'BRENDA COSTA MARTINS', 'brendaa', '1995-09-10', 'f', 'brendamartinscosta9@gmail.com', '202cb962ac59075b964b07152d234b70', '98988370331', '98981282510', 6, '042.026.301-27', '', '65110-000', 'Rua TangarÃ¡', 'S/N', 'Bl 04 - AP 103', 'ARAÃ‡AGY', 0),
(6, 'SAMUEL MARTINS', 'samuelmartins', '1964-12-15', 'm', 'samuelmarttins@hotmail.com', '202cb962ac59075b964b07152d234b70', '98981308876', '98988370331', 6, '375.810.153-00', '', '65110-000', 'Rua do Leme', 'S1', 'QD 14', 'ARAÃ‡AGY', 0),
(7, 'LUCAS COSTA MARTINS', 'lucasmartins', '2020-01-02', 'm', 'lucas@lucas', '202cb962ac59075b964b07152d234b70', '98981837112', '98983282510', 5, '023.655.989-00', '', '65065-540', 'Rua TangarÃ¡', 'SN', 'Bl 04 - AP 103', 'ARAÃ‡AGY', 5),
(8, 'THIAGO WDSON DIAS MARTINS', 'thiagowdson', '1990-04-22', 'm', 'wdson_martins@hotmail.com', '202cb962ac59075b964b07152d234b70', '98981480465', '98981480465', 6, '045.505.223-21', '', '65110-110', 'Rua do Leme', 'S2', 'QD 14', 'ARAÃ‡AGY', 0),
(9, 'MARILUZ ALVES DIAS MARTINS', 'mariluzmartins', '1966-12-15', 'f', 'mariluzmarttins@gmail.com', '202cb962ac59075b964b07152d234b70', '98982090334', '989802323656', 6, '042.321.565-55', '', '65110-000', 'Rua do Leme', 'S1', 'QD 14', 'ARAÃ‡AGY', 0),
(29, 'CAIO PINHEIRO MARTINS', 'caiomartins', '2020-04-05', 'm', 'caio@caio', '202cb962ac59075b964b07152d234b70', '989820645654', '989756541565', 5, '046.545.654-56', '', '65110-000', 'Rua do Leme', 'S2', 'QD 14', 'ARAÃ‡AGY', 8),
(30, 'STEVANN BRUNO DIAS MARTINS', 'bruno', '1988-06-10', 'm', 'stevannmartins@hotmail.com', '202cb962ac59075b964b07152d234b70', '129821565456', '129820845456', 6, '034.023.909-00', '', '65065-540', 'Rua General Artur Carvalho', '10', 'Bl 04 - AP 101', 'Turu', 0),
(31, 'ARTHUR SILVA MARTINS', 'arthur', '2018-06-10', 'm', 'arthur@arthur', '202cb962ac59075b964b07152d234b70', '98982054459', '98987456540', 5, '049.239.020-01', '', '65065-540', 'Rua General Artur Carvalho', '10', 'Bl 04 - AP 101', 'Turua', 30),
(32, 'JOSÃ‰ ANTONIO CARACAS', 'caracas', '1960-09-10', 'm', 'antonio@caracas', '202cb962ac59075b964b07152d234b70', '98923009809', '98987090334', 4, '045.029.911-21', '', '65064-578', 'Rua do CafÃ©', '10', 'QD 16', 'ALTOS DO TURU', 0),
(33, 'JOÃƒO VIEGAS DE DEUS', 'joaoviegas', '1980-10-10', 'm', 'joao@joao', '202cb962ac59075b964b07152d234b70', '98982093564', '98982096566', 6, '045.505.273-65', '', '65065-540', 'Rua General Artur Carvalho', '10', 'qd12', 'Turu', 0),
(34, 'LUCAS VIEGAS', 'lucasviegas', '2000-10-10', 'm', 'lucas@lucas', '202cb962ac59075b964b07152d234b70', '98982025656', '9898456545', 5, '045.505.245-55', '', '65065-540', 'Rua General Artur Carvalho', '10', 'qd12', 'Turu', 33),
(35, 'Rodrigo Augusto Silva', 'rodrigosilva', '2005-09-10', 'm', 'rodrigo@rodrigo', '202cb962ac59075b964b07152d234b70', '9820933445', '9898054565', 5, '045.505.273-58', '', '65065-540', 'Rua General Artur Carvalho', '10', 'qd12', 'Turu', 33),
(36, 'Raimundo PatrÃ­cio', 'raimundo', '1990-10-10', 'm', 'raimundo@raimundo', '202cb962ac59075b964b07152d234b70', '98982064565', '989824565456', 4, '045.505.245-65', '', '65065-540', 'Rua do ChÃ¡', '10', 'QD 15', 'RenascenÃ§a', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_planejamento`
--

CREATE TABLE `c_planejamento` (
  `c_plan_id` int(11) NOT NULL,
  `c_plan_titulo` varchar(255) NOT NULL,
  `c_dp_id` int(11) DEFAULT NULL,
  `c_pessoa_id` int(11) DEFAULT NULL,
  `c_plan_data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `c_plan_texto` longtext,
  `c_plan_arquivo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_planejamento`
--

INSERT INTO `c_planejamento` (`c_plan_id`, `c_plan_titulo`, `c_dp_id`, `c_pessoa_id`, `c_plan_data`, `c_plan_texto`, `c_plan_arquivo`) VALUES
(47, 'PLANO 12', 7, 32, '2019-01-18 18:35:45', '<blockquote><p>NOVO PLANO</p><p><br></p><ol><li>ASDLKJASDLKJ</li><li>1232</li><li>KHBGUI<br></li></ol></blockquote>', 'bWFyY3Vz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_plano_aula`
--

CREATE TABLE `c_plano_aula` (
  `c_plano_aula_id` int(11) NOT NULL,
  `m_dp_id` int(11) DEFAULT NULL,
  `c_plano_aula_titulo` varchar(255) NOT NULL,
  `c_plano_aula_data` date DEFAULT NULL,
  `c_plano_aula_texto` longtext,
  `c_pessoa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_plano_aula`
--

INSERT INTO `c_plano_aula` (`c_plano_aula_id`, `m_dp_id`, `c_plano_aula_titulo`, `c_plano_aula_data`, `c_plano_aula_texto`, `c_pessoa_id`) VALUES
(1, 7, 'REVISÃƒO GERAL - 2 AVALIAÃ‡ÃƒO', '2019-01-24', '<blockquote><p>REVISÃƒO GERAL - 2 AVALIAÃ‡ÃƒO BIMESTRAL<br></p></blockquote>', 32),
(2, 7, '', '0000-00-00', '<p><br></p>', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_plano_aula_arquivo`
--

CREATE TABLE `c_plano_aula_arquivo` (
  `c_paa_id` int(11) NOT NULL,
  `paa_descricao` varchar(200) NOT NULL,
  `c_plano_aula_id` int(11) DEFAULT NULL,
  `c_paa_arquivo` varchar(45) DEFAULT NULL,
  `c_paa_data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_rotina`
--

CREATE TABLE `c_rotina` (
  `c_rotina_id` int(11) NOT NULL,
  `c_rotina_nome` varchar(100) NOT NULL,
  `c_rotina_status` char(1) NOT NULL,
  `c_rotina_icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_rotina`
--

INSERT INTO `c_rotina` (`c_rotina_id`, `c_rotina_nome`, `c_rotina_status`, `c_rotina_icon`) VALUES
(1, 'Alunos', 'a', 'zmdi zmdi-face'),
(2, 'Professores', 'a', 'zmdi zmdi-account'),
(3, 'Responsaveis', 'a', 'zmdi zmdi-account'),
(4, 'Personalizacao', 'a', 'zmdi zmdi-edit'),
(5, 'Matricula', 'a', ''),
(6, 'Social', 'a', ''),
(7, 'Turmas', 'a', 'zmdi zmdi-accounts');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_sala`
--

CREATE TABLE `c_sala` (
  `c_sala_id` int(11) NOT NULL,
  `c_sala_nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_sala`
--

INSERT INTO `c_sala` (`c_sala_id`, `c_sala_nome`) VALUES
(4, '110'),
(5, '111'),
(6, '112'),
(7, '113');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_subrotina`
--

CREATE TABLE `c_subrotina` (
  `c_subrotina_id` int(11) NOT NULL,
  `c_rotina_id` int(11) NOT NULL,
  `c_subrotina_nome` varchar(100) NOT NULL,
  `c_subrotina_path` varchar(250) NOT NULL,
  `c_subrotina_icon` varchar(20) NOT NULL,
  `c_subrotina_menu` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_subrotina`
--

INSERT INTO `c_subrotina` (`c_subrotina_id`, `c_rotina_id`, `c_subrotina_nome`, `c_subrotina_path`, `c_subrotina_icon`, `c_subrotina_menu`) VALUES
(1, 1, 'Novo aluno', 'alunoNovo', '', 's'),
(2, 1, 'Procurar aluno', 'alunos', '', 's'),
(3, 2, 'Novo professor', 'professorNovo', '', 's'),
(4, 2, 'Procurar professor', 'professores', '', 's'),
(5, 3, 'Procurar responsaveis', 'responsaveis', '', 's'),
(6, 3, 'Novo responsavel', 'responsavelNovo', '', 's'),
(7, 1, 'Detalhar aluno', 'alunoDetail', '', 'n'),
(8, 1, 'Editar aluno', '', '', 'n'),
(9, 1, 'Matricular aluno', '', '', 'n'),
(11, 2, 'Detalhar professor', '', '', 'n'),
(12, 2, 'Editar professor', '', '', 'n'),
(13, 2, 'Excluir professor', '', '', 'n'),
(14, 2, 'Relacionar turma', '', '', 'n'),
(15, 3, 'Detalhar responsavel', '', '', 'n'),
(16, 3, 'Editar responsavel', '', '', 'n'),
(17, 3, 'Excluir responsavel', '', '', 'n'),
(18, 4, 'Niveis', 'niveis', '', 's'),
(19, 4, 'Ano Escolar', 'cursos', '', 's'),
(20, 4, 'Disciplinas', 'disciplinas', '', 's'),
(21, 4, 'Turmas', 'turmas', '', 's'),
(22, 4, 'Salas', 'salas', '', 's'),
(23, 4, 'CalendÃ¡rio de Notas', 'tiposAvaliacao', '', 's'),
(24, 2, 'Plano de aula', 'planoAula', 'zmdi zmdi-config', 'n'),
(25, 2, 'Planejamento', 'planejamento', 'zmdi zmdi-config', 'n'),
(26, 5, 'Nova MatrÃ­cula', '', '', 'n'),
(27, 6, 'Feed', 'home', '', 'n'),
(28, 7, 'Gerenciar turmas', 'profTurmas', '', 's'),
(29, 5, 'LanÃ§ar nota', '', '', 'n'),
(30, 4, 'Disciplina x Professor', 'dps', '', 's'),
(31, 4, 'MÃ©dias', 'medias', '', 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_tipousuario`
--

CREATE TABLE `c_tipousuario` (
  `c_tipousuario_id` int(11) NOT NULL,
  `c_tipousuario_s_nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_tipousuario`
--

INSERT INTO `c_tipousuario` (`c_tipousuario_id`, `c_tipousuario_s_nome`) VALUES
(1, 'Master'),
(2, 'Diretoria'),
(3, 'Secretaria'),
(4, 'Professor'),
(5, 'Aluno'),
(6, 'ResponsÃ¡vel'),
(7, 'Secretaria - Financeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_tipo_avaliacao`
--

CREATE TABLE `c_tipo_avaliacao` (
  `c_ta_id` int(11) NOT NULL,
  `c_ta_descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_tipo_avaliacao`
--

INSERT INTO `c_tipo_avaliacao` (`c_ta_id`, `c_ta_descricao`) VALUES
(1, '1 Nota Mensal'),
(3, '1 Nota Bimestral'),
(8, '2 Nota Mensal'),
(9, '2 Nota Bimestral'),
(10, '3 Nota Mensal'),
(11, '3 Nota Bimestral'),
(12, '4 Nota Mensal'),
(13, '4 Nota Bimestral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_transacao`
--

CREATE TABLE `c_transacao` (
  `c_tr_id` int(11) NOT NULL,
  `c_tr_codigotransacao` varchar(45) DEFAULT NULL,
  `c_cb_id` int(11) DEFAULT NULL,
  `c_tr_datainicio` date DEFAULT NULL,
  `c_tr_datapagamento` date DEFAULT NULL,
  `c_tr_valorcobrado` decimal(10,0) DEFAULT NULL,
  `c_tr_valor_pago` decimal(10,0) DEFAULT NULL,
  `c_tr_status` char(50) DEFAULT NULL,
  `c_tr_urlboleto` varchar(512) DEFAULT NULL,
  `c_tr_urlboletopdf` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_turma`
--

CREATE TABLE `c_turma` (
  `c_tur_id` int(11) NOT NULL,
  `c_curso_id` int(11) DEFAULT NULL,
  `c_tur_descricao` varchar(45) DEFAULT NULL,
  `c_tur_turno` varchar(45) DEFAULT NULL,
  `c_sala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `c_turma`
--

INSERT INTO `c_turma` (`c_tur_id`, `c_curso_id`, `c_tur_descricao`, `c_tur_turno`, `c_sala_id`) VALUES
(2, 3, '1A', 'm', 4),
(3, 5, '1A - Infantil', 'v', 4),
(4, 5, '2A - Infantil', 'v', 5),
(5, 8, '1B - Infantil', 'm', 7),
(6, 6, '2A - Fundamental', 'm', 5),
(7, 9, '3A - Fundamental', 'v', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_disciplina_professor`
--

CREATE TABLE `m_disciplina_professor` (
  `m_dp_id` int(11) NOT NULL,
  `c_disc_id` int(11) DEFAULT NULL,
  `c_pessoa_id` int(11) DEFAULT NULL,
  `c_tur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `m_disciplina_professor`
--

INSERT INTO `m_disciplina_professor` (`m_dp_id`, `c_disc_id`, `c_pessoa_id`, `c_tur_id`) VALUES
(4, 3, 32, 3),
(5, 13, 0, 5),
(7, 3, 32, 4),
(8, 7, 36, 4),
(9, 7, 36, 3),
(15, 2, 32, 5),
(16, 8, 32, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_frequencia_aluno`
--

CREATE TABLE `m_frequencia_aluno` (
  `m_fa_id` int(11) NOT NULL,
  `c_frequencia_id` int(11) NOT NULL,
  `c_pessoa_id` int(11) NOT NULL,
  `c_frequencia_presenca` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `m_frequencia_aluno`
--

INSERT INTO `m_frequencia_aluno` (`m_fa_id`, `c_frequencia_id`, `c_pessoa_id`, `c_frequencia_presenca`) VALUES
(122, 21, 31, 'p'),
(123, 21, 34, 'p'),
(124, 21, 35, 'p'),
(125, 21, 7, 'f'),
(134, 20, 31, 'p'),
(135, 20, 7, 'f'),
(136, 20, 34, 'f'),
(137, 20, 35, 'f'),
(158, 26, 31, 'p'),
(159, 26, 7, 'p'),
(160, 26, 34, 'f'),
(161, 26, 35, 'f'),
(162, 22, 31, 'p'),
(163, 22, 7, 'p'),
(164, 22, 35, 'p'),
(165, 22, 34, 'f'),
(174, 27, 31, 'p'),
(175, 27, 7, 'p'),
(176, 27, 34, 'p'),
(177, 27, 35, 'p'),
(178, 25, 31, 'p'),
(179, 25, 7, 'p'),
(180, 25, 35, 'p'),
(181, 25, 34, 'f'),
(182, 23, 31, 'p'),
(183, 23, 7, 'p'),
(184, 23, 34, 'p'),
(185, 23, 35, 'f'),
(186, 28, 31, 'p'),
(187, 28, 7, 'p'),
(188, 28, 35, 'p'),
(189, 28, 34, 'f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_media_md`
--

CREATE TABLE `m_media_md` (
  `m_media_md_id` int(11) NOT NULL,
  `c_media_id` int(11) NOT NULL,
  `c_md_id` int(11) NOT NULL,
  `m_media_md_valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `m_media_md`
--

INSERT INTO `m_media_md` (`m_media_md_id`, `c_media_id`, `c_md_id`, `m_media_md_valor`) VALUES
(76, 3, 77, 8.5),
(77, 4, 77, 9.5),
(78, 7, 77, 9),
(138, 3, 73, 5),
(139, 8, 73, 1.25),
(140, 3, 75, 8.875),
(141, 8, 75, 2.21875),
(232, 3, 70, 5.75),
(233, 4, 70, 6.5),
(234, 5, 70, 5.5),
(235, 6, 70, 9),
(236, 8, 70, 6.6875),
(237, 3, 98, 9.25),
(238, 3, 72, 8.75),
(239, 3, 85, 7),
(246, 3, 84, 10),
(247, 4, 84, 9.25),
(248, 5, 84, 8.375),
(249, 6, 84, 7),
(250, 8, 84, 8.65625);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_media_tipoavaliacao`
--

CREATE TABLE `m_media_tipoavaliacao` (
  `m_media_ta_id` int(11) NOT NULL,
  `c_media_id` int(11) NOT NULL,
  `c_ta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `m_media_tipoavaliacao`
--

INSERT INTO `m_media_tipoavaliacao` (`m_media_ta_id`, `c_media_id`, `c_ta_id`) VALUES
(16, 7, 1),
(17, 7, 3),
(18, 7, 8),
(19, 7, 9),
(20, 7, 10),
(21, 7, 11),
(22, 7, 12),
(23, 7, 13),
(24, 0, 1),
(25, 0, 3),
(26, 0, 8),
(27, 0, 9),
(28, 0, 10),
(29, 0, 11),
(30, 0, 12),
(31, 0, 13),
(106, 4, 8),
(107, 4, 9),
(108, 5, 10),
(109, 5, 11),
(110, 6, 12),
(111, 6, 13),
(124, 8, 1),
(125, 8, 3),
(126, 8, 8),
(127, 8, 9),
(128, 8, 10),
(129, 8, 11),
(130, 8, 12),
(131, 8, 13),
(134, 3, 1),
(135, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_negociacao_cobranca`
--

CREATE TABLE `m_negociacao_cobranca` (
  `m_negc_id` int(11) NOT NULL,
  `c_neg_id` int(11) DEFAULT NULL,
  `c_cb_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_negociacao_parcela`
--

CREATE TABLE `m_negociacao_parcela` (
  `m_negpar` int(11) NOT NULL,
  `c_neg_id` int(11) DEFAULT NULL,
  `c_cb_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_notarecuperacao`
--

CREATE TABLE `m_notarecuperacao` (
  `m_nr_id` int(11) NOT NULL,
  `m_nr_notaoriginal_id` int(11) NOT NULL,
  `m_nr_notarecuperada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_acesso`
--
ALTER TABLE `c_acesso`
  ADD PRIMARY KEY (`c_acesso_id`);

--
-- Indexes for table `c_cobranca`
--
ALTER TABLE `c_cobranca`
  ADD PRIMARY KEY (`c_cb_id`);

--
-- Indexes for table `c_curso`
--
ALTER TABLE `c_curso`
  ADD PRIMARY KEY (`c_curso_i_id`);

--
-- Indexes for table `c_disciplina`
--
ALTER TABLE `c_disciplina`
  ADD PRIMARY KEY (`c_disciplina_i_id`);

--
-- Indexes for table `c_evento`
--
ALTER TABLE `c_evento`
  ADD PRIMARY KEY (`c_evento_id`);

--
-- Indexes for table `c_frequencia`
--
ALTER TABLE `c_frequencia`
  ADD PRIMARY KEY (`c_frequencia_id`);

--
-- Indexes for table `c_matricula`
--
ALTER TABLE `c_matricula`
  ADD PRIMARY KEY (`c_matricula_i_id`);

--
-- Indexes for table `c_matricula_disciplina`
--
ALTER TABLE `c_matricula_disciplina`
  ADD PRIMARY KEY (`c_md_id`);

--
-- Indexes for table `c_media`
--
ALTER TABLE `c_media`
  ADD PRIMARY KEY (`c_media_id`);

--
-- Indexes for table `c_negociacao`
--
ALTER TABLE `c_negociacao`
  ADD PRIMARY KEY (`c_neg_id`);

--
-- Indexes for table `c_nivel`
--
ALTER TABLE `c_nivel`
  ADD PRIMARY KEY (`c_nivel_i_id`);

--
-- Indexes for table `c_nota`
--
ALTER TABLE `c_nota`
  ADD PRIMARY KEY (`c_nota_id`);

--
-- Indexes for table `c_pessoa`
--
ALTER TABLE `c_pessoa`
  ADD PRIMARY KEY (`c_pessoa_id`),
  ADD KEY `fk_tipousuario_i_id_idx` (`c_tipousuario_id`);

--
-- Indexes for table `c_planejamento`
--
ALTER TABLE `c_planejamento`
  ADD PRIMARY KEY (`c_plan_id`);

--
-- Indexes for table `c_plano_aula`
--
ALTER TABLE `c_plano_aula`
  ADD PRIMARY KEY (`c_plano_aula_id`);

--
-- Indexes for table `c_plano_aula_arquivo`
--
ALTER TABLE `c_plano_aula_arquivo`
  ADD PRIMARY KEY (`c_paa_id`);

--
-- Indexes for table `c_rotina`
--
ALTER TABLE `c_rotina`
  ADD PRIMARY KEY (`c_rotina_id`);

--
-- Indexes for table `c_sala`
--
ALTER TABLE `c_sala`
  ADD PRIMARY KEY (`c_sala_id`);

--
-- Indexes for table `c_subrotina`
--
ALTER TABLE `c_subrotina`
  ADD PRIMARY KEY (`c_subrotina_id`);

--
-- Indexes for table `c_tipousuario`
--
ALTER TABLE `c_tipousuario`
  ADD PRIMARY KEY (`c_tipousuario_id`);

--
-- Indexes for table `c_tipo_avaliacao`
--
ALTER TABLE `c_tipo_avaliacao`
  ADD PRIMARY KEY (`c_ta_id`);

--
-- Indexes for table `c_transacao`
--
ALTER TABLE `c_transacao`
  ADD PRIMARY KEY (`c_tr_id`);

--
-- Indexes for table `c_turma`
--
ALTER TABLE `c_turma`
  ADD PRIMARY KEY (`c_tur_id`);

--
-- Indexes for table `m_disciplina_professor`
--
ALTER TABLE `m_disciplina_professor`
  ADD PRIMARY KEY (`m_dp_id`);

--
-- Indexes for table `m_frequencia_aluno`
--
ALTER TABLE `m_frequencia_aluno`
  ADD PRIMARY KEY (`m_fa_id`);

--
-- Indexes for table `m_media_md`
--
ALTER TABLE `m_media_md`
  ADD PRIMARY KEY (`m_media_md_id`);

--
-- Indexes for table `m_media_tipoavaliacao`
--
ALTER TABLE `m_media_tipoavaliacao`
  ADD PRIMARY KEY (`m_media_ta_id`);

--
-- Indexes for table `m_negociacao_cobranca`
--
ALTER TABLE `m_negociacao_cobranca`
  ADD PRIMARY KEY (`m_negc_id`);

--
-- Indexes for table `m_negociacao_parcela`
--
ALTER TABLE `m_negociacao_parcela`
  ADD PRIMARY KEY (`m_negpar`);

--
-- Indexes for table `m_notarecuperacao`
--
ALTER TABLE `m_notarecuperacao`
  ADD PRIMARY KEY (`m_nr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_acesso`
--
ALTER TABLE `c_acesso`
  MODIFY `c_acesso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `c_cobranca`
--
ALTER TABLE `c_cobranca`
  MODIFY `c_cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `c_curso`
--
ALTER TABLE `c_curso`
  MODIFY `c_curso_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `c_disciplina`
--
ALTER TABLE `c_disciplina`
  MODIFY `c_disciplina_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `c_evento`
--
ALTER TABLE `c_evento`
  MODIFY `c_evento_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_frequencia`
--
ALTER TABLE `c_frequencia`
  MODIFY `c_frequencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `c_matricula`
--
ALTER TABLE `c_matricula`
  MODIFY `c_matricula_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `c_matricula_disciplina`
--
ALTER TABLE `c_matricula_disciplina`
  MODIFY `c_md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `c_media`
--
ALTER TABLE `c_media`
  MODIFY `c_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `c_negociacao`
--
ALTER TABLE `c_negociacao`
  MODIFY `c_neg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_nivel`
--
ALTER TABLE `c_nivel`
  MODIFY `c_nivel_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `c_nota`
--
ALTER TABLE `c_nota`
  MODIFY `c_nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `c_pessoa`
--
ALTER TABLE `c_pessoa`
  MODIFY `c_pessoa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `c_planejamento`
--
ALTER TABLE `c_planejamento`
  MODIFY `c_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `c_plano_aula`
--
ALTER TABLE `c_plano_aula`
  MODIFY `c_plano_aula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_plano_aula_arquivo`
--
ALTER TABLE `c_plano_aula_arquivo`
  MODIFY `c_paa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_rotina`
--
ALTER TABLE `c_rotina`
  MODIFY `c_rotina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `c_sala`
--
ALTER TABLE `c_sala`
  MODIFY `c_sala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `c_subrotina`
--
ALTER TABLE `c_subrotina`
  MODIFY `c_subrotina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `c_tipousuario`
--
ALTER TABLE `c_tipousuario`
  MODIFY `c_tipousuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `c_tipo_avaliacao`
--
ALTER TABLE `c_tipo_avaliacao`
  MODIFY `c_ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `c_transacao`
--
ALTER TABLE `c_transacao`
  MODIFY `c_tr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_turma`
--
ALTER TABLE `c_turma`
  MODIFY `c_tur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_disciplina_professor`
--
ALTER TABLE `m_disciplina_professor`
  MODIFY `m_dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `m_frequencia_aluno`
--
ALTER TABLE `m_frequencia_aluno`
  MODIFY `m_fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `m_media_md`
--
ALTER TABLE `m_media_md`
  MODIFY `m_media_md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `m_media_tipoavaliacao`
--
ALTER TABLE `m_media_tipoavaliacao`
  MODIFY `m_media_ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `m_negociacao_cobranca`
--
ALTER TABLE `m_negociacao_cobranca`
  MODIFY `m_negc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_negociacao_parcela`
--
ALTER TABLE `m_negociacao_parcela`
  MODIFY `m_negpar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_notarecuperacao`
--
ALTER TABLE `m_notarecuperacao`
  MODIFY `m_nr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `c_pessoa`
--
ALTER TABLE `c_pessoa`
  ADD CONSTRAINT `fk_tipousuario_i_id` FOREIGN KEY (`c_tipousuario_id`) REFERENCES `c_tipousuario` (`c_tipousuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
