-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Out-2019 às 01:27
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bludata`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `nome_fantasia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `estado_id`, `nome_fantasia`, `cnpj`) VALUES
(1, 3, 'Americanas', 'xx.xxx.xxx/xxxx-xx'),
(2, 8, 'Ponto Frio', '12.xxx.xxx/xxxx-xx'),
(3, 18, 'Saraiva', '32.xxx.xxx/xxxx-xx'),
(4, 14, 'Casas bahia', '51.xxx.xxx/xxxx-xx');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amazonas', 'AM'),
(4, 'Amapá', 'AP'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Minas Gerais', 'MG'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Mato Grosso', 'MT'),
(14, 'Pará', 'PA'),
(15, 'Paraiba', 'PB'),
(16, 'Pernambuco', 'PE'),
(17, 'Piauí', 'PI'),
(18, 'Paraná', 'PR'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rondônia', 'RO'),
(22, 'Roraima', 'RR'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Santa Catarina', 'SC'),
(25, 'Sergipe', 'SE'),
(26, 'São Paulo', 'SP'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `empresa_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `empresa_id`, `nome`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 'João', 'F', '2019-10-18 21:41:42', '2019-10-18 21:41:42'),
(2, 3, 'Maria', 'F', '2019-10-18 21:43:16', '2019-10-18 21:43:16'),
(3, 4, 'Cesar', 'F', '2019-10-18 21:47:34', '2019-10-18 21:47:34'),
(4, 2, 'CriptForn', 'J', '2019-10-18 21:52:41', '2019-10-18 21:52:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_pessoa_fisica`
--

CREATE TABLE `fornecedores_pessoa_fisica` (
  `fornecedor_id` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores_pessoa_fisica`
--

INSERT INTO `fornecedores_pessoa_fisica` (`fornecedor_id`, `cpf`, `rg`, `nascimento`) VALUES
(1, '954.615.185-84', '51.987.481-48', '1987-10-02'),
(2, '956.999.999-99', '98.578.846-95', '1983-11-08'),
(3, '888.888.888-88', '88.888.888-88', '1994-08-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_pessoa_juridica`
--

CREATE TABLE `fornecedores_pessoa_juridica` (
  `fornecedor_id` int(10) UNSIGNED NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores_pessoa_juridica`
--

INSERT INTO `fornecedores_pessoa_juridica` (`fornecedor_id`, `cnpj`) VALUES
(4, '17.128.281/0001-65');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_19_001635_create_estados_table', 1),
(2, '2019_09_19_001841_create_empresas_table', 1),
(3, '2019_09_19_012150_create_fornecedors_table', 1),
(4, '2019_09_19_012200_create_fornecedor_pessoa_fisicas_table', 1),
(5, '2019_09_19_012207_create_fornecedor_pessoa_juridicas_table', 1),
(6, '2019_09_19_012216_create_telefones_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `id` int(10) UNSIGNED NOT NULL,
  `fornecedor_id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`id`, `fornecedor_id`, `numero`) VALUES
(1, 1, '(11) 95321-8475'),
(2, 1, '(11) 97413-8754'),
(3, 2, '(34) 95632-4873'),
(4, 2, '(34) 2547-6842'),
(5, 2, '(34) 98546-6587'),
(6, 3, '(34) 98546-6512'),
(7, 4, '(21) 98746-3216');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresas_cnpj_unique` (`cnpj`),
  ADD KEY `empresas_estado_id_foreign` (`estado_id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fornecedores_empresa_id_foreign` (`empresa_id`);

--
-- Indexes for table `fornecedores_pessoa_fisica`
--
ALTER TABLE `fornecedores_pessoa_fisica`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Indexes for table `fornecedores_pessoa_juridica`
--
ALTER TABLE `fornecedores_pessoa_juridica`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telefones_fornecedor_id_foreign` (`fornecedor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fornecedores_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);

--
-- Limitadores para a tabela `fornecedores_pessoa_fisica`
--
ALTER TABLE `fornecedores_pessoa_fisica`
  ADD CONSTRAINT `fornecedores_pessoa_fisica_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`);

--
-- Limitadores para a tabela `fornecedores_pessoa_juridica`
--
ALTER TABLE `fornecedores_pessoa_juridica`
  ADD CONSTRAINT `fornecedores_pessoa_juridica_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`);

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `telefones_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
