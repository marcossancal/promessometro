<?php

class BaseModel {
    protected $db;
    protected $table;

    protected static function db() {
        return Flight::db();
    }

    public function __construct($table) {
        $this->db = Flight::db(); // conexão PDO do Flight
        $this->table = $table;
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $stmt = $this->db->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        if ($stmt->execute($data)) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function update($id, $data) {
        $setClauses = [];
        $params = [];
        foreach ($data as $key => $value) {
            $setClauses[] = "$key = :$key";
            $params[":$key"] = $value;
        }
        $params[":id"] = $id;

        $stmt = $this->db->prepare("UPDATE {$this->table} SET " . implode(", ", $setClauses) . " WHERE id = :id");
        return $stmt->execute($params);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function selectWhere($conditions = []) {
        if (!$conditions) return $this->all();

        $clauses = [];
        $params = [];
        foreach ($conditions as $col => $val) {
            $clauses[] = "$col = :$col";
            $params[":$col"] = $val;
        }

        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE " . implode(" AND ", $clauses));
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
