<?php

require_once 'Database.php';

abstract class Table
{
    protected PDO $pdo;
    
    public function __construct(
        protected string $name
    )
    {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM ". $this->name);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ".$this->name." WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }

        return $result;
    }

    public function getNumberOfObjects(): int
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS totalObjects FROM " . $this->name);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['totalObjects'];
    }

    public function findWithOffset(int $limit, int $offset){
        $stmt = $this->pdo->prepare("SELECT * FROM ".$this->name." LIMIT :limite OFFSET :offset");
        $stmt->bindValue('limite', $limit, PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByName(string $name): ?array
    {
        $stmt = $this->pdo->query("SELECT * FROM ".$this->name." WHERE name LIKE '%".$name."%'");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }

        return $result;
    }
}