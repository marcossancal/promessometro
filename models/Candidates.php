<?php
class Candidates extends BaseModel {
    public function __construct() {
        parent::__construct('candidates'); // passa o nome da tabela para BaseModel
    }

 public function all()
{
    $sql = "
        SELECT
            c.*,
            p.name   AS party_name,
            pos.name AS position_name,
            s.name   AS state_name,
            s.code   AS state_code
        FROM {$this->table} c
        LEFT JOIN parties p     ON p.id   = c.party_id
        LEFT JOIN positions pos ON pos.id = c.position_id
        LEFT JOIN states s      ON s.id   = c.state_id
        ORDER BY c.name
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
