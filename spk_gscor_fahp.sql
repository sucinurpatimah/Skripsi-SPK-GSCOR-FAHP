-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2025 at 01:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_gscor_fahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas`
--

CREATE TABLE `bobot_prioritas` (
  `id` bigint UNSIGNED NOT NULL,
  `indikator_id` bigint UNSIGNED NOT NULL,
  `bobot_prioritas` decimal(10,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_prioritas`
--

INSERT INTO `bobot_prioritas` (`id`, `indikator_id`, `bobot_prioritas`, `created_at`, `updated_at`) VALUES
(1, 33, '0.05586597', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(2, 34, '0.07262685', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(3, 35, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(4, 36, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(5, 37, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(6, 41, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(7, 38, '0.07262685', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(8, 42, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(9, 43, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(10, 44, '0.06703751', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(11, 46, '0.07262685', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(12, 39, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(13, 40, '0.07821197', '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(14, 45, '0.03352021', '2025-07-25 03:38:42', '2025-07-25 03:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distribusis`
--

CREATE TABLE `distribusis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `produk_dikirim` decimal(15,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distribusis`
--

INSERT INTO `distribusis` (`id`, `nama_agen`, `alamat`, `produk_dikirim`, `created_at`, `updated_at`) VALUES
(2, 'CV. Artha Samudera', 'Jl. Ternate No. 9 RT. 09 / RW. 10, Tegal', '66607.0000', '2025-06-30 03:26:14', '2025-06-30 03:26:14'),
(4, 'CV. Abadi Jaya Mulia', 'Jl. Kapten Samadikun No. 32, Kota Cirebon', '51503.0000', '2025-06-30 03:42:24', '2025-06-30 03:46:22'),
(5, 'PT. Rosaria Maritim Nusantara', 'Jl. Songoyudan No. 6, Surabaya - 60162', '72848.0000', '2025-06-30 03:46:05', '2025-06-30 03:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gscor`
--

CREATE TABLE `gscor` (
  `id` bigint UNSIGNED NOT NULL,
  `variabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `rekomendasi_bawaan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gscor`
--

INSERT INTO `gscor` (`id`, `variabel`, `atribut`, `indikator`, `keterangan`, `rekomendasi_bawaan`, `created_at`, `updated_at`) VALUES
(1, 'Source', 'Sustainability', '% Supplier with EMS/ISO 14001', 'Pemasok memiliki sertifikasi lingkungan seperti ISO 14001.', 'Pilih pemasok yang peduli lingkungan, misalnya sudah punya sertifikat ramah lingkungan.', '2025-06-30 16:10:34', '2025-07-17 04:18:05'),
(2, 'Make', 'Sustainability', '% of Solid Waste Recycling', 'Limbah padat hasil produksi dikelola melalui proses daur ulang.', 'Pisahkan limbah produksi dan kerjasama dengan mitra daur ulang.', '2025-06-30 16:11:30', '2025-07-17 04:18:45'),
(3, 'Make', 'Sustainability', 'Energy Used', 'Perusahaan secara aktif mengoptimalkan penggunaan energi dalam proses produksi untuk mendukung efisiensi dan keberlanjutan.', 'Lakukan audit energi rutin, gunakan peralatan hemat energi, optimalkan pencahayaan alami, dan mulai manfaatkan energi terbarukan seperti panel surya.', '2025-06-30 16:15:33', '2025-07-17 04:23:32'),
(5, 'Return', 'Reliability', '% Error - free return shipped', 'Seberapa sering produk jadi yang sudah dikirim dikembalikan oleh pelanggan.', 'Tingkatkan kontrol kualitas sebelum pengiriman, pastikan pengecekan akhir dilakukan secara teliti, berikan pelatihan tambahan untuk tim produksi dan pengemasan, serta tanggapi keluhan pelanggan dengan cepat untuk menganalisis dan memperbaiki kesalahan yang menyebabkan pengembalian barang.', '2025-06-30 16:16:34', '2025-07-17 04:24:20'),
(6, 'Make', 'Sustainability', 'Work Safety Compliance', 'Proses produksi memenuhi standar keselamatan kerja untuk mengurangi kecelakaan.', 'Beri pelatihan keselamatan dan pastikan semua pekerja mengikuti aturan kerja aman.', '2025-06-30 16:17:16', '2025-07-17 04:20:33'),
(8, 'Make', 'Sustainability', 'Chemical Used', 'Perusahaan mengelola penggunaan bahan kimia dalam proses produksi dengan memperhatikan standar keselamatan dan dampak lingkungan.', 'Kurangi bahan kimia berbahaya dengan menggantinya ke yang ramah lingkungan, terapkan SOP penggunaan, dan latih karyawan agar penggunaan lebih aman dan efisien.', '2025-06-30 16:24:56', '2025-07-17 04:23:49'),
(9, 'Plan', 'Sustainability', 'Energy Consumption Forecasting', 'Seberapa baik perusahaan memprediksi konsumsi energi selama proses perencanaan.', 'Gunakan data historis dan sensor otomatis untuk memprediksi kebutuhan energi secara lebih akurat, agar perusahaan bisa mengatur jadwal operasional dengan efisien dan menghindari pemborosan energi.', '2025-07-17 04:26:52', '2025-07-17 04:26:52'),
(10, 'Source', 'Sustainability', 'Supplier Carbon Emission Level', 'Apakah perusahaan memantau dan mengevaluasi jejak karbon dari setiap pemasoknya.', 'Pilih pemasok yang memiliki komitmen lingkungan, minta laporan jejak karbon secara berkala, dan dorong mereka untuk menggunakan transportasi dan bahan baku yang rendah emisi.', '2025-07-17 04:27:29', '2025-07-17 04:27:29'),
(11, 'Make', 'Sustainability', 'Energy Efficiency per Unit', 'Berapa banyak energi yang digunakan untuk memproduksi satu unit produk.', 'Tingkatkan efisiensi mesin dan lakukan pemeliharaan rutin, serta evaluasi proses produksi agar menghasilkan lebih banyak produk dengan konsumsi energi yang lebih sedikit.', '2025-07-17 04:28:14', '2025-07-17 04:28:14'),
(12, 'Make', 'Sustainability', 'Water Usage Efficiency', 'Seberapa efisien penggunaan air dalam proses produksi.', 'Pasang alat pengukur penggunaan air, perbaiki kebocoran, dan gunakan ulang air limbah produksi yang sudah diolah untuk proses lain seperti pendinginan atau pembersihan.', '2025-07-17 04:28:57', '2025-07-17 04:28:57'),
(13, 'Deliver', 'Sustainability', 'CO₂ Emissions per Delivery', 'Berapa banyak emisi karbon yang dihasilkan dari proses distribusi per pengiriman.', 'Gunakan kendaraan ramah lingkungan, atur rute pengiriman agar lebih efisien, dan gabungkan pengiriman ke beberapa pelanggan sekaligus untuk mengurangi emisi per pengiriman.', '2025-07-17 04:29:34', '2025-07-17 04:29:34'),
(14, 'Return', 'Sustainability', 'Recycling Rate of Returned Products', 'Berapa persentase produk yang dikembalikan dapat diproses ulang atau didaur ulang.', 'Kembangkan sistem penanganan barang retur yang memisahkan komponen yang bisa didaur ulang, latih staf untuk memilah bahan, dan kerja sama dengan pihak ketiga yang ahli dalam proses daur ulang.', '2025-07-17 04:30:11', '2025-07-17 04:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `kinerja_indikator`
--

CREATE TABLE `kinerja_indikator` (
  `id` bigint UNSIGNED NOT NULL,
  `kpi_id` bigint UNSIGNED NOT NULL,
  `nilai_kinerja` decimal(10,4) NOT NULL,
  `snorm_de_boer` decimal(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kinerja_indikator`
--

INSERT INTO `kinerja_indikator` (`id`, `kpi_id`, `nilai_kinerja`, `snorm_de_boer`, `created_at`, `updated_at`) VALUES
(1, 33, '0.1862', '40.0201', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(2, 34, '0.3147', '83.1327', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(3, 35, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(4, 36, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(5, 37, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(6, 41, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(7, 38, '0.3147', '83.1327', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(8, 42, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(9, 43, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(10, 44, '0.2682', '67.5090', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(11, 46, '0.3147', '83.1327', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(12, 39, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(13, 40, '0.3650', '100.0000', '2025-07-25 03:39:17', '2025-07-25 03:39:17'),
(14, 45, '0.0670', '0.0336', '2025-07-25 03:39:17', '2025-07-25 03:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `id` bigint UNSIGNED NOT NULL,
  `scor_id` bigint UNSIGNED DEFAULT NULL,
  `gscor_id` bigint UNSIGNED DEFAULT NULL,
  `variabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `scor_id`, `gscor_id`, `variabel`, `atribut`, `indikator`, `keterangan`, `created_at`, `updated_at`, `kategori`, `skor`) VALUES
(33, NULL, NULL, 'Plan', 'Responsiveness', 'MPS – Commitment Monthly Order', 'Jadwal produksi bulanan disusun berdasarkan permintaan pelanggan yang berubah-ubah.', '2025-07-25 02:57:50', '2025-07-25 03:00:04', 'SCOR', 3.3333333333333),
(34, NULL, NULL, 'Plan', 'Responsiveness', 'Cycle Time', 'Rencana produksi dibuat untuk meminimalkan durasi keseluruhan produksi.', '2025-07-25 02:57:50', '2025-07-25 03:00:23', 'SCOR', 4.3333333333333),
(35, NULL, NULL, 'Source', 'Reliability', 'Precentage Quality Accuracy by Supplier', 'Bahan baku dari pemasok memenuhi standar kualitas yang ditetapkan.', '2025-07-25 02:57:50', '2025-07-25 03:00:44', 'SCOR', 4.6666666666667),
(36, NULL, NULL, 'Source', 'Reliability', 'Precentage Quantity Accuracy by Supplier', 'Jumlah bahan baku dari pemasok sesuai dengan pesanan.', '2025-07-25 02:57:50', '2025-07-25 03:01:02', 'SCOR', 4.6666666666667),
(37, NULL, NULL, 'Source', 'Responsiveness', 'Supplier Lead Time Compliance', 'Pemasok mengirim bahan baku tepat waktu sesuai perjanjian.', '2025-07-25 02:57:50', '2025-07-25 03:01:19', 'SCOR', 4.6666666666667),
(38, NULL, NULL, 'Make', 'Asset Management', 'Yield', 'Hasil produksi bersih lebih banyak dibandingkan jumlah bahan baku yang dipakai.', '2025-07-25 02:57:50', '2025-07-25 03:01:54', 'SCOR', 4.3333333333333),
(39, NULL, NULL, 'Deliver', 'Reliability', 'Delivery Quantity Accuracy', 'Jumlah produk yang dikirim sesuai dengan pesanan pelanggan.', '2025-07-25 02:57:50', '2025-07-25 03:03:25', 'SCOR', 4.6666666666667),
(40, NULL, NULL, 'Deliver', 'Responsiveness', 'Delivery Time Compliance', 'Produk dikirim tepat waktu sesuai dengan jadwal pengiriman yang ditentukan.', '2025-07-25 02:57:50', '2025-07-25 03:03:44', 'SCOR', 4.6666666666667),
(41, NULL, NULL, 'Source', 'Sustainability', '% Supplier with EMS/ISO 14001', 'Pemasok memiliki sertifikasi lingkungan seperti ISO 14001.', '2025-07-25 02:58:32', '2025-07-25 03:01:37', 'Green SCOR', 4.6666666666667),
(42, NULL, NULL, 'Make', 'Sustainability', 'Energy Used', 'Perusahaan secara aktif mengoptimalkan penggunaan energi dalam proses produksi untuk mendukung efisiensi dan keberlanjutan.', '2025-07-25 02:58:32', '2025-07-25 03:02:11', 'Green SCOR', 4.6666666666667),
(43, NULL, NULL, 'Make', 'Sustainability', 'Work Safety Compliance', 'Proses produksi memenuhi standar keselamatan kerja untuk mengurangi kecelakaan.', '2025-07-25 02:58:32', '2025-07-25 03:02:26', 'Green SCOR', 4.6666666666667),
(44, NULL, NULL, 'Make', 'Sustainability', 'Chemical Used', 'Perusahaan mengelola penggunaan bahan kimia dalam proses produksi dengan memperhatikan standar keselamatan dan dampak lingkungan.', '2025-07-25 02:58:32', '2025-07-25 03:02:43', 'Green SCOR', 4),
(45, NULL, NULL, 'Return', 'Reliability', '% Error - free return shipped', 'Seberapa sering produk jadi yang sudah dikirim dikembalikan oleh pelanggan.', '2025-07-25 02:58:32', '2025-07-25 03:04:06', 'Green SCOR', 2),
(46, NULL, NULL, 'Make', 'Sustainability', '% of Solid Waste Recycling', 'Limbah padat hasil produksi dikelola melalui proses daur ulang.', '2025-07-25 02:59:34', '2025-07-25 03:03:02', 'Green SCOR', 4.3333333333333);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_13_023305_create_info_table', 2),
(5, '2025_06_29_001922_create_perencanaans_table', 3),
(6, '2025_06_29_232153_create_pengadaans_table', 4),
(7, '2025_06_30_090900_create_produksis_table', 5),
(8, '2025_06_30_101203_create_distribusis_table', 6),
(9, '2025_06_30_110605_create_pengembalians_table', 7),
(10, '2025_06_30_112554_alter_produk_dikembalikan_in_pengembalians_table', 8),
(11, '2025_06_30_114428_create_s_c_o_r_s_table', 9),
(12, '2025_06_30_230147_create_gscor_table', 10),
(13, '2025_06_30_233514_create_kpi_table', 11),
(14, '2025_06_30_234941_add_kategori_to_kpi_table', 12),
(15, '2025_07_02_232702_add_skor_to_kpi_table', 13),
(16, '2025_07_04_001132_create_pairwise_matrix_table', 14),
(17, '2025_07_04_013130_create_normalisasi_matriks_table', 15),
(18, '2025_07_08_002209_create_uji_konsistensi_table', 16),
(19, '2025_07_08_020834_create_bobot_prioritas_table', 17),
(20, '2025_07_08_021255_remove_bobot_prioritas_from_normalisasi_matriks', 18),
(21, '2025_07_09_233716_create_kinerja_indikator_table', 19),
(22, '2025_07_10_094249_create_nilai_akhir_scm_table', 19),
(23, '2025_07_17_094220_add_rekomendasi_to_scor_table', 20),
(24, '2025_07_17_095310_add_rekomendasi_bawaan_to_scor_table', 20),
(25, '2025_07_17_100814_remove_rekomendasi_from_scor_table', 21),
(26, '2025_07_17_111215_add_rekomendasi_bawaan_to_gscor_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir_scm`
--

CREATE TABLE `nilai_akhir_scm` (
  `indikator_id` bigint UNSIGNED NOT NULL,
  `bobot_prioritas` double NOT NULL,
  `snorm` double NOT NULL,
  `nilai_akhir` double NOT NULL,
  `rekomendasi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_akhir_scm`
--

INSERT INTO `nilai_akhir_scm` (`indikator_id`, `bobot_prioritas`, `snorm`, `nilai_akhir`, `rekomendasi`, `created_at`, `updated_at`) VALUES
(33, 0.05586597, 40.0201, 2.235761705997, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(34, 0.07262685, 83.1327, 6.037666132995, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(35, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(36, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(37, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(38, 0.07262685, 83.1327, 6.037666132995, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(39, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(40, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(41, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(42, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(43, 0.07821197, 100, 7.821197, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(44, 0.06703751, 67.509, 4.52563526259, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(45, 0.03352021, 0.0336, 0.001126279056, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07'),
(46, 0.07262685, 83.1327, 6.037666132995, NULL, '2025-07-25 03:41:07', '2025-07-25 03:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi_matriks`
--

CREATE TABLE `normalisasi_matriks` (
  `id` bigint UNSIGNED NOT NULL,
  `indikator1_id` bigint UNSIGNED NOT NULL,
  `indikator2_id` bigint UNSIGNED NOT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `normalisasi_matriks`
--

INSERT INTO `normalisasi_matriks` (`id`, `indikator1_id`, `indikator2_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 33, 33, 0.055865921787709, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(2, 33, 34, 0.055864623429443, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(3, 33, 35, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(4, 33, 36, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(5, 33, 37, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(6, 33, 41, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(7, 33, 38, 0.055864623429443, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(8, 33, 42, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(9, 33, 43, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(10, 33, 44, 0.055863187815081, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(11, 33, 46, 0.055864623429443, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(12, 33, 39, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(13, 33, 40, 0.05586666458102, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(14, 33, 45, 0.055867288792352, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(15, 34, 33, 0.072625698324022, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(16, 34, 34, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(17, 34, 35, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(18, 34, 36, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(19, 34, 37, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(20, 34, 41, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(21, 34, 38, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(22, 34, 42, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(23, 34, 43, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(24, 34, 44, 0.072622814544674, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(25, 34, 46, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(26, 34, 39, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(27, 34, 40, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(28, 34, 45, 0.072627140233029, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(29, 35, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(30, 35, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(31, 35, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(32, 35, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(33, 35, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(34, 35, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(35, 35, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(36, 35, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(37, 35, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(38, 35, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(39, 35, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(40, 35, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(41, 35, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(42, 35, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(43, 36, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(44, 36, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(45, 36, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(46, 36, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(47, 36, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(48, 36, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(49, 36, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(50, 36, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(51, 36, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(52, 36, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(53, 36, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(54, 36, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(55, 36, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(56, 36, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(57, 37, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(58, 37, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(59, 37, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(60, 37, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(61, 37, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(62, 37, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(63, 37, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(64, 37, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(65, 37, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(66, 37, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(67, 37, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(68, 37, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(69, 37, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(70, 37, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(71, 41, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(72, 41, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(73, 41, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(74, 41, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(75, 41, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(76, 41, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(77, 41, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(78, 41, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(79, 41, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(80, 41, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(81, 41, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(82, 41, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(83, 41, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(84, 41, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(85, 38, 33, 0.072625698324022, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(86, 38, 34, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(87, 38, 35, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(88, 38, 36, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(89, 38, 37, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(90, 38, 41, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(91, 38, 38, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(92, 38, 42, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(93, 38, 43, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(94, 38, 44, 0.072622814544674, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(95, 38, 46, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(96, 38, 39, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(97, 38, 40, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(98, 38, 45, 0.072627140233029, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(99, 42, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(100, 42, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(101, 42, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(102, 42, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(103, 42, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(104, 42, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(105, 42, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(106, 42, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(107, 42, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(108, 42, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(109, 42, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(110, 42, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(111, 42, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(112, 42, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(113, 43, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(114, 43, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(115, 43, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(116, 43, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(117, 43, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(118, 43, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(119, 43, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(120, 43, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(121, 43, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(122, 43, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(123, 43, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(124, 43, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(125, 43, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(126, 43, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(127, 44, 33, 0.067039106145251, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(128, 44, 34, 0.067041905730264, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(129, 44, 35, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(130, 44, 36, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(131, 44, 37, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(132, 44, 41, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(133, 44, 38, 0.067041905730264, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(134, 44, 42, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(135, 44, 43, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(136, 44, 44, 0.067038506918374, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(137, 44, 46, 0.067041905730264, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(138, 44, 39, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(139, 44, 40, 0.067035304791253, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(140, 44, 45, 0.067039405762707, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(141, 46, 33, 0.072625698324022, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(142, 46, 34, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(143, 46, 35, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(144, 46, 36, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(145, 46, 37, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(146, 46, 41, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(147, 46, 38, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(148, 46, 42, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(149, 46, 43, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(150, 46, 44, 0.072622814544674, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(151, 46, 46, 0.072626915534897, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(152, 46, 39, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(153, 46, 40, 0.072627446072987, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(154, 46, 45, 0.072627140233029, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(155, 39, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(156, 39, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(157, 39, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(158, 39, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(159, 39, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(160, 39, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(161, 39, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(162, 39, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(163, 39, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(164, 39, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(165, 39, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(166, 39, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(167, 39, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(168, 39, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(169, 40, 33, 0.078212290502793, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(170, 40, 34, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(171, 40, 35, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(172, 40, 36, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(173, 40, 37, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(174, 40, 41, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(175, 40, 38, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(176, 40, 42, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(177, 40, 43, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(178, 40, 44, 0.078213826021667, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(179, 40, 46, 0.078211925339531, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(180, 40, 39, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(181, 40, 40, 0.078211766178104, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(182, 40, 45, 0.078211522733062, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(183, 45, 33, 0.033519553072626, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(184, 45, 34, 0.033517321519355, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(185, 45, 35, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(186, 45, 36, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(187, 45, 37, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(188, 45, 41, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(189, 45, 38, 0.033517321519355, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(190, 45, 42, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(191, 45, 43, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(192, 45, 44, 0.033519253459187, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(193, 45, 46, 0.033517321519355, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(194, 45, 39, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(195, 45, 40, 0.033521562983935, '2025-07-25 03:38:42', '2025-07-25 03:38:42'),
(196, 45, 45, 0.033519702881354, '2025-07-25 03:38:42', '2025-07-25 03:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `pairwise_matrix`
--

CREATE TABLE `pairwise_matrix` (
  `id` bigint UNSIGNED NOT NULL,
  `indikator1_id` bigint UNSIGNED NOT NULL,
  `indikator2_id` bigint UNSIGNED NOT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pairwise_matrix`
--

INSERT INTO `pairwise_matrix` (`id`, `indikator1_id`, `indikator2_id`, `nilai`, `created_at`, `updated_at`) VALUES
(197, 33, 33, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(198, 33, 34, 0.7692, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(199, 33, 35, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(200, 33, 36, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(201, 33, 37, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(202, 33, 41, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(203, 33, 38, 0.7692, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(204, 33, 42, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(205, 33, 43, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(206, 33, 44, 0.8333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(207, 33, 46, 0.7692, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(208, 33, 39, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(209, 33, 40, 0.7143, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(210, 33, 45, 1.6667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(211, 34, 33, 1.3, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(212, 34, 34, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(213, 34, 35, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(214, 34, 36, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(215, 34, 37, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(216, 34, 41, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(217, 34, 38, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(218, 34, 42, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(219, 34, 43, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(220, 34, 44, 1.0833, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(221, 34, 46, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(222, 34, 39, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(223, 34, 40, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(224, 34, 45, 2.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(225, 35, 33, 1.4, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(226, 35, 34, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(227, 35, 35, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(228, 35, 36, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(229, 35, 37, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(230, 35, 41, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(231, 35, 38, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(232, 35, 42, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(233, 35, 43, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(234, 35, 44, 1.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(235, 35, 46, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(236, 35, 39, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(237, 35, 40, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(238, 35, 45, 2.3333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(239, 36, 33, 1.4, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(240, 36, 34, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(241, 36, 35, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(242, 36, 36, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(243, 36, 37, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(244, 36, 41, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(245, 36, 38, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(246, 36, 42, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(247, 36, 43, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(248, 36, 44, 1.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(249, 36, 46, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(250, 36, 39, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(251, 36, 40, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(252, 36, 45, 2.3333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(253, 37, 33, 1.4, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(254, 37, 34, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(255, 37, 35, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(256, 37, 36, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(257, 37, 37, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(258, 37, 41, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(259, 37, 38, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(260, 37, 42, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(261, 37, 43, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(262, 37, 44, 1.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(263, 37, 46, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(264, 37, 39, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(265, 37, 40, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(266, 37, 45, 2.3333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(267, 41, 33, 1.4, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(268, 41, 34, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(269, 41, 35, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(270, 41, 36, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(271, 41, 37, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(272, 41, 41, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(273, 41, 38, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(274, 41, 42, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(275, 41, 43, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(276, 41, 44, 1.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(277, 41, 46, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(278, 41, 39, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(279, 41, 40, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(280, 41, 45, 2.3333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(281, 38, 33, 1.3, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(282, 38, 34, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(283, 38, 35, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(284, 38, 36, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(285, 38, 37, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(286, 38, 41, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(287, 38, 38, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(288, 38, 42, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(289, 38, 43, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(290, 38, 44, 1.0833, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(291, 38, 46, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(292, 38, 39, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(293, 38, 40, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(294, 38, 45, 2.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(295, 42, 33, 1.4, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(296, 42, 34, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(297, 42, 35, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(298, 42, 36, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(299, 42, 37, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(300, 42, 41, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(301, 42, 38, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(302, 42, 42, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(303, 42, 43, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(304, 42, 44, 1.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(305, 42, 46, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(306, 42, 39, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(307, 42, 40, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(308, 42, 45, 2.3333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(309, 43, 33, 1.4, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(310, 43, 34, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(311, 43, 35, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(312, 43, 36, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(313, 43, 37, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(314, 43, 41, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(315, 43, 38, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(316, 43, 42, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(317, 43, 43, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(318, 43, 44, 1.1667, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(319, 43, 46, 1.0769, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(320, 43, 39, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(321, 43, 40, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(322, 43, 45, 2.3333, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(323, 44, 33, 1.2, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(324, 44, 34, 0.9231, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(325, 44, 35, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(326, 44, 36, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(327, 44, 37, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(328, 44, 41, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(329, 44, 38, 0.9231, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(330, 44, 42, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(331, 44, 43, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(332, 44, 44, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(333, 44, 46, 0.9231, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(334, 44, 39, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(335, 44, 40, 0.8571, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(336, 44, 45, 2, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(337, 46, 33, 1.3, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(338, 46, 34, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(339, 46, 35, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(340, 46, 36, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(341, 46, 37, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(342, 46, 41, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(343, 46, 38, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(344, 46, 42, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(345, 46, 43, 0.9286, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(346, 46, 44, 1.0833, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(347, 46, 46, 1, '2025-07-25 03:38:23', '2025-07-25 03:38:23'),
(348, 46, 39, 0.9286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(349, 46, 40, 0.9286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(350, 46, 45, 2.1667, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(351, 39, 33, 1.4, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(352, 39, 34, 1.0769, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(353, 39, 35, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(354, 39, 36, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(355, 39, 37, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(356, 39, 41, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(357, 39, 38, 1.0769, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(358, 39, 42, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(359, 39, 43, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(360, 39, 44, 1.1667, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(361, 39, 46, 1.0769, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(362, 39, 39, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(363, 39, 40, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(364, 39, 45, 2.3333, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(365, 40, 33, 1.4, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(366, 40, 34, 1.0769, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(367, 40, 35, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(368, 40, 36, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(369, 40, 37, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(370, 40, 41, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(371, 40, 38, 1.0769, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(372, 40, 42, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(373, 40, 43, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(374, 40, 44, 1.1667, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(375, 40, 46, 1.0769, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(376, 40, 39, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(377, 40, 40, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(378, 40, 45, 2.3333, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(379, 45, 33, 0.6, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(380, 45, 34, 0.4615, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(381, 45, 35, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(382, 45, 36, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(383, 45, 37, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(384, 45, 41, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(385, 45, 38, 0.4615, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(386, 45, 42, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(387, 45, 43, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(388, 45, 44, 0.5, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(389, 45, 46, 0.4615, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(390, 45, 39, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(391, 45, 40, 0.4286, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(392, 45, 45, 1, '2025-07-25 03:38:24', '2025-07-25 03:38:24'),
(393, 33, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(394, 33, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(395, 33, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(396, 33, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(397, 33, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(398, 33, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(399, 33, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(400, 33, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(401, 33, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(402, 33, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(403, 33, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(404, 33, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(405, 33, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(406, 34, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(407, 34, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(408, 34, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(409, 34, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(410, 34, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(411, 34, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(412, 34, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(413, 34, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(414, 34, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(415, 34, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(416, 34, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(417, 34, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(418, 34, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(419, 35, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(420, 35, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(421, 35, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(422, 35, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(423, 35, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(424, 35, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(425, 35, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(426, 35, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(427, 35, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(428, 35, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(429, 35, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(430, 35, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(431, 35, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(432, 36, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(433, 36, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(434, 36, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(435, 36, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(436, 36, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(437, 36, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(438, 36, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(439, 36, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(440, 36, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(441, 36, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(442, 36, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(443, 36, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(444, 36, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(445, 37, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(446, 37, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(447, 37, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(448, 37, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(449, 37, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(450, 37, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(451, 37, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(452, 37, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(453, 37, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(454, 37, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(455, 37, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(456, 37, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(457, 37, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(458, 41, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(459, 41, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(460, 41, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(461, 41, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(462, 41, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(463, 41, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(464, 41, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(465, 41, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(466, 41, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(467, 41, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(468, 41, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(469, 41, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(470, 41, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(471, 38, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(472, 38, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(473, 38, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(474, 38, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(475, 38, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(476, 38, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(477, 38, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(478, 38, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(479, 38, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(480, 38, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(481, 38, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(482, 38, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(483, 38, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(484, 42, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(485, 42, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(486, 42, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(487, 42, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(488, 42, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(489, 42, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(490, 42, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(491, 42, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(492, 42, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(493, 42, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(494, 42, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(495, 42, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(496, 42, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(497, 43, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(498, 43, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(499, 43, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(500, 43, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(501, 43, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(502, 43, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(503, 43, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(504, 43, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(505, 43, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(506, 43, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(507, 43, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(508, 43, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(509, 43, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(510, 44, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(511, 44, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(512, 44, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(513, 44, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(514, 44, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(515, 44, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(516, 44, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(517, 44, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(518, 44, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(519, 44, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(520, 44, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(521, 44, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(522, 44, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(523, 46, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(524, 46, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(525, 46, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(526, 46, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(527, 46, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(528, 46, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(529, 46, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(530, 46, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(531, 46, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(532, 46, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(533, 46, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(534, 46, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(535, 46, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(536, 39, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(537, 39, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(538, 39, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(539, 39, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(540, 39, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(541, 39, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(542, 39, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(543, 39, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(544, 39, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(545, 39, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(546, 39, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(547, 39, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(548, 39, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(549, 40, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(550, 40, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(551, 40, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(552, 40, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(553, 40, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(554, 40, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(555, 40, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(556, 40, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(557, 40, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(558, 40, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(559, 40, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(560, 40, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(561, 40, 45, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(562, 45, 33, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(563, 45, 34, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(564, 45, 35, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(565, 45, 36, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(566, 45, 37, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(567, 45, 41, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(568, 45, 38, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(569, 45, 42, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(570, 45, 43, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(571, 45, 44, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(572, 45, 46, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(573, 45, 39, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09'),
(574, 45, 40, NULL, '2025-07-25 03:16:09', '2025-07-25 03:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` bigint UNSIGNED NOT NULL,
  `bahan_baku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pewarna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_iso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengadaans`
--

INSERT INTO `pengadaans` (`id`, `bahan_baku`, `pewarna`, `supplier_iso`, `created_at`, `updated_at`) VALUES
(1, '76400', '795', 'PT. BASF Indonesia', '2025-06-29 16:48:12', '2025-06-29 17:01:07'),
(3, '66825', '820', 'PT. Magenta Master Fibers', '2025-06-29 17:00:34', '2025-06-29 17:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalians`
--

CREATE TABLE `pengembalians` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `produk_dikembalikan` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalians`
--

INSERT INTO `pengembalians` (`id`, `nama_agen`, `alamat`, `produk_dikembalikan`, `created_at`, `updated_at`) VALUES
(1, 'CV. Artha Samudera', 'Jl. Ternate No. 09 RT. 09 / RW. 10, Tegal', '2.50', '2025-06-30 04:16:34', '2025-06-30 04:37:03'),
(3, 'CV. Abadi Jaya Mulia', 'Jl. Kapten Samadikun No. 32, Kota Cirebon', '0.50', '2025-06-30 04:22:59', '2025-06-30 04:22:59'),
(4, 'Toko Angsa Laut', 'Jl. Veteran No. 12, Cilacap - 53213', '1.50', '2025-06-30 04:29:49', '2025-06-30 04:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaans`
--

CREATE TABLE `perencanaans` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun` int NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permintaan` double NOT NULL,
  `jumlah_pekerja` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perencanaans`
--

INSERT INTO `perencanaans` (`id`, `tahun`, `bulan`, `permintaan`, `jumlah_pekerja`, `created_at`, `updated_at`) VALUES
(2, 2022, 'Januari', 135371, 172, '2025-06-29 17:07:24', '2025-06-29 17:07:24'),
(4, 2022, 'Maret', 100369, 171, '2025-06-29 17:08:12', '2025-06-29 17:08:12'),
(5, 2022, 'April', 48284, 190, '2025-07-02 22:57:03', '2025-07-02 22:57:14'),
(6, 2023, 'Januari', 84584, 160, '2025-07-23 14:10:47', '2025-07-23 14:10:47'),
(7, 2024, 'Januari', 73194, 164, '2025-07-23 14:30:26', '2025-07-23 14:30:26'),
(8, 2023, 'Februari', 63816, 159, '2025-07-23 14:30:57', '2025-07-23 14:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `produksis`
--

CREATE TABLE `produksis` (
  `id` bigint UNSIGNED NOT NULL,
  `listrik` decimal(8,2) NOT NULL,
  `air` decimal(8,2) DEFAULT NULL,
  `hasil_produksi` decimal(8,2) DEFAULT NULL,
  `sampah` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksis`
--

INSERT INTO `produksis` (`id`, `listrik`, `air`, `hasil_produksi`, `sampah`, `created_at`, `updated_at`) VALUES
(1, '109138.00', '1232.00', '69948.00', '11175.00', '2025-06-30 02:34:19', '2025-06-30 02:34:19'),
(2, '87291.00', '1174.00', '66607.00', '8769.00', '2025-06-30 02:35:05', '2025-06-30 02:35:05'),
(4, '97728.00', '1270.00', '74521.00', '8350.00', '2025-06-30 02:47:39', '2025-06-30 02:47:39'),
(5, '75532.00', '3452.00', '51503.00', '6251.00', '2025-06-30 03:06:55', '2025-06-30 03:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_perhitungan`
--

CREATE TABLE `riwayat_perhitungan` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_per_indikator` json NOT NULL,
  `total_nilai_akhir` double NOT NULL,
  `rekomendasi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_perhitungan`
--

INSERT INTO `riwayat_perhitungan` (`id`, `judul`, `hasil_per_indikator`, `total_nilai_akhir`, `rekomendasi`, `created_at`, `updated_at`) VALUES
(15, 'Perhitungan Kinerja Rantai Pasok pada 25-07-2025 10:41', '\"[{\\\"variabel\\\":\\\"Plan\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"MPS \\\\u2013 Commitment Monthly Order\\\",\\\"bobot_prioritas\\\":0.06,\\\"snorm_de_boer\\\":40.02,\\\"nilai_akhir\\\":2.24},{\\\"variabel\\\":\\\"Plan\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"Cycle Time\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":83.13,\\\"nilai_akhir\\\":6.04},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"Precentage Quality Accuracy by Supplier\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"Precentage Quantity Accuracy by Supplier\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"Supplier Lead Time Compliance\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Asset Management\\\",\\\"indikator\\\":\\\"Yield\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":83.13,\\\"nilai_akhir\\\":6.04},{\\\"variabel\\\":\\\"Deliver\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"Delivery Quantity Accuracy\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Deliver\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"Delivery Time Compliance\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"% Supplier with EMS\\\\/ISO 14001\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"Energy Used\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"Work Safety Compliance\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"Chemical Used\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":67.51,\\\"nilai_akhir\\\":4.53},{\\\"variabel\\\":\\\"Return\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"% Error - free return shipped\\\",\\\"bobot_prioritas\\\":0.03,\\\"snorm_de_boer\\\":0.03,\\\"nilai_akhir\\\":0},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"% of Solid Waste Recycling\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":83.13,\\\"nilai_akhir\\\":6.04}]\"', 87.45, 'Perbaiki indikator dengan nilai SCM terendah.', '2025-07-25 03:41:16', '2025-07-25 03:41:16'),
(17, 'Perhitungan Kinerja Rantai Pasok pada 25-07-2025 11:06', '\"[{\\\"variabel\\\":\\\"Plan\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"MPS \\\\u2013 Commitment Monthly Order\\\",\\\"bobot_prioritas\\\":0.06,\\\"snorm_de_boer\\\":40.02,\\\"nilai_akhir\\\":2.24},{\\\"variabel\\\":\\\"Plan\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"Cycle Time\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":83.13,\\\"nilai_akhir\\\":6.04},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"Precentage Quality Accuracy by Supplier\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"Precentage Quantity Accuracy by Supplier\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"Supplier Lead Time Compliance\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Asset Management\\\",\\\"indikator\\\":\\\"Yield\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":83.13,\\\"nilai_akhir\\\":6.04},{\\\"variabel\\\":\\\"Deliver\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"Delivery Quantity Accuracy\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Deliver\\\",\\\"atribut\\\":\\\"Responsiveness\\\",\\\"indikator\\\":\\\"Delivery Time Compliance\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Source\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"% Supplier with EMS\\\\/ISO 14001\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"Energy Used\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"Work Safety Compliance\\\",\\\"bobot_prioritas\\\":0.08,\\\"snorm_de_boer\\\":100,\\\"nilai_akhir\\\":7.82},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"Chemical Used\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":67.51,\\\"nilai_akhir\\\":4.53},{\\\"variabel\\\":\\\"Return\\\",\\\"atribut\\\":\\\"Reliability\\\",\\\"indikator\\\":\\\"% Error - free return shipped\\\",\\\"bobot_prioritas\\\":0.03,\\\"snorm_de_boer\\\":0.03,\\\"nilai_akhir\\\":0},{\\\"variabel\\\":\\\"Make\\\",\\\"atribut\\\":\\\"Sustainability\\\",\\\"indikator\\\":\\\"% of Solid Waste Recycling\\\",\\\"bobot_prioritas\\\":0.07,\\\"snorm_de_boer\\\":83.13,\\\"nilai_akhir\\\":6.04}]\"', 87.45, 'Perbaiki indikator dengan nilai SCM terendah.', '2025-07-25 04:06:29', '2025-07-25 04:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `scor`
--

CREATE TABLE `scor` (
  `id` bigint UNSIGNED NOT NULL,
  `variabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `rekomendasi_bawaan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scor`
--

INSERT INTO `scor` (`id`, `variabel`, `atribut`, `indikator`, `keterangan`, `rekomendasi_bawaan`, `created_at`, `updated_at`) VALUES
(2, 'Plan', 'Responsiveness', 'MPS – Commitment Monthly Order', 'Jadwal produksi bulanan disusun berdasarkan permintaan pelanggan yang berubah-ubah.', 'Gunakan data penjualan sebelumnya dan kondisi pasar untuk memperkirakan kebutuhan pelanggan dengan lebih akurat.', '2025-06-30 05:29:41', '2025-07-17 04:38:33'),
(8, 'Plan', 'Responsiveness', 'Cycle Time', 'Rencana produksi dibuat untuk meminimalkan durasi keseluruhan produksi.', 'Kurangi langkah-langkah atau aktivitas yang tidak penting dalam proses produksi agar pekerjaan lebih cepat selesai, efisien, dan pesanan pelanggan dapat dikirim tepat waktu.', '2025-07-03 16:11:11', '2025-07-17 04:39:46'),
(9, 'Plan', 'Agility', 'Forecasting Demand Accuracy', 'Perusahaan mampu menyesuaikan perencanaan saat terjadi perubahan permintaan pasar.', 'Gunakan data penjualan sebelumnya dan kondisi pasar untuk memperkirakan kebutuhan pelanggan dengan lebih akurat.', '2025-07-03 16:21:00', '2025-07-03 16:21:00'),
(10, 'Plan', 'Agility', 'Planning Flexibility', 'Rencana produksi dapat diubah dengan cepat jika ada perubahan mendadak.', 'Siapkan rencana cadangan jika terjadi perubahan permintaan mendadak.', '2025-07-03 16:21:31', '2025-07-03 16:21:31'),
(11, 'Source', 'Reliability', 'Precentage Quality Accuracy by Supplier', 'Bahan baku dari pemasok memenuhi standar kualitas yang ditetapkan.', 'Lakukan pemeriksaan kualitas barang dari pemasok secara rutin, dan beri pelatihan jika perlu.', '2025-07-03 16:22:32', '2025-07-03 16:22:32'),
(12, 'Source', 'Reliability', 'Precentage Quantity Accuracy by Supplier', 'Jumlah bahan baku dari pemasok sesuai dengan pesanan.', 'Periksa jumlah barang saat datang dan komunikasikan dengan pemasok jika sering kurang/lebih.', '2025-07-03 16:23:02', '2025-07-03 16:23:02'),
(13, 'Source', 'Responsiveness', 'Supplier Lead Time Compliance', 'Pemasok mengirim bahan baku tepat waktu sesuai perjanjian.', 'Buat kesepakatan waktu yang jelas dengan pemasok dan pantau pengiriman mereka.', '2025-07-03 16:23:27', '2025-07-03 16:23:27'),
(14, 'Source', 'Agility', 'Supplier Flexibility', 'Pemasok mampu menyesuaikan permintaan mendadak dengan cepat.', 'Gunakan pemasok yang bisa menyesuaikan jumlah atau jenis pesanan dengan cepat.', '2025-07-03 16:23:54', '2025-07-03 16:23:54'),
(15, 'Make', 'Asset Management', 'Yield', 'Hasil produksi bersih lebih banyak dibandingkan jumlah bahan baku yang dipakai.', 'Perbaiki cara kerja agar hasil produksi lebih sedikit yang rusak atau gagal.', '2025-07-03 16:25:52', '2025-07-03 16:25:52'),
(16, 'Make', 'Asset Management', 'Number of Trouble Machines', 'Mesin produksi jarang mengalami kerusakan berkat pemeliharaan rutin.', 'Rutin lakukan servis mesin agar tidak sering rusak.', '2025-07-03 16:26:21', '2025-07-03 16:26:21'),
(17, 'Make', 'Agility', 'Downtime Recovery Speed', 'Mesin dapat diperbaiki dan berfungsi kembali dalam waktu singkat setelah rusak.', 'Sediakan teknisi dan suku cadang agar kerusakan bisa cepat diatasi.', '2025-07-03 16:26:54', '2025-07-03 16:26:54'),
(18, 'Deliver', 'Reliability', 'Delivery Quantity Accuracy', 'Jumlah produk yang dikirim sesuai dengan pesanan pelanggan.', 'Gunakan sistem pengecekan otomatis agar barang tidak kelebihan atau kekurangan saat dikirim.', '2025-07-03 16:28:20', '2025-07-03 16:28:20'),
(19, 'Deliver', 'Reliability', 'Shipping Document Accuracy', 'Dokumen pengiriman sesuai dengan produk yang dikirim tanpa kesalahan.', 'Gunakan sistem digital agar dokumen pengiriman tidak salah atau tertukar.', '2025-07-03 16:29:34', '2025-07-03 16:29:34'),
(20, 'Deliver', 'Responsiveness', 'Delivery Time Compliance', 'Produk dikirim tepat waktu sesuai dengan jadwal pengiriman yang ditentukan.', 'Rencanakan rute dan waktu pengiriman dengan baik, dan gunakan jasa pengiriman yang terpercaya.', '2025-07-03 16:30:02', '2025-07-03 16:30:02'),
(21, 'Deliver', 'Agility', 'Delivery Flexibility', 'Pengiriman produk dapat disesuaikan dengan permintaan perubahan dari pelanggan.', 'Siapkan opsi pengiriman cadangan jika terjadi kendala seperti cuaca atau lalu lintas.', '2025-07-03 16:30:30', '2025-07-03 16:30:30'),
(22, 'Return', 'Responsiveness', 'Handling of Return Materials', 'Barang retur diproses dengan cepat dan sesuai standar yang berlaku.', 'Buat alur khusus dan tempat penyimpanan untuk barang yang dikembalikan.', '2025-07-03 16:31:33', '2025-07-03 16:31:33'),
(23, 'Plan', 'Reliability', 'Capacity Utilization Accuracy', 'Seberapa akurat kapasitas produksi yang direncanakan dibandingkan dengan realisasi', 'Gunakan jadwal kerja yang pas dengan kapasitas mesin dan jumlah pesanan.', '2025-07-17 03:37:16', '2025-07-17 03:37:16'),
(24, 'Source', 'Reliability', 'Supplier Risk Rating', 'Apakah perusahaan mengevaluasi risiko kegagalan pasokan berdasarkan performa historis pemasok', 'Evaluasi kinerja pemasok secara rutin, dan siapkan pemasok cadangan.', '2025-07-17 03:48:16', '2025-07-17 03:48:16'),
(25, 'Deliver', 'Cost', 'Delivery Cost per Unit', 'Seberapa efisien biaya distribusi per unit produk.', 'Kurangi biaya pengiriman dengan rute yang efisien atau kerjasama dengan ekspedisi yang tepat.', '2025-07-17 03:49:23', '2025-07-17 03:49:23'),
(26, 'Return', 'Responsiveness', 'Return Process Lead Time', 'Berapa lama waktu yang dibutuhkan sejak produk dikembalikan hingga diproses ulang atau diperbaiki.', 'Buat sistem retur yang jelas dan cepat, misalnya lewat aplikasi atau form online.', '2025-07-17 03:50:18', '2025-07-17 03:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ALBYRajkkTQFop2tZqR0ASV5KS8yjGvTs5WnyQpG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTZrc1pnWTdJc1V6a2trbHdFeEMzczhNcE9ETzV1TkE0VzNmOEcySSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753447055),
('IpvJbU3gJfb2TxQQNbfZwvx0HOs9AJ2AHAumzeVG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUg5bkRtY0xPVnVCeHlqWVdBdWViT2l1U1dQSWp0STEzYzdpRDRPRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753490885),
('YF9wti2bNfaxO59kpm2GJaOzHDZ0Fgd7iiLKDmjI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTdHSDh4Sm5GYWJuS0dyTWpVYWR4aE1oQkg1ckhCMEZoN2N0QVNLbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753416466),
('zTPjpe2IIGgLxR9otCSXgbOmdjGCuip6sn2itTTg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlF4Y0hHeXM0ZURJaVdYcEdFWlhxRUo4SVp0d0pkOGd0eDkzcjRwTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753429337);

-- --------------------------------------------------------

--
-- Table structure for table `uji_konsistensi`
--

CREATE TABLE `uji_konsistensi` (
  `id` bigint UNSIGNED NOT NULL,
  `lambda_max` decimal(10,4) NOT NULL,
  `ci` decimal(10,4) NOT NULL,
  `ri` decimal(10,4) NOT NULL,
  `cr` decimal(10,4) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uji_konsistensi`
--

INSERT INTO `uji_konsistensi` (`id`, `lambda_max`, `ci`, `ri`, `cr`, `status`, `created_at`, `updated_at`) VALUES
(1, '14.0000', '0.0000', '1.5700', '0.0000', 'Konsisten', '2025-07-25 03:39:00', '2025-07-25 03:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','manager') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Turini', 'admin@gmail.com', NULL, '$2y$12$Jboj/QoGJJyyIjPDWoRq0uQLIzIN.rKjassAP2w6XSAtAI5K0AaT.', 'admin', NULL, '2025-06-12 17:25:14', '2025-06-15 18:43:01'),
(2, 'Hilman Sultoni', 'manager@gmail.com', NULL, '$2y$12$8S/4Xs9ARpmTElXHwbCG/uWS/L3GyE3WwwxxQdxeDhJFGgAWYeas2', 'manager', NULL, '2025-06-12 17:25:14', '2025-06-15 18:43:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_prioritas`
--
ALTER TABLE `bobot_prioritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_prioritas_indikator_id_index` (`indikator_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `distribusis`
--
ALTER TABLE `distribusis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gscor`
--
ALTER TABLE `gscor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja_indikator`
--
ALTER TABLE `kinerja_indikator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kinerja_indikator_kpi_id_foreign` (`kpi_id`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasi_matriks`
--
ALTER TABLE `normalisasi_matriks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pairwise_matrix`
--
ALTER TABLE `pairwise_matrix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pairwise_matrix_indikator1_id_foreign` (`indikator1_id`),
  ADD KEY `pairwise_matrix_indikator2_id_foreign` (`indikator2_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalians`
--
ALTER TABLE `pengembalians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaans`
--
ALTER TABLE `perencanaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_perhitungan`
--
ALTER TABLE `riwayat_perhitungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scor`
--
ALTER TABLE `scor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `uji_konsistensi`
--
ALTER TABLE `uji_konsistensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_prioritas`
--
ALTER TABLE `bobot_prioritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `distribusis`
--
ALTER TABLE `distribusis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gscor`
--
ALTER TABLE `gscor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kinerja_indikator`
--
ALTER TABLE `kinerja_indikator`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `normalisasi_matriks`
--
ALTER TABLE `normalisasi_matriks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `pairwise_matrix`
--
ALTER TABLE `pairwise_matrix`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- AUTO_INCREMENT for table `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengembalians`
--
ALTER TABLE `pengembalians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perencanaans`
--
ALTER TABLE `perencanaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_perhitungan`
--
ALTER TABLE `riwayat_perhitungan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `scor`
--
ALTER TABLE `scor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `uji_konsistensi`
--
ALTER TABLE `uji_konsistensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kinerja_indikator`
--
ALTER TABLE `kinerja_indikator`
  ADD CONSTRAINT `kinerja_indikator_kpi_id_foreign` FOREIGN KEY (`kpi_id`) REFERENCES `kpi` (`id`);

--
-- Constraints for table `pairwise_matrix`
--
ALTER TABLE `pairwise_matrix`
  ADD CONSTRAINT `pairwise_matrix_indikator1_id_foreign` FOREIGN KEY (`indikator1_id`) REFERENCES `kpi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pairwise_matrix_indikator2_id_foreign` FOREIGN KEY (`indikator2_id`) REFERENCES `kpi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
