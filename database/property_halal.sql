/*
SQLyog Professional
MySQL - 10.4.16-MariaDB : Database - property_halal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `groups` */

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values (1,'Admin','admin');
insert  into `groups`(`id`,`name`,`description`) values (2,'user','user');

/*Table structure for table `login_attempts` */

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76165 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `m_pertanyaan` */

CREATE TABLE `m_pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` longtext DEFAULT NULL,
  `status_p` enum('aktif','tidak') DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `m_pertanyaan` */

insert  into `m_pertanyaan`(`id`,`pertanyaan`,`status_p`,`last_update`) values (1,'Apakah pernah mengajukan KPR di Bank sebelumnya ?','aktif','2021-04-24 09:13:23');
insert  into `m_pertanyaan`(`id`,`pertanyaan`,`status_p`,`last_update`) values (2,'Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','aktif','2021-04-23 16:23:16');
insert  into `m_pertanyaan`(`id`,`pertanyaan`,`status_p`,`last_update`) values (3,'Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','aktif','2021-04-23 16:24:10');
insert  into `m_pertanyaan`(`id`,`pertanyaan`,`status_p`,`last_update`) values (4,'Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','aktif','2021-04-23 16:43:38');

/*Table structure for table `tbl_aturan_referral` */

CREATE TABLE `tbl_aturan_referral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi` longtext DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_aturan_referral` */

insert  into `tbl_aturan_referral`(`id`,`isi`,`last_update`) values (1,'<div class=\"containerRef\">\r\n<div class=\"rules\">\r\n<h1><strong>Peraturan Program<br>\r\nReferal Tokoplas</strong></h1>\r\n\r\n<h3>Pembaruan Terakhir : 21 Juli 2020</h3>\r\n\r\n<p>Terimakasih atas bantuan anda dalam pertumbuhan komunitas kami. Kami berharap anda telah menikmati pengalaman menggunakan platform Tokoplas. Program referal Tokoplas mengundang anda untuk membagikan kemudahan menggunakan Tokoplas kepada orang - orang lain agar mereka pun dapat menikmati pengalaman pertama mereka bertransaksi di Tokoplas.</p>\r\n\r\n<p>Dengan membantu kami menceritakan keuntungan serta atribut – atribut unik dari Tokoplas, anda akan mendapatkan voucher Tokoplas yang dapat digunakan untuk transaksi anda selanjutnya.</p>\r\n\r\n<h3>Aturan Program Referral Tokoplas</h3>\r\n\r\n<p>Peraturan Program Referral Tokoplas berlaku hanya untuk Program Referral yang dikelola oleh Tokoplas. Dengan menerima dan membagikan kode rujukan anda atau mendaftar menggunakan kode rujukan , anda setuju untuk terikat kepada peraturan Program Referral Tokoplas. Setiap pelanggaran terhadap aturan ini tidak hanya akan mencegah anda untuk berpartisipasi dalam Prgram Referral Tokoplas, tetapi juga dapat mengakibatkan voucher Tokoplas atau hadiah - hadiah lain yang diperoleh menjadi tidak berlaku, bahkan dapat berakibat pada penonaktifan akun anda.</p>\r\n\r\n<div class=\"rule-content-1\">\r\n<h3>1. Siapa yang berhak untuk memberikan kode referral/mengundang?</h3>\r\n\r\n<p>Siapapun dapat memberikan kode referral / memberikan undangan apabila mereka telah memiliki akun yang aktif di Tokoplas. Pengundang dapat berupa pemilik akun Tokoplas jenis apapun (individual / perusahaan); namun, pengguna tidak dapat menggunakan lebih dari satu akun dan voucher Tokoplas hanya akan diberikan kepada Akun Utama (berlaku untuk akun pengguna dengan lebih dari satu user).</p>\r\n\r\n<h3>2. Siapa yang berhak untuk menerima kode referral/menerima undangan?</h3>\r\n\r\n<p>Teman, keluarga dan orang lain yang anda kenal (kecuali diri anda) berhak untuk menerima kode referral/menerima udangan. Untuk memastikan pihak yang anda undang berhak untuk menerima undangan, mohon perhatikan ketentuan berikut ini:<br>\r\nPenerima undangan yang memenuhi syarat terbatas pada ketentuan berikut:</p>\r\n\r\n<ol>\r\n <li>Merupakan pengguna baru Tokoplas dan baru pertama kali menggunakan Tokoplas,</li>\r\n <li>Memenuhi persyaratan untuk menggunakan aplikasi Tokoplas,</li>\r\n <li>Menyelesaikan persyaratan yang diberikan berdasarkan ketentuan Program Referral Tokoplas (misalnya, melakukan transkasi melalui aplikasi Tokoplas, maupun persyaratan lain yang berlaku),</li>\r\n <li>Belum pernah bertransaksi di Tokoplas,</li>\r\n <li>Belum pernah mendapatkan kode referral dari pihak lain,</li>\r\n <li>Memberikan kode referral dari pengundang saat menyelesaikan transaksi pertama di Tokoplas.</li>\r\n</ol>\r\n\r\n<p>Pengundang tidak boleh:</p>\r\n</div>\r\n\r\n<div class=\"rule-content-2\">\r\n<h3> </h3>\r\n\r\n<ol>\r\n <li>Mengajukan diri mereka sebagai penerima kode referral,</li>\r\n <li>Membuat akun duplikat / beberapa akun sekaligus,</li>\r\n <li>Mengenakan klaim / biaya yang tidak benar;</li>\r\n <li>Memalsukan data, atau</li>\r\n <li>Melanggar aturan lain yang ditetapkan didalam Program Referral Tokoplas yang akan diperbarui seiring berjalannya waktu, dimana pembaruan tersebut dapat ditemukan disini.</li>\r\n</ol>\r\n\r\n<p>Dengan memberikan informasi penerima referral kepada Tokoplas, anda menyatakan bahwa anda memiliki hak untuk memberikan informasi tersebut</p>\r\n</div>\r\n\r\n<div class=\"content-rule-3\">\r\n<h3>3. Bagaimana cara menggunakan kode referral saya?</h3>\r\n\r\n<p>Pemberi undangan Setiap akun akan diberikan Kode Referral unik. Pemberi undangan dapat memberikan kode tersebut kepada rekan yang mereka kenal dan setuju untuk tidak menduplikasi, menjual, atau mentransfer kode referral tersebut atau menyebarkannya kepada masyarakat umum.</p>\r\n\r\n<p>Setelah penerima referral melakukan transaksi pertama, pastikan mereka memberkan kode referral anda kepada Tokoplas. Setelah transaksi terkonfirmasi, kami akan menerbitkan voucher anda. Jangan lupa untuk menjelaskan program ini kepada penerima referral agar mereka memahami pentingnya memberikan kode referral anda kepada kami.</p>\r\n\r\n<p>Jika Anda masih memiliki kode voucher yang belum terpakai hingga masa berlaku habis, silahkan hubungi Tim Tokoplas untuk dapat mengaktifkannya kembali.</p>\r\n</div>\r\n\r\n<div class=\"content-rule-4\">\r\n<h3>4. Bagaimana cara saya mendapatkan voucher sebagai penerima undangan</h3>\r\n\r\n<p>Untuk pengguna baru yang bergabung melalui Program Referral Tokoplas, penerima undangan akan mendapatkan potongan harga untuk transaksi pertama mereka melalui aplikasi/website Tokoplas. Jumlah dan bentuk potongan harga yang diberikan akan diinformasikan melalui saluran komunikasi Tokoplas, atau dapat ditanyakan kepada relationship manager kami. Betul sekali, pengundang dan penerima undangan sama – sama mendapatkan bonus!</p>\r\n\r\n<p>Penerima undangan yang ingin menjadi pengundang dapat meminta Kode Referral unik mereka dan mulai membagikannya. Undang keluarga, teman, dan rekan usaha anda untuk menggunakan Tokoplas dan menerima voucher lebih banyak lagi.</p>\r\n</div>\r\n\r\n<div class=\"content-rule-5\">\r\n<h3>5. Pembatalan dan perubahan</h3>\r\n\r\n<p>Tokoplas berhak untuk merubah, membatalkan atau mengehentikan sementara, sebagian atau seluruh Program Referral Tokoplas, serta kemampuan pemberi atau penerima undangan untuk berpartisipasi dalam Program Referral Tokoplas atau untuk menerima voucher, kapanpun dan untuk alasan apapun, termasuk alasan pelanggaran (oleh pemberi dan/atau penerima undangan), penyalahgunaan, atau pelanggaran terhadap aturan dan perjanjian (jika ada) antara anda dengan Tokoplas atau anak perusahaan dan afiliasinya. Dalam hal Tokoplas membatalkan program referral apapun, maka voucher Referral yang masih belum terpakai atau belum digunakan akan hangus pada saat itu juga, dengan pemberitahuan 14 hari kalender sebelumnya.</p>\r\n\r\n<p>Tokoplas dapat memperbarui aturan ini kapan saja. Setiap pembaruan akan dipost di situs web dan aplikasi Tokoplas.com. Tokoplas tidak berkewajiban untuk memberitahukan jika ada pembaruan. Kelanjutan partisipasi anda pada program referral apapun setelah ada pembaruan peraturan, menandakan bahwa anda setuju dengan pembaruan peraturan tersebut.</p>\r\n</div>\r\n</div>\r\n</div>\r\n','2021-04-27 08:35:00');

/*Table structure for table `tbl_data_kenalan` */

CREATE TABLE `tbl_data_kenalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_asal_survei` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat_domisili` longtext DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `handphone` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `status_pernikahan` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') DEFAULT NULL,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_data_kenalan` */

insert  into `tbl_data_kenalan`(`id`,`id_asal_survei`,`nama_lengkap`,`alamat_domisili`,`email`,`handphone`,`jenis_kelamin`,`usia`,`status_pernikahan`,`pekerjaan`,`last_update`) values (6,'67166',' sdklsandkl','ksamk;dasm;','-','kmsakdmask','Laki-Laki','kldkl','Belum Kawin','kslmksamd','2021-04-27 08:13:35');

/*Table structure for table `tbl_menu` */

CREATE TABLE `tbl_menu` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `class` varchar(100) NOT NULL,
  `parent` mediumint(3) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2235 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id`,`title`,`link`,`icon`,`class`,`parent`,`status`) values (1,'Dashboard','dashboard','mdi mdi-view-dashboard','dashboard',0,'Y');
insert  into `tbl_menu`(`id`,`title`,`link`,`icon`,`class`,`parent`,`status`) values (2,'Pertanyaan','master-pertanyaan','mdi mdi-help-circle','pertanyaan',0,'Y');
insert  into `tbl_menu`(`id`,`title`,`link`,`icon`,`class`,`parent`,`status`) values (3,'Survei','data-survei','mdi mdi-archive','survei',0,'Y');
insert  into `tbl_menu`(`id`,`title`,`link`,`icon`,`class`,`parent`,`status`) values (4,'Data Kenalan','data-kenalan','mdi mdi-account-switch','kenalan',0,'Y');
insert  into `tbl_menu`(`id`,`title`,`link`,`icon`,`class`,`parent`,`status`) values (5,'Pengaturan','pengaturan-referral','mdi mdi-settings-box','pengaturan',0,'Y');

/*Table structure for table `tbl_menugroup` */

CREATE TABLE `tbl_menugroup` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `menu_id` mediumint(8) NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_group` (`menu_id`),
  KEY `fk_menu_user` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=699 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_menugroup` */

insert  into `tbl_menugroup`(`id`,`menu_id`,`group_id`) values (1,1,1);
insert  into `tbl_menugroup`(`id`,`menu_id`,`group_id`) values (2,2,1);
insert  into `tbl_menugroup`(`id`,`menu_id`,`group_id`) values (3,3,1);
insert  into `tbl_menugroup`(`id`,`menu_id`,`group_id`) values (4,4,1);
insert  into `tbl_menugroup`(`id`,`menu_id`,`group_id`) values (5,5,1);

/*Table structure for table `tbl_pengisian_survei` */

CREATE TABLE `tbl_pengisian_survei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_survei` varchar(100) DEFAULT NULL,
  `id_pertanyaan` longtext DEFAULT NULL,
  `jawaban` longtext DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pengisian_survei` */

insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (29,'09045','Apakah pernah mengajukan KPR di Bank sebelumnya ?','Iya ','2021-04-25 18:58:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (30,'09045','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','Iya ','2021-04-25 18:58:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (31,'09045','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','Iya ','2021-04-25 18:58:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (32,'09045','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','0823239283828','2021-04-25 18:58:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (33,'00484','Apakah pernah mengajukan KPR di Bank sebelumnya ?','sndkasn','2021-04-25 19:23:57');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (34,'00484','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','nsdsan','2021-04-25 19:23:57');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (35,'00484','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','jsdnjsakdn','2021-04-25 19:23:57');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (36,'00484','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','kjasndjasdn','2021-04-25 19:23:57');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (37,'66086','Apakah pernah mengajukan KPR di Bank sebelumnya ?','djsnsjdnf','2021-04-26 14:29:22');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (38,'66086','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','klnasdlksan','2021-04-26 14:29:22');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (39,'66086','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','klasndlksan','2021-04-26 14:29:22');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (40,'66086','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','skandklasn','2021-04-26 14:29:22');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (41,'66086','Apakah pernah mengajukan KPR di Bank sebelumnya ?','DFG;LDMG','2021-04-26 14:54:58');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (42,'66086','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','L;DF;LDSM','2021-04-26 14:54:58');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (43,'66086','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','LML;SDMF','2021-04-26 14:54:58');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (44,'66086','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','L;MSDFL;SD','2021-04-26 14:54:58');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (45,'66086','Apakah pernah mengajukan KPR di Bank sebelumnya ?','DFG;LDMG','2021-04-26 14:55:09');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (46,'66086','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','L;DF;LDSM','2021-04-26 14:55:09');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (47,'66086','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','LML;SDMF','2021-04-26 14:55:09');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (48,'66086','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','L;MSDFL;SD','2021-04-26 14:55:09');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (49,'66086','Apakah pernah mengajukan KPR di Bank sebelumnya ?','JKSDNFJ','2021-04-26 14:55:46');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (50,'66086','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','NJSDNFJ','2021-04-26 14:55:46');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (51,'66086','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','JDNASJDN','2021-04-26 14:55:46');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (52,'66086','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','JASDNJASDNSAJN','2021-04-26 14:55:46');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (53,'66086','Apakah pernah mengajukan KPR di Bank sebelumnya ?','JKSDNFJ','2021-04-26 14:56:04');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (54,'66086','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','NJSDNFJ','2021-04-26 14:56:04');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (55,'66086','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','JDNASJDN','2021-04-26 14:56:04');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (56,'66086','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','JASDNJASDNSAJN','2021-04-26 14:56:04');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (57,'67166','Apakah pernah mengajukan KPR di Bank sebelumnya ?','aksdmkasm','2021-04-27 08:13:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (58,'67166','Kendala apa yang Anda dapatkan pada saat mengajukan proses KPR ?','mksmdksla','2021-04-27 08:13:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (59,'67166','Apakah Anda memahami perbedaan sistem syariah dan sistem perbankan ?','kmadklasmd','2021-04-27 08:13:00');
insert  into `tbl_pengisian_survei`(`id`,`id_survei`,`id_pertanyaan`,`jawaban`,`last_update`) values (60,'67166','Apakah Anda ingin mendapatakan informasi terbaru terkait Rumah subsidi Syariah jika Ya, sialhkan mengisi nomor kontak yang bisa di hubingi ?','kamdlaks','2021-04-27 08:13:00');

/*Table structure for table `tbl_user_survei` */

CREATE TABLE `tbl_user_survei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_survei` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat_domisili` longtext DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `handphone` varchar(20) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `status_pernikahan` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') DEFAULT NULL,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user_survei` */

insert  into `tbl_user_survei`(`id`,`kode_survei`,`nama_lengkap`,`alamat_domisili`,`email`,`handphone`,`jenis_kelamin`,`usia`,`status_pernikahan`,`pekerjaan`,`last_update`) values (8,'09045','Bahrul Ulum','Makassar','e09045@survei.com','082309045','Laki-Laki','25','Belum Kawin','Programmer','2021-04-25 18:51:53');
insert  into `tbl_user_survei`(`id`,`kode_survei`,`nama_lengkap`,`alamat_domisili`,`email`,`handphone`,`jenis_kelamin`,`usia`,`status_pernikahan`,`pekerjaan`,`last_update`) values (9,'00484','Dede Ganteng','Makassar','e00484@survei.com','082300484','Laki-Laki','22','Cerai Hidup','Ngaggur','2021-04-25 19:11:13');
insert  into `tbl_user_survei`(`id`,`kode_survei`,`nama_lengkap`,`alamat_domisili`,`email`,`handphone`,`jenis_kelamin`,`usia`,`status_pernikahan`,`pekerjaan`,`last_update`) values (10,'66086','Gusti Ganteng','ajsdnasjdnask','e66086@survei.com','082366086','Laki-Laki','22','Belum Kawin','Desain','2021-04-26 14:22:39');
insert  into `tbl_user_survei`(`id`,`kode_survei`,`nama_lengkap`,`alamat_domisili`,`email`,`handphone`,`jenis_kelamin`,`usia`,`status_pernikahan`,`pekerjaan`,`last_update`) values (11,'67166','nama saya','hehehehe','e67166@survei.com','082367166','Laki-Laki','28','Belum Kawin','Hahahah','2021-04-27 08:12:52');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_view` varchar(256) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `foto` varchar(50) DEFAULT 'user.png',
  `tanggal_register` datetime DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `forgotten_password_selector` varchar(50) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `remember_selector` varchar(50) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `id_registrasi` varchar(100) DEFAULT NULL,
  `id_asal_registrasi` varchar(100) DEFAULT 'default',
  `tipe_user` varchar(10) DEFAULT 'member',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18930 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`password_view`,`first_name`,`last_name`,`email`,`phone`,`foto`,`tanggal_register`,`salt`,`company`,`active`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`forgotten_password_selector`,`remember_code`,`remember_selector`,`created_on`,`last_login`,`due_date`,`status`,`last_user`,`created`,`id_registrasi`,`id_asal_registrasi`,`tipe_user`) values (1,'192.168.1.1','admin','$2y$10$Duc6fLIhYnStPVQv.jZQvOV4uYURIk9XivbLIiL/EgZTApF1y/i6W','admin123','admin','','dedeg3anteng@yahoo.com','0823952159622','u9o1vc7-1591335793.jpg','2020-06-04 16:44:46',NULL,'1',1,NULL,NULL,NULL,NULL,NULL,NULL,1591260287,1619482636,NULL,NULL,NULL,NULL,'','','admin');
insert  into `users`(`id`,`ip_address`,`username`,`password`,`password_view`,`first_name`,`last_name`,`email`,`phone`,`foto`,`tanggal_register`,`salt`,`company`,`active`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`forgotten_password_selector`,`remember_code`,`remember_selector`,`created_on`,`last_login`,`due_date`,`status`,`last_user`,`created`,`id_registrasi`,`id_asal_registrasi`,`tipe_user`) values (18926,'127.0.0.1','u_09045','$2y$10$91u0QMxyqflH8BKj3GIbUecIM86R7YqRnpICBr1oAzIlBpBVY7gIW','p_09045','Bahrul Ulum','','e09045@survei.com','082309045','user.png','2021-04-25 18:51:53',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1619347913,NULL,NULL,NULL,NULL,NULL,'09045','default','member');
insert  into `users`(`id`,`ip_address`,`username`,`password`,`password_view`,`first_name`,`last_name`,`email`,`phone`,`foto`,`tanggal_register`,`salt`,`company`,`active`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`forgotten_password_selector`,`remember_code`,`remember_selector`,`created_on`,`last_login`,`due_date`,`status`,`last_user`,`created`,`id_registrasi`,`id_asal_registrasi`,`tipe_user`) values (18927,'127.0.0.1','u_00484','$2y$10$4fGbY/gEUgmnibYmcZMZpe.bxAmgRRMbPdIyCtLS03vIz7V3yw7Sa','p_00484','Dede Ganteng','','e00484@survei.com','082300484','user.png','2021-04-25 19:11:13',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1619349073,1619352647,NULL,NULL,NULL,NULL,'00484','09045','member');
insert  into `users`(`id`,`ip_address`,`username`,`password`,`password_view`,`first_name`,`last_name`,`email`,`phone`,`foto`,`tanggal_register`,`salt`,`company`,`active`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`forgotten_password_selector`,`remember_code`,`remember_selector`,`created_on`,`last_login`,`due_date`,`status`,`last_user`,`created`,`id_registrasi`,`id_asal_registrasi`,`tipe_user`) values (18928,'::1','u_66086','$2y$10$NU8GaQskbtY1kkmCWi8hWOa99YlfXwqrR/eqHdoibkh46Upo0YbM6','p_66086','Gusti Ganteng','','e66086@survei.com','082366086','user.png','2021-04-26 14:22:39',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1619418159,1619418160,NULL,NULL,NULL,NULL,'66086','default','member');
insert  into `users`(`id`,`ip_address`,`username`,`password`,`password_view`,`first_name`,`last_name`,`email`,`phone`,`foto`,`tanggal_register`,`salt`,`company`,`active`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`forgotten_password_selector`,`remember_code`,`remember_selector`,`created_on`,`last_login`,`due_date`,`status`,`last_user`,`created`,`id_registrasi`,`id_asal_registrasi`,`tipe_user`) values (18929,'127.0.0.1','u_67166','$2y$10$mQorrTQyFiW.UOXwEdAXC.veh8FDklEcKm9Il7ufSp1i/gapQCeBe','p_67166','nama saya','','e67166@survei.com','082367166','user.png','2021-04-27 08:12:52',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1619482372,1619482372,NULL,NULL,NULL,NULL,'67166','default','member');

/*Table structure for table `users_groups` */

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values (1,1,1);
insert  into `users_groups`(`id`,`user_id`,`group_id`) values (27,18926,2);
insert  into `users_groups`(`id`,`user_id`,`group_id`) values (28,18927,2);
insert  into `users_groups`(`id`,`user_id`,`group_id`) values (29,18928,2);
insert  into `users_groups`(`id`,`user_id`,`group_id`) values (30,18929,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
