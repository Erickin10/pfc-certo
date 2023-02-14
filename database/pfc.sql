-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Fev-2023 às 18:16
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pfc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_ongs`
--

CREATE TABLE `endereco_ongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `endereco_ongs`
--

INSERT INTO `endereco_ongs` (`id`, `created_at`, `updated_at`, `estado`, `cidade`, `bairro`, `rua`, `complemento`, `numero`, `cep`) VALUES
(1, '2023-02-08 19:45:06', '2023-02-08 19:45:06', 'SP', 'São Paulo', 'Jardim Felicidade', 'Rua das Flores', 'n/a', 123, '04567-890'),
(2, '2023-02-08 19:51:15', '2023-02-08 19:51:15', 'RJ', 'Rio de Janeiro', 'Vila Esperança', 'Rua das Crianças', 'n/a', 567, '02345-678'),
(3, '2023-02-08 19:57:31', '2023-02-08 19:57:31', 'DF', 'Brasília', 'Parque Verde', 'Rua da Natureza', 'n/a', 890, '01112-345'),
(4, '2023-02-08 19:59:52', '2023-02-08 19:59:52', 'MG', 'Belo Horizonte', 'Bairro do Coração', 'Rua do Amor', 'n/a', 234, '09876-543'),
(5, '2023-02-08 20:02:02', '2023-02-08 20:02:02', 'RS', 'Porto Alegre', 'Bairro da Esperança', 'Rua do Resgate', 'n/a', 789, '06789-012');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_users`
--

CREATE TABLE `endereco_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `endereco_users`
--

INSERT INTO `endereco_users` (`id`, `created_at`, `updated_at`, `cep`, `rua`, `bairro`, `cidade`, `complemento`, `numero`) VALUES
(1, '2023-02-08 19:27:15', '2023-02-08 19:27:15', '85853-707', 'Urupês', 'São Roque 3', 'Foz do Iguaçu', 'Casa', 2413),
(2, '2023-02-08 19:31:54', '2023-02-08 19:31:54', '12341-010', 'José Lins do Rego', 'Jd Jupira', 'Foz do Iguaçu', 'Casa', 169);

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
-- Estrutura da tabela `found_animals`
--

CREATE TABLE `found_animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_Usuario` bigint(20) UNSIGNED NOT NULL,
  `type_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_Animal` int(11) NOT NULL,
  `local_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_Found_Animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_Animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `found_animals`
--

INSERT INTO `found_animals` (`id`, `created_at`, `updated_at`, `id_Usuario`, `type_Animal`, `name_Animal`, `breed_Animal`, `color_Animal`, `gender_Animal`, `size_Animal`, `age_Animal`, `local_animal`, `local_Found_Animal`, `img_Animal`, `post_Description`) VALUES
(1, '2023-02-08 19:28:14', '2023-02-08 19:28:14', 1, 'Cachorro', 'Toby', 'golden', 'amarelo', 'Macho', 'Médio', 2, 'Em minha casa', 'Proximo ao consalter', 'img/posts-achados/1ac5444809cb2c6267d09ee2df39d8db.jpg', 'Se reconheceu o cao entre em contato por whats: (45)99902-0835'),
(2, '2023-02-08 19:33:57', '2023-02-08 19:33:57', 2, 'Cachorro', 'raul', 'pug', 'marrom', 'Macho', 'Pequeno', 5, 'Na minha casa', 'Criciuma', 'img/posts-achados/d265055794d0e2f4c5c924f1f93a332c.jpg', 'Caso seja seu me mande uma mensagem (21)99932-5342'),
(3, '2023-02-08 19:36:27', '2023-02-08 19:36:27', 2, 'Gato', 'Perola', 'vira lata', 'marrom/laranja', 'Fêmea', 'Pequeno', 1, NULL, 'próximo a praça da bíblia', 'img/posts-achados/a54fb147ed93c0cb693d7f2bbacc68c5.jpg', 'Se ela for sua me mande uma mensagem:'),
(4, '2023-02-08 19:42:01', '2023-02-08 19:42:01', 2, 'Gato', 'ze', 'vira lata', 'cinza', 'Macho', 'Pequeno', 1, 'no ginasio', 'Proximo ao consalter', 'img/posts-achados/fcb473a3053cb5a0e1ee742fd90251bb.jpg', 'O do meio da foto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lost_animals`
--

CREATE TABLE `lost_animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_Usuario` bigint(20) UNSIGNED NOT NULL,
  `type_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_Animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_Animal` int(11) NOT NULL,
  `local_Lost_Animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_Animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bounty_Animal` double(8,2) DEFAULT NULL,
  `post_Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `lost_animals`
--

INSERT INTO `lost_animals` (`id`, `created_at`, `updated_at`, `id_Usuario`, `type_Animal`, `name_Animal`, `breed_Animal`, `color_Animal`, `gender_Animal`, `size_Animal`, `age_Animal`, `local_Lost_Animal`, `img_Animal`, `bounty_Animal`, `post_Description`) VALUES
(1, '2023-02-08 19:30:03', '2023-02-08 19:30:03', 1, 'Gato', 'Cisco', 'vira lata', 'preto', 'Macho', 'Pequeno', 3, NULL, 'img/posts-perdidos/330643a003330e2e05b5b7475d357e7a.jpg', 1.00, 'Ele é arisco e esta usando coleira'),
(2, '2023-02-08 19:38:12', '2023-02-08 19:38:12', 2, 'Cachorro', 'Max', 'caramelo', 'marrom e branco', 'Macho', 'Médio', 2, NULL, 'img/posts-perdidos/2c6a66f9c311b741a3144def52010958.jpg', 340.00, 'ele sabe latir auau'),
(3, '2023-02-08 19:40:35', '2023-02-08 19:40:35', 2, 'Cachorro', 'Bruto', 'vira lata', 'preto', 'Macho', 'Médio', 2, NULL, 'img/posts-perdidos/83a37b4a70e445cad18286e29cd6b273.png', 10.00, 'Ele toma ..... pra cachorra ...'),
(4, '2023-02-08 19:43:35', '2023-02-08 19:43:35', 2, 'Cachorro', 'jao', 'canalha', 'marrom', 'Macho', 'Pequeno', 1, NULL, 'img/posts-perdidos/69c11bd9b6ddd73ce931c4a6e4c49f4f.jpg', 3.00, NULL);

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
(1, '2014_02_04_062956_create_endereco_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_10_12_000000_create_users_table', 1),
(6, '2023_02_02_022745_create_found_animals_table', 1),
(7, '2023_02_02_051538_create_lost_animals_table', 1),
(8, '2023_02_04_085443_create_endereco_ongs_table', 1),
(9, '2023_02_04_085444_create_ongs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ongs`
--

CREATE TABLE `ongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_Endereco` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ongs`
--

INSERT INTO `ongs` (`id`, `created_at`, `updated_at`, `id_Endereco`, `name`, `phone`, `email`, `description`, `cnpj`) VALUES
(1, '2023-02-08 19:45:06', '2023-02-08 19:45:06', 1, 'Adoção de Cães e Gatos', '(11) 9876-5432', 'ongcaesegatos@gmail.com', 'Nossa ONG tem como objetivo encontrar lares amorosos para cães e gatos abandonados e promover a conscientização sobre a importância da adoção responsável.', '33.666.999/0001-00'),
(2, '2023-02-08 19:51:15', '2023-02-08 19:51:15', 2, 'Proteção aos Cães e Gatos', '(21) 6543-2109', 'ongprotecaocaesegatos@gmail.com', 'Nossa ONG tem como objetivo garantir a proteção e o bem-estar de cães e gatos em situação de risco na cidade', '44.777.888/0002-11'),
(3, '2023-02-08 19:57:31', '2023-02-08 19:57:31', 3, 'Cuidado com Cães e Gatos', '(61)1234-5678', 'ongcuidadocaesegatos@gmail.com', 'Nossa ONG tem como objetivo oferecer cuidados veterinários e alimentação adequada para cães e gatos abandonados e necessitados na cidade.', '55.999.777/0003-22'),
(4, '2023-02-08 19:59:52', '2023-02-08 19:59:52', 4, 'Amor pelos Cães e Gatos', '(31)1112-2233', 'ongamorcaesegatos@gmail.com', 'Nossa ONG tem como objetivo transmitir amor e carinho para cães e gatos que precisam de uma segunda chance na vida, através da promoção de adoções e cuidados básicos', '66.111.333/0004-33'),
(5, '2023-02-08 20:02:02', '2023-02-08 20:02:02', 5, 'Resgate de Cães e Gatos', '(51)3456-7890', 'ongresgatecaesegatos@gmail.com', 'Nossa ONG tem como objetivo realizar resgates de cães e gatos em situação de risco na cidade, garantindo a recuperação e encaminhamento para adoção responsável', '77.222.444/0005-44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_Endereco` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `id_Endereco`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`) VALUES
(1, '2023-02-08 19:27:15', '2023-02-08 19:27:15', 1, 'Erick Fillipe Souza Barreto', '(45)99902-0835', 'erickfillipe3@gmail.com', NULL, '$2y$10$0Zi21DQOqSVzY2LIIG1oJu8oVioLkB/NMuMErh89aU4.HQ3nELijK', 'XrULtluxn06edjxv0nPDdEK3OSclwMyh5QJdfsaKBCIc9GdkUtGyT3w6fejZ'),
(2, '2023-02-08 19:31:54', '2023-02-08 19:31:54', 2, 'Xavier Bogado', '(11)99876-5432', 'xbogado89@gmail.com', NULL, '$2y$10$ISYDLZVplq2RLhU/dz1ie.nZOdb7VfYRXcz9zYrtbZXOCvMPtXk/i', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `endereco_ongs`
--
ALTER TABLE `endereco_ongs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco_users`
--
ALTER TABLE `endereco_users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `found_animals`
--
ALTER TABLE `found_animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `found_animals_id_usuario_foreign` (`id_Usuario`);

--
-- Índices para tabela `lost_animals`
--
ALTER TABLE `lost_animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lost_animals_id_usuario_foreign` (`id_Usuario`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ongs`
--
ALTER TABLE `ongs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ongs_email_unique` (`email`),
  ADD KEY `ongs_id_endereco_foreign` (`id_Endereco`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_endereco_foreign` (`id_Endereco`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `endereco_ongs`
--
ALTER TABLE `endereco_ongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `endereco_users`
--
ALTER TABLE `endereco_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `found_animals`
--
ALTER TABLE `found_animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `lost_animals`
--
ALTER TABLE `lost_animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `ongs`
--
ALTER TABLE `ongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `found_animals`
--
ALTER TABLE `found_animals`
  ADD CONSTRAINT `found_animals_id_usuario_foreign` FOREIGN KEY (`id_Usuario`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `lost_animals`
--
ALTER TABLE `lost_animals`
  ADD CONSTRAINT `lost_animals_id_usuario_foreign` FOREIGN KEY (`id_Usuario`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `ongs`
--
ALTER TABLE `ongs`
  ADD CONSTRAINT `ongs_id_endereco_foreign` FOREIGN KEY (`id_Endereco`) REFERENCES `endereco_ongs` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_endereco_foreign` FOREIGN KEY (`id_Endereco`) REFERENCES `endereco_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
