<?php
require_once _ROOT_ . '/Entity/Gallery.php';

class GalleryController
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=animacare;charset=utf8mb4', 'root', 'root');
        } catch(Exception $e) {
            echo('Erreur :' .$e->getMessage());
        }
    }
    
    public function getPdo()
    {
        return $this->pdo;
    }
    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }
    public function getAll(): array
    {
        $galleries = [];
        $req = $this->pdo->query("SELECT * FROM `gallery`");
        $data = $req->fetchAll();
        foreach($data as $gallery)
        {
            $galleries[] = new Gallery($gallery);
        }
        return $galleries;
    }
    public function getById($id): Gallery
    {
        $req = $this->pdo->prepare("SELECT * FROM `gallery` WHERE id=:id");
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $gallery = new Gallery($data);
        return $gallery;
    }
    public function createGallery(Gallery $newGallery)
    {
        $req = $this->pdo->prepare("INSERT INTO `gallery` (name, image_url) VALUES (:name, :image_url)");
        $req->bindValue(":name",$newGallery->getName(),PDO::PARAM_STR);
        $req->bindValue(":image_url", $newGallery->getImage_url(), PDO::PARAM_STR);
        $req->execute();
    }
    public function deleteGallery($id)
    {
        $req = $this->pdo->prepare("DELETE FROM `gallery` WHERE id=:id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}