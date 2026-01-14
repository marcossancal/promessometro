<?php
class Promises extends BaseModel {
    public function __construct() {
        parent::__construct('promises'); // passa o nome da tabela para BaseModel
    }

     public function all()
{
    $sql = "
        SELECT
            pr.*,
            p.name   AS party_name,
            c.name AS candidate_name
        FROM {$this->table} pr
        LEFT JOIN candidates c ON c.id = pr.candidate_id
        LEFT JOIN parties p     ON p.id   = c.party_id
        ORDER BY c.name
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
