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

        public function adicionar($nome, $email)
        {
            if (!$this->verificarEmail($email)) {
                $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();

                return true;
            }

            return false;
        }

        private function verificarEmail($email)
        {
            $sql = "SELECT * FROM contatos WHERE email = :email";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return true;
            }

            return false;
        }
    }
