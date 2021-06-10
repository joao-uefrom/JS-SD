<?php


class Aula
{
    private $id;
    private $aula;
    private $professor;
    private $dia;

    public function __construct($registro = false, $id = false)
    {
        if ($registro) {
            $this->id = $registro['id'];
            $this->aula = $registro['aula'];
            $this->professor = $registro['professor'];
            $this->dia = $registro['dia'];
            $id = false;
        }

        if ($id) {
            $sql = "SELECT * FROM aulas WHERE id = :id";
            $stmt = DataBase::conectar()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->id = $registro['id'];
                $this->aula = $registro['aula'];
                $this->professor = $registro['professor'];
                $this->dia = $registro['dia'];
            }
        }
    }

    public function setAula($aula): Aula
    {
        $this->aula = $aula;
        return $this;
    }

    public function setProfessor($professor): Aula
    {
        $this->professor = $professor;
        return $this;
    }

    public function setDia($dia): Aula
    {
        $this->dia = $dia;
        return $this;
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function getAula(): string
    {
        return $this->aula;
    }

    public function getProfessor(): string
    {
        return $this->professor;
    }

    public function getDia(): string
    {
        return $this->dia;
    }


    public static function listar(): array
    {
        $sql = "SELECT * FROM aulas";
        $stmt = DataBase::conectar()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();

        $aulas = [];

        if ($registros) {
            foreach ($registros as $registro) {
                $aula = new Aula($registro);
                $aulas[] = $aula;
            }

        }

        return $aulas;
    }

    public function adicionar(): Aula
    {
        $sql = "INSERT INTO aulas(aula, professor, dia) VALUES (:aula, :professor, :dia)";

        $stmt = DataBase::conectar()->prepare($sql);
        $stmt->bindValue(':aula', $this->aula);
        $stmt->bindValue(':professor', $this->professor);
        $stmt->bindValue(':dia', $this->dia);
        $stmt->execute();

        $this->id = DataBase::conectar()->lastInsertId();

        return $this;
    }

    public function excluir()
    {
        if (isset($this->id)) {
            $sql = "DELETE FROM aulas WHERE id = $this->id";

            $stmt = DataBase::conectar()->prepare($sql);
            $stmt->execute();
        }
    }

    public function atualizar(): Aula
    {
        $sql = "UPDATE aulas SET aula ='" . $this->aula . "', professor = '" . $this->professor . "' dia ='" . $this->dia . "' WHERE id = " . $this->id;

        $stmt = DataBase::conectar()->prepare($sql);
        $stmt->execute();

        return $this;
    }

}