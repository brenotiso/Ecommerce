-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jun-2018 às 15:20
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `idCliente`, `data`, `status`) VALUES
(1, 12, '2018-06-14 01:00:51', 'Pedido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `informacoes` text NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `quantidade` int(11) UNSIGNED NOT NULL,
  `disponivel` tinyint(1) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `informacoes`, `preco`, `quantidade`, `disponivel`, `img`) VALUES
(2, 'VGA AMD XFX RADEON RX 580 OC', 'Placa de Vídeo VGA AMD XFX RX 580 OC+ GTS XXX EDITION 4GB DDR5 1386Mhz - RX-580P4DFD6', 'Características:\r\n\r\n- Marca: XFX\r\n\r\n- Modelo: RX-580P4DFD6\r\n\r\n \r\n\r\nEspecificações:\r\n\r\n \r\n\r\nInterface:\r\n\r\n- PCI-E 3.0\r\n\r\n- Perfil do cartão: Dual Slot\r\n\r\n- Solução Térmica: DD Fansink\r\n\r\n \r\n\r\nGPU:\r\n\r\n- Clock: 1257 MHz\r\n\r\n- XFX True: 1366MHz\r\n\r\n- OC + Clock: 1386MHz\r\n\r\n- Stream Processors: 2304\r\n\r\n \r\n\r\nMemória:\r\n\r\n- Bus: 256 bit\r\n\r\n- Clock: 7.0 GHz\r\n\r\n- Capacidade: 4GB\r\n\r\n- Tipo: DDR5\r\n\r\n \r\n\r\nSaídas:\r\n\r\n- Suporte de link duplo\r\n\r\n- Resolução máxima suportada: 4096 x 2160\r\n\r\n \r\n\r\nMonitores:\r\n\r\n- Até 6 monitores suportados. (pode exigir o uso de MST Hubs)\r\n\r\n \r\n\r\nConexões:\r\n\r\n- 3x DisplayPort 1.4\r\n\r\n- 1x HDMI 2.0b\r\n\r\n- 1x DL-DVI-D\r\n\r\n \r\n\r\nRecursos:\r\n\r\n- Tecnologia AMD FreeSync 2\r\n\r\n- Radeon Chill\r\n\r\n- ReLive Capture\r\n\r\n- DirectX 12\r\n\r\n- OpenGL 4.5\r\n\r\n- Vulkan\r\n\r\n- AMD Virtual Super Resolution (VSR)\r\n\r\n- Software Radeon\r\n\r\n- Tecnologia AMD CrossFire\r\n\r\n- AMD XConnect Ready\r\n\r\n- Tecnologia AMD Eyefinity\r\n\r\n- Suporte OpenCL\r\n\r\n- Arquitetura Polaris\r\n\r\n- Tecnologia AMD LiquidVR\r\n\r\n \r\n\r\nRequisitos:\r\n\r\n- Alimentação externa de 8 pinos (1x)\r\n\r\n- Requisito Mínimo de Alimentação: 500 watts\r\n\r\n- Fonte de alimentação recomendada: 550W\r\n\r\n \r\n\r\nConteúdo da Embalagem:\r\n\r\n- 1x Placa de Vídeo XFX\r\n\r\n- 1x Guia do Usuário\r\n\r\n- 1x Driver de Instalação\r\n\r\n- 1x Cartão de garantia\r\n\r\n\r\n\r\n\r\nGarantia\r\n3 meses de garantia\r\n\r\nPeso\r\n1320 gramas (bruto com embalagem)', '1882.23', 100, 1, ''),
(3, 'Headset Gamer HyperX Cloud Stinger - HX-HSCS-BK/NA', 'O HyperX Cloud Stinger HX-HSCS-BK/LA é o headset ideal para jogadores que procuram leveza e conforto, qualidade de som superior e maior praticidade. Com apenas 275 gramas, ele é confortável no seu pescoço e seus fones de ouvido giram em um ângulo de 90 graus para um melhor encaixe.', 'Características:\n- Marca: HyperX\n- Modelo: Cloud Stinger\n\nEspecificações: \n\nFone de ouvido: \n- Driver dinâmico, 50 mm com magnetos de neodímio \n- Tipo circumaural, fechado \n- Resposta de frequência 18Hz–23,000 Hz \n- Impedância 30 ? \n- Nível de pressão sonora 102 ± 3dBSPL/mW a 1kHz \n- T.H.D. ? 2% \n- Potência de entrada classificação 30mW, máxima 500mW \n- Tipo e comprimento do fio headset (1,3 m) + cabo de extensão em Y (1,7 m) \n- Conexão headset - plugue de 3,5 mm (4 polos) + cabo de extensão - plugues de 3,5 mm estéreo e de microfone\n\nMicrofone:\n- Elemento microfone condensador electret \n- Padrão polar uni-direcional, cancelamento de ruído \n- Resposta de frequência 50 Hz~18.000 Hz \n- Sensibilidade -40 dBV (0 dB=1 V/Pa,1 kHz) \n\nInformações adicionais:\n\n- Fones de ouvido giratórios em 90 graus: Os fones de ouvido do HyperX Cloud Stinger giram em um ângulo de 90 graus para se encaixar melhor em torno de seu pescoço, para que você possa jogar com conforto durante horas. \n\n- Leve e confortável: Com apenas 275 gramas, o HyperX Cloud Stinger não o deixará cansado com seu peso, tornando-o ideal para sessões de jogos prolongadas.\n\n- Drivers direcionais de 50 mm para maior precisão do áudio: Os drivers direcionais de 50 mm são paralelos ao ouvido, para posicionar o som diretamente no ouvido para qualidade de som de nível de jogos. \n\n- Espuma memory foam exclusiva HyperX: Jogue com conforto por horas com a espuma memory foam exclusiva HyperX. \n\n- Tira ajustável de aço: O ajuste da tira de aço sólido de alta qualidade do HyperX Cloud Stinger é criado para durabilidade e estabilidade prolongadas. \n\n- Controle de volume intuitivo no fone do headset: O controle deslizante de volume está localizado na parte inferior do fone de ouvido direito, sendo fácil de acessar para ajuste do volume de áudio. \n\n- Microfone com controle para mudo e cancelamento de ruído: Silencie o microfone de forma prática, posicionando-o verticalmente contra a cabeça. A cancelamento de ruído passivo integrado do HyperX Cloud Stinger reduz o ruído de fundo para uma melhor qualidade de voz. O headset é certificado pela TeamSpeak e a Discord, sendo compatível com outros importantes programas de mensagens, incluindo Skype, Raidcall e Ventrilo. \n\n- Compatibilidade com múltiplas plataformas: O HyperX Cloud Stinger é compatível com PC, Xbox One1 , PS4, Wii U e dispositivos móveis e ainda possui um único plugue estéreo de 3,5 mm (4 polos) e um cabo de extensão para PC com plugues duplos de 3,5 mm estéreo e de microfone. Tenha o mesmo conforto e a mesma experiência de áudio em PCs ou consoles, ou simplesmente plugue no seu dispositivo móvel. (Compatível com dispositivos com conectores padrão CTIA)\n\nConteúdo da embalagem:\n- 01 Headset Gamer HyperX \n\n', '299.90', 500, 1, ''),
(4, 'Headset Gamer HyperX Cloud Stinger - HX-HSCS-BK/NA', 'O HyperX Cloud Stinger HX-HSCS-BK/LA é o headset ideal para jogadores que procuram leveza e conforto, qualidade de som superior e maior praticidade. Com apenas 275 gramas, ele é confortável no seu pescoço e seus fones de ouvido giram em um ângulo de 90 graus para um melhor encaixe.', 'Características:\r\n- Marca: HyperX\r\n- Modelo: Cloud Stinger\r\n\r\nEspecificações: \r\n\r\nFone de ouvido: \r\n- Driver dinâmico, 50 mm com magnetos de neodímio \r\n- Tipo circumaural, fechado \r\n- Resposta de frequência 18Hz–23,000 Hz \r\n- Impedância 30 ? \r\n- Nível de pressão sonora 102 ± 3dBSPL/mW a 1kHz \r\n- T.H.D. ? 2% \r\n- Potência de entrada classificação 30mW, máxima 500mW \r\n- Tipo e comprimento do fio headset (1,3 m) + cabo de extensão em Y (1,7 m) \r\n- Conexão headset - plugue de 3,5 mm (4 polos) + cabo de extensão - plugues de 3,5 mm estéreo e de microfone\r\n\r\nMicrofone:\r\n- Elemento microfone condensador electret \r\n- Padrão polar uni-direcional, cancelamento de ruído \r\n- Resposta de frequência 50 Hz~18.000 Hz \r\n- Sensibilidade -40 dBV (0 dB=1 V/Pa,1 kHz) \r\n\r\nInformações adicionais:\r\n\r\n- Fones de ouvido giratórios em 90 graus: Os fones de ouvido do HyperX Cloud Stinger giram em um ângulo de 90 graus para se encaixar melhor em torno de seu pescoço, para que você possa jogar com conforto durante horas. \r\n\r\n- Leve e confortável: Com apenas 275 gramas, o HyperX Cloud Stinger não o deixará cansado com seu peso, tornando-o ideal para sessões de jogos prolongadas.\r\n\r\n- Drivers direcionais de 50 mm para maior precisão do áudio: Os drivers direcionais de 50 mm são paralelos ao ouvido, para posicionar o som diretamente no ouvido para qualidade de som de nível de jogos. \r\n\r\n- Espuma memory foam exclusiva HyperX: Jogue com conforto por horas com a espuma memory foam exclusiva HyperX. \r\n\r\n- Tira ajustável de aço: O ajuste da tira de aço sólido de alta qualidade do HyperX Cloud Stinger é criado para durabilidade e estabilidade prolongadas. \r\n\r\n- Controle de volume intuitivo no fone do headset: O controle deslizante de volume está localizado na parte inferior do fone de ouvido direito, sendo fácil de acessar para ajuste do volume de áudio. \r\n\r\n- Microfone com controle para mudo e cancelamento de ruído: Silencie o microfone de forma prática, posicionando-o verticalmente contra a cabeça. A cancelamento de ruído passivo integrado do HyperX Cloud Stinger reduz o ruído de fundo para uma melhor qualidade de voz. O headset é certificado pela TeamSpeak e a Discord, sendo compatível com outros importantes programas de mensagens, incluindo Skype, Raidcall e Ventrilo. \r\n\r\n- Compatibilidade com múltiplas plataformas: O HyperX Cloud Stinger é compatível com PC, Xbox One1 , PS4, Wii U e dispositivos móveis e ainda possui um único plugue estéreo de 3,5 mm (4 polos) e um cabo de extensão para PC com plugues duplos de 3,5 mm estéreo e de microfone. Tenha o mesmo conforto e a mesma experiência de áudio em PCs ou consoles, ou simplesmente plugue no seu dispositivo móvel. (Compatível com dispositivos com conectores padrão CTIA)\r\n\r\nConteúdo da embalagem:\r\n- 01 Headset Gamer HyperX \r\n\r\n', '299.90', 500, 1, ''),
(5, 'Processador AMD Ryzen 7 1700 c/ Wraith Spire, Octa Core, Cache 20MB, 3.0GHz (3.7GHz Max Turbo)', 'Processador AMD Ryzen 7 1700 c/ Wraith Spire, Octa Core, Cache 20MB, 3.0GHz (3.7GHz Max Turbo) AM4 YD1700BBAEBOX', 'Características:\r\n\r\n- Marca: AMD\r\n\r\n- Modelo: YD1700BBAEBOX\r\n\r\n \r\n\r\nEspecificações:\r\n\r\n- Séries: Ryzen 7\r\n\r\n- Socket: Socket AM4\r\n\r\n- Núcleos: 8 core\r\n\r\n- Frequência de Operação: 3.0GHz (3.7GHz Max Turbo)\r\n\r\n- L2 Cache: 4MB\r\n\r\n- L3 cache: 16MB\r\n\r\n- Modo de operação 64 Bit\r\n\r\n- Potência: 65 W \r\n\r\n \r\n\r\nConteúdo da embalagem:\r\n\r\n- 01 Processador AMD \r\n\r\n- 01 Cooler Wraith Spire 95W\r\n\r\n \r\n\r\nObservação:\r\n\r\n* As linhas de processadores Ryzen 3, 5 e 7 não possuem vídeo integrado, necessário ter uma placa de vídeo off-board.\r\n\r\n', '1449.90', 40, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_categoria`
--

CREATE TABLE `produto_categoria` (
  `id` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_compra`
--

CREATE TABLE `produto_compra` (
  `idProduto` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `quantidade` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto_compra`
--

INSERT INTO `produto_compra` (`idProduto`, `idCompra`, `quantidade`) VALUES
(2, 1, 2),
(3, 1, 1),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `rua` varchar(80) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `numero` tinyint(5) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `cep` int(8) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `privilegio` tinyint(1) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `telefone`, `email`, `senha`, `rua`, `bairro`, `numero`, `complemento`, `cep`, `cidade`, `estado`, `privilegio`, `dataCadastro`) VALUES
(11, 'teste', '38766754640', '991733200', 'a@a.com', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1', 1, '1', 37014310, 'Lavras', 'Minas Gerais', 1, '2018-06-14 13:19:25'),
(12, 'breno', '12638937673', '35991733200', 'b@a.com', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'a', 1, NULL, 37014310, 'vga', 'mg', 0, '2018-06-14 13:19:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `produto_compra`
--
ALTER TABLE `produto_compra`
  ADD PRIMARY KEY (`idProduto`,`idCompra`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `relacao_compra` (`idCompra`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produto_categoria`
--
ALTER TABLE `produto_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `recalao_cliente` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD CONSTRAINT `relacao_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relacao_produto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produto_compra`
--
ALTER TABLE `produto_compra`
  ADD CONSTRAINT `produto_compra_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `relacao_compra` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
