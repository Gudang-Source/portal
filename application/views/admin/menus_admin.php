<?php if ($this->session->userdata('level') == 1) { ?>
    <li class="<?= $this->uri->segment(3) == 'dashboard' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span> Profil Sekolah </span></a>
        <ul>
            <li class="<?= $this->uri->segment(3) == 'sekolah' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/sekolah') ?>">Data Sekolah</a></li>
            <li class="<?= $this->uri->segment(3) == 'struktur' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/struktur') ?>">Struktural Sekolah</a></li>
            <li class="<?= $this->uri->segment(3) == 'tahun_ajaran' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/tahun_ajaran') ?>">Tahun Ajaran Sekolah</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-copy"></i> <span> Pengaturan Sistem </span></a>
        <ul>
            <li class="<?= $this->uri->segment(4) == 'db' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/cogs/db') ?>" id="layout2">Sistem dan Databases </a></li>
            <li class="<?= $this->uri->segment(4) == 'maintenance' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/cogs/maintenance') ?>" id="layout3">Mode Perbaikan </a></li>
            <li><a href="" id="layout4">Tutup Website</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-droplet2"></i> <span>Pengguna Sistem</span></a>
        <ul>
            <li class="<?= $this->uri->segment(3) == 'user_admin' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/user_admin') ?>">Admin Pengelola</a></li>
            <li class="<?= $this->uri->segment(3) == 'user_pendidik' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/user_pendidik') ?>">Pendidik</a></li>
            <li class="<?= $this->uri->segment(3) == 'user_pedik' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/user_pedik') ?>">Peserta Didik</a></li>
            <li class="<?= $this->uri->segment(3) == 'log_aktivitas' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/log_aktivitas/log/a') ?>">Log Activity</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-feed"></i> <span>Pengumuman</span></a>
        <ul>
            <li class="<?= $this->uri->segment(3) == 'thumbnail' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/thumbnail') ?>">Thumbnail</a></li>
            <li class="<?= $this->uri->segment(3) == 'pengumuman' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/pengumuman') ?>">Pengumuman</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-stack"></i> <span>Manajemen Arsip</span></a>
        <ul>
            <li><a href="">Lihat Arsip</a></li>
            <li><a href="">Kelola Arsip</a></li>
            <li><a href="">Akses Arsip</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-bubbles4"></i> <span> Direct Messages </span></a>
        <ul>
            <li><a href="">Akun Direct Message</a></li>
            <li><a href="">Pengaturan Direct Message</a></li>
            <li><a href="">Informasi Direct Message</a></li>
        </ul>
    </li>
    <li><a href=""><i class="icon-list-unordered"></i> <span>Manajemen Download </span></a>
        <ul>
            <li><a href="">Pengelolaan Download</a></li>
            <li><a href="">Akses Download</a></li>
        </ul>
    </li>
<?php } else if ($this->session->userdata('level') == 2) { ?>
    <li class="<?= $this->uri->segment(3) == 'dashboard' ? 'active' : null ?>"><a href="<?= site_url('admin/tata_usaha/dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span> Profil Sekolah </span></a>
        <ul>
            <li class="<?= $this->uri->segment(3) == 'sekolah' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/sekolah') ?>">Data Sekolah</a></li>
            <li class="<?= $this->uri->segment(3) == 'struktur' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/struktur') ?>">Struktural Sekolah</a></li>
            <li class="<?= $this->uri->segment(3) == 'tahun_ajaran' ? 'active' : null ?>"><a href="<?= site_url('admin/operator/tahun_ajaran') ?>">Tahun Ajaran Sekolah</a></li>
            <li><a href="">SK Sekolah</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span> Master Data </span></a>
        <ul>
            <li class="<?= $this->uri->segment(3) == 'pedik' ? 'active' : null ?>"><a href="<?= site_url('admin/tata_usaha/pedik') ?>">Peserta Didik</a></li>
            <li class="<?= $this->uri->segment(3) == 'pendidik' ? 'active' : null ?>"><a href="<?= site_url('admin/tata_usaha/pendidik') ?>">Tenaga Pendidik</a></li>
            <li class="<?= $this->uri->segment(3) == 'kelas' ? 'active' : null ?>"><a href="<?= site_url('admin/tata_usaha/kelas') ?>">Ruang Kelas</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-copy"></i> <span> Ujian Sekolah </span></a>
        <ul>
            <li><a href="" id="layout2">Peserta Ujian </a></li>
            <li><a href="" id="layout3">Soal Ujian </a></li>
            <li><a href="" id="layout4">Kartu Ujian</a></li>
            <li><a href="" id="layout5">Jadwal Ujian</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-droplet2"></i> <span>Administrasi</span></a>
        <ul>
            <li><a href="colors_primary.html">SK Penugasan</a></li>
            <li><a href="colors_danger.html">SK Siswa</a></li>
            <li><a href="colors_success.html">Berkas Ijazah</a></li>
        </ul>
    </li>
    <li>
        <a href="<?= site_url() ?>"><i class="icon-stack"></i> <span>Manajemen Arsip TU</span></a>
    </li>
<?php } else if ($this->session->userdata('level') == 3) {  ?>
    <li class="<?= $this->uri->segment(3) == 'dashboard' ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span> Master Data </span></a>
        <ul>
            <li class="<?= $this->uri->segment(3) == 'mapel' ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/mapel') ?>">Data Mata Pelajaran</a></li>
            <li class="<?= $this->uri->segment(3) == 'pengampu' ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/pengampu') ?>">Data Pengampu</a></li>
            <li class="<?= $this->uri->segment(3) == 'jampel' ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/1') ?>">Data Jam Pelajaran</a></li>
            <li class="<?= $this->uri->segment(3) == 'jadwal' ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jadwal') ?>">Data Jadwal Pelajaran</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-copy"></i> <span> Pembelajaran </span></a>
        <ul>
            <li><a href="" id="layout2">Program Pembelajaran </a></li>
            <li><a href="" id="layout3">Silabus Pembelajaran </a></li>
            <li><a href="" id="layout4">Evaluasi Pembelajaran</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-droplet2"></i> <span>Ujian Sekolah</span></a>
        <ul>
            <li><a href="colors_primary.html">Ujian Tengah Semester</a></li>
            <li><a href="colors_danger.html">Ujian Akhir Semester</a></li>
            <li><a href="colors_success.html">Ujian Kompetensi</a></li>
            <li><a href="colors_warning.html">Ujian Try Out</a></li>
            <li><a href="colors_info.html">Ujian Nasional</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-book"></i> <span>Manajemen Raport</span></a>
    </li>
    <li>
        <a href="#"><i class="icon-stack"></i> <span>Manajemen Arsip</span></a>
    </li>
    <li>
    <?php } else if ($this->session->userdata('level') == 4) { ?>
    <li class="<?= $this->uri->segment(3) == 'dashboard' ? 'active' : null ?>"><a href="<?= site_url('admin/kesiswaan/dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span> Master Data </span></a>
        <ul>
            <li><a href="">Data Siswa</a></li>
            <li><a href="">Data Kelas</a></li>
            <li><a href="">Data Pengampu</a></li>
            <li><a href="">Data Jadwal Pelajaran</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-copy"></i> <span> Media Konseling </span></a>
        <ul>
            <li><a href="" id="layout2"> Peserta Konseling </a></li>
            <li><a href="" id="layout3"> Jadwal Konseling </a></li>
            <li><a href="" id="layout4"> Pemanggilan</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-stack"></i> <span>Manajemen Arsip</span></a>
    </li>
    <li>
    <?php } else if ($this->session->userdata('level') == 5) { ?>
    <li class="<?= $this->uri->segment(3) == 'dashboard' ? 'active' : null ?>"><a href="<?= site_url('admin/keuangan/dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span> Master Data </span></a>
        <ul>
            <li><a href="">Data Siswa</a></li>
            <li><a href="">Data SPP</a></li>
            <li><a href="">Data Bulan</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-copy"></i> <span> SPP Siswa </span></a>
        <ul>
            <li><a href="" id="layout2"> Pembayaran </a></li>
            <li><a href="" id="layout3"> Tunggakan </a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-droplet2"></i> <span>Laporan</span></a>
        <ul>
            <li><a href="colors_primary.html"> Laporan Pembayaran</a></li>
            <li><a href="colors_danger.html"> Laporan Tunggakan </a></li>
            <li><a href="colors_success.html"> Laporan Kuartal Semester</a></li>
            <li><a href="colors_warning.html"> Laporan Kuarta TA</a></li>
        </ul>
    </li>
    <li>
        <a href=""><i class="icon-stack"></i> <span>Manajemen Arsip</span></a>
    </li>
<?php } ?>