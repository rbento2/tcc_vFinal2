-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Jul-2015 às 16:50
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easymenu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comanda`
--

CREATE TABLE IF NOT EXISTS `comanda` (
  `idComanda` int(11) NOT NULL auto_increment,
  `totalBruto` int(11) NOT NULL,
  PRIMARY KEY (`idComanda`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int(11) NOT NULL auto_increment,
  `login` varchar(100) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cargo` varchar(45) NOT NULL,
  `Turno` varchar(45) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `garcom`
--

CREATE TABLE IF NOT EXISTS `garcom` (
  `idGarcom` int(11) NOT NULL auto_increment,
  `login` varchar(100) NOT NULL,
  `mesaResponsavel` int(11) NOT NULL,
  `Funcionario_idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idGarcom`),
  KEY `Funcionario_idFuncionario` (`Funcionario_idFuncionario`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE IF NOT EXISTS `ingrediente` (
  `idIngrediente` int(11) NOT NULL auto_increment,
  `descricao` varchar(100) NOT NULL,
  `opcional` tinyint(1) NOT NULL,
  PRIMARY KEY (`idIngrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ingrediente`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `itemcomanda`
--

CREATE TABLE IF NOT EXISTS `itemcomanda` (
  `idItemComanda` int(11) NOT NULL auto_increment,
  `quantidade` double NOT NULL,
  `horaPedido` datetime NOT NULL,
  `FK_idComanda` int(11) NOT NULL,
  `FK_idItemMenu` int(11) NOT NULL,
  PRIMARY KEY (`idItemComanda`),
  KEY `FK_idComanda` (`FK_idComanda`),
  KEY `FK_idItemMenu` (`FK_idItemMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` char(2) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL auto_increment,
  `descricao` varchar(80) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `itemmenu`
--

CREATE TABLE IF NOT EXISTS `itemmenu` (
  `idItemMenu` int(11) NOT NULL auto_increment,
  `FK_idMenu` int(11) NOT NULL,
  `preco` float NOT NULL,
  `nomeItemMenu` varchar(100) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `tempoPreparo` int(11) NOT NULL,
  `FK_idIngrediente` int(11) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idItemMenu`),
 FOREIGN KEY (`FK_idIngrediente`) REFERENCES ingrediente(idIngrediente),
 FOREIGN KEY (FK_idMenu) REFERENCES menu(idMenu)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `menudia`
--

CREATE TABLE IF NOT EXISTS `menudia` (
   idMenuDia int NOT NULL PRIMARY KEY auto_increment,
  `FK_idMenu` int(11) NOT NULL ,
  `FK_idItemMenu` int(11) NOT NULL,
  FOREIGN KEY (FK_idMenu) REFERENCES menu(idMenu),
  FOREIGN KEY (FK_idItemMenu) REFERENCES itemmenu(idItemMenu));

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE IF NOT EXISTS mesa(
  `idMesa` int PRIMARY KEY  auto_increment,
  `FK_login` varchar(100) NOT NULL,
  `statusMesa` varchar(50) NOT NULL DEFAULT 'Livre',
  `FK_idGarcom` int(11) NOT NULL,
  `FK_idComanda` int(11) NOT NULL,
  FOREIGN KEY (FK_idGarcom) REFERENCES garcom(idGarcom),
  FOREIGN KEY (FK_idComanda) REFERENCES comanda(idComanda),
  FOREIGN KEY (FK_login) REFERENCES login(login));

-- --------------------------------------------------------

--
-- Estrutura da tabela `formapagamento`
--

CREATE TABLE IF NOT EXISTS `formapagamento` (
idFormaPagamento int primary key auto_increment,
  `FK_idPagamento` int(11) NOT NULL ,
  `tipo` varchar(150) NOT NULL,
  `observações` varchar(300) NOT NULL,
  `bandeira` varchar(50) not NULL);



-- --------------------------------------------------------
--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS pagamento(
  `idPagamento` int(11) PRIMARY KEY auto_increment,
  `total` double NOT NULL,
  `FK_idComanda` int(11) NOT NULL,
  `FK_idFormaPagamento` int(11) NOT NULL,
  FOREIGN KEY (FK_idComanda) REFERENCES comanda(idComanda),
  FOREIGN KEY (FK_idFormaPagamento) REFERENCES formapagamento(idFormaPagamento));




-- --------------------------------------------------------



--
-- Estrutura da tabela `prato`
--

CREATE TABLE IF NOT EXISTS `prato` (
   idPrato int PRIMARY KEY auto_increment,
  `FK_idItemMenu` int(11) NOT NULL DEFAULT '0',
  `FK_idIngrediente` int(11) NOT NULL DEFAULT '0',
  FOREIGN KEY (FK_idItemMenu) REFERENCES itemmenu(idItemMenu),
  FOREIGN KEY (FK_idIngrediente) REFERENCES ingrediente(idIngrediente)
);



INSERT INTO `ingrediente` (`idIngrediente`, `descricao`, `opcional`) VALUES
(1, 'gelo', 1);

INSERT INTO `menu` (`idMenu`, `descricao`) VALUES
(0, 'menu default'),
(1, 'default');

INSERT INTO `itemmenu` (`idItemMenu`, `FK_idMenu`, `preco`, `nomeItemMenu`, `tipo`, `tempoPreparo`, `FK_idIngrediente`, `imagem`) VALUES
(0, 1, 4, 'Pepsi', 'b', 0, 1, '../imagens/pepsi_PNG.png'),
(1, 1, 5, 'coca-cola Lata', 'b', 0, 1, '../imagens/coca.png'),
(2, 1, 4.5, 'Fanta laranja', 'b', 0, 1, NULL),
(3, 1, 15, 'Frango Grelhado', 'c', 15, 1, NULL),
(4, 1, 25, 'frango a parmegiana', 'p', 15, 1, NULL),
(5, 1, 30, 'sardinha', 'p', 20, 1, NULL),
(6, 1, 18, 'wisk 12 anos', 'b', 0, NULL, NULL);


INSERT INTO `login` (`login`, `senha`, `tipo`) VALUES
('mesa1', 'mesa1', 'me'),
('teste', 'teste', 'fu'),
('teste4', '123', 'fu');



