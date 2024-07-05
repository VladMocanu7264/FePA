<?php

require_once __DIR__ . '/../config/config.php';

class Tag
{
    public function getAllTags()
    {
        global $mysqli;

        $result = $mysqli->query("SELECT * FROM tags");

        if (!$result) {
            echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
            return [];
        }

        $tags = [];
        while ($row = $result->fetch_assoc()) {
            $tags[] = $row;
        }

        return $tags;
    }
}
