<?php

    class Contato extends Model
    {
        public function obterTodos()
        {
            $array = [];

            $sql = "SELECT * FROM contatos";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }
    }
