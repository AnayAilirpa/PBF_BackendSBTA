/*
 Navicat MySQL Dump SQL

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : bimbingan

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 28/05/2025 08:42:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for dosen_pembimbing
-- ----------------------------
DROP TABLE IF EXISTS `dosen_pembimbing`;
CREATE TABLE `dosen_pembimbing`  (
  `nidn` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_telp` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nidn`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dosen_pembimbing
-- ----------------------------
INSERT INTO `dosen_pembimbing` VALUES ('1111', 'pak abdau', 'bcshgdqegcj', '1234567890');
INSERT INTO `dosen_pembimbing` VALUES ('2222', 'pak annas', 'hwjdgoqwidh', '0987654321');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jadwal_bimbingan
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_bimbingan`;
CREATE TABLE `jadwal_bimbingan`  (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `id_ta` int NULL DEFAULT NULL,
  `nidn` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tanggal_bimbingan` datetime NULL DEFAULT NULL,
  `catatan_bimbingan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE,
  INDEX `id_ta`(`id_ta` ASC) USING BTREE,
  INDEX `nidn`(`nidn` ASC) USING BTREE,
  CONSTRAINT `jadwal_bimbingan_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tugas_akhir` (`id_ta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `jadwal_bimbingan_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `dosen_pembimbing` (`nidn`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal_bimbingan
-- ----------------------------
INSERT INTO `jadwal_bimbingan` VALUES (6, 7, '1111', '2025-10-02 00:00:00', 'fhiuewfbxjiw', 1);
INSERT INTO `jadwal_bimbingan` VALUES (7, 8, '2222', '2025-11-07 00:00:00', 'hguksbie', 0);
INSERT INTO `jadwal_bimbingan` VALUES (8, 9, '1111', '2025-09-20 00:00:00', 'agwiifxehh', 1);
INSERT INTO `jadwal_bimbingan` VALUES (9, 10, '1111', '2025-12-16 00:00:00', 'jgaiufwsblw', 0);
INSERT INTO `jadwal_bimbingan` VALUES (10, 11, '2222', '2025-12-25 00:00:00', 'wdgqibmwsbq', 1);

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `npm` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `angkatan` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `no_telp` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  PRIMARY KEY (`npm`) USING BTREE,
  UNIQUE INDEX `id_user`(`id_user` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('230102026', 'Amel', '2023', 'ameladellia815@gmail.com', '081229590091', NULL);
INSERT INTO `mahasiswa` VALUES ('230102038', 'Meilita A', '2023', 'meilitakhasanah@gmail.com', '085600641938', NULL);
INSERT INTO `mahasiswa` VALUES ('230102043', 'Shalsabilla', '2023', 'shalsabiel387@gmail.com', '082240080578', NULL);
INSERT INTO `mahasiswa` VALUES ('230102045', 'Tiara D', '2023', 'tiaradinda020@gmail.com', '081390012511', NULL);
INSERT INTO `mahasiswa` VALUES ('230202047', 'Yana A', '2023', 'dianaaprilia745@gmail.com', '081949463133', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);

-- ----------------------------
-- Table structure for notifikasi
-- ----------------------------
DROP TABLE IF EXISTS `notifikasi`;
CREATE TABLE `notifikasi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `penerima_npm` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `penerima_nidn` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pesan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `waktu_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penerima_npm`(`penerima_npm` ASC) USING BTREE,
  INDEX `penerima_nidn`(`penerima_nidn` ASC) USING BTREE,
  CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`penerima_npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`penerima_nidn`) REFERENCES `dosen_pembimbing` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifikasi
-- ----------------------------
INSERT INTO `notifikasi` VALUES (2, '230202047', NULL, 'Jadwal Bimbingan Baru', 'Anda memiliki jadwal bimbingan dengan dosen pembimbing pada tanggal 2025-06-01 pukul 10:00.', 0, '2025-05-25 14:53:08');
INSERT INTO `notifikasi` VALUES (4, NULL, '1111', 'Laporan Tugas Akhir Masuk', 'Mahasiswa dengan NPM 2115110001 telah mengunggah laporan tugas akhir.', 0, '2025-05-25 14:53:46');
INSERT INTO `notifikasi` VALUES (6, '230202047', NULL, 'Jadwal Bimbingan', 'Kamu ada bimbingan besok jam 10 pagi.', 0, '2025-05-25 15:26:12');
INSERT INTO `notifikasi` VALUES (7, NULL, '1111', 'Jadwal Bimbingan', 'Kamu ada bimbingan besok jam 10 pagi.', 1, '2025-05-25 15:27:52');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('DvE2Hk9LYuHZ86XsBtqlzrZgqXJiC9IreWDNpB56', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiTHNxSkVHM3o5djFNM3I3SHNBVTBBcERJWnZmVk8xMkdTRlF5Z1U5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1748325954);
INSERT INTO `sessions` VALUES ('nGl2PwDzhWSNTc3ZokJprXr5ueVOs4B3zfWVCQ5T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkZ6QUlzVmdOeWJUMWR4bVV0Q1ZJY29LMmdKSm1iY29zTXYzb0M0QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iaW1iaW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748319328);
INSERT INTO `sessions` VALUES ('nPTcbFEO89rvmoHxLl6VkHN0D0To9dId8E0qmA1q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1g2aUJWaHNjdzlVcjZyRnBHZFlwR0p0N2xDb2pBZXFnWW5jNjdsZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iaW1iaW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748319329);
INSERT INTO `sessions` VALUES ('ZFuf4FitheyiTPDLpr25a4Re2PpPMxaO2EnwL49W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo3OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoibDVwVUE0YUI5ZEZFWjNmYlQ4M1ZVSDBHSEJPVGtCa09zWXM0bUZRUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iaW1iaW5nYW4iO31zOjc6ImlkX3VzZXIiO3M6MToiOCI7czo4OiJ1c2VybmFtZSI7czo5OiJtYWhhc2lzd2EiO3M6NDoicm9sZSI7czo5OiJtYWhhc2lzd2EiO3M6NDoidXNlciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo3OiJpZF91c2VyIjtzOjE6IjgiO3M6ODoidXNlcm5hbWUiO3M6OToibWFoYXNpc3dhIjtzOjQ6InJvbGUiO3M6OToibWFoYXNpc3dhIjt9fQ==', 1748312073);

-- ----------------------------
-- Table structure for tugas_akhir
-- ----------------------------
DROP TABLE IF EXISTS `tugas_akhir`;
CREATE TABLE `tugas_akhir`  (
  `id_ta` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `file_ta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  `npm` char(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `file_revisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tanggal_revisi` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_ta`) USING BTREE,
  INDEX `npm`(`npm` ASC) USING BTREE,
  CONSTRAINT `tugas_akhir_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tugas_akhir
-- ----------------------------
INSERT INTO `tugas_akhir` VALUES (7, 'Sistem Manajemen Laundry Berbasis Web', 'uploads/ta1.pdf', 1, '230102045', 'uploads/revisi_ta1.pdf', '2025-03-15');
INSERT INTO `tugas_akhir` VALUES (8, 'Penerapan User-Centered Design dalam Aplikasi E-Commerce', 'uploads/ta2.pdf', 0, '230102043', NULL, NULL);
INSERT INTO `tugas_akhir` VALUES (9, 'Analisis Risiko K3 di Kampus', 'uploads/ta3.pdf', 1, '230102026', 'uploads/revisi_ta3.pdf', '2025-02-28');
INSERT INTO `tugas_akhir` VALUES (10, 'Optimasi Algoritma Sorting untuk Big Data', 'uploads/ta4.pdf', 0, '230102038', NULL, NULL);
INSERT INTO `tugas_akhir` VALUES (11, 'Pengembangan Sistem Bimbingan Tugas Akhir Online', 'uploads/ta5.pdf', 1, '230202047', 'uploads/revisi_ta5.pdf', '2025-01-10');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Yana A', '2222', 'Mahasiswa');
INSERT INTO `user` VALUES (2, 'Tiara D', '3333', 'Mahasiswa');
INSERT INTO `user` VALUES (3, 'Meilita A', '4444', 'Mahasiswa');
INSERT INTO `user` VALUES (4, 'Amel', '5555', 'Mahasiswa');
INSERT INTO `user` VALUES (5, 'Shalsabilla', '6666', 'Mahasiswa');
INSERT INTO `user` VALUES (6, 'admin', '$2y$10$TGdS0pj0.0mrXj2fAAprAec27zyACmXLzsMAjAyr8ebHHScGpGptu', 'admin');
INSERT INTO `user` VALUES (7, 'dosen', '$2y$10$PKfiNQQiQUO2DfnDE4ApW.TDMrDHF413uUzGQbj6/KnKtxcUYFlAC', 'dosen');
INSERT INTO `user` VALUES (8, 'mahasiswa', '$2y$10$vOi7QAzO6/G76unltHc7AOWh31Idqy6.BrpG2xrCB2lgdywW/1/b6', 'mahasiswa');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- View structure for v_tugasakhir
-- ----------------------------
DROP VIEW IF EXISTS `v_tugasakhir`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_tugasakhir` AS SELECT `mahasiswa`.`npm` AS `npm`, `mahasiswa`.`nama` AS `nama_mahasiswa`, `dosen_pembimbing`.`nama` AS `nama_dosen`, `tugas_akhir`.`judul` AS `judul`, `jadwal_bimbingan`.`tanggal_bimbingan` AS `tanggal_bimbingan`, `jadwal_bimbingan`.`catatan_bimbingan` AS `catatan_bimbingan` FROM (((`mahasiswa` join `tugas_akhir` on((`mahasiswa`.`npm` = `tugas_akhir`.`npm`))) join `jadwal_bimbingan` on((`tugas_akhir`.`id_ta` = `jadwal_bimbingan`.`id_ta`))) join `dosen_pembimbing` on((`jadwal_bimbingan`.`nidn` = `dosen_pembimbing`.`nidn`))) ;

SET FOREIGN_KEY_CHECKS = 1;
