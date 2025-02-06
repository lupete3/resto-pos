-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 23 juin 2024 à 01:44
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel_pos_resto`
--
CREATE DATABASE IF NOT EXISTS `laravel_pos_resto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `laravel_pos_resto`;

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1717974474),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1717974474;', 1717974474);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `adress`, `created_at`, `updated_at`) VALUES
(1, 'Amelie KleinJ', '+14152529804', 'Provident qui et quia laudantium quasi.', '2024-06-05 20:20:46', '2024-06-06 07:16:51'),
(2, 'Graham Zulauf', '(458) 487-6197', 'Eum sapiente id beatae necessitatibus.', '2024-06-05 20:20:46', '2024-06-05 20:20:46'),
(3, 'Judah Kunze', '+15204337157', 'Ducimus fugiat recusandae dignissimos vel itaque asperiores. Ducimus fugiat recusandae dignissimos vel itaque asperiores.', '2024-06-05 20:20:46', '2024-06-09 09:59:43'),
(4, 'Kyler Kling', '+1-925-852-7336', 'Autem voluptas explicabo illum quae.', '2024-06-05 20:20:46', '2024-06-05 20:20:46'),
(5, 'Titus Marks', '(949) 537-6583', 'Illo accusamus iusto accusamus eligendi alias nam.', '2024-06-05 20:20:46', '2024-06-05 20:20:46'),
(6, 'Jean Deo', '0987654324', 'AV Poste1', '2024-06-05 21:04:06', '2024-06-05 21:04:22'),
(8, 'Sam', '+243978543908', 'Av Poste1', '2024-06-17 16:04:24', '2024-06-17 16:04:24'),
(9, 'Delpiro', '+243897541098', 'Nyawera', '2024-06-17 16:10:53', '2024-06-17 17:17:07'),
(10, 'Mupila', '+2439898712340', 'Nguba', '2024-06-17 16:12:00', '2024-06-17 16:37:59'),
(11, 'Solo', '0987432140', 'Pageco', '2024-06-17 16:17:24', '2024-06-17 16:17:24'),
(12, 'Marie Florentine', '0983248974', 'Kamituga', '2024-06-17 16:23:11', '2024-06-17 16:23:11'),
(13, 'Adeline', '0987238190', 'Uvira', '2024-06-17 16:26:04', '2024-06-17 16:26:44'),
(14, 'Blandine', '0893213489', 'Av Presse', '2024-06-17 16:28:13', '2024-06-17 16:28:13'),
(15, 'Lupete Placide', '0978333654', 'Bukavu/Ibanda/Ndendere/av Poste 1', '2024-06-22 09:38:15', '2024-06-22 09:39:16');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(30,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `name`, `price`, `description`, `type`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Bishop', 28000.44, 'Un liqueur de qualité en provenance de l\'inde. Avec une validité de plus de 10 anss Un liqueur de qualité provenance de l\'inde. Avec une validité de plus de 10 anss\n', 'liqueur', 'menu/zDjPmyu23Ft9ggf7Im2XdNM8vXWdxP5iOApYBBbU.jpg', '2024-06-02 16:41:53', '2024-06-08 10:44:51'),
(2, 'Absolute Citron', 28000.00, 'Blanditiis qui dicta rerum aut doloremque.', 'liqueur', 'menu/tAXltRwvKLkuq8TusdBNgHzyGf9u11CwxWwSjWWy.jpg', '2024-06-02 16:41:53', '2024-06-08 10:45:15'),
(3, 'Primus', 1000.00, 'Quisquam perspiciatis libero odit odit ipsum occaecati de poto', 'bierre', 'menu/LWj8COQf2e0aFygAxYbMGxFk7N1AzzLVE0x2KOt1.jpg', '2024-06-02 16:41:53', '2024-06-08 10:45:51'),
(5, 'Beaufort', 3000.70, 'Voluptatem iusto tenetur sed temporibus sit quibusdam deleniti.', 'bierre', 'menu/A7d0P5WuEdfl565B4XH9YdjkjvswEvY0IsBtoOwN.png', '2024-06-02 16:41:53', '2024-06-08 10:52:57'),
(6, 'Sambusa', 1500.00, 'Pariatur laborum culpa repellendus nam.', 'nourriture', 'menu/xJCUES3YaJM1HAz5ftMm9RbCJYJvbv735qw7dOf2.png', '2024-06-02 16:41:53', '2024-06-08 10:52:11'),
(7, 'Habourger', 8000.54, 'Ducimus quo corrupti magnam omnis quae reprehenderit animi.', 'nourriture', 'menu/b0Zl3hbFENtSQUchtBebiWZVPCDkbbGw3TlAwJfX.png', '2024-06-02 16:41:53', '2024-06-08 10:51:53'),
(8, 'Galette', 1000.00, 'Et repudiandae in ipsam velit laborum dolor nulla ipsa.', 'nourriture', 'menu/WXgTXqLuUWgTkhGfi3bzu3PwODV1YShdQ7m3ukf2.png', '2024-06-02 16:41:53', '2024-06-08 10:54:41'),
(11, 'Spaghetti', 5000.00, 'Sur base de pommes de terre ', 'nourriture', 'menu/xzUGwc6zMqBZHIZXDBUojD9oHx5Pt5GwKu9BIcsm.png', '2024-06-05 06:32:04', '2024-06-09 21:17:51'),
(17, 'Pizza', 9000.00, 'Brochette de la viande de beur', 'nourriture', 'menu/uvRTqMkC3UX4CqVWdPjXbrEaSSrseBsEpRnP3KL8.png', '2024-06-05 06:46:29', '2024-06-08 10:49:58'),
(18, 'Poulet', 2000.00, 'Un sambousa de la viande de qualité', 'nourriture', 'menu/l4SduxHlgsw0ZZnVNOau788GKe8y8drA3TvbmGgy.png', '2024-06-05 06:49:23', '2024-06-08 10:50:45'),
(19, 'Mutzig Class', 3500.00, 'Bierre de qualité de la Bralima ', 'bierre', 'menu/1WvOoIkA4yKz5HFc03YSyqB3G42AgQnsNSyrh5OR.webp', '2024-06-05 06:57:11', '2024-06-08 10:49:04'),
(20, 'Fanta', 1500.00, 'Combinaison des oranges. Un produit de la Bralima ', 'sucre', 'menu/ZY0vzUxhY9eebEmZ1L3WfIbBSaXkadlyfr7Rp0A9.jpg', '2024-06-05 06:59:05', '2024-06-08 10:48:27'),
(21, 'Legend', 2000.00, 'Produit de la Bralima Bukavu', 'bierre', 'menu/d49zp8nv5k5Nu8YQMTe0Erl393SUg5XCZCtUoyE6.jpg', '2024-06-05 07:09:22', '2024-06-08 10:48:05'),
(22, 'Conniac', 50000.00, 'Liqueur', 'liqueur', 'menu/vdnNgg3g8ubuo8jIcIWHtYYJmej6W0myjLa9uQxZ.webp', '2024-06-08 10:55:58', '2024-06-08 10:56:10'),
(23, 'Vin de mess', 20000.00, 'Vin de messe', 'liqueur', 'menu/TzSt7xIBLfeUuoDVZHaBA1FNBWFftIwoGjHVSaF2.jpg', '2024-06-08 10:56:55', '2024-06-08 10:56:55'),
(24, 'Vital\'O', 2000.00, 'Sucré de Bralima', 'sucre', 'menu/tzrfPXcKY1JNMJggI4o71hYtflGY3TzxK1XGTeW9.jpg', '2024-06-08 10:57:49', '2024-06-08 10:57:49'),
(25, 'Turbo King', 3500.00, 'Turbo King', 'bierre', 'menu/8OaJ6evovdlFOqVwSfyjqXNZpv5KFzfStmVOejz4.jpg', '2024-06-08 10:58:59', '2024-06-08 10:58:59'),
(26, 'Simba', 4500.00, 'Simba', 'bierre', 'menu/OvlRVoqiB0PgVBJeGq1uoBDJ0H20DijkPtnqXee0.jpg', '2024-06-08 10:59:28', '2024-06-08 10:59:28'),
(27, 'Mutzig 56', 3000.00, 'Mutzig', 'bierre', 'menu/1MpsbZT7Scxdgk1AJaDhbBB8odqpyEkPy3tJuoVh.jpg', '2024-06-08 11:00:05', '2024-06-08 11:00:05'),
(28, 'Riz au Haricot', 5000.00, NULL, 'nourriture', NULL, '2024-06-22 09:41:15', '2024-06-22 09:41:15');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_02_164233_create_menus_table', 2),
(5, '2024_06_05_221218_create_customers_table', 3),
(6, '2024_06_06_024856_create_transactions_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('csY8pTnIrTpn5L7NVbPUrhCFLAeFftYbJpYNdtXv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTFzTThQSzlPYTZGRmNucWdJNGhkU2dtQ3I3ZmY0VlNyd085ZWFyayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbC1yZXN0by1wb3MvcHVibGljL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1719055527),
('qIUwGMfouinBRkfKQDDtUknt0bxxJvGmpcvw8Z8O', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTNSeUZzNVYwd2s0NEVaVDVyRlN1ak1ickl4ck5tN3BpY0cwOHNVaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719057594),
('vlL2NhYFsWIaYOlDBkEYJ6W0X8fVJNEnSpaSVvgG', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDZsS3QzOFRPT1h4WEZzMmxQNGY2aDJrb3U4NkUwekhSdk53MjRmNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvbGFyYXZlbC1yZXN0by1wb3MvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1719107029);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `items` json NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(30,2) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `items`, `description`, `price`, `done`, `created_at`, `updated_at`) VALUES
(7, 1, '{\"Primus\": {\"qte\": 1, \"price\": \"1000.00\"}, \"Sambusa\": {\"qte\": 1, \"price\": \"1500.00\"}, \"Spaghetti\": {\"qte\": 1, \"price\": \"5000.00\"}, \"Vin de mess\": {\"qte\": 1, \"price\": \"20000.00\"}}', 'Jomso', 27500.00, 1, '2024-05-16 11:27:54', '2024-06-09 08:10:39'),
(8, 6, '{\"Pizza\": {\"qte\": 1, \"price\": \"9000.00\"}, \"Beaufort\": {\"qte\": 1, \"price\": \"3000.70\"}, \"Turbo King\": {\"qte\": 1, \"price\": \"3500.00\"}, \"Absolute Citron\": {\"qte\": 1, \"price\": \"28000.00\"}}', 'Polo', 43500.70, 1, '2024-06-08 11:28:14', '2024-06-09 08:10:40'),
(9, 5, '{\"Vin de mess\": {\"qte\": 1, \"price\": \"20000.00\"}}', 'Vente jour', 20000.00, 1, '2024-06-09 08:16:06', '2024-06-09 09:17:44'),
(10, 2, '{\"Spaghetti\": {\"qte\": 1, \"price\": \"5000.00\"}, \"Vin de mess\": {\"qte\": 1, \"price\": \"20000.00\"}}', 'Vente de dimanche', 25000.00, 0, '2024-06-09 08:36:52', '2024-06-09 09:08:18'),
(11, 1, '{\"Galette\": {\"qte\": 1, \"price\": \"1000.00\"}}', 'Ok bien vendue', 1000.00, 0, '2024-06-09 08:44:49', '2024-06-09 09:08:16'),
(12, 1, '{\"Primus\": {\"qte\": 1, \"price\": \"1000.00\"}}', 'Vente primus', 1000.00, 0, '2024-06-09 08:50:38', '2024-06-09 08:50:38'),
(14, 5, '{\"Galette\": {\"qte\": 2, \"price\": 2000}, \"Absolute Citron\": {\"qte\": 1, \"price\": \"28000.00\"}}', 'Polo Ducimus fugiat recusandae dignissimos vel itaque asperiores. Ducimus fugiat recusandae dignissimos vel itaque asperiores.', 30000.00, 0, '2024-06-09 09:52:38', '2024-06-09 11:41:00'),
(15, 4, '{\"Bishop\": {\"qte\": 1, \"price\": \"28000.44\"}, \"Legend\": {\"qte\": 1, \"price\": \"2000.00\"}, \"Primus\": {\"qte\": 2, \"price\": 2000}, \"Vital\'O\": {\"qte\": 1, \"price\": \"2000.00\"}, \"Habourger\": {\"qte\": 1, \"price\": \"8000.54\"}, \"Mutzig Class\": {\"qte\": 4, \"price\": 14000}}', 'Vente du lundi', 56000.98, 0, '2024-06-09 21:20:38', '2024-06-09 21:20:38'),
(16, 2, '{\"Sambusa\": {\"qte\": 1, \"price\": \"1500.00\"}, \"Absolute Citron\": {\"qte\": 1, \"price\": \"28000.00\"}}', 'Pll', 29500.00, 0, '2024-06-14 10:57:29', '2024-06-14 12:25:14'),
(17, 6, '{\"Pizza\": {\"qte\": 1, \"price\": \"9000.00\"}, \"Simba\": {\"qte\": 1, \"price\": \"4500.00\"}, \"Bishop\": {\"qte\": 2, \"price\": 56000.88}, \"Legend\": {\"qte\": 1, \"price\": \"2000.00\"}, \"Primus\": {\"qte\": 2, \"price\": 2000}, \"Conniac\": {\"qte\": 6, \"price\": 300000}, \"Spaghetti\": {\"qte\": 1, \"price\": \"5000.00\"}, \"Vin de mess\": {\"qte\": 2, \"price\": 40000}, \"Mutzig Class\": {\"qte\": 1, \"price\": \"3500.00\"}, \"Absolute Citron\": {\"qte\": 1, \"price\": \"28000.00\"}}', 'Vente des bierres', 450000.88, 0, '2024-06-14 13:10:32', '2024-06-14 13:10:32'),
(18, 2, '{\"Simba\": {\"qte\": 1, \"price\": \"4500.00\"}, \"Bishop\": {\"qte\": 1, \"price\": 28000.44}, \"Sambusa\": {\"qte\": 1, \"price\": \"1500.00\"}, \"Beaufort\": {\"qte\": 1, \"price\": \"3000.70\"}}', 'Impayé', 37001.14, 0, '2024-06-22 09:34:29', '2024-06-22 09:36:32'),
(19, 10, '{\"Simba\": {\"qte\": 1, \"price\": \"4500.00\"}}', 'OKKK', 4500.00, 0, '2024-06-22 09:37:15', '2024-06-22 09:37:15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2024-06-06 11:35:30', '$2y$12$o/W6FzA44KTdNjnbKviEkutJZZJ1Omm0cqo6tncCNAWnAB/hzXKve', 'ZvLP2085QBz6SJeM2z1EHNRaOxTSIlhKd4FEDakgCCqO63rRLTRsp72Pzonj', '2024-06-06 11:35:31', '2024-06-06 11:35:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
