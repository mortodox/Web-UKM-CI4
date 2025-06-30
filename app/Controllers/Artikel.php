<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\ArtikelFotoModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $fotoModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->fotoModel = new ArtikelFotoModel();

        // Pastikan folder galeri tersedia
        if (!is_dir(ROOTPATH . 'public/uploads/galeri')) {
            mkdir(ROOTPATH . 'public/uploads/galeri', 0775, true);
        }
    }

    public function index()
    {
        $data['artikel'] = $this->artikelModel->orderBy('tanggal_publikasi', 'DESC')->findAll();
        return view('artikel/index', $data);
    }

    public function detail($id)
    {
        $model = new ArtikelModel();
        $fotoModel = new \App\Models\ArtikelFotoModel();

        $model->where('id', $id)->set('views', 'views + 1', false)->update();

        $data['artikel'] = $model->find($id);
        $data['fotos'] = $fotoModel->where('artikel_id', $id)->findAll();

        return view('artikel/detail', $data);
    }

    public function create()
    {
        return view('artikel/create');
    }

    public function store()
    {
        $thumbnail = $this->request->getFile('thumbnail');
        $thumbName = null;

        if ($thumbnail && $thumbnail->isValid()) {
            $thumbName = $thumbnail->getRandomName();
            $thumbnail->move('uploads/artikel_thumbnails', $thumbName);
            $this->salinKeGaleri('uploads/artikel_thumbnails/' . $thumbName);
        }

        $data = [
            'judul' => $this->request->getPost('judul'),

            'isi' => $this->request->getPost('isi'),
            'penulis' => $this->request->getPost('penulis'),
            'tanggal_publikasi' => date('Y-m-d'),
            'views' => 0,
            'thumbnail' => $thumbName ? 'uploads/artikel_thumbnails/' . $thumbName : null
        ];

        $this->artikelModel->insert($data);
        $artikelId = $this->artikelModel->insertID();

        $gallery = $this->request->getFiles();
        if (isset($gallery['galeri'])) {
            foreach ($gallery['galeri'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $galeriName = $file->getRandomName();
                    $file->move('uploads/artikel_galeri', $galeriName);
                    $path = 'uploads/artikel_galeri/' . $galeriName;
                    $this->fotoModel->insert([
                        'artikel_id' => $artikelId,
                        'file_path' => $path
                    ]);
                    $this->salinKeGaleri($path);
                }
            }
        }

        return redirect()->to('/artikel')->with('message', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['artikel'] = $this->artikelModel->find($id);
        $data['fotos'] = $this->fotoModel->where('artikel_id', $id)->findAll();
        return view('artikel/edit', $data);
    }

    public function update($id)
    {
        $artikel = $this->artikelModel->find($id);
        $thumbnail = $this->request->getFile('thumbnail');
        $thumbName = $artikel['thumbnail'];

        if ($thumbnail && $thumbnail->isValid()) {
            $thumbName = $thumbnail->getRandomName();
            $thumbnail->move('uploads/artikel_thumbnails', $thumbName);
            $this->salinKeGaleri('uploads/artikel_thumbnails/' . $thumbName);
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'penulis' => $this->request->getPost('penulis'),
            'tanggal_publikasi' => $this->request->getPost('tanggal_publikasi') ?: date('Y-m-d'),
            'thumbnail' => $thumbName
        ];

        $this->artikelModel->update($id, $data);

        $gallery = $this->request->getFiles();
        if (isset($gallery['galeri'])) {
            foreach ($gallery['galeri'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $galeriName = $file->getRandomName();
                    $file->move('uploads/artikel_galeri', $galeriName);
                    $path = 'uploads/artikel_galeri/' . $galeriName;
                    $this->fotoModel->insert([
                        'artikel_id' => $id,
                        'file_path' => $path
                    ]);
                    $this->salinKeGaleri($path);
                }
            }
        }

        return redirect()->to('/artikel')->with('message', 'Artikel berhasil diperbarui.');
    }

    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);

        if ($artikel && $artikel['thumbnail']) {
            @unlink(ROOTPATH . 'public/' . $artikel['thumbnail']);
        }

        $fotos = $this->fotoModel->where('artikel_id', $id)->findAll();
        foreach ($fotos as $foto) {
            if ($foto['file_path']) {
                @unlink(ROOTPATH . 'public/' . $foto['file_path']);
            }
        }

        $this->fotoModel->where('artikel_id', $id)->delete();
        $this->artikelModel->delete($id);

        return redirect()->to('/artikel')->with('message', 'Artikel berhasil dihapus.');
    }

    private function salinKeGaleri($pathLokal)
    {
        $namaFile = basename($pathLokal);
        $tujuan = 'uploads/galeri/' . $namaFile;
        if (!file_exists(ROOTPATH . 'public/' . $tujuan)) {
            @copy(ROOTPATH . 'public/' . $pathLokal, ROOTPATH . 'public/' . $tujuan);
        }
    }
}
