#
# TABLE STRUCTURE FOR: tb_kelas
#

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `id_pendidik` varchar(50) NOT NULL,
  `tingkat_kelas` varchar(100) NOT NULL,
  `jurusan_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kapasitas_kelas` varchar(10) NOT NULL,
  `created_kelas` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_kelas` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_pendidik` (`id_pendidik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_kelas` (`id_kelas`, `id_pendidik`, `tingkat_kelas`, `jurusan_kelas`, `nama_kelas`, `kapasitas_kelas`, `created_kelas`, `updated_kelas`) VALUES ('96189631245427570040720', '4267479286315813', 'X', 'IPS', '1', '42', '2020-07-04 11:21:35', '2020-07-04 00:00:00');
INSERT INTO `tb_kelas` (`id_kelas`, `id_pendidik`, `tingkat_kelas`, `jurusan_kelas`, `nama_kelas`, `kapasitas_kelas`, `created_kelas`, `updated_kelas`) VALUES ('98792006448316416', '2356199132478754', 'X', 'IPA', '1', '10', '2020-06-30 15:26:54', '2020-07-07 00:00:00');


#
# TABLE STRUCTURE FOR: tb_pendidik
#

DROP TABLE IF EXISTS `tb_pendidik`;

CREATE TABLE `tb_pendidik` (
  `id_pendidik` varchar(50) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `nip_pendidik` varchar(258) NOT NULL,
  `nama_pendidik` varchar(258) NOT NULL,
  `tempat_lahir_pendidik` varchar(258) NOT NULL,
  `tanggal_lahir_pendidik` date NOT NULL,
  `pendidikan_terakhir` varchar(258) NOT NULL,
  `gender_pendidik` varchar(1) NOT NULL,
  `status_pendidik` varchar(1) NOT NULL,
  `alamat_pendidik` text NOT NULL,
  `image_pendidik` varchar(258) NOT NULL,
  `created_pendidik` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_pendidik` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pendidik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_pendidik` (`id_pendidik`, `id_user`, `nip_pendidik`, `nama_pendidik`, `tempat_lahir_pendidik`, `tanggal_lahir_pendidik`, `pendidikan_terakhir`, `gender_pendidik`, `status_pendidik`, `alamat_pendidik`, `image_pendidik`, `created_pendidik`, `updated_pendidik`) VALUES ('4528916836274157', '314579-140720-bPcdBy', '19781208199912081012', 'Muhammad Nashir AL, S.Pd., M.Cs', 'Bantul', '1978-12-08', 'S1 Universitas Indonesia <br>\r\nS2 Universitas Utara Malaysia ', 'L', '1', 'Jl. Lintas Sel., Patihan, Gadingsari, Sanden, Bantul, Daerah Istimewa Yogyakarta 55763', '', '2020-07-14 11:34:28', NULL);


#
# TABLE STRUCTURE FOR: tb_sekolah
#

DROP TABLE IF EXISTS `tb_sekolah`;

CREATE TABLE `tb_sekolah` (
  `id_sekolah` varchar(50) NOT NULL,
  `nama_sekolah` varchar(258) NOT NULL,
  `npsn_sekolah` varchar(100) NOT NULL,
  `kepala_sekolah` varchar(258) NOT NULL,
  `bentuk_pendidikan` varchar(500) NOT NULL,
  `akreditasi_sekolah` varchar(20) NOT NULL,
  `status_sekolah` text NOT NULL,
  `instansi_pemerintah` varchar(258) NOT NULL,
  `status_kepemilikan` text NOT NULL,
  `sk_pendirian` varchar(100) NOT NULL,
  `sk_operasional` varchar(100) NOT NULL,
  `waktu_penyelenggaraan` varchar(258) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kel_sekolah` varchar(258) NOT NULL,
  `kec_sekolah` varchar(258) NOT NULL,
  `kab_sekolah` varchar(258) NOT NULL,
  `prov_sekolah` varchar(258) NOT NULL,
  `ta_sekolah` varchar(100) NOT NULL,
  `logo_sekolah` varchar(258) NOT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`, `npsn_sekolah`, `kepala_sekolah`, `bentuk_pendidikan`, `akreditasi_sekolah`, `status_sekolah`, `instansi_pemerintah`, `status_kepemilikan`, `sk_pendirian`, `sk_operasional`, `waktu_penyelenggaraan`, `alamat_sekolah`, `kel_sekolah`, `kec_sekolah`, `kab_sekolah`, `prov_sekolah`, `ta_sekolah`, `logo_sekolah`) VALUES ('98697813436661760', 'SMA Negeri 8 Yogyakarta', '19341867194519901245', 'Mustajaf Muhammad, M.Pd', 'SMA', 'A', 'Negeri', 'Dinas Pendidikan Provinsi Yogyakarta', 'Pemerintah Daerah', '94054/ 00 / 9944', '11054/ 00 / 9944', 'Pagi s.d. Siang (07.30 - 14.00)', 'Jl. HOS Cokroaminoto No.10, Pakuncen, Wirobrajan, Kota Yogyakarta 55253', 'Pakuncen', 'Wirobrajan', 'Yogyakarta', 'Yogyakarta', '2018/2019 - Ganjil', 'sekolah_20200716.png');


#
# TABLE STRUCTURE FOR: tb_sekolah_struktur
#

DROP TABLE IF EXISTS `tb_sekolah_struktur`;

CREATE TABLE `tb_sekolah_struktur` (
  `id_struktur` varchar(50) NOT NULL,
  `jabatan_struktur` varchar(258) NOT NULL,
  `nama_pejabat` varchar(258) NOT NULL,
  `nip_pejabat` varchar(50) NOT NULL,
  `image_pejabat` varchar(258) NOT NULL,
  `batas_jabatan` date NOT NULL,
  `tingkat_prioritas` varchar(1) NOT NULL,
  `created_jabatan` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_struktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_sekolah_struktur` (`id_struktur`, `jabatan_struktur`, `nama_pejabat`, `nip_pejabat`, `image_pejabat`, `batas_jabatan`, `tingkat_prioritas`, `created_jabatan`) VALUES ('34aa854011b8de61e8995cfa0b83c67a140620', 'Wk. Bidang Kesiswaan', 'Muhatir Muhammad S, M.Pd', '19841001200112251120', 'pejabat_150720202.jpg', '2024-06-20', '3', '2020-06-14 17:25:07');
INSERT INTO `tb_sekolah_struktur` (`id_struktur`, `jabatan_struktur`, `nama_pejabat`, `nip_pejabat`, `image_pejabat`, `batas_jabatan`, `tingkat_prioritas`, `created_jabatan`) VALUES ('598cd324160a42806785c7a2dd5eda4c140620', 'Kepala Tata Usaha', 'Alrazaq Mauquf, S.Pd, M.Kom', '19811001200112251110', 'pejabat_150720203.jpg', '2022-06-14', '5', '2020-06-14 17:53:49');
INSERT INTO `tb_sekolah_struktur` (`id_struktur`, `jabatan_struktur`, `nama_pejabat`, `nip_pejabat`, `image_pejabat`, `batas_jabatan`, `tingkat_prioritas`, `created_jabatan`) VALUES ('98768548679122944', 'Kepala Sekolah', 'Prof.(HC). Ervin Fikot M,  Ph.D', '19990714 20050714 1210', 'pejabat_15072020.jpg', '2030-07-14', '1', '2020-06-14 10:18:12');
INSERT INTO `tb_sekolah_struktur` (`id_struktur`, `jabatan_struktur`, `nama_pejabat`, `nip_pejabat`, `image_pejabat`, `batas_jabatan`, `tingkat_prioritas`, `created_jabatan`) VALUES ('98768548679122945', 'Wk. Bidang Akademik', 'Mawon Mirza Mahmud, M.Pd', '19900114 19991210 1110', 'pejabat_150720201.jpg', '2024-11-07', '2', '2020-06-14 10:19:52');
INSERT INTO `tb_sekolah_struktur` (`id_struktur`, `jabatan_struktur`, `nama_pejabat`, `nip_pejabat`, `image_pejabat`, `batas_jabatan`, `tingkat_prioritas`, `created_jabatan`) VALUES ('cee13e18a10fe26430229f2350e63fc2150720', 'Ketua Komite', 'Ir. Joko Widodo', '1', 'pejabat_150720205.jpg', '2025-12-31', '0', '2020-07-15 14:40:08');
INSERT INTO `tb_sekolah_struktur` (`id_struktur`, `jabatan_struktur`, `nama_pejabat`, `nip_pejabat`, `image_pejabat`, `batas_jabatan`, `tingkat_prioritas`, `created_jabatan`) VALUES ('d68498a62d6f50269a39c540f18fdb01150720', 'Wk. Bidang Sarana Prasarana', 'Basuki Brihad, M.Pd., Ph.D', '1962081219850812101', 'pejabat_150720204.jpg', '2025-08-12', '4', '2020-07-15 14:36:42');


#
# TABLE STRUCTURE FOR: tb_sistem
#

DROP TABLE IF EXISTS `tb_sistem`;

CREATE TABLE `tb_sistem` (
  `id_sistem` varchar(50) NOT NULL,
  `maintenance_mode` int(1) NOT NULL,
  `turn_off_mode` int(1) NOT NULL,
  `tokens_sistem` varchar(50) DEFAULT NULL,
  `updated_sistem` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sistem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_sistem` (`id_sistem`, `maintenance_mode`, `turn_off_mode`, `tokens_sistem`, `updated_sistem`) VALUES ('d19bfa9d-c7f0-11ea-a746-406186cd10d5', 0, 0, NULL, '2020-07-17 12:45:51');


#
# TABLE STRUCTURE FOR: tb_siswa
#

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(50) NOT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `id_kelas` varchar(50) DEFAULT NULL,
  `nisn_siswa` varchar(50) NOT NULL,
  `nama_siswa` varchar(258) NOT NULL,
  `tempat_lahir_siswa` varchar(258) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `gender_siswa` varchar(10) NOT NULL,
  `status_siswa` varchar(258) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `nik_siswa` varchar(25) NOT NULL,
  `nama_ayah` varchar(258) NOT NULL,
  `nama_ibu` varchar(258) NOT NULL,
  `image_siswa` varchar(258) NOT NULL,
  `created_siswa` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_siswa` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('172428749138765934260270620', NULL, NULL, '1900020124', 'Muhammad Sahranie Lido', 'Batang', '2000-01-25', 'L', '2', 'jl. batang kepulauan riau', '', '', '', '', '2020-06-27 17:02:09', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('343985511249561272960250620', NULL, '96189631245427570040720', '1600018006', 'Heddi Jarvis', 'Nduga', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('456381277439963156150250620', NULL, '96189631245427570040720', '1600018002', 'Deon Dermot Damar', 'Mubai', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('518614393926698275570250620', NULL, '98792006448316416', '1600018001', 'Aarav Abian', 'Sampang', '2000-12-12', 'L', '1', '', '1507021404990001', 'Sutarman Hadi', 'Sumiati Martiah', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('582841549234636719670250620', NULL, '96189631245427570040720', '1600018005', 'Frey Garry More', 'Rote', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('654845839925146719720250620', NULL, '98792006448316416', '1600018007', 'Pedro Oliver', 'Irian', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('715265689883934341150250620', '64721598150720024333', '98792006448316416', '1600018009', 'Uri Waymant Santoso', 'Wates', '0000-00-00', 'L', '3', '', '', '', '', '1600018009160720.jpg', '2020-06-25 09:57:45', '2020-07-16 20:18:36');
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('723595641439618125230270620', NULL, NULL, '1900020123', 'Selsha Maulidya Hamri', 'Lempayak', '2000-06-26', 'P', '2', '-', '', '', '', '', '2020-06-27 17:02:09', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('729846157415186227430250620', NULL, '96189631245427570040720', '1600018010', 'Hilton Mutarani Hamid', 'Sleman', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('784222678998941575360270620', NULL, NULL, '1900020125', 'Heldi Mersyah', 'Benteng', '1999-12-18', 'L', '1', 'jl. raya benteng makmur bengkulu', '', '', '', '', '2020-06-27 17:02:09', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('815812493761365542390250620', NULL, '98792006448316416', '1600018004', 'Brandon Carel ', 'Merauke', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('845734613718129794520250620', NULL, '98792006448316416', '1600018003', 'Cakra Brian Buana', 'Sadei Amen', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('883544765314721997530250620', NULL, '98792006448316416', '1600018008', 'Rafael Safwan Falda', 'Gunung Kidul', '0000-00-00', 'L', '1', '', '', '', '', '', '2020-06-25 09:57:45', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-0a488e541191705e527a4e6806298349', '4975486619160720', NULL, '1700018126', 'Saputro Karuno Widodo Putro', 'Samarinda', '2001-07-15', 'L', '1', '', '', '', '', '1700018126160720.png', '2020-04-30 16:34:35', '2020-07-16 23:51:13');
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-0b95c6f829467b335336574456e6191a', NULL, NULL, '1700018106', 'Fizha Novaridha', 'Makassar', '2001-04-23', 'P', '3', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-155c31f5497b9a62b729078e058ded01', NULL, NULL, '1700018104', 'Dendi Perdana Putra', 'Palembang', '2000-01-29', 'L', '2', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-1a30bbc3a0ce5c84ebdd8a25ef3b261f', '7842953692170720', NULL, '1700018128', 'Melyana Syahranie Melanie', 'Makassar', '2001-04-23', 'P', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-1c349716c0e1b1468ab4958477012f0a', NULL, NULL, '1700018114', 'Deri Wahyudi', 'Palembang', '2001-11-11', 'L', '2', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-411471be82ffd7e2d10e62fcd6686274', NULL, NULL, '1700018110', 'Jaza Bahkama Putra', 'Metro', '2001-11-30', 'L', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-5382aa7c3c1d3396168e09c320693c7a', '3844939122170720', NULL, '1700018122', 'Karan Lagola', 'Cilacap', '2001-06-12', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-5f3d6876d09a2391dd2faf885321b96d', NULL, NULL, '1700018739', 'Muhhammad Revi Renanda', 'Lebong', '2002-02-01', 'L', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-5f6c50c6d2711f40054a5825ff2db402', NULL, NULL, '1700018113', 'Esha Marlinda', 'Medan', '2001-10-25', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-6ebe68e4eb198baa9836f9e28dc63155', NULL, NULL, '1700018111', 'Hana Anisa Putri', 'Muara Kelaban', '2000-08-15', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-79cddf5d5a68b8c4a21bb68d9c814a7d', '6271841996170720', NULL, '1700018121', 'Humairah Sabrina Putri', 'Lampung', '2020-06-22', 'P', '2', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-7e68a142bb6c2dbda51badbb1da8e7c1', NULL, NULL, '1700018102', 'Burhan Sulistyo', 'Padang Jaya', '2001-02-18', 'L', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-8106cd03c0d08f39b35eda464278ddef', NULL, '98792006448316416', '1700018118', 'Muhammad Iqbal', 'Cilacap', '2001-06-12', 'P', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-89a3099229f52b5e9abbfd9d2fff4173', NULL, NULL, '1700018103', 'Chaerul Mukti', 'Medan', '2001-09-25', 'L', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-8bb10586392216942a0376997ced0f6a', '1269832379170720', '98792006448316416', '1700018124', 'Putri Pratiwi', 'Aceh Besar', '2000-09-12', 'P', '1', '-', '175716781575', '-', '-', '1700018124170720.jpg', '2020-04-30 16:34:35', '2020-07-17 00:41:02');
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-8e1928daa70891b8f76e71b3a1f1e124', NULL, NULL, '1700018109', 'Ilham Mahmud', 'Aceh Besar', '2000-09-12', 'L', '3', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-90eee5a7c70f6e8866c0c59b1352fd47', NULL, NULL, '1700018107', 'Gigi Putri Pratiwi', 'Gorontalo', '2000-09-28', 'P', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-93166065584af9e5cd4f22b8253b467b', NULL, NULL, '1700018117', 'Muhammad Khairunnas', 'Gorontalo', '2000-10-28', 'P', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-9aff9ea18ae0876cb0a983bbd9502810', '9568144387170720', NULL, '1700018120', 'Yori Hayan Dafa', 'Metro', '2001-11-30', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-9f5c3bf02cc008d9a31f3926581208e5', NULL, NULL, '1700018115', 'Deni Prayogi', 'Samarinda', '2001-07-15', 'P', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-a246b996f48a6929c60b5968bef6376c', '4789553243170720', NULL, '1700018129', 'Sando Widodo Putro', 'Cilacap', '2001-06-12', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-a60bc07656e8ed102425305362146910', NULL, '98792006448316416', '1700018116', 'Ilham Akbar', 'Makassar', '2001-04-23', 'P', '3', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-b282a9db70960e4a8500635948657cdf', '5261846752170720', NULL, '1700018125', 'Delvano Putra Wijayo', 'Palembang', '2001-11-11', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-b9b21e17bbff03ff54f246df8c8b0722', NULL, NULL, '1700018119', 'Rofika Gulyano', 'Aceh Besar', '2000-10-12', 'L', '3', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-bac10e2e063273cc55da27c9aa829326', NULL, NULL, '1700018108', 'Hanifah Sabhati', 'Cilacap', '2000-06-12', 'P', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-be43f1c71d482f12268127d735a41a70', NULL, NULL, '1700018112', 'Sabrina Latumala', 'Padang Jaya', '2001-02-18', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-d026650bcacf6f83e6813b10869f707a', '57236819160720071404', NULL, '1700018130', 'Rano Karno Saputro', 'Gorontalo', '2000-09-28', 'L', '1', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-f00e2128ff87527b295256dac84fad02', NULL, NULL, '1700018105', 'Elzha Saputri', 'Samarinda', '2001-07-15', 'P', '1', '', '', '', '', '', '2020-04-30 14:42:28', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-f1785056141c3036f18ade3ababc2916', NULL, NULL, '1700018123', 'Deviani Saputri', 'Makassar', '2001-04-23', 'P', '2', '', '', '', '', '', '2020-04-30 16:34:35', NULL);
INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `id_kelas`, `nisn_siswa`, `nama_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `gender_siswa`, `status_siswa`, `alamat_siswa`, `nik_siswa`, `nama_ayah`, `nama_ibu`, `image_siswa`, `created_siswa`, `updated_siswa`) VALUES ('siswa-f4f4c80869410bef39dcec3151b0d248', '98573462140720111326', NULL, '1700018127', 'Umu Habibah', 'Gorontalo', '2000-10-28', 'P', '1', 'Jogjatronik, Prawirodirjan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta', '1903011708920002', 'Darmudji Wahid Hasyim, S.Pd., M.Si', 'Usmiati Mursalin, S.Psi', '1700018127160720.png', '2020-04-30 16:34:35', '2020-07-16 22:56:09');


#
# TABLE STRUCTURE FOR: tb_tahun_ajaran
#

DROP TABLE IF EXISTS `tb_tahun_ajaran`;

CREATE TABLE `tb_tahun_ajaran` (
  `id_ta` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(258) NOT NULL,
  `semester_ta` varchar(50) NOT NULL,
  `mulai_ta` date NOT NULL,
  `selesai_ta` date NOT NULL,
  `status_ta` varchar(1) NOT NULL,
  `created_ta` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_ta` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_tahun_ajaran` (`id_ta`, `tahun_ajaran`, `semester_ta`, `mulai_ta`, `selesai_ta`, `status_ta`, `created_ta`, `updated_ta`) VALUES ('9532418676', '2018/2019', 'Ganjil', '2018-08-04', '2019-07-06', '1', '2020-07-16 14:49:32', '2020-07-16 15:03:30');
INSERT INTO `tb_tahun_ajaran` (`id_ta`, `tahun_ajaran`, `semester_ta`, `mulai_ta`, `selesai_ta`, `status_ta`, `created_ta`, `updated_ta`) VALUES ('98814357122580480', '2019/2020', 'Genap', '2020-01-01', '2020-06-30', '0', '2020-07-16 02:18:07', '2020-07-16 15:03:20');


#
# TABLE STRUCTURE FOR: tb_user
#

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `email_user` varchar(258) NOT NULL,
  `username_user` varchar(258) NOT NULL,
  `password_user` varchar(258) NOT NULL,
  `role_user` int(1) NOT NULL,
  `status_user` int(1) NOT NULL,
  `created_user` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('1269832379170720', 'pp.try@gmail.com', '1700018124', '4b2d228b959c6e48f7664f22b1cb7c51041ca1f2', 2, 1, '2020-07-17 00:30:16', '2020-07-17 00:41:02');
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('314579-140720-bPcdBy', '', '19781208199912081012', 'ba3e8c12b9cca92ed982d2e84eecba8484c0e88d', 1, 1, '2020-07-14 11:34:28', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('3844939122170720', '122.try@gmail.com', '1700018122', '95ad5005d9eff98bcdd01515040d36c5db64225d', 2, 1, '2020-07-17 00:32:33', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('4789553243170720', '129.try@gmail.com', '1700018129', '75545fcfa025f68099ea693b14c7387c3d999bc0', 2, 1, '2020-07-17 00:31:21', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('4975486619160720', 'try.126@gmail.com', '1700018126', 'c7547406dab9a2fc6da445fa5272a5af57aff4c8', 2, 1, '2020-07-16 23:48:50', '2020-07-16 23:51:13');
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('5261846752170720', '125.try@gmail.com', '1700018125', 'e2e63bf540c268eb7ef784434a13d53b7948167e', 2, 1, '2020-07-17 00:30:01', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('57236819160720071404', 'ervinfm15@gmail.com', '1700018130', 'b730eca9c3b81b4960af7a91198606be6a5e4451', 2, 0, '2020-07-16 19:14:10', '2020-07-17 00:16:25');
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('6271841996170720', '121.try@gmail.com', '1700018121', '8f96f928b9cfe27d3c684c23fbcd7808296cfd39', 2, 1, '2020-07-17 00:29:43', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('64721598150720024333', 'ervin1700018127@webmail.uad.ac.id', '1600018009', '38ea616cd957749b281a28babe9b08fa0d662e29', 2, 1, '2020-07-15 14:43:38', '2020-07-16 20:18:36');
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('7842953692170720', '128.try@gmail.com', '1700018128', 'b85293de8f7e361f5e17f95f10bc9abdd7f54470', 2, 1, '2020-07-17 00:31:02', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('9568144387170720', '120.try@gmail.com', '1700018120', '36253556ae042df7e4a8612bd8b5b6c6a6f5f630', 2, 1, '2020-07-17 00:30:41', NULL);
INSERT INTO `tb_user` (`id_user`, `email_user`, `username_user`, `password_user`, `role_user`, `status_user`, `created_user`, `updated_user`) VALUES ('98573462140720111326', 'ervinfm14@gmail.com', '1700018127', '9933525c17315ba7fa78b31b41fb9500cf94b4af', 2, 1, '2020-07-14 11:13:30', '2020-07-16 22:56:09');


#
# TABLE STRUCTURE FOR: tb_user_admin
#

DROP TABLE IF EXISTS `tb_user_admin`;

CREATE TABLE `tb_user_admin` (
  `id_user_admin` varchar(50) NOT NULL,
  `role_user_admin` int(1) NOT NULL,
  `status_user_admin` int(1) NOT NULL,
  `username_user_admin` varchar(258) NOT NULL,
  `password_user_admin` varchar(258) NOT NULL,
  `nama_depan_user_admin` varchar(100) NOT NULL,
  `nama_belakang_user_admin` varchar(100) NOT NULL,
  `email_user_admin` varchar(258) NOT NULL,
  `tempat_lahir_admin` text NOT NULL,
  `tanggal_lahir_admin` date NOT NULL,
  `telepon_admin` varchar(20) NOT NULL,
  `gender_admin` varchar(1) NOT NULL,
  `alamat_admin` text NOT NULL,
  `image_user_admin` varchar(258) NOT NULL,
  `created_user_admin` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user_admin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_admin`),
  UNIQUE KEY `email_user_admin` (`email_user_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_user_admin` (`id_user_admin`, `role_user_admin`, `status_user_admin`, `username_user_admin`, `password_user_admin`, `nama_depan_user_admin`, `nama_belakang_user_admin`, `email_user_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `telepon_admin`, `gender_admin`, `alamat_admin`, `image_user_admin`, `created_user_admin`, `updated_user_admin`) VALUES ('98756888497225728', 1, 1, '1', '356a192b7913b04c54574d18c28d46e6395428ab', 'Dadang', 'Sutrisna S.Kom', 'ervinfm14@gmail.com', 'Muara Aman', '1999-07-14', '081367100643', 'l', 'Jl. Citra Kelurahan Pasar Muara Aman, Kecamatan Lebong Utara, Kabupaten Lebong, Bengkulu', 'admin_OPywDs4RG5ao.png', '2020-06-06 18:02:41', '2020-07-17 00:17:33');
INSERT INTO `tb_user_admin` (`id_user_admin`, `role_user_admin`, `status_user_admin`, `username_user_admin`, `password_user_admin`, `nama_depan_user_admin`, `nama_belakang_user_admin`, `email_user_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `telepon_admin`, `gender_admin`, `alamat_admin`, `image_user_admin`, `created_user_admin`, `updated_user_admin`) VALUES ('98762705829101568', 2, 1, 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'Maman', 'Suherman M.Pd', 'ervin1700018127@webmail.uad.ac.id', '', '0000-00-00', '081265217788', '', '', 'admin_ZDTN2KLMsFkB.png', '2020-06-10 10:13:00', '2020-07-04 23:12:08');
INSERT INTO `tb_user_admin` (`id_user_admin`, `role_user_admin`, `status_user_admin`, `username_user_admin`, `password_user_admin`, `nama_depan_user_admin`, `nama_belakang_user_admin`, `email_user_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `telepon_admin`, `gender_admin`, `alamat_admin`, `image_user_admin`, `created_user_admin`, `updated_user_admin`) VALUES ('98764175848767488', 3, 1, 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec', 'Ronald', 'Bakpahan, M.Pd', 'ronal.bakpahan@gmail.com', '', '0000-00-00', '081265217788', '', '', 'default.png', '2020-06-11 08:45:50', '2020-06-21 13:04:08');
INSERT INTO `tb_user_admin` (`id_user_admin`, `role_user_admin`, `status_user_admin`, `username_user_admin`, `password_user_admin`, `nama_depan_user_admin`, `nama_belakang_user_admin`, `email_user_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `telepon_admin`, `gender_admin`, `alamat_admin`, `image_user_admin`, `created_user_admin`, `updated_user_admin`) VALUES ('98764175848767489', 4, 1, 'admin4', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', 'Jasman', 'Etpangmu, S.Pd', 'js.Etpangmu@gmail.com', '', '0000-00-00', '081267182940', 'l', '', 'default.png', '2020-06-11 08:48:30', '2020-06-18 16:41:38');
INSERT INTO `tb_user_admin` (`id_user_admin`, `role_user_admin`, `status_user_admin`, `username_user_admin`, `password_user_admin`, `nama_depan_user_admin`, `nama_belakang_user_admin`, `email_user_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `telepon_admin`, `gender_admin`, `alamat_admin`, `image_user_admin`, `created_user_admin`, `updated_user_admin`) VALUES ('98764175848767490', 5, 1, 'admin5', '35cc6a0d62fb5a6042d2bb250adfb03ef31a45c8', 'Lula', 'akmalia, S.Pd', 'lula.akmal@gmail.com', '', '0000-00-00', '081267182940', '', '', 'default.png', '2020-06-11 08:50:10', '2020-06-21 14:41:23');
INSERT INTO `tb_user_admin` (`id_user_admin`, `role_user_admin`, `status_user_admin`, `username_user_admin`, `password_user_admin`, `nama_depan_user_admin`, `nama_belakang_user_admin`, `email_user_admin`, `tempat_lahir_admin`, `tanggal_lahir_admin`, `telepon_admin`, `gender_admin`, `alamat_admin`, `image_user_admin`, `created_user_admin`, `updated_user_admin`) VALUES ('e4c0cf199c05e845e41b472005a2e207210620', 2, 1, 'admin100', '6739f9f78c9b19325a27970299feef3ca8151aa7', 'Nessa cantik ', 'Vioni S.Si', 'nessa.vio@gmail.com', 'Muara Aman', '2007-10-24', '081265217788', 'p', 'Jalan citra no 46 muara aman, Ps. Muara Aman, Lebong Utara, Kabupaten Lebong, Bengkulu 39264', 'admin_z9QrUP0aqIdu.jpg', '2020-06-21 13:01:44', '2020-07-16 15:14:07');


#
# TABLE STRUCTURE FOR: tb_user_log
#

DROP TABLE IF EXISTS `tb_user_log`;

CREATE TABLE `tb_user_log` (
  `id_user_log` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `browser_user` varchar(258) NOT NULL,
  `os_user` varchar(258) NOT NULL,
  `ip_user` varchar(258) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_user_log` (`id_user_log`, `id_user`, `browser_user`, `os_user`, `ip_user`, `login_date`, `logout_date`) VALUES ('1198475692', '98756888497225728', 'Chrome-83.0.4103.116', 'Windows 10', '::1', '2020-07-17 16:54:09', '2020-07-17 16:54:54');
INSERT INTO `tb_user_log` (`id_user_log`, `id_user`, `browser_user`, `os_user`, `ip_user`, `login_date`, `logout_date`) VALUES ('5982378316', '314579-140720-bPcdBy', 'Chrome-83.0.4103.116', 'Windows 10', '::1', '2020-07-17 16:54:59', '2020-07-17 16:55:06');
INSERT INTO `tb_user_log` (`id_user_log`, `id_user`, `browser_user`, `os_user`, `ip_user`, `login_date`, `logout_date`) VALUES ('8154743665', '98756888497225728', 'Chrome-83.0.4103.116', 'Windows 10', '::1', '2020-07-17 16:55:11', NULL);


