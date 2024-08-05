-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2024 pada 03.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pasword` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `level` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pasword`, `nama`, `level`) VALUES
('101006', 'savira', 'savira', 'savira', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publication_date` date NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publication_date`, `publisher`, `pages`, `category_id`, `image_path`) VALUES
(22, 'DIA AURORA', 'Nurwina Sari', '2022-03-29', 'Romenceus', 218, 9, 'uploads/66af92b9c63cb6.44499223.jpg'),
(23, 'Septihan', 'Poppy Pertiwi', '2020-02-22', 'Coconut Books', 328, 9, 'uploads/66af7e8e124ce2.50917929.jpg'),
(24, 'DIA ANGKASA', 'Nurwina Sari', '2021-06-29', 'Romancius', 281, 9, 'uploads/66af7e9ae5da91.52700847.jpg'),
(25, 'GALAKSI', 'Poppy Pertiwi', '2017-07-20', 'Coconut Books', 279, 9, 'uploads/66af7eac8d2075.72036231.jpg'),
(26, 'eccedentesiast', 'Itakrn', '2022-04-26', 'akad', 356, 9, 'uploads/66af7ebc700f65.14543414.jpg'),
(27, 'AREKSA', 'Itakrn', '2021-05-21', 'Akad', 310, 9, 'uploads/66af7ed3693022.68374013.jpg'),
(28, 'Gibran Dirgantara', 'Falistiyana', '2022-10-19', 'Ballantine Books', 249, 9, 'uploads/66af802c040685.83698143.jpg'),
(29, 'Desa Kembang Mati', 'Tinta Emas', '2022-02-12', 'gramedi', 585, 6, 'uploads/66af8165c70ed7.10376730.jpg'),
(30, 'Misteri Noni Belanda', 'Cristhine', '2020-12-22', 'tunas', 1225, 6, 'uploads/66af81ea4c4707.87573529.jpg'),
(31, 'Misteri Jurig Jarian', 'Justy Salli', '2019-03-12', 'gramedia', 505, 6, 'uploads/66af82f8c737f8.34553005.png'),
(32, 'Vila Teratai', 'Nanda Hime', '2023-02-12', 'Ancient Greece', 541, 6, 'uploads/66af86241b92f1.61221713.jpg'),
(33, 'Ancika', 'Pidi Baiq', '2021-02-17', 'Pastel Books', 430, 21, 'uploads/66af91e7396646.33949795.jpg'),
(34, 'Dilan 1990', 'Pidi Baiq', '2015-04-23', 'Pastek book', 333, 21, 'uploads/66af923dd86ab9.65253600.jpg'),
(35, 'Dilan 1991', 'Pidi Baiq', '2015-01-01', 'Pastek Book', 311, 21, 'uploads/66af92a264a495.38863627.jpg'),
(36, 'Kisah Pembangkit Motivasi', 'Nurlita Maharani', '2017-02-01', 'Bhuana Ilmu Populer', 183, 3, 'uploads/66b021e4b09fc2.42406719.jpg'),
(37, 'Si Juki', 'Faza Ibnu Ubaidillah', '2010-10-16', 'erlangga', 500, 3, 'uploads/66b022be315530.81427374.jpg'),
(38, 'The Song Of Achilles', 'Madeline Miller', '2010-01-01', 'John Murray', 798, 4, 'uploads/66b023874374e6.47415818.jpg'),
(39, 'Don Quixote', 'Miguel de Cervantes', '1605-01-16', 'Francisco de Robles', 1072, 6, NULL),
(40, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', '1967-05-30', 'Harper & Row', 417, 4, NULL),
(41, 'The Brothers Karamazov', 'Fyodor Dostoevsky', '1880-01-01', 'The Russian Messenger', 824, 5, NULL),
(42, 'Mariana Karpov', 'Andrea', '2024-07-16', 'knewknkewn', 23, 3, NULL),
(43, 'nseej', 'jejfe', '2024-07-09', 'knewknkewn', 234, 3, NULL),
(66, 'galaksi', 'ty6uy', '1111-11-11', 'jhgju', 1, 3, 'uploads/66ade4bccd9f91.17125344.jpg'),
(67, 'septihan', 'poppy', '1111-11-11', 'erlangga', 123, 5, 'uploads/66ade78941c0d9.19359277.jpg'),
(68, 'DIA ANGKASA', 'Nurwina Sari', '2222-02-22', 'jhgju', 234, 21, 'uploads/66af2bef6b1242.92375138.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'dongeng'),
(4, 'fantasi'),
(5, 'mystery'),
(6, 'horor'),
(7, 'mystery'),
(8, 'history'),
(9, 'fiksi remaja'),
(10, 'history'),
(13, 'fiction'),
(21, 'romance');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
