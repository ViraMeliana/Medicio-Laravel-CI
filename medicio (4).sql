-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2020 pada 13.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `ID_CATEGORY` int(11) NOT NULL,
  `CAT_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`ID_CATEGORY`, `CAT_NAME`) VALUES
(4, 'obat batuk anak'),
(5, 'obat flu'),
(6, 'obat mata'),
(7, 'obat demam anak'),
(8, 'vitamin'),
(10, 'obat sakit punggung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaction`
--

CREATE TABLE `header_transaction` (
  `ID_HEADER_TRASACTION` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `KODE_TRANSAKSI` varchar(50) NOT NULL,
  `FULL_NAME` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(25) DEFAULT NULL,
  `TOTAL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `header_transaction`
--

INSERT INTO `header_transaction` (`ID_HEADER_TRASACTION`, `ID`, `KODE_TRANSAKSI`, `FULL_NAME`, `EMAIL`, `ADDRESS`, `PHONE_NUMBER`, `TOTAL`) VALUES
(1, 10, '19052020YVAVBHQ1', 'Moi', 'moilucu@gmail.com', 'Malang', '0341', '20000'),
(2, 10, '19052020JCA7LGSN', 'Moi', 'moilucu@gmail.com', 'Malang', '0341', '100000'),
(3, 10, '21052020KDXV7BJI', 'cinta', 'cin12345@gmail.com', 'jalan', '0888989', '50000'),
(6, 10, '21052020RGNSZGPY', 'cinta', 'cin12345@gmail.com', 'jalan', '0888989', '71500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicine`
--

CREATE TABLE `medicine` (
  `ID_MEDICINE` int(11) NOT NULL,
  `ID_CATEGORY` int(11) DEFAULT NULL,
  `MED_NAME` varchar(50) DEFAULT NULL,
  `IMAGE` varchar(50) DEFAULT NULL,
  `PRICE` varchar(50) DEFAULT NULL,
  `DESC_MED` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medicine`
--

INSERT INTO `medicine` (`ID_MEDICINE`, `ID_CATEGORY`, `MED_NAME`, `IMAGE`, `PRICE`, `DESC_MED`) VALUES
(6, 6, 'Tetes Mata Rohto', '1.-Tetes-Mata-Rohto.jpg', '14000', 'Rohto merupakan brand yang berasal dari Jepang dan'),
(7, 6, 'Allegran Refresh', '2.-Refresh-Contact.jpg', '45000', 'Brand yang telah dipercaya oleh lebih dari 100 neg'),
(8, 6, 'Tetes Mata Insto', '3.-Tetes-Mata-Insto-420x420.jpg', '12000', 'Insto merupakan produk tetes mata terkemuka di Ind'),
(9, 6, 'Blink Contacts', '4.-Blink-Contacts-420x420.jpg', '55000', 'Blink merupakan brand yang berada di bawah perusah'),
(10, 6, 'Tetes Mata Sante', '5.-Tetes-Mata-Sante.jpg', '100000', 'Sante diformulasikan khusus untuk mata stres akiba'),
(11, 6, 'Tetes Mata Visine', '6.-Tetes-Mata-Visine-420x420.jpg', '13000', 'Tetes mata ini juga mampu mengetasi mata merah aki'),
(12, 6, 'Alcon Tears Naturale', '7.-Alcon-Tears-Naturale-420x420.jpg', '48000', 'Tetes mata ini mengandung Dextran 0,1% dan hydroxy'),
(13, 6, 'Lion Smile', '8.-Lion-Smile-420x420.jpg', '120000', 'Obat tetes mata asal Jepang ini merupakan salah sa'),
(14, 6, 'Tetes Mata Freshkon', '9.-Tetes-Mata-Freshkon-420x420.jpg', '17900', 'Tetes mata ini juga dapat langsung diteteskan pada'),
(15, 6, 'Cendo Cenfresh', '10.-Cendo-Cenfresh-420x420.jpg', '27000', 'Tetes mata dari Cendo Cenfresh ini tersedia dalam '),
(16, 8, 'Blackmores Vitamin C', 'blackmores.jpg', '300000', 'Blackmores mengandung ekstrak bioflavonoid untuk m'),
(17, 8, 'Puritans Pride Vitamin C', '2.-Puritans-Pride-Vitamin-C.jpg', '170000', 'Salah satu Vitamin C yang bagus untuk kulit adalah'),
(18, 8, 'Holisticare Ester C', '3.-Holisticare-Ester-C-420x420.jpg', '40000', 'Merupakan vitamin C yang tidak perih di lambung, E'),
(19, 8, 'Vitalong C', '4.-Vitalong-C-420x420.jpg', '35000', 'Vitalong C merupakan suplemen untuk mencegah terja'),
(20, 8, 'Enervon C', '5.-Enervon-C-420x420.jpg', '29500', 'memelihara daya tahan tubuh, vitamin yang satu ini'),
(21, 8, 'Natures Way', '6.-Natures-Way-420x420.jpg', '280000', 'Serupa dengan Puritans Pride Vitamin C, Natures Wa'),
(22, 8, 'Airborne Suppleme', '7.-Airborne-Supplement-420x420.jpgnt', '100000', 'Tersedia dalam bentuk tablet effervescent yang dil'),
(23, 8, 'Healthy Care Vitamin C', '8.-Healthy-Care-Vitamin-C-420x420.jpg', '230000', 'Merk Vitamin C paling laris berikutnya adalah Heal'),
(24, 8, 'You C1000', '9.-You-C1000-420x420.jpg', '7000', 'kalian akan mendapatkan manfaat Vitamin C dengan r'),
(25, 8, 'Alkaline-C', '10.-Alkaline-C-420x420.jpg', '70000', 'Vitamin C ini juga berfungsi untuk mengubah?mood, '),
(26, 5, 'Cap Ibu dan Anak (King To Nin Jiom Pei Pa Koa)', 'ibuanakflu.jpg', '22000', 'Obat ramuan Cina ini telah dikenal secara turun-te'),
(27, 5, 'Tolak Angin Flu', 'tolakangin.jpg', '3000', 'Produk dari Sido Muncul ini adalah jamu dPada saat'),
(28, 5, 'Mixagrip Flu', 'mixagrib.jpg', '19000', 'Pada saat mengalami flu, tubuh Anda membutuhkan is'),
(29, 5, 'Combi Batuk dan Flu ? Mentol', 'combi.jpg', '17000', 'Combiphar memproduksi obat batuk dan flu yang di d'),
(30, 5, 'Panadol Flu & Batuk', 'panadol.png', '?11000', 'nadol Flu dan Batuk dapat membantu meredakan berba'),
(31, 5, 'Puyer Bintang Toedjoe No. 16', 'puyer.jpg', '6000', 'Kandungan di dalamnya akan meredakan sakit kepala '),
(32, 5, 'Bodrex Flu & Batuk Berdahak PE', 'bodrex.png', '2000', 'Dahak yang lebih encer tentu akan lebih mudah dike'),
(33, 5, 'Woods Peppermint Antitussive', 'woods.png', '27500', 'Produk ini mengurangi batuk dengan cara bekerja di'),
(34, 5, 'Siladex Mucolytic & Expectorant', 'siladex.png', '115000', 'Obat batuk sirop produksi Konimex ini tidak memili'),
(35, 5, 'Rhinos SR', 'rhinos.jpg', '70000', 'Rhinos SR dirancang sebagai obat pilek yang bersif'),
(36, 7, 'Bufect Ibuprofen Suspensi', 'ibupro.jpg', '17000', 'Kandungan terbesar dari obat demam yang satu ini a'),
(37, 7, 'Pamol', 'pamol.jpg', '20000', 'Pamol,Memiliki kandungan paracetamol didalamnya. S'),
(38, 7, 'Panadol Anak', 'panadol.jpg', '50000', 'Panadol juga dapat digunakan untuk redakan sakit p'),
(39, 7, 'Paracetine Syrup', 'paracetine.jpg', '10000', 'Obat ini dapat dikonsumsi 3-4 kali. Namun untuk pe'),
(40, 7, 'Sanmol', 'sanmol.jpg', '20000', 'Salah satu kandungan yang ada pada obat Sanmol ada'),
(41, 7, 'Tempra Syrup', 'tempra.jpg', '42950', 'Empra syrup diketahui dapat membantu meredakan dem'),
(42, 7, 'Termorex Sirup', 'termorex.jpg', '12000', 'Obat ini dapat digunakan oleh anak berusia 0-12 ta'),
(45, 4, 'OBH', 'obh.jpg', '60000', 'dengan rasa menthol dan jahe yang melegakan tenggo'),
(46, 4, 'Takabb', 'takkab.jpg', '60000', 'Obat batuk Takabb merupakan obat batuk berbentul p'),
(47, 4, 'Konidin', 'konidin.jpg', '11500', 'Obat batuk yang satu ini dapat mengobati batuk ber'),
(48, 4, 'Komix', 'komix.jpg', '10000', 'Komix berfungsi untuk meredakan batuk dengan menek'),
(49, 4, 'Vicks', 'vicks.jpg', '18000', 'Obat ini juga mampu memberikan rasa hangat hingga '),
(50, 4, 'Laserin', 'laserin.jpg', '15000', 'Laserin tergolong ke dalam obat batuk herbal karen'),
(51, 4, 'Hufagrip', 'hufagrip.jpg', '27000', 'Obat batuk anak terbaik yang dapat kalian coba ada'),
(52, 4, 'Cap Ibu dan Anak', 'ibuanak.jpg', '50000', 'Serupa dengan Laserin, obat batuk cap Ibu dan Anak'),
(53, 4, 'Hufagrip', 'hufagrip.jpg', '27000', 'Obat batuk anak terbaik yang dapat kalian coba ada'),
(60, 4, 'Woods', 'Woods.jpg', '10000', 'obat panas'),
(61, 8, 'Vitacimin', '3_-Holisticare-Ester-C-420x420.jpg', '2000', 'Vitamin penambah vitamin c'),
(62, 4, 'Woods solusi batuk', 'Woods.jpg', '10000', 'obat panas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `ID_TRANSACTION` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `TOTAL` varchar(20) NOT NULL,
  `KODE_TRANSAKSI` varchar(50) NOT NULL,
  `ID_MEDICINE` int(11) NOT NULL,
  `MED_NAME` varchar(50) NOT NULL,
  `PRICE` varchar(50) NOT NULL,
  `QTY` varchar(10) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`ID_TRANSACTION`, `ID`, `TOTAL`, `KODE_TRANSAKSI`, `ID_MEDICINE`, `MED_NAME`, `PRICE`, `QTY`, `DATE`) VALUES
(1, 10, '20000', '19052020YVAVBHQ1', 44, 'Siladex', '20000', '1', '2020-05-19 02:29:08'),
(2, 10, '100000', '19052020JCA7LGSN', 45, 'OBH', '50000', '1', '2020-05-19 03:48:59'),
(3, 10, '100000', '19052020JCA7LGSN', 52, 'Cap Ibu dan Anak', '50000', '1', '2020-05-19 03:48:59'),
(4, 10, '50000', '21052020KDXV7BJI', 45, 'OBH', '50000', '1', '2020-05-21 11:00:07'),
(8, 10, '71500', '21052020RGNSZGPY', 46, 'Takabb', '60000', '1', '2020-05-21 11:32:32'),
(9, 10, '71500', '21052020RGNSZGPY', 47, 'Konidin', '11500', '1', '2020-05-21 11:32:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ADDRESS` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FULL_NAME` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PHONE_NUMBER` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `ADDRESS`, `FULL_NAME`, `PHONE_NUMBER`) VALUES
(1, 'Vira Meliana', 'vira@gmail.com', NULL, '$2y$10$EXg2jqTf92tZj3smzi084OMZBOI.4aFsZGlx2RtzKLtp/O8lyxQDK', 1, NULL, '2020-05-12 02:40:54', '2020-05-12 02:40:54', NULL, NULL, NULL),
(2, 'Vira Meliana', 'pras@gmail.com', NULL, '$2y$10$5LB2XuC1w8R6wMDLMj4/EOGpeKDx4Uo917R4NTfyFF86qO56wyLIq', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Veronicha', 'fufu@gmail.com', NULL, '$2y$10$VYjLSIbF.hi67nSZ3yr1QewC7gOgKT17fmhrkUJ1dJtequTZYvEsW', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Vira Meliana', 'tes@gmail.com', NULL, '$2y$10$XoqPWH6FiGTQJ2ON1J2aDuMs1W/VNmPV0H8yDl2U8dYaO7mvp/Z36', 1, NULL, NULL, NULL, 'tes', 'testing', '088'),
(6, 'prasnyavirawkwkwkwk', 'pras12345678@gmail.com', NULL, '12345678', 0, NULL, '2020-05-20 01:19:16', '2020-05-20 01:19:16', 'suhat', 'Prassss', '08778787'),
(10, 'cinta', 'cin12345@gmail.com', NULL, '12345678', 0, NULL, '2020-05-20 20:50:37', '2020-05-20 20:50:37', 'jalan', 'cinta', '0888989'),
(12, 'Halo Vira', 'halo@gmail.com', NULL, '$2y$10$0nl2p9ZTJQT4Gl0xOMPnJ..YndBtemHojxSDVYWCy1O2WDOMBZc4W', 1, NULL, '2020-05-28 01:20:03', '2020-05-28 01:20:03', NULL, NULL, NULL),
(14, 'Indah', 'indah@gmail.com', NULL, '$2y$10$pfHXx6G8o3oOBtjOc8wH5eoUivkslO4lYOl4gD7NevVldNnKp5IIO', 1, NULL, '2020-05-28 03:28:34', '2020-05-28 03:28:34', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_CATEGORY`),
  ADD UNIQUE KEY `CATEGORY_PK` (`ID_CATEGORY`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `header_transaction`
--
ALTER TABLE `header_transaction`
  ADD PRIMARY KEY (`ID_HEADER_TRASACTION`);

--
-- Indeks untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`ID_MEDICINE`),
  ADD UNIQUE KEY `MEDICINE_PK` (`ID_MEDICINE`),
  ADD KEY `RELATIONSHIP_2_FK` (`ID_CATEGORY`);

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
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID_TRANSACTION`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `header_transaction`
--
ALTER TABLE `header_transaction`
  MODIFY `ID_HEADER_TRASACTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `medicine`
--
ALTER TABLE `medicine`
  MODIFY `ID_MEDICINE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID_TRANSACTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `category` (`ID_CATEGORY`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
