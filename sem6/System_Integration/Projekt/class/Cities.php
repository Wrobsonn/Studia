<?php
class Cities
{
    public $rok;
    public $miasto;
    public $ceny;
    public $iloscmieszkan;
    public $liczbaludnoscinakmkwadrat;
    public $mieszkancy;
    public $mieszkaniec_na_mieszkanie;
    public $powierzchnia;
    public $stopyprocentowe;
    public $uczelnie;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read($miasto)
    {
        $stmt1 = $this->conn->prepare("SELECT * FROM uczelnie");
        $stmt1->execute();
        $result1 = $stmt1->get_result();


        $stmt2 = $this->conn->prepare("SELECT * FROM stopyprocentowe");
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        $data = [];
        $dataRequest = ['ceny', "iloscmieszkan", "liczbaludnoscinakmkwadrat", "mieszkancy", "mieszkaniec_na_mieszkanie", "powierzchnia"];

        foreach ($dataRequest as $row) {
            $stmt = $this->conn->prepare("SELECT $miasto FROM $row");
            if ($stmt === false) {
                // Handle the error
                die('Error in the prepared statement: ' . $this->conn->error);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            $data[$row] = $result;
            $stmt->close();
        }

        $combinedResult = array(
            "ceny" => $data['ceny']->fetch_all(MYSQLI_ASSOC),
            'stopyprocentowe' => $result2->fetch_all(MYSQLI_ASSOC),
            "iloscmieszkan" => $data['iloscmieszkan']->fetch_all(MYSQLI_ASSOC),
            "liczbaludnoscinakmkwadrat" => $data['liczbaludnoscinakmkwadrat']->fetch_all(MYSQLI_ASSOC),
            "mieszkancy" => $data['mieszkancy']->fetch_all(MYSQLI_ASSOC),
            "mieszkaniec_na_mieszkanie" => $data['mieszkaniec_na_mieszkanie']->fetch_all(MYSQLI_ASSOC),
            "powierzchnia" => $data['powierzchnia']->fetch_all(MYSQLI_ASSOC),
            'uczelnia' => $result1->fetch_all(MYSQLI_ASSOC)
        );

        $stmt1->close();
        $stmt2->close();

        return $combinedResult;
    }
}
