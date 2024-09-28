<?php

class BookController {

    public function index() {
        echo 'Book';
    }

    // Method untuk menambahkan buku
    public function store() {
        // Mengecek apakah field terisi
        if (!$this->isFilled(['judul', 'penulis'])) {
            echo "ISI SEMUA FIELD!";
            die;
        }

        // Menangkap semua input lalu sanitasi
        $judul = htmlspecialchars($_POST['judul']);
        $penulis = htmlspecialchars($_POST['penulis']);

        $data = array(
            'judul' => $judul,
            'penulis' => $penulis,
        );

        var_dump($data);
    }

    // Method untuk mengubah buku
    public function update() {
        // Menangkap semua input lalu sanitasi
        $id = htmlspecialchars($_POST['id']);
        $judul = htmlspecialchars($_POST['judul']);
        $penulis = htmlspecialchars($_POST['penulis']);

        $data = array(
            'id' => $id,
            'judul' => $judul,
            'penulis' => $penulis,
        );

        var_dump($data);
    }

    // Method untuk menghapus buku
    public function delete($id) {
        var_dump($id);
    }

    // Method untuk meminjam buku
    public function borrow() {
        // Mengecek apakah field terisi
        if (!$this->isFilled(['id_buku', 'nomor_anggota', 'tgl_pinjam', 'tgl_kembali'])) {
            echo "ISI SEMUA FIELD!";
            die;
        }

        // Menangkap semua input lalu sanitasi
        $id_buku = htmlspecialchars($_POST['id_buku']);
        $nomor_anggota = htmlspecialchars($_POST['nomor_anggota']);
        $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
        $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
        $kode_pinjam = 'PJM'.time().rand(100,999);

        $data = array(
            'kode_pinjam' => $kode_pinjam,
            'id_buku' => $id_buku,
            'nomor_anggota' => $nomor_anggota,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
        );

        var_dump($data);
        // header('Location: /');
    }

    // Method mengembalikan buku
    public function return($id_peminjaman) {
        echo $id_peminjaman;
    }

    // Method mengecek status buku
    public function status($id_peminjaman) {
        echo $id_peminjaman;
    }

    // Method untuk mengecek apakah field terisi
    private function isFilled($fields) {
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }
}