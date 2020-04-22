-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2020 pada 07.18
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_anggota`
--

CREATE TABLE `tm_anggota` (
  `nis` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `ttl` date NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tm_anggota`
--

INSERT INTO `tm_anggota` (`nis`, `nama`, `jk`, `ttl`, `kelas`, `image`) VALUES
(121209, 'Fahira', 'P', '2018-01-02', 'VII', 'A21.JPG'),
(121210, 'Panji Asmoro', 'L', '2017-09-18', '07', ''),
(121211, 'Bayu Agung ', 'L', '2017-09-18', '07', ''),
(121212, 'Aji', 'L', '2018-01-03', 'VII', ''),
(121213, 'Hana', 'L', '2018-01-19', 'VII', ''),
(121214, 'Samudera', 'L', '2018-01-26', 'VII', ''),
(121215, 'Fathan', 'L', '2018-01-26', 'VII', ''),
(121216, 'Baim', 'L', '2018-01-26', 'VII', 'user1.jpg'),
(121217, 'Cahyo', 'L', '2018-01-26', 'VII', 'user2.jpg'),
(121218, 'Rian', 'L', '2018-01-26', 'VII', 'user3.jpg'),
(121219, 'Naus', 'L', '2018-01-26', 'VII', 'user4.jpg'),
(121220, 'Tole', 'L', '2018-01-26', 'VII', 'user5.jpg'),
(121221, 'Fadil', 'L', '2018-01-25', 'VII', 'fadil.jpg'),
(121223, 'Sela', 'P', '2018-01-26', 'VII', 'sela.jpg'),
(121224, 'Nova', 'P', '2018-01-26', 'VII', 'nova.jpg'),
(121225, 'Niken', 'P', '2018-01-26', 'VII', ''),
(121226, 'Fatih', 'L', '2018-01-26', 'VII', 'fatih.png'),
(121227, 'Yoga', 'L', '2018-01-26', 'VII', 'yoga.jpg'),
(121228, 'Apri', 'L', '2018-01-26', 'VII', 'apri.jpg'),
(121229, 'Akilah', 'L', '2018-01-26', 'VII', 'akila.jpg'),
(121231, 'Ariel', 'L', '2020-01-10', 'ipa1', ''),
(121232, 'Jaka', 'L', '1998-03-31', 'ips1', ''),
(121233, 'Vite', 'P', '2000-08-20', 'ipa2', 'vite1.jpg'),
(121401, 'Dzaki', 'L', '2002-06-09', 'ipa1', 'dzaki.jpg'),
(121402, 'Noval', 'L', '2000-10-10', 'ips1', 'ac_kuning_tipis1.png'),
(121403, 'Syahira', 'P', '2001-09-22', 'bahasa', 'syahira.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_buku`
--

CREATE TABLE `tm_buku` (
  `kode_buku` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `klasifikasi` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tm_buku`
--

INSERT INTO `tm_buku` (`kode_buku`, `judul`, `pengarang`, `klasifikasi`, `image`) VALUES
(7611, 'Desain Kreatif Dengan Adobe Potoshop', 'Muhammad Godc', 'Pendidikan', 'dseain-kreatif-dengan-adobe-potoshop.jpg'),
(7706, 'Membuat Website Portal Berita Dengan Laravel', 'Agusasaputra', 'Pendidikan', 'membuat-website-portal-berita-dengan-laravel.jpg'),
(7707, 'Trik seo & Security CodeIgniter', 'Anhar', 'Pendidikan', 'trik-seo--security-codeigniter1.jpg'),
(7711, 'CSS & HTML Web Design', 'Panji Asmoro', 'Pendidikan', 'css--html-web-design.jpg'),
(7712, 'HTML, CSS & JavaScript', 'Lukmanul Hakim', 'Pendidikan', 'html-css--javascript.jpg'),
(7714, 'Seminggu Belajar Laravel', 'Rahmat Awaludin', 'Pendidikan', 'seminggu-belajar-laravel.JPG'),
(7715, 'Menyelami Framework Laravel', 'Rahmat Awaludin', 'Pendidikan', 'menyelami-framework-laravel.JPG'),
(7723, 'Computer Graphic Design', 'Hendi Hendratman', 'Pendidikan', 'computer-graphic-design1.jpg'),
(7726, 'Responsive Web Design With Bootstrap', 'Panji Asmoro', 'Pendidikan', 'responsive-web-design-with-bootstrap.jpg'),
(7745, 'PHP Advanced', 'Agussalim', 'Pendidikan', 'php-advanced1.jpg'),
(7746, 'SEBUAH SENI UNTUK BERSIKAP BODO AMAT', 'Mark Manson', 'SELF IMPROVEMENT', '102de605a1b35ec8ab2ef10788bca8782.jpg'),
(7747, 'BICARA ITU ADA SENINYA', 'OH SU HYANG', 'SELF IMPROVEMENT', 'bicara-itu-ada-seninya-oh-su-hyang.jpg'),
(7748, 'SD/MI DETIK-DETIK USBN TAHUN 2018/2019', 'ANTON SUPARYANTA, WIGATI HADI OMEGAWATI, MUKLIS', 'SCHOOLBOOKS', '1545968781696359488-sdmi_5c78274cc83c71529579810___300x450.jpg'),
(7749, 'AL QUR`AN CORDOBA PERKATA A5 AL-IHSAN', 'CORDOBA INTERNATIONAL INDONESIA', 'RELIGION & SPIRITUALITY', 'download.jpg'),
(7750, 'KOMET MINOR', 'TERE LIYE', 'NOVELS', ''),
(7751, 'FILOSOFI TERAS', 'HENRY MANAMPIRING', 'SELF IMPROVEMENT', ''),
(7752, 'MARIPOSA', 'LULUK HF', 'NOVELS', ''),
(7753, 'PAKET DETIK-DETIK UNBK SMP/MTS TAHUN 2018/2019', 'UTI DARMAWATI, Y.BUDI ARTATI, PRASETYA ADHI WARDAN', 'SCHOOLBOOKS', ''),
(7754, 'KATA', 'RINTIK SEDU', 'NOVELS', ''),
(7755, 'MANTAPPU JIWA *BUKU LATIHAN SOAL', 'JEROME POLIN SIJABAT', 'NOVELS', ''),
(7756, 'GARIS WAKTU : SEBUAH PERJALANAN MENGHAPUS LUKA', 'FIERSA BESARI', 'NOVELS', ''),
(7757, 'PANDUAN RESMI TES CPNS CAT 2019/2020+CD', 'RADITYA PANJI UMBARA', 'REFERENCE', ''),
(7758, '11.11', 'FIERSA BERSARI', 'NOVELS', ''),
(7759, 'KISAH TANAH JAWA', '@KISAHTANAHJAWA', 'NOVELS', ''),
(7760, '##BUKU IQRO BESAR:(BUNDEL) KERTAS HVS', 'ASAD HUMAM', 'RELIGION & SPIRITUALITY', ''),
(7761, 'PERGI', 'TERE LIYE', 'NOVELS', ''),
(7762, 'AL-QURAN CORDOBA HAFALAN MUDAH MUSHAF TAHFIZ A5', 'PT CORDOBA INTERNATIONAL INDONESIA', 'RELIGION & SPIRITUALITY', ''),
(7763, 'AL QURAN CORDOBA PERKATA A4 AL-IHSAN', 'CORDOBA INTERNATIONAL INDONESIA', 'RELIGION & SPIRITUALITY', ''),
(7764, 'COOKING WITH LOVE ALA DAPUR MOMYCHAA', 'ICHA IRAWAN', 'FOOD & BEVERAGES', ''),
(7765, 'RICH DAD POOR DAD (EDISI REVISI)', 'ROBERT T. KIYOSAKI', 'BUSINESS & ECONOMICS', ''),
(7766, 'ALQURAN TAHFIZ JUNIOR', 'PT CORDOBA INTERNATIONAL INDONESIA', 'RELIGION & SPIRITUALITY', ''),
(7767, 'HOME COOKING ALA XANDERS KITCHEN: 100 RESEP HITS DI INSTAGR', 'JUNITA', 'FOOD & BEVERAGES', ''),
(7768, 'KONSPIRASI ALAM SEMESTA', 'FIERSA BESARI', 'NOVELS', ''),
(7769, 'NANTI KITA CERITA TENTANG HARI INI', 'MARCHELLA FP', 'SELF IMPROVEMENT', ''),
(7770, 'RAHASIA MAGNET REZEKI (EDISI REVISI)', 'NASRULLAH', 'SELF IMPROVEMENT', ''),
(7771, 'ORANG-ORANG BIASA', 'ANDREA HIRATA', 'NOVELS', ''),
(7772, 'BUMI MANUSIA', 'PRAMOEDYA ANANTA TOER', 'NOVELS', ''),
(7773, 'ALL NEW CPNS 2019/2020+CD', 'TIM GARUDA EDUKA', 'REFERENCE', ''),
(7774, 'SMP/MTS BEDAH KISI2 UN + USBN 2020 THE KING', 'FORUM TENTOR INDONESIA', 'SCHOOLBOOKS', ''),
(7775, 'HUJAN', 'TERE LIYE', 'NOVELS', ''),
(7776, 'KAMUS INGGRIS - INDONESIA EDISI YANG DIPERBARUI (HC)', 'JOHN M. ECHOLS & HASAN SHADILY', 'DICTIONARY', ''),
(7777, 'KISAH TANAH JAWA; JAGAT LELEMBUT', ' @KISAHTANAHJAWA & DAPOER TJERITA', 'NOVELS', ''),
(7778, 'JANGAN MEMBUAT MASALAH KECIL JADI MASALAH BESAR', 'RICHARD CARLSON', 'SELF IMPROVEMENT', ''),
(7779, 'JIKA KITA TAK PERNAH JATUH CINTA', 'ALVI SYAHRIN', 'SELF IMPROVEMENT', ''),
(7780, 'SENJA DAN PAGI', 'ALFFY REV', 'NOVELS', ''),
(7781, 'BEDAH KISI2 SBMPTN SAINTEK 2020 THE KING UTBK', 'FORUM TENTOR INDONESIA', 'SCHOOLBOOKS', ''),
(7782, 'SENJA.HUJAN & CERITA YANG TELAH USAI', 'BOY CANDRA', 'NOVELS', ''),
(7783, 'SAPIENS', 'YUVAL NOAH HARARI', 'SOCIAL SCIENCES', ''),
(7784, 'SD/MI BEDAH KISI2 USBN 2020  THE KING', 'FORUM TENTOR INDONESIA', 'SCHOOLBOOKS', ''),
(7785, 'OXFORD LEARNERS POCKET DICTIONARY,4/ED NEW EDT', 'OXFORD UNIVERSITY PRESS', 'DICTIONARY', ''),
(7786, 'HILANG', 'NAWANG NIDLO TITISARI', 'NOVELS', ''),
(7787, 'KAMUS INGGRIS - INDONESIA (SC)', 'JOHN M. ECHOLS & HASSAN SADILY', 'DICTIONARY', ''),
(7788, 'GOODBYE, THINGS: HIDUP MINIMALIS ALA ORANG JEPANG', ' FUMIO SASAKI', 'SELF IMPROVEMENT', ''),
(7789, 'MOMMYCLOPEDIA: TANYA-JAWAB TENTANG NUTRISI DI 1000 HARI PERT', 'DR. META HANINDITA', 'PARENTING & FAMILY', ''),
(7790, 'SENI BERBICARA KEPADA SIAPA SAJA, KAPAN SAJA, DAN DI MANA SA', ' LARRY KING DAN BILL GILBERT', 'SELF IMPROVEMENT', ''),
(7791, 'USTADZ ABDUL SOMAD MENJAWAB', 'H. ABDUL SOMAD LC., M.A.', 'RELIGION & SPIRITUALITY', ''),
(7792, 'KALA', 'STEFANI BELLA (HUJAN MIMPI), SYAHID MUHAMMAD (ELEF', 'NOVELS', ''),
(7793, 'SIMPLE & MOIST CAKE (SIMPEL DAN LEMBUT  MEMBUAT KUE)', '@TITIN RAYNER', 'FOOD & BEVERAGES', ''),
(7794, 'TERJEMAH JUZ AMMA EDISI TERLENGKAP', 'TIM REDAKSI', 'RELIGION & SPIRITUALITY', ''),
(7795, 'DISFORIA INERSIA', 'WIRA NAGARA', 'NOVELS', ''),
(7796, 'MENGUASAI IPS SISTEM KEBUT SEMALAM ED 6 REVISI', 'MUHAMMAD DODDY AB', 'SCHOOLBOOKS', ''),
(7797, 'MOMMYCLOPEDIA 567 FAKTA TENTANG MPASI', 'DR. META HANINDITA, SP.A(K)', 'PARENTING & FAMILY', ''),
(7798, 'TEMAN BERJUANG', 'INDRA SUGIARTO', 'SELF IMPROVEMENT', ''),
(7799, '##PULANG', 'TERE LIYE', 'NOVELS', ''),
(7800, 'DZIKIR PAGI PETANG DAN SESUDAH SHALAT FARDHU', 'YAZID BIN ABDUL QADIR JAWAS', 'RELIGION & SPIRITUALITY', ''),
(7801, 'MOZACHIKO', 'POPPI PERTIWI', 'NOVELS', ''),
(7802, 'RINDU', 'TERE LIYE', 'NOVELS', ''),
(7803, 'BK IQRO..MEMBACA AL QURAN (KECIL CD)', 'ASAD HUMAM', 'RELIGION & SPIRITUALITY', ''),
(7804, 'AL-QUR`AN HAFALAN CORDOBA AL-HAFIDZ A5: METODE 3 JAM HAFAL A', 'CORDOBA INTERNATIONAL INDONESIA', 'RELIGION & SPIRITUALITY', ''),
(7805, 'BEST SCORE TES CPNS CAT 2019-2020', '', 'REFERENCE', ''),
(7806, 'DETIK-DETIK UNBK BAHASA INDONESIA SMA/MA TAHUN 2018/2019', 'IKA SETYANINGSIH, MEITA SANDRA SANTHI', 'SCHOOLBOOKS', ''),
(7807, 'Belajar Keyboard otodidak', 'Septian', 'Musik', '8aec5326376f825300e5abaa74fd9f0d.jpg'),
(7808, 'Metode Praktis Belajar Gitar Otodidak', 'Yeyen Subiakto', 'Musik', 'metode-praktis-belajar-gitar-otodidak.jpg'),
(7809, 'Jurus Kilat Jago main Gitar Bass', 'Kusniar Deni Permana', 'Musik', 'jurus-kilat-jago-main-gitar-bass.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_petugas`
--

CREATE TABLE `tm_petugas` (
  `id_petugas` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tm_petugas`
--

INSERT INTO `tm_petugas` (`id_petugas`, `user`, `password`) VALUES
(98, 'sumadi', '12345'),
(100, 'admin', 'septi'),
(101, 'admin', 'admin'),
(102, 'septi', 'septi'),
(103, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_pengembalian`
--

CREATE TABLE `tp_pengembalian` (
  `id_transaksi` varchar(12) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` varchar(2) NOT NULL,
  `nominal` double NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tp_pengembalian`
--

INSERT INTO `tp_pengembalian` (`id_transaksi`, `tgl_pengembalian`, `denda`, `nominal`, `id_petugas`) VALUES
('20190411001', '2019-04-19', 'Y', 10000, 7),
('20190417004', '2019-04-19', 'N', 0, 7),
('20190411002', '2019-04-21', 'Y', 10000, 7),
('20200101005', '2020-01-09', 'Y', 10000, 0),
('20200101005', '2020-01-09', 'Y', 10000, 0),
('20190411003', '2020-01-09', 'N', 0, 0),
('20190411003', '2020-01-09', 'N', 0, 0),
('20200109006', '2020-01-09', 'N', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_tmp`
--

CREATE TABLE `tp_tmp` (
  `kode_buku` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tp_transaksi`
--

CREATE TABLE `tp_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kode_buku` varchar(5) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tp_transaksi`
--

INSERT INTO `tp_transaksi` (`id_transaksi`, `nis`, `kode_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_petugas`) VALUES
('20190411001', '121221', '7706', '2019-04-11', '2019-04-18', 'Y', 7),
('20190411001', '121221', '7723', '2019-04-11', '2019-04-18', 'Y', 7),
('20190411002', '121210', '7726', '2019-04-11', '2019-04-18', 'Y', 7),
('20190411003', '121217', '7706', '2019-04-11', '2019-04-18', 'Y', 7),
('20190411003', '121217', '7711', '2019-04-11', '2019-04-18', 'Y', 7),
('20190411003', '121217', '7715', '2019-04-11', '2019-04-18', 'Y', 7),
('20190417004', '121209', '7611', '2019-04-17', '2019-04-24', 'Y', 7),
('20200101005', '121215', '7611', '2020-01-01', '2020-01-08', 'N', 8),
('20200109006', '121210', '7788', '2020-01-09', '2020-01-16', 'Y', 0),
('20200109007', '121213', '7706', '2020-01-09', '2020-01-16', 'N', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tm_anggota`
--
ALTER TABLE `tm_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tm_buku`
--
ALTER TABLE `tm_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `tm_petugas`
--
ALTER TABLE `tm_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tm_anggota`
--
ALTER TABLE `tm_anggota`
  MODIFY `nis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121404;

--
-- AUTO_INCREMENT untuk tabel `tm_buku`
--
ALTER TABLE `tm_buku`
  MODIFY `kode_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7810;

--
-- AUTO_INCREMENT untuk tabel `tm_petugas`
--
ALTER TABLE `tm_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
