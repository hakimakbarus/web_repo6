-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2019 pada 02.23
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repo6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_cat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_cat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name_cat`, `desc_cat`, `created_at`, `updated_at`) VALUES
(1, 'Buku Sejarah', 'Buku Sejarah adalah ....', '2019-11-27 23:03:13', '2019-11-27 23:03:13'),
(2, 'Buku Pelajaran', 'Buku', '2019-12-08 08:32:05', '2019-12-08 08:32:05'),
(3, 'Buku Cerita', 'Cerita Nabi', '2019-12-08 08:58:47', '2019-12-08 21:11:19'),
(4, 'Buku Komik', 'asdasd', '2019-12-08 09:00:15', '2019-12-08 09:00:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_25_155218_create_uploads_table', 1),
(4, '2019_11_26_023933_create_categories_table', 1),
(5, '2019_11_26_024234_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name_role`, `desc_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin adalah seorang ...', '2019-11-28 06:04:08', '2019-11-28 06:04:08'),
(2, 'User', 'User adalah seorang ...', '2019-11-28 06:04:08', '2019-11-28 06:04:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_cat` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institusi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstrak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `download_count` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uploads`
--

INSERT INTO `uploads` (`id`, `id_user`, `id_cat`, `judul`, `file`, `pengarang`, `institusi`, `abstrak`, `view_count`, `download_count`, `year`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Sejarah Hancurnya Dynasty Ming', '2033921514.pdf', 'Guan Yu', 'PENS', 'Buku ini adalah buku yang menceritakan kisah dari kehebatan Dynasty Ming yang merupakan sebuah kerajaan yang kuat pada masa itu.', 5, 1, 2018, '2019-12-02 10:28:14', '2019-12-09 15:36:28'),
(3, 2, 2, 'Matematika 3', '1390128295.pdf', 'Ir. Wahidin', 'PENS', 'Buku Matematika 3 adalah buku yang berisi kumpulan rumus dan latihan soal yang berguna untuk bahan ajar pada Mahasiswa Politeknik.', 1, 0, 2019, '2019-12-08 08:33:56', '2019-12-08 09:42:15'),
(4, 2, 1, 'Bahasa Indonesia Kelas 3 SD', '2067082991.pdf', 'Hakim', 'PENS', 'Buku Bahasa indonesia untuk kelas 3 SD ini merupakan buku yang berisi materi materi yang bisa digunakan untuk bahan ajar yang cocok untuk Kurikulum 2013', 1, 0, 2019, '2019-12-08 08:58:18', '2019-12-08 09:42:09'),
(5, 4, 3, 'Kisahku', '329839062.pdf', 'Zen Muhammad', 'PENS', 'Buku ini merupakan buku yang saya buat berdasarkan cerita hidup saya, buku ini juga saya buat sebagai bahan motivasi untuk teman teman semua', 4, 0, 2019, '2019-12-08 08:59:22', '2019-12-08 21:20:26'),
(6, 2, 4, 'Boruto Chapter 112', '1441841473.pdf', 'Hakim', 'PENS', 'Komik ini adalah komik sequence dari Boruto karya seorang komikus jepang, Boruto merupakan anak dari Naruto yang merupakan seorang Hokage di desanya Konoha', 5, 1, 2019, '2019-12-08 09:00:51', '2019-12-08 21:18:26'),
(7, 4, 1, 'Catatan Hitam Lima Presiden Indonesia', '380909709.pdf', 'Ishar Rafick', 'PENS', 'Buku ini merupakan buku yang bercerita tentang sejarah dari lima presiden indonesia yang dimana juga membahas kejadian kejadian yang jarang orang ketahui', 6, 2, 2019, '2019-12-08 09:43:40', '2019-12-08 21:10:29'),
(8, 2, 3, 'Semoga Bunda disayang Allah', '329839062.pdf', 'Tere Liye', 'PENS', 'Novel ini diceritakan seorang anak dari seorang pengusaha sukses, anak itu bernama Melati.  Bocah berusia 6 tahun yang mengalami kebutaan dan tuli sejak dia berusia 3 tahun. Selama 3 tahun in', 4, 0, 2019, '2019-12-08 08:59:22', '2019-12-08 21:20:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto`, `bio`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hakim Akbaru Sulthony', 'hakim@admin.com', NULL, '$2y$10$Ukm6ua9aN/D9bVKztxSjnOT8GjXWoj1MlIMvBJBh1Ys/5EF94tfh2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-27 22:56:44', '2019-11-27 22:56:44'),
(2, 2, 'Ahmad Dhaifullah', 'ahmadd@gmail.com', NULL, '$2y$10$p7PX9dVai7v5zA9o6HpOvu0Dhm8iZDMl7o5FVVJNQMz8XsDSwbDqe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-27 23:01:48', '2019-11-27 23:01:48'),
(3, 1, 'Rissa Hanifah Ersanty', 'rissa.he@gmail.com', NULL, '$2y$10$SQse8JUuynnfn36wZNh/XOSmsVuO/dEUNy.ZCYdM3nGZHIQD8zbd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-08 21:08:26', '2019-12-09 15:18:44'),
(4, 2, 'Ilham Maulana', 'ilhamm@gmail.com', NULL, '$2y$10$Dgim.6as3/.9JHAPRb0GqOZ9gvWsYR5M351K.gNwz3GA9zDTNggsy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-09 15:20:45', '2019-12-09 15:20:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
