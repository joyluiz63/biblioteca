-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Nov-2023 às 13:46
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autors`
--

CREATE TABLE `autors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `espirito` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `autors`
--

INSERT INTO `autors` (`id`, `nome`, `espirito`, `created_at`, `updated_at`) VALUES
(1, 'Joana de Ângelis', 1, '2023-10-27 21:52:47', '2023-10-27 22:38:34'),
(2, 'Hammed', 1, '2023-10-27 22:01:06', '2023-10-27 22:01:06'),
(7, 'Allan Kardec', 0, '2023-10-28 05:02:40', '2023-10-28 05:02:40'),
(8, 'Francisco Candido Xavier', 0, '2023-10-28 05:21:50', '2023-10-28 05:21:50'),
(9, 'Vera Lúcia Marinzeck de Carvalho', 0, '2023-10-30 09:04:21', '2023-10-30 09:04:21'),
(10, 'Francisco do Espirito Santo Netto', 0, '2023-10-30 09:04:56', '2023-10-30 09:04:56'),
(11, 'Leon Denis', 0, '2023-10-30 09:05:21', '2023-10-30 09:05:21'),
(12, 'Divaldo Pereira Franco', 0, '2023-10-30 09:05:45', '2023-10-30 09:05:45'),
(13, 'Raul Teixeira', 0, '2023-10-30 09:06:03', '2023-10-30 09:06:03'),
(14, 'Irmão X', 1, '2023-10-30 09:06:32', '2023-10-30 09:06:32'),
(15, 'André Luis', 1, '2023-10-30 09:07:04', '2023-10-30 09:07:04'),
(16, 'Emmanuel', 1, '2023-10-30 10:00:53', '2023-10-30 10:00:53'),
(17, 'Autor Teste', 1, '2023-11-01 21:22:34', '2023-11-01 21:22:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor_livro`
--

CREATE TABLE `autor_livro` (
  `livro_id` bigint(20) UNSIGNED NOT NULL,
  `autor_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `autor_livro`
--

INSERT INTO `autor_livro` (`livro_id`, `autor_id`) VALUES
(3, 2),
(3, 8),
(4, 7),
(5, 2),
(6, 7),
(1, 7),
(3, 7),
(4, 1),
(6, 1),
(5, 9),
(5, 11),
(5, 13),
(7, 7),
(8, 9),
(9, 9),
(10, 7),
(11, 7),
(12, 7),
(13, 7),
(14, 16),
(14, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Obra Básica', '2023-10-27 22:52:07', '2023-10-27 22:52:07'),
(2, 'Romance', '2023-10-27 22:52:25', '2023-10-27 22:52:35'),
(3, 'Poesia', '2023-10-27 22:53:29', '2023-10-27 22:53:29'),
(4, 'Auto Conhecimento', '2023-11-01 21:24:59', '2023-11-01 21:24:59'),
(5, 'Doutrinária', '2023-11-01 21:25:34', '2023-11-01 21:26:54'),
(6, 'Infantil', '2023-11-01 21:26:19', '2023-11-01 21:26:19'),
(7, 'Bibliografia', '2023-11-01 21:26:33', '2023-11-01 21:26:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_livro`
--

CREATE TABLE `categoria_livro` (
  `livro_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria_livro`
--

INSERT INTO `categoria_livro` (`livro_id`, `categoria_id`) VALUES
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(1, 1),
(3, 1),
(3, 2),
(4, 2),
(7, 1),
(8, 2),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'FEB - Federação Espírita Brasileira', '2023-10-25 06:57:00', '2023-10-25 06:57:00'),
(2, 'Boa Nova', '2023-10-25 07:05:31', '2023-10-25 07:05:31'),
(3, 'Petit', '2023-10-25 07:08:22', '2023-10-25 07:08:22'),
(4, 'O Clarim', '2023-10-25 23:41:37', '2023-10-25 23:41:37'),
(5, 'Vivaluz', '2023-10-26 06:59:48', '2023-10-26 06:59:48'),
(6, 'Letra Espirita', '2023-10-27 09:22:41', '2023-10-27 09:22:41'),
(7, 'Chico Xavier', '2023-10-27 09:23:53', '2023-10-27 09:23:53'),
(8, 'Leal', '2023-10-27 09:24:49', '2023-10-27 09:24:49'),
(9, 'Otimismo', '2023-10-27 09:25:11', '2023-10-27 09:25:11'),
(10, 'Vozes', '2023-10-27 09:25:21', '2023-10-27 09:25:21'),
(11, 'Lumen', '2023-10-27 09:25:34', '2023-10-27 09:25:34'),
(12, 'Editora teste -', '2023-11-01 21:14:47', '2023-11-01 21:21:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `retirada` date NOT NULL,
  `devolvera` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id`, `user_id`, `retirada`, `devolvera`, `created_at`, `updated_at`) VALUES
(5, 2, '2023-10-11', '2023-10-25', '2023-11-01 22:42:53', '2023-11-01 22:42:53'),
(6, 1, '2023-10-04', '2023-10-18', '2023-11-01 22:43:58', '2023-11-01 22:43:58'),
(7, 1, '2023-10-11', '2023-10-25', '2023-11-02 00:22:49', '2023-11-02 00:22:49'),
(8, 2, '2023-11-01', '2023-11-01', '2023-11-02 00:24:36', '2023-11-02 00:24:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo_livro`
--

CREATE TABLE `emprestimo_livro` (
  `emprestimo_id` bigint(20) UNSIGNED NOT NULL,
  `livro_id` bigint(20) UNSIGNED NOT NULL,
  `devolvido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emprestimo_livro`
--

INSERT INTO `emprestimo_livro` (`emprestimo_id`, `livro_id`, `devolvido`) VALUES
(5, 12, '2023-11-01'),
(5, 11, '2023-11-01'),
(5, 14, '2023-11-01'),
(6, 1, '2023-11-01'),
(7, 12, '2023-11-01'),
(7, 6, NULL),
(7, 11, '2023-11-01'),
(8, 12, NULL),
(8, 11, '2023-11-01'),
(8, 14, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editora_id` bigint(20) UNSIGNED NOT NULL,
  `emprestado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `editora_id`, `emprestado`, `created_at`, `updated_at`) VALUES
(1, 'O Livro dos Espíritos', 5, 0, NULL, '2023-11-02 00:22:06'),
(3, 'Teste de Titulo Editado', 8, 0, '2023-10-29 02:45:35', '2023-11-01 23:32:21'),
(4, 'Teste titulo com autor', 1, 0, '2023-10-29 02:49:57', '2023-11-01 20:18:42'),
(5, 'Teste com varios autores e categorias', 8, 0, '2023-10-29 02:59:42', '2023-11-01 22:25:31'),
(6, 'Livro id=6', 10, 1, '2023-10-29 03:07:38', '2023-11-02 00:22:49'),
(7, 'O Evangelho Segundo o Espiritismo', 5, 0, '2023-10-30 09:32:48', '2023-11-01 22:35:31'),
(8, 'Violetas na Janela', 9, 0, '2023-10-30 09:35:36', '2023-11-01 23:32:21'),
(9, 'Se Não Fosse Assim... Como Seria?', 9, 0, '2023-10-30 09:37:53', '2023-10-30 09:37:53'),
(10, 'O Livro dos Médiuns', 5, 0, '2023-10-30 09:51:19', '2023-11-01 20:44:50'),
(11, 'O Céu e o Inferno', 5, 0, '2023-10-30 09:51:46', '2023-11-02 01:36:29'),
(12, 'A Gênese', 5, 1, '2023-10-30 09:57:27', '2023-11-02 00:24:36'),
(13, 'O Que É O Espiritismo', 5, 0, '2023-10-30 09:58:30', '2023-11-01 22:25:31'),
(14, 'O Consolador', 5, 1, '2023-10-30 10:05:09', '2023-11-02 00:24:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_23_145411_create_editoras_table', 1),
(6, '2023_10_23_145502_create_autors_table', 1),
(7, '2023_10_23_145600_create_categorias_table', 1),
(8, '2023_10_23_145706_create_livros_table', 1),
(9, '2023_10_23_145752_create_autor_livro_table', 1),
(10, '2023_10_23_145813_create_categoria_livro_table', 1),
(11, '2023_10_23_173247_create_emprestimos_table', 1),
(12, '2023_10_23_173307_create_emprestimo_livro_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `cpf`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `fone`, `email`, `email_verified_at`, `password`, `access_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joy Luiz Gomes da Silva', '32046987004', 'Ernesto Gomes', '815', NULL, 'Passo das Pedras', 'Gravatai', '51 995833818', 'joyluiz63@gmail.com', NULL, '$2y$10$BTJiVoeo02yloTrcITkvRuus7pyrQzCvU4VCFnWFDrKUBKRPStOQO', 'admin', NULL, '2023-11-01 01:43:26', '2023-11-01 01:43:26'),
(2, 'Usuario Teste', '99999999999', 'teste', '0', NULL, 'teste', 'teste', '9999999', 'usuario@teste.com', NULL, '$2y$10$JmS/RBigNpckSIIkv.9YruDdHefr6zdb4iTcicE206Qd5ENHCYWha', 'user', NULL, '2023-11-01 01:45:12', '2023-11-01 01:45:12'),
(3, 'Dr. Russel Carroll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bell40@example.org', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'Z4x7Q75VmB', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(4, 'Mr. Dennis Towne', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'furman.wunsch@example.com', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'prWcni37M5', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(5, 'Prof. Leon Kovacek DDS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carrie.barton@example.net', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'z4VX8Euzbf', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(6, 'Margarita Koss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gottlieb.ressie@example.com', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'ijuGfq8wEt', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(7, 'Sylvester Rodriguez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pgorczany@example.net', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '6hIuIcq4Xv', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(8, 'Arlene Wiza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cierra44@example.org', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'zrgZoQpi8w', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(9, 'Colin Turner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lamar.marks@example.org', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'CJ4wssrr1W', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(10, 'Jon Skiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tward@example.net', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '8kiodvhYHE', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(11, 'Mr. Salvatore Cassin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'acollier@example.net', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'FdL0eabNUE', '2023-11-02 02:15:16', '2023-11-02 02:15:16'),
(12, 'Mrs. Georgiana Bayer PhD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ybeier@example.com', '2023-11-02 02:15:16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 'Zmi6PFdSkf', '2023-11-02 02:15:16', '2023-11-02 02:15:16');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autors`
--
ALTER TABLE `autors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD KEY `autor_livro_livro_id_foreign` (`livro_id`),
  ADD KEY `autor_livro_autor_id_foreign` (`autor_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria_livro`
--
ALTER TABLE `categoria_livro`
  ADD KEY `categoria_livro_livro_id_foreign` (`livro_id`),
  ADD KEY `categoria_livro_categoria_id_foreign` (`categoria_id`);

--
-- Índices para tabela `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprestimos_user_id_foreign` (`user_id`);

--
-- Índices para tabela `emprestimo_livro`
--
ALTER TABLE `emprestimo_livro`
  ADD KEY `emprestimo_livro_emprestimo_id_foreign` (`emprestimo_id`),
  ADD KEY `emprestimo_livro_livro_id_foreign` (`livro_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livros_editora_id_foreign` (`editora_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autors`
--
ALTER TABLE `autors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autor_livro`
--
ALTER TABLE `autor_livro`
  ADD CONSTRAINT `autor_livro_autor_id_foreign` FOREIGN KEY (`autor_id`) REFERENCES `autors` (`id`),
  ADD CONSTRAINT `autor_livro_livro_id_foreign` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`);

--
-- Limitadores para a tabela `categoria_livro`
--
ALTER TABLE `categoria_livro`
  ADD CONSTRAINT `categoria_livro_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `categoria_livro_livro_id_foreign` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`);

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `emprestimo_livro`
--
ALTER TABLE `emprestimo_livro`
  ADD CONSTRAINT `emprestimo_livro_emprestimo_id_foreign` FOREIGN KEY (`emprestimo_id`) REFERENCES `emprestimos` (`id`),
  ADD CONSTRAINT `emprestimo_livro_livro_id_foreign` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_editora_id_foreign` FOREIGN KEY (`editora_id`) REFERENCES `editoras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
