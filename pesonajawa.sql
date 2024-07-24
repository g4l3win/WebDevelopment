-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 02.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_a`
--

CREATE TABLE `berita_a` (
  `kodeberita` char(4) NOT NULL,
  `namaberita` varchar(200) NOT NULL,
  `ketberita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita_a`
--

INSERT INTO `berita_a` (`kodeberita`, `namaberita`, `ketberita`) VALUES
('aaaa', 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `kategoriKODE`) VALUES
('D101', 'Pantai Tanjung', 'wwww'),
('D102', 'Hutan rimbau', 'K101'),
('D103', 'Candi Sari', 'KW01'),
('D104', 'Pokemon Center', 'KW10'),
('dkas', 'Sukses edit', 'KW01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi_a`
--

CREATE TABLE `destinasi_a` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` char(50) NOT NULL,
  `destinasiKET` text NOT NULL,
  `destinasiFOTO` char(120) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinasi_a`
--

INSERT INTO `destinasi_a` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFOTO`, `kategoriKODE`) VALUES
('D101', 'Candi sari', 'Candi Sari, sebuah keajaiban arsitektur kuno di Yogyakarta, menawarkan perjalanan spiritual dan sejarah. Dibangun pada abad ke-8 Masehi, candi ini memikat pengunjung dengan kemegahan dan keindahan ornamen reliefnya. Tersembunyi di tengah hijaunya alam, Candi Sari menyajikan kesejukan spiritual dan kekayaan budaya. Dengan arsitektur yang mengagumkan, pengunjung dapat menjelajahi lorong-lorong yang mengungkapkan cerita zaman dulu. Keindahan seni ukir dan nuansa mistis menciptakan pengalaman yang memikat. Wisatawan dapat meresapi ketenangan di sekitar candi, menyaksikan matahari terbenam yang memukau, dan menggali kearifan masa lalu. Kunjungan ke Candi Sari adalah perjalanan waktu yang memukau dalam sejarah Jawa.', 'candisari1.jpg', 'K101'),
('D102', 'Candi Prambanan', 'Candi Prambanan, pesona arkeologi yang menjulang tinggi di tengah keindahan alam. Dibangun pada abad ke-9 Masehi, candi ini menawarkan panorama eksotis dan nuansa mistis. Dikelilingi oleh pepohonan rindang, Candi Tinggi menjadi saksi bisu kejayaan masa lalu. Keunikan arsitekturnya menciptakan pesona spiritual dan daya tarik bagi para pelancong. Dengan hamparan hijau yang melingkupi, pengunjung dapat menikmati keindahan alam sekitar dan meresapi ketenangan. Candi Tinggi mengundang perjalanan sejarah yang memikat, di mana setiap batu bersaksi tentang keelokan dan keagungan zaman dulu. Rasakan keajaiban budaya di setiap sudut Candi Tinggi, sebuah destinasi yang menggetarkan jiwa.', 'Legenda-Candi-Prambanan-dan-5-Mitosnya.jpg', 'KW01'),
('D103', 'Pantai indah', 'Pantai Indah merupakan WOIIIIII eksotis yang menyajikan keindahan alam tropis yang memukau. Dengan pasir putih lembut yang terhampar luas, air laut yang jernih, dan pepohonan hijau yang menambah pesona alam, Pantai Indah cocok menjadi tempat pelarian bagi para wisatawan yang mencari ketenangan. Suasana pantai yang tenang, ombak yang sejuk, dan panorama matahari terbenam yang memukau membuat setiap pengunjung terpesona. Tidak hanya sebagai tempat bersantai, Pantai Indah juga menawarkan beragam kegiatan seperti snorkeling, diving, atau sekadar menikmati keindahan panorama laut. Dengan keramahan penduduk lokal dan berbagai fasilitas pendukung, Pantai Indah menjadi destinasi sempurna untuk menghilangkan penat dan menikmati keajaiban alam yang memesona.', '5-pantai-terindah-di-dunia-nomor-2-dari-indonesia-pasirnya-berwarna-pink-memesona-8yc6FhgQhm.jpg', 'KW02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtravel`
--

CREATE TABLE `detailtravel` (
  `travelKODE` char(4) NOT NULL,
  `travelNAMA` varchar(50) NOT NULL,
  `travelKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailtravel`
--

INSERT INTO `detailtravel` (`travelKODE`, `travelNAMA`, `travelKET`) VALUES
('TR01', 'Open Trip', 'Banyak sekali layanan dari jasa travel yang menyediakan open trip ke destinasi wisata yang tengah naik daun, seperti misalnya Labuan Bajo, Lombok, Belitung, bahkan ke Raja Ampat Papua. Join open trip seru ke Candi Dieng! Nikmati keindahan alam pegunungan, eksplorasi budaya, dan suasana mistis Candi Arjuna. Pengalaman seru menanti dengan panorama alam yang menakjubkan. Ayo bergabung, jadikan liburanmu tak terlupakan!'),
('TR02', 'Solo Traveler', 'Aktivitas liburan tidaak harus melulu harus dilakukan secara bersama dengan orang-orang terdekat saja. Beberapa tahun belakangan ini, semakin banyak orang yang senang sekali menjadi seorang solo traveler. Bagi mereka bepergian ke kota atau pun negara lain'),
('TR03', 'Flocation', 'Kegiatan atau aktivitas mengisi liburan dengan cara menghabiskan waktu di atas sebuah kapal pesiar yang mewah nan ‘wah’, serta dengan beragam fasilitas yang sangat lengkap dan pastinya memadai ala hotel bintang lima. '),
('TR04', 'Wisata Belanja', 'mendapatkan barang-barang murah dan unik untuk meningkatkan pendapatan lokal'),
('TR05', 'wisata alam', 'Wisata alam adalah jenis liburan yang fokus pada eksplorasi alam, seperti gunung, pantai, dan hutan. Kegiatan yang sering dilakukan antara lain hiking, camping, dan snorkeling.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('K101', 'Mendut', 'candisari1.jpg', 'D101'),
('K102', 'FOTO baru lagi', 'IMG20231014180140-min.jpg', 'D101');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` char(160) NOT NULL,
  `hotelALAMAT` varchar(250) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelALAMAT`, `kategoriKODE`) VALUES
('H001', 'Hotel Shirogane', 'Jalan Black Lion no 1', 'K101'),
('H002', 'Hotel Kogane Keith', 'Kota Wisata Merah Utama', 'KW01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaoskaki`
--

CREATE TABLE `kaoskaki` (
  `kode` char(4) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kaoskaki`
--

INSERT INTO `kaoskaki` (`kode`, `nama`, `harga`, `keterangan`) VALUES
('KK01', 'Kaos kaki sekolah', 10000, 'kaos kaki untuk melengkapi seragam sekolah'),
('KK02', 'Kaos kaki kantoran', 8000, 'kaos kaki formal untuk tampil profesional saat berkarier'),
('KK03', 'Kaos kaki traveling', 15000, 'Kaos kaki nyaman untuk pengguna yang senang jalan jalan'),
('KK04', 'Kaos kaki Lutut', 7500, 'kaos kaki setinggi lutut warna hitam, putih dan krem'),
('KK05', 'Kaos kaki bayi', 4000, 'Kaos kaki motif lucu untuk bayi 6 bulan sampai 1 tahun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriwisata_a`
--

CREATE TABLE `kategoriwisata_a` (
  `kategorikode` char(4) NOT NULL,
  `kategorinama` varchar(20) NOT NULL,
  `kategoriket` varchar(200) NOT NULL,
  `kategoriref` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategoriwisata_a`
--

INSERT INTO `kategoriwisata_a` (`kategorikode`, `kategorinama`, `kategoriket`, `kategoriref`) VALUES
('K101', 'Hobi', 'wisata minat khusus secara umum dikenal sebagai produk wisata yang mengutamakan kualitas dan keberlanjutan. \"Tipologi dari jenis wisata minat khusus sangat berhubungan dengan hobi seseorang, komunitas', 'pamflet'),
('KW01', 'Wisata Budaya', 'Wisata budaya adalah jenis-jenis pariwisata yang pertama. Pariwisata jenis ini tidak kalah dengan pariwisata lainnya, bahkan sering dijadikan agenda untuk kunjungan dari sekolah-sekolah. Wisata budaya', 'website'),
('KW02', 'Wisata Pantai', 'Pantai Indah merupakan destinasi eksotis yang menyajikan keindahan alam tropis yang memukau. Dengan pasir putih lembut yang terhampar luas, air laut yang jernih, dan pepohonan hijau yang menambah peso', 'Pemerintah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `restoranKODE` char(4) NOT NULL,
  `restoranNAMA` varchar(50) NOT NULL,
  `restoranALAMAT` varchar(255) NOT NULL,
  `restoranFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`restoranKODE`, `restoranNAMA`, `restoranALAMAT`, `restoranFOTO`) VALUES
('RE01', 'Doubaches Cuisine', 'Jalan galaksi andromeda 2', 'restaurant-interior.jpg'),
('RE02', 'Cafe Quintessence', 'Jalan Istana Singa nomor 5', 'blur-coffee-shop.jpg'),
('RE12', 'COBA', 'AMIN 2', 'rice-noodles-bowl-curry-paste-with-chili-cucumber-long-bean-lime-garlic-spring-onion.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `souvenir`
--

CREATE TABLE `souvenir` (
  `souvenirKODE` char(4) NOT NULL,
  `souvenirNAMA` varchar(50) NOT NULL,
  `souvernirJENIS` varchar(255) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `souvenir`
--

INSERT INTO `souvenir` (`souvenirKODE`, `souvenirNAMA`, `souvernirJENIS`, `destinasiKODE`) VALUES
('OL01', 'gantungan kunci pidge', 'Pusat oleh-oleh gantungan kunci menyediakan koleksi unik dan kreatif. Pilihan ideal sebagai kenang-kenangan praktis dengan sentuhan lokal.', 'H001'),
('OL02', 'Sticker rover', 'Stiker unik dan kreatif sebagai oleh-oleh istimewa dari destinasi ini. Hadirkan keceriaan dengan stiker berkualitas tinggi yang memikat. Sempurna sebagai kenang-kenangan untuk melengkapi perjalanan Anda!', 'H001'),
('OL04', 'Knick knacks and snacks', 'Pernak Pernik untuk souvenir setelah berkunjung ke candi sari. menjual food ringan juga untuk di konsumsi pengunjung', 'H002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `travel`
--

CREATE TABLE `travel` (
  `fotodestinasiKODE` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fotodestinasiNAMA` char(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fotodestinasiFILE` char(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `destinasiKODE` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `travelKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `travel`
--

INSERT INTO `travel` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`, `travelKODE`) VALUES
('FO01', 'Foto travel Candi', 'Candi-Arjuna.jpg', 'D103', 'TR01'),
('FO02', 'Foto travel candi di Bali', 'landmark-camera-architecture-view-woman.jpg', 'D103', 'TR02'),
('FO05', 'Foto pantai dan laut', 'woman-walking-kelingking-beach-nusa-penida-island-bali-indonesia (1).jpg', 'D101', 'TR02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('U001', 'winni', 'gwinni@gmail.com', '22a3ebf98b7b3531d2456d52ca18d869');

-- --------------------------------------------------------

--
-- Struktur dari tabel `winni`
--

CREATE TABLE `winni` (
  `berita0002` char(11) NOT NULL,
  `beritaWinni` varchar(255) NOT NULL,
  `kategoriberita0002` char(255) NOT NULL,
  `event0002` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `winni`
--

INSERT INTO `winni` (`berita0002`, `beritaWinni`, `kategoriberita0002`, `event0002`) VALUES
('0002', 'Berita Edukatif', 'Cara baru liburan sambil belajar seputar sains yang seru, dijamin anti bosan, Sob! Disambut dengan area welcome zone, Sobat pesona bisa ajak keluarga untuk mencoba mobil listrik, motor listrik hingga teater 5 dimensi tentang ketenagalistrikan.', 'Friday'),
('825220002', 'Berita Liburan', 'Hore, libur telah tiba! Liburan memang paling asyik jika berkumpul bersama keluarga ataupun yang tersayang. Selain bisa melepas penat, liburan bersama orang tua, buah hati atau pasangan bisa jadi momen bounding yang pastinya seru banget. Tunggu apa lagi?', 'libur'),
('B001', 'Berita Kuliner Jakarta Populer', 'Hiburan kuliner menyenangkan untuk wisata pribadi ada keluarga Hingga saat ini, kuliner masih menjadi salah satu ikon wisata yang dapat menarik banyak wisatawan dalam dan luar negeri. Kuliner khas Indonesia disukai karena bervariasi, memiliki cita rasa', 'kuliner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `winnisetiawati`
--

CREATE TABLE `winnisetiawati` (
  `winniID` char(4) NOT NULL,
  `winniKOTA` varchar(200) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `winnisetiawati`
--

INSERT INTO `winnisetiawati` (`winniID`, `winniKOTA`, `destinasiKODE`) VALUES
('W001', 'Jakarta BARAT', 'D101'),
('W002', 'Semarang', 'D102');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_a`
--
ALTER TABLE `berita_a`
  ADD PRIMARY KEY (`kodeberita`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indeks untuk tabel `detailtravel`
--
ALTER TABLE `detailtravel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indeks untuk tabel `kaoskaki`
--
ALTER TABLE `kaoskaki`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `kategoriwisata_a`
--
ALTER TABLE `kategoriwisata_a`
  ADD PRIMARY KEY (`kategorikode`);

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`restoranKODE`);

--
-- Indeks untuk tabel `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`souvenirKODE`);

--
-- Indeks untuk tabel `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indeks untuk tabel `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);

--
-- Indeks untuk tabel `winni`
--
ALTER TABLE `winni`
  ADD PRIMARY KEY (`berita0002`);

--
-- Indeks untuk tabel `winnisetiawati`
--
ALTER TABLE `winnisetiawati`
  ADD PRIMARY KEY (`winniID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
