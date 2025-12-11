-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2025 at 09:39 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rspm`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_master_rkk`
--

CREATE TABLE `detail_master_rkk` (
  `id` int(11) NOT NULL,
  `id_rkk` int(11) NOT NULL,
  `kompetensi_rkk` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_master_rkk`
--

INSERT INTO `detail_master_rkk` (`id`, `id_rkk`, `kompetensi_rkk`) VALUES
(218, 1, 'Pengkajian'),
(219, 1, 'Menetapkan diagnosis keperawatan'),
(220, 1, 'Menyusun rencana keperawatan'),
(221, 1, 'Melakukan evaluasi keperawatan'),
(222, 1, 'Melakukan dokumentasi proses keperawatan'),
(223, 1, 'Manajemen lingkungan : keselamatan pasien'),
(224, 1, 'Manajemen lingkungan : keselamatan staf'),
(225, 1, 'Indentifikasi pasien'),
(226, 1, 'Tindakan pencegahan pasien jatuh'),
(227, 1, 'Tindakan pencegahan luka tekan (pressure ulcer)'),
(228, 1, 'Tindakan pencegahan cidera akibat restraint'),
(229, 1, 'Mambuat laporan insiden'),
(230, 1, 'Melakukan tindakan keperawatan sesuai dengan standard dan prinsip pencegahan infeksi'),
(231, 1, 'Memberikan asuhan keperawatan dengan prinsip otonomi, beneficience (berbuat baik), justice (keadilan), nonmaleficience (tidak merugikan), veracity (kejujuran), fidelity (menepati janji), confidentiality (kerahasiaan), accountability (akuntanbilitas). '),
(232, 1, 'Melakukan komunikasi terapeutik kepada pasien, keluarga dan tim kesehatan lainnya'),
(233, 1, 'Melakukan komunikasi dengan teknik SBAR'),
(234, 1, 'Memberikan terapi oksigen'),
(235, 1, 'Tindakan mencegah aspirasi'),
(236, 1, 'Manajemen jalan nafas'),
(237, 1, 'Suction jaan nafas (airway suctioning)'),
(238, 1, 'Insersi intravena'),
(239, 1, 'Memberikan dan monitoring cairan intravena'),
(240, 1, 'Memberi makan pasien melalui oral'),
(241, 1, 'Memberi minuman susu melalui botol'),
(242, 1, 'Memberi makan melalui NGT'),
(243, 1, 'Melakukan tindakan pemasangan NGT'),
(244, 1, 'Manajemen nausea'),
(245, 1, 'Membantu pasien berkemih sopan'),
(246, 1, 'Perawatan kateter dan sistostomi'),
(247, 1, 'Pemasangan kateter urin'),
(248, 1, 'Merawat luka insisi post operasi'),
(249, 1, 'Merawat luka tekan (pressure ulcer)'),
(250, 1, 'Merawat drain'),
(251, 1, 'Mempertahankan dan merawat pasien yang terpasang gips'),
(252, 1, 'Memberikan obat : telinga'),
(253, 1, 'Memberikan obat : mata'),
(254, 1, 'Memberikan obat : enteral'),
(255, 1, 'Memberikan obat : inhaasi'),
(256, 1, 'Memberikan obat : nasal'),
(257, 1, 'Memberikan obat : oral '),
(258, 1, 'Memberikan obat : Rectal'),
(259, 1, 'Memberikan obat : vaginal'),
(260, 1, 'Memberikan obat : kulit'),
(261, 1, 'Memberikan obat : intravena (IV)'),
(262, 1, 'Memberikan obat : intramuskular (IM)'),
(263, 1, 'Memberikan obat : subkutan '),
(264, 1, 'Memberikan obat : intradermal'),
(265, 1, 'Pemberian darah dan produk darah secara aman'),
(266, 1, 'Berkomunikasi dan memberikan edukasi pasien denagan gangguan pendengaran'),
(267, 1, 'Berkomunikasi dan memberikan edukasi pasien dengan gangguan penglihatan '),
(268, 1, 'Mengajarkan batuk efektif'),
(269, 1, 'Mengajarkan perawatan kontak lensa'),
(270, 1, 'Melakukan perekaman EKG'),
(271, 1, 'Menginterpresentasi hasiil EKG normal dan tidak normal'),
(272, 1, 'Manajemen lingkungan : bersih dan aman'),
(273, 1, 'Membantu perawatan diri : memcuci rambut'),
(274, 1, 'Membantu perawatan diri : kebersihan mulut'),
(275, 1, 'Membantu perawatan diri : mandi'),
(276, 1, 'Membantu perawatan diri : kebersihan kuku'),
(277, 1, 'Membantu perawatan diri : BAB/BAK'),
(278, 1, 'Mengambil sampel pemeriksaan : darah vena'),
(279, 1, 'Mengambil sampel pemeriksaan : urin'),
(280, 1, 'Mengambil sampel pemeriksaan : fases'),
(281, 1, 'Mengambil sampel pemeriksaan : sputum'),
(282, 1, 'Manajemen specimen pemeriksaan laboratorium'),
(283, 1, 'Membatasi area pergerakan pasien'),
(284, 1, 'Perawatan pasien dengan tirah baring'),
(285, 1, 'Melatih pasien  : ambulasi'),
(286, 1, 'Mengatur posisi pron'),
(287, 1, 'Membantu pasien yang mengalami keterbatasan immobilisasi'),
(288, 1, 'Memberikan tindakan untuk mengurangi kecemasan pasien'),
(289, 1, 'Melakukan tindakan menenangkan pasien'),
(290, 1, 'Memberikan pertolongan pertama'),
(291, 1, 'Menajemen kode : Code Blue'),
(292, 1, 'Pengecekan troli emergensi'),
(293, 1, 'Pengecekan dan persiapan defibrillator'),
(294, 1, 'Melakukan perawatan pasien menjelang ajal'),
(295, 1, 'Melakukan perawatan pasien meninggal'),
(296, 2, 'Kompetensi PK I (General)'),
(297, 2, 'Persiapan intubasi'),
(298, 2, 'Persiapam ekstubasi'),
(299, 2, 'Monitoring intra operasi'),
(300, 2, 'Monitoring paska operasi di ruang pulih'),
(301, 2, 'Insersi dan menstabilkan jalan nafas'),
(302, 2, 'Manajemen jalan nafas'),
(303, 2, 'Suction jalan nafas'),
(304, 2, 'Memberikan oksigen'),
(305, 2, ' Manajemen jalan nafas buatan : ETT dan tracheostomy'),
(306, 2, ' Perawtan sirkulasi : alat bantu mekanik'),
(307, 2, ' Resusitasi cairan'),
(308, 2, ' Pemberian obat-obatan anestesi'),
(309, 2, ' Manajemen nyeri'),
(310, 2, ' Asistensi pemberian patient-controlled analgesia (PCA)'),
(311, 2, ' Support emosional'),
(312, 2, ' Perawatan mata'),
(313, 2, ' Manajemen nausea'),
(314, 2, ' Tindakan pencegahan injuri saat operasi'),
(315, 2, ' Membuat laporan insiden'),
(316, 2, ' Penanganan kasus emergensi di kamar operasi'),
(317, 2, ' Resusitasi pasien dewasa dan anak'),
(318, 2, ' Pencegahan obat-obatan khusus anestesi'),
(319, 2, ' Pengelolaan mesin anestesi'),
(320, 2, ' Pengelolaan gas anestesi'),
(321, 2, ' Pengelolaan alat-alat anestesi umum'),
(322, 3, 'Kompetensi PK I (General) & PK II anestesi)'),
(323, 3, 'Koordinasi preoperasi '),
(324, 3, 'Memberikan Edukasi : pre operasi'),
(325, 3, 'Manajemen cairan dan elektrolit'),
(326, 3, 'Manajemen sedasi'),
(327, 3, 'Manahemendefibrilator : eksternal'),
(328, 3, 'Manajemen pasien syok'),
(329, 3, 'Memberikan obat melalui intraspinal'),
(330, 3, 'Resusitasi : Fetus'),
(331, 4, 'Memiliki kompetensi PK I General'),
(332, 4, 'Manejemen jalan nafas'),
(333, 4, 'Perawatan pasien emergensi'),
(334, 4, 'Memfasilitasi kehadiran keluarga'),
(335, 4, 'Memberikan dan monitoring cairan/elektrolit'),
(336, 4, 'Asistensi resusitasi cairan'),
(337, 4, 'Manajemen keperawatan oada pasien dengan peningkatan suhu tubuh karena gangguan thermoregulasi'),
(338, 4, 'Manajemen keperawatan pasien hypovolemia'),
(339, 4, 'Meberikan terapi oksigen melaui masker, masker rebreathing, masker non rebreathing'),
(340, 4, 'Penatalaksanaan nyeri ringan, sedang dan berat'),
(341, 4, 'Memfasilitasi pasien pulang'),
(342, 4, 'Restrain fisik'),
(343, 4, 'Monitor respirasi'),
(344, 4, 'Asistensi tindakan resusitasi'),
(345, 4, 'Asistensi penatalaksanaan pasien syok'),
(346, 4, 'Transfer pasien : antar ruangan/unit'),
(347, 4, 'Transfer pasien : antar rumah sakit'),
(348, 4, 'Perawatan luka trauma'),
(349, 4, 'Manajemen kasus PINERE (penyakit infeksi new emergensi dan reemerging)'),
(350, 4, 'Asistensi manajemen akibat terpapar bahan radiasi dan bahan kimia'),
(351, 4, 'Interpretasi EKG normal 12 lead'),
(352, 5, 'Memiliki kompetensi PK I general dan PK II IGD'),
(353, 5, 'Manajemen pada pasien trauma radiasi'),
(354, 5, 'Manajemen pada pasien trauma kimia'),
(355, 5, 'Membantu pasien untuk meningkatkan gambaran diri'),
(356, 5, 'Manajemen keperawatan pada pasien dengan infark miokard (MCI)'),
(357, 5, 'Mempertahankan dan meningkatkan sirkulasi arteri : pasa kasus insufisiensi arteri'),
(358, 5, 'Mempertahankan dan menningkatkan sirkulasi vena : pada kasus insufisiensi vena'),
(359, 5, 'Membantu koping keluarga dalam menghadapi situasi krisis'),
(360, 5, 'Melakukan tindakan DC shock (defibrillator) : eksternal'),
(361, 5, 'Manajemen keperawatan pasien disaritmia'),
(362, 5, 'Resusitasi cairan'),
(363, 5, 'Manajemen hypovolemia'),
(364, 5, 'Asistensi pemasangan ventilator invasive'),
(365, 5, 'Asistensi pemasangan ventilaot non invasive'),
(366, 5, 'Penatalaksanaan pasien terpapar bahan radiasi dan bahan kimia'),
(367, 5, 'Manajemen penggunaan ruang isolasi'),
(368, 5, 'Intervensi pada keluarga pasien kritis di emergensi'),
(369, 5, 'Edukasi pada pasien dan keluarga korban kekerasam untuk melakukan program recoveri ulangan di poli'),
(370, 5, 'Post stress paska trauma (PSPT)'),
(371, 5, 'Manajemen anafilaksis'),
(372, 5, 'Manajemen ekstravasasi'),
(373, 6, 'Monitoring kewaspadaan isolasi'),
(374, 6, 'Monitoring kewaspadaan standart'),
(375, 6, 'Monitoring kewaspadaan transmisi'),
(376, 6, 'Monitoring Healthcare Associated Infection (HAIs)'),
(377, 6, 'Monitoring SIRS (Systemic Inflammatory Respons Syndrom)'),
(378, 6, 'Monitoring pinere'),
(379, 6, 'Monitoring survailance'),
(380, 6, 'Monitoring audit'),
(381, 6, 'Monitoring lingkungan'),
(382, 6, 'Monitoring fasilitas terkait PPI'),
(383, 6, 'Edukasi'),
(384, 7, 'Monitoring kewaspadaan isolasi'),
(385, 7, 'Monitoring kewaspadaan standart'),
(386, 7, 'Monitoring kewaspadaan transmisi'),
(387, 7, 'Monitoring Healthcare Associated Infection (HAIs)'),
(388, 7, 'Monitoring SIRS (Systemic Inflammatory Respons Syndrom)'),
(389, 7, 'Monitoring pinere'),
(390, 7, 'Monitoring survailance'),
(391, 7, 'Monitoring audit'),
(392, 7, 'Monitoring lingkungan'),
(393, 7, ' Monitoring fasilitas terkait PPI'),
(394, 7, ' Edukasi'),
(395, 7, 'Monitoring KLB'),
(396, 7, 'Monitoring ICRA'),
(397, 7, 'Monitoring Risk Register'),
(398, 8, 'Melakukan Intervensi spesifik Keperawatan secara Mandiri PK I '),
(399, 8, 'Serah terima pasien dari ruang rawat, poliklinik, ICU dan UGD '),
(400, 8, 'Melakukan Perawatan pasien sesudah operasi '),
(401, 8, 'Melakukan Evaluasi tindakan keperawatan '),
(402, 8, 'Membuat Resume Keperawatan '),
(403, 8, 'Melakukan Edukasi pasien  '),
(404, 8, 'Menghitung Balance Cairan '),
(405, 8, 'Melakukan Pemantauan Hemodinamik '),
(406, 8, 'Menilai tanda – tanda Dehidrasi '),
(407, 8, 'Melakukan Tehnik Penyeterilan Alat '),
(408, 8, 'Memakai topi dan masker operasi'),
(409, 8, 'Pemakaian APD'),
(410, 8, 'Melakukan cuci tangan bedah'),
(411, 8, 'Memakai sarung tangan operasi'),
(412, 8, 'Memakai jas operasi'),
(413, 8, 'Memahami lokasi operasi'),
(414, 8, 'Mengidentifikasi kesiapan klien/pasien operasi'),
(415, 8, 'Memberi penyuluhan sebelum operasi'),
(416, 8, 'Memberi bimbingan rohani pasien'),
(417, 8, 'Menerima pasien pre operasi'),
(418, 8, 'persiapan obat alkes operasi'),
(419, 8, 'Melakukan verifikasi pasien operasi'),
(420, 8, 'Menyiapkan meja operasi'),
(421, 8, 'Menyiapkan set linen operasi'),
(422, 8, 'Mampu menjadi sirkuler'),
(423, 8, 'Melakukan penghitungan kasa sebelum dan sesudah operasi'),
(424, 8, 'Melakukan pengaturan posisi pasien operasi'),
(425, 8, 'Melakukan penghitungan instrumen sebelum dan sesudah operasi'),
(426, 8, 'prosedur drapping'),
(427, 8, 'Melakukan prosedur time out'),
(428, 8, 'Monitoring pasien selama pembedahan'),
(429, 8, 'Mendokumentasikan askep pasien kamar operasi'),
(430, 8, 'Penanganan pasien meninggal di meja operasi'),
(431, 8, 'Menyerahkan pasien post op dengan petugas rawat inap'),
(432, 8, 'Melakukan serah terima pasien di ruang ICU'),
(433, 8, 'Observasi pasien pasca anasthesi dan pembedahan di RR'),
(434, 8, 'Melakukan pengelolaan specimen'),
(435, 8, 'Melakukan serah terima specimen dengan petugas laboratorium/keluarga'),
(436, 8, 'Melakukan pembersihan kamar operasi'),
(437, 8, 'Melakukan Pengelolaan instrumen setelah operasi'),
(438, 8, 'Melakukan sterilisasi kasa'),
(439, 8, 'pemeliharaan alat kesehatan dan alat medik di kamar operasi'),
(440, 8, 'penyusunan set instrumen dan memberi label'),
(441, 8, 'Melakukan sterilisasi linen'),
(442, 8, 'Melakukan  penanganan alat steril'),
(443, 8, 'mengoperasikan alat-alat kesehatan dan alat medis'),
(444, 8, 'pemeliharaan alat kesehatan dan alat medik di kamar operasi'),
(445, 8, 'Memberikan Oksigen dengan sungkup Rebreathing'),
(446, 8, 'Memberikan Oksigen dengan sungkup Non Rebreathing'),
(447, 8, 'Memberikan Oksigen dengan masker venturi '),
(448, 8, 'Melakukan suction lewat mulut/hidung/tracheostomie '),
(449, 8, 'Menyiapkan pasien operasi besar '),
(450, 8, 'Menyiapkan pasien Operasi Khusus '),
(451, 8, 'Menyiapkan Pasien dan alat untuk pemasangan ETT '),
(452, 8, 'Mengoperasikan perekaman EKG '),
(453, 8, 'Memasang Dower Catheter '),
(454, 8, 'Memasang slang lambung/NGT '),
(455, 8, 'Memasang Infus '),
(456, 8, 'Memasang Syringe Pump '),
(457, 8, 'Memfasilitasi pasien untuk Permintaan Darah '),
(458, 8, 'Memberi Transfusi Darah '),
(459, 8, 'Memberikan therapi Titrasi  Bicnat, KCL '),
(460, 8, 'Merawat Pasien dengan Colostomie ( Stoma ) '),
(461, 8, 'Mengambil Darah Arteri '),
(462, 8, 'Melatih ROM '),
(463, 8, 'Mengoperasikan alat oxymetri '),
(464, 8, 'Mengoperasikan BPM '),
(465, 8, 'Melakukan perawatan Luka Sedang '),
(466, 8, 'Melakukan Perawatan Luka Besar '),
(467, 8, 'Melakukan Perawatan Pada Pasien Yang Terpasang Drainase '),
(468, 8, 'Melakukan Perawatan  Luka Bakar Grade I ( < 20 % ) '),
(469, 8, 'Melakukan Perawatan Luka Bakar Grade II ( 20 % – 40 % ) '),
(470, 8, 'Melakukan Perawatan Luka Bakar Grade III ( > 40 % ) '),
(471, 8, 'Melakukan angkat Jahitan '),
(472, 8, 'Membaca dan melaporkan hasil Laboratorium pada dokter '),
(473, 8, 'Menghubungi Rumah Sakit lain untuk Tindakan, Pemeriksaan, Rujuk pasien '),
(474, 8, 'Melakukan Cek Gula Darah (Glukotest) '),
(475, 8, 'Menyiapkan alat untuk tindakan Incisi '),
(476, 8, 'Menyiapkan alat untuk tindakan Extirpasi'),
(477, 8, 'Melakukan Pencegahan Dan Penanggulangan Infeksi Nasokomial '),
(478, 8, 'Pengelolaan Pasien Dengan Penyakit Menular '),
(479, 8, 'Memasang Bidai '),
(480, 8, 'Memasang Neck Coler '),
(481, 8, 'Melakukan Kumbah Lambung '),
(482, 8, 'Memberikan Therapi Obat Sedatif '),
(483, 8, 'Menyiapkan Alat Untuk Intubasi '),
(484, 8, 'Memberikan Obat – obat Emergency dan Life Saving '),
(485, 8, 'Melakukan interpretasi hasil Skin test dan Mantoux test '),
(486, 8, 'Menyiapkan Alat Vena Sectie '),
(487, 8, 'Menjadi instrumentator pada saat operasi '),
(488, 9, 'Melakukan Intervensi spesifik Keperawatan secara Mandiri PK I dan PK II '),
(489, 9, 'Melakukan Triple Manuver  ( Head Lift, Chin Lift, Jaw Trust ) '),
(490, 9, 'Melakukan Penilaian Status Neurologis '),
(491, 9, 'Menyiapkan Alat Vena Sectie '),
(492, 9, 'Melakukan Konseling pada Pasien '),
(493, 9, 'Memberikan Motivasi Spiritual'),
(494, 9, 'Melakukan Perawatan WSD '),
(495, 9, 'Melakukan koordinasi dengan penunjang medic'),
(496, 9, 'Melakukan koordinasi dengan penunjang non diagnostic'),
(497, 9, 'Memberikan Training bekerjasama dengan Diklat Keperawatan'),
(498, 9, 'Memberikan training bekerjasama dengan Diklat Rumah Sakit'),
(499, 9, 'Menjadi asistensi pada saat operasi'),
(500, 10, 'Membersihkan secret dengan memasukkan kateter suction ke dalam oral, nasofaring atau trachea (suction jalan nafas)'),
(501, 10, 'Merawat jalan nafas buatan : ETT dan tracheostomy'),
(502, 10, 'Manajemen keperawatan pada asma'),
(503, 10, 'Memberikan terapi oksigen melalui masker, masker rebreathing, masker non rebreathing'),
(504, 10, 'Pemenuhan cairan dan elektrolit'),
(505, 10, 'Manajemen cairan dan elektrolit'),
(506, 10, 'Pemenuhan nutrisi'),
(507, 10, 'Memberikan pembatasan diet sesuai dengan perkembangan toleransi diet (Diet Stagging)'),
(508, 10, 'Melakukan tindakan pemasangan NGT'),
(509, 10, 'Managemen nutrisi : 1). NGT  2). Gastrostomy/PEG'),
(510, 10, 'Memberikan TPN dan memonitor respon pasien'),
(511, 10, 'Manajemen vomit'),
(512, 10, 'Manajemen keperawatan pada hiperglikemia'),
(513, 10, 'Manajemen keperawatan pada hipoglikemia'),
(514, 10, 'Pemberian obat'),
(515, 10, 'Memberikan, monitor dan menghentikan obat yang digunakan untuk mengontrol perilaku ekstrim (restraint dengan zat kimia)'),
(516, 10, 'Penatalaksanaan nyeri ringan, sedang dan berat'),
(517, 10, 'Rekonsiliasi obat-obatan'),
(518, 10, 'Perawatan luka'),
(519, 10, 'Perawatan pasien dengan traksi/imobilisasi'),
(520, 10, 'Perawatan WSD'),
(521, 10, 'Perawatan drain urin (selang) : kateter, sistotomi'),
(522, 10, 'Perawatan luka : 1). Kaki diabetic  2). Luka infeksi'),
(523, 10, 'Perawatan stoma tanpa komplikasi'),
(524, 10, 'Penatalaksanaan kegawatdaruratan'),
(525, 10, 'Manajemen Code Blue'),
(526, 10, 'Penatalaksanaan syok'),
(527, 10, 'Mendeteksi dan tatalaksana pasien dengan berisiko syok'),
(528, 10, 'Pemenuhan eliminasi'),
(529, 10, 'Browel training'),
(530, 10, 'Balader training'),
(531, 10, 'Manajemen keperawatan kasus medical bedah :'),
(532, 10, 'Discharge Planning'),
(533, 10, 'Support psikologis'),
(534, 10, 'Promosi keterlibatan keluarga'),
(535, 10, 'Interpretasi data laboratorium'),
(536, 10, 'Monitor status neurologi'),
(537, 10, 'Monitoring tekanan intracranial'),
(538, 10, 'Penatalaksaan syok'),
(539, 10, 'Melakukan perawatan pasien dengan tekanan intracranial (TIK)'),
(540, 10, 'Mengukur tanda-tanda vital dan tingkat kesadaran dengan menggunakan GCS'),
(541, 10, 'Restrain fisik'),
(542, 10, 'Manaejemen tekanan : meminimalkan tekanan pada bagian tubuh pasien'),
(543, 10, 'Tindakan pencegahan luka tekan pada pasien yang berisiko'),
(544, 10, 'Manajemen pada paaien kejang : merawat pasien saat dan setelah kejang'),
(545, 10, 'Tindakan pencegahan kejang : menghindari atau meminimalkan potensi cidera karena kejang'),
(546, 10, 'Penatalaksanaan syok'),
(547, 10, 'Interpretasi EKG normal 12 lead'),
(548, 10, 'Tindakan keperawatan untuk mengurangi perdarahan : gastrointestinal'),
(549, 10, 'Mempersiapkan pasien pre operasi'),
(550, 10, 'Melakukan keperawatan post operasi'),
(551, 10, 'Melatih kandung kemih (Bladder training)'),
(552, 10, 'Meningkatkan pengetahuan kesehatan'),
(553, 10, 'Terlibat dalam konferensi keperawatan multidisiplin (diskusi kasus)'),
(554, 10, 'Memberikan informasi kepada pasien tentang proses penyakit yang dialaminya'),
(555, 10, 'Membantu pasien untuk memahami dan siap secara mental untuk dilakukan operasi dan post operasi'),
(556, 10, 'Memberikan pengertian kepada pasien sehingga siap secara mental untuk mendapatkan prosedur atau tindakan'),
(557, 11, 'Manajemen asam basa'),
(558, 11, 'Perawatan pasien kompetensi medical bedah PK I dan PK II'),
(559, 11, 'Manajemen ventilasi mekanik non invasive : pemberian O2 melalui Continue Positive Airway Pressure (CPAP)'),
(560, 11, 'Monitor respirasi'),
(561, 11, 'Dengan gastrointestinal tube/drain'),
(562, 11, 'Interpretasi EKG : abnormal'),
(563, 11, 'Kumbah lambung'),
(564, 11, 'Indikator kaki diabetic'),
(565, 11, 'Perawatan kaki dan senam kaki pasien dengan diabetic'),
(566, 11, 'Pengelolaan diabetes melitus 5 pilar (perencanaan makan, latihan/aktifitas fisik & pengobatan)'),
(567, 11, 'Perawatan luka'),
(568, 11, 'Perawatan luka : decubitus grade intra vena'),
(569, 11, 'Pemberian obat-obatan'),
(570, 11, 'Patient-controlled analgesia (PCA) assistance'),
(571, 11, 'Merawat luka tekan (pressure ulcer)'),
(572, 11, 'Merawat drain'),
(573, 11, 'Mempertahankan dan merawat pasien yang terpasang gips'),
(574, 11, 'Memberikan obat : telinga'),
(575, 11, 'Memberikan obat : mata'),
(576, 11, 'Memberikan obat : enteral'),
(577, 11, 'Memberikan obat : inhaasi'),
(578, 11, 'Memberikan obat : nasal'),
(579, 11, 'Memberikan obat : oral '),
(580, 11, 'Memberikan obat : Rectal'),
(581, 11, 'Memberikan obat : vaginal'),
(582, 11, 'Memberikan obat : kulit'),
(583, 11, 'Memberikan obat : intravena (IV)'),
(584, 11, 'Memberikan obat : intramuskular (IM)'),
(585, 11, 'Memberikan obat : subkutan '),
(586, 11, 'Memberikan obat : intradermal'),
(587, 11, 'Pemberian darah dan produk darah secara aman'),
(588, 11, 'Berkomunikasi dan memberikan edukasi pasien denagan gangguan pendengaran'),
(589, 11, 'Berkomunikasi dan memberikan edukasi pasien dengan gangguan penglihatan '),
(590, 11, 'Mengajarkan batuk efektif'),
(591, 11, 'Mengajarkan perawatan kontak lensa'),
(592, 11, 'Melakukan perekaman EKG'),
(593, 11, 'Menginterpresentasi hasiil EKG normal dan tidak normal'),
(594, 11, 'Manajemen lingkungan : bersih dan aman'),
(595, 11, 'Membantu perawatan diri : memcuci rambut'),
(596, 11, 'Membantu perawatan diri : kebersihan mulut'),
(597, 11, 'Membantu perawatan diri : mandi'),
(598, 11, 'Membantu perawatan diri : kebersihan kuku'),
(599, 11, 'Membantu perawatan diri : BAB/BAK'),
(600, 11, 'Mengambil sampel pemeriksaan : darah vena'),
(601, 11, 'Mengambil sampel pemeriksaan : urin'),
(602, 11, 'Mengambil sampel pemeriksaan : fases'),
(603, 11, 'Mengambil sampel pemeriksaan : sputum'),
(604, 11, 'Manajemen specimen pemeriksaan laboratorium'),
(605, 11, 'Membatasi area pergerakan pasien'),
(606, 11, 'Perawatan pasien dengan tirah baring'),
(607, 11, 'Melatih pasien  : ambulasi'),
(608, 11, 'Mengatur posisi pron'),
(609, 11, 'Membantu pasien yang mengalami keterbatasan immobilisasi'),
(610, 11, 'Memberikan tindakan untuk mengurangi kecemasan pasien'),
(611, 11, 'Melakukan tindakan menenangkan pasien'),
(612, 11, 'Orientasi realita'),
(613, 11, 'Memberikan terapi rekreasi'),
(614, 11, 'Sentuhan'),
(615, 11, 'Memfasilitasi kunjungan keluarga atau teman'),
(616, 11, 'Memberikan pertolongan pertama'),
(617, 11, 'Menajemen kode : Code Blue'),
(618, 11, 'Pengecekan troli emergensi'),
(619, 11, 'Pengecekan dan persiapan defibrillator'),
(620, 11, 'Melakukan perawatan pasien menjelang ajal'),
(621, 11, 'Melakukan perawatan pasien meninggal'),
(622, 12, 'Kompetensi PK I (General)'),
(623, 12, 'Mencegah terjadinya perdarahan'),
(624, 12, 'Pengambilam darah kaplier'),
(625, 12, 'Monitor cairan dan elektrolit'),
(626, 12, 'Support emosional'),
(627, 12, 'Manajemen lingkungan : keamanan pasien dan mengontrol onfeksi'),
(628, 12, 'Perlindungan terhadap infeksi'),
(629, 12, 'Manajemen obat'),
(630, 12, 'Manajemen nausea'),
(631, 12, 'Monitor status nutrisi'),
(632, 12, 'Manajemen pruritus'),
(633, 12, 'Konsultasi melalui telepon'),
(634, 12, 'Manajemen vomit'),
(635, 12, 'Phelobotomi : Cannulated vessel'),
(636, 12, 'Melakukan insersi akses vascular : cimino atau graft'),
(637, 12, 'Manajemen perawatan mesin dialysis'),
(638, 12, 'Manajemen limbah'),
(639, 12, 'Pencegahan infeksi exit site'),
(640, 12, 'Persiapan implant CAPD'),
(641, 12, 'Memfasilitasi pasien biopsi ginjal'),
(642, 12, 'Perawatan pasien post biopsy ginjal'),
(643, 12, 'Memfasilitasi pasien yang dilakukan pemeriksaan USG Ginjal'),
(644, 12, 'Memfasilitasi pasien yang dilakukan pemasangaan Hemocath dialysis'),
(645, 12, 'Manajemen code blue'),
(646, 12, 'Pemberian darah dan produk darah secara aman'),
(647, 12, 'Berkomunikasi dan memberikan edukasi pasien denagan gangguan pendengaran'),
(648, 12, 'Berkomunikasi dan memberikan edukasi pasien dengan gangguan penglihatan '),
(649, 12, 'Mengajarkan batuk efektif'),
(650, 12, 'Mengajarkan perawatan kontak lensa'),
(651, 12, 'Melakukan perekaman EKG'),
(652, 12, 'Menginterpresentasi hasiil EKG normal dan tidak normal'),
(653, 12, 'Manajemen lingkungan : bersih dan aman'),
(654, 12, 'Membantu perawatan diri : memcuci rambut'),
(655, 12, 'Membantu perawatan diri : kebersihan mulut'),
(656, 12, 'Membantu perawatan diri : mandi'),
(657, 12, 'Membantu perawatan diri : kebersihan kuku'),
(658, 12, 'Membantu perawatan diri : BAB/BAK'),
(659, 12, 'Mengambil sampel pemeriksaan : darah vena'),
(660, 12, 'Mengambil sampel pemeriksaan : urin'),
(661, 12, 'Mengambil sampel pemeriksaan : fases'),
(662, 12, 'Mengambil sampel pemeriksaan : sputum'),
(663, 12, 'Manajemen specimen pemeriksaan laboratorium'),
(664, 12, 'Membatasi area pergerakan pasien'),
(665, 12, 'Perawatan pasien dengan tirah baring'),
(666, 12, 'Melatih pasien  : ambulasi'),
(667, 12, 'Mengatur posisi pron'),
(668, 12, 'Membantu pasien yang mengalami keterbatasan immobilisasi'),
(669, 12, 'Memberikan tindakan untuk mengurangi kecemasan pasien'),
(670, 12, 'Melakukan tindakan menenangkan pasien'),
(671, 12, 'Orientasi realita'),
(672, 12, 'Memberikan terapi rekreasi'),
(673, 12, 'Sentuhan'),
(674, 12, 'Memfasilitasi kunjungan keluarga atau teman'),
(675, 12, 'Memberikan pertolongan pertama'),
(676, 12, 'Menajemen kode : Code Blue'),
(677, 12, 'Pengecekan troli emergensi'),
(678, 12, 'Pengecekan dan persiapan defibrillator'),
(679, 12, 'Melakukan perawatan pasien menjelang ajal'),
(680, 12, 'Melakukan perawatan pasien meninggal'),
(681, 13, 'Kompetensi PK I dan PK II Nefrologi'),
(682, 13, 'Manajemen asam basa'),
(683, 13, 'Manajemen kasus'),
(684, 13, 'Manajemen konstipasi/impaksi'),
(685, 13, 'Culture brokerage'),
(686, 13, 'Support pasien dan keluarga dalam membuat keputusan'),
(687, 13, 'Mempertahankan akses dialisa'),
(688, 13, 'Manajemen cairan dan elektrolit'),
(689, 13, 'Perawatan emergensi'),
(690, 13, 'Meningkatkan pengetahuan kesehatan'),
(691, 13, 'Manajemen  HD'),
(692, 13, 'Manajemen hiperglikemia'),
(693, 13, 'Manajemen hypervolemia'),
(694, 13, 'Manajemen hipoglikemia'),
(695, 13, 'Manajemen hypovolemia'),
(696, 13, 'Interpretasi data laboratorium'),
(697, 13, 'Terlibat dalam konfrensi perawatan multidisiplin'),
(698, 13, 'Manajemen peritoneal dialysis'),
(699, 13, 'Meningkatkan kepercayaan diri pasien'),
(700, 13, 'Meningkatkan harga diri'),
(701, 13, 'Manajemen specimen'),
(702, 13, 'Melakukan insersi akses vascular : femoral dan hemocath dialysis'),
(703, 13, 'Manajemen perdarahan'),
(704, 13, 'Penanganan trouble shooting pada akses vascular'),
(705, 13, 'Penanganan trouble shooting pada sirkulasi ekstra corporeal'),
(706, 13, 'Manajemen water treatment'),
(707, 13, 'Manajemen limbah'),
(708, 13, 'Manajemen pemberian terapi selama hemodialysis : Eritropoietin, zat besi, albumin, vitamin'),
(709, 13, 'Manajemen pemberian transfusi pada pasien hemodialisis'),
(710, 13, 'Manajemen pemberian transfusi pada pasien hemodialysis'),
(711, 13, 'Manajemen komplikasi : Hipotensi'),
(712, 13, 'Manajemen komplikasi : Hipertensi'),
(713, 13, 'Manajemen komplikasi : Kram otot'),
(714, 13, 'Manajemen komplikasi : Emboli'),
(715, 13, 'Manajemen komplikasi : Kejang'),
(716, 13, 'Manajemen komplikasi : Disequilibrium sindrom'),
(717, 13, 'SLED (Sustain Low Efieciency Dialysis)'),
(718, 13, 'Manajemen diet sialysis dan transplantasi ginjal'),
(719, 13, 'Manajemene perawatan exit site'),
(720, 13, 'Edukasi pre tindakan CAPD'),
(721, 13, 'Manejemen pemberian cairan CAPD'),
(722, 13, 'Melakukan pertukaran cairan CAPD (sirklus CAPD)'),
(723, 13, 'Pergantian transfer set'),
(724, 13, 'Penanganan peritonitis'),
(725, 13, 'PET (Peritoneal Equilibration Test)'),
(726, 13, 'Penanganan trouble shooting CAPD'),
(727, 13, 'Penanganan CAPD intra operasi : implant kateter'),
(728, 13, 'Promosi kehidupan normal pada paisen dengan penyakit kronik'),
(729, 13, 'Menentukan berat badan kering'),
(730, 13, 'Adequasi HD'),
(731, 13, 'Adequasi CAPD'),
(732, 14, 'Kompetensi PKI (General)'),
(733, 14, 'Perawatan luka bakar ringan < 30%'),
(734, 14, 'Perawatan luka bakar sedang 30 – 50%'),
(735, 14, 'Kumbah lambung dan monitoring secret gaster'),
(736, 14, 'Perawatan luka bakar listrik dengan amputasi'),
(737, 14, 'Personal hygine luka bakar'),
(738, 14, 'Memfasilitasi pasien dengan tindakan intubasi dan ekstubasi'),
(739, 14, 'Perawatan luka post operasi dan trauma '),
(740, 14, 'Pengambilan specimen pemeriksaan kultur'),
(741, 15, 'Kompetensi PKI (General) & PK II ICU'),
(742, 15, 'Mengkaji dan memvalidasi pengkajian pasien kritis secara komprehesif'),
(743, 15, 'Merencanakan discharge planning'),
(744, 15, 'Mengelola intervensi keperawatan '),
(745, 15, 'Melakukan verifikasi hasil implementasi tindakan keperawatan '),
(746, 15, 'Penyapihan ventilator'),
(747, 15, 'Melakukan tindakan keperawatan pada pasien yang kehilangan/berduka'),
(748, 15, 'Melakukan perawatan luka infeksi'),
(749, 15, 'Memberikan terapi sedasi dan monitor respon pasien'),
(750, 15, 'Mengelola rencana asuhan pasien yang menjalani preoperative'),
(751, 15, 'Mengelola rencana asuhan pasien post operatif'),
(752, 15, 'Mengevaluasi keefektifan pelaksanaan rencan asuhan '),
(753, 15, 'Menyusun rencana dan melaksanakan pembelajaran kepada pasien dan keluarganya'),
(754, 15, 'Berkontribusi dalam pengembangan professional dan peserta didik'),
(755, 15, 'Melakukan pengambilan sample kultur pasien kritis'),
(756, 15, 'Manajemen keperawatan pasien dengan AKI (Acute Kidney Injury)'),
(757, 15, 'Manajemen keperawatan pasien dengan CKD (Chronic Kidney Disease)'),
(758, 15, 'Memverifikasi keakuratan pengukuran hemodianmol invasive dan non invasive'),
(759, 15, 'Memfasilitasi pasien withdrawl dan withholding'),
(760, 15, 'Menerapkan prinsip pengendalian infeksi di ICU'),
(761, 15, 'Manajemen keperawatan pasien dengan pneumothoraks'),
(762, 15, 'Terlibat Dalam konfrensi perawatan multidisiplin'),
(763, 16, 'Kompetensi PK I (General)'),
(764, 16, 'Manajemen jalan nafas'),
(765, 16, 'Suctioning pada neonates tanpa alat bantu nafas mekanik'),
(766, 16, 'Memberikan susu botol'),
(767, 16, 'Edukasi pemberian ASI'),
(768, 16, 'Support care giver'),
(769, 16, 'Perawatan tali pusat'),
(770, 16, 'Discharge planning'),
(771, 16, 'Pemberian makan per enteral'),
(772, 16, 'Developmental care'),
(773, 16, 'Perawatan mata'),
(774, 16, 'FCC ( family centre care)'),
(775, 16, 'Health care information exchange'),
(776, 16, 'Perawatan infant bayi'),
(777, 16, 'Proteksi terhadap infeksi'),
(778, 16, 'Insersi intravena perifer'),
(779, 16, 'Perawatan metode kanguru'),
(780, 16, 'Interpretasi data laboratorium'),
(781, 16, 'Manajemen ventilasi mekanik : Non invasive'),
(782, 16, 'Manajemen obat'),
(783, 16, 'Perawatan bayi baru lahir'),
(784, 16, 'Nonnutritive sucking'),
(785, 16, 'Monitor status nutrisi'),
(786, 16, 'Perawatan stoma tanpa komplikasi'),
(787, 16, 'Memberikan dan monitor terapi oksigen'),
(788, 16, 'Manajemen nyeri'),
(789, 16, 'Edukasi kepada orang tua : bayi'),
(790, 16, 'Phototerapi : neonates'),
(791, 16, 'Mengatur posisi'),
(792, 16, 'Resusitasi'),
(793, 16, 'Perawatan kulit'),
(794, 16, 'Manajemen teknologi'),
(795, 16, 'Pengaturan temperature'),
(796, 16, 'Pemberian total parenteral nutrisi (TPN)'),
(797, 16, 'Transport : interfasilitas'),
(798, 16, 'Transport : intrafasilitas'),
(799, 16, 'Kateterisasi urin : intermiten'),
(800, 16, 'Perawatan luka omphalocele'),
(801, 16, 'Pengambilan specimen untuk pemeriksaan kultur'),
(802, 16, 'Pengambilan sample darah arteri : analisa gas darah'),
(803, 17, 'Kompetensi PK I (General) dan PK II'),
(804, 17, 'Manajemen asam basa'),
(805, 17, 'Insersi dan stabilisasi kepatenan jalan nafas'),
(806, 17, 'Suction jalan nafas'),
(807, 17, 'Manajemen jalan nafas buatan'),
(808, 17, 'Manajemen cairan dan elektrolit'),
(809, 17, 'Ekstubasi endotracheal'),
(810, 17, 'Manajemen Hipovolemia'),
(811, 17, 'Manajemen ventilasi mekanik : invasive'),
(812, 17, 'Penyapihan ventilasi mekanik (weaning)'),
(813, 17, 'Terlibat Dalam konfrensi perawatan multidisiplin'),
(814, 17, 'Memberikan nutrisi yang mengalami gizi buruk atau yang beresiko gizi buruk'),
(815, 17, 'Perawatan stoma dengan komlikasi'),
(816, 17, 'Perawatan tube : Dada'),
(817, 17, 'Perawatan tube : Gastrointestinal'),
(818, 17, 'Perawatan tube : Urin'),
(819, 17, 'Perawatan luka Gastroschizis'),
(820, 17, 'Perawatan luka ekstravasasi'),
(821, 17, 'Perawatan akses sentral line'),
(822, 17, 'Transport : interfasilitas dengan alat bantu napas'),
(823, 17, 'Transport : intrafasilitas dengan alat bantu napas'),
(824, 17, 'Pemasangan dan perawatan akses : umbilical'),
(825, 17, 'Manajemen sedasi'),
(826, 17, 'Asistensi pemberian terapi surfaktan'),
(827, 17, 'Resusitasi bayi dengan BB dibawah 1 kg'),
(828, 17, 'Manajemen keperawatan transfusi tukar'),
(829, 17, 'Melakukan bimbingan antisipasi berduka'),
(830, 18, 'Proses asuhan kebidanan'),
(831, 18, 'Melakukan pemeriksaan fisik obstetric'),
(832, 18, 'Pemeriksaan denyut jantung janin'),
(833, 18, 'Manajemen bayi baru lahir normal'),
(834, 18, 'Pemeriksaan bayi baru lahir'),
(835, 18, 'Pemeriksaan ibu selama nifas'),
(836, 18, 'Menerapkan prinsip etika Dalam profesi kebidanan'),
(837, 18, 'Menerapkan keselamatan pasien'),
(838, 18, 'Menerapkan komunikasi terapeutik dan efektif'),
(839, 18, 'Pencegahan dan pengendalian infeksi rumah sakit'),
(840, 18, 'Pemenuhan kebutuhan oksigen : Melakukan pemberian terapi oksigen melalui nasal kanul'),
(841, 18, 'Memfasilitasi pemenuhan kebutuhan cairan dan elektrolit, melaksanakan pemberian cairan dan elektrolit'),
(842, 18, 'Pemenuhan kebutuhan nutrisi enteral : memberikan makan melalui nasogastric tube'),
(843, 18, 'Memfasilitasi pemenuhan kebutuhan eliminasi urin : mencegah infeksi saluran kemih, membantu pasien BAK di tempat tidu, merawat kateter, Melakukan pengambilan sample urin'),
(844, 18, 'Perawatan luka : Melakukan perawatan luka bersih'),
(845, 18, 'Pemberian obat secara aman dan tepat : memberikan terapi oral, intra dermal, intra muskuler, intra vena, sub cutan'),
(846, 18, 'Pemberian darah dan produk darah secara aman '),
(847, 18, 'Pemberian Edukasi'),
(848, 18, ' Perekaman EKG'),
(849, 18, 'Memenuhi kebutuhan rasa nyaman dan personal hygiene : membersihkan rambut, oral, kuku, memandikan pasien'),
(850, 19, 'Kompetensi bidan praktisi I'),
(851, 19, 'Melakukan RJP pada ibu hamil'),
(852, 19, 'Mampu mengidentifikasi kondisi patologis pada masa kehamilan'),
(853, 19, 'Mampu mengidentifikasi kondisi patologis pada masa persalinan ( antepartum, intra partum, post partum)'),
(854, 19, 'Mampu mengidentifikasi kondisi patologis pada masa nifas'),
(855, 19, 'Melakukan asuhan persalinan normal'),
(856, 19, 'Mampu memberikan pelayanan kontrasepsi hormonal dan non hormonal'),
(857, 19, 'Melakukan penjahitan robekan perineum grade I'),
(858, 19, 'Melakukan deteksi dini terhadap ca cervix'),
(859, 19, ' Memfasilitasi pemenuhan kebutuhan pada gangguan eliminasi urine'),
(860, 19, ' Memfasilitasi pemenuhan kebutuhan pada gangguan eliminasi Fekal'),
(861, 19, ' Memfasilitasi pemenuhan kebutuhan oksigen'),
(862, 19, ' Memfasilitasi pemberian obat high alert'),
(863, 19, ' Manajemen nyeri sedang (mandiri dan kolaborasi)'),
(864, 19, ' Memfasilitasi pemenuhan kebutuhan nutrisi melalui per enteral'),
(865, 19, ' Memfasilitasi pasien untuk Melakukan aktifitas fisik'),
(866, 19, ' Melakukan perawatan luka dengan infeksi'),
(867, 19, ' Memfasilitasi tumbuh kembang '),
(868, 19, ' Melakukan persiapan pre operasi dan perawatan awal post operasi dan prosedur'),
(869, 19, ' Pengambilan sample kultur untuk darah, urin, fesses, sputum, luka dan pemeriksaan darah arteri'),
(870, 20, 'Kompetensi bidan praktisi I dan II'),
(871, 20, 'Melakukan asuhan kebidanan pada komplikasi ebstetri dan neonatal'),
(872, 20, 'Mampu Melakukan pendokumentasian dengan menggunakan partograf'),
(873, 20, 'Mampu melakukan penanganan kegawatdaruratan obstetric'),
(874, 20, 'Mampu Melakukan maneuver Mc Robert pada distosia bahu'),
(875, 20, 'Mengatur posisi pada kasus prolapse tali pusat'),
(876, 20, 'Melakukan manual plasenta'),
(877, 20, 'Tatalaksana atonia uteri (KBI, KBE, tekanan aorta abdominalis)'),
(878, 20, 'Melakukan resusitasi intrauterine'),
(879, 20, 'Melakukan penanganan komplikasi kehamilan '),
(880, 20, 'Mendeteksi pre eklamsi/eklamsi'),
(881, 20, 'Mendeteksi perdarahan pada kehamilan muda'),
(882, 20, 'Melakukan tatalaksana infeksi nifas'),
(883, 20, 'Mengetahui penyebab infeksi nifas'),
(884, 20, 'Melakukan penanganan kegawatdaruratan neonatal'),
(885, 20, 'Melakukan tatalaksana pada bayi hipotermia'),
(886, 20, 'Melakukan tatalaksana pada bayi BBLR'),
(887, 20, 'Melakukan tatalaksana asfiksia pada BBL'),
(888, 20, 'Melakukan tatalaksana kejang pada BBL'),
(889, 20, 'Melakuka rujukan dan transportasi BBL'),
(890, 20, 'Memberikan pelayanan IUD'),
(891, 20, 'Memasang IUD post plasenta'),
(892, 20, 'Memasang IUD pada pasangan usia subur'),
(893, 20, 'Melepas IUD'),
(894, 20, 'Memberikan pelayanan kontrasepsi bawah kulit (Implant)'),
(895, 20, 'Memasang Implant'),
(896, 20, 'Melepas Implant');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `masa_garansi` int(11) NOT NULL,
  `garansi` varchar(11) NOT NULL,
  `foto_barang` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `kode_transaksi`, `tgl_transaksi`, `nama_barang`, `kode_barang`, `merk`, `tipe`, `no_seri`, `harga`, `jumlah`, `satuan`, `masa_garansi`, `garansi`, `foto_barang`) VALUES
(1, '20241119001', '2024-11-19', 'tutyuyuytu', '01', 'yuyutyu', 'L3110', '23', 1000000, 1, 'unit', 0, '1', '673c431544b44_tes rongten.jpg'),
(2, '20241123001', '2024-11-23', 'Muktiono', '03', 'Epson', 'L3110', '', 1000000, 1, 'unit', 0, '1', 'box.png'),
(3, '20241123002', '2024-11-23', 'Printer Laser', '05B', 'Epson', 'L3110', 'ST1225005', 2500000, 2, 'unit', 0, '1', 'box.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyerahan`
--

CREATE TABLE `detail_penyerahan` (
  `id` int(11) NOT NULL,
  `kode_penyerahan` varchar(50) NOT NULL,
  `kode_inv` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `ruangan` varchar(25) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `foto_barang` varchar(1000) NOT NULL,
  `parameter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penyerahan`
--

INSERT INTO `detail_penyerahan` (`id`, `kode_penyerahan`, `kode_inv`, `unit`, `ruangan`, `nama_barang`, `kode_barang`, `merk`, `tipe`, `foto_barang`, `parameter`) VALUES
(2, '000002', 'RSPU/03/AUDIO METRI/I/24/001', 'AUDIO METRI', 'AUDIO METRI', 'Muktiono', '03', 'Epson', 'L3110', 'box.png', 0),
(3, '000003', 'RSPU/05B/APOTEKER/I/24/001', 'APOTEKER', 'APOTEKER', 'Printer Laser', '05B', 'Epson', 'L3110', 'box.png', 0),
(4, '', 'RSPM/07/ADMIN LINEN/I/00/001', 'ADMIN LINEN', 'ADMIN LINEN', 'Ac 1 Pk + REMOTE', '07', 'Midea\r\n', '', '', 1),
(5, '', 'RSPM/04/ADMIN LINEN/I/00/001', 'ADMIN LINEN', 'ADMIN LINEN', 'Meja Kerja', '', '', '', '', 1),
(6, '', 'RSPM/04/ADMIN LINEN/I/00/002', 'ADMIN LINEN', 'ADMIN LINEN', 'Meja Kerja', '', '', '', '', 1),
(7, '', 'RSPM/04/ADMIN LINEN/I/00/002', 'ADMIN LINEN', 'ADMIN LINEN', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_unit`
--

CREATE TABLE `detail_unit` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_unit`
--

INSERT INTO `detail_unit` (`id`, `unit`, `ruangan`) VALUES
(1, 'ARIMBI', 'NS. ARIMBI'),
(2, 'ARIMBI', 'KORIDOR ARIMB'),
(3, 'ARIMBI', 'GUDANG ARIMBI'),
(4, 'ARIMBI', 'KORIDOR ARIMBI'),
(5, 'ARIMBI', 'ARIMBI 201'),
(6, 'ARIMBI', 'ARIMBI 202'),
(7, 'ARIMBI', 'ARIMBI 203'),
(8, 'ARIMBI', 'ARIMBI 205'),
(9, 'ARIMBI', 'ARIMBI 206'),
(10, 'ARIMBI', 'ARIMBI 207'),
(11, 'ARIMBI', 'ARIMBI 208'),
(12, 'ARIMBI', 'ARIMBI 216'),
(13, 'ARIMBI', 'ARIMBI 217'),
(14, 'ARIMBI', 'ARIMBI 218'),
(15, 'ARIMBI', 'ARIMBI 219'),
(16, 'ARIMBI', 'ARIMBI 220'),
(17, 'ARIMBI', 'ARIMBI 221'),
(18, 'ARIMBI', 'ARIMBI 222'),
(19, 'ARIMBI', 'ARIMBI 223'),
(20, 'ARIMBI', 'ARIMBI 204'),
(21, 'ARIMBI', 'ARIMBI 231'),
(22, 'ARIMBI', 'ARIMBI 232'),
(23, 'AULA', 'AULA DALAM'),
(24, 'AULA', 'AULA LUAR'),
(25, 'DEWI KUNTHI', 'NS.DEWI KHUNTI'),
(26, 'DEWI KUNTHI', 'DWKT 209'),
(27, 'DEWI KUNTHI', 'DWKT 210'),
(28, 'DEWI KUNTHI', 'DWKT 211'),
(29, 'DEWI KUNTHI', 'DWKT 212'),
(30, 'DEWI KUNTHI', 'DWKT 213'),
(31, 'DEWI KUNTHI', 'DWKT 214'),
(32, 'DEWI KUNTHI', 'DWKT 215'),
(33, 'DEWI KUNTHI', 'DWKT 224'),
(34, 'DEWI KUNTHI', 'DWKT 225'),
(35, 'DEWI KUNTHI', 'DWKT 226'),
(36, 'DEWI KUNTHI', 'DWKT 227'),
(37, 'DEWI KUNTHI', 'DWKT 228'),
(38, 'DEWI KUNTHI', 'DWKT 229'),
(39, 'DEWI KUNTHI', 'DWKT 230'),
(40, 'FARMASI', 'FARMASI RJ'),
(41, 'FARMASI', 'FARMASI SATELIT'),
(42, 'FARMASI', 'GUDANG FARMASI'),
(43, 'HEMODIALISA', 'R. KONSULTASI'),
(44, 'HEMODIALISA', 'R. REUSE'),
(45, 'HEMODIALISA', 'HEMODIALISA'),
(46, 'IBS', 'OK I'),
(47, 'IBS', 'OK II'),
(48, 'IBS', 'OK III'),
(49, 'IBS', 'OK IV'),
(50, 'IBS', 'R.RR'),
(51, 'IBS', 'R. GANTI P'),
(52, 'IBS', 'R. GANTI L'),
(53, 'IBS', 'R. ISTR'),
(54, 'IBS', 'R. R. OK'),
(55, 'IBS', 'IBS'),
(56, 'IBS', 'LRG IBS'),
(57, 'IBS', 'R. STERIL '),
(58, 'IBS', 'R. ALKES'),
(59, 'IBS', 'R. TERIMA'),
(60, 'KASIR', 'KASIR IGD'),
(61, 'KASIR', 'KASIR  POLI'),
(62, 'LOBY', 'LOBY DEPAN'),
(63, 'LOBY', 'LOBY TAMAN KERING'),
(64, 'MEETING ROOM', 'MR 1'),
(65, 'MEETING ROOM', 'MR 2'),
(66, 'MEETING ROOM', 'MR 3'),
(67, 'PENDAFTARAN', 'PEND. SATELIT'),
(68, 'PENDAFTARAN', 'PEND. RJ'),
(69, 'PENDAFTARAN', 'PEND. TPPRI'),
(70, 'POLIKLINIK', 'POLI OBGYN'),
(71, 'POLIKLINIK', 'POLI OBGYN 2'),
(72, 'POLIKLINIK', 'POLI JANTUNG'),
(73, 'POLIKLINIK', 'CATHLAB'),
(74, 'POLIKLINIK', 'POLI JIWA'),
(75, 'POLIKLINIK', 'POLI GIGI 1'),
(76, 'POLIKLINIK', 'POLI GIGI 2'),
(77, 'POLIKLINIK', 'POLI DALAM 1'),
(78, 'POLIKLINIK', 'POLI DALAM 2'),
(79, 'POLIKLINIK', 'POLI BEDAH'),
(80, 'POLIKLINIK', 'POLI SYARAF'),
(81, 'POLIKLINIK', 'POLI MATA'),
(82, 'POLIKLINIK', 'POLI THT'),
(83, 'POLIKLINIK', 'POLI KK'),
(84, 'POLIKLINIK', 'POLI ANAK 1'),
(85, 'POLIKLINIK', 'POLI ANAK 2'),
(86, 'POLIKLINIK', 'POLI PARU'),
(87, 'POLIKLINIK', 'POLI TINDAKAN'),
(88, 'POLIKLINIK', 'NURSESTATION II'),
(89, 'POLIKLINIK', 'NURSESTATION I'),
(90, 'POLIKLINIK', 'R,GANTI PERAWAT'),
(91, 'POLIKLINIK', 'P.DOT'),
(92, 'PUNTADEWA', 'PUNTADEWA C01'),
(93, 'PUNTADEWA', 'PUNTADEWA C02'),
(94, 'PUNTADEWA', 'PUNTADEWA C03'),
(95, 'PUNTADEWA', 'PUNTADEWA C04'),
(96, 'PUNTADEWA', 'PUNTADEWA C05'),
(97, 'PUNTADEWA', 'PUNTADEWA C06'),
(98, 'RAMA', 'NS RAMA'),
(99, 'RAMA', 'GUDANG RAMA'),
(100, 'RAMA', 'RAMA 301'),
(101, 'RAMA', 'RAMA 302'),
(102, 'RAMA', 'RAMA 303'),
(103, 'RAMA', 'RAMA 304'),
(104, 'RAMA', 'RAMA 305'),
(105, 'RAMA', 'RAMA 306'),
(106, 'RAMA', 'RAMA 307'),
(107, 'RAMA', 'RAMA 308'),
(108, 'RAMA', 'RAMA 309'),
(109, 'RAMA', 'RAMA 310'),
(110, 'RAMA', 'RAMA 311'),
(111, 'RAMA', 'RAMA 312'),
(112, 'RAMA', 'RAMA 313'),
(113, 'RAMA', 'RAMA 314'),
(114, 'RAMA', 'RAMA 315'),
(115, 'RAMA', 'RAMA 316'),
(116, 'RAMA', 'RAMA 317'),
(117, 'RAMA', 'RAMA 318'),
(118, 'RAMA', 'RAMA 319'),
(119, 'RAMA', 'RAMA 320'),
(120, 'RAMA', 'RAMA 321'),
(121, 'RAMA', 'RAMA 322'),
(122, 'RAMA', 'RAMA 323'),
(123, 'RAMA', 'RAMA 324'),
(124, 'RAMA', 'RAMA 325'),
(125, 'RAMA', 'RAMA 326'),
(126, 'RAMA', 'RAMA 327'),
(127, 'RAMA', 'RAMA 328'),
(128, 'RAMA', 'RAMA 329'),
(129, 'RAMA', 'RAMA 330'),
(130, 'RAMA', 'RAMA 331'),
(131, 'RAMA', 'KOR,RAMA'),
(132, 'REKAM MEDIS', 'FILING'),
(133, 'REKAM MEDIS', 'RM'),
(134, 'SRIKANDI', 'NS SRIKANDI'),
(135, 'SRIKANDI', 'SRIKANDI 5'),
(136, 'SRIKANDI', 'SRIKANDI 4'),
(137, 'DIREKSI', 'DIREKTUR RS'),
(138, 'DIREKSI', 'DIREKTUR PT'),
(146, 'IT3', 'SERVER'),
(147, 'IT3', 'GUDANG'),
(148, 'IT3', 'UMUM'),
(170, 'ARJUNA INDRA', 'C05'),
(171, 'ARJUNA INDRA', 'C06'),
(172, 'ARJUNA INDRA', 'C09'),
(173, 'ARJUNA INDRA', 'C10'),
(174, 'ARJUNA INDRA', 'C11'),
(175, 'ARJUNA INDRA', 'C12'),
(176, 'ARJUNA INDRA', 'ASDASDASDASDASD');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(110) NOT NULL,
  `KTP` varchar(1000) NOT NULL,
  `KK` varchar(1000) NOT NULL,
  `IJAZAH` varchar(1000) NOT NULL,
  `PPNI` varchar(1000) NOT NULL,
  `SIP` varchar(1000) NOT NULL,
  `STR` varchar(1000) NOT NULL,
  `NPWP` varchar(1000) NOT NULL,
  `FOTO` varchar(10000) NOT NULL,
  `PORTOFOLIO` varchar(1000) NOT NULL,
  `TRANSKIP` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `nopeg`, `KTP`, `KK`, `IJAZAH`, `PPNI`, `SIP`, `STR`, `NPWP`, `FOTO`, `PORTOFOLIO`, `TRANSKIP`) VALUES
(228, '12262398', '68ccc8461535a_23919322_6837107.jpg', '68ccc8543a744_23917031_6846928.jpg', '68ccc8620eee8_23919322_6837107.jpg', '68ccc86d05165_23917031_6846928.jpg', '68ccc878223e1_23919322_6837107.jpg', '68ccc87fe669e_23919322_6837107.jpg', '68ccc893c84a0_23917031_6846928.jpg', '68ccb54ce5b98_23919322_6837107.jpg', '68ccc83678305_23919322_6837107.jpg', '68ccc8a9da4ed_23919322_6837107.jpg'),
(229, '5591388', '68ce0541eb2b9_23917031_6846928.jpg', '68ce05addd8a9_58420911_9264746.jpg', '', '', '', '', '', '68ce05165e5dd_23919322_6837107.jpg', '', ''),
(230, '12712497', '68ce0ce08aa6b_Document (1).pdf', '68d3a5308da76_PPI.pdf', '', '', '', '', '', '68ce05f42a9d4_23919322_6837107.jpg', '', ''),
(231, '11362295', '68ce0ee825c5a_3324162811970001.pdf', '68ce15a556d98_3324162811970001.pdf', '68ce0fc31a368_3324162811970001.pdf', '68ce103c5c106_online-doctor-concept.png', '68ce1054b1b04_4167277_18772.jpg', '68ce127ef31b4_covid19-healthcare-workers-pandemic-concept-surprised-happy-asian-female-doctor-nurse-', '68ce128c06b0e_online-doctor-concept.png', '68ce0ed14bb91_23917031_6846928.jpg', '68ce13c0ca931_67788b7807859_rb_2336 (2).png', '68ce13caa11f4_5259881_20616.jpg'),
(232, '12482300', '68ddd80f4fefc_3a9a4f289cdfe5dfedc8ff852614a8fa.jpg', '68ddd83be8d86_Form.pdf', '68ddd870a0bf0_blangko-ijazah-smp-2015.jpg', '68ddd8ace0a8e_285393KTA PPNI HENDI.jpg', '68ddda200cbad_w_58.jpg', '68ddda52a985c_Foto-9-1.jpg', '68dddbb1430c1_23919322_6837107.jpg', '68ddd7b40dca3_SITI ZUBAIDAH.jpeg', '68dddbb8882a4_68b11510e5a9b_bilangan bulat.pdf', '68dddbc5b8229_blangko-ijazah-smp-2015.jpg'),
(233, '11882297', '68f1a12380696_3a9a4f289cdfe5dfedc8ff852614a8fa.jpg', '68f24cc455f99_Foto-9-1.jpg', '68f24cfad1a8a_blangko-ijazah-smp-2015.jpg', '68f1a2075fd70_freepik-gradient-grid-geometric-forms-honorable-achievement-certificate-20251009014410Ilvn.jpeg', '68f24c8650447_freepik-gradient-grid-geometric-forms-honorable-achievement-certificate-20251009014410Ilvn.jpeg', '68f24d136aea1_blangko-ijazah-smp-2015.jpg', '68f24d253ea78_w_58.jpg', '68f19b058f624_68ac0e265688f_Sample-1-1.jpg', '68f24d4529e86_w_58.jpg', '68f24da61b96e_WhatsApp Image 2025-08-12 at 08.48.43.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `file_detail`
--

CREATE TABLE `file_detail` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(50) NOT NULL,
  `jenis_file` varchar(100) NOT NULL,
  `nama_file` varchar(1000) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `no_file` varchar(100) NOT NULL,
  `tgl_upload` date NOT NULL,
  `kode_pengajuan` varchar(100) DEFAULT NULL,
  `catatan` varchar(1000) DEFAULT NULL,
  `validasi` varchar(11) DEFAULT NULL,
  `tgl_validasi` date DEFAULT NULL,
  `validator` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_detail`
--

INSERT INTO `file_detail` (`id`, `nopeg`, `jenis_file`, `nama_file`, `tgl_keluar`, `tgl_berakhir`, `no_file`, `tgl_upload`, `kode_pengajuan`, `catatan`, `validasi`, `tgl_validasi`, `validator`) VALUES
(47, '12262398', 'FOTO', '68ccb54ce5b98_23919322_6837107.jpg', '0000-00-00', '0000-00-00', '', '2025-09-19', '20250919001', '', 'ada', '2025-09-25', '12712497'),
(48, '12262398', 'PORTOFOLIO', '68ccc83678305_23919322_6837107.jpg', '0000-00-00', '0000-00-00', '', '2025-09-19', '20250919001', 'sdsd', 'ada', '2025-09-23', '12712497'),
(49, '12262398', 'KTP', '68ccc8461535a_23919322_6837107.jpg', '2025-09-19', '0000-00-00', '3324161616161', '2025-09-19', '20250919001', '', 'ada', '2025-09-20', '12712497'),
(50, '12262398', 'KK', '68ccc8543a744_23917031_6846928.jpg', '2025-09-19', '0000-00-00', '153151531', '2025-09-19', '20250919001', '', 'ada', '2025-09-20', '12712497'),
(51, '12262398', 'IJAZAH', '68ccc8620eee8_23919322_6837107.jpg', '2025-09-19', '0000-00-00', '74988798', '2025-09-19', '20250919001', '', 'ada', '2025-09-20', '12712497'),
(52, '12262398', 'PPNI', '68ccc86d05165_23917031_6846928.jpg', '2025-09-19', '0000-00-00', '2', '2025-09-19', '20250919001', '', 'proses', '2025-09-25', '12712497'),
(53, '12262398', 'SIP', '68ccc878223e1_23919322_6837107.jpg', '2025-09-19', '0000-00-00', '1', '2025-09-19', '20250919001', '', 'ada', '2025-09-20', '12712497'),
(54, '12262398', 'STR', '68ccc87fe669e_23919322_6837107.jpg', '0000-00-00', '0000-00-00', '', '2025-09-19', '20250919001', 'Tanggal Dibuat Masih Kosong', 'tidak', '2025-09-20', '12712497'),
(55, '12262398', 'NPWP', '68ccc893c84a0_23917031_6846928.jpg', '2020-09-19', '2025-09-19', '2121', '2025-09-19', '20250919001', 'sedang dalam tahap pembuatan', 'proses', '2025-09-20', '12712497'),
(56, '12262398', 'TRANSKIP', '68ccc8a9da4ed_23919322_6837107.jpg', '2025-09-19', '2026-09-19', '6565', '2025-09-19', '20250919001', '', 'ada', '2025-09-20', '12712497'),
(57, '12262398', 'SERTIFIKAT', '68ccc8bc25a8a_23919322_6837107.jpg', '2025-09-19', '0000-00-00', '65465', '2025-09-19', '20250919001', 'sdasdasdasd', 'tidak', '2025-09-22', '12712497'),
(58, '5591388', 'FOTO', '68ce05165e5dd_23919322_6837107.jpg', '0000-00-00', '0000-00-00', '', '2025-09-20', NULL, NULL, NULL, NULL, NULL),
(59, '5591388', 'KTP', '68ce0541eb2b9_23917031_6846928.jpg', '2021-09-20', '0000-00-00', '3324162811970001', '2025-09-20', NULL, NULL, NULL, NULL, NULL),
(60, '5591388', 'KK', '68ce05addd8a9_58420911_9264746.jpg', '2025-09-20', '0000-00-00', '3232323233690222', '2025-09-20', NULL, NULL, NULL, NULL, NULL),
(61, '12712497', 'FOTO', '68ce05f42a9d4_23919322_6837107.jpg', '0000-00-00', '0000-00-00', '', '2025-09-20', NULL, NULL, NULL, NULL, NULL),
(62, '12712497', 'KTP', '68ce0ce08aa6b_Document (1).pdf', '2025-09-20', '0000-00-00', '3324160002152115', '2025-09-20', NULL, NULL, NULL, NULL, NULL),
(63, '11362295', 'FOTO', '68ce0ed14bb91_23917031_6846928.jpg', '0000-00-00', '0000-00-00', '', '2025-09-20', '20250920001', '', 'ada', '2025-10-17', '12712497'),
(64, '11362295', 'KTP', '68ce0ee825c5a_3324162811970001.pdf', '2025-09-20', '0000-00-00', '3324162811970001', '2025-09-20', '20250920001', '', 'ada', '2025-09-20', '12712497'),
(65, '11362295', 'IJAZAH', '68ce0fc31a368_3324162811970001.pdf', '2025-09-20', '0000-00-00', 'AB/5445454/IX', '2025-09-20', '20250920001', '', 'proses', '2025-10-17', '12712497'),
(66, '11362295', 'PPNI', '68ce103c5c106_online-doctor-concept.png', '2025-09-20', '2028-09-20', '5252582', '2025-09-20', '20250920001', '', 'ada', '2025-10-17', '12712497'),
(67, '11362295', 'SIP', '68ce1054b1b04_4167277_18772.jpg', '2025-09-20', '2026-04-08', '632565956', '2025-09-20', '20250920001', 'Sedang Menunggu Proses Pengirimina', 'proses', '2025-09-20', '12712497'),
(68, '11362295', 'STR', '68ce127ef31b4_covid19-healthcare-workers-pandemic-concept-surprised-happy-asian-female-doctor-nurse-scrubs-showing-okay-gesture-smiling-amazed-praise-nice-work-agree-with-someone.png', '2025-09-20', '0000-00-00', '2211221', '2025-09-20', NULL, NULL, NULL, NULL, NULL),
(69, '11362295', 'NPWP', '68ce128c06b0e_online-doctor-concept.png', '0000-00-00', '0000-00-00', '1231321451431354', '2025-09-20', '20250920001', 'Sedang Proses', 'proses', '2025-09-20', '12712497'),
(70, '11362295', 'PORTOFOLIO', '68ce13c0ca931_67788b7807859_rb_2336 (2).png', '0000-00-00', '0000-00-00', '', '2025-09-20', '20250920001', '', 'ada', '2025-09-20', '12712497'),
(71, '11362295', 'TRANSKIP', '68ce13caa11f4_5259881_20616.jpg', '0000-00-00', '0000-00-00', '', '2025-09-20', '20250920001', '', 'ada', '2025-09-20', '12712497'),
(72, '11362295', 'SERTIFIKAT', '68ce13ea3a22b_WhatsApp Image 2025-06-14 at 10.45.04.jpeg', '0000-00-00', '0000-00-00', '1231321112', '2025-09-20', '20250920001', '', 'ada', '2025-10-17', '12712497'),
(73, '11362295', 'SERTIFIKAT', '68ce1592121df_23919322_6837107.jpg', '2025-09-01', '0000-00-00', '15154654', '2025-09-20', '20250920001', '', 'proses', '2025-10-17', '12712497'),
(74, '11362295', 'KK', '68ce15a556d98_3324162811970001.pdf', '0000-00-00', '0000-00-00', '', '2025-09-20', '20250920001', '', 'ada', '2025-09-20', '12712497'),
(75, '12262398', 'SERTIFIKAT', '68ce552122f2f_3324162811970001.pdf', '0000-00-00', '0000-00-00', '52522', '2025-09-20', '20250919001', '', 'tidak', '2025-09-23', '12712497'),
(76, '12712497', 'KK', '68d3a5308da76_PPI.pdf', '0000-00-00', '0000-00-00', '', '2025-09-24', NULL, NULL, NULL, NULL, NULL),
(77, '12482300', 'FOTO', '68ddd7b40dca3_SITI ZUBAIDAH.jpeg', '0000-00-00', '0000-00-00', '', '2025-10-02', '20251002001', 'bg harus merah', 'ada', '2025-10-02', '12712497'),
(78, '12482300', 'KTP', '68ddd80f4fefc_3a9a4f289cdfe5dfedc8ff852614a8fa.jpg', '2015-10-30', '0000-00-00', '3325122315890001', '2025-10-02', '20251002001', 'foto tidak asli', 'ada', '2025-10-02', '12712497'),
(79, '12482300', 'KK', '68ddd83be8d86_Form.pdf', '0000-00-00', '0000-00-00', '45154248454897454', '2025-10-02', '20251002001', 'kurang jelas', 'tidak', '2025-10-02', '12712497'),
(80, '12482300', 'IJAZAH', '68ddd870a0bf0_blangko-ijazah-smp-2015.jpg', '2018-10-02', '0000-00-00', '15/AB/SASDS/2018', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(81, '12482300', 'PPNI', '68ddd8ace0a8e_285393KTA PPNI HENDI.jpg', '2025-10-02', '2028-10-02', '451451454584', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(82, '12482300', 'SIP', '68ddda200cbad_w_58.jpg', '2018-10-02', '2025-10-24', 'asdasd45245546', '2025-10-02', '20251002001', '', 'proses', '2025-10-02', '12712497'),
(83, '12482300', 'STR', '68ddda52a985c_Foto-9-1.jpg', '2025-10-02', '0000-00-00', '58454545', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(84, '12482300', 'NPWP', '68dddbb1430c1_23919322_6837107.jpg', '2025-10-02', '0000-00-00', 'a545464', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(85, '12482300', 'PORTOFOLIO', '68dddbb8882a4_68b11510e5a9b_bilangan bulat.pdf', '0000-00-00', '0000-00-00', '', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(86, '12482300', 'TRANSKIP', '68dddbc5b8229_blangko-ijazah-smp-2015.jpg', '2025-10-02', '0000-00-00', '514553554', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(87, '12482300', 'SERTIFIKAT', '68dddbe8bcd4a_3324162811970001.pdf', '2025-10-02', '0000-00-00', '123151415', '2025-10-02', '20251002001', '', 'ada', '2025-10-02', '12712497'),
(88, '12482300', 'SERTIFIKAT', '68dddbf9e4e17_68b11510e5a9b_bilangan bulat.pdf', '2025-10-02', '0000-00-00', '584531644', '2025-10-02', '20251002001', '', 'proses', '2025-10-02', '12712497'),
(89, '11882297', 'FOTO', '68f19b058f624_68ac0e265688f_Sample-1-1.jpg', '0000-00-00', '0000-00-00', '', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497'),
(90, '11882297', 'KTP', '68f1a12380696_3a9a4f289cdfe5dfedc8ff852614a8fa.jpg', '2019-10-01', '0000-00-00', '3321464844654001', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497'),
(91, '11882297', 'PPNI', '68f1a2075fd70_freepik-gradient-grid-geometric-forms-honorable-achievement-certificate-20251009014410Ilvn.jpeg', '2020-10-17', '2025-10-15', '5748748', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497'),
(92, '11882297', 'SIP', '68f24c8650447_freepik-gradient-grid-geometric-forms-honorable-achievement-certificate-20251009014410Ilvn.jpeg', '2023-10-17', '2025-10-31', 'AB123', '2025-10-17', '20251017001', '', 'proses', '2025-10-17', '12712497'),
(93, '11882297', 'KK', '68f24cc455f99_Foto-9-1.jpg', '2025-10-08', '0000-00-00', '3324162811970001', '2025-10-17', '20251017001', 'Foto Kurang Jelas', 'tidak', '2025-10-17', '12712497'),
(94, '11882297', 'IJAZAH', '68f24cfad1a8a_blangko-ijazah-smp-2015.jpg', '2018-10-17', '0000-00-00', 'AC1251486SD', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497'),
(95, '11882297', 'STR', '68f24d136aea1_blangko-ijazah-smp-2015.jpg', '2025-10-17', '0000-00-00', 'AC1251486SD', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497'),
(96, '11882297', 'NPWP', '68f24d253ea78_w_58.jpg', '2025-06-11', '0000-00-00', 'AC1251486SD', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497'),
(97, '11882297', 'PORTOFOLIO', '68f24d4529e86_w_58.jpg', '0000-00-00', '0000-00-00', '', '2025-10-17', '20251017001', '', 'proses', '2025-10-17', '12712497'),
(98, '11882297', 'SERTIFIKAT', '68f24d85cce16_alur.png', '2025-05-14', '0000-00-00', '56756784', '2025-10-17', '20251017001', 'sadasdasdasd', 'tidak', '2025-10-17', '12712497'),
(99, '11882297', 'TRANSKIP', '68f24da61b96e_WhatsApp Image 2025-08-12 at 08.48.43.jpeg', '2025-10-17', '0000-00-00', 'Sertifikat Kompetensi', '2025-10-17', '20251017001', '', 'ada', '2025-10-17', '12712497');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `no_gaji` varchar(1000) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `nopeg` varchar(25) NOT NULL,
  `upah_awal` int(11) NOT NULL,
  `penambahan` int(11) NOT NULL,
  `revisi` int(11) NOT NULL,
  `bpjs_kerja` int(11) NOT NULL,
  `bpjs_kes` int(11) NOT NULL,
  `pph21` int(11) NOT NULL,
  `ppni` int(11) NOT NULL,
  `lelayu` int(11) DEFAULT NULL,
  `lain` int(11) NOT NULL,
  `tj_jbtn` int(11) NOT NULL,
  `tj_fungsional` int(11) NOT NULL,
  `tj_resiko` int(11) NOT NULL,
  `fee_for_servis` int(11) NOT NULL,
  `tj_tpbri` int(11) NOT NULL,
  `tj_mcu` int(11) NOT NULL,
  `tj_bpjs` int(11) NOT NULL,
  `fee_pembimbing` int(11) DEFAULT NULL,
  `lembur` int(11) NOT NULL,
  `thr` int(11) NOT NULL,
  `tj_lain` int(11) NOT NULL,
  `penyesuaian` int(11) NOT NULL,
  `bruto` int(11) NOT NULL,
  `total_pendapatan` int(11) NOT NULL,
  `total_potongan` int(11) NOT NULL,
  `obat` int(11) NOT NULL,
  `seragam` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `pelatihan` int(11) NOT NULL,
  `uang_gedung` int(11) NOT NULL,
  `total_potongan_slip` int(11) NOT NULL,
  `transfer` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `kode_transaksi`, `bulan`, `tahun`, `no_gaji`, `tgl_gaji`, `nopeg`, `upah_awal`, `penambahan`, `revisi`, `bpjs_kerja`, `bpjs_kes`, `pph21`, `ppni`, `lelayu`, `lain`, `tj_jbtn`, `tj_fungsional`, `tj_resiko`, `fee_for_servis`, `tj_tpbri`, `tj_mcu`, `tj_bpjs`, `fee_pembimbing`, `lembur`, `thr`, `tj_lain`, `penyesuaian`, `bruto`, `total_pendapatan`, `total_potongan`, `obat`, `seragam`, `kredit`, `pelatihan`, `uang_gedung`, `total_potongan_slip`, `transfer`, `status`) VALUES
(17745, 'GJ-001', '8', '2025', '1', '0000-00-00', '5591388', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17746, 'GJ-001', '8', '2025', '2', '2025-09-11', '7721584', 2835021, 225949, 3060969, 103645, 34548, 0, 0, 6000, 0, 200000, 0, 0, 0, 0, 45667, 0, 0, 0, 0, 0, 0, 3306636, 3162442, 144193, 0, 0, 0, 0, 0, 0, 3162442, '1'),
(17747, 'GJ-001', '8', '2025', '3', '2025-09-11', '10361987', 2405000, 300000, 2705000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2705000, 2560807, 144193, 0, 0, 0, 0, 0, 0, 2560807, '1'),
(17748, 'GJ-001', '8', '2025', '4', '2025-09-11', '11002079', 2594100, 300000, 2894100, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2894100, 2749907, 144193, 0, 0, 0, 0, 0, 0, 2749907, '1'),
(17749, 'GJ-001', '8', '2025', '5', '2025-09-11', '7831578', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(17750, 'GJ-001', '8', '2025', '6', '2025-09-11', '0630784', 3582500, 100000, 3682500, 108540, 38325, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 178083, 204311, 0, 390000, 0, 0, 0, 4804894, 4652029, 152865, 0, 0, 0, 0, 0, 0, 4652029, '1'),
(17751, 'GJ-001', '8', '2025', '7', '2025-09-11', '9531782', 2545613, 300000, 2845613, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2845613, 2701419, 144193, 0, 0, 0, 0, 0, 0, 2701419, '1'),
(17752, 'GJ-001', '8', '2025', '8', '2025-09-11', '12262398', 2470000, 365021, 2835021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3085021, 2918828, 166193, 3900, 0, 0, 0, 0, 3900, 2914928, '1'),
(17753, 'GJ-001', '8', '2025', '9', '2025-09-11', '6311395', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 500000, 204311, 0, 0, 0, 0, 0, 4298280, 4154087, 144193, 0, 0, 1225700, 0, 0, 1225700, 2928387, '1'),
(17754, 'GJ-001', '8', '2025', '10', '2025-09-11', '11922297', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 166100, 0, 0, 0, 3910069, 3765876, 144193, 0, 0, 0, 0, 0, 0, 3765876, '1'),
(17755, 'GJ-001', '8', '2025', '11', '2025-09-11', '8501683', 2126838, 300000, 2426838, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2426838, 2282644, 144193, 0, 0, 0, 0, 0, 0, 2282644, '1'),
(17756, 'GJ-001', '8', '2025', '12', '0000-00-00', '7861579', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17757, 'GJ-001', '8', '2025', '13', '2025-09-11', '0880769', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3593969, 3449776, 144193, 25900, 0, 0, 0, 0, 25900, 3423876, '1'),
(17758, 'GJ-001', '8', '2025', '14', '2025-09-11', '7271590', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 350000, 0, 200000, 447348, 0, 0, 0, 150000, 0, 0, 0, 0, 4391317, 4225124, 166193, 9700, 0, 0, 0, 0, 9700, 4215424, '1'),
(17759, 'GJ-001', '8', '2025', '15', '2025-09-11', '9141794', 2500000, 300000, 2800000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2800000, 2655807, 144193, 11300, 0, 0, 0, 0, 11300, 2644507, '1'),
(17760, 'GJ-001', '8', '2025', '16', '2025-09-11', '8851684', 2810025, 250324, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(17761, 'GJ-001', '8', '2025', '17', '2025-09-11', '11822297', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3593969, 3449776, 144193, 42200, 0, 0, 0, 0, 42200, 3407576, '1'),
(17762, 'GJ-001', '8', '2025', '18', '2025-09-11', '11362295', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3160349, 2994156, 166193, 0, 0, 0, 0, 0, 0, 2994156, '1'),
(17763, 'GJ-001', '8', '2025', '19', '2025-09-11', '11262284', 2324000, 300000, 2624000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2624000, 2479807, 144193, 0, 0, 0, 0, 0, 0, 2479807, '1'),
(17764, 'GJ-001', '8', '2025', '20', '2025-09-11', '12192301', 2470000, 365021, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 165600, 0, 0, 0, 3000621, 2856428, 144193, 0, 0, 0, 0, 0, 0, 2856428, '1'),
(17765, 'GJ-001', '8', '2025', '21', '2025-09-11', '12022293', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 0, 0, 10000, 0, 0, 78500, 0, 0, 0, 3198849, 3032656, 166193, 0, 0, 0, 0, 0, 0, 3032656, '1'),
(17766, 'GJ-001', '8', '2025', '22', '2025-09-11', '11832297', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 500000, 0, 0, 0, 0, 306466, 0, 151600, 0, 0, 0, 4552035, 4407842, 144193, 103700, 0, 0, 0, 0, 103700, 4304142, '1'),
(17767, 'GJ-001', '8', '2025', '23', '2025-09-11', '11192299', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 0, 0, 122000, 0, 0, 21400, 0, 0, 0, 3253749, 3087556, 166193, 124400, 0, 0, 0, 0, 124400, 2963156, '1'),
(17768, 'GJ-001', '8', '2025', '24', '2025-09-11', '0800778', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17769, 'GJ-001', '8', '2025', '25', '2025-09-11', '7821593', 2835021, 225328, 3060349, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2847059, 213290, 0, 0, 0, 0, 0, 0, 2847059, '1'),
(17770, 'GJ-001', '8', '2025', '26', '2025-09-11', '12242398', 2470000, 300000, 2770000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 973481, 0, 0, 0, 0, 157100, 0, 0, 0, 3950581, 3784388, 166193, 91000, 0, 0, 0, 0, 91000, 3693388, '1'),
(17771, 'GJ-001', '8', '2025', '27', '2025-09-11', '10611986', 3060349, 183620, 3243969, 103645, 36100, 0, 0, 3000, 374305, 350000, 500000, 0, 0, 0, 0, 0, 0, 303300, 0, 0, 0, 4397269, 3880219, 517050, 0, 0, 0, 0, 0, 0, 3880219, '1'),
(17772, 'GJ-001', '8', '2025', '28', '2025-09-11', '11232297', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3493969, 3327776, 166193, 29500, 0, 0, 0, 0, 29500, 3298276, '1'),
(17773, 'GJ-001', '8', '2025', '29', '2025-09-11', '9301786', 2545613, 300000, 2845613, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2845613, 2701419, 144193, 0, 0, 0, 0, 0, 0, 2701419, '1'),
(17774, 'GJ-001', '8', '2025', '30', '2025-09-11', '4381189', 3368000, 100000, 3468000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3718000, 3551807, 166193, 68700, 0, 0, 0, 0, 68700, 3483107, '1'),
(17775, 'GJ-001', '8', '2025', '31', '2025-09-11', '10741998', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3135021, 2990828, 144193, 0, 0, 0, 0, 0, 0, 2990828, '1'),
(17776, 'GJ-001', '8', '2025', '32', '2025-09-11', '11992200', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 1250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4493969, 4349776, 144193, 40700, 0, 0, 0, 0, 40700, 4309076, '1'),
(17777, 'GJ-001', '8', '2025', '33', '2025-09-11', '5371288', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 500000, 0, 50000, 0, 0, 0, 61293, 0, 0, 0, 0, 0, 3855262, 3641972, 213290, 29900, 0, 0, 0, 0, 29900, 3612072, '1'),
(17778, 'GJ-001', '8', '2025', '34', '0000-00-00', '6361389', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17779, 'GJ-001', '8', '2025', '35', '2025-09-11', '6741489', 3060349, 100000, 3160349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3160349, 3016156, 144193, 0, 0, 0, 0, 0, 0, 3016156, '1'),
(17780, 'GJ-001', '8', '2025', '36', '0000-00-00', '7081593', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17781, 'GJ-001', '8', '2025', '37', '2025-09-11', '8681698', 2545113, 289908, 2835021, 103645, 34548, 0, 0, 6000, 0, 200000, 0, 0, 0, 0, 45667, 0, 0, 0, 0, 0, 0, 3080688, 2936494, 144193, 0, 0, 0, 0, 0, 0, 2936494, '1'),
(17782, 'GJ-001', '8', '2025', '38', '2025-09-11', '10201998', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 5000, 0, 0, 110100, 0, 0, 0, 3175449, 3031256, 144193, 0, 0, 0, 0, 0, 0, 3031256, '1'),
(17783, 'GJ-001', '8', '2025', '39', '2025-09-11', '11692296', 2305000, 300000, 2605000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2605000, 2460807, 144193, 0, 0, 0, 0, 0, 0, 2460807, '1'),
(17784, 'GJ-001', '8', '2025', '40', '2025-09-11', '10571995', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3235021, 3068828, 166193, 0, 0, 0, 0, 0, 0, 3068828, '1'),
(17785, 'GJ-001', '8', '2025', '41', '0000-00-00', '12402392', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17786, 'GJ-001', '8', '2025', '42', '2025-09-11', '10842092', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 200000, 187500, 25359, 0, 0, 0, 0, 0, 3473208, 3329015, 144193, 342600, 0, 0, 0, 0, 342600, 2986415, '1'),
(17787, 'GJ-001', '8', '2025', '43', '2025-09-11', '0430784', 3550000, 100000, 3650000, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 100000, 1085192, 0, 0, 0, 0, 274400, 0, 0, 0, 5109592, 4874302, 235290, 0, 0, 0, 0, 0, 0, 4874302, '1'),
(17788, 'GJ-001', '8', '2025', '44', '2025-09-11', '4391187', 3368000, 100000, 3468000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3718000, 3551807, 166193, 143400, 0, 0, 0, 0, 143400, 3408407, '1'),
(17789, 'GJ-001', '8', '2025', '45', '2025-09-11', '11432299', 2476000, 300000, 2776000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2776000, 2631807, 144193, 43000, 0, 0, 0, 0, 43000, 2588807, '1'),
(17790, 'GJ-001', '8', '2025', '46', '2025-09-11', '9311780', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3485021, 3340828, 144193, 0, 0, 0, 0, 0, 0, 3340828, '1'),
(17791, 'GJ-001', '8', '2025', '47', '2025-09-11', '12282399', 2470000, 0, 2470000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 285500, 0, 0, 0, 2755500, 2611307, 144193, 21700, 0, 0, 0, 0, 21700, 2589607, '1'),
(17792, 'GJ-001', '8', '2025', '48', '2025-09-11', '5051293', 3060349, 100000, 3160349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 390000, 0, 0, 0, 3550349, 3406156, 144193, 0, 0, 787500, 0, 0, 787500, 2618656, '1'),
(17793, 'GJ-001', '8', '2025', '49', '2025-09-11', '11282200', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2944156, 166193, 0, 0, 0, 0, 0, 0, 2944156, '1'),
(17794, 'GJ-001', '8', '2025', '50', '2025-09-11', '1110779', 3060349, 183621, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17795, 'GJ-001', '8', '2025', '51', '2025-09-11', '4981289', 3309500, 100000, 3409500, 103645, 34548, 51519, 22000, 6000, 0, 0, 0, 250000, 2747674, 0, 0, 0, 0, 108300, 0, 0, 0, 6515474, 6297761, 217713, 0, 0, 0, 0, 0, 0, 6297761, '1'),
(17796, 'GJ-001', '8', '2025', '52', '2025-09-11', '12092300', 2470000, 365021, 2835021, 103645, 34548, 64344, 22000, 6000, 0, 0, 0, 50000, 3102808, 0, 0, 0, 0, 92800, 0, 0, 0, 6080629, 5850092, 230537, 0, 0, 0, 0, 0, 0, 5850092, '1'),
(17797, 'GJ-001', '8', '2025', '53', '0000-00-00', '12792498', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17798, 'GJ-001', '8', '2025', '54', '2025-09-11', '11272294', 2500000, 300000, 2800000, 103645, 35630, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2800000, 2654725, 145275, 0, 0, 0, 0, 0, 0, 2654725, '1'),
(17799, 'GJ-001', '8', '2025', '55', '2025-09-11', '9871891', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3643969, 3477776, 166193, 0, 0, 0, 0, 0, 0, 3477776, '1'),
(17800, 'GJ-001', '8', '2025', '56', '2025-09-11', '8941691', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 317700, 0, 0, 0, 3378049, 3233856, 144193, 0, 0, 0, 0, 0, 0, 3233856, '1'),
(17801, 'GJ-001', '8', '2025', '57', '2025-09-11', '4251187', 3214600, 100000, 3314600, 103645, 34646, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3314600, 3170309, 144291, 0, 0, 0, 0, 0, 0, 3170309, '1'),
(17802, 'GJ-001', '8', '2025', '58', '2025-09-11', '6031380', 3151000, 92969, 3243969, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 1320000, 0, 0, 0, 0, 0, 0, 0, 0, 4563969, 4385227, 178742, 0, 0, 2270900, 0, 0, 2270900, 2114327, '1'),
(17803, 'GJ-001', '8', '2025', '59', '2025-09-11', '5381272', 3163000, 100000, 3263000, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 4113000, 3968807, 144193, 0, 0, 0, 0, 0, 0, 3968807, '1'),
(17804, 'GJ-001', '8', '2025', '60', '2025-09-11', '1370785', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3135021, 2990828, 144193, 0, 0, 0, 0, 0, 0, 2990828, '1'),
(17805, 'GJ-001', '8', '2025', '61', '2025-09-11', '12392391', 3000000, 0, 3000000, 103645, 34548, 0, 0, 6000, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 131800, 0, 0, 0, 3631800, 3487607, 144193, 15900, 0, 0, 0, 0, 15900, 3471707, '1'),
(17806, 'GJ-001', '8', '2025', '62', '2025-09-11', '4451173', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17807, 'GJ-001', '8', '2025', '63', '2025-09-11', '10191987', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 500000, 510777, 150000, 0, 0, 0, 0, 4754746, 4610553, 144193, 0, 0, 0, 0, 0, 0, 4610553, '1'),
(17808, 'GJ-001', '8', '2025', '64', '2025-09-11', '3131083', 3226500, 100000, 3326500, 108795, 43765, 0, 0, 6000, 0, 1250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4576500, 4417940, 158560, 15500, 0, 1816700, 508000, 0, 2340200, 2077740, '1'),
(17809, 'GJ-001', '8', '2025', '65', '2025-09-11', '3181087', 3426500, 100000, 3526500, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3776500, 3610307, 166193, 20200, 0, 0, 0, 0, 20200, 3590107, '1'),
(17810, 'GJ-001', '8', '2025', '66', '2025-09-11', '8641686', 2835021, 300000, 3135021, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 100000, 1341044, 0, 0, 0, 0, 0, 0, 0, 0, 4576065, 4340775, 235290, 31200, 0, 0, 0, 0, 31200, 4309575, '1'),
(17811, 'GJ-001', '8', '2025', '67', '2025-09-11', '7091593', 3060349, 183620, 3243969, 103645, 103645, 0, 22000, 6000, 0, 350000, 0, 200000, 0, 0, 1168000, 0, 0, 0, 0, 0, 0, 4961969, 4726679, 235290, 136300, 0, 0, 0, 0, 136300, 4590379, '1'),
(17812, 'GJ-001', '8', '2025', '68', '2025-09-11', '11772203', 2500000, 300000, 2800000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 132900, 0, 0, 0, 2932900, 2788707, 144193, 15300, 0, 0, 0, 0, 15300, 2773407, '1'),
(17813, 'GJ-001', '8', '2025', '69', '2025-09-11', '9831892', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 150000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3443969, 3299776, 144193, 19100, 0, 0, 0, 0, 19100, 3280676, '1'),
(17814, 'GJ-001', '8', '2025', '70', '0000-00-00', '7121593', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17815, 'GJ-001', '8', '2025', '71', '2025-09-11', '3050980', 3426500, 100000, 3526500, 103645, 34548, 13678, 22000, 6000, 0, 0, 0, 250000, 1341044, 0, 0, 0, 0, 0, 0, 0, 0, 5117544, 4937672, 179872, 0, 0, 0, 400000, 0, 400000, 4537672, '1'),
(17816, 'GJ-001', '8', '2025', '72', '2025-09-11', '5751391', 3251000, 100000, 3351000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 250000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3859300, 3715107, 144193, 188200, 0, 1362500, 0, 0, 1550700, 2164407, '1'),
(17817, 'GJ-001', '8', '2025', '73', '2025-09-11', '0090778', 2700000, 0, 2700000, 0, 0, 219850, 22000, 0, 0, 0, 0, 0, 4292519, 0, 0, 0, 0, 0, 0, 0, 0, 6992519, 6750669, 241850, 0, 0, 2655600, 0, 0, 2655600, 4095069, '1'),
(17818, 'GJ-001', '8', '2025', '74', '2025-09-11', '8211687', 2810025, 250324, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(17819, 'GJ-001', '8', '2025', '75', '2025-09-11', '7851597', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(17820, 'GJ-001', '8', '2025', '76', '2025-09-11', '0600786', 3300000, 100000, 3400000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3400000, 3186710, 213290, 0, 0, 0, 519702, 0, 519702, 2667008, '1'),
(17821, 'GJ-001', '8', '2025', '77', '2025-09-11', '2650986', 3186000, 57969, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 3743969, 3599776, 144193, 274200, 0, 1703200, 0, 0, 1977400, 1622376, '1'),
(17822, 'GJ-001', '8', '2025', '78', '2025-09-11', '0040779', 3582500, 100000, 3682500, 116475, 81650, 0, 0, 6000, 0, 600000, 0, 0, 0, 0, 250000, 102155, 0, 0, 0, 0, 0, 4634655, 4430530, 204125, 0, 0, 0, 0, 0, 0, 4430530, '1'),
(17823, 'GJ-001', '8', '2025', '79', '2025-09-11', '7391581', 3517500, 100000, 3617500, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 178083, 0, 0, 0, 0, 0, 0, 3795583, 3651390, 144193, 0, 0, 0, 0, 0, 0, 3651390, '1'),
(17824, 'GJ-001', '8', '2025', '80', '2025-09-11', '4211187', 3368000, 100000, 3468000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 178083, 0, 0, 0, 0, 0, 0, 3646083, 3501890, 144193, 0, 0, 0, 0, 0, 0, 3501890, '1'),
(17825, 'GJ-001', '8', '2025', '81', '2025-09-11', '6801494', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 3985021, 3840828, 144193, 0, 0, 1500000, 0, 0, 1500000, 2340828, '1'),
(17826, 'GJ-001', '8', '2025', '82', '2025-09-11', '5131287', 3270000, 100000, 3370000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3370000, 3225807, 144193, 0, 0, 1566900, 0, 0, 1566900, 1658907, '1'),
(17827, 'GJ-001', '8', '2025', '83', '2025-09-11', '12762401', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2966156, 144193, 0, 0, 0, 0, 0, 0, 2966156, '1'),
(17828, 'GJ-001', '8', '2025', '84', '2025-09-11', '12382301', 2000000, 200000, 2200000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2200000, 2055807, 144193, 0, 0, 0, 0, 0, 0, 2055807, '1'),
(17829, 'GJ-001', '8', '2025', '85', '2025-09-11', '6541490', 3192500, 51469, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3493969, 3327776, 166193, 68100, 0, 0, 0, 0, 68100, 3259676, '1'),
(17830, 'GJ-001', '8', '2025', '86', '0000-00-00', '11732200', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17831, 'GJ-001', '8', '2025', '87', '2025-09-11', '7161593', 3060349, 183620, 3243969, 103645, 69097, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3343969, 3143227, 200742, 52800, 0, 0, 0, 0, 52800, 3090427, '1'),
(17832, 'GJ-001', '8', '2025', '88', '2025-09-11', '12822496', 2835021, 0, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 191100, 0, 0, 0, 3026121, 2881928, 144193, 27700, 0, 0, 0, 0, 27700, 2854228, '1'),
(17833, 'GJ-001', '8', '2025', '89', '2025-09-11', '5691392', 3060349, 183620, 3243969, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3065227, 178742, 0, 0, 0, 0, 0, 0, 3065227, '1'),
(17834, 'GJ-001', '8', '2025', '90', '0000-00-00', '6931491', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17835, 'GJ-001', '8', '2025', '91', '2025-09-11', '7201579', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3443969, 3277776, 166193, 0, 0, 0, 0, 0, 0, 3277776, '1'),
(17836, 'GJ-001', '8', '2025', '92', '2025-09-11', '10321992', 2835021, 225328, 3060349, 103645, 138193, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2812511, 247838, 0, 0, 0, 0, 0, 0, 2812511, '1'),
(17837, 'GJ-001', '8', '2025', '93', '2025-09-11', '9861894', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3643969, 3477776, 166193, 0, 0, 0, 0, 0, 0, 3477776, '1'),
(17838, 'GJ-001', '8', '2025', '94', '2025-09-11', '12642495', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 500000, 0, 50000, 0, 0, 0, 61293, 0, 0, 0, 0, 0, 3671642, 3527449, 144193, 0, 0, 0, 0, 0, 0, 3527449, '1'),
(17839, 'GJ-001', '8', '2025', '95', '2025-09-11', '12582499', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2966156, 144193, 0, 0, 0, 0, 0, 0, 2966156, '1'),
(17840, 'GJ-001', '8', '2025', '96', '2025-09-11', '0590786', 3300000, 100000, 3400000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 126000, 0, 0, 0, 0, 0, 0, 0, 0, 3526000, 3381807, 144193, 76400, 0, 0, 0, 0, 76400, 3305407, '1'),
(17841, 'GJ-001', '8', '2025', '97', '2025-09-11', '8111698', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 41700, 0, 0, 0, 0, 41700, 2874456, '1'),
(17842, 'GJ-001', '8', '2025', '98', '2025-09-11', '5981382', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 57900, 0, 0, 0, 0, 57900, 3041876, '1'),
(17843, 'GJ-001', '8', '2025', '99', '2025-09-11', '11882297', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3385021, 3218828, 166193, 0, 0, 0, 0, 0, 0, 3218828, '1'),
(17844, 'GJ-001', '8', '2025', '100', '2025-09-11', '0210784', 3582500, 100000, 3682500, 103645, 34825, 0, 22000, 6000, 0, 0, 0, 300000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3982500, 3816030, 166470, 0, 0, 1766700, 0, 0, 1766700, 2049330, '1'),
(17845, 'GJ-001', '8', '2025', '101', '2025-09-11', '6581491', 3092500, 151469, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 1325000, 0, 0, 0, 0, 0, 0, 0, 0, 4568969, 4424776, 144193, 0, 0, 0, 0, 0, 0, 4424776, '1'),
(17846, 'GJ-001', '8', '2025', '102', '2025-09-11', '11542297', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 468317, 0, 0, 0, 0, 0, 0, 0, 0, 3853338, 3687145, 166193, 0, 0, 0, 0, 0, 0, 3687145, '1'),
(17847, 'GJ-001', '8', '2025', '103', '2025-09-11', '12902499', 3243969, 0, 3243969, 121810, 42440, 28335, 0, 20000, 0, 1000000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5243969, 5031384, 212585, 0, 0, 0, 0, 0, 0, 5031384, '1'),
(17848, 'GJ-001', '8', '2025', '104', '2025-09-11', '10601984', 3060349, 183620, 3243969, 177075, 59025, 86855, 0, 20000, 0, 600000, 2500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6343969, 6001014, 342955, 0, 0, 0, 0, 0, 0, 6001014, '1'),
(17849, 'GJ-001', '8', '2025', '105', '2025-09-11', '0020770', 3987500, 100000, 4087500, 185625, 61875, 36106, 0, 0, 0, 0, 2500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6587500, 6303895, 283606, 0, 0, 0, 0, 0, 0, 6303895, '1'),
(17850, 'GJ-001', '8', '2025', '106', '2025-09-11', '11802262', 2810025, 250324, 3060349, 99150, 49780, 0, 0, 20000, 0, 1250000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5310349, 5141419, 168930, 0, 0, 0, 0, 0, 0, 5141419, '1'),
(17851, 'GJ-001', '8', '2025', '107', '2025-09-11', '12292395', 3060349, 183620, 3243969, 103645, 0, 13649, 0, 20000, 0, 1000000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5243969, 5106675, 137294, 0, 0, 0, 0, 0, 0, 5106675, '1'),
(17852, 'GJ-001', '8', '2025', '108', '0000-00-00', '9201791', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17853, 'GJ-001', '8', '2025', '109', '2025-09-11', '12412397', 3060349, 183620, 3243969, 121810, 40603, 29549, 0, 20000, 0, 1250000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5493969, 5282007, 211962, 0, 0, 2352800, 0, 0, 2352800, 2929207, '1'),
(17854, 'GJ-001', '8', '2025', '110', '2025-09-11', '7481590', 3342375, 100000, 3442375, 121271, 121271, 45797, 0, 20000, 0, 1250000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5692375, 5384035, 308340, 0, 0, 0, 0, 0, 0, 5384035, '1'),
(17855, 'GJ-001', '8', '2025', '111', '2025-09-11', '1990874', 3950625, 100000, 4050625, 202519, 69506, 117748, 0, 0, 0, 600000, 2500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7150625, 6760852, 389773, 0, 0, 0, 0, 0, 0, 6760852, '1'),
(17856, 'GJ-001', '8', '2025', '112', '0000-00-00', '10962188', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17857, 'GJ-001', '8', '2025', '113', '0000-00-00', '11792298', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17858, 'GJ-001', '8', '2025', '114', '2025-09-11', '12312385', 3060349, 183620, 3243969, 159075, 53025, 86087, 0, 20000, 0, 600000, 2500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6343969, 6025782, 318187, 0, 0, 0, 0, 0, 0, 6025782, '1'),
(17859, 'GJ-001', '8', '2025', '115', '0000-00-00', '12202397', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17860, 'GJ-001', '8', '2025', '116', '2025-09-11', '11172296', 15000000, 0, 15000000, 316422, 120000, 1136016, 0, 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15000000, 13407562, 1592438, 0, 0, 0, 0, 0, 0, 13407562, '1'),
(17861, 'GJ-001', '8', '2025', '117', '0000-00-00', '11462290', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17862, 'GJ-001', '8', '2025', '118', '2025-09-11', '12222393', 3060349, 183620, 3243969, 159075, 0, 45561, 0, 20000, 0, 0, 2500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5743969, 5519333, 224636, 0, 0, 0, 0, 0, 0, 5519333, '1'),
(17863, 'GJ-001', '8', '2025', '119', '0000-00-00', '11812299', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17864, 'GJ-001', '8', '2025', '120', '2025-09-11', '0010749', 7500000, 100000, 7600000, 150000, 0, 79180, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7600000, 7370820, 229180, 0, 0, 0, 0, 0, 0, 7370820, '1'),
(17865, 'GJ-001', '8', '2025', '121', '0000-00-00', '9891890', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17866, 'GJ-001', '8', '2025', '122', '2025-09-11', '5031281', 3309500, 100000, 3409500, 103645, 69097, 0, 0, 6000, 524538, 0, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3559500, 2856220, 703280, 0, 0, 0, 0, 0, 0, 2856220, '1'),
(17867, 'GJ-001', '8', '2025', '123', '2025-09-11', '0730784', 3550000, 100000, 3650000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3900000, 3733807, 166193, 311042, 0, 0, 0, 0, 311042, 3422765, '1'),
(17868, 'GJ-001', '8', '2025', '124', '2025-09-11', '7101583', 3060349, 183620, 3243969, 103645, 172741, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3493969, 3189583, 304386, 0, 0, 0, 0, 0, 0, 3189583, '1'),
(17869, 'GJ-001', '8', '2025', '125', '2025-09-11', '2160882', 3485000, 100000, 3585000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3835000, 3668807, 166193, 0, 0, 0, 0, 0, 0, 3668807, '1'),
(17870, 'GJ-001', '8', '2025', '126', '2025-09-11', '4421188', 3368000, 100000, 3468000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 250000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3976300, 3832107, 144193, 0, 0, 0, 0, 0, 0, 3832107, '1'),
(17871, 'GJ-001', '8', '2025', '127', '2025-09-11', '9061795', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 200000, 187500, 25359, 0, 0, 0, 0, 0, 3547880, 3403687, 144193, 0, 0, 0, 0, 0, 0, 3403687, '1'),
(17872, 'GJ-001', '8', '2025', '128', '2025-09-11', '4201183', 3368000, 100000, 3468000, 103645, 34680, 0, 0, 6000, 0, 0, 0, 0, 0, 200000, 187500, 25359, 0, 0, 0, 0, 0, 3880859, 3736534, 144325, 8200, 0, 0, 0, 0, 8200, 3728334, '1'),
(17873, 'GJ-001', '8', '2025', '129', '2025-09-11', '11492200', 2835021, 225327, 3060348, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 107100, 0, 0, 0, 3167448, 3023255, 144193, 111000, 0, 0, 0, 0, 111000, 2912255, '1'),
(17874, 'GJ-001', '8', '2025', '130', '2025-09-11', '10081997', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55000, 0, 0, 0, 3115349, 2971156, 144193, 33300, 0, 0, 0, 0, 33300, 2937856, '1'),
(17875, 'GJ-001', '8', '2025', '131', '0000-00-00', '3101089', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17876, 'GJ-001', '8', '2025', '132', '2025-09-11', '8201680', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(17877, 'GJ-001', '8', '2025', '133', '2025-09-11', '0830775', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3135021, 2990828, 144193, 0, 0, 0, 0, 0, 0, 2990828, '1'),
(17878, 'GJ-001', '8', '2025', '134', '2025-09-11', '7321591', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17879, 'GJ-001', '8', '2025', '135', '2025-09-11', '8921695', 2835022, 225328, 3060350, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110350, 2966156, 144193, 0, 0, 0, 0, 0, 0, 2966156, '1'),
(17880, 'GJ-001', '8', '2025', '136', '2025-09-11', '11892298', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3385021, 3218828, 166193, 0, 0, 0, 0, 0, 0, 3218828, '1'),
(17881, 'GJ-001', '8', '2025', '137', '0000-00-00', '12802400', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17882, 'GJ-001', '8', '2025', '138', '2025-09-11', '8671694', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 620000, 0, 0, 0, 0, 0, 0, 3855021, 3688828, 166193, 6800, 0, 0, 0, 0, 6800, 3682028, '1'),
(17883, 'GJ-001', '8', '2025', '139', '2025-09-11', '8911692', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 1250000, 0, 50000, 0, 0, 0, 61293, 0, 0, 0, 0, 0, 4605262, 4391972, 213290, 23800, 0, 0, 0, 0, 23800, 4368172, '1'),
(17884, 'GJ-001', '8', '2025', '140', '2025-09-11', '12722401', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 5600, 0, 0, 0, 0, 5600, 2888556, '1'),
(17885, 'GJ-001', '8', '2025', '141', '2025-09-11', '1480779', 3270000, 100000, 3370000, 104100, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3370000, 3190803, 179197, 26800, 0, 0, 0, 0, 26800, 3164003, '1'),
(17886, 'GJ-001', '8', '2025', '142', '2025-09-11', '9931875', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3235021, 3090828, 144193, 86600, 0, 0, 0, 0, 86600, 3004228, '1'),
(17887, 'GJ-001', '8', '2025', '143', '2025-09-11', '11972299', 2935021, 125328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 187500, 25359, 0, 0, 0, 0, 0, 3273208, 3129015, 144193, 0, 0, 0, 0, 0, 0, 3129015, '1'),
(17888, 'GJ-001', '8', '2025', '144', '2025-09-11', '10161993', 2835021, 225328, 3060349, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3260349, 3025059, 235290, 0, 0, 0, 0, 0, 0, 3025059, '1'),
(17889, 'GJ-001', '8', '2025', '145', '0000-00-00', '11342298', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17890, 'GJ-001', '8', '2025', '146', '2025-09-11', '12522398', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(17891, 'GJ-001', '8', '2025', '147', '2025-09-11', '6891492', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 178083, 0, 0, 0, 0, 0, 0, 3422052, 3277859, 144193, 0, 0, 0, 0, 0, 0, 3277859, '1'),
(17892, 'GJ-001', '8', '2025', '148', '2025-09-11', '12042299', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2966156, 144193, 188800, 0, 0, 0, 0, 188800, 2777356, '1'),
(17893, 'GJ-001', '8', '2025', '149', '2025-09-11', '4961289', 3309500, 100000, 3409500, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3659500, 3493307, 166193, 0, 0, 0, 0, 0, 0, 3493307, '1'),
(17894, 'GJ-001', '8', '2025', '150', '2025-09-11', '4781277', 3060350, 183620, 3243970, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243970, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17895, 'GJ-001', '8', '2025', '151', '2025-09-11', '12712497', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 102155, 0, 0, 0, 0, 0, 3162504, 3018311, 144193, 0, 0, 0, 0, 0, 0, 3018311, '1'),
(17896, 'GJ-001', '8', '2025', '152', '2025-09-11', '9501794', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3335021, 3168828, 166193, 0, 0, 0, 0, 0, 0, 3168828, '1'),
(17897, 'GJ-001', '8', '2025', '153', '2025-09-11', '12772497', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(17898, 'GJ-001', '8', '2025', '154', '0000-00-00', '11962201', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17899, 'GJ-001', '8', '2025', '155', '2025-09-11', '12532402', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(17900, 'GJ-001', '8', '2025', '156', '2025-09-11', '12482300', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(17901, 'GJ-001', '8', '2025', '157', '2025-09-11', '11952200', 2835021, 225328, 3060349, 103645, 103645, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2897059, 213290, 0, 0, 0, 0, 0, 0, 2897059, '1'),
(17902, 'GJ-001', '8', '2025', '158', '2025-09-11', '11572298', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3385021, 3218828, 166193, 0, 0, 0, 0, 0, 0, 3218828, '1'),
(17903, 'GJ-001', '8', '2025', '159', '2025-09-11', '12572402', 2810025, 0, 2810025, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2810025, 2665832, 144193, 0, 0, 0, 0, 0, 0, 2665832, '1'),
(17904, 'GJ-001', '8', '2025', '160', '2025-09-11', '7151592', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 1005399, 0, 0, 0, 0, 57800, 0, 0, 0, 4407168, 4240975, 166193, 0, 0, 0, 0, 0, 0, 4240975, '1'),
(17905, 'GJ-001', '8', '2025', '161', '2025-09-11', '5851389', 3251000, 100000, 3351000, 103645, 34548, 0, 22000, 6000, 0, 350000, 0, 150000, 0, 0, 0, 0, 600000, 0, 0, 0, 0, 4451000, 4284807, 166193, 0, 0, 1316900, 0, 0, 1316900, 2967907, '1'),
(17906, 'GJ-001', '8', '2025', '162', '2025-09-11', '10261998', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 41300, 0, 0, 0, 3101649, 2957456, 144193, 12600, 0, 0, 0, 0, 12600, 2944856, '1'),
(17907, 'GJ-001', '8', '2025', '163', '2025-09-11', '12892402', 2835021, 0, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 178083, 0, 0, 191100, 0, 0, 0, 3204204, 3060011, 144193, 0, 0, 0, 0, 0, 0, 3060011, '1'),
(17908, 'GJ-001', '8', '2025', '164', '2025-09-11', '9481788', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 124768, 350000, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3743969, 3453008, 290961, 0, 0, 0, 518750, 0, 518750, 2934258, '1'),
(17909, 'GJ-001', '8', '2025', '165', '2025-09-11', '10131991', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 200000, 187500, 25359, 0, 0, 0, 0, 0, 3473208, 3329015, 144193, 0, 0, 0, 0, 0, 0, 3329015, '1'),
(17910, 'GJ-001', '8', '2025', '166', '0000-00-00', '1160781', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17911, 'GJ-001', '8', '2025', '167', '2025-09-11', '5461282', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 365000, 0, 1452400, 0, 0, 1817400, 1282376, '1'),
(17912, 'GJ-001', '8', '2025', '168', '0000-00-00', '12352396', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17913, 'GJ-001', '8', '2025', '169', '2025-09-11', '11312295', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 611229, 0, 0, 0, 0, 0, 4021578, 3877385, 144193, 0, 0, 0, 0, 0, 0, 3877385, '1'),
(17914, 'GJ-001', '8', '2025', '170', '2025-09-11', '4411186', 3368000, 100000, 3468000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 250000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3976300, 3797558, 178742, 0, 0, 0, 0, 0, 0, 3797558, '1'),
(17915, 'GJ-001', '8', '2025', '171', '2025-09-11', '12922401', 3243969, 0, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 166600, 0, 0, 0, 0, 0, 0, 0, 0, 3410569, 3266376, 144193, 0, 0, 0, 0, 0, 0, 3266376, '1'),
(17916, 'GJ-001', '8', '2025', '172', '0000-00-00', '12332396', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17917, 'GJ-001', '8', '2025', '173', '2025-09-11', '8841693', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 500000, 612933, 0, 0, 0, 0, 0, 4706902, 4562709, 144193, 27700, 0, 0, 0, 0, 27700, 4535009, '1'),
(17918, 'GJ-001', '8', '2025', '174', '2025-09-11', '0580785', 3300000, 100000, 3400000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 678438, 0, 0, 0, 0, 0, 0, 0, 0, 4078438, 3934245, 144193, 0, 0, 0, 727583, 0, 727583, 3206662, '1'),
(17919, 'GJ-001', '8', '2025', '175', '2025-09-11', '1930885', 3517500, 100000, 3617500, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3717500, 3551307, 166193, 0, 0, 0, 0, 0, 0, 3551307, '1'),
(17920, 'GJ-001', '8', '2025', '176', '2025-09-11', '1120769', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3254609, 3110416, 144193, 0, 0, 0, 0, 0, 0, 3110416, '1'),
(17921, 'GJ-001', '8', '2025', '177', '2025-09-11', '0790771', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17922, 'GJ-001', '8', '2025', '178', '2025-09-11', '0100780', 3582500, 100000, 3682500, 103645, 34825, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3782500, 3616030, 166470, 0, 0, 0, 0, 0, 0, 3616030, '1'),
(17923, 'GJ-001', '8', '2025', '179', '2025-09-11', '1750881', 3270000, 100000, 3370000, 103645, 138193, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3370000, 3122162, 247838, 0, 0, 0, 0, 0, 0, 3122162, '1'),
(17924, 'GJ-001', '8', '2025', '180', '2025-09-11', '1830884', 3517500, 100000, 3617500, 107025, 37675, 29409, 22000, 6000, 0, 350000, 0, 200000, 1341044, 0, 0, 0, 0, 0, 0, 0, 0, 5508544, 5306435, 202109, 0, 0, 2150000, 0, 0, 2150000, 3156435, '1'),
(17925, 'GJ-001', '8', '2025', '181', '2025-09-11', '4811285', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 26600, 0, 0, 0, 0, 0, 0, 0, 0, 3270569, 3126376, 144193, 0, 0, 1277500, 0, 0, 1277500, 1848876, '1'),
(17926, 'GJ-001', '8', '2025', '182', '2025-09-11', '10051900', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 91800, 0, 0, 0, 0, 91800, 2824356, '1'),
(17927, 'GJ-001', '8', '2025', '183', '2025-09-11', '12172301', 2470000, 365021, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 114200, 0, 0, 0, 2999221, 2855028, 144193, 0, 0, 0, 0, 0, 0, 2855028, '1'),
(17928, 'GJ-001', '8', '2025', '184', '2025-09-11', '1660787', 3270000, 100000, 3370000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 616762, 0, 0, 0, 0, 101100, 0, 0, 0, 4087862, 3874572, 213290, 0, 0, 0, 0, 0, 0, 3874572, '1'),
(17929, 'GJ-001', '8', '2025', '185', '2025-09-11', '8301688', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 239300, 0, 0, 0, 0, 239300, 2676856, '1'),
(17930, 'GJ-001', '8', '2025', '186', '2025-09-11', '4021183', 2950000, 100000, 3050000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3050000, 2836710, 213290, 0, 0, 0, 0, 0, 0, 2836710, '1'),
(17931, 'GJ-001', '8', '2025', '187', '0000-00-00', '12592497', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17932, 'GJ-001', '8', '2025', '188', '2025-09-11', '9491798', 2545613, 300000, 2845613, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2845613, 2701419, 144193, 0, 0, 0, 0, 0, 0, 2701419, '1'),
(17933, 'GJ-001', '8', '2025', '189', '0000-00-00', '12862494', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17934, 'GJ-001', '8', '2025', '190', '2025-09-11', '12052295', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2944156, 166193, 81400, 0, 0, 0, 0, 81400, 2862756, '1'),
(17935, 'GJ-001', '8', '2025', '191', '2025-09-11', '10141994', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3543969, 3377776, 166193, 103000, 0, 0, 0, 0, 103000, 3274776, '1'),
(17936, 'GJ-001', '8', '2025', '192', '2025-09-11', '12842498', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(17937, 'GJ-001', '8', '2025', '193', '2025-09-11', '12422385', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(17938, 'GJ-001', '8', '2025', '194', '2025-09-11', '1960882', 3270000, 100000, 3370000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3370000, 3156710, 213290, 0, 0, 993800, 0, 0, 993800, 2162910, '1'),
(17939, 'GJ-001', '8', '2025', '195', '0000-00-00', '11302294', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17940, 'GJ-001', '8', '2025', '196', '2025-09-11', '9601895', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 1567511, 0, 0, 100000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3493321, 1781617, 1711704, 28200, 0, 0, 0, 0, 28200, 1753417, '1'),
(17941, 'GJ-001', '8', '2025', '197', '2025-09-11', '5301285', 3251000, 100000, 3351000, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3601000, 3365710, 235290, 0, 0, 0, 0, 0, 0, 3365710, '1'),
(17942, 'GJ-001', '8', '2025', '198', '0000-00-00', '11702269', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17943, 'GJ-001', '8', '2025', '199', '2025-09-11', '3571085', 3426500, 100000, 3526500, 103645, 69097, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3776500, 3575758, 200742, 34100, 0, 1161900, 0, 0, 1196000, 2379758, '1'),
(17944, 'GJ-001', '8', '2025', '200', '2025-09-11', '1840886', 3517500, 100000, 3617500, 107025, 37675, 0, 22000, 6000, 0, 350000, 0, 200000, 0, 0, 0, 0, 150000, 0, 0, 0, 0, 4317500, 4144800, 172700, 0, 0, 0, 0, 0, 0, 4144800, '1'),
(17945, 'GJ-001', '8', '2025', '201', '2025-09-11', '3141066', 3060349, 183620, 3243969, 69097, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3134324, 109645, 0, 0, 0, 0, 0, 0, 3134324, '1'),
(17946, 'GJ-001', '8', '2025', '202', '2025-09-11', '12782496', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 528429, 0, 0, 0, 0, 0, 0, 0, 0, 3588778, 3422585, 166193, 0, 0, 0, 0, 0, 0, 3422585, '1'),
(17947, 'GJ-001', '8', '2025', '203', '0000-00-00', '0900777', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17948, 'GJ-001', '8', '2025', '204', '2025-09-11', '3081077', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3030679, 213290, 10200, 0, 0, 0, 0, 10200, 3020479, '1'),
(17949, 'GJ-001', '8', '2025', '205', '2025-09-11', '11030869', 2391000, 200000, 2591000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2591000, 2446807, 144193, 0, 0, 0, 0, 0, 0, 2446807, '1'),
(17950, 'GJ-001', '8', '2025', '206', '2025-09-11', '1140773', 3270000, 100000, 3370000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 6650, 0, 0, 0, 0, 0, 0, 0, 0, 3376650, 3232457, 144193, 0, 0, 1300000, 0, 0, 1300000, 1932457, '1'),
(17951, 'GJ-001', '8', '2025', '207', '2025-09-11', '0380784', 3550000, 100000, 3650000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3900000, 3733807, 166193, 0, 0, 0, 0, 0, 0, 3733807, '1'),
(17952, 'GJ-001', '8', '2025', '208', '2025-09-11', '0070777', 3330000, 100000, 3430000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 306466, 0, 0, 0, 0, 0, 3736466, 3592273, 144193, 0, 0, 0, 0, 0, 0, 3592273, '1'),
(17953, 'GJ-001', '8', '2025', '209', '2025-09-11', '2860982', 3186000, 57969, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 26600, 0, 0, 0, 0, 0, 0, 0, 0, 3270569, 3126376, 144193, 0, 0, 1433400, 0, 0, 1433400, 1692976, '1'),
(17954, 'GJ-001', '8', '2025', '210', '2025-09-11', '10041995', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 647600, 0, 0, 0, 0, 0, 0, 0, 0, 3707949, 3563756, 144193, 0, 0, 0, 0, 0, 0, 3563756, '1'),
(17955, 'GJ-001', '8', '2025', '211', '2025-09-11', '10451996', 2405000, 300000, 2705000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2705000, 2560807, 144193, 0, 0, 0, 0, 0, 0, 2560807, '1'),
(17956, 'GJ-001', '8', '2025', '212', '2025-09-11', '12832402', 3060349, 0, 3060349, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2825059, 235290, 0, 0, 0, 0, 0, 0, 2825059, '1'),
(17957, 'GJ-001', '8', '2025', '213', '2025-09-11', '10872099', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(17958, 'GJ-001', '8', '2025', '214', '2025-09-11', '3241090', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 6650, 0, 0, 0, 0, 0, 0, 0, 0, 3250619, 3106426, 144193, 0, 0, 0, 0, 0, 0, 3106426, '1'),
(17959, 'GJ-001', '8', '2025', '215', '2025-09-11', '1220787', 3270000, 100000, 3370000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 6650, 0, 0, 0, 0, 0, 0, 0, 0, 3376650, 3197908, 178742, 71900, 0, 1560200, 0, 0, 1632100, 1565808, '1'),
(17960, 'GJ-001', '8', '2025', '216', '2025-09-11', '12812499', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 11000, 0, 0, 0, 0, 11000, 2905156, '1'),
(17961, 'GJ-001', '8', '2025', '217', '2025-09-11', '7341591', 3060349, 183620, 3243969, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 580000, 0, 0, 0, 0, 0, 0, 3923969, 3688679, 235290, 155100, 0, 0, 0, 0, 155100, 3533579, '1'),
(17962, 'GJ-001', '8', '2025', '218', '2025-09-11', '2600982', 3485000, 100000, 3585000, 113550, 79700, 0, 0, 6000, 0, 350000, 0, 0, 0, 250000, 187500, 25359, 0, 0, 0, 250000, 0, 4647859, 4448609, 199250, 0, 0, 0, 0, 0, 0, 4448609, '1'),
(17963, 'GJ-001', '8', '2025', '219', '2025-09-11', '9961894', 3060349, 183620, 3243969, 103645, 34548, 14114, 22000, 6000, 0, 0, 0, 200000, 1667338, 0, 0, 0, 0, 180500, 0, 0, 0, 5291807, 5111500, 180307, 0, 0, 0, 0, 0, 0, 5111500, '1'),
(17964, 'GJ-001', '8', '2025', '220', '2025-09-11', '6381390', 3192500, 51469, 3243969, 122775, 81850, 0, 22000, 6000, 0, 1000000, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4393969, 4161344, 232625, 0, 0, 0, 0, 0, 0, 4161344, '1'),
(17965, 'GJ-001', '8', '2025', '221', '2025-09-11', '1030777', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 209400, 0, 0, 0, 3953369, 3809176, 144193, 0, 0, 0, 0, 0, 0, 3809176, '1'),
(17966, 'GJ-001', '8', '2025', '222', '2025-09-11', '9991893', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3743969, 3577776, 166193, 0, 0, 0, 0, 0, 0, 3577776, '1'),
(17967, 'GJ-001', '8', '2025', '223', '2025-09-11', '0510783', 3550000, 100000, 3650000, 108000, 69097, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3900000, 3694903, 205097, 22300, 0, 0, 0, 0, 22300, 3672603, '1'),
(17968, 'GJ-001', '8', '2025', '224', '2025-09-11', '8881693', 2835021, 300000, 3135021, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3385021, 3149731, 235290, 0, 0, 0, 0, 0, 0, 3149731, '1'),
(17969, 'GJ-001', '8', '2025', '225', '2025-09-11', '1300788', 3300000, 100000, 3400000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3400000, 3255807, 144193, 0, 0, 0, 0, 0, 0, 3255807, '1'),
(17970, 'GJ-001', '8', '2025', '226', '2025-09-11', '4881283', 3309500, 100000, 3409500, 103645, 34548, 0, 0, 6000, 0, 0, 0, 250000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3917800, 3773607, 144193, 0, 0, 0, 0, 0, 0, 3773607, '1'),
(17971, 'GJ-001', '8', '2025', '227', '2025-09-11', '12302300', 2470000, 300000, 2770000, 103645, 0, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 408622, 0, 0, 0, 0, 0, 3178622, 3068977, 109645, 0, 0, 0, 0, 0, 0, 3068977, '1'),
(17972, 'GJ-001', '8', '2025', '228', '2025-09-11', '0820767', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3393969, 3249776, 144193, 0, 0, 0, 0, 0, 0, 3249776, '1'),
(17973, 'GJ-001', '8', '2025', '229', '2025-09-11', '9901895', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 149973, 0, 0, 0, 0, 149973, 2766183, '1');
INSERT INTO `gaji` (`id`, `kode_transaksi`, `bulan`, `tahun`, `no_gaji`, `tgl_gaji`, `nopeg`, `upah_awal`, `penambahan`, `revisi`, `bpjs_kerja`, `bpjs_kes`, `pph21`, `ppni`, `lelayu`, `lain`, `tj_jbtn`, `tj_fungsional`, `tj_resiko`, `fee_for_servis`, `tj_tpbri`, `tj_mcu`, `tj_bpjs`, `fee_pembimbing`, `lembur`, `thr`, `tj_lain`, `penyesuaian`, `bruto`, `total_pendapatan`, `total_potongan`, `obat`, `seragam`, `kredit`, `pelatihan`, `uang_gedung`, `total_potongan_slip`, `transfer`, `status`) VALUES
(17974, 'GJ-001', '8', '2025', '230', '2025-09-11', '11292200', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2944156, 166193, 0, 0, 0, 0, 0, 0, 2944156, '1'),
(17975, 'GJ-001', '8', '2025', '231', '0000-00-00', '10001899', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17976, 'GJ-001', '8', '2025', '232', '2025-09-11', '10991895', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3443321, 3299128, 144193, 52500, 0, 0, 0, 0, 52500, 3246628, '1'),
(17977, 'GJ-001', '8', '2025', '233', '2025-09-11', '8981694', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 1554934, 0, 0, 0, 0, 21700, 0, 0, 0, 4811655, 4645462, 166193, 0, 0, 0, 0, 0, 0, 4645462, '1'),
(17978, 'GJ-001', '8', '2025', '234', '2025-09-11', '9361788', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 600000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3735021, 3590828, 144193, 0, 0, 0, 0, 0, 0, 3590828, '1'),
(17979, 'GJ-001', '8', '2025', '235', '2025-09-11', '4331182', 3368000, 100000, 3468000, 135540, 45180, 29446, 22000, 6000, 0, 1250000, 0, 150000, 0, 0, 0, 408622, 150000, 0, 0, 0, 0, 5426622, 5188456, 238166, 124100, 0, 2208400, 0, 0, 2332500, 2855956, '1'),
(17980, 'GJ-001', '8', '2025', '236', '2025-09-11', '11592298', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 411001, 0, 0, 0, 0, 0, 0, 0, 0, 3796022, 3629829, 166193, 0, 0, 0, 0, 0, 0, 3629829, '1'),
(17981, 'GJ-001', '8', '2025', '237', '2025-09-11', '3321078', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(17982, 'GJ-001', '8', '2025', '238', '2025-09-11', '12492393', 3060349, 0, 3060349, 103645, 0, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2928704, 131645, 183000, 0, 0, 0, 0, 183000, 2745704, '1'),
(17983, 'GJ-001', '8', '2025', '239', '2025-09-11', '12602499', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 441756, 0, 0, 0, 0, 0, 0, 0, 0, 3502105, 3335912, 166193, 29200, 0, 0, 0, 0, 29200, 3306712, '1'),
(17984, 'GJ-001', '8', '2025', '240', '2025-09-11', '8401687', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 215000, 0, 0, 0, 0, 215000, 2701156, '1'),
(17985, 'GJ-001', '8', '2025', '241', '2025-09-11', '0860770', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 124769, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3393969, 3125007, 268962, 0, 0, 0, 0, 0, 0, 3125007, '1'),
(17986, 'GJ-001', '8', '2025', '242', '2025-09-11', '6411389', 3192500, 51469, 3243969, 103645, 34548, 64906, 22000, 6000, 0, 0, 0, 200000, 2497885, 0, 0, 0, 0, 195000, 0, 0, 0, 6136854, 5905754, 231100, 0, 0, 0, 0, 0, 0, 5905754, '1'),
(17987, 'GJ-001', '8', '2025', '243', '2025-09-11', '8961697', 2500000, 300000, 2800000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2800000, 2655807, 144193, 0, 0, 0, 0, 0, 0, 2655807, '1'),
(17988, 'GJ-001', '8', '2025', '244', '2025-09-11', '4791268', 3060350, 183620, 3243970, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243970, 3030680, 213290, 0, 0, 0, 0, 0, 0, 3030680, '1'),
(17989, 'GJ-001', '8', '2025', '245', '2025-09-11', '12462301', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2966156, 144193, 0, 0, 0, 0, 0, 0, 2966156, '1'),
(17990, 'GJ-001', '8', '2025', '246', '0000-00-00', '12442302', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17991, 'GJ-001', '8', '2025', '247', '0000-00-00', '12012201', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(17992, 'GJ-001', '8', '2025', '248', '2025-09-11', '12702400', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3560349, 3416156, 144193, 0, 0, 0, 0, 0, 0, 3416156, '1'),
(17993, 'GJ-001', '8', '2025', '249', '2025-09-11', '10391997', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3235021, 3068828, 166193, 134000, 0, 0, 0, 0, 134000, 2934828, '1'),
(17994, 'GJ-001', '8', '2025', '250', '2025-09-11', '6221382', 3092500, 151469, 3243969, 103645, 138193, 0, 22000, 6000, 0, 0, 0, 300000, 0, 0, 0, 0, 600000, 0, 0, 0, 0, 4143969, 3874131, 269838, 0, 0, 0, 400000, 0, 400000, 3474131, '1'),
(17995, 'GJ-001', '8', '2025', '251', '2025-09-11', '8861695', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 48400, 0, 0, 0, 0, 48400, 2867756, '1'),
(17996, 'GJ-001', '8', '2025', '252', '2025-09-11', '12852400', 3060349, 0, 3060349, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2825059, 235290, 0, 0, 0, 0, 0, 0, 2825059, '1'),
(17997, 'GJ-001', '8', '2025', '253', '2025-09-11', '12542497', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 59000, 0, 0, 0, 0, 59000, 2835156, '1'),
(17998, 'GJ-001', '8', '2025', '254', '2025-09-11', '1250780', 3060349, 100000, 3160349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3170989, 3026796, 144193, 0, 0, 0, 0, 0, 0, 3026796, '1'),
(17999, 'GJ-001', '8', '2025', '255', '2025-09-11', '12882404', 2500000, 0, 2500000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2500000, 2355807, 144193, 0, 0, 0, 0, 0, 0, 2355807, '1'),
(18000, 'GJ-001', '8', '2025', '256', '2025-09-11', '12452300', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2966156, 144193, 0, 0, 0, 0, 0, 0, 2966156, '1'),
(18001, 'GJ-001', '8', '2025', '257', '2025-09-11', '9431794', 2835021, 300000, 3135021, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3235021, 2999731, 235290, 30100, 0, 0, 0, 0, 30100, 2969631, '1'),
(18002, 'GJ-001', '8', '2025', '258', '2025-09-11', '4571189', 3251000, 100000, 3351000, 103645, 105030, 0, 22000, 6000, 0, 350000, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3901000, 3664325, 236675, 0, 0, 0, 0, 0, 0, 3664325, '1'),
(18003, 'GJ-001', '8', '2025', '259', '2025-09-11', '9741891', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3643969, 3477776, 166193, 60800, 0, 0, 0, 0, 60800, 3416976, '1'),
(18004, 'GJ-001', '8', '2025', '260', '2025-09-11', '10031971', 2835021, 225328, 3060349, 103645, 0, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2928704, 131645, 0, 0, 0, 0, 0, 0, 2928704, '1'),
(18005, 'GJ-001', '8', '2025', '261', '2025-09-11', '12372399', 2470000, 365021, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2835021, 2690828, 144193, 0, 0, 0, 0, 0, 0, 2690828, '1'),
(18006, 'GJ-001', '8', '2025', '262', '2025-09-11', '6421391', 3192500, 51469, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 619297, 0, 0, 0, 0, 0, 0, 0, 0, 4113266, 3947073, 166193, 0, 0, 0, 0, 0, 0, 3947073, '1'),
(18007, 'GJ-001', '8', '2025', '263', '2025-09-11', '11852201', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 192700, 0, 0, 0, 3253049, 3108856, 144193, 18400, 0, 0, 0, 0, 18400, 3090456, '1'),
(18008, 'GJ-001', '8', '2025', '264', '2025-09-11', '6451386', 3426500, 100000, 3526500, 104295, 36765, 0, 0, 6000, 0, 350000, 0, 200000, 315000, 0, 0, 0, 600000, 0, 0, 0, 0, 4991500, 4844440, 147060, 0, 0, 0, 0, 0, 0, 4844440, '1'),
(18009, 'GJ-001', '8', '2025', '265', '2025-09-11', '10091999', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 75700, 0, 0, 0, 3136049, 2991856, 144193, 52900, 0, 0, 0, 0, 52900, 2938956, '1'),
(18010, 'GJ-001', '8', '2025', '266', '2025-09-11', '7511593', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3135021, 2990828, 144193, 0, 0, 0, 0, 0, 0, 2990828, '1'),
(18011, 'GJ-001', '8', '2025', '267', '2025-09-11', '6021390', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 500000, 0, 50000, 0, 0, 0, 61293, 0, 0, 0, 0, 0, 3855262, 3641972, 213290, 22400, 0, 0, 0, 0, 22400, 3619572, '1'),
(18012, 'GJ-001', '8', '2025', '268', '2025-09-11', '2420889', 3240000, 100000, 3340000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3350640, 3206447, 144193, 0, 0, 0, 0, 0, 0, 3206447, '1'),
(18013, 'GJ-001', '8', '2025', '269', '2025-09-11', '12552400', 2810025, 0, 2810025, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2810025, 2665832, 144193, 0, 0, 0, 0, 0, 0, 2665832, '1'),
(18014, 'GJ-001', '8', '2025', '270', '0000-00-00', '11182297', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18015, 'GJ-001', '8', '2025', '271', '2025-09-11', '0060771', 3550000, 100000, 3650000, 114000, 38000, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3650000, 3492000, 158000, 0, 0, 0, 0, 0, 0, 3492000, '1'),
(18016, 'GJ-001', '8', '2025', '272', '2025-09-11', '6731493', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3030679, 213290, 298800, 0, 316700, 485055, 0, 1100555, 1930124, '1'),
(18017, 'GJ-001', '8', '2025', '273', '2025-09-11', '1320788', 3300000, 100000, 3400000, 103645, 172741, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3400000, 3117614, 282386, 96700, 0, 1104200, 727583, 0, 1928483, 1189131, '1'),
(18018, 'GJ-001', '8', '2025', '274', '2025-09-11', '4161177', 3368000, 100000, 3468000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3618000, 3451807, 166193, 0, 0, 0, 0, 0, 0, 3451807, '1'),
(18019, 'GJ-001', '8', '2025', '275', '2025-09-11', '9351793', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 100000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3493321, 3349128, 144193, 137000, 0, 0, 0, 0, 137000, 3212128, '1'),
(18020, 'GJ-001', '8', '2025', '276', '0000-00-00', '0660784', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18021, 'GJ-001', '8', '2025', '277', '2025-09-11', '1100779', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3030679, 213290, 0, 0, 0, 0, 0, 0, 3030679, '1'),
(18022, 'GJ-001', '8', '2025', '278', '2025-09-11', '6831485', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 121600, 0, 1766700, 0, 0, 1888300, 1211476, '1'),
(18023, 'GJ-001', '8', '2025', '279', '2025-09-11', '6551492', 3192500, 51469, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 150000, 0, 0, 0, 0, 0, 79400, 0, 0, 0, 3473369, 3307176, 166193, 0, 0, 0, 0, 0, 0, 3307176, '1'),
(18024, 'GJ-001', '8', '2025', '280', '2025-09-11', '12152395', 2470000, 365021, 2835021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 503266, 0, 0, 0, 0, 0, 0, 0, 0, 3588287, 3422094, 166193, 91300, 0, 0, 0, 0, 91300, 3330794, '1'),
(18025, 'GJ-001', '8', '2025', '281', '2025-09-11', '11862292', 1500000, 0, 1500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1500000, 1500000, 0, 0, 0, 0, 0, 0, 0, 1500000, '1'),
(18026, 'GJ-001', '8', '2025', '282', '2025-09-11', '12732497', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 313143, 0, 0, 0, 0, 0, 0, 0, 0, 3373492, 3207299, 166193, 0, 0, 0, 0, 0, 0, 3207299, '1'),
(18027, 'GJ-001', '8', '2025', '283', '2025-09-11', '0690787', 3550000, 100000, 3650000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 137200, 0, 0, 0, 3787200, 3608458, 178742, 0, 0, 0, 0, 0, 0, 3608458, '1'),
(18028, 'GJ-001', '8', '2025', '284', '2025-09-11', '0770783', 3550000, 100000, 3650000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 108300, 0, 0, 0, 4008300, 3864107, 144193, 55300, 0, 0, 0, 0, 55300, 3808807, '1'),
(18029, 'GJ-001', '8', '2025', '285', '2025-09-11', '5711382', 3060349, 183620, 3243969, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3065227, 178742, 0, 0, 0, 0, 0, 0, 3065227, '1'),
(18030, 'GJ-001', '8', '2025', '286', '2025-09-11', '1940883', 3485000, 100000, 3585000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3835000, 3668807, 166193, 0, 0, 0, 0, 0, 0, 3668807, '1'),
(18031, 'GJ-001', '8', '2025', '287', '2025-09-11', '9241781', 3060349, 183620, 3243969, 103645, 34548, 116922, 22000, 6000, 0, 350000, 0, 200000, 3497039, 0, 0, 0, 150000, 0, 0, 0, 0, 7441008, 7157893, 283115, 34600, 0, 0, 400000, 0, 434600, 6723293, '1'),
(18032, 'GJ-001', '8', '2025', '288', '2025-09-11', '7761585', 2835021, 225949, 3060969, 103645, 69097, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 158667, 0, 0, 0, 0, 0, 0, 3569636, 3390894, 178742, 0, 0, 0, 0, 0, 0, 3390894, '1'),
(18033, 'GJ-001', '8', '2025', '289', '2025-09-11', '8531684', 2545613, 300000, 2845613, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2845613, 2701419, 144193, 0, 0, 0, 0, 0, 0, 2701419, '1'),
(18034, 'GJ-001', '8', '2025', '290', '2025-09-11', '12742478', 3060349, 0, 3060349, 103645, 0, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2928704, 131645, 0, 0, 0, 0, 0, 0, 2928704, '1'),
(18035, 'GJ-001', '8', '2025', '291', '2025-09-11', '9971897', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3235021, 3068828, 166193, 108100, 0, 0, 0, 0, 108100, 2960728, '1'),
(18036, 'GJ-001', '8', '2025', '292', '2025-09-11', '12472391', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 395623, 0, 0, 0, 0, 0, 0, 0, 0, 3455972, 3289779, 166193, 81900, 0, 0, 0, 0, 81900, 3207879, '1'),
(18037, 'GJ-001', '8', '2025', '293', '2025-09-11', '6431389', 3192500, 51469, 3243969, 103645, 34548, 151628, 22000, 6000, 0, 0, 0, 150000, 6136910, 0, 0, 0, 0, 223900, 0, 0, 0, 9754779, 9436957, 317822, 0, 0, 0, 0, 0, 0, 9436957, '1'),
(18038, 'GJ-001', '8', '2025', '294', '2025-09-11', '5651390', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3254609, 3110416, 144193, 0, 0, 950000, 0, 0, 950000, 2160416, '1'),
(18039, 'GJ-001', '8', '2025', '295', '2025-09-11', '6671491', 3192500, 51469, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3493969, 3327776, 166193, 0, 0, 0, 0, 0, 0, 3327776, '1'),
(18040, 'GJ-001', '8', '2025', '296', '2025-09-11', '5001290', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 306466, 0, 0, 0, 0, 0, 3550435, 3406242, 144193, 0, 0, 1392900, 0, 0, 1392900, 2013342, '1'),
(18041, 'GJ-001', '8', '2025', '297', '2025-09-11', '12432302', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 120300, 0, 0, 0, 3180649, 3014456, 166193, 0, 0, 0, 0, 0, 0, 3014456, '1'),
(18042, 'GJ-001', '8', '2025', '298', '2025-09-11', '11752294', 3060349, 183620, 3243969, 123000, 41000, 0, 0, 6000, 0, 600000, 500000, 0, 0, 0, 0, 408622, 0, 0, 0, 0, 0, 4752591, 4582591, 170000, 89300, 0, 0, 0, 0, 89300, 4493291, '1'),
(18043, 'GJ-001', '8', '2025', '299', '2025-09-11', '12512397', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 0, 0, 0, 0, 0, 0, 2894156, '1'),
(18044, 'GJ-001', '8', '2025', '300', '2025-09-11', '4441185', 3309500, 100000, 3409500, 103645, 69097, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 281600, 0, 0, 0, 3941100, 3740358, 200742, 0, 0, 0, 0, 0, 0, 3740358, '1'),
(18045, 'GJ-001', '8', '2025', '301', '2025-09-11', '11242298', 3060349, 183620, 3243969, 103645, 69097, 0, 22000, 6000, 0, 200000, 0, 150000, 445950, 0, 0, 0, 0, 0, 0, 0, 0, 4039919, 3839177, 200742, 0, 0, 0, 0, 0, 0, 3839177, '1'),
(18046, 'GJ-001', '8', '2025', '302', '2025-09-11', '3521072', 3270175, 100000, 3370175, 103645, 69097, 0, 0, 6000, 0, 150000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3570175, 3391433, 178742, 251500, 0, 0, 0, 0, 251500, 3139933, '1'),
(18047, 'GJ-001', '8', '2025', '303', '2025-09-11', '10221999', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 126000, 0, 0, 0, 0, 0, 0, 0, 0, 3186349, 3042156, 144193, 115000, 0, 0, 0, 0, 115000, 2927156, '1'),
(18048, 'GJ-001', '8', '2025', '304', '2025-09-11', '4431189', 3309500, 100000, 3409500, 103645, 138139, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3659500, 3389716, 269784, 0, 0, 0, 0, 0, 0, 3389716, '1'),
(18049, 'GJ-001', '8', '2025', '305', '2025-09-11', '7771582', 3060349, 183620, 3243969, 103645, 69097, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3593969, 3415227, 178742, 0, 0, 0, 0, 0, 0, 3415227, '1'),
(18050, 'GJ-001', '8', '2025', '306', '2025-09-11', '8381688', 2936725, 123624, 3060349, 103645, 69097, 0, 0, 6000, 0, 500000, 0, 50000, 0, 0, 0, 61293, 0, 0, 0, 0, 0, 3671642, 3492900, 178742, 71700, 0, 663900, 0, 0, 735600, 2757300, '1'),
(18051, 'GJ-001', '8', '2025', '307', '0000-00-00', '5401287', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18052, 'GJ-001', '8', '2025', '308', '2025-09-11', '11682286', 2005000, 300000, 2305000, 103645, 0, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2305000, 2195355, 109645, 0, 0, 0, 0, 0, 0, 2195355, '1'),
(18053, 'GJ-001', '8', '2025', '309', '2025-09-11', '9471790', 2725575, 300000, 3025575, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 1320000, 0, 0, 0, 150000, 0, 0, 0, 0, 4845575, 4701382, 144193, 0, 0, 0, 0, 0, 0, 4701382, '1'),
(18054, 'GJ-001', '8', '2025', '310', '2025-09-11', '0920779', 3060349, 100000, 3160349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3160349, 3016156, 144193, 0, 0, 0, 0, 0, 0, 3016156, '1'),
(18055, 'GJ-001', '8', '2025', '311', '2025-09-11', '3491088', 3326500, 100000, 3426500, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3676500, 3510307, 166193, 0, 0, 0, 400000, 0, 400000, 3110307, '1'),
(18056, 'GJ-001', '8', '2025', '312', '2025-09-11', '12562404', 2810025, 0, 2810025, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2810025, 2665832, 144193, 0, 0, 0, 0, 0, 0, 2665832, '1'),
(18057, 'GJ-001', '8', '2025', '313', '0000-00-00', '11842200', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18058, 'GJ-001', '8', '2025', '314', '2025-09-11', '12662482', 3060349, 0, 3060349, 103645, 34548, 0, 0, 6000, 117706, 1250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4310349, 4048450, 261899, 0, 0, 0, 0, 0, 0, 4048450, '1'),
(18059, 'GJ-001', '8', '2025', '315', '2025-09-11', '9821893', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 57100, 0, 0, 0, 0, 57100, 2859056, '1'),
(18060, 'GJ-001', '8', '2025', '316', '2025-09-11', '11092193', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 200000, 448746, 0, 0, 0, 0, 0, 0, 0, 0, 4092715, 3926522, 166193, 40900, 0, 0, 0, 0, 40900, 3885622, '1'),
(18061, 'GJ-001', '8', '2025', '317', '2025-09-11', '12082393', 3060349, 91810, 3152159, 103645, 40850, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3502159, 3351664, 150495, 19900, 0, 0, 0, 0, 19900, 3331764, '1'),
(18062, 'GJ-001', '8', '2025', '318', '2025-09-11', '12632402', 2835021, 0, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 200000, 187500, 25359, 0, 0, 0, 0, 0, 3247880, 3103687, 144193, 0, 0, 0, 0, 0, 0, 3103687, '1'),
(18063, 'GJ-001', '8', '2025', '319', '2025-09-11', '11902298', 2835021, 300000, 3135021, 103645, 103645, 0, 22000, 6000, 0, 200000, 0, 50000, 438960, 0, 0, 0, 0, 0, 0, 0, 0, 3823981, 3588691, 235290, 0, 0, 0, 0, 0, 0, 3588691, '1'),
(18064, 'GJ-001', '8', '2025', '320', '2025-09-11', '12342398', 2470000, 365021, 2835021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3085021, 2918828, 166193, 0, 0, 0, 0, 0, 0, 2918828, '1'),
(18065, 'GJ-001', '8', '2025', '321', '2025-09-11', '0610785', 3300000, 100000, 3400000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3400000, 3221258, 178742, 0, 0, 0, 727583, 0, 727583, 2493675, '1'),
(18066, 'GJ-001', '8', '2025', '322', '2025-09-11', '8541686', 2545613, 300000, 2845613, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2845613, 2701420, 144193, 0, 0, 0, 0, 0, 0, 2701420, '1'),
(18067, 'GJ-001', '8', '2025', '323', '2025-09-11', '12502397', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 443154, 0, 0, 0, 0, 0, 0, 0, 0, 3503503, 3337310, 166193, 193100, 0, 0, 0, 0, 193100, 3144210, '1'),
(18068, 'GJ-001', '8', '2025', '324', '2025-09-11', '3161083', 3426500, 100000, 3526500, 104295, 72530, 0, 0, 6000, 0, 350000, 0, 50000, 0, 0, 500000, 408622, 0, 0, 0, 0, 0, 4835122, 4652297, 182825, 95900, 0, 0, 0, 0, 95900, 4556397, '1'),
(18069, 'GJ-001', '8', '2025', '325', '2025-09-11', '2270884', 3517500, 100000, 3617500, 103645, 37675, 28919, 22000, 6000, 0, 350000, 0, 250000, 0, 0, 0, 0, 1200000, 0, 0, 0, 0, 5417500, 5219261, 198239, 23000, 0, 0, 400000, 0, 423000, 4796261, '1'),
(18070, 'GJ-001', '8', '2025', '326', '2025-09-11', '2020883', 3517500, 100000, 3617500, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 178083, 0, 0, 0, 0, 0, 0, 3795583, 3651390, 144193, 0, 0, 0, 0, 0, 0, 3651390, '1'),
(18071, 'GJ-001', '8', '2025', '327', '0000-00-00', '5551288', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18072, 'GJ-001', '8', '2025', '328', '2025-09-11', '7731582', 2835021, 225948, 3060969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060969, 2916776, 144193, 0, 0, 0, 0, 0, 0, 2916776, '1'),
(18073, 'GJ-001', '8', '2025', '329', '2025-09-11', '6681492', 3192500, 51469, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 413797, 0, 0, 0, 0, 0, 0, 0, 0, 3907766, 3741573, 166193, 0, 0, 1104200, 0, 0, 1104200, 2637373, '1'),
(18074, 'GJ-001', '8', '2025', '330', '2025-09-11', '10011899', 2835021, 225328, 3060349, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2847059, 213290, 0, 0, 0, 0, 0, 0, 2847059, '1'),
(18075, 'GJ-001', '8', '2025', '331', '2025-09-11', '7441594', 2835021, 225329, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(18076, 'GJ-001', '8', '2025', '332', '2025-09-11', '2220862', 3060349, 183620, 3243969, 69097, 34548, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3254609, 3144964, 109645, 0, 0, 0, 0, 0, 0, 3144964, '1'),
(18077, 'GJ-001', '8', '2025', '333', '2025-09-11', '9401782', 2545613, 254388, 2800000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2800000, 2655807, 144193, 0, 0, 0, 0, 0, 0, 2655807, '1'),
(18078, 'GJ-001', '8', '2025', '334', '2025-09-11', '10351982', 2405000, 300000, 2705000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2705000, 2526258, 178742, 236100, 0, 0, 0, 0, 236100, 2290158, '1'),
(18079, 'GJ-001', '8', '2025', '335', '2025-09-11', '3661082', 3426500, 100000, 3526500, 103645, 172741, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3776500, 3472114, 304386, 0, 0, 0, 0, 0, 0, 3472114, '1'),
(18080, 'GJ-001', '8', '2025', '336', '2025-09-11', '1260772', 3300000, 100000, 3400000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3410640, 3266447, 144193, 0, 0, 1585100, 0, 0, 1585100, 1681347, '1'),
(18081, 'GJ-001', '8', '2025', '337', '2025-09-11', '11202286', 2470000, 300000, 2770000, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3020000, 2853807, 166193, 0, 0, 0, 0, 0, 0, 2853807, '1'),
(18082, 'GJ-001', '8', '2025', '338', '2025-09-11', '1240778', 3270000, 100000, 3370000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 6650, 0, 0, 0, 0, 0, 0, 0, 0, 3376650, 3232457, 144193, 0, 0, 0, 0, 0, 0, 3232457, '1'),
(18083, 'GJ-001', '8', '2025', '339', '2025-09-11', '3941089', 3060349, 183620, 3243969, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3065227, 178742, 0, 0, 0, 0, 0, 0, 3065227, '1'),
(18084, 'GJ-001', '8', '2025', '340', '2025-09-11', '1780873', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 68100, 0, 0, 0, 0, 68100, 3031676, '1'),
(18085, 'GJ-001', '8', '2025', '341', '2025-09-11', '9131798', 2545113, 300000, 2845113, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2845113, 2700920, 144193, 0, 0, 0, 0, 0, 0, 2700920, '1'),
(18086, 'GJ-001', '8', '2025', '342', '2025-09-11', '6241379', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 6650, 0, 0, 0, 0, 0, 0, 0, 0, 3250619, 3106426, 144193, 0, 0, 1187500, 0, 0, 1187500, 1918926, '1'),
(18087, 'GJ-001', '8', '2025', '343', '2025-09-11', '8041677', 2810026, 250324, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(18088, 'GJ-001', '8', '2025', '344', '2025-09-11', '1210783', 3270000, 100000, 3370000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 6650, 0, 0, 0, 0, 0, 0, 0, 0, 3376650, 3163360, 213290, 29200, 0, 1412500, 0, 0, 1441700, 1721660, '1'),
(18089, 'GJ-001', '8', '2025', '345', '2025-09-11', '0740781', 3300000, 100000, 3400000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 18620, 0, 0, 0, 0, 0, 0, 0, 0, 3418620, 3274427, 144193, 0, 0, 829900, 0, 0, 829900, 2444527, '1'),
(18090, 'GJ-001', '8', '2025', '346', '2025-09-11', '2830981', 3426500, 100000, 3526500, 103645, 69097, 0, 22000, 6000, 0, 0, 0, 250000, 1341044, 0, 0, 0, 0, 0, 0, 0, 0, 5117544, 4916802, 200742, 67800, 0, 0, 0, 0, 67800, 4849002, '1'),
(18091, 'GJ-001', '8', '2025', '347', '2025-09-11', '11020752', 2431000, 200000, 2631000, 69097, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2631000, 2521355, 109645, 0, 0, 0, 0, 0, 0, 2521355, '1'),
(18092, 'GJ-001', '8', '2025', '348', '2025-09-11', '1540768', 3270000, 100000, 3370000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3370000, 3225807, 144193, 0, 0, 0, 0, 0, 0, 3225807, '1'),
(18093, 'GJ-001', '8', '2025', '349', '2025-09-11', '7981580', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(18094, 'GJ-001', '8', '2025', '350', '2025-09-11', '4241181', 3060449, 183620, 3244069, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3244069, 3030779, 213290, 0, 0, 0, 0, 0, 0, 3030779, '1'),
(18095, 'GJ-001', '8', '2025', '351', '2025-09-11', '3401082', 3060349, 100000, 3160349, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50500, 0, 0, 0, 3210849, 2997559, 213290, 0, 0, 397500, 0, 0, 397500, 2600059, '1'),
(18096, 'GJ-001', '8', '2025', '352', '2025-09-11', '11622299', 2835021, 225327, 3060348, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 75333, 0, 0, 0, 0, 0, 0, 3135681, 2991488, 144193, 0, 0, 0, 0, 0, 0, 2991488, '1'),
(18097, 'GJ-001', '8', '2025', '353', '2025-09-11', '1380774', 3300000, 100000, 3400000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 390000, 0, 0, 0, 3790000, 3611258, 178742, 0, 0, 883400, 0, 0, 883400, 2727858, '1'),
(18098, 'GJ-001', '8', '2025', '354', '2025-09-11', '12872481', 2835021, 0, 2835021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2835021, 2690828, 144193, 0, 0, 0, 0, 0, 0, 2690828, '1'),
(18099, 'GJ-001', '8', '2025', '355', '2025-09-11', '2120869', 2500000, 200000, 2700000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2700000, 2555807, 144193, 0, 0, 0, 0, 0, 0, 2555807, '1'),
(18100, 'GJ-001', '8', '2025', '356', '2025-09-11', '1400784', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(18101, 'GJ-001', '8', '2025', '357', '2025-09-11', '9511797', 2835021, 300000, 3135021, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 166100, 0, 0, 0, 3301121, 3156928, 144193, 133500, 0, 0, 0, 0, 133500, 3023428, '1'),
(18102, 'GJ-001', '8', '2025', '358', '2025-09-11', '6721490', 3192500, 51469, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 150000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3652269, 3508076, 144193, 247100, 0, 1208400, 0, 0, 1455500, 2052576, '1'),
(18103, 'GJ-001', '8', '2025', '359', '2025-09-11', '10792091', 2810025, 250324, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2916156, 144193, 0, 0, 0, 0, 0, 0, 2916156, '1'),
(18104, 'GJ-001', '8', '2025', '360', '2025-09-11', '5261287', 3251000, 100000, 3351000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 150000, 1341044, 0, 0, 0, 0, 0, 0, 0, 0, 4842044, 4675851, 166193, 0, 0, 0, 0, 0, 0, 4675851, '1'),
(18105, 'GJ-001', '8', '2025', '361', '2025-09-11', '7641594', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 240000, 0, 0, 0, 0, 0, 0, 3733969, 3567776, 166193, 69200, 0, 0, 0, 0, 69200, 3498576, '1'),
(18106, 'GJ-001', '8', '2025', '362', '2025-09-11', '7071585', 3060349, 183620, 3243969, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3493969, 3258679, 235290, 0, 0, 0, 0, 0, 0, 3258679, '1'),
(18107, 'GJ-001', '8', '2025', '363', '2025-09-11', '12032298', 2835021, 300000, 3135021, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3385021, 3218828, 166193, 193900, 0, 0, 0, 0, 193900, 3024928, '1'),
(18108, 'GJ-001', '8', '2025', '364', '2025-09-11', '4261185', 3060349, 100000, 3160349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3160349, 3016156, 144193, 0, 0, 0, 0, 0, 0, 3016156, '1'),
(18109, 'GJ-001', '8', '2025', '365', '2025-09-11', '1790885', 3207000, 100000, 3307000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3307000, 3093710, 213290, 0, 0, 0, 0, 0, 0, 3093710, '1'),
(18110, 'GJ-001', '8', '2025', '366', '2025-09-11', '3411083', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 390000, 0, 0, 0, 3633969, 3420679, 213290, 0, 0, 454200, 0, 0, 454200, 2966479, '1'),
(18111, 'GJ-001', '8', '2025', '367', '2025-09-11', '3111074', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(18112, 'GJ-001', '8', '2025', '368', '2025-09-11', '8661694', 2835021, 300000, 3135021, 103645, 103645, 0, 22000, 6000, 0, 0, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3335021, 3099731, 235290, 55900, 0, 0, 0, 0, 55900, 3043831, '1'),
(18113, 'GJ-001', '8', '2025', '369', '2025-09-11', '9641892', 3060349, 183620, 3243969, 103645, 103645, 0, 22000, 6000, 0, 200000, 0, 200000, 430572, 0, 0, 0, 0, 0, 0, 0, 0, 4074541, 3839251, 235290, 0, 0, 0, 0, 0, 0, 3839251, '1'),
(18114, 'GJ-001', '8', '2025', '370', '2025-09-11', '12322301', 2470000, 365021, 2835021, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 408622, 0, 0, 0, 0, 0, 3243643, 3030353, 213290, 0, 0, 0, 0, 0, 0, 3030353, '1'),
(18115, 'GJ-001', '8', '2025', '371', '2025-09-11', '9371794', 2835021, 300000, 3135021, 103645, 103645, 0, 0, 6000, 0, 0, 0, 100000, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3493321, 3280031, 213290, 0, 0, 0, 0, 0, 0, 3280031, '1'),
(18116, 'GJ-001', '8', '2025', '372', '2025-09-11', '9751893', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 200000, 0, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3543969, 3377776, 166193, 92700, 0, 0, 0, 0, 92700, 3285076, '1'),
(18117, 'GJ-001', '8', '2025', '373', '2025-09-11', '5291290', 3251000, 100000, 3351000, 103645, 103645, 13782, 22000, 6000, 0, 0, 0, 100000, 1498731, 0, 0, 0, 0, 209400, 0, 0, 0, 5159131, 4910059, 249072, 163600, 0, 0, 0, 0, 163600, 4746459, '1'),
(18118, 'GJ-001', '8', '2025', '374', '2025-09-11', '11662299', 2324000, 300000, 2624000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2624000, 2479807, 144193, 0, 0, 0, 0, 0, 0, 2479807, '1'),
(18119, 'GJ-001', '8', '2025', '375', '2025-09-11', '5501291', 3251000, 100000, 3351000, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 1341044, 0, 0, 0, 0, 0, 0, 0, 0, 4942044, 4775851, 166193, 0, 0, 0, 0, 0, 0, 4775851, '1'),
(18120, 'GJ-001', '8', '2025', '376', '2025-09-11', '1910882', 3517500, 100000, 3617500, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3867500, 3701307, 166193, 0, 0, 0, 0, 0, 0, 3701307, '1'),
(18121, 'GJ-001', '8', '2025', '377', '2025-09-11', '1130780', 3060349, 183620, 3243969, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 10640, 0, 0, 0, 0, 0, 0, 0, 0, 3254609, 3041319, 213290, 0, 0, 1314200, 0, 0, 1314200, 1727119, '1'),
(18122, 'GJ-001', '8', '2025', '378', '2025-09-11', '3030977', 3309500, 100000, 3409500, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 108300, 0, 0, 0, 3517800, 3373607, 144193, 0, 0, 0, 0, 0, 0, 3373607, '1'),
(18123, 'GJ-001', '8', '2025', '379', '2025-09-11', '2090887', 3270000, 100000, 3370000, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 408622, 0, 0, 0, 0, 0, 3778622, 3599880, 178742, 283800, 0, 1579500, 0, 0, 1863300, 1736580, '1'),
(18124, 'GJ-001', '8', '2025', '380', '2025-09-11', '8191684', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3593969, 3449776, 144193, 0, 0, 0, 0, 0, 0, 3449776, '1'),
(18125, 'GJ-001', '8', '2025', '381', '2025-09-11', '7561581', 3060349, 183620, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 250000, 0, 0, 0, 0, 0, 281600, 0, 0, 0, 3775569, 3609376, 166193, 0, 0, 1443800, 0, 0, 1443800, 2165576, '1'),
(18126, 'GJ-001', '8', '2025', '382', '0000-00-00', '12062288', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18127, 'GJ-001', '8', '2025', '383', '0000-00-00', '12752492', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18128, 'GJ-001', '8', '2025', '384', '0000-00-00', '11372294', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18129, 'GJ-001', '8', '2025', '385', '2025-09-11', '2900967', 3060349, 183620, 3243969, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 26600, 0, 0, 0, 0, 0, 0, 0, 0, 3270569, 3091827, 178742, 0, 0, 0, 0, 0, 0, 3091827, '1'),
(18130, 'GJ-001', '8', '2025', '386', '2025-09-11', '2350881', 3485000, 100000, 1654615, 106050, 34548, 0, 22000, 6000, 0, 0, 0, 115385, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1770000, 1601401, 168598, 0, 0, 0, 0, 0, 0, 1601401, '1'),
(18131, 'GJ-001', '8', '2025', '387', '2025-09-11', '2030882', 3517500, 100000, 3617500, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 178083, 0, 0, 584900, 0, 0, 0, 4380483, 4236290, 144193, 0, 0, 0, 0, 0, 0, 4236290, '1'),
(18132, 'GJ-001', '8', '2025', '388', '2025-09-11', '1350789', 3300000, 100000, 3400000, 103645, 103645, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3400000, 3186710, 213290, 72900, 0, 0, 0, 0, 72900, 3113810, '1'),
(18133, 'GJ-001', '8', '2025', '389', '2025-09-11', '0180784', 3582500, 100000, 3682500, 103645, 69650, 0, 22000, 6000, 0, 0, 0, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3882500, 3681205, 201295, 21700, 0, 1766700, 0, 0, 1788400, 1892805, '1'),
(18134, 'GJ-001', '8', '2025', '390', '2025-09-11', '12112301', 2470000, 300000, 2770000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 408622, 0, 0, 0, 0, 0, 3178622, 3034429, 144193, 0, 0, 0, 0, 0, 0, 3034429, '1'),
(18135, 'GJ-001', '8', '2025', '391', '2025-09-11', '12612490', 3060349, 0, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3060349, 2894156, 166193, 23800, 0, 0, 0, 0, 23800, 2870356, '1'),
(18136, 'GJ-001', '8', '2025', '392', '2025-09-11', '6791495', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 67000, 0, 0, 0, 0, 67000, 3032776, '1'),
(18137, 'GJ-001', '8', '2025', '393', '2025-09-11', '6461380', 3192500, 51469, 3243969, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 100000, 314541, 0, 0, 0, 0, 0, 0, 0, 0, 3658510, 3492317, 166193, 52400, 0, 1744600, 0, 0, 1797000, 1695317, '1'),
(18138, 'GJ-001', '8', '2025', '394', '2025-09-11', '11322288', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 350000, 0, 0, 326600, 0, 0, 0, 0, 0, 0, 0, 0, 3920569, 3776376, 144193, 52600, 0, 0, 0, 0, 52600, 3723776, '1'),
(18139, 'GJ-001', '8', '2025', '395', '2025-09-11', '11332200', 2835021, 225328, 3060349, 103645, 34548, 0, 22000, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3110349, 2944156, 166193, 0, 0, 0, 0, 0, 0, 2944156, '1'),
(18140, 'GJ-001', '8', '2025', '396', '2025-09-11', '0480782', 3550000, 100000, 3650000, 103645, 172741, 0, 22000, 6000, 0, 350000, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4150000, 3845614, 304386, 0, 0, 1590000, 0, 0, 1590000, 2255614, '1'),
(18141, 'GJ-001', '8', '2025', '397', '2025-09-11', '12122301', 2470000, 300000, 2770000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 500000, 0, 0, 0, 0, 0, 0, 3270000, 3125807, 144193, 0, 0, 0, 0, 0, 0, 3125807, '1'),
(18142, 'GJ-001', '8', '2025', '398', '2025-09-11', '11252283', 2666000, 300000, 2966000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2966000, 2821807, 144193, 0, 0, 0, 0, 0, 0, 2821807, '1'),
(18143, 'GJ-001', '8', '2025', '399', '2025-09-11', '0840777', 3060349, 183620, 3243969, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3243969, 3099776, 144193, 0, 0, 0, 0, 0, 0, 3099776, '1'),
(18144, 'GJ-001', '8', '2025', '400', '2025-09-11', '11712278', 2835021, 225328, 3060349, 103645, 34548, 0, 0, 6000, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 178500, 0, 0, 0, 3288849, 3144656, 144193, 0, 0, 0, 0, 0, 0, 3144656, '1'),
(18145, 'GJ-001', '8', '2025', '401', '2025-09-11', '2310884', 3485000, 100000, 3585000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 258300, 0, 0, 0, 0, 0, 0, 0, 0, 3843300, 3699107, 144193, 0, 0, 0, 0, 0, 0, 3699107, '1'),
(18146, 'GJ-001', '8', '2025', '402', '2025-09-11', '4181182', 3060349, 183620, 3243969, 103645, 69097, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 306466, 0, 0, 0, 0, 0, 3550435, 3371693, 178742, 0, 0, 0, 0, 0, 0, 3371693, '1'),
(18147, 'GJ-001', '8', '2025', '403', '2025-09-11', '11782296', 2970000, 150000, 3120000, 103645, 34548, 0, 0, 6000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 78500, 0, 0, 0, 3198500, 3054307, 144193, 11100, 0, 0, 0, 0, 11100, 3043207, '1'),
(18148, 'GJ-001', '8', '2025', '404', '0000-00-00', '8591693', 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(18149, 'GJ-001', '8', '2025', '405', '2025-09-11', '12102301', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5112, 0, 0, 0, 0, 0, 5112, 5112, 0, 0, 0, 0, 0, 0, 0, 5112, '1');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `jenis_transaksi` varchar(100) DEFAULT NULL,
  `jam` datetime NOT NULL,
  `keterangan` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `jenis_transaksi`, `jam`, `keterangan`) VALUES
(1072, 'Proses Penilaian Kredensial', '2025-10-18 09:20:12', 'update nilai telah berhasil di database <strong>pengajaun_kredensial_detail</strong>'),
(1073, 'Proses Penilaian Kredensial', '2025-10-18 09:20:12', 'Sistem Berhasil mengupdate penilaian pada database <strong>penilaian_kredensial</strong> dengan kode pengajuan <strong>20251017001</strong>'),
(1074, 'Proses Penilaian Kredensial', '2025-10-18 09:20:17', 'sertifikat berhasil Terikirim ke <strong>maulanafajar752@gmail.com</strong>'),
(1075, 'Proses Penilaian Kredensial', '2025-10-18 09:22:32', 'update nilai telah berhasil di database <strong>pengajaun_kredensial_detail</strong>'),
(1076, 'Proses Penilaian Kredensial', '2025-10-18 09:22:32', 'Sistem Berhasil mengupdate penilaian pada database <strong>penilaian_kredensial</strong> dengan kode pengajuan <strong>20251017001</strong>'),
(1077, 'Proses Penilaian Kredensial', '2025-10-18 09:22:36', 'sertifikat berhasil Terikirim ke <strong>maulanafajar752@gmail.com</strong>'),
(1078, 'Proses Penilaian Kredensial', '2025-10-18 09:32:34', 'update nilai telah berhasil di database <strong>pengajaun_kredensial_detail</strong>'),
(1079, 'Proses Penilaian Kredensial', '2025-10-18 09:32:34', 'Sistem Berhasil mengupdate penilaian pada database <strong>penilaian_kredensial</strong> dengan kode pengajuan <strong>20251017001</strong>'),
(1080, 'Proses Penilaian Kredensial', '2025-10-18 09:32:39', 'sertifikat berhasil Terikirim ke <strong>maulanafajar752@gmail.com</strong>'),
(1081, 'Proses Penilaian Kredensial', '2025-10-18 09:35:02', 'update nilai telah berhasil di database <strong>pengajaun_kredensial_detail</strong>'),
(1082, 'Proses Penilaian Kredensial', '2025-10-18 09:35:02', 'Sistem Berhasil mengupdate penilaian pada database <strong>penilaian_kredensial</strong> dengan kode pengajuan <strong>20251017001</strong>'),
(1083, 'Proses Penilaian Kredensial', '2025-10-18 09:35:06', 'sertifikat berhasil Terikirim ke <strong>maulanafajar752@gmail.com</strong>');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `masa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`id`, `kode_barang`, `keterangan`, `masa`) VALUES
(1, '01', 'Tanah dan Bangunan', 40),
(2, '02', 'Barang bergerak / kendaraan', 8),
(3, '03', 'Alat Kesehatan', 10),
(4, '04', 'Mebeleur', 10),
(5, '04A', 'Kayu', 10),
(6, '04B', 'Besi', 10),
(7, '04C', 'Kaca', 10),
(8, '04D', 'Plastik', 10),
(9, '04E', 'Alumunium', 10),
(10, '05A', 'Perangkat Komputer', 5),
(11, '05B', 'Printer', 5),
(12, '06', 'Elektronik', 5),
(13, '07', 'AC', 7),
(14, '08', 'APAR', 5);

-- --------------------------------------------------------

--
-- Table structure for table `master_linen`
--

CREATE TABLE `master_linen` (
  `id` int(11) NOT NULL,
  `kode_linen` varchar(100) NOT NULL,
  `jenis_linen` varchar(1000) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_linen`
--

INSERT INTO `master_linen` (`id`, `kode_linen`, `jenis_linen`, `keterangan`) VALUES
(2, 'LN-001', 'Alas Timbangan', 'Alas di timbangan'),
(3, 'LN-002', 'Baju Bayi', 'Baju untuk bayi lahir'),
(4, 'LN-003', 'Baju Pasien', ''),
(5, 'LN-004', 'Baju Pengunjung', ''),
(6, 'LN-005', 'Baju Perawat/Dokter', ''),
(7, 'LN-006', 'Bantal', ''),
(8, 'LN-007', 'Bed Cover', ''),
(9, 'LN-008', 'Bedong Pink/Biru', ''),
(10, 'LN-009', 'Celana Perawat/Dokter', ''),
(11, 'LN-010', 'Celemek', ''),
(12, 'LN-011', 'Drum Jarum (Kotak/Panjang)', ''),
(13, 'LN-012', 'Duk Belah', ''),
(14, 'LN-013', 'Duk Lobang Kecil', ''),
(15, 'LN-014', 'Duk Lobang Sedang', ''),
(16, 'LN-015', 'ewrwer', 'werwerwer');

-- --------------------------------------------------------

--
-- Table structure for table `master_pegawai`
--

CREATE TABLE `master_pegawai` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(43) DEFAULT NULL,
  `jenis_pegawai` varchar(20) NOT NULL,
  `hirarki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_pegawai`
--

INSERT INTO `master_pegawai` (`id`, `jabatan`, `jenis_pegawai`, `hirarki`) VALUES
(1, 'PELAKSANA CASEMIX', 'medis', 0),
(2, 'PELAKSANA PERAWAT', 'medis', 5),
(3, '', '', 0),
(4, 'KEPALA RUANG', '0', 0),
(5, 'PELAKSANA SEKURITY', '0', 0),
(6, 'PELAKSANA TEHNISI', '0', 0),
(7, 'PELAKSANA ASPER', '0', 0),
(8, 'KOORDINATOR  IPSRS', '0', 0),
(9, 'PELAKSANA TTK', '0', 0),
(10, 'PELAKSANA ANALIS', '0', 0),
(11, 'PELAKSANA LOGISTIK GIZI', '0', 0),
(12, 'PELAKSANA ASISTEN KOKI', '0', 0),
(13, 'PELAKSANA PERAWAT GIGI', '0', 0),
(14, 'PELAKSANA LAUNDRY', '0', 0),
(15, 'WAKIL KOORDINATOR', '0', 0),
(16, 'PELAKSANA TEKNISI', '0', 0),
(17, 'PELAKSANA DRIVER', '0', 0),
(18, 'PELAKSANA PENYAJI', '0', 0),
(19, 'PELAKSANA OPERATOR', '0', 0),
(20, 'PELAKSANA ADMINISTRASI', '0', 0),
(21, 'PELAKSANA ADMINISTRASI INVENTARIS MEDIS', '0', 0),
(22, 'ADMIN KEPERAWATAN', 'penunjang medis', 5),
(23, 'PELAKSANA GARDENER', '0', 0),
(24, 'PELAKSANA BIDAN', '0', 0),
(25, 'PELAKSANA PENDAFTARAN', '0', 0),
(26, 'PELAKSANA KOKI', '0', 0),
(27, 'KOORDINATOR KOKI', '0', 0),
(28, 'SEKRETARIS', '0', 0),
(29, 'KOORDINATOR', '0', 0),
(30, 'PELAKSANA STERILISATOR', '0', 0),
(31, 'KOORDINATOR PIUTANG', '0', 0),
(32, 'KOORDINATOR TEHNISI', '0', 0),
(33, 'PELAKSANA CUSTOMER SERVICE', '0', 0),
(34, 'PELAKSANA RADIOGRAFER', '0', 0),
(35, 'KOORDINATOR MARKETING', '0', 0),
(36, 'PELAKSANA KURIR / FILLING', '0', 0),
(37, 'KA.KOMITE KEPERAWATAN DAN KEBIDANAN', 'medis', 3),
(38, 'PELAKSANA HOUSEKEEPING', '0', 0),
(39, 'KOORDINATOR CASEMIX', '0', 0),
(40, 'PELAKSANA KASIR', '0', 0),
(41, 'BAGIAN MOBILISASI DANA DAN PIUTANG', '0', 0),
(42, 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUAN', '0', 0),
(43, 'PELAKSANA FISIOTERAPI', '0', 0),
(44, 'KA. SIE. KEPERAWATAN DAN KEBIDANAN', 'medis', 3),
(45, 'PELAKSANA PERAWAT ANASTESI', '0', 0),
(46, 'KERJASAMA BISNIS', '0', 0),
(47, 'AHLI GIZI', 'penunjang medis', 4),
(48, 'KA.INST RAWAT INAP', '0', 0),
(49, 'KOORDINATOR ADMIN DAN LAUNDRY', '0', 0),
(50, 'PELAKSANA PORTIR', '0', 0),
(51, 'KOORDINATOR KEBERSIHAN DAN PERTAMANAN', '0', 0),
(52, 'SUB. BAG. MOBILISASI DANA', '0', 0),
(53, 'PELAKSANA  STERILISATOR', '0', 0),
(54, 'PELAKSANA OB', '0', 0),
(55, 'DIREKTUR RSPM', '0', 0),
(56, 'KOORDINATOR LAUNDRY DAN ADMINISTRASI LINEN', '0', 0),
(57, 'PELAKSANA PERAWAT IPCN', '0', 0),
(58, 'SUPERVISOR KEPERAWATAN', '0', 0),
(59, 'KA. KOMITE PMKP', 'medis', 3),
(60, 'KA.INSTALASI ICU', '0', 0),
(61, 'APOTEKER  SATELIT', '0', 0),
(62, 'PELAKSANA MEDIS', '0', 0),
(63, 'KOMITE PPI & KABID. MEDIS', '0', 0),
(64, 'DIREKTUR PT. PPU / WADIR KEUANGAN', '0', 0),
(65, 'KA.INSTALASI HEMODIALISA', '0', 0),
(66, 'DR.SPESIALIS', '0', 0),
(67, 'KA. KOMITE MEDIK &KA. INSTALASI IBS', '0', 0),
(68, 'PELAKSANA', '0', 0),
(69, 'KA. INSTALASI FARMASI', '0', 0),
(70, 'KA.HUMAS DAN SIM RS', 'non medis', 3),
(71, 'KA. KOMITE ETIK DAN HUKUM', '0', 0),
(72, 'KASIE PENUNJANG MEDIS', '0', 0),
(73, 'KOORDINATOR TEKNISI MEDIS', '0', 0),
(74, 'KOORDINATOR FARMASI RAWAT JALAN', '0', 0),
(75, 'PELKSANA TTK', '0', 0),
(76, 'FISIKAWAN MEDIS', '0', 0),
(77, 'APOTEKER', 'medis', 4),
(78, 'BIDANG ADMINITRASI DAN KEPEGAWAIAN', 'non medis', 3),
(79, 'KOORDINATOR BAGIAN UMUM', '0', 0),
(80, 'PELAKASANA REKAM MEDIS', '0', 0),
(81, 'KEPALA SEKSI PELAYANAN MEDIS', '0', 0),
(82, 'DOKTER SPESIALIS ANAK', '0', 0),
(83, 'KA. INS RAWAT JALAN', 'medis', 3),
(84, 'PELAKSANA RM', '0', 0),
(85, 'PELAKSANA APOTEKER', '0', 0),
(86, 'DOKTER UMUM', '0', 0),
(87, 'DR. SP.PK / KA.INS LABORAT', '0', 0),
(88, 'PELAKSANA RADIOLOGI', '0', 0),
(89, 'KOORDINATOR PAJAK & TARIF', '0', 0),
(90, 'KOOR. ADMINISTRASI KEPEGAWAIAN', '0', 0),
(91, 'PELAKSANA IT', '0', 0),
(92, 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUAN', '0', 0),
(93, 'KA. BAGIAN HUMAS DAN MARKETING DAN SIM RS', '0', 0),
(94, 'SADASDASD', 'medis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_rkk`
--

CREATE TABLE `master_rkk` (
  `id` int(11) NOT NULL,
  `jenis_rkk` varchar(50) NOT NULL,
  `nama_rkk` varchar(100) NOT NULL,
  `unit_rkk` varchar(100) NOT NULL,
  `keterangan_rkk` varchar(1000) NOT NULL,
  `jumlah_rkk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_rkk`
--

INSERT INTO `master_rkk` (`id`, `jenis_rkk`, `nama_rkk`, `unit_rkk`, `keterangan_rkk`, `jumlah_rkk`) VALUES
(1, 'perawat', 'PK-1', 'UMUM', 'Tindakan keperawatan umum sesuai standar rumah sakit untuk perawat dengan STR aktif', 0),
(2, 'perawat', 'PK-2', 'ANESTASI', 'Kewenangan lanjutan untuk tenaga keperawatan di bidang anestesi, meliputi persiapan, asistensi, pemantauan, dan penanganan awal komplikasi sesuai kompetensi dan pelatihan', 0),
(3, 'perawat', 'PK-3', 'ANESTASI', 'Kewenangan klinis tingkat lanjut/spesialis di bidang anestesi, termasuk tindakan mandiri sesuai kompetensi khusus dan kewenangan yang disahkan rumah sakit.', 0),
(4, 'perawat', 'PK-2', 'IGD', 'Kewenangan lanjutan di Instalasi Gawat Darurat, meliputi triase, tindakan kegawatdaruratan dasar, dan asistensi prosedur medis sesuai kompetensi.', 0),
(5, 'perawat', 'PK-3', 'IGD', 'Kewenangan spesialis di IGD, mencakup penanganan kegawatdaruratan kompleks, tindakan mandiri sesuai kompetensi, dan koordinasi tim medis dalam situasi kritis.', 0),
(6, 'perawat', 'PK-2', 'IPCN', 'Kewenangan lanjutan bagi perawat pengendali infeksi, meliputi pemantauan kepatuhan pencegahan infeksi, investigasi kasus, dan edukasi sesuai kompetensi.', 0),
(7, 'perawat', 'PK-3', 'IPCN', 'Kewenangan spesialis pengendalian infeksi, mencakup perencanaan program, audit, dan pengambilan keputusan strategis pencegahan infeksi di fasilitas kesehatan.', 0),
(8, 'perawat', 'PK-2', 'BEDAH', 'Kewenangan lanjutan di bidang bedah, meliputi asistensi tindakan operasi, perawatan pra dan pasca bedah, serta penanganan komplikasi awal sesuai kompetensi.', 0),
(9, 'perawat', 'PK-3', 'BEDAH', 'Kewenangan spesialis di bidang bedah, termasuk tindakan mandiri tertentu, manajemen kasus kompleks, dan koordinasi tim bedah.', 0),
(10, 'perawat', 'PK-2', 'MEDIKAL BEDAH', 'Kewenangan lanjutan perawatan pasien medikal-bedah, mencakup monitoring intensif, tindakan keperawatan khusus, dan asistensi prosedur.', 0),
(11, 'perawat', 'PK-3', 'MEDIKAL BEDAH', 'Kewenangan spesialis medikal-bedah, termasuk manajemen kasus kompleks, tindakan mandiri sesuai kompetensi, dan koordinasi tim perawatan.', 0),
(12, 'perawat', 'PK-2', 'HEMODIALISA', 'Kewenangan lanjutan di layanan hemodialisa, mencakup persiapan mesin, asistensi prosedur, dan pemantauan pasien selama dialisis.', 0),
(13, 'perawat', 'PK-3', 'HEMODIALISA', 'Kewenangan spesialis hemodialisa, termasuk penanganan kasus kompleks, penyesuaian tindakan mandiri, dan koordinasi pelayanan dialisis.', 0),
(14, 'perawat', 'PK-2', 'ICU', 'Kewenangan lanjutan di ICU, mencakup monitoring ketat, tindakan keperawatan khusus, dan asistensi prosedur kritis.', 0),
(15, 'perawat', 'PK-3', 'ICU', 'Kewenangan spesialis ICU, termasuk manajemen kasus kritis kompleks, tindakan mandiri sesuai kompetensi, dan koordinasi tim perawatan intensif.', 0),
(16, 'perawat', 'PK-2', 'NEONATOLOGI', 'Kewenangan lanjutan perawatan bayi baru lahir, mencakup monitoring, tindakan keperawatan khusus, dan asistensi prosedur neonatal.', 0),
(17, 'perawat', 'PK-3', 'NEONATOLOGI', 'Kewenangan spesialis perawatan neonatal, termasuk penanganan kasus kompleks, tindakan mandiri sesuai kompetensi, dan koordinasi tim perawatan bayi.\n\n\n\n\n\n\n\n\n\nAsk ChatGPT\n', 0),
(18, 'bidan', 'PK-1', 'BIDAN', 'Kewenangan dasar asuhan kebidanan normal, termasuk pemeriksaan kehamilan, pertolongan persalinan normal, dan perawatan nifas dasar.', 0),
(19, 'bidan', 'PK-2', 'BIDAN', 'Kewenangan lanjutan kebidanan, meliputi penanganan komplikasi ringan, asistensi tindakan medis, dan edukasi kesehatan ibu-bayi.', 0),
(20, 'bidan', 'PK-3', 'BIDAN', 'Kewenangan spesialis kebidanan, termasuk manajemen kasus kompleks, tindakan mandiri sesuai kompetensi, dan koordinasi layanan maternal.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

CREATE TABLE `master_unit` (
  `id` int(11) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`id`, `unit_kerja`) VALUES
(1, 'CASEMIX'),
(2, 'IBS'),
(3, 'POLIKLINIK'),
(4, 'IT'),
(5, 'LABORATORIUM'),
(6, 'ARIMBI'),
(7, 'DEWI KUNTHI'),
(8, 'RAMA SHINTA'),
(9, 'SECURITY'),
(10, 'IPSRS'),
(11, 'IKB'),
(12, 'ICU'),
(14, 'FARMASI'),
(15, 'GIZI'),
(16, 'LAUNDRY'),
(17, 'DRIVER'),
(18, 'HUMAS'),
(19, 'BAGIAN UMUM'),
(20, 'HEMODIALISA'),
(21, 'KEPERAWATAN'),
(22, 'GARDENER'),
(23, 'PERISTI'),
(24, 'RADIOLOGI'),
(25, 'PENDAFTARAN'),
(26, 'SEKRETARIAT'),
(27, 'KASIR'),
(28, 'CSSU'),
(29, 'REKAM MEDIS'),
(30, 'KOMITE KEPERAWATAN'),
(31, 'HOUSEKEEPING'),
(32, 'KEUANGAN'),
(33, 'IGD'),
(34, 'FISIOTERAPI'),
(35, 'PELAYANAN MEDIS'),
(36, 'OB'),
(37, 'DIREKSI'),
(38, 'BIDANG UMUM'),
(39, 'IPCN'),
(40, 'KOMITE PMKP'),
(41, 'HRD'),
(42, 'KOMITE PPI'),
(43, 'TEKNISI MEDIS'),
(44, 'FISIKAWAN MEDIS'),
(45, 'BIDANG PENUNJANG- RM'),
(46, 'BIDANG PELAYAN MEDIS'),
(47, 'IBS ANASTESI'),
(48, 'INFORMASI'),
(49, 'MEDIS'),
(50, 'BIDANG KOMITE PMKP'),
(51, 'PENUNJANG MEDIS');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` varchar(11) NOT NULL,
  `jenis_pegawai` varchar(100) DEFAULT NULL,
  `jenis_kesehatan` varchar(100) DEFAULT NULL,
  `jenjang_karir` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `tmt` date NOT NULL,
  `skpt` date NOT NULL,
  `masa` varchar(100) NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `alamat2` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `status_kawin` varchar(100) NOT NULL,
  `status_pegawai` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nopeg`, `nama`, `nik`, `agama`, `gender`, `tmpt_lahir`, `tgl_lahir`, `umur`, `jenis_pegawai`, `jenis_kesehatan`, `jenjang_karir`, `jabatan`, `unit`, `tmt`, `skpt`, `masa`, `ijazah`, `alamat`, `alamat2`, `email`, `telpon`, `status_kawin`, `status_pegawai`, `username`, `password`, `foto`, `admin`) VALUES
(140, '123', 'Super Admin App', '132123123', '', 'Laki-laki', 'RSPM', '2024-06-05', '0', NULL, NULL, NULL, 'PELAKSANA', 'IT', '2024-06-06', '2024-06-05', '0 Th 0 bln', 'DIII', 'RSPM', '', '', '0123123123132', 'Belum Kawin', 'RESIGN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'man.png', 1),
(5555, '0010749', 'DR. UTOMO DS, SP OG', '', '', 'Laki-laki', 'Purwokerto', '1950-08-05', '73 Th 10 bl', NULL, NULL, NULL, 'DIREKTUR PT. PPU / WADIR KEUANGAN', 'DIREKSI', '0000-00-00', '0000-00-00', '17 Th ', '', 'Jl. Hayam Wuruk No. 24 Palembahan Rt 001 Rw 006 Kalongan Purwodadi Grobogan', '', '', '', '', 'KONTRAK', '0010749', 'fd6b52a91b36a1e6c3d8cf643a6abb5a', 'man.png', 0),
(5556, '0020770', 'DR. ARLIS HASYIM M, SP. OG', '', '', 'Laki-laki', 'Magelang', '1972-04-07', '52 Th 2 bln', NULL, NULL, NULL, 'DR.SPESIALIS', 'PELAYANAN MEDIS', '0000-00-00', '0000-00-00', '17 Th ', '', 'Jl. Bukit Barisan Blok B I/2 Rt 015 Rw 008 Bringin Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '0020770', 'd620e9a205ff35232d6704d7a7853e7e', 'man.png', 0),
(5557, '0040779', 'DEDY SETIAWAN', '3302261301790002', '', 'Laki-laki', 'Banyumas', '1979-01-13', '45 tahun 7 ', NULL, NULL, NULL, 'KEPALA INSTALASI IT&SIM RS', 'IT', '2016-05-06', '2016-05-06', '17 Th ', 'SI', 'Ds. Karang Tengah RT 01/RW 05 Penaruban Weleri Kendal', '', '', '08156806679', 'Kawin', 'TETAP', '0040779', 'e7197490367cf7ad4291f437793d1260', 'man.png', 1),
(5558, '0060771', 'NUR PRASETYO', '', '', 'Laki-laki', 'Semarang', '1971-07-10', '52 Th 11 bl', NULL, NULL, NULL, 'KOORDINATOR  IPSRS', 'IPSRS', '2015-01-07', '2015-01-07', '17 Th ', '', ' Jl. Potrosari Tangah No. 6 Rt 001 Rw 007 Srondol Kulon Banyumanik ', '', '', '', '', 'TETAP', '0060771', '305dd7e2eee0adcdb3b63c19edb26466', 'man.png', 0),
(5559, '0070777', 'KARYATI', '', '', 'Perempuan', 'Cilacap', '1977-06-19', '46 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'CASEMIX', '2010-02-09', '2010-02-09', '17 Th ', '', 'Jl. Jangli No. 201 A Jatingaleh Candisari Smg', '', '', '', 'kawin', 'TETAP', '0070777', '98e4e55803381ee5a3916873d2f75a6f', 'woman.png', 0),
(5560, '0090778', 'DAKIRIN', '', '', 'Laki-laki', 'Demak', '1978-05-14', '46 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2007-12-05', '2007-12-05', '17 Th ', '', 'Jl. Wahyu Asri Utara III No. Ngaliyan Semarang', '', '', '', '', 'TETAP', '0090778', 'd8fb6609509ce5fbb456f5dd08375a62', 'man.png', 3),
(5561, '0100780', 'HENY TRI PAMULARSIH', '', '', 'Perempuan', 'Grobogan', '1980-02-21', '44 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2016-12-05', '2016-12-05', '17 Th ', '', ' BSB Village Aurora Boulevard 31 No 3 Rt 001 Rw 005 Bubakan Mijen Semarang ', '', '', '', '', 'TETAP', '0100780', '6bf50155b31105270bba91ef244ed24e', 'woman.png', 0),
(5562, '0180784', 'WIDI PARAMITA AYUNINGTIYAS', '', '', 'Perempuan', ' Grobogan ', '1984-07-11', '39 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2016-02-06', '2016-02-06', '17 Th ', '', 'Jl. Karonsih Timur V No. 307 Rt. 11 / 05 Ngalian Semarang', '', '', '', '', 'TETAP', '0180784', '49240982ec283db74c20b79e83788028', 'woman.png', 0),
(5563, '0210784', 'DIANA SARI', '', '', 'Perempuan', 'Brebes', '1984-03-14', '40 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2016-03-06', '2016-03-06', '17 Th ', '', 'Wonosari Rt. 001 / 010 Wonosari Ngaliyan  Smg', '', '', '', '', 'TETAP', '0210784', '1ed4bc64af88addb27eae513d49e9390', 'woman.png', 0),
(5564, '0380784', 'KAMDIYAH', '', '', 'Perempuan', ' Jepara ', '1984-04-07', '40 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2010-08-06', '2010-08-06', '17 Th ', '', ' Jl. Puspowarno VIII/18 Salamanmloyo Semarang ', '', '', '', '', 'TETAP', '0380784', 'ac3e595a366b3dc813138d60e7fbe389', 'woman.png', 0),
(5565, '0430784', 'ARRI IKA NURYANTO', '', '', 'Laki-laki', 'Jepara', '1984-11-14', '39 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2019-09-06', '2019-09-06', '17 Th ', '', 'Jl. Wisma Sari Selatan No. 24 Rt. 03 / 01 Ngalian Semarang', '', '', '', '', 'TETAP', '0430784', 'fd7523197d02d52aa0fc2d37daebcfd5', 'man.png', 0),
(5566, '0480782', 'WULIANA SARI', '', '', 'Perempuan', 'Semarang', '1984-12-27', '39 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2016-09-06', '2016-09-06', '17 Th ', '', 'Jl. Sendang Indah B.60 Rt. 02 / 04 Muktiharjo Lor Genuk Smg', '', '', '', '', 'TETAP', '0480782', 'c75071fa68f87ef5f4e6cbd1ce2d2abe', 'woman.png', 0),
(5567, '0510783', 'LUCKY DARMAYANTI', '', '', 'Perempuan', 'Semarang', '1983-11-09', '40 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2018-09-06', '2018-09-06', '17 Th ', '', 'Gemah Raya Rt. 06 / 06 Pedurungan Semarang 50191', '', '', '', '', 'TETAP', '0510783', '36011c705e6c023d65b4a840169bdca0', 'woman.png', 0),
(5568, '0580785', 'HARIYANTI', '', '', 'Perempuan', 'Semarang', '1985-03-10', '39 Th 3 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'IBS', '2016-11-06', '2016-11-06', '17 Th ', '', 'Jl. Cempaka Sari Timur No. 15  Rt.03 /01 Sekaran Gn.pati Smg', '', '', '', '', 'TETAP', '0580785', '690d6a5775d37e5970ab224082c497d0', 'woman.png', 0),
(5569, '0590786', 'DIAN PANCAWATI', '', '', 'Perempuan', 'Grobogan', '1986-01-11', '38 Th 4 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'IKB', '2018-11-06', '2018-11-06', '17 Th ', '', 'Sambak Rt. 005 / 005 Ds. Danyang Purwodadi Grob', '', '', '', '', 'TETAP', '0590786', '9806d4201a875734e3925a27b0a0b1eb', 'woman.png', 0),
(5570, '0600786', 'DATI SELOWARNI', '', '', 'Perempuan', 'Purbalingga', '1986-01-22', '38 Th 4 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'ICU', '2019-11-06', '2019-11-06', '17 Th ', '', 'Dsn Dotakan Rt. 05 / 03 Candiroto Temanggung', '', '', '', '', 'TETAP', '0600786', '141f3cc9c84c6b15101b15b99bfa183f', 'woman.png', 0),
(5571, '0610785', 'SITI CHANIFAH', '', '', 'Perempuan', 'Jepara', '1986-09-08', '37 Th 9 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'POLIKLINIK', '2016-11-06', '2016-11-06', '17 Th ', '', 'Jl. Welahan Gotri  Rt. 11 / 02 Bakalan Kalinyamatan Jepara', '', '', '', '', 'TETAP', '0610785', '2f01df4587ade02e3bf0b7a73dbf1674', 'woman.png', 0),
(5572, '0630784', 'ABNITA PUSPA SARI', '', '', 'Perempuan', 'Semarang', '1984-04-14', '40 Th 1 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'LABORATORIUM', '2016-11-06', '2016-11-06', '17 Th ', '', 'Jl. Pisang II / 11 Rt. 005 / 003 Lamper Tengah Smg ', '', '', '', '', 'TETAP', '0630784', '8201f6ca26611fee8dbe166a97f208ba', 'woman.png', 0),
(5573, '0660784', 'NURUL HIDAYANTI', '', '', 'Perempuan', 'Semarang', '1984-09-22', '39 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2017-02-07', '2017-02-07', '17 Th ', '', 'Tugurejo RT 5 RW 5 no.21 kel.tugurejo kec.tugu Semarang barat', '', '', '', '', 'TETAP', '0660784', '10475e66873a85602ffb3a471f63b4e2', 'woman.png', 0),
(5574, '0690787', 'PAVIEKA DYSA RESMIATOVI', '', '', 'Perempuan', 'Semarang', '1987-12-17', '36 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2007-02-07', '2007-02-07', '17 Th ', '', 'Pondok Raden Patah Blok B 2 / 26  Sriwulan Sayung Demak', '', '', '', '', 'TETAP', '0690787', '7841d01ba05ee053f59569f9ad5b569e', 'woman.png', 0),
(5575, '0730784', 'DWI PARYANTI', '', '', 'Perempuan', 'Semarang', '1984-10-30', '39 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2012-03-07', '2012-03-07', '17 Th ', '', 'Pengilon III Beringin Rt. 003 / 002 Beringin Ngaliyan Semarang ', '', '', '', '', 'TETAP', '0730784', '76b827d90b47c6656dfdae68240ba73c', 'woman.png', 0),
(5576, '0740781', 'SUMINEM', '', '', 'Perempuan', 'Grobogan', '1981-10-02', '42 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA LOGISTIK GIZI', 'GIZI', '2016-03-07', '2016-03-07', '17 Th ', '', 'Ds. Gedangan Rt.08/ Rw. 06 Boja Kendal', '', '', '', '', 'TETAP', '0740781', 'd32a059fe8562e7cf5e5a5d95b5eabdb', 'woman.png', 0),
(5577, '0770783', 'PRATIWI ITA YULIASTANTI*', '', '', 'Perempuan', 'Semarang', '1983-09-26', '40 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA PERAWAT GIGI', 'POLIKLINIK', '2007-05-01', '2007-05-01', '17 Th ', '', 'Jl. Wahyu Asri VIII / A. 14 Rt. 004 / VI Tambakaji  Ngaliyan Smg', '', '', '', '', 'TETAP', '0770783', 'a3a9cea1d102220b77267bd6461652a7', 'woman.png', 0),
(5578, '0790771', 'HARYADI', '', '', 'Laki-laki', 'Kudus', '1971-08-09', '52 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2007-06-07', '2007-06-07', '17 Th ', '', 'Pengilon II Rt. 003 / 002 Beringin Ngaliyan Smg', '', '', '', '', 'TETAP', '0790771', '8dd85c9977efe497300775fb7370f849', 'man.png', 0),
(5579, '0800778', 'ALI SUPRIYATNO', '', '', 'Laki-laki', 'semarang', '1978-10-19', '45 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2007-06-07', '2007-06-07', '17 Th ', '', 'Kp. Kedungpane Rt. 006 / 010 Ngaliyan Smg', '', '', '', '', 'TETAP', '0800778', '861876ef898690ae33e3d33d9bec01c9', 'man.png', 0),
(5580, '0820767', 'MASCHUT', '', '', 'Laki-laki', 'Grobogan', '1967-04-14', '57 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2007-06-07', '2007-06-07', '17 Th ', '', 'Jl. Purwoyoso II/17 Rt. 002 / 012 Purwoyoso Ngaliyan Smg', '', '', '', '', 'TETAP', '0820767', '84e1513059e0468d9301610aa8af94cb', 'man.png', 0),
(5581, '0830775', 'EKO SUTRISNO', '', '', 'Laki-laki', 'Semarang', '1975-12-27', '48 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2016-09-06', '2016-09-06', '17 Th ', '', 'Jl. Honggowongso No. 16 Rt. 02 / 09 Purwoyoso Ngaliyan Smg', '', '', '', '', 'KONTRAK', '0830775', '6cf143dfaf4ccf508dcf1b611670fa76', 'man.png', 0),
(5582, '0840777', 'YATIN', '', '', 'Laki-laki', 'Grobogan', '1977-11-24', '46 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2007-06-07', '2007-06-07', '17 Th ', '', 'Pulutan Rt. 003 / 003 Penawangan Grobogan', '', '', '', '', 'TETAP', '0840777', '5d125d87a5fa87e7d6d40edb7c0ec537', 'man.png', 0),
(5583, '0860770', 'MUHAMAD BAHRUM', '', '', 'Laki-laki', 'Kendal', '1970-10-14', '53 Th 7 bln', NULL, NULL, NULL, 'WAKIL KOORDINATOR', 'SECURITY', '2007-06-07', '2007-06-07', '17 Th ', '', 'Kliwonan Rt. 06 / VII Tambakaji Ngaliyan Semarang', '', '', '', '', 'TETAP', '0860770', '881039faaefacfe2b1a99083fb6ee7b4', 'man.png', 0),
(5584, '0880769', 'AGUNG', '', '', 'Laki-laki', 'Gresik', '1969-03-15', '55 Th 2 bln', NULL, NULL, NULL, 'WAKIL KOORDINATOR', 'SECURITY', '2007-06-07', '2007-06-07', '17 Th ', '', 'Pengilon II  / 12 Rt. 02 / 02 Beringin Ngaliyan Smg', '', '', '', '', 'TETAP', '0880769', 'bc1d3ce217395485af9b96109f503752', 'man.png', 0),
(5585, '0900777', 'JOKO PRIANDONO NURWAHYUDI', '', '', 'Laki-laki', 'Purwokerto', '1977-05-14', '47 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA TEKNISI', 'IPSRS', '0000-00-00', '0000-00-00', '17 Th ', '', 'Bringin Lestari Blok C Jl. B. Beringin Brt III No. 73 Ngaliyan Smg', '', '', '', '', 'TETAP', '0900777', '66ec533f33974e692295ef3061090dcc', 'man.png', 0),
(5586, '0920779', 'RURY MAHARDHIKA GINUNG P.', '', '', 'Perempuan', 'Semarang', '1979-12-17', '44 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2007-06-07', '2007-06-07', '17 Th ', 'SI', 'Jl. RM.Hadisoebeno GG. Rambutan I A No 19', '', '', '085643925558', 'Cerai Hidup', 'TETAP', '0920779', 'afb54daa2dbbcd01cc3af71370b379ef', 'woman.png', 0),
(5587, '1030777', 'LOKASTHITI, Amd', '3374075405770002', '', 'Perempuan', 'Cilacap', '1977-05-14', '47 tahun 2 ', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2007-08-07', '2007-08-07', '17 Th ', 'SI', 'Jl. Kertanegara Selatan No.1A RT.08/ RW.02, Pleburan, Semarang ', '', '', '082242594050', 'Kawin', 'TETAP', '1030777', '0770991ee97c3cee18b8d2d701255663', '6698e913bb6a8_IMG-20220131-WA0019.jpg', 0),
(5588, '1100779', 'NURYANTO ADI WIBOWO', '', '', 'Laki-laki', 'Semarang', '1979-02-21', '45 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA DRIVER', 'DRIVER', '2007-08-10', '2007-08-10', '17 Th ', '', 'Duwet Ngalian Rt. 005 Rw. 010 Ngaliyan Semarang', '', '', '', '', 'TETAP', '1100779', '403ae58b5fdd512be39c07da9824e9d4', 'man.png', 0),
(5589, '1110779', 'ATIK MARIYANI', '', '', 'Perempuan', 'semarang', '1979-09-06', '44 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2007-08-18', '2007-08-18', '17 Th ', '', 'Jl. Pengilon II No. 10 Rt. 002 Rw. 002 Bringin Ngalian Smg', '', '', '', '', 'TETAP', '1110779', 'b488f89999a8cf91ace365677816463b', 'woman.png', 0),
(5590, '1120769', 'HARTINI', '', '', 'Perempuan', 'Sukoharjo', '1969-06-12', '54 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '2007-08-01', '2007-08-01', '17 Th ', '', 'Jl. Wismasari Selatan No. 24 Rt. 003 RW. 001 Kel. Ngaliyan Smg', '', '', '', '', 'TETAP', '1120769', 'b2057eff235fa7a9ccd02478892d0fa9', 'woman.png', 0),
(5591, '1130780', 'UMI RUSWATI', '', '', 'Perempuan', 'Semarang', '1980-10-01', '43 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '2007-08-16', '2007-08-16', '17 Th ', '', 'Persilan Rt. 001 Rw. 001 No. 03 Ngalian Semarang', '', '', '', '', 'TETAP', '1130780', '76a9bbc7efe5c6c8ac1e3db8ce5e8df1', 'woman.png', 0),
(5592, '1140773', 'JURIYAH', '', '', 'Perempuan', 'Kendal', '1973-11-02', '50 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA PENYAJI', 'GIZI', '2007-08-17', '2007-08-17', '17 Th ', '', 'Jl. Pengilon II No. 23 Rt. 04 Rw. 02 Kel. BeringinNgaliyan Smg', '', '', '', '', 'TETAP', '1140773', 'b6b4c5cc568df6a7e6ca4d07c38fce37', 'woman.png', 0),
(5593, '1160781', 'FITRIYONO', '', '', 'Laki-laki', 'semarang', '1981-03-16', '43 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2007-08-09', '2007-08-09', '17 Th ', '', 'Taman Condrokusumo VIII Rt. 006 / 004 Kel. Bonsari Smg Brt', '', '', '', '', 'TETAP', '1160781', 'e6c5428aa1626a073c83f26499dff821', 'man.png', 0),
(5594, '1210783', 'SUMIATI', '', '', 'Perempuan', 'Semarang', '1983-04-18', '41 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA PENYAJI', 'GIZI', '2007-08-14', '2007-08-14', '17 Th ', '', 'Pengilon V No. 11 Rt. 003 / 002 Kel. Beringin Ngalian Smg', '', '', '', '', 'TETAP', '1210783', 'e303edabc5e202e3cba745c1e4bec897', 'woman.png', 0),
(5595, '1220787', 'KUTI INDRAWATI', '', '', 'Perempuan', 'Sukoharjo', '1987-05-04', '37 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA PENYAJI', 'GIZI', '2007-08-12', '2007-08-12', '17 Th ', '', 'Dk Persilan No. 30 Rt. 001 / 001 Kel. Ngaliyan Smg', '', '', '', '', 'TETAP', '1220787', '4a21cb93abd436ee8a59fb641ff4caaf', 'woman.png', 0),
(5596, '1240778', 'SRIWATI', '', '', 'Perempuan', 'Semarang', '1978-03-30', '46 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA PENYAJI', 'GIZI', '2007-08-11', '2007-08-11', '17 Th ', '', 'Kedungpane Rt. 003 / 010 Kel. Ngalian Smg', '', '', '', '', 'TETAP', '1240778', '653739950daf026ad1d7fd1160c8c4b1', 'woman.png', 0),
(5597, '1250780', 'NGATEMAH', '', '', 'Perempuan', 'Semarang', '1980-04-14', '44 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '2007-08-13', '2007-08-13', '17 Th ', '', 'Ngadirgo Rt. 001 / 003 Kel. Ngadirgo Kec. Mijen Semarang', '', '', '', '', 'TETAP', '1250780', '4ab9571f1b7062ba5167c8abdced3ad0', 'woman.png', 0),
(5598, '1260772', 'SRI WAHYUNI', '', '', 'Perempuan', 'Cilacap', '1972-07-13', '51 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '0000-00-00', '0000-00-00', '17 Th ', '', 'Puri Arga Golf C-1 No. 7 BSb Semarang', '', '', '', '', 'TETAP', '1260772', '5783d30f24525f024884a6fa66fe0ed5', 'woman.png', 0),
(5599, '1300788', 'MA\'RIFAH BUDI KHASANAH', '', '', 'Perempuan', 'Batang', '1988-06-12', '35 Th 11 bl', '1', '2', NULL, 'PELAKSANA ASPER', 'RAMA SHINTA', '2007-05-01', '2007-05-01', '17 Th ', '', 'Wirosari III Blok A1 No. 11 RT. 02/09 Sambong Batang', '', '', '', '', 'TETAP', '1300788', '6f64dacc72cf1d705f1913333b3f1536', 'woman.png', 0),
(5600, '1320788', 'NURA LUTFIANA', '', '', 'Perempuan', 'Kab Semarang', '1988-02-17', '36 Th 3 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'POLIKLINIK', '2014-05-07', '2014-05-07', '17 Th ', '', 'Tempel Rt 006 Rw 004 Jatisari mijen Semarang', '', '', '', '', 'TETAP', '1320788', '8a5b9895cec62b6475697ea49d016ebb', 'woman.png', 0),
(5601, '1350789', 'WENNY PARAMITA MAHMUD', '', '', 'Perempuan', 'Gresik', '1988-11-29', '35 Th 6 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'DEWI KUNTHI', '2016-05-07', '2016-05-07', '17 Th ', '', 'P. Pondok Raden Patah Thp II Blok H.9 Rt. 05 / 06 Sayung Dmk', '', '', '', '', 'TETAP', '1350789', '3024bb91689890a900a51e28c0d3172d', 'woman.png', 0),
(5602, '1370785', 'BENY MACHFURI', '', '', 'Laki-laki', 'semarang', '1985-03-05', '39 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '0000-00-00', '0000-00-00', '17 Th ', '', 'Jl. Purwoyoso V B Rt. 004 / 12 Kel. Purwoyoso Smg', '', '', '', '', 'TETAP', '1370785', '3ca5c2e513042640b1d135e95683ade6', 'man.png', 0),
(5603, '1380774', 'TAUFIK ARIFIANTO', '', '', 'Laki-laki', 'Purwokerto', '1974-05-24', '50 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2007-09-06', '2007-09-06', '17 Th ', '', 'Gg Cempaka I No. 13 Rt. 01 / XIII Purwodadi Grob', '', '', '', '', 'TETAP', '1380774', '68babce64ab9bca892fcbbf3027ba4b3', 'man.png', 0),
(5604, '1400784', 'TEGUH IMAN LAKSONO', '', '', 'Laki-laki', 'Semarang', '1969-03-28', '55 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '0000-00-00', '0000-00-00', '17 Th ', '', 'Jangli Krajan Rt. 007 / 003 Jatingaleh Candisari Smg', '', '', '', '', 'TETAP', '1400784', 'c0e274553ff217cbc9b2532b0be8e4ac', 'man.png', 0),
(5605, '1480779', 'ENTRY KURNIA WIDYASTUTI', '', '', 'Perempuan', 'Yogyakarta', '1979-09-15', '44 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA OPERATOR', 'INFORMASI', '0000-00-00', '0000-00-00', '17 Th ', '', 'Jl. Berdikari Raya I / 7 Rt. 05 / 07 Srondol Kulon Banyumanik Smg', '', '', '', '', 'TETAP', '1480779', '9e432135ae20d9072fcf4e1d648b97e6', 'woman.png', 0),
(5606, '1540768', 'SUPRASETYO', '', '', 'Laki-laki', 'Semarang', '1968-07-18', '55 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI', 'FARMASI', '0000-00-00', '0000-00-00', '17 Th ', '', 'Jl. Jatisari III Rt. 02 / 04 Jatingaleh Candisari Semarang', '', '', '', '', 'TETAP', '1540768', '080a207376bece1a2d723e14b6ef6548', 'man.png', 0),
(5607, '1660787', 'HINDRI SAYUTI', '', '', 'Perempuan', 'Wonogiri', '1987-03-27', '37 Th 2 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'IBS', '2007-08-08', '2007-08-08', '17 Th ', '', 'Kebondalem Rt. 01 / 03 Brangsong Kendal 51371', '', '', '', '', 'TETAP', '1660787', 'b4ce90a36dcd607a9fdbdfce3dd7cfed', 'woman.png', 0),
(5608, '1750881', 'HERI SUSANTO', '3374021306810003', '', 'Laki-laki', 'Kudus', '1981-06-13', '43 tahun 1 ', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2016-02-08', '2016-02-08', '16 Th ', 'DI', 'Jl taman delta mas nomer 41 Semarang Utara ', '', '', '085100286840', 'Kawin', 'TETAP', '1750881', '3d88709582aadeb496bf2b266f9b53d1', 'man.png', 0),
(5609, '1780873', 'SUDARSONO', '', '', 'Laki-laki', 'Grobogan', '1973-12-10', '50 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA DRIVER', 'DRIVER', '2016-02-08', '2016-02-08', '16 Th ', '', 'Rejosari Rt. 02 / 01 Tampingan Boja', '', '', '', '', 'TETAP', '1780873', 'a5952acb441aead13ce2b95985779443', 'man.png', 0),
(5610, '1790885', 'TRI WAHYUDI', '', '', 'Laki-laki', 'Kendal', '1985-12-26', '38 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI INVENTARIS MEDIS', 'BAGIAN UMUM', '2016-02-09', '2016-02-09', '16 Th ', '', 'Purwogondo Rt. 02/ 06 Boja Kendal', '', '', '', '', 'TETAP', '1790885', 'bf9435fe06b576da5b59af4cbc734e92', 'man.png', 3),
(5611, '1830884', 'HERKI DAMAYANTI', '', '', 'Perempuan', 'Tegal', '1984-01-25', '40 Th 4 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'HEMODIALISA', '2016-02-10', '2016-02-10', '16 Th ', '', 'Kedungpani Rt. 01 / 02 Mijen Semarang 50211', '', '', '', '', 'TETAP', '1830884', 'e168c08b6e8baf76b57f800b3449e3fc', 'woman.png', 0),
(5612, '1840886', 'ITA YULIANTI', '', '', 'Perempuan', 'Maros', '1986-07-24', '37 Th 10 bl', NULL, NULL, NULL, 'KEPALA RUANG', 'ICU', '2016-02-11', '2016-02-11', '16 Th ', '', 'Jl. Bukit Beringin Selatan F-27 B Rt.013 Rw.010 Gondoriyo Ngaliyan Smg', '', '', '', '', 'TETAP', '1840886', '1d3f1b5b2299ae6edefd7af853f34ade', 'woman.png', 0),
(5613, '1910882', 'UMI CHOYUMAH', '', '', 'Perempuan', 'Pati', '1982-07-25', '41 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2008-02-01', '2008-02-01', '16 Th ', '', 'Desa Dukuh Rt. 03 / 02 Kec. Tugu Semarang', '', '', '', '', 'TETAP', '1910882', '89f18f0e9ab9602a422222d640ca5066', 'woman.png', 0),
(5614, '1930885', 'HARRI KARTIKA CANDRA', '', '', 'Laki-laki', 'semarang', '1985-04-21', '39 Th 1 bln', NULL, NULL, NULL, 'ADMIN KEPERAWATAN', 'KEPERAWATAN', '2008-03-01', '2008-03-01', '16 Th ', '', 'Jl. Wahyu Asri Selatan II No. 1 Rt. 09 / 06 Tambakaji  Smg', '', '', '', '', 'TETAP', '1930885', '82e54d063e48d1eb5824e1a4c606dd12', 'man.png', 0),
(5615, '1940883', 'PUJI RAHAYU', '', '', 'Perempuan', 'Kendal', '1983-12-05', '40 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2016-06-09', '2016-06-09', '16 Th ', '', 'Jl. Menur Rt. 05 / III KarangAyu Cepiring Kendal', '', '', '', '', 'TETAP', '1940883', '78b25890fda5d98574638a5ab006485a', 'woman.png', 0),
(5616, '1960882', 'INDRIA SULISTYANTO', '', '', 'Laki-laki', 'semarang', '1982-06-17', '41 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2008-02-01', '2008-02-01', '16 Th ', '', 'Jl. Plumbon II Rt. 03 / III Kel. Wonosari Ngaliyan Semarang', '', '', '', '', 'TETAP', '1960882', '5e1710848a3fd4a39675d309249a3299', '668e394695d50_1650321358112.jpg', 0),
(5617, '1990874', 'DR. MAGY JULIA RACHMAWATI, Sp.PD', '', '', 'Perempuan', 'Semarang', '1975-12-07', '48 Th 6 bln', NULL, NULL, NULL, 'KA.INSTALASI HEMODIALISA', 'MEDIS', '2008-02-20', '2008-02-20', '16 Th ', '', 'Bukit Barisan Blok A4 No.2 Permata Puri Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '1990874', '48b267ad5d0a92d8bb5560996c07d73a', 'woman.png', 0),
(5618, '2020883', 'SIWI HANDAYANI', '', '', 'Perempuan', 'Semarang', '1983-09-02', '40 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2016-03-08', '2016-03-08', '16 Th ', '', 'Jl. Sentiaki Tengah II No.8 Rt.006 Rw.007 Bulu Lor Smg Utara', '', '', '', '', 'TETAP', '2020883', '7b184cf0df03fe7d48dd5fb793fa5d92', 'woman.png', 0),
(5619, '2030882', 'WAHYUNI', '3324125509820001', '', 'Perempuan', 'Kendal', '1982-09-15', '41', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2018-03-08', '2018-03-08', '16 Th ', 'DIII', 'Ds. Penaruban Rt. 01 / 05 Weleri Kendal', '', '', '085640060152', 'Kawin', 'TETAP', '2030882', '5474c1d46a6226817994c4679a5e334e', 'woman.png', 0),
(5620, '2090887', 'VERA LUTHFI DAMAYANTI', '', '', 'Perempuan', 'Semarang', '1987-05-12', '37 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '0000-00-00', '0000-00-00', '16 Th ', '', 'Jl. Karonsih Selatan X / 859 Rt. 007 / 006 Ngaliyan Smg', '', '', '', '', 'TETAP', '2090887', '6a410e113907b3f1950e0707943f9956', 'woman.png', 0),
(5621, '2120869', 'TEGUH IMAM SANTOSO', '', '', 'Laki-laki', 'Semarang', '1969-03-28', '55 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA GARDENER', 'GARDENER', '0000-00-00', '0000-00-00', '16 Th ', '', 'Jangli Krajan Rt. 007 / 003 Jatingaleh Candisari Smg', '', '', '', '', 'TETAP', '2120869', 'bb77fde7627f8ab7f2b088eb681843b4', 'man.png', 0),
(5622, '2160882', 'DWI SAPARTIWI', '', '', 'Perempuan', 'Pati', '1982-12-09', '41 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2015-07-08', '2015-07-08', '16 Th ', '', 'Perum Ketileng Indah Blok M 174 Rt. 08/ 13 Sendang Mulyo Tembalang Smg', '', '', '', '', 'TETAP', '2160882', '998b9d5ef40383357f2527ce0da5a732', 'woman.png', 0),
(5623, '2220862', 'SRI HENDRANINGSIH', '', '', 'Perempuan', 'Semarang', '1962-05-05', '62 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '2008-07-01', '2008-07-01', '16 Th ', '', 'Bukit Beringin Asri Raya Rt. 003 / 005 Gondoriyo Ngaliyan Smg', '', '', '', '', 'TETAP', '2220862', 'b19f341c861066770600532f18b65eed', 'woman.png', 0),
(5624, '2270884', 'SITI ZUBAIDAH', '', '', 'Perempuan', 'Smg', '1984-07-20', '39 Th 10 bl', NULL, NULL, NULL, 'KEPALA RUANG', 'DEWI KUNTHI', '2008-03-01', '2008-03-01', '16 Th ', '', 'Petengan Utara No. 22 Rt. 04/08 Bintoro Demak', '', '', '', '', 'TETAP', '2270884', '11fe5cc5996b35037073dc3f49de48be', 'woman.png', 0),
(5625, '2310884', 'YULI AGUSTINA', '', '', 'Perempuan', 'Semarang', '1984-08-17', '39 Th 9 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '0000-00-00', '0000-00-00', '16 Th ', '', 'Jl. Kaligawe Kp. Tbk Mulyo Rt. 04 Rw. XV No. 11 T. Mas Smg', '', '', '', '', 'TETAP', '2310884', 'c214784e370968e87ac27a4ae255c25c', 'woman.png', 0),
(5626, '2350881', 'WAHYU GRIYANINGSIH', '', '', 'Perempuan', 'Blora', '1981-11-21', '42 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2018-10-08', '2018-10-08', '16 Th ', '', 'Jl. Gunung Lawu II / 62 A Tegalgunung Blora', '', '', '', '', 'TETAP', '2350881', '8fbfc94417a876eb9de66310950db134', 'woman.png', 0),
(5627, '2420889', 'NUR IRIYANTI', '', '', 'Perempuan', 'Grobogan', '1989-12-25', '34 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '2015-01-09', '2015-01-09', '16 Th ', '', 'Dsn Kr.asem Rt. 05/3 Kr.anyar Purwodadi - Grobogan', '', '', '', '', 'TETAP', '2420889', '5099ec4c9cfc1ceec6ac45957b840fec', 'woman.png', 0),
(5628, '2600982', 'LILIS SETYAWATI', '', '', 'Perempuan', 'Magelang', '1982-09-13', '41 Th 8 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'RADIOLOGI', '0000-00-00', '0000-00-00', '15 Th ', '', 'Paten Jurang Rt. 04 / 16 Magelang', '', '', '', '', 'TETAP', '2600982', '3825d88b6a70cbc22405b46aa1c5d1e9', 'woman.png', 0),
(5629, '2650986', 'DEBORA SARASWATI PUJIHASTUTI, S.KM', '', '', 'Perempuan', 'semarang', '1986-02-04', '38 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '0000-00-00', '0000-00-00', '15 Th ', '', 'Ds. Jangkrikan Rt. 02 / 01 Rogomulyo Semarang', '', '', '', '', 'TETAP', '2650986', '6e8f0715546305f8ac25fc0dbf7534e3', 'woman.png', 0),
(5630, '2830981', 'SUNARTO', '', '', 'Laki-laki', 'Kendal', '1981-07-28', '42 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'HEMODIALISA', '2016-07-09', '2016-07-09', '15 Th ', '', 'Tratemulyo Rt. 04 / 03 Weleri Kendal', '', '', '', '', 'TETAP', '2830981', 'fb18112d06794ecbdc24f7db818c716c', '668e0cd65aaba_MAs NArto 46 (1).jpg', 0),
(5631, '2860982', 'KASMURI', '', '', 'Laki-laki', 'Blora', '1982-11-05', '41 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA KOKI', 'GIZI', '0000-00-00', '0000-00-00', '15 Th ', '', 'Jl. Talang Barat II Rt. 03 / 04', '', '', '', '', 'TETAP', '2860982', 'f62f90077f47ec37618f1efcf3c7e798', 'man.png', 0),
(5632, '2900967', 'WAGIMIN', '', '', 'Laki-laki', 'Boyolali', '1967-02-16', '57 Th 3 bln', NULL, NULL, NULL, 'KOORDINATOR KOKI', 'GIZI', '2015-10-09', '2015-10-09', '15 Th ', '', 'Klimas Rt. 02 / 05 Sendang Karanggede Boyolali', '', '', '', '', 'TETAP', '2900967', '06f5ee437573a189c855f467865adade', 'man.png', 0),
(5633, '3030977', 'UPIT MURWANINGRUM', '', '', 'Perempuan', 'Semarang', '1977-10-24', '46 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2009-11-01', '2009-11-01', '15 Th ', '', 'Jl. Srikaton Timur Rt. 5/5 Purwoyoso Ngaliyan Semarang', '', '', '', '', 'TETAP', '3030977', '8b29592b1056bc153ab466ed8547de89', 'woman.png', 0),
(5634, '3050980', 'CITRA PUSPA SARI DEWI', '', '', 'Perempuan', 'Pekalongan', '1980-11-24', '43 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'HEMODIALISA', '2015-12-09', '2015-12-09', '15 Th ', '', 'Jl. Mahesa Timur I No. 460 Pedurungan Tengah Smg', '', '', '08980022735', 'Belum Kawin', 'TETAP', '3050980', '5f5fab390744814ef47a04c36565c9e4', 'woman.png', 0),
(5635, '3081077', 'JUMADI', '', '', 'Laki-laki', 'Sragen', '1977-09-23', '46 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2010-01-01', '2010-01-01', '14 Th ', '', 'Jl. Puncak Sari Rt. 08 / 13 Tambak Aji Ngaliyan Smg', '', '', '', '', 'TETAP', '3081077', '383e539d1fb41c252a1b97e3472ec8dc', 'man.png', 0),
(5636, '3101089', 'EKA HENDRATMAKA', '', '', 'Laki-laki', 'Boyolali', '1989-07-03', '34 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '0000-00-00', '0000-00-00', '14 Th ', '', 'Bukit Beringin Lestari B.259, Rt. 05 / 16 Wonosari Ngaliyan Smg', '', '', '', '', 'TETAP', '3101089', 'afc84da6926e75ade079069a2cb00d74', 'man.png', 0),
(5637, '3111074', 'TRIMO MARTONO', '', '', 'Laki-laki', 'Semarang', '1974-09-14', '49 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2010-02-01', '2010-02-01', '14 Th ', '', 'Jl. Papandayan No. 6 Kel. Bendan Ngisor Kec. Gajah Mungkur Smg', '', '', '', '', 'TETAP', '3111074', 'af2d93f6fc583adf4e0dde2ccf77ff7c', 'man.png', 0),
(5638, '3131083', 'BUDI SUSANTI,A.MD', '', '', 'Perempuan', 'Kendal', '1983-06-15', '40 Th 11 bl', NULL, NULL, NULL, 'SEKRETARIS', 'SEKRETARIAT', '2010-03-10', '2010-03-10', '14 Th ', '', 'Bukit Beringin ASRI Blok D - 41 Ngaliyan Smg', '', '', '', '', 'TETAP', '3131083', 'aee1be8c0d7e728fefce0b2b0fe21d8c', 'woman.png', 0),
(5639, '3141066', 'JASMANI', '', '', 'Laki-laki', 'semarang', '1966-10-22', '57 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2017-03-10', '2017-03-10', '14 Th ', '', 'Jl. Papandayan Rt. 03 /  08 Gajah Mungkur', '', '', '', '', 'TETAP', '3141066', 'b0cd563126016a6973367fde376d358b', 'man.png', 0),
(5640, '3161083', 'SITI ROKHMAWATI', '123', '', 'Perempuan', 'Demak', '1983-09-02', '40 Th 9 bln', NULL, NULL, NULL, 'KOORDINATOR', 'KASIR', '2017-03-10', '2017-03-10', '14 Th ', 'DIII', 'Pucanggede timur 7 No. 10 Pucanggading Demak', '', '', '', 'Belum Kawin', 'TETAP', '3161083', '5c1da209c37840432dde17dd246371a6', 'woman.png', 0),
(5641, '3181087', 'CAHYONINGRUM', '', '', 'Perempuan', 'semarang', '1987-09-19', '36 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2010-03-01', '2010-03-01', '14 Th ', '', 'Ds. Kuripan Rt. 01 Rw. 01 Kel. Wonopolo Kec. Mijen Smg 50215', '', '', '', '', 'TETAP', '3181087', '09ffc56ed27550a769f4de3836b4e881', '668e04a400878_Foto.pdf', 0),
(5642, '3241090', 'KURNIAWAN ZUHRI', '', '', 'Laki-laki', 'Semarang', '1990-02-22', '34 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA PENYAJI', 'GIZI', '2010-04-01', '2010-04-01', '14 Th ', '', 'Jl. Jatibarang Rt.01/01 Kedungpane Mijen Smg', '', '', '', '', 'TETAP', '3241090', '1f34aa30a4a4836ad9e6eeb7e29222a8', 'man.png', 0),
(5643, '3321078', 'MINTARNO', '', '', 'Laki-laki', 'Semarang', '1978-06-04', '46 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2022-04-01', '2022-04-01', '14 Th ', '', 'Jl. Wologito Barat XIII Rt.03/05 Kembangarum Smg', '', '', '', '', 'TETAP', '3321078', '90d801f8e88ea8173f7c4c747d55e21e', 'man.png', 0),
(5644, '3401082', 'SYAIFUL MUHAJIRIN', '3374150907820004', '', 'Laki-laki', 'Semarang', '1982-07-09', '42 tahun 0 ', NULL, NULL, NULL, 'PELAKSANA STERILISATOR', 'CSSU', '2010-04-01', '2010-04-01', '14 Th ', 'SMA', 'Wonolopo RT.01 RW. 08 kec.Mijen kota semarang', 'Wonolopo RT. 01 RW. 08 kec.mijen kota semarang', '', '08985733844', 'Kawin', 'TETAP', '3401082', '55af8de4d61a5d7246e7b0031b299999', 'man.png', 0),
(5645, '3411083', 'TRI WIJIANTO', '', '', 'Laki-laki', 'Semarang', '1983-02-20', '41 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2010-04-01', '2010-04-01', '14 Th ', '', 'Jl. Pengilon V Rt.05/02 Bringin Ngaliyan', '', '', '', '', 'TETAP', '3411083', 'e2f104f35eba9eb7b7d50873601cdc7f', 'man.png', 0),
(5646, '3491088', 'S.UMI NURUL KHADLONAH', '', '', 'Perempuan', 'Kendal', '1988-09-12', '35 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2017-05-10', '2017-05-10', '14 Th ', '', 'Kaligetas RT. 01 RW. 04 Purwosari Mijen Smg', '', '', '', '', 'TETAP', '3491088', 'a49213e7077d46d6a188a3ab3a7c9ec3', 'woman.png', 0),
(5647, '3521072', 'RINI HASTUTI', '', '', 'Perempuan', 'Semarang', '1972-08-09', '51 Th 10 bl', NULL, NULL, NULL, 'KOORDINATOR PIUTANG', 'KASIR', '2010-06-01', '2010-06-01', '14 Th ', '', 'Jl. Tmn Candi Tembaga No. 944 Smg', '', '', '', '', 'TETAP', '3521072', '37719927b4ae5f386bc361b46fa4de16', 'woman.png', 0),
(5648, '3571085', 'ISTIQOMAH', '', '', 'Perempuan', 'semarang', '1985-09-25', '38 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2019-06-10', '2019-06-10', '14 Th ', '', 'Jl. Candisari Tengah II Rt. 02 / IV  Bambankerep Ngaliyan', '', '', '', '', 'TETAP', '3571085', 'd33662612614256dce6828347d0fbd41', 'woman.png', 0),
(5649, '3661082', 'SRI SUPARTINI', '', '', 'Perempuan', 'Kendal', '1982-03-06', '42 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2019-06-10', '2019-06-10', '14 Th ', '', 'Ds. Trompo Rt. 11/03 Kendal 51317', '', '', '', '', 'TETAP', '3661082', '4e5cbecd161ef601c4478665ab4bd029', 'woman.png', 0),
(5650, '3941089', 'SUBIYANTO', '0', '', 'Laki-laki', 'Semarang', '1987-09-07', '36', NULL, NULL, NULL, 'KOORDINATOR TEHNISI', 'IPSRS', '2019-02-11', '2019-02-11', '14 Th ', '', 'Jl. Anyar Duwet Bringin Rt. 03 / Rw. 04 Bringin Ngaliyan Smg', '', '', '', '', 'TETAP', '3941089', '1e8b07d54c2af4c58be524f570e0f1f7', 'man.png', 0),
(5651, '4021183', 'IDAYATU SOLIKIYAH', '', '', 'Perempuan', 'Pati', '1983-10-10', '40 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA CUSTOMER SERVICE', 'HUMAS', '2016-02-11', '2016-02-11', '13 Th ', '', 'Persilan Rt. 01 / 01 Ngaliyan Smg', '', '', '', '', 'TETAP', '4021183', 'ed01c71ee5886a807762bc2387651aee', 'woman.png', 0),
(5652, '4161177', 'NURDJANAH', '', '', 'Perempuan', 'Klaten', '1977-12-08', '46 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2014-03-01', '2014-03-01', '13 Th ', '', 'Jl. Irigasi Krajan I Rt. 02 / Rw. 03 Mangkang Kulon Tugu Smg', '', '', '', '', 'TETAP', '4161177', '3b3689b8ad0a15c57897cc612accc763', 'woman.png', 0),
(5653, '4181182', 'YULI ARINI', '', '', 'Perempuan', 'Wonogiri', '1982-07-26', '41 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'REKAM MEDIS', '2018-03-11', '2018-03-11', '13 Th ', '', 'Jl. Wismasari No. 5B Ngaliyan Smg', '', '', '', '', 'TETAP', '4181182', '2ff11df11309a9428271c1352b23a0c9', 'woman.png', 0),
(5654, '4201183', 'EDY PURWANTO', '', '', 'Laki-laki', 'semarang', '1983-02-06', '41 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', '2011-04-01', '2011-04-01', '13 Th ', '', 'Kalialang Lama Rt. 03 Rw. 01 Sukorejo Gunung Pati Smg', '', '', '', '', 'TETAP', '4201183', '67ed7f42361223cc57e6a4ce5ec52921', 'man.png', 0),
(5655, '4211187', 'DENI HANDAYANI', '', '', 'Perempuan', 'Boyolali', '1987-08-09', '36 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2011-04-01', '2011-04-01', '13 Th ', '', 'Jl. Borobudur Timur 10 Rt. 05 Rw. IX Kembang Arum Smg', '', '', '', '', 'TETAP', '4211187', 'f5869fdad72c955ba2ac6fe697443dbb', 'woman.png', 0),
(5656, '4241181', 'SUTRISNO', '', '', 'Laki-laki', 'Semarang', '1981-04-18', '43 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2016-06-13', '2016-06-13', '13 Th ', '', 'Jl. Plumbon II Rt. 05 / III Kel. Wonosari Ngaliyan Semarang', '', '', '', '', 'TETAP', '4241181', '274656c16d80b667642b72751d0d8ef0', 'man.png', 0),
(5657, '4251187', 'BAYU WIDHIASMARA', '', '', 'Laki-laki', 'semarang', '1987-08-12', '36 Th 9 bln', NULL, NULL, NULL, 'KOORDINATOR MARKETING', 'HUMAS', '2011-04-01', '2011-04-01', '13 Th ', '', 'Jl. Mandasia I/309 Perumnas Krapyak Smg', '', '', '', '', 'TETAP', '4251187', '489ccce7e5eca80381639ee4b4fde09f', 'man.png', 0),
(5658, '4261185', 'TRI SUSILO', '', '', 'Laki-laki', 'Klaten', '1985-01-23', '39 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', '2011-04-01', '2011-04-01', '13 Th ', '', 'Perumahan Sinar Waluyo Raya No. 118 Rt.02 / Rw. 01', '', '', '', '', 'TETAP', '4261185', 'b4d87f12f108be844700738f8e918113', 'man.png', 0),
(5659, '4331182', 'MEIRITA PRANAWATI', '', '', 'Perempuan', 'Kendal', '1982-05-01', '42 Th 1 bln', NULL, NULL, NULL, 'KA.KOMITE KEPERAWATAN DAN KEBIDANNA', 'KEPERAWATAN', '2011-06-01', '2011-06-01', '13 Th ', '', 'Perum Sarirejo Indah Blok A No. 19 Kaliwungu Kendal', '', '', '', '', 'TETAP', '4331182', 'fd22f45dfe1d79a8c6e116dc4e1c9870', 'woman.png', 0),
(5660, '4381189', 'ANIES FRANSISKA WIDHI I', '', '', 'Perempuan', 'Blora', '1989-07-01', '34 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2016-06-11', '2016-06-11', '13 Th ', '', 'Bukit Beringin Utara Blok D No. 152 Rt. 05/ Rw. XV Wonosari Ngaliyan', '', '', '', '', 'TETAP', '4381189', 'bd8167d6090d452afc8a84de6a487341', 'woman.png', 0),
(5661, '4391187', 'ARUM RATNA FATMAWATI', '', '', 'Perempuan', 'Kendal', '1987-10-04', '36 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2016-06-12', '2016-06-12', '13 Th ', '', 'Rejosari Rt. 005 / R2 003 Brangsong Kendal', '', '', '', '', 'TETAP', '4391187', 'cafb1b938c13a264429c5e54c6ea364f', 'woman.png', 0),
(5662, '4411186', 'HANA PRAMITA', '', '', 'Perempuan', 'Purwokerto', '1986-05-07', '38 Th 1 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2016-06-13', '2016-06-13', '13 Th ', '', 'Perumahan Taman Bringin 2 No.7 Tambakaji Ngaliyan Smg', '', '', '', '', 'TETAP', '4411186', '2d02fc3fb6dd9c393b8a0a0d925b2da9', 'woman.png', 0),
(5663, '4421188', 'DWI WINARSI', '', '', 'Perempuan', ' Semarang ', '1988-03-24', '36 Th 2 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2016-06-14', '2016-06-14', '13 Th ', '', 'Jl. Wr. Supartman Rt. 06/ Rw. XII Gisik Drono Semarang', '', '', '', '', 'TETAP', '4421188', '0803b75dc83659fcf8ed8849605c94bf', 'woman.png', 0),
(5664, '4431189', 'RIYAN MULIANI', '', '', 'Perempuan', 'Blora', '1989-07-28', '34 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2019-07-11', '2019-07-11', '13 Th ', '', 'Jl. Tawang Rejosari No. 57 Rt. 03/01 Smg', '', '', '', '', 'TETAP', '4431189', '5bcdc9d9548c8d64c120c5c8b0e93050', 'woman.png', 0),
(5665, '4441185', 'RIANA', '', '', 'Perempuan', 'Semarang', '1985-01-17', '39 Th 4 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2014-07-11', '2014-07-11', '13 Th ', '', 'Podorejo Rt. 01 / II Kec. Ngalian Semarang', '', '', '', '', 'TETAP', '4441185', '18c6a726036e6bf4a4ed75372ca58b95', 'woman.png', 0),
(5666, '4451173', 'BROTOJOYO MIRSODI', '', '', 'Laki-laki', 'Kendal', '1973-05-07', '51 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA DRIVER', 'DRIVER', '2020-07-11', '2020-07-11', '13 Th ', '', 'Dsn. Kaliman Rt. 03/ 05 Boja Kendal', '', '', '', '', 'TETAP', '4451173', '01603faaf4c522cb5f2dde18cb5b60bd', 'man.png', 0),
(5667, '4571189', 'NOFIANA', '', '', 'Perempuan', 'Kendal', '1989-11-05', '34 Th 7 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'RAMA SHINTA', '2011-11-11', '2011-11-11', '13 Th ', '', 'Jl. Kyai Mukhibin Rt. 03/02 Brongsong Kendal', '', '', '', '', 'TETAP', '4571189', '3cb4d9adb95b03c32a885da187349e83', 'woman.png', 0),
(5668, '4781277', 'FAHLEVI PUJI ASTUTI', '', '', 'Perempuan', 'semarang', '1977-03-07', '47 tahun 4 ', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2012-02-01', '2012-02-01', '12 Th ', 'SMA', 'Jl Margoyoso 2 RT 5 RW 4 tambak aji ngalian Semarang', '', '', '085727371706', 'Kawin', 'TETAP', '4781277', '1af79dbb216ae551d6ee7225679c0313', 'woman.png', 0),
(5669, '4791268', 'MUNJANAH', '', '', 'Perempuan', 'Kendal', '1968-08-22', '55 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2016-02-12', '2016-02-12', '12 Th ', '', 'Jatisari Rt. 03/02 mijen', '', '', '', '', 'TETAP', '4791268', '1992eb1d04342d9a004c489c79dc79c3', 'woman.png', 0),
(5670, '4811285', 'HERLIAN ERVIZ', '', '', 'Laki-laki', 'Jakarta', '1985-07-10', '38 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA KOKI', 'GIZI', '2016-02-12', '2016-02-12', '12 Th ', '', 'Jl. Gunung Jati Tengah No. 461 Rt. 07/02', '', '', '', '', 'TETAP', '4811285', '9f8555b5954ecf4a6509b975d2f311e8', 'man.png', 0),
(5671, '4881283', 'MAKMUN ATIQA', '', '', 'Perempuan', 'Demak', '1983-03-06', '41 Th 3 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2019-03-12', '2019-03-12', '12 Th ', '', 'Jamus Karang Sambung Rt. 09 Rw. 03 Kec. Mranggen', '', '', '', '', 'TETAP', '4881283', '62bba6f74726bf54ee16bd4c6d02980f', 'woman.png', 0),
(5672, '4961289', 'EVITA CAHYA RIANI', '', '', 'Perempuan', 'Demak', '1989-06-09', '35 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2012-03-01', '2012-03-01', '12 Th ', '', 'Ds. Megonten Rt. 03 Rw. 01 Kec. Kebonagung Kab. Demak', '', '', '', '', 'TETAP', '4961289', '5a4b0e5fbdea9b3dd49955ae0d95d3ce', 'woman.png', 0),
(5673, '4981289', 'AWANG REZA PRASETYA', '', '', 'Laki-laki', 'Grobogan', '1989-03-13', '35 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2018-05-21', '2018-05-21', '12 Th ', '', 'Dsn. Krajan Rt. 03 Rw. 01 Ds. Sumberagung Kec. Ngaringan Kab. Grobogan', '', '', '', '', 'TETAP', '4981289', 'd0b08106bd881ce6c2c5cec1baff00ee', 'man.png', 0),
(5674, '5001290', 'RATIH KUMALA DEVI', '', '', 'Perempuan', 'Semarang', '1990-02-24', '34 Th 3 bln', NULL, NULL, NULL, 'KOORDINATOR CASEMIX', 'REKAM MEDIS', '2012-03-01', '2012-03-01', '12 Th ', '', 'Jl. Margoyoso 1 No.12 Rt.04/04 Tambakaji Ngaliyan', '', '', '', '', 'TETAP', '5001290', '9c14e708a4976e5a3c0b22f4f907cb01', 'woman.png', 0),
(5675, '5031281', 'DWI DARYANTI', '', '', 'Perempuan', 'Semarang', '1981-11-26', '42 tahun 8 ', NULL, NULL, NULL, 'PELAKSANA PERAWAT GIGI', 'POLIKLINIK', '2012-04-01', '2012-04-01', '12 Th ', 'DIII', 'Gedongsongo Dalam No.19 RT 7 RW 1', '', '', '085105687030', 'Kawin', 'TETAP', '5031281', '98748595a43eb6bc666aaf259542e8d2', '66b58e513fa9f_dwi poli.jpg', 0),
(5676, '5051293', 'ASTARINA HARPHITA SETIAWAN', '', '', 'Perempuan', 'semarang', '1993-06-12', '30 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2012-05-12', '2012-05-12', '12 Th ', '', 'Jl. Wahyu asri Utara VIII AA 33 Rt.010 Rw.006 Ngaliyan Smg', '', '', '', '', 'TETAP', '5051293', '46212d7fa666a54fcd682f87d56f8d91', 'woman.png', 0),
(5677, '5131287', 'DESI ARIYANTI', '', '', 'Perempuan', 'semarang', '1987-12-27', '36 Th 5 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'ARIMBI', '2007-08-19', '2007-08-19', '17 Th ', '', 'Jl. Taman Gedongsongo Timur Rt.10 Rw.01 Manyaran Smg', '', '', '', '', 'TETAP', '5131287', 'e6332a465ae5d035008b95df210ec2f6', 'woman.png', 0),
(5678, '5261287', 'TRI DIAN HERLAMBANG SAKTI', '', '', 'Laki-laki', 'Pemalang', '1987-07-20', '36 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'HEMODIALISA', '2019-07-12', '2019-07-12', '12 Th ', '', 'Perum Brangsong Jl. Dieng I No. 21 Rt.01 Rw. 08 Sidorejo Kendal', '', '', '', '', 'TETAP', '5261287', '816945be294747f2ea34cc898d81d63c', 'man.png', 0),
(5679, '5291290', 'ULI ULIYA', '', '', 'Perempuan', 'Ungaran', '1990-07-13', '33 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2012-07-13', '2012-07-13', '12 Th ', '', 'Ds. Nongko Sawit Rt.02 Rw.01 Gunung Pati Smg', '', '', '', '', 'TETAP', '5291290', 'be9e43bcfc7d3998dfd8d4288c76b1e4', 'woman.png', 0),
(5680, '5301285', 'IS RIANIKA', '', '', 'Perempuan', 'Demak', '1985-08-04', '38 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2019-07-14', '2019-07-14', '12 Th ', '', 'Dolog Rt.03 Rw.04 Kembangarum Mranggen Demak 59567', '', '', '', '', 'TETAP', '5301285', '44a8871f204de7459df7dd68fefc1e87', 'woman.png', 0),
(5681, '5371288', 'ANISA EMANIAR', '', '', 'Perempuan', 'Kendal', '1988-01-04', '36 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2019-10-12', '2019-10-12', '12 Th ', '', 'Jl. Raya Timur No. 121/C KDL Rt.021 Rw. 005  Kebondalem Kendal', '', '', '', '', 'TETAP', '5371288', '4db4d82074b83122aebaa713d9bb7a6d', 'woman.png', 0),
(5682, '5381272', 'BENEDICTA ESTINING KUSUMAWARDHANI', '', '', 'Perempuan', 'Yogyakarta', '1972-10-09', '51 Th 8 bln', NULL, NULL, NULL, 'BAGIAN MOBILISASI DANA DAN PIUTANG', 'KEUANGAN', '2019-10-12', '2019-10-12', '12 Th ', '', 'Perum BPI Blok I/125 RT 08 / RW 10 Ngaliyan', '', '', '', '', 'TETAP', '5381272', 'edf8b20a1d38bde4ad279d18a793daaf', 'woman.png', 0),
(5683, '5401287', 'ROSITA DEVI KRISTIANA', '', '', 'Perempuan', 'Semarang', '1987-12-24', '36 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '0000-00-00', '0000-00-00', '12 Th ', '', 'Jl. Tugurejo Gang A9 Rt.009 Rw.001  Semarang', '', '', '', '', 'TETAP', '5401287', '05308f2cac54adbcf8bd6017243e2a01', 'woman.png', 0),
(5684, '5461282', 'FRISCA APRILIANINGTYAS EKA SAPUTRA', '', '', 'Perempuan', 'semarang', '1982-04-16', '42 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI', 'LABORATORIUM', '2016-12-12', '2016-12-12', '12 Th ', '', 'Jl. Bulu Magersari I/13 Pindrikan kidul Semarang', '', '', '', '', 'TETAP', '5461282', 'c4fe021aa1c4319a97c6586e77caa4ff', 'woman.png', 0),
(5685, '5501291', 'ULYATUSHOLIKHAH', '', '', 'Perempuan', 'Kendal', '1991-09-10', '32 Th 9 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'HEMODIALISA', '2016-01-13', '2016-01-13', '12 Th ', '', 'Ds. Cepiring Rt.003 Rw.004 Cepiring Kendal', '', '', '', '', 'TETAP', '5501291', 'b70051d9048caa7594e5782c37190d2c', '668e42c14286c_Ulyatusholikhah(2127035).jpeg', 0),
(5686, '5551288', 'SLAMET RIYADI', '', '', 'Laki-laki', 'Grobogan', '1988-04-26', '36 Th 1 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2013-01-01', '2013-01-01', '12 Th ', '', 'Ds. Pepe Rt. 002/001 Tegowanu Grobogan', '', '', '', '', 'TETAP', '5551288', '4b4e2bee252b875743d1f4c5408d4725', 'man.png', 0),
(5687, '5591388', 'AAN DWI KUNCORO AZIS S', '', '', 'Laki-laki', 'Ngawi', '1988-06-03', '36 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2010-12-17', '2010-12-17', '11 Th ', '', 'Ds. Gerih Rt/Rw. 009/003 Gerih Kab.Ngawi', '', '', '08980022735', '', 'TETAP', '5591388', '11484b3a13fb70169d0cf8575a9c5b06', '68ce05165e5dd_23919322_6837107.jpg', 0),
(5688, '5651390', 'RANI SEKAR ARUM', '', '', 'Perempuan', 'Semarang', '1990-09-18', '33 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA ASISTEN KOKI', 'GIZI', '2018-03-13', '2018-03-13', '11 Th ', '', 'Perum Roworejo Asri II No.2 Rt.03 Rw.07 Mijen Smg', '', '', '', '', 'TETAP', '5651390', '678b4c5b0442ad9676ff7fc661550ef1', 'woman.png', 0),
(5689, '5691392', 'DEWI KHOLIFAH', '', '', 'Perempuan', 'Kendal', '1992-07-28', '31 tahun 11', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2015-03-13', '2015-03-13', '11 Th ', 'DI', 'Gedangan Rt 04 Rw 06 Boja Kendal', '', '', '085640717661', 'Belum Kawin', 'TETAP', '5691392', '6ab0357358450ad998820809ff239bed', 'woman.png', 0),
(5690, '5711382', 'PUJI LESTARI', '', '', 'Perempuan', 'Kebumen', '1982-09-16', '41 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2017-03-13', '2017-03-13', '11 Th ', '', 'Bukit Jatisari Asri Blok A 4 / 6 Rt.008 Rw.006 Jatisari Mijen Semarang', '', '', '', '', 'TETAP', '5711382', 'abc260e6fa801efa708d7cdee82f3d87', 'woman.png', 0),
(5691, '5751391', 'DAIQ HITLERRIYANA', '', '', 'Perempuan', 'Kendal', '1991-10-30', '32 Th 7 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2013-04-01', '2013-04-01', '11 Th ', '', 'Dk Gladak Sari 2/12 Plantaran Kaliwungu Kendal', '', '', '', '', 'TETAP', '5751391', '20a444df49ed10c315a3c755e4307937', 'woman.png', 0),
(5692, '5851389', 'FERIS INTAN PARAMITA', '', '', 'Perempuan', 'Magelang', '1989-02-09', '35 Th 4 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'PERISTI', '2015-05-13', '2015-05-13', '11 Th ', '', 'Perum Pratama Green Residence Blok j-8 Rt/Rw.004/005 Kedung Pani Mijen', '', '', '', '', 'TETAP', '5851389', '3bc83a1e778b55adae6711409433bca0', '668e953cb3ca3_IMG-20201203-WA0006 e.jpg', 0),
(5693, '5981382', 'DIAN SUTRISNI', '', '', 'Perempuan', 'semarang', '1982-12-15', '41 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2013-07-20', '2013-07-20', '11 Th ', '', 'Jl. Karang Sawo Rt/Rw.005/002 Bongsari Smg Brt', '', '', '', '', 'TETAP', '5981382', '83fc5d2c30f36d5e1d78effe78d692dc', 'woman.png', 0),
(5694, '6021390', 'NUR HIDAYAH', '', '', 'Perempuan', 'Semarang', '1991-06-11', '32 Th 11 bl', NULL, NULL, NULL, 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUANGAN', 'KASIR', '2013-07-20', '2013-07-20', '11 Th ', '', 'Dk. Dawung Rt.001 Rw.003 Kedungpani Mijen', '', '', '', '', 'TETAP', '6021390', 'd7b829a8d8f9c9327caed55adaf02094', 'woman.png', 0),
(5695, '6031380', 'BEKTI SUHARTI', '', '', 'Perempuan', 'semarang', '1982-01-10', '42 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', '2013-07-20', '2013-07-20', '11 Th ', '', 'Jl. Karonsih selatan IX No.681 Ngaliyan Smg', '', '', '', '', 'TETAP', '6031380', 'b44880a03999951b975deb6a20d992a1', 'woman.png', 0),
(5696, '6221382', 'NANIK SULISTYAWATI', '', '', 'Perempuan', 'Semarang', '1982-10-05', '41 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2013-08-20', '2013-08-20', '11 Th ', '', 'Genuk Kel. Tambangan Rt.001 Rw.002 Tambangan Mijen  Smg', '', '', '', '', 'TETAP', '6221382', 'e86050d5a746558129fb45f962206be6', 'woman.png', 0),
(5697, '6241379', 'SULASTRI', '', '', 'Perempuan', 'Kendal', '1979-04-09', '45 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA PENYAJI', 'GIZI', '2013-08-20', '2013-08-20', '11 Th ', '', 'Jl. Bukit Beringin Timur VII Blok E/97 Rt.003 Rw.010 Gondoriyo Ngaliyan Smg', '', '', '', '', 'TETAP', '6241379', '7204193c98e60406b6be73f8849eb789', 'woman.png', 0),
(5698, '6311395', 'ADIP FIKRI', '', '', 'Laki-laki', 'Batang', '1995-07-02', '28 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'HUMAS', '2013-10-01', '2013-10-01', '11 Th ', '', 'Dk. Kedawung Rt.005 Rw. 001 Kedawung banyuputih Batang', '', '', '', '', 'TETAP', '6311395', '655db0a18df1c22e56c5fbf61eb5f2cb', 'man.png', 0),
(5699, '6361389', 'ANISFATUR RAHMAWATI', '', '', 'Perempuan', 'Grobogan', '1990-11-08', '33 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2013-10-01', '2013-10-01', '11 Th ', '', 'Pranten Rt.003 Rw.001 Pranten Gubug Grobogan', '', '', '', '', 'TETAP', '6361389', '24362bbd3d423fd3736467f72b6294cb', 'woman.png', 0),
(5700, '6381390', 'LINA YULIANI', '', '', 'Perempuan', 'Kendal', '1990-12-12', '33 Th 5 bln', NULL, NULL, NULL, 'KA. SIE. KEPERAWATAN DAN KEBIDANAN', 'KEPERAWATAN', '2013-11-01', '2013-11-01', '11 Th ', '', 'Wonorejo Rt.003 Rw.001 Wonotenggang Rowosari Kendal', '', '', '', '', 'TETAP', '6381390', '551d4a1fcfb2cb1dea824260ae456dd5', 'woman.png', 0),
(5701, '6411389', 'MUHAMAD MALIQ', '', '', 'Laki-laki', 'Semarang', '1990-09-11', '33 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2013-11-01', '2013-11-01', '11 Th ', '', 'Bangetayu Wetan Rt.003 rw.003 Genuk Smg', '', '', '', '', 'TETAP', '6411389', '20a1ff3c96230dd4dfa1184a7225dbee', 'man.png', 0);
INSERT INTO `pegawai` (`id`, `nopeg`, `nama`, `nik`, `agama`, `gender`, `tmpt_lahir`, `tgl_lahir`, `umur`, `jenis_pegawai`, `jenis_kesehatan`, `jenjang_karir`, `jabatan`, `unit`, `tmt`, `skpt`, `masa`, `ijazah`, `alamat`, `alamat2`, `email`, `telpon`, `status_kawin`, `status_pegawai`, `username`, `password`, `foto`, `admin`) VALUES
(5702, '6421391', 'NOVIANI ELZAWATI', '3374084301910003', '', 'Perempuan', 'Semarang', '1991-01-03', '33 tahun 6 ', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2013-11-01', '2013-11-01', '11 Th ', 'SI', 'Jl. Candi Tembaga Tengah 1/918 rt.08 rw.05 kel. Kalipancur kec. Ngaliyan, smg', '', '', '082225818354', 'Kawin', 'TETAP', '6421391', '8e3b4a85d0ed09e38df7bab0da27d8b9', '6698a8381ecf0_IMG-20220217-WA0004.jpg', 0),
(5703, '6431389', 'RAHMAT NANDA Z', '', '', 'Laki-laki', 'Kendal', '1990-06-11', '33 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA PERAWAT ANASTESI', 'IBS', '2013-12-01', '2013-12-01', '11 Th ', '', 'KP.Kandangan Timur Rt.002 Rw.007 Krajankulon Kaliwungu Kendal', '', '', '', '', 'TETAP', '6431389', 'eb2821c9d665c16eda956223e2a4893d', '668e220f32253_Rahmat Nanda Zuriardani A.Md.Kep.jpg', 0),
(5704, '6451386', 'NOVITA TRI WIDYANINGSIH', '', '', 'Perempuan', 'Semarang', '1986-11-24', '37 Th 6 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'IKB', '2010-01-01', '2010-01-01', '11 Th ', '', 'Jl. Plamongan Elok 1/540 Pedurungan Smg', '', '', '', '', 'TETAP', '6451386', '516c014d18e639264da451d9085b69aa', 'woman.png', 0),
(5705, '6461380', 'WIM PRAMUDIANTO', '', '', 'Laki-laki', 'Ambarawa', '1980-04-01', '44 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2014-02-01', '2014-02-01', '11 Th ', '', 'Kupang Lor Rt.003 Rw.003 Kupang Ambarawa', '', '', '', '', 'TETAP', '6461380', '427b84c28b3eca21ecae58de6b8d4b6b', 'man.png', 0),
(5706, '6541490', 'DETIKA WAHYU SETYANI', '', '', 'Perempuan', 'Kendal', '1991-10-12', '32 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2014-03-01', '2014-03-01', '10 Th ', '', 'Tabet Rt.003 Rw.001 Tabet Limbangan Kendal', '', '', '', '', 'TETAP', '6541490', 'fc3cb09d807ef6eebacb1cba07ddac40', 'woman.png', 0),
(5707, '6551492', 'OKTO PRIYASDHIKA ZAELANI', '', '', 'Laki-laki', 'Semarang', '1993-05-10', '31 Th 1 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2014-03-01', '2014-03-01', '10 Th ', '', 'Wologito Utara Rt.001 Rw.006 Kembangarum semarang Barat', '', '', '', '', 'TETAP', '6551492', '1f2a3fe33f2076573d588e05f36e9bcd', 'man.png', 0),
(5708, '6581491', 'DIWANGGA ADJI PRATITIS', '', '', 'Laki-laki', 'semarang', '1991-03-10', '33 Th 3 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'FISIOTERAPI', '2014-04-01', '2014-04-01', '10 Th ', '', 'Pandana Merdeka Blok R-18 Rt. 005 Rw.003 Bringin Ngaliayn', '', '', '', '', 'TETAP', '6581491', '36ab64bc3e7c9f247b737c6f50c512c5', 'man.png', 0),
(5709, '6671491', 'RANY OKTYVIANA', '', '', 'Perempuan', 'Semarang', '1993-07-10', '30 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2014-04-01', '2014-04-01', '10 Th ', '', 'Dk. Dawung Rt.003 Rw.003 Kedungpani Mijen Smg', '', '', '', '', 'TETAP', '6671491', '9828bf1424c76e75876229723c5e7cc7', 'woman.png', 0),
(5710, '6681492', 'SOFIA LADIBA', '', '', 'Perempuan', 'Semarang', '1992-05-11', '32 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2014-04-01', '2014-04-01', '10 Th ', '', 'Sanggrahan Rt.001 Rw.006 Banyubiru Dukun Magelang', '', '', '', '', 'TETAP', '6681492', '190f493a478a9a2c4f5afcef02bcb7d5', 'woman.png', 0),
(5711, '6721490', 'TITI NUGRAHAYU HARIASIH', '', '', 'Perempuan', 'Pati', '1990-01-02', '34 Th 5 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2014-04-01', '2014-04-01', '10 Th ', '', 'Jl. Tumpang I No. 106 Rt.003 Rw.009 Gajahmungkur Smg', '', '', '', '', 'TETAP', '6721490', '6843f2216d04b2a4f07febc694c1f97f', 'woman.png', 0),
(5712, '6731493', 'NUR WAHYU RACHMAWATI', '3374134912930007', '', 'Perempuan', 'Semarang', '1993-12-09', '30 tahun 7 ', '1', '2', NULL, 'PELAKSANA ASPER', 'IGD', '2016-01-01', '2016-01-01', '10 Th ', 'DI', 'Griya Bringin Asri Blok.G No.86', 'Griya Bringin Asri Blok.A No.20', '', '0895346117486', 'Kawin', 'TETAP', '6731493', '87e645f54b6c869adc456a24752f1eec', 'woman.png', 0),
(5713, '6741489', 'ANJAR KRISTIANTO', '', '', 'Laki-laki', 'Banyumas', '1990-04-12', '34 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA CUSTOMER SERVICE', 'HUMAS', '2014-04-01', '2014-04-01', '10 Th ', '', 'Kanding Rt.001 Rw.001 Somagede Banyumas', '', '', '', '', 'TETAP', '6741489', '04578be56a543470f30253f7d04a6041', 'man.png', 0),
(5714, '6791495', 'WIDYA SETYANINGSIH', '3374126310950002', '', 'Perempuan', 'Semarang', '1995-10-23', '28 tahun 8 ', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2015-01-01', '2015-01-01', '10 Th ', 'SMA', 'Sadeng rt04 rw02 gunungpati', 'Sadeng rt04 rw02 gunungpati', '', '089654672630', 'Kawin', 'TETAP', '6791495', 'fe4f7cab6102a31d65ba022daee95c69', '669794462e8bb_IMG-20240717-WA0012.jpg', 0),
(5715, '6801494', 'DENNY PRASETYO WIBOWO', '', '', 'Laki-laki', 'semarang', '1994-11-12', '29 Th 6 bln', NULL, NULL, NULL, 'KERJASAMA BISNIS', 'HUMAS', '2014-07-01', '2014-07-01', '10 Th ', '', 'Beringin Asri Rt.005 RW.011 Wonosari Ngaliyan Smg', '', '', '', '', 'TETAP', '6801494', '8f19cf8b3a92c6b0f45f06a9536c7b6c', 'man.png', 0),
(5716, '6831485', 'OKTARINA MUKTI UTAMI', '3374094210850003', '', 'Perempuan', 'Kendal', '1985-10-02', '38 tahun 9 ', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2016-11-01', '2016-11-01', '10 Th ', 'SMA', 'Perum. Grand Faiz Blok B4 ngabean, boja kendal', '', '', '085865599826', 'Kawin', 'TETAP', '6831485', '2a6a0623b2222c293b78e6f1ba70fbce', '668e0f6795e63_1643114972185.jpg', 0),
(5717, '6891492', 'ESTRI JAYANTI', '', '', 'Perempuan', 'Kendal', '1993-02-01', '31 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2014-07-01', '2014-07-01', '10 Th ', '', 'Tabet Rt.003 Rw.001 Tabet Limbangan Kendal', '', '', '', '', 'TETAP', '6891492', '21719df65747036bce4e57c17c7d3da9', 'woman.png', 0),
(5718, '6931491', 'DEWI MULAD SARI', '', '', 'Perempuan', 'Pati', '1992-08-09', '31 Th 10 bl', NULL, NULL, NULL, 'AHLI GIZI', 'GIZI', '2014-09-01', '2014-09-01', '10 Th ', '', 'Ds. Trimulyo Rt.002 Rw.004 Juwana Pati', '', '', '', '', 'TETAP', '6931491', 'cfe3bf4746347a392293bcf532b7ce83', 'woman.png', 0),
(5719, '7071585', 'TRI KARTIKANINGSIH', '', '', 'Perempuan', 'Blora', '1985-12-04', '38 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'PERISTI', '2015-03-01', '2015-03-01', '9 Th ', '', 'Jl. Candisari Rt.010 Rw.004 Bambankerep ngaliyan', '', '', '', '', 'TETAP', '7071585', '65fde4eb9959dc9615255a3b7ff674fe', 'woman.png', 0),
(5720, '7081593', 'APRILIA FINA SARI', '', '', 'Perempuan', 'Semarang', '1994-07-04', '29 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2015-03-01', '2015-03-01', '9 Th ', '', 'Perum Jatisari Asabri Blok B3/03 Rt.007 Rw.010 Jatisari Mijen Smg', '', '', '', '', 'TETAP', '7081593', '37ee52705ad1a706800ad2b196348159', 'woman.png', 0),
(5721, '7091593', 'CANDRA PUSPITA DEWI', '', '', 'Perempuan', 'semarang', '1994-03-07', '30 Th 3 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'POLIKLINIK', '2015-03-01', '2015-03-01', '9 Th ', '', 'Parang Klitik Raya No.15 Rt.002 Rw.019 Tlogosari Kulon Pedurungan Semarang', '', '', '', '', 'TETAP', '7091593', '78c1794e0068260fcbd825530790b564', 'woman.png', 0),
(5722, '7101583', 'DWI PUJI ASTUTIK', '', '', 'Perempuan', 'Demak', '1985-01-05', '39 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2015-03-01', '2015-03-01', '9 Th ', '', 'Perum Beringin Permai No.1 Rt.002 Rw.015 Bringin Ngaliyan Smg', '', '', '', '', 'TETAP', '7101583', 'f23b0f8582f946d04188bbb9b4ae7cd5', 'woman.png', 0),
(5723, '7121593', 'CHOYRIA SETYA ULAFA', '', '', 'Perempuan', 'Kendal', '1993-08-07', '30 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2015-03-01', '2015-03-01', '9 Th ', '', 'Ds. Bebengan Rt.006 Rw.005 Boja Kendal', '', '', '', '', 'TETAP', '7121593', '89b8d2e91b5e1d62c19e948623b59dbf', 'woman.png', 0),
(5724, '7151592', 'FERINTA DEWI', '', '', 'Perempuan', 'Temanggung', '1992-11-02', '31 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2015-03-01', '2015-03-01', '9 Th ', '', 'Dsn. Wunut Rt.007 Rw.001 WonoTirto Bulu Temanggung', '', '', '', '', 'TETAP', '7151592', '1db145bc24bedd0cde6664faf95af6ed', 'woman.png', 0),
(5725, '7161593', 'DEVI WULAN SARI', '', '', 'Perempuan', 'semarang', '1994-03-12', '30 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2015-03-01', '2015-03-01', '9 Th ', '', 'Kp. Kalipancur Rt.001 Rw.003 Bambankerep Ngaliyan Smg', '', '', '', '', 'TETAP', '7161593', 'e30ca7d2f7000030014d16b3492a1c02', 'woman.png', 0),
(5726, '7201579', 'DEWI NOVITASARI', '', '', 'Perempuan', 'Jepara', '1979-11-11', '44 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2015-03-01', '2015-03-01', '9 Th ', '', 'Jatisari Asabri D-7 No.12 B Rt.002 Rw.010 Jatisari Mijen Smg', '', '', '', '', 'TETAP', '7201579', '9d7ee27dd25731b06624c4061abf0025', 'woman.png', 0),
(5727, '7271590', 'AGUNG PRABOWO', '', '', 'Laki-laki', 'semarang', '1991-02-03', '33 Th 4 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'IGD', '2015-03-01', '2015-03-01', '9 Th ', '', 'Seruni V/20 Rt.004 Rw.010 Tlogosari Kulon Pedurungan Smg', '', '', '', '', 'TETAP', '7271590', '1a765542f6e80e59a36d2ea522d33f07', 'man.png', 0),
(5728, '7321591', 'ELA FADHILAH', '', '', 'Perempuan', 'Boyolali', '1991-11-10', '32 Th 7 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'DEWI KUNTHI', '2015-03-01', '2015-03-01', '9 Th ', '', 'Tambakaji Rt.013 Rw.012 Ngaliyan Smg', '', '', '', '', 'TETAP', '7321591', '4873de7d902d0a903ee5526b613f2599', 'woman.png', 0),
(5729, '7341591', 'LENA SOFIATUN KHASANAH', '', '', 'Perempuan', 'Semarang', '1992-02-07', '32 Th 4 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2015-04-01', '2015-04-01', '9 Th ', '', 'Jl. Wonosari Raya No.3 Rt.006 Rw.009 Wonosari Ngaliyan Smg', '', '', '', '', 'TETAP', '7341591', '9cc0719bb47b0798d2372a9d8dda4afc', 'woman.png', 0),
(5730, '7391581', 'DENI ASTRI FARIDA', '', '', 'Perempuan', 'semarang', '1981-12-09', '42 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2007-08-01', '2007-08-01', '9 Th ', '', 'Jl. Pemuda No. 56 Rt.002 Rw.007 Bintoro Demak', '', '', '', '', 'TETAP', '7391581', '784266e3e0963e8fbdd6ef50912d2a33', 'woman.png', 0),
(5731, '7441594', 'SOFYAN MAKRUF', '3324070204940004', '', 'Laki-laki', 'Kendal', '1994-04-02', '30 tahun 3 ', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2016-01-01', '2016-01-01', '9 Th ', 'SMA', 'Dsn. Mlandang RT.002 RW.006 Kaligading Boja Kendal', '', '', '083838376067', 'Kawin', 'TETAP', '7441594', '33ab62389dc2832fccadce4f74c278bc', 'man.png', 0),
(5732, '7481590', 'DR. LITA NOVIANI', '', '', 'Perempuan', 'Semarang', '1992-07-07', '31 Th 11 bl', NULL, NULL, NULL, 'KA.INST RAWAT INAP', 'PELAYANAN MEDIS', '2015-07-01', '2015-07-01', '9 Th ', '', 'Jl. Galungan II/66 Rt 002 Rw 006 Krapyak Semarang', '', '', '', '', 'TETAP', '7481590', 'e0ee7cfeca257ff2c93ec662c36c5c51', 'woman.png', 0),
(5733, '7511593', 'NUR ALIFAH', '', '', 'Perempuan', 'Semarang', '1993-08-03', '30 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2015-09-01', '2015-09-01', '9 Th ', '', 'Ds. Sriwulan Rt.004 Rw.001 Sayung Demak', '', '', '', '', 'TETAP', '7511593', '47ab9cdd5775d0589d35c2c6b0575be2', 'woman.png', 0),
(5734, '7561581', 'VERONIKA TYAS YANUARSIH', '', '', 'Perempuan', 'Semarang', '1982-05-01', '42 Th 1 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2015-10-01', '2015-10-01', '9 Th ', '', 'Asmil 412 BTC Rt.003 Rw.004 Sindurjan Purworejo', '', '', '', '', 'TETAP', '7561581', 'b665dde14d06c6ef36637f673e07fd4b', 'woman.png', 0),
(5735, '7641594', 'TRI ISMAWATI', '', '', 'Perempuan', 'Pemalang', '1994-12-12', '29 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2016-01-01', '2016-01-01', '9 Th ', '', 'Ds. Kalitorong Rt.003 Rw.001 Randudongkal Pemalang', '', '', '', '', 'TETAP', '7641594', '207765176142f678c93f67b6a09acfc8', 'woman.png', 0),
(5736, '7721584', 'ABDUL AZIS', '', 'Islam', 'Laki-laki', 'Semarang', '1984-04-03', '40', NULL, NULL, NULL, 'WAKIL KOORDINATOR', 'HOUSEKEEPING', '2015-12-01', '2015-12-01', '9 Th ', '', 'Jl. Gondosari Rt. 04/04 Ngaliyan Smg', '', '', '', '', 'KONTRAK', '7721584', '86491a5c01241800fcc3427612fdb8cf', 'man.png', 0),
(5737, '7731582', 'SODIKIN', '', '', 'Laki-laki', 'Kendal', '1982-07-12', '41 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA PORTIR', 'SECURITY', '2015-12-01', '2015-12-01', '9 Th ', '', 'Campurejo rt3/3 boja. Kendal', '', '', '', '', 'KONTRAK', '7731582', '97e88250e22e5d9fbf1afc28fa4f15cd', 'man.png', 0),
(5738, '7761585', 'PUJIATI', '', '', 'Perempuan', 'Semarang', '1985-09-09', '38 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2015-12-01', '2015-12-01', '9 Th ', '', 'Jl.Borobudur barat 3 RT 03/14 purwoyoso_ngaliyan', '', '', '', '', 'KONTRAK', '7761585', '640a2e697af1af4478e786cdda02b23c', 'woman.png', 0),
(5739, '7771582', 'RIYANTI', '', '', 'Perempuan', 'Semarang', '1984-07-10', '39 Th 11 bl', NULL, NULL, NULL, 'KOORDINATOR KEBERSIHAN DAN PERTAMANAN', 'BAGIAN UMUM', '2015-12-01', '2015-12-01', '9 Th ', '', 'Jl gedongsongo timur rt 10/01 manyaran', '', '', '', '', 'KONTRAK', '7771582', '0709d370683dbc8a833cb0abe4c2b7b5', 'woman.png', 0),
(5740, '7821593', 'ANDI GUNAWAN', '', '', 'Laki-laki', 'semarang', '1993-08-05', '30 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2015-12-01', '2015-12-01', '9 Th ', '', 'Tambangan Rt.003 Rw.001 Mijen', '', '', '', '', 'KONTRAK', '7821593', '14be358487b2a32770c9fd21d64ba6f1', 'man.png', 0),
(5741, '7831578', 'ABIDIN', '', '', 'Laki-laki', 'Kendal', '1978-06-10', '46 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2015-12-01', '2015-12-01', '9 Th ', '', 'Dempelrejo Rt.003 Rw.002 Ngampel Kendal', '', '', '', '', 'KONTRAK', '7831578', '12e60a75a6d5e776ae92d8a3365a5686', 'man.png', 0),
(5742, '7851597', 'DANU RAHMAN', '', '', 'Laki-laki', 'semarang', '1997-07-04', '26 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA PORTIR', 'SECURITY', '2015-12-01', '2015-12-01', '9 Th ', '', 'Karang Kimpul Rt 003 Rw 001 Tambakrejo Gayamsari Semarang', '', '', '', '', 'KONTRAK', '7851597', '470429096149355b8e34fb7b9809a254', 'man.png', 0),
(5743, '7861579', 'AENY', '', '', 'Perempuan', 'semarang', '1980-06-11', '43 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2015-12-01', '2015-12-01', '9 Th ', '', 'Kliwonan Rt.004 Rw.007 Tambakaji Ngaliyan Smg', '', '', '', '', 'TETAP', '7861579', '45294a31d99eec5d8f207cdc04e7d61e', 'woman.png', 0),
(5744, '7981580', 'SUPRIYANTO', '', '', 'Laki-laki', 'Boyolali', '1981-04-05', '43 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', '2015-12-15', '2015-12-15', '9 Th ', '', ' Ds. Sewuni Rt 008 Rw 002 Gempol Sewu Rowosari Kendal ', '', '', '', '', 'KONTRAK', '7981580', 'ca3b3369153b41d3bfcb2b1f1612c24b', 'man.png', 0),
(5745, '8041677', 'SUMADI', '', '', 'Laki-laki', 'Kendal', '1978-07-06', '45 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2016-01-18', '2016-01-18', '8 Th ', '', 'Kp. Kandangan Barat Rt.004 Rw.007 Krajan Kulon Kaliwungu Kendal', '', '', '', '', 'KONTRAK', '8041677', '584704ee55dc053d260303e1a2caa9c7', 'man.png', 0),
(5746, '8111698', 'DIAN PRATIWI', '', '', 'Perempuan', 'semarang', '1998-06-15', '26 tahun 1 ', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2016-03-01', '2016-03-01', '8 Th ', '', 'Karang Kimpul Rt.003 Rw.001 Tambakrejo Gayamsari Smg', '', '', '', 'Kawin', 'KONTRAK', '8111698', '470429096149355b8e34fb7b9809a254', 'woman.png', 0),
(5747, '8191684', 'VERA SETYARINI', '', '', 'Perempuan', 'Semarang', '1985-07-02', '38 Th 11 bl', NULL, NULL, NULL, 'KOORDINATOR ADMIN DAN LAUNDRY', 'BAGIAN UMUM', '2007-08-16', '2007-08-16', '8 Th ', '', 'Jl. Sriwibowo II/9 Rt.003 Rw.003 Purwoyoso  Ngaliyan Smg', '', '', '', '', 'TETAP', '8191684', 'b158274419d6e6dc4c1088cacfd49283', 'woman.png', 0),
(5748, '8201680', 'EKO SULISTIYONO', '', '', 'Laki-laki', 'Wonosobo', '1980-07-02', '43 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA OPERATOR', 'HUMAS', '2016-04-01', '2016-04-01', '8 Th ', '', 'Klilin Rt.006 Rw.003 Sindupaten Kertek Wonosobo', '', '', '', '', 'TETAP', '8201680', '4dd80e78280d0ab85b1a892ca35b0c6a', 'man.png', 0),
(5749, '8211687', 'DANAR SETIAWAN', '', '', 'Laki-laki', 'semarang', '1988-09-02', '35 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA PORTIR', 'SECURITY', '2016-04-01', '2016-04-01', '8 Th ', '', 'WONOPLUMBON RT03 RW01 KEC.MIJEN KOTA SEMARANG', '', '', '', '', 'KONTRAK', '8211687', '68ce41e5b9d981b2606484936fada0bf', 'man.png', 0),
(5750, '8301688', 'HUTI KARTINA', '', '', 'Perempuan', 'semarang', '1989-09-04', '34 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2016-04-16', '2016-04-16', '8 Th ', '', 'Dsn. Grenden RT 2/rw2 Campurejo, Boja, kabupaten kendal', '', '', '', '', 'KONTRAK', '8301688', 'f7e761cfc22f3fa7f6beaece929c5891', 'woman.png', 0),
(5751, '8381688', 'ROHMI HIDAYATI', '', '', 'Perempuan', 'Semarang', '1989-07-11', '34 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2016-06-01', '2016-06-01', '8 Th ', '', ' Jl. Dworowati V Rt 002 Rt 008 Krobokan Semarang Barat Semarang ', '', '', '', '', 'KONTRAK', '8381688', '157a6f739ae06b1fa7b55a930a64debf', 'woman.png', 0),
(5752, '8401687', 'MOHAMAD EKO RIYADI', '', '', 'Laki-laki', ' Semarang ', '1989-05-07', '35 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA CUSTOMER SERVICE', 'HUMAS', '2016-05-08', '2016-05-08', '8 Th ', '', 'Jl. Kaba Baru Rt.009 Rw.013 Tandang Tembalang Smg', '', '', '', '', 'TETAP', '8401687', '780ffcb60313c0359d7a9ab2fcf30851', 'man.png', 0),
(5753, '8501683', 'AENUL CHAKIM', '', '', 'Laki-laki', 'Kendal', '1984-11-04', '39 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA LAUNDRY', 'LAUNDRY', '2016-07-20', '2016-07-20', '8 Th ', '', 'Jl. Pengilon II Rt.003 Rw.002 Bringin Ngaliyan Smg', '', '', '', '', 'KONTRAK', '8501683', '3a770117f238d0855680a246483368fb', 'man.png', 0),
(5754, '8531684', 'PURWANTI', '', '', 'Perempuan', 'Semarang', '1985-01-11', '39 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2016-07-20', '2016-07-20', '8 Th ', '', 'Dusun Krajan rt 003 rw 002,Bebengan, Boja,Kendal', '', '', '', '', 'KONTRAK', '8531684', 'a7cd659b22928c0d2835c90c2b7e9b18', 'woman.png', 0),
(5755, '8541686', 'SITI MAGHFIROH', '', '', 'Perempuan', 'Semarang', '1987-10-04', '36 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2016-08-01', '2016-08-01', '8 Th ', '', 'Kalikangkung Rt.004 Rw.001 Gondoriyo Ngaliyan Smg', '', '', '', '', 'KONTRAK', '8541686', '9ae48637c7e9a56091e7bb180b754b8c', 'woman.png', 0),
(5756, '8591693', 'YURIESTA SUKMI P.', '', '', 'Perempuan', 'Semarang', '1993-01-07', '31 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2016-09-01', '2016-09-01', '8 Th ', '', 'Jl. Sentiaki Raya No.38 Rt.001 Rw.010 Bulu Lor Smg Utara', '', '', '', '', 'KONTRAK', '8591693', '7ed1a177b427507c24bea0588bc295c6', '668f38efabc70_IMG_20230707_072826_509.webp', 0),
(5757, '8641686', 'CANDRA PRASETIAWAN', '3324072104860004', '', 'Perempuan', 'Kendal', '1986-04-21', '38 tahun 2 ', '1', '2', NULL, 'PELAKSANA PERAWAT', 'HEMODIALISA', '2016-09-01', '2016-09-01', '8 Th ', '', 'Dsn Krajan RT 02 RW 02 desa puguh , kec boja , kab Kendal 51381', 'Dsn Krajan RT 02 RW 02 desa puguh , kec boja , kab Kendal 51381', '', '082325161286', 'Kawin', 'KONTRAK', '8641686', '0f5aaaf14d9a2d371853e46119abba27', '668e3b3440c8e_IMG-20220918-WA0010.jpg', 0),
(5758, '8661694', 'TRISHA WIDYA A.', '', '', 'Perempuan', 'Semarang', '1996-06-10', '28 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2016-09-01', '2016-09-01', '8 Th ', '', 'Jl. Sawah Besar VII Rt 006 Rw 004 Kaligawe Gayamsari Semarang', '', '', '', '', 'KONTRAK', '8661694', 'dd00562f5f0d6eda52eef979eff5ee00', 'woman.png', 0),
(5759, '8671694', 'ELYA RIFANI', '', '', 'Perempuan', 'Demak', '1996-03-02', '28 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2016-09-01', '2016-09-01', '8 Th ', '', 'Dusun Krajan RT 02 RW 02 puguh, boja', '', '', '', '', 'KONTRAK', '8671694', '588a0c5500fb1beaeb9b1f30a19e5efd', 'woman.png', 0),
(5760, '8681698', 'ARFIAN ASTRA YUDA', '', '', 'Laki-laki', 'Kendal', '1998-06-13', '26 tahun 1 ', NULL, NULL, NULL, 'WAKIL KOORDINATOR', 'HOUSEKEEPING', '2016-10-01', '2016-10-01', '8 Th ', '', 'Dsn. Jonjang Rt.002 Rw.006 Merbuh Singorojo Kendal', '', '', '081391456214', '', 'KONTRAK', '8681698', '7a8d631f620d5365f2ec54c5b639dd7a', 'man.png', 0),
(5761, '8841693', 'HANUM FIRDA PRABAWATI', '', '', 'Perempuan', 'Kendal', '1993-01-16', '31 tahun 6 ', NULL, NULL, NULL, 'KOORDINATOR', 'PENDAFTARAN', '2016-11-01', '2016-11-01', '8 Th ', '', 'Jl. Rejotaruno No. 33 Rt 003 Rw 003 Tamanrejo Limbangan Kendal', '', '', '085727258968', 'Kawin', 'KONTRAK', '8841693', '94ce169d17842b96c093047a993811cc', 'woman.png', 0),
(5762, '8851684', 'AGUS SURYA PRABOWO', '', '', 'Laki-laki', 'Pati', '1986-01-03', '38 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA PORTIR', 'SECURITY', '2016-11-01', '2016-11-01', '8 Th ', '', 'Tanjungsari Rt.002 Rw.002 Sumurbroto Banyumanik Smg', '', '', '', '', 'KONTRAK', '8851684', '4369e8843330823ac74eb6340144373f', 'man.png', 0),
(5763, '8861695', 'NARLINDA PUTRI WILANDARI', '3324055005950001', '', 'Perempuan', 'Kendal', '1995-05-10', '29 tahun 2 ', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2016-11-01', '2016-11-01', '8 Th ', 'DIII', 'Sukodadi RT 4 RW 4 Singorojo, Kendal', '', '', '0838 4271 8500 ', 'Kawin', 'KONTRAK', '8861695', 'dec349aae93850a49111f288634f9331', 'woman.png', 0),
(5764, '8881693', 'LUPIKA WULAN OVIANA', '', '', 'Perempuan', 'Kebumen', '1993-07-10', '30 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2016-11-01', '2016-11-01', '8 Th ', '', 'Dk panjer RT 003/002 kambangsari alian kebumen', '', '', '', '', 'KONTRAK', '8881693', 'd2c8bd021a1d3fe73f660db1a0653f66', 'woman.png', 0),
(5765, '8911692', 'ENDANG FAJAR NOVITA SARI', '', '', 'Perempuan', 'Grobogan', '1993-07-11', '30 Th 10 bl', NULL, NULL, NULL, 'SUB. BAG. MOBILISASI DANA', 'KEUANGAN', '2016-11-01', '2016-11-01', '8 Th ', '', 'JL BOROBUDUR RAYA III RT 07/ RW 011', '', '', '', '', 'KONTRAK', '8911692', '5068771fad27aee83a44640ca18044bd', 'woman.png', 0),
(5766, '8921695', 'ELSA INGGITA ANUGRAH S.', '12345', '', 'Perempuan', 'semarang', '1995-01-02', '29 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2016-11-01', '2016-11-01', '8 Th ', 'DIII', 'Jl. Jangli Tlawah Rt 004 Rw 005 Karanganyar Gunung Candisari Semarang', '', '', '', 'Belum Kawin', 'KONTRAK', '8921695', '17ef395d83f1d056b4a465eb25c4a5b9', 'woman.png', 0),
(5767, '8941691', 'BAYU SETYO WICAKSONO', '', '', 'Laki-laki', 'Kendal', '1991-09-05', '32 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA  STERILISATOR', 'CSSU', '2016-11-08', '2016-11-08', '8 Th ', '', 'Dsn. Krajan Timur Rt. 004 Rw.003 Meteseh Boja Kendal', '', '', '', '', 'KONTRAK', '8941691', 'f67fb9c81fb53e1283e54c291795031f', 'man.png', 0),
(5768, '8961697', 'MUHNI', '', '', 'Laki-laki', 'Wonosobo', '1998-02-03', '26 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', '2016-11-16', '2016-11-16', '8 Th ', '', 'bandungsari rt02 rw 04 tambangan', '', '', '', '', 'KONTRAK', '8961697', '8eb773a694f2d4127c51de633f4f1a34', 'man.png', 0),
(5769, '8981694', 'MEGA WULANDARI', '', '', 'Perempuan', 'Semarang', '1995-01-05', '29 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2016-12-01', '2016-12-01', '8 Th ', '', 'Jl. Kauman Barat III/22 Rt. 005 Rw. 008 Palebon Pedurungan Smg', '', '', '', '', 'KONTRAK', '8981694', '106d8394cc99169b9fc6551fa3749d01', '668e09b42ad4a_FOTOMEGA.pdf', 0),
(5770, '9061795', 'DWI YULIAN PURWADANI', '', '', 'Perempuan', 'semarang', '1997-07-07', '26 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', '2017-02-08', '2017-02-08', '7 Th ', '', 'Karanggeneng Rt.003 Rw.001 Sumurejo Gunungpati Semarang', '', '', '', '', 'KONTRAK', '9061795', '41b931ed9a9989967e02fd09fc4bb141', 'woman.png', 0),
(5771, '9131798', 'SUHARTINI', '', '', 'Perempuan', 'Semarang', '1976-05-11', '48 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2017-06-02', '2017-06-02', '7 Th ', '', 'Jl.srikaton timur III rt 5 rw 6', '', '', '', '', 'KONTRAK', '9131798', 'facfeda9a1d4903e8ead20eb31ccecf5', 'woman.png', 0),
(5772, '9141794', 'AGUS FATONI', '', '', 'Laki-laki', 'Kendal', '1995-06-03', '29 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA OB', 'OB', '2017-06-04', '2017-06-04', '7 Th ', '', ' Dsn. Kedungdowo Rt 001 Rw 004 Campurejo Boja Kendal ', '', '', '', '', 'KONTRAK', '9141794', 'a548dd43e382acc2a74e6ffae6ddf9a8', 'man.png', 0),
(5773, '9201791', 'DR. INDAH MUTIARA', '', '', 'Perempuan', 'Semarang', '1991-12-08', '32 Th 6 bln', NULL, NULL, NULL, 'DIREKTUR RSPM', 'DIREKSI', '2017-08-08', '2017-08-08', '7 Th ', '', 'jl. Jati Raya No. 770 Kelurahan Plamongan, Kecamatan Pedurungan, Semarang', '', '', '', '', 'KONTRAK', '9201791', 'adfc51489bad95a315fd485cf0d96408', 'woman.png', 0),
(5774, '9241781', 'PUJI RISTANTI', '', '', 'Perempuan', 'Pati', '1982-01-10', '42 Th 5 bln', NULL, NULL, NULL, 'KEPALA RUANG', 'IBS', '2017-09-17', '2017-09-17', '7 Th ', '', 'Jalan Bukit Limau 8 Blok FC No. 6 RT 9 RW 11', '', '', '', '', 'KONTRAK', '9241781', '08741f96c2059aa2036d43e48cee968c', 'woman.png', 0),
(5775, '9301786', 'ANIEK SUSENOWATI', '', '', 'Perempuan', 'Semarang', '1984-02-06', '40 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2017-09-11', '2017-09-11', '7 Th ', '', 'Bandungsari Rt.002 Rw.004 Tambangan Mijen', '', '', '', '', 'KONTRAK', '9301786', '7afb330dfec88ed3f5e525f39e6b03c2', 'woman.png', 0),
(5776, '9311780', 'ASEP AWALUDIN NOOR', '', '', 'Laki-laki', 'Kendal', '1980-03-07', '44 Th 3 bln', NULL, NULL, NULL, 'KOORDINATOR', 'DRIVER', '2017-10-01', '2017-10-01', '7 Th ', '', 'Krajan Limbangan Rt.001 Rw.005 Kendal', '', '', '', '', 'KONTRAK', '9311780', 'e99909a1d5b886d2da7df3dcbbd78cc7', 'man.png', 0),
(5777, '9351793', 'NURUL FANDILLAH', '', '', 'Perempuan', 'Semarang', '1994-03-04', '30 Th 3 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2017-10-19', '2017-10-19', '7 Th ', '', 'Jl. Gunung Jati Timur Rt.007 Rw.002  Wonosari Ngaliyan', '', '', '', '', 'KONTRAK', '9351793', '1a21c6d66c842a935795b035bae2f51f', 'woman.png', 0),
(5778, '9361788', 'MEI PUJI ASTUTI', '3374134505880002', '', 'Perempuan', 'Semarang', '1988-05-05', '36 tahun 2 ', NULL, NULL, NULL, 'KOORDINATOR LAUNDRY DAN ADMINISTRASI LINEN', 'BIDANG UMUM', '2017-10-20', '2017-10-20', '7 Th ', 'SMA', 'Jl. Lebdosari rt 003 / rw 006 Kelurahan Kalibanteng Kulon - Kecamatan Semarang Barat - Kota Semarang - 50145 - Jawa Tengah', 'Jl. Lebdosari rt 003 / rw 006 Kelurahan Kalibanteng Kulon - Kecamatan Semarang Barat - Kota Semarang - 50145 - Jawa Tengah', '', '085602556687', 'Kawin', 'KONTRAK', '9361788', 'e6a5451c17d4e8a9bf782bf09f4f9c39', 'woman.png', 0),
(5779, '9371794', 'ULFA LUTFIYANI', '', '', 'Perempuan', 'Kendal', '1995-10-02', '28 Th 8 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2017-10-25', '2017-10-25', '7 Th ', '', 'Kendayaan Rt.002 Rw.002 Penyangkringan Weleri Kendal', '', '', '', '', 'KONTRAK', '9371794', '292449310dab09360d647af9082e422d', 'woman.png', 0),
(5780, '9401782', 'SRI MARTINI', '', '', 'Perempuan', 'Semarang', '1983-04-03', '41 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2017-10-26', '2017-10-26', '7 Th ', '', ' Jl. Borobudur Rt 009 Rw 012 Kembangarum Semarang Barat Semarang ', '', '', '', '', 'KONTRAK', '9401782', '26ba6b943b5f4bd2b292c13754d21cc9', 'woman.png', 0),
(5781, '9431794', 'NOFALIA BONITA', '', '', 'Perempuan', 'Semarang', '1996-06-11', '27 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2017-11-13', '2017-11-13', '7 Th ', '', 'Jl. Tambakaji Rt.003 Rw.XI Ngaliyan Smg', '', '', '', '', 'KONTRAK', '9431794', 'f8104092136d2ab21679f5ff2680d790', 'woman.png', 0),
(5782, '9471790', 'RUDDY HERMAWAN S', '', '', 'Laki-laki', 'Semarang', '1990-11-07', '33 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', '2017-11-13', '2017-11-13', '7 Th ', '', 'Asrama Brimob Simongan 5168 Rt.001 Rw.009gisikdrono smg barat', '', '', '', '', 'KONTRAK', '9471790', 'ee3f2b7de99601c1cee4b5bdb1715f78', 'man.png', 0),
(5783, '9481788', 'FITRIA ERY SRI BUDIHARTI', '', '', 'Perempuan', 'semarang', '1989-05-05', '35 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA PERAWAT IPCN', 'IPCN', '2017-11-15', '2017-11-15', '7 Th ', '', 'Perbalan Purwosari I No. 631 D Rt.009 Rw.002 Purwosari Smg Utara', '', '', '', '', 'KONTRAK', '9481788', '8ef861e0fa1b7c8fcc37063544be5d49', 'woman.png', 0),
(5784, '9491798', 'IKA DEWI IRFANTI', '', '', 'Perempuan', 'Kendal', '1999-08-06', '24 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2017-11-06', '2017-11-06', '7 Th ', '', ' Krajan Rt 004 Rw 001 Matgosari Limbangan Kendal ', '', '', '', '', 'KONTRAK', '9491798', '659791ee005dc59984f8e611cc7eafbe', 'woman.png', 0),
(5785, '9501794', 'FANI PURWANTI', '', '', 'Perempuan', 'Kendal', '1996-04-10', '28 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2017-12-01', '2017-12-01', '7 Th ', '', 'Dsn. Krajan Rt.003 Rw.002 Bebengan Boja Kendal', '', '', '', '', 'KONTRAK', '9501794', '91025ca6bf891507763a22460e7e42b0', 'woman.png', 0),
(5786, '9511797', 'TIARA LATHIFA', '3374014205970001', '', 'Perempuan', 'Semarang', '1997-05-02', '27 tahun 3 ', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2017-11-20', '2017-11-20', '7 Th ', 'DIII', 'Bukit Beringin Selatan Blok G/46 RT 001/ RW 012', 'Bukit Beringin Selatan Blok G/46 RT 001/ RW 012', '', '085899566282', 'Kawin', 'KONTRAK', '9511797', '81dbb497505e284fa53eb188f57c424a', '66bc32ed811a0_Foto back merah.jpg', 0),
(5787, '9531782', 'ACHFANDI', '', '', 'Perempuan', 'semarang', '1982-08-12', '41 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2018-01-18', '2018-01-18', '7 Th ', '', 'Jl. Sadewa V/15 Rt.004 Rw.003 Pendrikan Kidul Semarang Tengah', '', '', '', '', 'KONTRAK', '9531782', '577a33e5918897c619c47da09f433874', 'woman.png', 0),
(5788, '9601895', 'INTAN OCTAVIA WURI I', '', '', 'Perempuan', 'Kendal', '1997-01-10', '27 Th 5 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2018-04-12', '2018-04-12', '6 Th ', '', 'Perum Griya Praja Mukti Blok B No.11 Rt.002 Rw.006 Langenharjo Kendal', '', '', '', '', 'KONTRAK', '9601895', '9b8bf5eb42b7972f20c5971f840af5fa', 'woman.png', 0),
(5789, '9641892', 'TRIYOGA', '', '', 'Laki-laki', 'Kendal', '1992-07-10', '32 tahun 0 ', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'IGD', '2018-04-12', '2018-04-12', '6 Th ', 'SI', 'Perum GPM blok e no 11', 'Perum GPM blok e no 11', '', '085742222929', 'Kawin', 'KONTRAK', '9641892', '15fb5233525d305582593f4f1cad45af', 'man.png', 0),
(5790, '9741891', 'NOPRITA LIYA KUSUMA', '', '', 'Perempuan', 'Kendal', '1991-06-11', '32 Th 11 bl', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'DEWI KUNTHI', '2018-06-01', '2018-06-01', '6 Th ', '', 'Jl. Raya 336 Kaliwungu  Rt. 008 Rw.001 Sarirejo Kaliwungu Kendal', '', '', '', '', 'KONTRAK', '9741891', '097d3eb7fcec76f98a06f2d451319543', 'woman.png', 0),
(5791, '9751893', 'ULFAH NUR HANIFAH', '', '', 'Perempuan', 'Pati', '1993-07-07', '30 Th 11 bl', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'POLIKLINIK', '2018-06-01', '2018-06-01', '6 Th ', '', 'Jl. Bukit Beringin Elok IX/ B-587 Rt. 003 Rw.014 Wonosari Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '9751893', 'dee7f21440279bdbbb2b1703683a8149', 'woman.png', 0),
(5792, '9821893', 'SEKAR RAHMA ANDHINI', '3374026612930002', '', 'Perempuan', 'Semarang', '1993-12-26', '30 tahun 7 ', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2018-06-20', '2018-06-20', '6 Th ', 'SI', 'Gedawung II rt 04 rw8 karangwuni primgsurat temanggung', 'Wonosari tengah II no 8 rt 03 rw 09 wonosari ngaliyan smg ( rmh ortu )', '', '083842358993', 'Kawin', 'KONTRAK', '9821893', 'e70812387ca71bb503f9678b68632e99', 'woman.png', 0),
(5793, '9831892', 'CHOLIFATUN NISAK', '', '', 'Perempuan', 'Semarang', '1994-02-02', '30 Th 4 bln', NULL, NULL, NULL, 'KOORDINATOR PIUTANG', 'KASIR', '2018-06-25', '2018-06-25', '6 Th ', 'SI', ' Jl. Nusa Indah 1 No. 52 Rt 002 Rw 005 Tambakaji Ngaliyan Semarang ', '', '', '', '', 'KONTRAK', '9831892', 'd8eaf20a9c2c2300e5682e66c1036004', 'woman.png', 0),
(5794, '9861894', 'DHITA ARMITASARI', '', '', 'Perempuan', 'Kendal', '1994-10-09', '29 Th 8 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'RAMA SHINTA', '2018-07-25', '2018-07-25', '6 Th ', '', 'Perumahan Patebon Indah No.28 Rt.002 Rw.008 Patebon Kendal', '', '', '', '', 'KONTRAK', '9861894', 'ace5a6e6cd0f9a5476616b1f5db3654c', 'woman.png', 0),
(5795, '9871891', 'BAHARUDIN HERMAWANTO', '', '', 'Laki-laki', 'Rembang', '1991-05-06', '33 Th 1 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'ICU', '2018-07-25', '2018-07-25', '6 Th ', '', 'Dsn. Rejowinangun Rt.004 Rw.002 Banjarejo Boja Kendal', '', '', '', '', 'KONTRAK', '9871891', '6ba51b8cb2e2e25f77fbecb32d8fd7f7', 'man.png', 0),
(5796, '9891890', 'DRG. HANA MURSALINA', '', '', 'Perempuan', 'Semarang', '1991-12-06', '32 Th 6 bln', NULL, NULL, NULL, 'KA. KOMITE PMKP', 'BIDANG KOMITE PMKP', '2018-08-27', '2018-08-27', '6 Th ', '', 'Jl. Ronggolawe III/8 Rt.001 Rw.008 GisikDrono Semarang Barat', '', '', '', '', 'KONTRAK', '9891890', 'b7fbbb038ecc1ed1dffb854e6ad04baf', 'woman.png', 0),
(5797, '9901895', 'MAULANA RANDY PRASETIYA', '3315132908950004', '', 'Laki-laki', 'Grobogan', '1995-08-29', '28 tahun 10', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2018-10-15', '2018-10-15', '6 Th ', 'SI', 'Blendung RT 003 RW 007 ', '', '', '085713201829', 'Kawin', 'KONTRAK', '9901895', '47ec95bb7c1d48c050811787bbac3fe4', '6692a62eb59bc_FB_IMG_1680351250296.jpg', 0),
(5798, '9931875', 'ENY SULISTIYOWATI', '', '', 'Perempuan', 'Boyolali', '1975-10-06', '48 Th 8 bln', '1', '2', NULL, 'PELAKSANA BIDAN', 'POLIKLINIK', '2018-10-24', '2018-10-24', '6 Th ', '', 'Jl. Telasih No. 13 Rt.002 Rw.005 Pulisen Boyolali', '', '', '', '', 'KONTRAK', '9931875', 'c44b39a543393d9b1062840ee3cf91c8', 'woman.png', 0),
(5799, '9961894', 'LINA RAHMA F', '', '', 'Perempuan', 'Kendal', '1995-10-03', '28 Th 8 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'IBS', '2018-11-28', '2018-11-28', '6 Th ', '', ' Griya Praja Mukti E.11 Rt 001 Rw 007 Kendal ', '', '', '', '', 'KONTRAK', '9961894', '7dec5dd95fd628677e900778788e1c7c', 'woman.png', 0),
(5800, '9971897', 'PUSPA AYU ARIYANANDA', '', '', 'Perempuan', 'Temanggung', '1997-12-01', '26 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2018-11-28', '2018-11-28', '6 Th ', '', 'Bukit Beringin Asri D-36 Rt.003 Rw.016 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '9971897', 'efe50f8338ec4052cea8c2544ab77759', 'woman.png', 0),
(5801, '9991893', 'LUCIA DESI PRATIWI', '3374134712930003', '', 'Perempuan', 'Semarang', '1993-12-07', '30 tahun 7 ', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'HRD', '2018-12-07', '2018-12-07', '6 Th ', '', 'Jl. Subali Makam No. 36 Rt.001 Rw.002 Krapyak Semarang', '', '', '08562917122', 'Kawin', 'KONTRAK', '9991893', '82a7f08a8af53903e438d09cfe50f287', '668e2a92277e8_IMG_20230710_072637_730.jpg', 0),
(5802, '10001899', 'MAURIEN ASTIZA CANDRA DEVANI', '', '', 'Perempuan', 'Pemalang', '2000-04-06', '24 Th 2 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'RAMA SHINTA', '2018-12-17', '2018-12-17', '6 Th ', '', 'Winong Lor Rt.001 Rw.002 Gebang Purworejo', '', '', '', '', 'KONTRAK', '10001899', '5387a648c4a2160be7831af28c43d29b', 'woman.png', 0),
(5803, '10011899', 'SOFIYA ULUL AZMI', '', '', 'Perempuan', 'Grobogan', '2000-03-10', '24 Th 3 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'ICU', '2018-12-17', '2018-12-17', '6 Th ', '', 'Dsn. Kayumas Rt.002 Rw.007 Menawan Klambu Grobogan', '', '', '', '', 'KONTRAK', '10011899', '9b2ddb043cb4c6255be948e9b54969bc', 'woman.png', 0),
(5804, '10031971', 'NOVI HERLINA', '', '', 'Perempuan', 'Semarang', '1971-10-11', '52 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2019-01-16', '2019-01-16', '5 Th ', '', ' Jl. Anggraeni V/7 Rt 001 Rw 004 Bulu Lor Semarang Utara Semarang ', '', '', '', '', 'KONTRAK', '10031971', 'e2c30385367c7329ade617502e22e56f', 'woman.png', 0),
(5805, '10041995', 'KHOIRUN ANISAK S', '', '', 'Perempuan', 'Bantul', '1995-03-12', '29 Th 2 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'IBS', '2019-01-21', '2019-01-21', '5 Th ', '', 'Geger Rt.001 Rw- Seloharjo Pundong Bantul DIY', '', '', '', '', 'KONTRAK', '10041995', '4f9783fcc9f8155e5dc4a244cbb39db9', 'woman.png', 0),
(5806, '10051900', 'HILDA WIDI ASTUTI', '', '', 'Perempuan', 'Magelang', '2001-07-07', '22 Th 11 bl', '1', '2', NULL, 'PELAKSANA ASPER', 'IGD', '2019-01-21', '2019-01-21', '5 Th ', '', 'Dsn. Sampang Rt.005 Rw.002 Gondangrejo Windusari Magelang', '', '', '', '', 'KONTRAK', '10051900', '6097c59550e1996dd20d857f4b806283', 'woman.png', 0),
(5807, '10081997', 'EKA AYU YULIANTI', '', '', 'Perempuan', 'Grobogan', '1997-02-07', '27 Th 4 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'POLIKLINIK', '2019-02-16', '2019-02-16', '5 Th ', '', 'Dsn. Mangonan Rt.002 Rw.005 Ds. Karangsari Brati Grobogan', '', '', '', '', 'KONTRAK', '10081997', '4deb2096627957b6974ff14c51a8e466', 'woman.png', 0),
(5808, '10091999', 'NUNUNG NUR AENI', '', '', 'Perempuan', 'Magelang', '1999-10-09', '24 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI', 'POLIKLINIK', '2019-02-02', '2019-02-02', '5 Th ', '', 'Susukan Rt.006 Rw.002 Grabag Magelang', '', '', '', '', 'KONTRAK', '10091999', 'fc65c2d47864bb5d542f608c3ef22872', 'woman.png', 0),
(5809, '10131991', 'FITRIYA NUR HAYATI', '', '', 'Perempuan', 'Semarang', '1992-08-04', '31 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', '2019-02-15', '2019-02-15', '5 Th ', '', 'Kp. Cepersari Rt.003 Rw.005 Srondol Kulon Banyumanik Semarang', '', '', '', '', 'KONTRAK', '10131991', 'c38fbe7974c18c15b73cbcf8965d970a', 'woman.png', 0),
(5810, '10141994', 'INDAH NUR ANIYAH', '', '', 'Perempuan', 'Semarang', '1995-06-06', '29 Th 0 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'POLIKLINIK', '2019-02-16', '2019-02-16', '5 Th ', '', 'Jl. Tmn Karonsih Dlm No.969 Rt.001 Rw.004 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '10141994', '43f697149bd44585fb8bf4259cf4b44c', 'woman.png', 0),
(5811, '10161993', 'ERIN PRASTITI', '', '', 'Perempuan', 'Semarang', '1994-09-06', '29 Th 9 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2019-02-16', '2019-02-16', '5 Th ', '', 'Jl. Sendang Indah Timur Rt.003 Rw.002 Muktiharjo Lor Genuk Semarang', '', '', '', '', 'KONTRAK', '10161993', '45b8f3a1f26e1cf8aa9d3db13ec41f52', 'woman.png', 0),
(5812, '10191987', 'BUDI LESTARI', '', '', 'Perempuan', 'Blora', '1987-05-03', '37 Th 1 bln', NULL, NULL, NULL, 'KOORDINATOR', 'REKAM MEDIS', '2019-02-25', '2019-02-25', '5 Th ', '', 'Jl. Candi Kencana Raya No. E 46 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '10191987', '436fcac258115e874ad04e4d0b11e82a', 'woman.png', 0),
(5813, '10201998', 'ARIANA KIKI WULANDARI', '', '', 'Perempuan', 'Magelang', '2000-07-08', '23 Th 11 bl', '1', '2', NULL, 'PELAKSANA ASPER', 'POLIKLINIK', '2019-03-01', '2019-03-01', '5 Th ', '', 'Kanci I Rt.002 Rw.003 Salamkanci Bandongan Magelang', '', '', '', '', 'KONTRAK', '10201998', '8b95a6ca5f62cf1cd29e75c906d40d8d', 'woman.png', 0),
(5814, '10221999', 'RISKI YULIANA', '', '', 'Perempuan', 'Kab.Semarang', '2000-02-07', '24 Th 4 bln', '1', '2', NULL, 'PELAKSANA ASPER', 'IKB', '2019-04-12', '2019-04-12', '5 Th ', '', 'Dusun Sruwen Rt.008 Rw.004 Ds. Bergas Kidul Kec. Bergas', '', '', '', '', 'KONTRAK', '10221999', '79e486ec2407984ecf3012cb058bc0aa', 'woman.png', 0),
(5815, '10261998', 'FINTANA MEILA WIGATI', '3308126205980003', '', 'Perempuan', 'Magelang', '1998-05-22', '26 tahun 1 ', '1', '2', NULL, 'PELAKSANA ASPER', 'POLIKLINIK', '2019-04-01', '2019-04-01', '5 Th ', 'SMA', 'Dsn. Salakan RT02/RW08, Ds. Kwaderan, Kec. Kajoran, Kab. Magelang', 'Jl. Pengilon II No.12 RT02/RW02, Beringin, Ngaliyan, Semarang', '', '085601423005', 'Belum Kawin', 'KONTRAK', '10261998', '328f4e8fa7eef9c1d66f8476b916e77e', '6697c9c7a7593_IMG_3147.JPG', 0),
(5816, '10321992', 'DEWI RISTYANING YULIASTUTI', '', '', 'Perempuan', 'Jepara', '1992-08-07', '31 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI', 'ARIMBI', '2019-05-06', '2019-05-06', '5 Th ', '', 'Ds. Banyumanik Rt 001/06 Kec. Donorojo Jepara', '', '', '', '', 'KONTRAK', '10321992', 'eba82a77da9e607fa7af7b95e5a8eeba', 'woman.png', 0),
(5817, '10351982', 'SRI REJEKI', '', '', 'Perempuan', 'Semarang', '1984-04-12', '40 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2019-05-15', '2019-05-15', '5 Th ', '', 'Jl. Klampisan Rt.006 Rw.002 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '10351982', 'c656045705cd5fdf72f0ba374e865efd', 'woman.png', 0),
(5818, '10361987', 'ABDUL BASIT', '', '', 'Laki-laki', 'Kendal', '1989-05-03', '35 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2019-05-27', '2019-05-27', '5 Th ', '', 'Desa Leban Rt 03 Rw 01 Kec. Boja Kab.Kendal', '', '', '', '', 'KONTRAK', '10361987', '16b127553f15256bc34c37c28f015874', 'man.png', 0),
(5819, '10391997', 'NANDA RIZKI APRILIA', '', '', 'Perempuan', 'Semarang', '1998-01-04', '26 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2019-05-29', '2019-05-29', '5 Th ', '', 'Jl. Sadeng Rt 06 Rw 01 Kec Gunungpati', '', '', '', '', 'KONTRAK', '10391997', '9c707fa32c5841dc18392536d2327993', 'woman.png', 0),
(5820, '10451996', 'KHOIRUR ROZIQIN', '', '', 'Laki-laki', 'Kab. Semarang', '1996-07-05', '27 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2019-06-26', '2019-06-26', '5 Th ', '', 'Dsn Cemanggah Kidul RT 002 RW 004 Branjang Ungaran Barat', '', '', '', '', 'KONTRAK', '10451996', '4b6ca32fd915842e2c296c56b9a04a82', 'man.png', 0),
(5821, '10571995', 'ARINI FIRDANINGRUM', '', '', 'Perempuan', 'Semarang', '1997-02-11', '27 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2019-07-31', '2019-07-31', '5 Th ', '', 'Ds. Mangunharjo RT 003 RW 001 Kec. Tugu Semarang', '', '', '', '', 'KONTRAK', '10571995', '749a373e03e888c9b4d421b558a0b9db', 'woman.png', 0),
(5822, '10601984', 'DR. ARIA WINDY MAHARDHIKA SP AN', '', '', 'Laki-laki', 'Semarang', '1985-02-11', '39 Th 3 bln', NULL, NULL, NULL, 'KA.INSTALASI ICU', 'PELAYANAN MEDIS', '2019-09-02', '2019-09-02', '5 Th ', '', 'Jl. Pamularsih No. 109 Rt 001 Rw 003 Gisikdrono Semarang', '', '', '', '', 'KONTRAK', '10601984', 'd88e737a45aff316bbcde2da2f1a05d4', 'man.png', 0),
(5823, '10611986', 'ANI AGUSTRIANI', '', '', 'Perempuan', 'Semarang', '1987-03-08', '37 Th 3 bln', NULL, NULL, NULL, 'APOTEKER  SATELIT', 'FARMASI', '2019-08-26', '2019-08-26', '5 Th ', '', 'Jl. Sriwidodo Utara RT 007 RW 001 Purwoyoso Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '10611986', '7769638ebfd8a2abe1de190f3eed7039', 'woman.png', 0),
(5824, '10741998', 'ANINDITA GALUH FITRIANA', '', '', 'Perempuan', 'semarang', '2000-07-01', '23 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '1999-11-20', '1999-11-20', '5 Th ', '', 'Jl. Purwosari II/3 RT 05/RW 07 Kelurahan Rejosari Kecamatan Semarang Timur', '', '', '', '', 'KONTRAK', '10741998', 'aa7176a62eea0652a487cd7543ea3e12', 'woman.png', 0),
(5825, '10792091', 'TONI WIBOWO', '', '', 'Laki-laki', 'Semarang', '1991-09-09', '32 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA TEHNISI', 'IPSRS', '2020-01-23', '2020-01-23', '4 Th ', '', 'Gg. Santer RT 02 RW 06 Kel. Weleri Kec. Weleri Kab. Kendal', '', '', '', '', 'KONTRAK', '10792091', '16b3d7f5653a9d6d67fda0576c6e07c5', 'man.png', 0),
(5826, '10842092', 'ARQY WIDYA PRATAMA', '', '', 'Perempuan', 'Surakarta', '1992-06-06', '32 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', '2020-02-19', '2020-02-19', '4 Th ', '', 'Jl. Sri Rejeki II No. 4 Semarang Barat', '', '', '', '', 'KONTRAK', '10842092', '2d1dc3ede32bb825cb450c513e9dcdc0', '668e126fbdfbd_IMG_20240511_054544_407.jpg', 0),
(5827, '10872099', 'KINTAN MAY PRATIWI', '', '', 'Perempuan', 'Semarang', '2000-08-05', '23 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'PENDAFTARAN', '2020-02-29', '2020-02-29', '4 Th ', '', 'Kp. Duwet RT 05 RW 10 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '10872099', '6f324cec1017c3420d462b5d4c8befd4', 'woman.png', 0),
(5828, '10962188', 'DR. MIRANTIKA EMMA YUSUF RESTUMINA, SP.PD', '', '', 'Perempuan', 'Semarang', '1990-03-05', '34 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA MEDIS', 'PELAYANAN MEDIS', '0000-00-00', '0000-00-00', '6 Th ', '', 'Pusponjolo Selatan IV/5 Rt.005 Rw.005 Bojongsalaman Semarang Barat', '', '', '', '', 'KONTRAK', '10962188', 'acf928caa2fcdec4c19beaedf5322dd2', 'woman.png', 0),
(5829, '10991895', 'MEGA ARUM SARI', '', '', 'Perempuan', 'Boyolali', '1996-02-08', '28 Th 4 bln', '1', '3', NULL, 'PELAKSANA BIDAN', 'IKB', '2015-07-17', '2015-07-17', '6 Th ', '', 'Sidorejo RT 02 RW 01, Mojolegi, Teras, Boyolali', '', '', '', '', 'KONTRAK', '10991895', 'd3c71acb576e2de6636ada93dd6e2a8f', 'woman.png', 0),
(5830, '11002079', 'ABDUL KARIM', '', '', 'Laki-laki', 'Semarang', '1979-02-02', '45 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA DRIVER', 'DRIVER', '2020-01-20', '2020-01-20', '4 Th ', '', 'Kedungwinong RT 02 RW 03 Meteseh Tembalang', '', '', '', '', 'KONTRAK', '11002079', '5288d446e41824b97b50f6fc922eb1cf', 'man.png', 0),
(5831, '11020752', 'SUPADI', '', '', 'Laki-laki', 'Semarang', '1952-04-05', '72 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA GARDENER', 'GARDENER', '2020-01-01', '2020-01-01', '17 Th ', '', ' Ngaliyan Rt 001 Rw 001 Ngaliyan Semarang ', '', '', '', '', 'KONTRAK', '11020752', '9172c1bba56ea9cbb093006a8818de81', 'man.png', 0),
(5832, '11030869', 'JUPRI', '', '', 'Laki-laki', 'Kendal', '1970-05-06', '54 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA GARDENER', 'GARDENER', '2013-05-31', '2013-05-31', '16 Th ', '', ' Kaliancar Rt 002 Rw 001 Podorejo Ngaliyan Semarang ', '', '', '', '', 'KONTRAK', '11030869', '13ec3d0c52ad417927d504ecdb92ae1d', 'man.png', 0),
(5833, '11092193', 'SEPTIAN BATARA', '', '', 'Laki-laki', 'Kendal', '1994-01-09', '30 Th 5 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'IGD', '2021-12-01', '2021-12-01', '3 Th ', '', 'Kebonagung Rt.001 Rw.002 Ngampel Kendal', '', '', '', '', 'KONTRAK', '11092193', 'e67bced06f828b39455f40e303ebea5c', 'man.png', 0),
(5834, '11172296', 'DR. NUZULA FIKRIN NABILA', '', '', 'Perempuan', 'Malang', '1996-07-02', '27 Th 11 bl', NULL, NULL, NULL, 'KOMITE PPI & KABID. MEDIS', 'KOMITE PPI', '2022-01-03', '2022-01-03', '2 Th ', '', 'Jl. Julung Wangi I/249 Rt.001 Rw.005 Krapyak Semarang Barat', '', '', '', '', 'KONTRAK', '11172296', '6e2d15a7f74cd5a0e9dc4ae774f4a9d8', 'woman.png', 0),
(5835, '11182297', 'NUR KUMALADEWI', '', '', 'Perempuan', 'Semarang', '1999-02-06', '25 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', '2022-01-17', '2022-01-17', '2 Th ', '', 'Wonosari Rt.004 Rw.008 WonosariNgaliyan Semarang', '', '', '', '', 'KONTRAK', '11182297', '9a9dcc039ff70628b71d62534ee3c6b8', 'woman.png', 0),
(5836, '11192299', 'ALFAMAY LIFIA KUSUMA', '', '', 'Perempuan', 'Semarang', '1999-07-05', '24 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2022-01-17', '2022-01-17', '2 Th ', '', 'Perum Bukit Mandiri Beringin Blok T/I Rt.014 Rw.016 Bringin Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11192299', '95f1fd5f32cb7267bfd21e50fbd6fc15', 'woman.png', 0),
(5837, '11202286', 'SRI WAHYUNINGSIH', '', '', 'Perempuan', 'Kendal', '1986-11-07', '37 Th 7 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'DEWI KUNTHI', '2022-01-17', '2022-01-17', '2 Th ', '', 'Ds. Blorok Sembung Rt.001 Rw.002 Brangsong Kendal', '', '', '', '', 'KONTRAK', '11202286', '5a36f952edf09e392421bfa31f817dbb', 'woman.png', 0),
(5838, '11232297', 'ANI MAFTUCHAH', '', '', 'Perempuan', 'Kendal', '1999-06-03', '25 Th 0 bln', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'IGD', '2022-01-17', '2022-01-17', '2 Th ', '', 'Dsn. Seklotok Rt.008 Rw.001 Getas Singorojo Kendal', '', '', '', '', 'KONTRAK', '11232297', '127b8a186469086c0f529875162192f8', 'woman.png', 0),
(5839, '11242298', 'RIDAYA SIS QOMARULLAH', '', '', 'Laki-laki', 'Kendal', '2000-07-05', '23 Th 11 bl', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'IGD', '2022-01-17', '2022-01-17', '2 Th ', '', 'Dk. Sembung Rt.001 Rw.002 Ds. Blorok Brangsong Kendal', '', '', '', '', 'KONTRAK', '11242298', '7eb9a6197eafbe580d95e901a8a4a24c', 'man.png', 0),
(5840, '11252283', 'YATIMAN', '', '', 'Laki-laki', 'Semarang', '1985-02-06', '39 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA PORTIR', 'SECURITY', '2022-02-02', '2022-02-02', '2 Th ', '', 'Randugarut Rt.001 Rw.002 Kel. Randu Garut Tugu Semarang', '', '', '', '', 'KONTRAK', '11252283', 'ea7e9821848773f8ed0b2e323f2240c3', 'man.png', 0),
(5841, '11262284', 'AHMAD SAEFODIN', '', '', 'Laki-laki', 'Semarang', '1985-03-06', '39 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2022-02-02', '2022-02-02', '2 Th ', '', 'Dk. Jatibarang RT/RW.001/001 Kedungpani Mijen Semarang', '', '', '', '', 'KONTRAK', '11262284', '49df07850cf2c19c141f267613f41a55', 'man.png', 0),
(5842, '11272294', 'BAHAR WIDAYANTO', '', '', 'Laki-laki', 'Kendal', '1994-06-06', '30 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA KURIR / FILLING', 'REKAM MEDIS', '2022-02-02', '2022-02-02', '2 Th ', '', 'Dsn. Simbang Rt.001 Rw.005 Bebengan Boja Kendal', '', '', '', '', 'KONTRAK', '11272294', 'a944c396b3976539974507f0e183bee3', 'man.png', 0),
(5843, '11282200', 'ASTI DIAH SAFITRI', '', '', 'Perempuan', 'Semarang', '2001-07-06', '22 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2022-02-09', '2022-02-09', '2 Th ', '', 'Mangunharjo Rt.009 Rw. 003 Mangunharjo Tugu Semarang', '', '', '', '', 'KONTRAK', '11282200', 'f3e5c0499410ce51d6321f79dde7579c', 'woman.png', 0),
(5844, '11292200', 'MAULUDA FITRIYANA', '', '', 'Perempuan', 'Semarang', '2000-08-01', '23 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2022-02-09', '2022-02-09', '2 Th ', '', 'Jl. Kalikangkung No. 85 Rt.001 Rw.001 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11292200', '88a73f7278ff5d0c045be89d8d9033b4', 'woman.png', 0);
INSERT INTO `pegawai` (`id`, `nopeg`, `nama`, `nik`, `agama`, `gender`, `tmpt_lahir`, `tgl_lahir`, `umur`, `jenis_pegawai`, `jenis_kesehatan`, `jenjang_karir`, `jabatan`, `unit`, `tmt`, `skpt`, `masa`, `ijazah`, `alamat`, `alamat2`, `email`, `telpon`, `status_kawin`, `status_pegawai`, `username`, `password`, `foto`, `admin`) VALUES
(5845, '11302294', 'INNA MUSFIRATUN', '', '', 'Perempuan', 'Demak', '1994-11-04', '29 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'CASEMIX', '2022-02-09', '2022-02-09', '2 Th ', '', 'Kedungpani Rt.001 Rw.011 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11302294', 'c7740bcadb923702264b9d0f40d59627', 'woman.png', 0),
(5846, '11312295', 'GIAT', '', '', 'Laki-laki', 'Pekalongan', '1996-08-08', '27 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'CASEMIX', '2022-02-09', '2022-02-09', '2 Th ', '', 'Dk. Karangwringin Rt.004 Rw.002 Trajumas Kandangserang Pekalongan', '', '', '', '', 'KONTRAK', '11312295', '8ea7ad608f63fd35f85d52d4c66f4f99', 'man.png', 0),
(5847, '11322288', 'WIRAWAN MUKTI JAYANTO', '', '', 'Laki-laki', 'Semarang', '1990-03-05', '34 Th 3 bln', NULL, NULL, NULL, 'AHLI GIZI', 'GIZI', '2022-02-09', '2022-02-09', '2 Th ', '', 'Jl. Raya Wates Rt.005 Rw.003 Wates Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11322288', 'a03879c0ac2e230aecd5250175fffb17', 'man.png', 0),
(5848, '11332200', 'WIWIK SAFITRI', '', '', 'Perempuan', 'Kendal', '2002-01-09', '22 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2022-02-25', '2022-02-25', '2 Th ', '', 'Ds. Medono Rt.004 Rw.002 Kec. Boja Kab. Kendal', '', '', '', '', 'KONTRAK', '11332200', '1f83d42202ff82d48c4c40aee5d5eaf8', 'woman.png', 0),
(5849, '11342298', 'ERISKA SUSILOWATI', '', '', 'Perempuan', 'Kendal. 03 Januari 1998', '1998-03-01', '26 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2022-02-25', '2022-02-25', '2 Th ', '', 'Ds. Ngareanak Rt.002 Rw.006 Singorojo Kendal', '', '', '', '', 'KONTRAK', '11342298', '4e30c7a3ac4ba989708efbf17f7e9c26', 'woman.png', 0),
(5850, '11362295', 'AHADIYAH NORMA FELAYATI', '', '', 'Perempuan', 'Kendal', '1996-03-04', '28 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2022-02-26', '2022-02-26', '2 Th ', '', 'Ds. Lanji Rt.007 rw.001 patebon kendal', '', 'maulanafajar752@gmail.com', '08980022735', '', 'KONTRAK', '11362295', '6dd8392e2c2850d3c2b1a54233e1176e', '68ce0ed14bb91_23917031_6846928.jpg', 0),
(5851, '11372294', 'VIVY SETYANI W', '', '', 'Perempuan', 'Semarang', '1995-07-10', '28 Th 11 bl', NULL, NULL, NULL, 'SUPERVISOR KEPERAWATAN', 'DEWI KUNTHI', '2022-02-26', '2022-02-26', '2 Th ', '', 'Jl. Lobak Rt.007 Rw.005 Sendangguwo Tembalang Semarang', '', '', '', '', 'KONTRAK', '11372294', '9044a1fa84cea137000689e1311f1b79', 'woman.png', 0),
(5852, '11432299', 'ARUM ROCHIMA', '', '', 'Perempuan', 'Semarang', '1999-09-10', '24 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI', 'FARMASI', '0000-00-00', '2022-04-16', '2 Th ', '', 'Jl. Srikaton Barat Rt.007 Rw.007 Purwoyoso Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11432299', 'a88f21f46e6aab6a37056fa5b7d7aa95', 'woman.png', 0),
(5853, '11462290', 'DR. RACHMA PURNAM,A SARI, Sp.THT.KL', '', '', 'Perempuan', 'Semarang', '1990-04-04', '34 Th 2 bln', NULL, NULL, NULL, 'KA. KOMITE MEDIK &KA. INSTALASI IBS', 'PELAYANAN MEDIS', '2022-06-02', '2022-06-02', '2 Th ', '', 'Jl. Menoreh III No. 25 Rt.001 Rw.007 Sampangan gajahmungkur Semarang 50236', '', '', '', '', 'KONTRAK', '11462290', 'cb9018fd3844dc9543d179954e17faeb', 'woman.png', 0),
(5854, '11492200', 'EKA APRILIA NURAIDA', '', '', 'Perempuan', 'Semarang', '2000-10-04', '23 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2022-06-02', '2022-06-02', '2 Th ', '', 'Jl. Margosari Baru Rt.007 Rw.007 Sawah Besar Gayamsari Semarang', '', '', '', '', 'KONTRAK', '11492200', '9e4295f27cbe3fb0f641c9b50dea04b9', 'woman.png', 0),
(5855, '11542297', 'DIYAS MAUIDLOTUL HASANAH', '', '', 'Perempuan', 'Kendal', '1997-07-03', '26 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2022-06-13', '2022-06-13', '2 Th ', '', 'Ds. Campurejo Rt.003 Rw.004 Boja Kendal', '', '', '', '', 'KONTRAK', '11542297', 'd860ccab74df0f97e0cce30cba372946', '6690cdeb6d495_39869585-209D-4567-9B89-F102681107A2.jpeg', 0),
(5856, '11572298', 'FENI RACHMAWATI', '', '', 'Perempuan', 'Semarang', '1998-02-01', '26 Th 4 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2022-06-13', '2022-06-13', '2 Th ', '', 'Ngadirgo Rt.002 Rw.005 Mijen Semarang', '', '', '', '', 'KONTRAK', '11572298', '0b8f445d953a371eb0c9ea505115ff17', 'woman.png', 0),
(5857, '11592298', 'MESI DAYANI', '', '', 'Perempuan', 'Semarang', '2000-02-02', '24 Th 4 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2022-06-20', '2022-06-20', '2 Th ', '', 'Jl. Cilosari No.570 Rt.001 Rw.002 Bugangan Semarang Timur Semarang', '', '', '', '', 'KONTRAK', '11592298', '994372fbb39ab15671a624293a1e3f8f', 'woman.png', 0),
(5858, '11622299', 'TAMARA ELOK SAPUTRI', '', '', 'Perempuan', 'Kendal', '2001-01-07', '23 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2022-06-21', '2022-06-21', '2 Th ', '', 'Dsn. Nglorok Rt.001 Rw.003 Campurejo Boja Kendal', '', '', '', '', 'KONTRAK', '11622299', 'bea8d45092ae6169ed23dd1d69e7e5d2', 'woman.png', 0),
(5859, '11662299', 'ULIL AMRI', '', '', 'Laki-laki', 'Semarang', '1998-04-01', '26 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA OB', 'OB', '2022-06-30', '2022-06-30', '2 Th ', '', 'Tugurejo Rt.009 Rw.001 Tugurejo Tugu Semarang', '', '', '', '', 'KONTRAK', '11662299', '7a16344b1a3e7e6fee0afefaaf28f5ea', 'man.png', 0),
(5860, '11682286', 'RUBIYANTO', '', '', 'Laki-laki', 'Kendal', '1985-07-08', '38 Th 11 bl', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2022-07-04', '2022-07-04', '2 Th ', '', 'Bentur Rt.003 Rw.005 Purwosari Mijen Semarang', '', '', '', '', 'KONTRAK', '11682286', 'e99ae6ad4e5b7bb75d9341757326f004', 'man.png', 0),
(5861, '11692296', 'ARIEF MUTTAQIEN', '', '', 'Laki-laki', 'Salatiga', '1996-08-05', '27 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2022-07-04', '2022-07-04', '2 Th ', '', 'Wonosari Rt.002 Rw.009 WonosariNgaliyan Semarang', '', '', '', '', 'KONTRAK', '11692296', '0d131310b6a7300d7df55418bdeae564', 'man.png', 0),
(5862, '11702269', 'ISHAK SAMUEL LEMA', '', '', 'Laki-laki', 'Kupang', '1970-01-08', '54 Th 5 bln', NULL, NULL, NULL, 'KOORDINATOR', 'SECURITY', '2022-07-11', '2022-07-11', '2 Th ', '', 'Jatisari Asabri D6/2 Rt.009 Rw.010 Jatisari Mijen Semarang', '', '', '', '', 'KONTRAK', '11702269', 'e8e3023b8ed0990188a61fce0397a12c', 'man.png', 0),
(5863, '11712278', 'YETI WIDYANINGSIH', '', '', 'Perempuan', 'Surakarta', '1979-06-03', '45 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA', 'POLIKLINIK', '2022-08-01', '2022-08-01', '2 Th ', '', 'Surtikanti Tengah V No.11 Rt.002 Rw.001 Bulu Lor Semarang Utara Smg', '', '', '', '', 'KONTRAK', '11712278', '862d018a63f529ac2f5c564d77999138', 'woman.png', 0),
(5864, '12632402', 'SHELLY SETIANS FEBRIANTI', '01', '', 'Perempuan', 'Denpasar', '1995-11-06', '28', NULL, NULL, NULL, 'PELAKSANA RADIOLOGI', 'RADIOLOGI', '2024-03-01', '2024-03-01', '0 Th ', '', 'Jl. Wismasari IV No. 15 Rt.001 Rw.008 Kel. Ngaliyan Kec. Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12632402', '8209588c2572ac48e4a38a4b60591787', 'woman.png', 0),
(5865, '11732200', 'DEVI SINTA DEWI', '', '', 'Perempuan', 'Semarang', '2000-12-10', '23 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA', 'FISIOTERAPI', '2022-09-07', '2022-09-07', '2 Th ', '', 'Jl. Srikaton Utara Rt.001 Rw.005 Purwoyoso Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11732200', 'c137c9940ead8ac97649668ee454d10f', 'woman.png', 0),
(5866, '11752294', 'RETTY DIAH HAPSARI', '', '', 'Perempuan', 'Semarang', '1996-06-03', '28 Th 0 bln', NULL, NULL, NULL, 'KA. INSTALASI FARMASI', 'FARMASI', '2022-09-21', '2022-09-21', '2 Th ', '', 'Banyumanik Timur Rt.007 Rw.002 Banyumanik Semarang', '', '', '', '', 'KONTRAK', '11752294', '5e43f62909e17351e12e4cfb11a25040', 'woman.png', 0),
(5867, '11772203', 'CELLIA PUPUT SUTINA', '', '', 'Perempuan', 'Semarang', '2004-09-06', '19 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2022-09-21', '2022-09-21', '2 Th ', '', 'Jl. Pengilon V Rt.005 Rw.002 Beringin Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11772203', '26757446e67bf94686ff4d07df2fec57', 'woman.png', 0),
(5868, '11782296', 'YUNIKA AFIANTI', '', '', 'Perempuan', 'Sleman', '1998-04-06', '26 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2022-09-21', '2022-09-21', '2 Th ', '', 'Perum CGS Blok E. 8 No. 32 Rt.003 Rw.016 Simpangan Cikarang Utara Bekasi', '', '', '', '', 'KONTRAK', '11782296', 'ac76d211da54ab5df5a30eab899d45be', 'woman.png', 0),
(5869, '11792298', 'DR. MUHAMMAD FAIZ HAIDAR RAFI', '', '', 'Laki-laki', 'Semarang', '1998-02-05', '26 Th 4 bln', NULL, NULL, NULL, 'KA. BAGIAN HUMAS DAN MARKETING DAN SIM RS', 'PELAYANAN MEDIS', '2022-10-03', '2022-10-03', '2 Th ', '', 'Dk. Dondong Rt.001 Rw.006 Wonosari Ngaliyan', '', '', '', '', 'KONTRAK', '11792298', '187d8ad3291f4499f678affa834ab9ab', 'man.png', 0),
(5870, '11802262', 'DR. GRANGSANG IMAM PURWOHADI', '', '', 'Laki-laki', 'Yogyakarta', '1962-09-24', '61 Th 8 bln', NULL, NULL, NULL, 'KA. KOMITE ETIK DAN HUKUM', 'PELAYANAN MEDIS', '2022-10-10', '2022-10-10', '2 Th ', '', 'Jl. Jatingaleh III No.37 Rt.002 Rw.004 Jatingaleh Candisari Semarang', '', '', '', '', 'KONTRAK', '11802262', 'c619219a5d00e1fec9c799ce79f10cf8', 'man.png', 0),
(5871, '11812299', 'DR. TIARA AUGUSTINA PUTRI', '', '', 'Perempuan', 'Malang', '1999-08-17', '24 Th 9 bln', NULL, NULL, NULL, 'KASIE PENUNJANG MEDIS', 'PENUNJANG MEDIS', '2022-10-10', '2022-10-10', '2 Th ', '', 'Pondok Blimbing Indah D3/3 Malang', '', '', '', '', 'KONTRAK', '11812299', 'c7d8b2a256c76b9438194371cda7ea23', 'woman.png', 0),
(5872, '11822297', 'AGUSTIAN DWI PRADANA', '', '', 'Laki-laki', 'Semarang', '1997-08-04', '26 Th 10 bl', NULL, NULL, NULL, 'KOORDINATOR TEKNISI MEDIS', 'TEKNISI MEDIS', '2022-10-18', '2022-10-18', '2 Th ', '', 'Jl. Jatiluhur No.391 Rt.002 Rw.004 Ngesrep Banyumanik Semarang', '', '', '', '', 'KONTRAK', '11822297', '94ed1230ab96310f2cec6cf05a6c9231', 'man.png', 0),
(5873, '11832297', 'ALDEA AMALIA KHOIRUNNISA', '', '', 'Perempuan', 'Semarang', '1997-09-18', '26 Th 8 bln', NULL, NULL, NULL, 'KOORDINATOR FARMASI RAWAT JALAN', 'FARMASI', '2022-10-22', '2022-10-22', '2 Th ', '', 'Jl. Wahyu Asri XI/D-47 Rt.006 Rw.006 Tambakaji Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11832297', '6c58ae78e668056d52730fef327cccd0', 'woman.png', 0),
(5874, '11842200', 'SALSABILA NUR ZAIYANA', '', '', 'Perempuan', 'Cilacap', '2000-10-17', '23 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2022-10-28', '2022-10-28', '2 Th ', '', 'Jl. Letkol Sudarsono Rt.006 Rw.001 Bajing Kroya Cilacap', '', '', '', '', 'KONTRAK', '11842200', '6c2fcba4d3944f99985427dd62da8bfa', 'woman.png', 0),
(5875, '11852201', 'NOVITA AGUSTINA', '', '', 'Perempuan', 'Kendal', '2001-08-01', '22 Th 10 bl', NULL, NULL, NULL, 'PELKSANA TTK', 'FARMASI', '2022-10-28', '2022-10-28', '2 Th ', '', 'Ds. Tambakrejo RT.001 Rw.001 Tambakrejo Patebon Kendal', '', '', '', '', 'KONTRAK', '11852201', 'c6c54eb4d0ccde509f1879fd300ce36a', 'woman.png', 0),
(5876, '11862292', 'PANDU KURNIANTO', '', '', 'Laki-laki', 'Blora', '1992-10-20', '31 Th 7 bln', NULL, NULL, NULL, 'FISIKAWAN MEDIS', 'FISIKAWAN MEDIS', '2022-11-07', '2022-11-07', '2 Th ', '', 'Jl. Lodan 3 Rt 003 Rw 003 Bandarharjo Semarang Utara Semarang', '', '', '', '', 'KONTRAK', '11862292', '7851c8bbcdad0aa0b32d70339ba4ecb9', 'man.png', 0),
(5877, '11882297', 'Diana', '', '', 'Perempuan', 'Kendal', '1997-07-14', '26 Th 10 bl', '1', '2', '4', 'PELAKSANA PERAWAT', 'POLIKLINIK', '2022-11-14', '2022-11-14', '2 Th ', '', 'Rembes Rt.005 Rw.003 Sidodadi Patean Kendal', '', 'maulanafajar752@gmail.com', '08980022735', '', 'KONTRAK', '11882297', '2ca17ba422e12bc4a162fd0d18b3eb97', '68f19b058f624_68ac0e265688f_Sample-1-1.jpg', 0),
(5878, '11892298', 'Elvica Sari', '', '', 'Perempuan', 'Lawang', '1998-10-23', '25 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2022-11-14', '2022-11-14', '2 Th ', '', 'Jl. Rivera II AE-2 No.16 Rt.001 Rw.017 Beringin Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '11892298', 'ea62bcc2f369475436c473c514e6ce2c', 'woman.png', 0),
(5879, '11902298', 'Shely Vionica', '', '', 'Perempuan', 'Kendal', '1998-09-13', '25 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2022-11-14', '2022-11-14', '2 Th ', '', 'Dsn. Kebonadem Rt.003 Rw.003 Merbuh Singorojo Kendal', '', '', '', '', 'KONTRAK', '11902298', '21cddb2dfc6a548c65336a2a0c0f78da', 'woman.png', 0),
(5880, '11922297', 'Aditya Dwi Meilani, S.Farm, Apt', '3374154205970002', '', 'Perempuan', 'Ketapang', '1997-05-02', '27 tahun 2 ', NULL, NULL, NULL, 'APOTEKER', 'FARMASI', '2022-11-24', '2022-11-24', '2 Th ', 'SI', 'Bukit Beringin Asri Blok B.7 RT01 RW16 Tambakaji Ngaliyan', 'Bukit Beringin Asri Blok B.13 RT01 RW16 Tambakaji Ngaliyan ', '', '081288618463', 'Belum Kawin', 'KONTRAK', '11922297', '7c9a3fa629dea7ea7604678c3af3d136', '6698e97238750_Pas Foto Aditya.jpg', 0),
(5881, '11952200', 'FEBRI ARUM SAPUTRI', '', '', 'Perempuan', 'Kendal', '2000-02-19', '24 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2022-11-28', '2022-11-28', '2 Th ', '', 'Jl. Pramuka No.16 Rt.005 Rw.007 Boja Kendal', '', '', '', '', 'KONTRAK', '11952200', '116956bbda2a9a3b6b6e3e967bfa6875', 'woman.png', 0),
(5882, '11962201', 'FARAH NADZIRUL HIKMAH', '', '', 'Perempuan', 'Sleman', '2001-01-25', '23 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', '2022-11-28', '2022-11-28', '2 Th ', '', 'Sambak Rt.004 Rw.005 Danyang Purwodadi Grobogan ', '', '', '', '', 'KONTRAK', '11962201', '6a70d1b95a0d21502c7db23f60271ef1', 'woman.png', 0),
(5883, '11972299', 'Eric Bayu Arianto', '', '', 'Laki-laki', 'Semarang', '1999-09-23', '24 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA RADIOGRAFER', 'RADIOLOGI', '2022-11-28', '2022-11-28', '2 Th ', '', 'Medoho Seruni Rt.002 Rw.004 Sambirejo Gayamsari Semarang', '', '', '', '', 'KONTRAK', '11972299', 'ee7034372acc177d2050e5ea98bd34f0', 'man.png', 0),
(5884, '11992200', 'ANISA AYU FEBRIALMA', '', '', 'Perempuan', 'Grobogan', '2000-02-03', '24 Th 4 bln', NULL, NULL, NULL, 'BIDANG ADMINITRASI DAN KEPEGAWAIAN', 'HRD', '2022-12-16', '2022-12-16', '2 Th ', '', 'Jl. Soponyono V/51 Rt.010 Rw.021 Purwodadi Grobogan', '', '', '', '', 'KONTRAK', '11992200', 'aedb15e979775a652bb762b06820894c', '667551f289c5d_IMG-20240603-WA0134.jpg', 2),
(5885, '12012201', 'NADIA LAILITA PUTRI FATIN', '', '', 'Perempuan', 'Semarang', '2001-12-26', '22 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2022-12-28', '2022-12-28', '2 Th ', '', 'Jl. Kri Dewaruci Rumdin TNI-AL Rt. 002 Rw. 005 Kalibannteng Kidul Semarang Barat Semarang', '', '', '', '', 'KONTRAK', '12012201', 'a2c69a5d93c5d85a914ffc0a9af27d33', 'woman.png', 0),
(5886, '12022293', 'AJENG PRASASTI', '', '', 'Perempuan', 'Semarang', '1993-06-06', '31 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'POLIKLINIK', '2022-12-28', '2022-12-28', '2 Th ', '', 'Dk. Jatibarang Rt. 003 Rw. 001 Kedungpani Mijen Semarang', '', '', '', '', 'KONTRAK', '12022293', 'f2608f4d651b4b82b50c9088d4283865', 'woman.png', 0),
(5887, '12032298', 'TRI SETYANINGSIH', '', '', 'Perempuan', 'Kendal', '1998-05-15', '26 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2022-12-28', '2022-12-28', '2 Th ', '', 'Kradenan Rt. 003 Rw. 004 Kebonadem Brangsong Kendal', '', '', '', '', 'KONTRAK', '12032298', 'b66d52036b2aa920b2f655024a1d73e1', 'woman.png', 0),
(5888, '12042299', 'EVITA AGUSTIARA NUGROHO', '', '', 'Perempuan', 'Semarang', '1999-08-01', '24 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2022-12-28', '2022-12-28', '2 Th ', '', 'Dk. Kedungpani Rt. 001Rw. 002 Pesantren Mijen Semarang', '', '', '', '', 'KONTRAK', '12042299', '284e2b120281d557782501e2ea388521', 'woman.png', 0),
(5889, '12052295', 'IMA OCTAVIANA', '', '', 'Perempuan', 'Semarang', '1995-10-29', '28 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2022-12-28', '2022-12-28', '2 Th ', '', 'Jl. Bukit Beringin Asri V-A/131 Rt. 003 Rw. 006 Gondoriyo Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12052295', '7f5424a51c3e46d012293d0db177c7ce', 'woman.png', 0),
(5890, '12062288', 'VINA INDRIANA', '', '', 'Perempuan', 'Kendal', '1988-09-01', '35 Th 9 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2022-12-28', '2022-12-28', '2 Th ', '', 'Perumahan Kaliwungu Indah Blok G 95/45 Rt. 005 Rw. 011 Protomulyo Kaliwungu Selatan Kendal', '', '', '', '', 'KONTRAK', '12062288', '0260b29bd95647fd4de2af81da7e929f', 'woman.png', 0),
(5891, '12082393', 'SHEILA MUFIDA ARIYANTI', '', '', 'Perempuan', 'Bojonegoro', '1993-09-07', '30 Th 9 bln', NULL, NULL, NULL, 'KOORDINATOR BAGIAN UMUM', 'IPSRS', '2023-01-02', '2023-01-02', '1 Th ', '', 'Forest Hill G2 No. 5 Rt 003 Rw 006 Pesantren Mijen Semarang', '', '', '', '', 'KONTRAK', '12082393', 'bd75664bc689edfcd8015a75692f5b5b', 'woman.png', 0),
(5892, '12092300', 'AYU WULANDARI', '', '', 'Perempuan', 'Jaya Bhakti', '2000-01-01', '24 Th 5 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IBS', '2023-02-13', '2023-02-13', '1 Th ', '', 'Dusun III Rt 003 Rw 000 Jaya Bhakti Tuah Negeri Musi Rawas', '', '', '', '', 'KONTRAK', '12092300', 'f65f28510a6a47ab9c7e42cd28231668', 'woman.png', 0),
(5893, '12102301', 'YUSUF RAFI ALFIAN', '', '', 'Laki-laki', 'Pemalang', '2001-10-22', '22 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'REKAM MEDIS', '2023-02-20', '2023-02-20', '1 Th ', '', 'Paduraksa Rt 002 Rw 004 Paduraksa Pemalang', '', '', '', '', 'KONTRAK', '12102301', '2e2f298ff8ca8891a4d2a6683a30b737', 'man.png', 0),
(5894, '12112301', 'WIDIA PANGESTUTIK', '', '', 'Perempuan', 'Kabupaten Semarang', '2001-07-10', '22 Th 11 bl', NULL, NULL, NULL, 'PELAKASANA REKAM MEDIS', 'REKAM MEDIS', '2023-03-08', '2023-03-08', '1 Th ', '', 'Karangsari Rt. 003 Rw. 010 Kupang Ambarawa Kab. Semarang', '', '', '', '', 'KONTRAK', '12112301', 'ddcd8adfef9a837a871218ba3736bde5', 'woman.png', 0),
(5895, '12122301', 'YANITA SRI MULYANI', '', '', 'Perempuan', 'Semarang', '2001-06-18', '23 tahun 0 ', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2023-03-08', '2023-03-08', '1 Th ', 'DIII', 'KP UMRES BESAR 85 DADAPSARI', '', 'maulanafajar752@gmail.com', '081902862988', 'Belum Kawin', 'KONTRAK', '12122301', '113d428f6e00d3c6420220df16c473c9', 'woman.png', 0),
(5896, '12152395', 'OLGA SILVI ALVIARA', '', '', 'Perempuan', 'Semarang', '1995-12-01', '28 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2023-03-20', '2023-03-20', '1 Th ', '', 'Bukit Jatisari Indah Blok C 3 No. 7 Rt. 008 Rw. 007 Jatisari Mijen Semarang', '', '', '', '', 'KONTRAK', '12152395', '05931e239df6e3c75bb2270df49cfb85', 'woman.png', 0),
(5897, '12172301', 'HILYATUL AULIYA', '', '', 'Perempuan', 'semarang', '2001-02-11', '23 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA PERAWAT GIGI', 'POLIKLINIK', '2023-04-01', '2023-04-01', '1 Th ', '', 'Ngabean Rt. 002 Rw. 004 Gubungpati Semarang', '', '', '', '', 'KONTRAK', '12172301', '00507a677b72befaa676b2dabec40418', 'woman.png', 0),
(5898, '12192301', 'AINNA LAILI RAHMA', '', '', 'Perempuan', 'Kendal', '2001-04-08', '23 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2023-04-01', '2023-04-01', '1 Th ', '', 'Ds. Nolokerto Rt. 001 Rw. 005 Kaliwungu Kendal', '', '', '', '', 'KONTRAK', '12192301', 'b354b20690cf73aeea3eb5a61fc8c356', 'woman.png', 0),
(5899, '12202397', 'DR. NOVITA PERMATASARI WIHARJO', '', '', 'Perempuan', 'Banyumas', '1997-11-04', '26 Th 7 bln', NULL, NULL, NULL, 'KEPALA SEKSI PELAYANAN MEDIS', 'PELAYANAN MEDIS', '2023-05-02', '2023-04-11', '1 Th ', '', 'Perum Graha Padma L5/7 Tambakharjo Semarang Barat Semarang', '', '', '', '', 'KONTRAK', '12202397', '34afec4fe356959188ccfd798775d5d1', 'woman.png', 0),
(5900, '12222393', 'DR. SAPHIRA AYU SUWANTARI, M.Sc. Sp. A', '', '', 'Perempuan', 'Surabaya', '1993-09-09', '30 Th 9 bln', NULL, NULL, NULL, 'DOKTER SPESIALIS ANAK', 'PELAYANAN MEDIS', '2023-05-02', '2023-05-02', '1 Th ', '', 'Perum BPI Blok B-7A Rt 001 Rw. 010 Purwoyoso Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12222393', '854655f6d4f3cd8a81dd28a2e86f6cf8', 'woman.png', 0),
(5901, '12242398', 'ANGGI NURAENI', '', '', 'Perempuan', 'Sleman', '1998-05-01', '26 Th 1 bln', '1', '2', '18', 'PELAKSANA PERAWAT', 'IBS', '2023-05-22', '2023-05-22', '1 Th ', '', 'Jl. Plumbon Wonosari Rt. 005 Rw. 003 Wonosari Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12242398', '195545f0d0de17c9ab811deb58824cb6', 'woman.png', 0),
(5902, '12262398', 'ADELIA MUTIARA DEWI', '', '', 'Perempuan', 'Salatiga', '1998-09-15', '25 Th 8 bln', '1', '2', '1', 'PELAKSANA PERAWAT', 'PERISTI', '2023-06-01', '2023-06-01', '1 Th ', '', 'Jl. Candi Pawon Selatan IX Rt. 009 Rw. 001 Kalipancur Ngaliyan Semarang', '', 'maulanafajar752@gmail.com', '08980022735', '', 'KONTRAK', '12262398', '103bf7b303a069c3af65b6d0b9181bb6', '68ccb54ce5b98_23919322_6837107.jpg', 0),
(5903, '12282399', 'ASMAHAN NABILA PRADESTI', '', '', 'Perempuan', 'Kudus', '1999-12-13', '24 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2023-06-01', '2023-06-01', '1 Th ', '', 'Jl. Sri Rejeki Timur VII Rt. 006 Rw. 006 Gisikdrono Semarang', '', '', '', '', 'KONTRAK', '12282399', 'c8c88620e59c17d5834ffa7601e3b7ea', 'woman.png', 0),
(5904, '12292395', 'DR. HANIFAH RIZKI NUGRAHENI', '', '', 'Perempuan', 'Kendal', '1995-11-10', '28 Th 7 bln', NULL, NULL, NULL, 'KA. INS RAWAT JALAN', 'PELAYANAN MEDIS', '2023-06-05', '2023-06-05', '1 Th ', '', 'Pondok Bukit Agung K/I Sumurbroto Banyumanik // Dsn. Rowosari Rt. 003 Rw. 005 Meteseh Boja Kendal', '', '', '', '', 'KONTRAK', '12292395', '9134fae3054c83fdb7957d200aea0c1c', 'woman.png', 0),
(5905, '12302300', 'MARLINDA WIDYA QONITAH', '', '', 'Perempuan', 'Semarang', '2000-03-31', '24 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA CASEMIX', 'REKAM MEDIS', '2023-06-15', '2023-06-15', '1 Th ', '', 'Jl. Sri Rejeki II Rt. 003 Rw. 002 No. 4 Kalibanteng Kidul Semarang Barat', '', '', '', '', 'KONTRAK', '12302300', 'e6d3f16bb2a515595f9cd1807cace3ed', 'woman.png', 0),
(5906, '12312385', 'DR. NDARU KARTYKA SARI', '', '', 'Perempuan', 'Semarang', '1985-09-11', '38 Th 8 bln', NULL, NULL, NULL, 'DR. SP.PK / KA.INS LABORAT', 'PELAYANAN MEDIS', '2023-07-01', '2023-07-01', '1 Th ', '', 'Pakintelan Gunungpati Rt.001 Rw.001 No. 30 Semarang', '', '', '', '', 'KONTRAK', '12312385', 'f5603febb7d06af79f2808d68c098c80', 'woman.png', 0),
(5907, '12322301', 'TUPLIKHATUN', '', '', 'Perempuan', 'Brebes', '2001-01-24', '23 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA RM', 'REKAM MEDIS', '2023-07-01', '2023-07-01', '1 Th ', '', 'Jl. Randu Garut No.41 Rt.004 Rw.001 Tugu Semarang', '', '', '', '', 'KONTRAK', '12322301', 'b1b1d6205f9ac282bce2e75a0a3ea6d4', 'woman.png', 0),
(5908, '12332396', 'HANIFAH PUTRI RAHMAWATI', '', '', 'Perempuan', 'Semarang', '1996-09-13', '27 Th 8 bln', '1', '2', '8', 'PELAKSANA PERAWAT', 'RAMA SHINTA', '2023-07-01', '2023-07-01', '1 Th ', '', 'Jangli Tlawah Rt. 004 Rw. 005 Karanganyar Gunung Candisari Semarang', '', '', '', '', 'KONTRAK', '12332396', '1d5d5158771536c7762f51983946cf32', 'woman.png', 0),
(5909, '12342398', 'SITI AMINAH', '', '', 'Perempuan', 'Semarang', '1998-10-07', '25 Th 8 bln', '1', '2', '', 'PELAKSANA PERAWAT', 'POLIKLINIK', '2023-07-01', '2023-07-01', '1 Th ', '', 'Kp. Tegalrejo Rt. 006 Rw. 013 Tambakaji Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12342398', '88b361210e2de8dd55d05f881eebd650', 'woman.png', 0),
(5910, '12352396', 'GAMPANG FAJAR NUR HARDIYANA', '', '', 'Laki-laki', 'Boyolali', '1996-11-29', '27 Th 6 bln', '1', '2', '1', 'PELAKSANA PERAWAT', 'ARIMBI', '0000-00-00', '0000-00-00', '1 Th ', '', 'Wonosari Rt. 002 Rw. 010 Wonosari Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12352396', '9ee640c27ccaa3e6b8eeeba36f69bdca', 'man.png', 0),
(5911, '12372399', 'NOVIANA DEWI SETIAWATI', '', '', 'Perempuan', 'Kendal', '1999-11-18', '24 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA RM', 'REKAM MEDIS', '2023-08-01', '2023-08-01', '1 Th ', '', 'Dk. Pugowati Rt. 006 Rw. 001 Ds. Margomulyo Pegandon Kendal', '', '', '', '', 'KONTRAK', '12372399', '6e17bc7804c25872342fde8390d3b993', 'woman.png', 0),
(5912, '12382301', 'DESTYARA SALSABILA RAMADHANI', '3374095412010003', '', 'Perempuan', 'Semarang', '2001-12-14', '22 Th 5 bln', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2023-08-01', '2023-08-01', '1 Th ', 'SMA', 'Jatisari elok blok f/15 rt 02/08 jatisari mijen', '', '', '081328857067', 'Belum Kawin', 'KONTRAK', '12382301', '537a54a7f3983ed19322db09ab9fd28a', '66bd89bfbf3bd_IMG-20230905-WA0003.jpg', 0),
(5913, '12392391', 'BINTANG PURWITASARI', '', '', 'Perempuan', 'Semarang', '1991-08-16', '32 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA APOTEKER', 'FARMASI', '2023-10-03', '2023-10-03', '1 Th ', '', 'Perum Griya Margosari Blok B-9 Rt. 007 Rw. 008 Sawah Besar Gayamsari Semarang', '', '', '', '', 'KONTRAK', '12392391', 'a8be1ead22d01b775e946231602d63f3', 'woman.png', 0),
(5914, '12402392', 'ARIS WIBOWO', '', '', 'Laki-laki', 'Semarang', '1992-04-27', '32 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2023-10-03', '2023-10-03', '1 Th ', '', 'Jl. Panda Utara II Rt. 008 Rw. 005 Palebon Pedurungan Semarang', '', '', '', '', 'KONTRAK', '12402392', '2fedd1327759cbbf7e2bce5ecc1773e7', 'man.png', 0),
(5915, '12412397', 'DR. IVAN PRATAMA RUSADI', '', '', 'Laki-laki', 'Semarang', '1997-04-12', '27 Th 1 bln', NULL, NULL, NULL, 'DOKTER UMUM', 'PELAYANAN MEDIS', '2023-12-01', '2023-12-01', '1 Th ', '', 'Perum Pandana Merdeka Blok S-5 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12412397', 'fd38ae23cb752578fcc35796b764e234', 'man.png', 0),
(5916, '12422385', 'INDRI DESVITA ARIYANTI', '', '', 'Perempuan', 'Ambon', '1985-12-01', '38 Th 6 bln', '1', '2', '18', 'PELAKSANA PERAWAT', 'IGD', '2023-12-18', '2023-12-18', '1 Th ', '', 'Perum Kaliwungu Indah Rt.005 Rw.010 Protomulyo Kaliwungu Selatan Kendal', '', '', '', '', 'KONTRAK', '12422385', '6d8c2805604ed27726b45faebe288acb', 'woman.png', 0),
(5917, '12432302', 'RETNO WINARSIH', '', '', 'Perempuan', 'Kendal', '2002-10-08', '21 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2023-12-18', '2023-12-18', '1 Th ', '', 'Ds. Krajan Rt. 003 Rw. 002 Bebengan Boja Kendal', '', '', '', '', 'KONTRAK', '12432302', 'cce3e4685b5eec2ffa578431f4d2b3ee', 'woman.png', 0),
(5918, '12442302', 'NABILAH IDHA', '', '', 'Perempuan', 'Kabupaten Semarang', '2002-02-22', '22 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2023-12-18', '2023-12-18', '1 Th ', '', 'Perum Jatisari Asabri D5/12B Rt.001 Rw.010 Mijen Semarang', '', '', '', '', 'KONTRAK', '12442302', 'f57d567eeb833fa75bad740924ba57e7', 'woman.png', 0),
(5919, '12452300', 'NISA AULIA VIRGY AGUSTINA SUSILO', '', '', 'Perempuan', 'Semarang', '2000-08-30', '23 Th 9 bln', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2023-12-20', '2023-12-20', '1 Th ', '', 'Brayo Timur Rt. 001 Rw. 003 Kertosari Singorojo Kendal', '', '', '', '', 'KONTRAK', '12452300', '45c8dd0c935124da5dc8d7a7e407ec19', 'woman.png', 0),
(5920, '12462301', 'MUYASYAROH', '', '', 'Perempuan', 'Semarang', '2001-08-08', '22 Th 10 bl', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2023-12-20', '2023-12-20', '1 Th ', '', 'Jl. Nusa Indah II Rt.03 Rw.005 Tambakaji Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12462301', '32b0f8dd93ed308246e385695df64ed0', 'woman.png', 0),
(5921, '12472391', 'RACHMA APRILIYANTI', '', '', 'Perempuan', 'Semarang', '1991-04-03', '33 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ICU', '2023-12-28', '2023-12-28', '1 Th ', '', 'Wonolopo Rt.002 Rw.004 Mijen Semarang', '', '', '', '', 'KONTRAK', '12472391', '5d0778c6cab9d400680b6f5ed0fe3703', 'woman.png', 0),
(5922, '12482300', 'FATIKAH NURUL JANAH', '', '', 'Perempuan', 'Kendal', '2000-09-11', '23 Th 8 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2023-12-28', '2023-12-28', '1 Th ', '', 'Jl. Kyai Aluwi Rt.002 Rw.005 Pegandon Kendal', '', 'reveh37792@etenx.com', '4548745484', '', 'KONTRAK', '12482300', 'f1d9c75b54e70fe7e0461bd6860e6c71', '68ddd7b40dca3_SITI ZUBAIDAH.jpeg', 0),
(5923, '12492393', 'MIRNA AYU', '', '', 'Perempuan', 'Kendal', '1993-03-29', '31 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2023-12-28', '2023-12-28', '1 Th ', '', 'Jl. Kusuma Bangsa Perum Sub Inti Gang 1 Rt.001 Rw.009 Pekalongan\\', '', '', '', '', 'KONTRAK', '12492393', 'e3e810abc1257384b2ba64f90397e504', 'woman.png', 0),
(5924, '12502397', 'SITI PANDELUN', '', '', 'Perempuan', 'Kendal', '1997-05-04', '27 Th 1 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2023-12-28', '2023-12-28', '1 Th ', '', 'Ds. Dadapan Rt. 001 Rw. 004 Singorojo Kendal', '', '', '', '', 'KONTRAK', '12502397', '5f0ac24c8b0450598c5f8a52fd76d1c3', 'woman.png', 0),
(5925, '12512397', 'RIA RIZKY ELLIDA LILIANA PUTRI', '', '', 'Perempuan', 'Semarang', '1997-11-24', '26 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'DEWI KUNTHI', '2023-12-28', '2023-12-28', '1 Th ', '', 'Tambakaji Rt.012 Rw.001 Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12512397', 'd966563cd68aec4abd4a84dffa8dbe41', 'woman.png', 0),
(5926, '12522398', 'ERTHA GILANG MUNITHA NINGSIH', '', '', 'Perempuan', 'Madiun', '1998-08-26', '25 Th 9 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2023-12-28', '2023-12-28', '1 Th ', '', 'Jl. Pelem Golek Rt. 006 Rw. 002 Tambakaji Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12522398', 'cf993bbb816a27e175b86baf0cf67c26', 'woman.png', 0),
(5927, '12532402', 'FARIDHOTUL IZZA', '', '', 'Perempuan', 'Demak', '2002-11-27', '21 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'ARIMBI', '2024-01-02', '2024-01-02', '0 Th ', '', 'Cangkring Rt.006 Rw.002 Katonsari Demak', '', '', '', '', 'KONTRAK', '12532402', '7ea2b5d335a7a63038fb9459b12b7543', 'woman.png', 0),
(5928, '12542497', 'NELA SAGITHA DEVI', '', '', 'Perempuan', 'Semarang', '1997-07-14', '26 Th 10 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-01-02', '2024-01-02', '0 Th ', '', 'Jl. Beringin Asri Barat 6/658 Rt.010 Rw.011 Wonosari Ngaliyan Semarang', '', '', '', '', 'KONTRAK', '12542497', '2ea17ba28381eb4a1a70ca67ab142b55', 'woman.png', 0),
(5929, '12552400', 'NUR KHAKIM', '', '', 'Laki-laki', 'Semarang', '2000-11-19', '23 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2024-01-02', '2024-01-02', '0 Th ', '', 'Mangkang Kulon Rt. 004 Rw. 005 Tugu Semarang', '', '', '', '', 'KONTRAK', '12552400', '0789f2b14b19c2ef21d5f90669384a46', 'man.png', 0),
(5930, '12562404', 'SADAM ALI GHUFFRON', '', '', 'Laki-laki', 'Kendal', '2004-02-13', '20 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2024-01-02', '2024-01-02', '0 Th ', '', 'Ds. Campurejo Rt.003 Rw.004 Boja Kendal', '', '', '', '', 'KONTRAK', '12562404', 'ec88bc74de678c164fb6dd52995e71ca', 'man.png', 0),
(5931, '12572402', 'FERDI WIJAYA YUDHA', '', '', 'Laki-laki', 'Semarang', '2002-03-30', '22 Th 2 bln', NULL, NULL, NULL, 'PELAKSANA HOUSEKEEPING', 'HOUSEKEEPING', '2024-01-15', '2024-01-15', '0 Th ', '', 'Jl. Karang Kimpul Rt. 004 Rw. 001 Tambakrejo Gayamsari Semarang', '', '', '', '', 'KONTRAK', '12572402', 'fcd58b4b65c108b846d54e6279f1f104', 'man.png', 0),
(5932, '12582499', 'DIAN FITRIANI', '', '', 'Perempuan', 'Semarang', '1999-01-21', '25 Th 4 bln', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2024-01-17', '2024-01-17', '0 Th ', '', 'Jl. Borobudur Raya V Rt. 010 Rw. 011 Kembangarum Semarang Barat Semarang', '', '', '', '', 'KONTRAK', '12582499', 'ef181e82e2476c95f75de645f576d3c3', 'woman.png', 0),
(5933, '12592497', 'IDVAN LUTHFI', '', '', 'Laki-laki', 'Kab. Semarang', '1997-02-16', '27 Th 3 bln', NULL, NULL, NULL, 'PELAKSANA FISIOTERAPI', 'FISIOTERAPI', '0000-00-00', '0000-00-00', '0 Th ', '', 'Ds. Karangkepoh Rt. 015 Rw.006 Pager Kaliwungu Kab Semarang', '', '', '', '', 'KONTRAK', '12592497', '23dd3615a6df20a3c273a673b9887f1b', 'man.png', 0),
(5934, '12602499', 'MOCHAMAD DAFA IKHSANA', '', '', 'Laki-laki', 'Grobogan', '1999-10-31', '24 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'IGD', '2024-02-21', '2024-02-21', '0 Th ', '', 'Karang Malang Kidul Rt. 001 Rw. 006 Sumbersari Ngampel Kendal', '', '', '', '', 'KONTRAK', '12602499', 'f4e263b796a28c8919095ce318770d77', 'man.png', 0),
(5935, '12612490', 'WIDIARTINI', '', '', 'Perempuan', 'Kendal', '1990-05-18', '34 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-02-21', '2024-02-21', '0 Th ', '', 'Padepokan Ganesa Blok-G No. 6 Rt. 010 Rw. 009 Pandean Lamper Gayamsari', '', '', '', '', 'KONTRAK', '12612490', '4a600ffe0004e4f6981810252d68ef45', 'woman.png', 0),
(5936, '12642495', 'DHITA RISKYANA', '', '', 'Perempuan', 'Semarang', '1995-12-20', '28 Th 5 bln', NULL, NULL, NULL, 'SUB. BAG. MOBILISASI DANA', 'KEUANGAN', '2024-03-01', '2024-03-01', '0 Th ', '', 'Pandawa Residence A77, Mijen', '', '', '', '', 'KONTRAK', '12642495', 'c5d36d0cda89d547b9df041c936fba12', 'woman.png', 0),
(5937, '12662482', 'SANA ARIZA', '', '', 'Perempuan', 'Semarang', '1982-11-10', '41 Th 7 bln', NULL, NULL, NULL, 'SEKRETARIS', 'SEKRETARIAT', '2024-03-01', '2024-03-01', '0 Th ', '', 'Jl. Dewi Sartika Barat I No. 88, Semarang', '', '', '', '', 'KONTRAK', '12662482', 'd9e141dc85e6e75b6046f329f1a12e47', 'woman.png', 0),
(5938, '12702400', 'NAILA \'IZZANA KAMILA', '', '', 'Perempuan', 'Semarang', '2000-05-25', '24 Th 0 bln', NULL, NULL, NULL, 'KOOR. ADMINISTRASI KEPEGAWAIAN', 'HRD', '2024-04-01', '2024-04-01', '0 Th ', '', 'Pancakarya Blok 15/105, Rejosari, Semarang Timur, Kota Semarang', '', '', '', '', 'KONTRAK', '12702400', '742f51974993f73efee7e517088005a5', 'woman.png', 0),
(5939, '12712497', 'FAJAR MAULANA SHIDIQ', '3324162811970001', 'Islam', 'Laki-laki', 'Madiun', '1997-11-28', '26 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA IT', 'DEWI KUNTHI', '2024-04-01', '2024-04-01', '0 Th ', 'DIII', 'Desa Tanjungan RT 3 RW 2, Rowosari, Kab. Kendal', 'sdfsdfsdfsdfsdfsdf', 'maulanafajar751@gmail.com', '08980022735', 'Belum Kawin', 'KONTRAK', 'fajar4561', '053c8bfe77faa40b4d20f680daabd064', '68ce05f42a9d4_23919322_6837107.jpg', 1),
(5940, '12722401', 'ENGGI ANDINI', '', '', 'Perempuan', 'Kendal', '2001-04-08', '23 Th 2 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-04-03', '2024-04-03', '0 Th ', '', 'Tabet RT 002 RW 003, Tabet, Limbangan, Kab Kendal ', '', '', '', '', 'KONTRAK', '12722401', '527cf129c41ddb4c2be63671176b2965', '668e0bea0301b_DE8E7B46-25C2-4F99-8759-6BEBB463BD65.jpeg', 0),
(5941, '12732497', 'PANJI AGUNG NUGRAHA', '', '', 'Laki-laki', 'Bandung', '1997-03-05', '27 Th 3 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-04-03', '2024-04-03', '0 Th ', '', 'Wonosari RT 004 RW 009, Wonosari, Ngaliyan, Kota Semarang', '', '', '', '', 'KONTRAK', '12732497', 'b21e0daef81e307b105ba0b7595b98ac', 'man.png', 0),
(5942, '12742478', 'PURYANINGSIH', '', '', 'Perempuan', 'Kendal', '1978-05-07', '46 Th 1 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2004-04-24', '2004-04-24', '0 Th ', '', 'Jatisari Asabri D-6 No. 34 RT 009 RW 010, Jatisari, Mijen, Kota Semarang', '', '', '', '', 'KONTRAK', '12742478', '5acb6c3ca7b2337d0f05141321defcc3', 'woman.png', 0),
(5943, '12752492', 'VIRONIKA WIDYASTUTI', '', '', 'Perempuan', 'CILACAP', '1992-03-21', '32 Th 2 bln', NULL, NULL, NULL, 'KOORDINATOR PAJAK & TARIF', 'KEUANGAN', '0000-00-00', '0000-00-00', '0 Th ', '', 'Walikukun RT 008 RW 004, Japanan, Cawas, Kabupaten Klaten', '', '', '', '', 'KONTRAK', '12752492', '6295ed1b16fccb3bc3aede09f29528f9', 'woman.png', 0),
(5944, '12762401', 'DESI RATNA AMINAH', '', '', 'Perempuan', 'KENDAL', '2001-12-10', '22 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA KASIR', 'KASIR', '2015-04-24', '2015-04-24', '0 Th ', '', 'Montong Kulon RT 002 RW 005, Montongsari, Weleri, Kab Kendal', '', '', '', '', 'KONTRAK', '12762401', '4dcd859194feaedcc3d7c1dab4ad8800', 'woman.png', 0),
(5945, '12772497', 'FANNY UMAYA VANOPKA', '', '', 'Perempuan', 'SEMARANG', '1997-11-18', '26 Th 6 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2017-04-24', '2017-04-24', '0 Th ', '', 'Wonosari RT 004 RW 009, Wonosari, Ngaliyan, Kota Semarang', '', '', '', '', 'KONTRAK', '12772497', 'bbd45e598c610c21cb10b5429d4ad527', 'woman.png', 0),
(5946, '12782496', 'JEFRY ANDRYANSYAH', '', '', 'Laki-laki', 'PAYAKUMBUH', '1996-10-11', '27 Th 7 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2017-04-24', '2017-04-24', '0 Th ', '', 'Padang Tinggi Piliang RT 002 RW 002, Padang Tinggi Piliang, Payakumbuh Barat, Kota Payakumbuh', '', '', '', '', 'KONTRAK', '12782496', '28a1177c91979e40cf54d73ac9efcc37', 'man.png', 0),
(5947, '12792498', 'AYUB IBADURROHMAN', '', '', 'Laki-laki', 'SUKOHARJO', '1998-05-31', '26 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '0000-00-00', '0000-00-00', '0 Th ', '', 'Ngabean RT 002 RW 001, Jetis, Sukoharjo, Kabupaten Sukoharjo', '', '', '', '', 'KONTRAK', '12792498', '76800704457b25158e0ce996f7d98507', 'man.png', 0),
(5948, '12802400', 'ELVIN ANGGRIANTI', '', '', 'Perempuan', 'BLORA', '2000-05-31', '24 Th 0 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2017-04-24', '2017-04-24', '0 Th ', '', 'Dukuh Plosorejo RT 007 RW 002, Srigading, Ngawen, Kabupaten Blora', '', '', '', '', 'KONTRAK', '12802400', 'dfd3ebd5a08b57dbab814bb42462cff2', 'woman.png', 0),
(5949, '12812499', 'LAYLA NUR AZIZAH', '', '', 'Perempuan', 'JEPARA', '1999-10-08', '24 Th 8 bln', NULL, NULL, NULL, 'PELAKSANA PENDAFTARAN', 'PENDAFTARAN', '2018-04-24', '2018-04-24', '0 Th ', '', 'Krasak RT 004 RW 004, Krasak, Pecangaan, Kabupaten Jepara', '', '', '', '', 'KONTRAK', '12812499', '7595e152be0fc87df1c0db29c7c97a0e', '668f87ebe595c_Foto L.pdf', 0),
(5950, '12822496', 'DEWI ASTUTI', '', '', 'Perempuan', 'Grobogan', '1996-10-31', '27 Th 7 bln', NULL, NULL, NULL, 'PELAKSANA TTK', 'FARMASI', '2024-05-01', '2024-05-01', '0 Th ', '', 'Dusun Klatak RT 001 RW 005, Tlogomulyo, Gubug, Kabupaten Grobogan', '', '', '', '', 'KONTRAK', '12822496', '7947080aa6dea4a44c200b14b3fdd55d', 'woman.png', 0),
(5951, '12832402', 'KHUSNUL KHOTIMAH', '', '', 'Perempuan', 'KENDAL', '2002-07-06', '21 Th 11 bl', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-05-25', '2024-05-25', '0 Th ', '', 'Desa Sukolilan RT 002 RW 001, Sukolilan, Patebon, Kabupaten Kendal', '', '', '', '', 'KONTRAK', '12832402', '923bf53065c3f24a4f8fd28e76ba6bd4', 'woman.png', 0),
(5952, '12842498', 'INDAH PUJI AMBARWATI', '', '', 'Perempuan', 'SEMARANG', '1998-09-01', '25 Th 9 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-05-25', '2024-05-25', '0 Th ', '', 'Ngadirgo RT 008 RW 004, Ngadirgo, Mijen, Kota Semarang', '', '', '', '', 'KONTRAK', '12842498', 'f4b68bb511da371cfeb49c66e799afed', 'woman.png', 0),
(5953, '12852400', 'NAVIATUL FADILLA NURROHMAH', '', '', 'Perempuan', 'SEMARANG', '2000-02-08', '24 Th 4 bln', '1', '2', NULL, 'PELAKSANA PERAWAT', 'KEPERAWATAN', '2024-05-25', '2024-05-25', '0 Th ', '', 'Kedungpane RT 001 RW 010, Ngaliyan, Ngaliyan, Kota Semarang', '', '', '', '', 'KONTRAK', '12852400', 'c14b027d0ab9860ba9ea091678867975', 'woman.png', 0),
(5954, '12872481', 'TAUFIQ PURNOMO', '3374162505810001', '', 'Laki-laki', 'SEMARANG', '1981-05-25', '43 Th 1 bln', NULL, NULL, NULL, 'PELAKSANA SEKURITY', 'SECURITY', '2024-06-14', '2024-06-14', '0 Th 0 bln', 'SMA', 'Randugarut RT 001 RW 001, Randugarut, Tugu, Kota Semarang', '', '', '0', '--- Pilih Status Perkawinan ---', 'KONTRAK', '12872481', '28b4ee652527136a9485ac015e0acfdf', 'man.png', 0),
(5955, '12862494', 'IKE NURJANAH', '1404124709850003', '', 'Perempuan', 'PATI', '1994-07-09', '29 Th 11 bl', NULL, NULL, NULL, 'KOORDINATOR PIUTANG/PERBANTUAN KEBAG. KEUAN', 'KEUANGAN', '2024-06-10', '2024-06-10', '0 Th 0 bln', 'SI', 'Jl. Pucang Santoso Tengah V No. 20 RT 011 RW 030, Batursari, Mranggen, Kabupaten Demak\r\n', '', '', '0', 'Kawin', 'KONTRAK', '12862494', 'f648f228b48195dbc9a9036beeac6293', 'woman.png', 0),
(5956, '12882404', 'NINTYARA AULIA PUTRI', '3374086206040001', '', 'Perempuan', 'SEMARANG', '2004-06-22', '20 Th 0 bln', NULL, NULL, NULL, 'PELAKSANA ADMINISTRASI', 'FARMASI', '2024-06-20', '2024-06-20', '0 Th 0 bln', 'SI', 'Jatisari Elok Blok F/15 RT 002 RW 008, Jatisari, Mijen, Kota Semarang\r\n', '', '', '0', 'Belum Kawin', 'KONTRAK', '12882404', '52b0144c0a3f8bc71a1b791d56d9ffd2', 'woman.png', 0),
(5957, '12892402', 'FITRI NURUL AENI ', '3329045612020003', '', 'Perempuan', 'BREBES', '2002-12-16', '21 Th 6 bln', NULL, NULL, NULL, 'PELAKSANA ANALIS', 'LABORATORIUM', '2024-06-27', '2024-06-27', '0 Th 0 bln', 'SI', 'Dk. Krajan RT 003 RW 004, Pakujati, Paguyangan, Kabupaten Brebes', '', '', '0', 'Belum Kawin', 'KONTRAK', '12892402', '2f0cd4836166072440207af778b7dd48', '668e05e696081_edit-removebg.png', 0),
(5958, '12902499', 'DR. AFIFAH NUR FAHADA', '3374106704990004', '', 'Perempuan', 'SEMARANG', '1999-04-27', '25 Th 2 bln', NULL, NULL, NULL, 'DOKTER UMUM', 'PELAYANAN MEDIS', '2024-07-01', '2024-07-01', '0 Th 0 bln', 'SI', 'Bumi Wanamukti B-4/18 RT 010 RW 004, Sambiroto, Tembalang, Kota Semarang\r\n', '', '', '0', 'Belum Kawin', 'KONTRAK', '12902499', '0509c0bbc1b30bb211add4149a5d34cb', 'woman.png', 0),
(5959, '12922401', 'HANIFA SALSABILA', '3327084101010041', 'Perempuan', 'Islam', 'PEMALANG', '2001-01-01', '23 Th 7 bln', NULL, NULL, NULL, 'AHLI GIZI', 'GIZI', '2024-08-01', '2024-08-01', '0 Th 0 bln', 'SI', 'Sungapan RT 003 RW 003, Sungapan, Pemalang, Kabupaten Pemalang\r\n', '', '', '0', 'Belum Kawin', 'KONTRAK', '12922401', '58fca866e0a7fb439b82268c2e215d3b', 'woman.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_jabatan`
--

CREATE TABLE `pegawai_jabatan` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_jabatan`
--

INSERT INTO `pegawai_jabatan` (`id`, `nopeg`, `jabatan`) VALUES
(10, '', 'Pembantu HUMAS'),
(11, '', 'SIMRS');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `faktur` varchar(100) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `berkas` varchar(1000) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id`, `kode_transaksi`, `tgl_transaksi`, `suplier`, `faktur`, `total_pembelian`, `berkas`, `catatan`, `admin`) VALUES
(1, '20241119001', '2024-11-19', 'Ruko Manajemen', '2222', 1000000, '', '', '12712497'),
(2, '20241123001', '2024-11-23', 'dsfsdfsdfsdf', '', 1000000, '', '', '12712497'),
(3, '20241123002', '2024-11-23', 'Ruko Manajemen', '2222', 5000000, '', '', '12712497');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kredensial`
--

CREATE TABLE `pengajuan_kredensial` (
  `id` int(11) NOT NULL,
  `kode_pengajuan` varchar(100) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `jenjang_diajukan` varchar(100) NOT NULL,
  `validator` varchar(100) DEFAULT NULL,
  `tgl_validasi` date DEFAULT NULL,
  `status_pengajuan` varchar(100) NOT NULL,
  `tgl_ujian` date DEFAULT NULL,
  `penguji` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_kredensial`
--

INSERT INTO `pengajuan_kredensial` (`id`, `kode_pengajuan`, `tgl_pengajuan`, `nopeg`, `unit`, `jenjang_diajukan`, `validator`, `tgl_validasi`, `status_pengajuan`, `tgl_ujian`, `penguji`) VALUES
(191, '20250919001', '2025-09-19 10:06:58', '12262398', 'PERISTI', '1', '12712497', '2025-09-30', 'selesai', '2025-10-31', '12712497'),
(192, '20250920001', '2025-09-20 09:47:44', '11362295', 'ARIMBI', '1', NULL, NULL, 'menunggu', NULL, NULL),
(193, '20251002001', '2025-10-02 08:59:38', '12482300', 'KEPERAWATAN', '2', '12712497', '2025-10-02', 'selesai', '2025-10-31', '12712497'),
(194, '20251017001', '2025-08-17 21:08:51', '11882297', 'POLIKLINIK', '4', '12712497', '2025-10-17', 'selesai', '2025-10-31', '12712497'),
(195, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(196, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(197, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(198, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(199, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(200, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(201, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(202, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(203, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(204, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(205, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(206, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(207, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(208, '', '2025-10-18 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(209, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(210, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(211, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(212, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(213, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(214, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(215, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(216, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(217, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(218, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(219, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(220, '', '2025-10-01 13:02:09', '', NULL, '', NULL, NULL, '', NULL, NULL),
(221, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(222, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(223, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(224, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(225, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(226, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(227, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(228, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(229, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(230, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(231, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(232, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(233, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(234, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL),
(235, '', '2025-08-17 21:08:51', '', NULL, '', NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kredensial_detail`
--

CREATE TABLE `pengajuan_kredensial_detail` (
  `id` int(11) NOT NULL,
  `kode_pengajuan` varchar(50) NOT NULL,
  `nopeg` varchar(50) NOT NULL,
  `id_rkk` varchar(20) NOT NULL,
  `jenis_kewenangan` varchar(100) NOT NULL,
  `id_jenis_kewenangan` varchar(100) NOT NULL,
  `penilaian` varchar(100) NOT NULL,
  `status_pengajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_kredensial_detail`
--

INSERT INTO `pengajuan_kredensial_detail` (`id`, `kode_pengajuan`, `nopeg`, `id_rkk`, `jenis_kewenangan`, `id_jenis_kewenangan`, `penilaian`, `status_pengajuan`) VALUES
(1362, '20250919001', '12262398', '1', 'mandiri', '218', '1', 'selesai'),
(1363, '20250919001', '12262398', '1', 'mandiri', '219', '1', 'selesai'),
(1364, '20250919001', '12262398', '1', 'mandiri', '220', '1', 'selesai'),
(1365, '20250919001', '12262398', '1', 'mandiri', '221', '1', 'selesai'),
(1366, '20250919001', '12262398', '1', 'mandiri', '222', '1', 'selesai'),
(1367, '20250920001', '11362295', '1', 'supervisi', '218', '', 'menunggu'),
(1368, '20250920001', '11362295', '1', 'mandiri', '219', '', 'menunggu'),
(1369, '20250920001', '11362295', '1', 'mandiri', '220', '', 'menunggu'),
(1370, '20250920001', '11362295', '1', 'mandat', '221', '', 'menunggu'),
(1371, '20250920001', '11362295', '1', 'mandat', '222', '', 'menunggu'),
(1372, '20250920001', '11362295', '1', 'supervisi', '223', '', 'menunggu'),
(1373, '20250920001', '11362295', '1', 'mandat', '224', '', 'menunggu'),
(1374, '20250920001', '11362295', '1', 'mandiri', '225', '', 'menunggu'),
(1375, '20250920001', '11362295', '1', 'mandiri', '226', '', 'menunggu'),
(1376, '20250920001', '11362295', '1', 'mandiri', '227', '', 'menunggu'),
(1377, '20251002001', '12482300', '2', 'mandiri', '306', '1', 'selesai'),
(1378, '20251002001', '12482300', '2', 'supervisi', '307', '1', 'selesai'),
(1379, '20251002001', '12482300', '2', 'mandiri', '308', '1', 'mengulang'),
(1380, '20251002001', '12482300', '2', 'mandiri', '309', '1', 'selesai'),
(1381, '20251002001', '12482300', '2', 'mandat', '310', '1', 'mengulang'),
(1382, '20251002001', '12482300', '2', 'mandat', '311', '1', 'selesai'),
(1383, '20251002001', '12482300', '2', 'mandat', '312', '1', 'selesai'),
(1384, '20251002001', '12482300', '2', 'mandiri', '313', '1', 'selesai'),
(1385, '20251002001', '12482300', '2', 'supervisi', '314', '1', 'mengulang'),
(1386, '20251002001', '12482300', '2', 'supervisi', '315', '1', 'mengulang'),
(1387, '20251002001', '12482300', '2', 'supervisi', '296', '0', 'selesai'),
(1388, '20251002001', '12482300', '2', 'mandiri', '297', '1', 'selesai'),
(1389, '20251002001', '12482300', '2', 'kolaborasi', '298', '1', 'selesai'),
(1390, '20251002001', '12482300', '2', 'mandat', '299', '0', 'selesai'),
(1391, '20251002001', '12482300', '2', 'kolaborasi', '300', '1', 'selesai'),
(1392, '20251002001', '12482300', '2', 'mandat', '301', '0', 'selesai'),
(1393, '20251002001', '12482300', '2', 'mandiri', '302', '0', 'selesai'),
(1394, '20251002001', '12482300', '2', 'supervisi', '303', '1', 'selesai'),
(1395, '20251002001', '12482300', '2', 'mandiri', '304', '0', 'selesai'),
(1396, '20251002001', '12482300', '2', 'mandiri', '305', '1', 'selesai'),
(1397, '20251017001', '11882297', '4', 'supervisi', '351', '1', 'selesai'),
(1398, '20251017001', '11882297', '4', 'supervisi', '331', '1', 'selesai'),
(1399, '20251017001', '11882297', '4', 'mandiri', '332', '1', 'selesai'),
(1400, '20251017001', '11882297', '4', 'mandiri', '333', '1', 'selesai'),
(1401, '20251017001', '11882297', '4', 'mandiri', '334', '1', 'selesai'),
(1402, '20251017001', '11882297', '4', 'mandiri', '335', '1', 'selesai'),
(1403, '20251017001', '11882297', '4', 'mandiri', '336', '1', 'selesai'),
(1404, '20251017001', '11882297', '4', 'mandiri', '337', '0', 'selesai'),
(1405, '20251017001', '11882297', '4', 'mandiri', '338', '1', 'selesai'),
(1406, '20251017001', '11882297', '4', 'mandat', '339', '1', 'selesai'),
(1407, '20251017001', '11882297', '4', 'mandat', '340', '1', 'selesai'),
(1408, '20251017001', '11882297', '4', 'supervisi', '341', '1', 'selesai'),
(1409, '20251017001', '11882297', '4', 'supervisi', '342', '1', 'selesai'),
(1410, '20251017001', '11882297', '4', 'mandiri', '343', '', 'menunggu'),
(1411, '20251017001', '11882297', '4', 'mandiri', '344', '1', 'selesai'),
(1412, '20251017001', '11882297', '4', 'mandiri', '345', '1', 'selesai'),
(1413, '20251017001', '11882297', '4', 'mandiri', '346', '1', 'selesai'),
(1414, '20251017001', '11882297', '4', 'mandiri', '347', '1', 'selesai'),
(1415, '20251017001', '11882297', '4', 'mandiri', '348', '1', 'selesai'),
(1416, '20251017001', '11882297', '4', 'mandiri', '349', '1', 'selesai'),
(1417, '20251017001', '11882297', '4', 'mandiri', '350', '1', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `penyerahan`
--

CREATE TABLE `penyerahan` (
  `id` int(11) NOT NULL,
  `kode_penyerahan` varchar(100) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `unit` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyerahan`
--

INSERT INTO `penyerahan` (`id`, `kode_penyerahan`, `tgl_penyerahan`, `unit`, `petugas`, `penerima`) VALUES
(1, '000001', '2024-11-20', 'ADMIN LINEN', '12712497', ''),
(2, '000002', '2024-11-23', 'AUDIO METRI', '12712497', ''),
(3, '000003', '2024-11-23', 'APOTEKER', '12712497', '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kredensial`
--

CREATE TABLE `riwayat_kredensial` (
  `id` int(11) NOT NULL,
  `kode_pengajuan` varchar(100) DEFAULT NULL,
  `nopeg` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_jenis_kewenangan` varchar(10) DEFAULT NULL,
  `status_pengajuan` varchar(50) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_kredensial`
--

INSERT INTO `riwayat_kredensial` (`id`, `kode_pengajuan`, `nopeg`, `tanggal`, `id_jenis_kewenangan`, `status_pengajuan`, `catatan`) VALUES
(1, '20250919001', '12262398', '2025-10-16', '1', 'selesai', 'Sangat Layak'),
(2, '20250919001', '12262398', '2025-10-16', '1', 'selesai', 'Sangat Layak'),
(3, '20251017001', '11882297', '2025-10-17', '4', 'selesai', 'Bagus'),
(4, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'Bagus'),
(5, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'Bagus'),
(6, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(7, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(8, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(9, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(10, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(11, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(12, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'sdsdasd'),
(13, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'asdasdasdasd'),
(14, '20251017001', '11882297', '2025-10-18', '4', 'selesai', 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pengguna`
--

CREATE TABLE `riwayat_pengguna` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(100) DEFAULT NULL,
  `jam` date DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pengguna`
--

INSERT INTO `riwayat_pengguna` (`id`, `nopeg`, `jenis_transaksi`, `jam`, `keterangan`) VALUES
(0, '11882297', 'Proses Penilaian Kredensial', '2025-10-18', 'Sertifikat telah terkirim di email Anda <strong>maulanafajar752@gmail.com</strong>'),
(0, '11882297', 'Proses Penilaian Kredensial', '2025-10-18', 'Sertifikat telah terkirim di email Anda <strong>maulanafajar752@gmail.com</strong>'),
(0, '11882297', 'Proses Penilaian Kredensial', '2025-10-18', 'Sertifikat telah terkirim di email Anda <strong>maulanafajar752@gmail.com</strong>');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `tgl_saran` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `saran` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `nopeg`, `tgl_saran`, `jam`, `saran`) VALUES
(1, '11572298', '2024-07-06', '10:45', 'Tanggal lahir : 02 JANUARI 1998\r\nUsia kenapa jadi 26 TH 4MILIAR'),
(2, '6831485', '2024-07-17', '16:43', 'Maaf, mau tanya cara merubah tempat lahir gak da pilihannya, jadi blm bisa di betulkan');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(11) NOT NULL,
  `nopeg` varchar(100) NOT NULL,
  `berkas` varchar(1000) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `nopeg`, `berkas`, `keterangan`) VALUES
(5, '12262398', '68ccc8bc25a8a_23919322_6837107.jpg', 'sertifikat pelatihan'),
(6, '11362295', '68ce13ea3a22b_WhatsApp Image 2025-06-14 at 10.45.04.jpeg', 'Seritfikat Kompetensi pelatihan'),
(7, '11362295', '68ce1592121df_23919322_6837107.jpg', 'Sertifikta Kompetensi PK 1'),
(8, '12262398', '68ce552122f2f_3324162811970001.pdf', 'Contoh Webminar 1'),
(9, '12482300', '68dddbe8bcd4a_3324162811970001.pdf', 'Sertifikat Pelatihan'),
(10, '12482300', '68dddbf9e4e17_68b11510e5a9b_bilangan bulat.pdf', 'Sertifikat Seminar'),
(11, '11882297', '68f24d85cce16_alur.png', 'Seminar Online Keperawatan');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `foto_barang` varchar(10000) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id`, `nama_barang`, `kode_barang`, `merk`, `tipe`, `foto_barang`, `stok`, `satuan`) VALUES
(1, 'tutyuyuytu', '01', 'yuyutyu', 'L3110', '673c431544b44_tes rongten.jpg', 0, 'unit'),
(2, 'Muktiono', '03', 'Epson', 'L3110', 'box.png', 0, 'unit'),
(3, 'Printer Laser', '05B', 'Epson', 'L3110', 'box.png', 1, 'unit');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gaji`
--

CREATE TABLE `transaksi_gaji` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `periode_bulan` varchar(100) NOT NULL,
  `periode_tahun` varchar(100) NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL,
  `proses` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `status_transaksi` varchar(100) NOT NULL,
  `email` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_gaji`
--

INSERT INTO `transaksi_gaji` (`id`, `kode_transaksi`, `tgl_transaksi`, `periode_bulan`, `periode_tahun`, `jumlah_karyawan`, `proses`, `total_gaji`, `status_transaksi`, `email`) VALUES
(52, 'GJ-001', '2025-09-11', '8', '2025', 405, 365, 1264994937, 'belum selesai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_inv`
--

CREATE TABLE `unit_inv` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `opsi` int(11) NOT NULL,
  `lantai` int(11) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_inv`
--

INSERT INTO `unit_inv` (`id`, `unit`, `opsi`, `lantai`, `keterangan`) VALUES
(1, 'ARIMBI', 1, 2, ''),
(2, 'ATEM', 0, 1, ''),
(3, 'BAGIAN UMUM', 0, 1, ''),
(6, 'BIDANG UMUM', 0, 1, ''),
(7, 'CASEMIX', 0, 1, ''),
(8, 'CSSU', 0, 1, ''),
(9, 'DEWI KUNTHI', 1, 2, ''),
(10, 'DIREKSI', 1, 2, ''),
(11, 'DRIVER', 0, 1, ''),
(12, 'FARMASI', 1, 1, ''),
(14, 'FISIOTERAPHY', 0, 1, ''),
(15, 'GIZI', 0, 1, ''),
(17, 'GUDANG UMUM', 0, 1, ''),
(18, 'HEMODIALISA', 1, 2, ''),
(19, 'HOUSE KEEPING', 0, 1, ''),
(20, 'HRD', 0, 2, ''),
(21, 'HUMAS', 0, 1, ''),
(23, 'IBS', 1, 1, ''),
(24, 'ICU', 0, 1, ''),
(25, 'IGD', 0, 1, ''),
(26, 'IKB', 0, 1, ''),
(27, 'IPCN', 0, 2, ''),
(28, 'IPSRS', 0, 1, ''),
(29, 'IT', 0, 2, ''),
(30, 'KASIR', 1, 1, ''),
(31, 'KEUANGAN', 0, 2, ''),
(32, 'KOMITE KEPERAWATAN', 0, 2, ''),
(33, 'KOMITE PPI', 0, 1, ''),
(34, 'LABORATORIUM', 0, 1, ''),
(35, 'LAUNDRY', 0, 1, ''),
(36, 'OB', 0, 1, ''),
(37, 'PENDAFTARAN', 1, 1, ''),
(38, 'PERISTI', 0, 1, ''),
(39, 'POLIKLINIK', 1, 1, ''),
(40, 'RADIOLOGI', 0, 1, ''),
(42, 'REKAM MEDIS', 1, 1, ''),
(43, 'SECURITY', 0, 1, ''),
(44, 'SEKRETARIAT', 0, 2, ''),
(45, 'LOGISTIK', 0, 1, ''),
(46, 'LOCKER', 0, 1, ''),
(47, 'MEETING ROOM', 1, 2, ''),
(49, 'PERCETAKAN', 0, 0, ''),
(51, 'SMF', 0, 2, ''),
(53, 'TEKNISI', 0, 1, ''),
(54, 'VK', 0, 1, ''),
(55, 'LOBY', 1, 1, ''),
(56, 'AULA', 1, 2, ''),
(57, 'APOTEKER', 0, 1, ''),
(58, 'ADMIN LINEN', 0, 1, ''),
(59, 'AUDIO METRI', 0, 1, ''),
(60, 'PANEL LISTRIK', 0, 1, ''),
(64, 'PUNTADEWA', 1, 2, ''),
(65, 'RAMA', 1, 3, ''),
(66, 'SRIKANDI', 1, 2, ''),
(67, 'UMUM', 0, 1, ''),
(68, 'PPI', 0, 2, ''),
(72, 'IT2', 0, 2, 'Ini adalah contoh pertama degan 2 lantai'),
(73, 'IT3', 1, 1, 'Contoh Data Unit IT3 yang berada di Lantai 1 dengan 3 ruangan'),
(77, 'ARJUNA INDRA', 1, 2, 'Contoh Ubah data Ruangan Arjuna Kelas 2 part 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_master_rkk`
--
ALTER TABLE `detail_master_rkk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penyerahan`
--
ALTER TABLE `detail_penyerahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_unit`
--
ALTER TABLE `detail_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_detail`
--
ALTER TABLE `file_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_linen`
--
ALTER TABLE `master_linen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_rkk`
--
ALTER TABLE `master_rkk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_jabatan`
--
ALTER TABLE `pegawai_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_kredensial`
--
ALTER TABLE `pengajuan_kredensial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_kredensial_detail`
--
ALTER TABLE `pengajuan_kredensial_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyerahan`
--
ALTER TABLE `penyerahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_kredensial`
--
ALTER TABLE `riwayat_kredensial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_inv`
--
ALTER TABLE `unit_inv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_master_rkk`
--
ALTER TABLE `detail_master_rkk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=897;
--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_penyerahan`
--
ALTER TABLE `detail_penyerahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_unit`
--
ALTER TABLE `detail_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `file_detail`
--
ALTER TABLE `file_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18150;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1084;
--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `master_linen`
--
ALTER TABLE `master_linen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `master_pegawai`
--
ALTER TABLE `master_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `master_rkk`
--
ALTER TABLE `master_rkk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `master_unit`
--
ALTER TABLE `master_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5960;
--
-- AUTO_INCREMENT for table `pegawai_jabatan`
--
ALTER TABLE `pegawai_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengajuan_kredensial`
--
ALTER TABLE `pengajuan_kredensial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `pengajuan_kredensial_detail`
--
ALTER TABLE `pengajuan_kredensial_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1418;
--
-- AUTO_INCREMENT for table `penyerahan`
--
ALTER TABLE `penyerahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `riwayat_kredensial`
--
ALTER TABLE `riwayat_kredensial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_gaji`
--
ALTER TABLE `transaksi_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `unit_inv`
--
ALTER TABLE `unit_inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
