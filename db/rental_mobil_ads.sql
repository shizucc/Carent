-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2022 pada 06.10
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil_ads`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mobil`
--

CREATE TABLE `data_mobil` (
  `no_plat` varchar(8) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `transmisi` varchar(10) NOT NULL,
  `harga_sewa` int(7) NOT NULL,
  `kapasitas_penumpang` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mobil`
--

INSERT INTO `data_mobil` (`no_plat`, `merek`, `jenis`, `transmisi`, `harga_sewa`, `kapasitas_penumpang`, `foto`, `deskripsi`, `kondisi`) VALUES
('R1845AE', 'Honda Civic', 'MPV', 'Matic', 400000, 1, 'r1845ae_honda_civic.png', 'Mobil sedan matic yang mempermudah pengguna dalam menyetir mobil', 'ready'),
('R1890TU', 'Mitsubishi Pajero Sport', 'Hatchback', 'Manual', 700000, 4, 'r1890tu_mitsubishi_pajero_sport.png', 'Mobil Gagah', 'ready'),
('R2089WE', 'Suzuki Carry', 'Pick Up', 'Manual', 300000, 1, 'r2089we_suzuki_carry.png', 'Mobil ini sanggup mengangkut muatan seberat 1 ton dan telah disediakan 12 pengait yang ada di sekeliling bak untuk mengikatkan barang. Dengan radius putar 4,3 meter memudahkan sopir untuk berputar balik, parkir kendaraan dan bermanuver.', 'ready'),
('R2404ML', 'Honda HR-V ', 'SUV', 'Matic', 400000, 7, 'r2404ml_honda_hrv.png', 'HR_V dibekali ground clearance cukup tinggi, sehingga menawarkan fleksibilitas dan keamanan saat berkendara. Dengan volume bagasi hingga 453 liter, anda bisa dengan mudah memasukkan koper ukuran medium ke dalam bagasi.', 'ready'),
('R3090TX', 'Toyota Rush', 'SUV', 'Manual', 400000, 7, 'r3090tx_toyota_rush.png', 'Menggunakan Electronic Fuel Injection dengan tenaga maksimum sebesar 104 / 6,000 ps/rpm, mobil rush ini mampu menerjang beragam medan jalan, mulai dari jalanan perkotaan hingga jalanan dengan kondisi jalan yang kurang bagus.', 'ready'),
('R3990MR', 'Jeep Wrangler', 'Jeep', 'Manual', 600000, 4, 'r3990mr_jeep_wrangler.png', 'Fender depan yang lebih besar berdampak pada ruang yang memadai untuk travel roda ketika sedang bermanuver saat off-road. \r\nSudut kemiringan yang lebih besar juga membuatnya lebih aerodinamis dan efisien pada kecepatan tinggi.', 'ready'),
('R4130IO', 'BMW Series 3', 'Sedan', 'Matic', 500000, 5, 'r4130IO_bmw_series_3.png', 'Dibekali dengan mesin berkapasitas  2.0 liter, empat-silinder delapan percepatan Steptronic Sport yang menghasilkan output maksimum 258 daya kuda dengan konsumsi bahan bakarnya menyentuh 6,1 per 100 kilometer.', 'ready'),
('R4130IP', 'Honda Brio', 'Hatchback', 'Matic', 400000, 5, 'r4130_honda_brio.png', 'Menawarkan sensasi berkendara yang lincah sekaligus mudah ketika diajak bermanuver di tempat sempit. Tersedia  fitur keselamatan rem ABS+EBD dengan sepasang kantung udara. Dengan tenaga 90 hp dan torsi 110 Nm, lebih dari cukup untuk menghela bobot ringan baik di perkotaan atau ketika liburan bersama keluarga.', 'ready'),
('R4150TR', 'Toyota Calya  ', 'MPV', 'Manual ', 400000, 7, 'r450tr_toyota_calya.png', 'Dilengkapi dengan power window, pengaturan spion yang bisa dilipat elektrik, head unit layar sentuh, 2 buah airbag, Bluetooth, konektifitas iPhone, USB, AUX, sensor parkir mundur, dan rem ABS. Masih ada juga rem cakram depan, kursi ISOFIX, Side Impact Beam, kunci Immobilizer dan 7 buah sabuk pengaman untuk seluruh penumpang. ', 'ready'),
('R4150TY', 'Mitsubishi Lancer Evolution ', 'MPV', 'Manual', 550000, 5, 'r4150TR_mitsubishi_lancer_edition.png', 'Desain yang penuh kemewahan dilengkapi dengan sistem audio berukuran besar yang dapat memberikan kenikmatan tersendir saat berkendara.', 'Oli Kering'),
('R4523CS', 'Honda Mobilio ', 'MPV', 'Matic', 350000, 5, 'r4523cs_honda_mobilio.png', 'Dilengkapi dengan enam Premium Speakers, New Auto AIC, dan New Meter Cluster Design. Tidak lupa ada USB Connection dan Quick Charging (1.5A) yang akan memberikan kemudahan kepada penggunanya dalam mengisi ulang daya pada smartphonenya. Bagian setir pada mobil memiliki tombol audio control yang akan memudahkan pengemudi mengatur sistem audio tanpa perlu melepas setir kemudi.', 'Bemper lepas'),
('R4541NN', 'Jeep Gladiator Rubican', 'Jeep', 'Matic', 650000, 5, 'r4641NN_jeep_gladiator_rubican.png', 'Desain grill legendaris dari Jeep yang berpadu dengan sepasang headlight bulat dengan bohlam LED serta penggunaan overfender pada sepatbor depan dan belakang mempertegas aura macho dari mobil.', 'ready'),
('R4879HI', 'Toyota Hilux S-Cab', 'Pick Up', 'Manual', 350000, 4, 'r4879hi_toyota_hilux_s_cab.png', 'Dengan kapasitas bak sebesar 1.525 mm x 1.540 mm x 480 mm, mobil ini mampu menampung beban seberat 900kg. Dilengkapi dengan Ultrasonic Missacceleration Mitigation System (UMS) dan Forward Collision Mitigation System (FCM) yang apabila terjadi kesalahan injak pedal, maka secara otomatis akselerasi dibatalkan dan risiko celaka dapat dihindari.', 'ready'),
('R4910MK', 'Mitsubishi Xpander', 'MPV', 'Matic', 460000, 7, 'r4910mk_mitsubishi_xpander.png', 'Menggunakan head unit layar TFT baru berukuran 8 inci yang mengantongi teknologi touch screen, konektivitas smartphone, dan kemampuan baca format MP3 dan MP4.  Kursi baris ketiga yang bisa dilipat membuat kapasitas kargo semakin luas. Dilengkapi juga dengan 14 kompartemen penyimpanan yang tersebar di seluruh penjuru kabin dan power outlet pun tersedia di setiap baris.', 'ready'),
('R5346YR', 'Toyota Agya ', 'Hatchback', 'Matic', 350000, 5, 'r5346YR_toyota_agya.png', 'Dilengkapi dengan fitur head unit touchscreen yang bisa dimanfaatkan untuk memutar video dan juga Start & Stop Button \r\ndengan immobilizer yang hanya bisa diaktifkan oleh remote asli pabrikan.', 'ready'),
('R5804PO', 'Suzuki XL7 ', 'SUV', 'Matic', 400000, 5, 'r5804po_suzuki_xl7.png', 'Dilengkapi dengan Fitur Smart E-Mirror pada kaca spion tengah, bersumber dari kamera dan dapat digunakan untuk merekam. Hasil rekaman disimpan di dalam memori dan dapat ditayangkan di perangkat lain.', 'ready'),
('R6753DO', 'Toyota Alphard', 'MPV', 'Matic', 700000, 5, 'r6753do_toyota_alphard.png', ' Memiliki monitor LCD berukuran 13 inci. Terdapat pengaturan elektrik pada semua kursi yang memungkinkan kursi untuk disetel maju-mundur, ke samping atau saling berdekatan, termasuk pengaturan AC yang dapat di setel fungsinya sebagai pendingin atau penghangat. Bagasi yang tersedia cukup lega tanpa harus melipat kursi baris ketiga.', 'ready'),
('R8254GT', 'Mazda 2 ', 'Hatchback', 'Matic', 400000, 5, 'r8254gt_mazda_2.png', 'Dilengkapi dengan engine start/stop, setir dengan audio control dan Bluetooth hands free serta paddle shift. Terdapat pula head up display (HUD) untuk menambah kenyamanan berkendara. Selain itu juga mampu memutar radio, USB port, serta Bluetooth handsfree phone and audio capability dan reverse camera.', 'ready'),
('R8567ZX', 'Daihatsu Gran Max', 'Pick Up', 'Manual', 300000, 2, 'r8567zx_daihatsu_gran_max.png', 'Memiliki kapasitas bak sebesar 2.350 mm x 1.585 mm x 360 mm dengan daya angkut maksimum hingga 750kg. Dengan radius belok minimum 4,9 m membuat mobil ini mudah dikendarai di jalan yang sempit.', 'ready'),
('R9753BO', 'DFSK Supercab', 'Pick Up', 'Manual', 350000, 4, 'r9753_dfsk_supercab.png', 'Ukuran bak belakang memiliki panjang 2.310 mm, lebar 1.670 mm, tinggi 340 mm, dengan kapasitas daya angkut maksimum hingga 1,3 Ton. Tak hanya pintu bak belakang, pintu bak samping juga bisa dibuka secara penuh sehingga akses mengangkut maupun menurunkan barang bisa dilakukan dengan mudah dan cepat.', 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_tambahan`
--

CREATE TABLE `layanan_tambahan` (
  `id_layanan` varchar(5) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan_tambahan`
--

INSERT INTO `layanan_tambahan` (`id_layanan`, `nama_layanan`, `harga`) VALUES
('ADD00', 'None', 0),
('ADD01', 'Snack', 50000),
('ADD02', 'Bantal', 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` varchar(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `slot_servis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `username`, `slot_servis`) VALUES
('MKN001', 'yono', 3),
('MKN002', 'supri', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_user`
--

CREATE TABLE `pesanan_user` (
  `kode_pesanan` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `no_plat` varchar(8) NOT NULL,
  `jumlah_hari` int(2) NOT NULL,
  `tanggal_pesan` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_ambil` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_layanan` varchar(5) NOT NULL,
  `id_supir` varchar(6) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan_user`
--

INSERT INTO `pesanan_user` (`kode_pesanan`, `username`, `no_plat`, `jumlah_hari`, `tanggal_pesan`, `tanggal_ambil`, `tanggal_kembali`, `id_layanan`, `id_supir`, `harga`, `status`) VALUES
(9, 'tomo', 'R2404ML', 1, '2022-11-29 08:11:51', '2022-11-25', '0000-00-00', 'ADD01', '', 800000, 'Proses'),
(10, 'ningsih', 'R4130IO', 2, '2022-11-29 10:01:54', '2022-12-01', '2022-11-04', 'ADD00', '', 1000000, 'Proses'),
(11, 'albudi', 'R5804PO', 4, '2022-11-29 10:02:46', '2022-11-24', '2022-11-28', 'ADD02', '', 1600000, 'Selesai'),
(23, 'tomo', 'R2089WE', 3, '2022-11-30 09:34:11', '2022-11-25', '2022-11-28', 'ADD02', 'SUP001', 1200000, 'Menunggu'),
(24, 'tomo', 'R1845AE', 2, '2022-11-30 09:35:50', '2022-12-01', '2022-12-03', 'ADD00', '', 1200000, 'Menunggu'),
(25, 'albudi', 'R2089WE', 1, '2022-11-30 09:52:44', '2022-12-02', '2022-12-03', 'ADD00', '', 600000, 'Menunggu'),
(26, 'albudi', 'R2404ML', 4, '2022-11-30 09:54:29', '2022-12-03', '2022-12-07', 'ADD00', '', 1900000, 'Menunggu'),
(27, 'albudi', 'R2404ML', 4, '2022-11-30 09:54:56', '2022-12-03', '2022-12-07', 'ADD00', '', 1900000, 'Menunggu'),
(28, 'ningsih', 'R6753DO', 1, '2022-11-30 11:35:46', '2022-12-10', '2022-12-11', 'ADD01', 'SUP002', 1400000, 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis_mobil`
--

CREATE TABLE `servis_mobil` (
  `id_servis` int(11) NOT NULL,
  `tanggal_masuk_servis` date NOT NULL DEFAULT current_timestamp(),
  `no_plat` varchar(8) NOT NULL,
  `kondisi` text NOT NULL,
  `id_mekanik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servis_mobil`
--

INSERT INTO `servis_mobil` (`id_servis`, `tanggal_masuk_servis`, `no_plat`, `kondisi`, `id_mekanik`) VALUES
(9, '2022-11-30', 'R4523CS', 'Bemper lepas', 'MKN002'),
(10, '2022-11-30', 'R4150TY', 'Oli Kering', 'MKN002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id_supir` varchar(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `username`, `status`) VALUES
('SUP001', 'anto', 'bertugas'),
('SUP002', 'bejoo', 'bertugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ig_acc` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_ktp` varchar(300) NOT NULL,
  `foto_sim` varchar(300) NOT NULL,
  `role` varchar(10) NOT NULL,
  `foto_profil` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `username`, `password`, `email`, `ig_acc`, `no_hp`, `foto_ktp`, `foto_sim`, `role`, `foto_profil`) VALUES
('Albudi', 'albudi', 'budi1234', 'albudii@gmail.com', '@albudii', '089123456722', 'albudi-ktp.jpg', 'albudi-sim.png', 'user', 'Character_Albedo_Card.png'),
('Alfi', 'alfighozwy', 'aruvi123', 'alfi@gmail.com', '@alfi_ghozwy', '085987654321', '', '', 'owner', ''),
('Anto', 'anto', 'anto1234', 'anto@gmail.com', '@anto_', '085122356789', '', '', 'supir', ''),
('Bejo', 'bejoo', 'bejo1234', 'bejo@gmail.com', '@bee_jo', '085121256789', '', '', 'supir', ''),
('Kokomi', 'kokom', 'kokom123', 'kokom@gmail.com', '@kokomii', '089123456789', 'blanko_ktp.jpg', '63423cf434da3.jpeg', 'manager', ''),
('Mimi', 'mi_mi', 'mimi1234', 'mimi@gmail.com', '@mi2', '085125456789', '', '', 'sales', ''),
('Ningsih', 'ningsih', 'ningsih123', 'ningsih@gmail.com', '@ningning', '089123453421', 'ningsih-ktp.jpg', 'ningsih-sim.png', 'user', 'genshin-impact-ningguang-build-best.png'),
('Supri', 'supri', 'supri1234', 'supri@gmail.com', '@sup_ri', '085123442789', '', '', 'mekanik', ''),
('Tomo', 'tomo', 'tomo1234', 'tomo@gmail.com', '@tom', '089123453212', 'tomo-ktp.jpg', 'tomo-sim.png', 'user', 'tomo-profil.png'),
('Yono', 'yono', 'yono1234', 'yono@gmail.com', '@yonoo', '085987614321', '', '', 'mekanik', ''),
('Yudith', 'yunic', 'yunic123', 'yunic@gmail.com', '@yunic.io', '085123456189', '', '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indeks untuk tabel `layanan_tambahan`
--
ALTER TABLE `layanan_tambahan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `pesanan_user`
--
ALTER TABLE `pesanan_user`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `username` (`username`),
  ADD KEY `no_plat` (`no_plat`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `servis_mobil`
--
ALTER TABLE `servis_mobil`
  ADD PRIMARY KEY (`id_servis`),
  ADD KEY `no_plat` (`no_plat`),
  ADD KEY `id_mekanik` (`id_mekanik`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan_user`
--
ALTER TABLE `pesanan_user`
  MODIFY `kode_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `servis_mobil`
--
ALTER TABLE `servis_mobil`
  MODIFY `id_servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD CONSTRAINT `mekanik_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Ketidakleluasaan untuk tabel `pesanan_user`
--
ALTER TABLE `pesanan_user`
  ADD CONSTRAINT `pesanan_user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `pesanan_user_ibfk_2` FOREIGN KEY (`no_plat`) REFERENCES `data_mobil` (`no_plat`),
  ADD CONSTRAINT `pesanan_user_ibfk_3` FOREIGN KEY (`id_layanan`) REFERENCES `layanan_tambahan` (`id_layanan`);

--
-- Ketidakleluasaan untuk tabel `servis_mobil`
--
ALTER TABLE `servis_mobil`
  ADD CONSTRAINT `servis_mobil_ibfk_1` FOREIGN KEY (`no_plat`) REFERENCES `data_mobil` (`no_plat`),
  ADD CONSTRAINT `servis_mobil_ibfk_2` FOREIGN KEY (`id_mekanik`) REFERENCES `mekanik` (`id_mekanik`);

--
-- Ketidakleluasaan untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD CONSTRAINT `supir_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
