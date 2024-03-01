<?php
require_once __DIR__ . '/Database.php';

class Categories
{
    
    public static function findAll()
    {
        try {
            $pdo = Database::getConnection();
        } catch (PDOException $ex) {
            echo "Erreur lors de la connexion à la base de données";
            exit;
        }
        $stmt = $pdo->query("SELECT * FROM category");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}