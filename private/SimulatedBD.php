<?php
//Teste da questions
//0=foto
//1=video
//2=audio

//, para cada enigima por pargina
//; para divisãso na paginas como medias e dicas
//Teste da Journal


 class BancoDeDados
{
    public $conexao;
    public $statement;
    private $tabela;
    public function __construct($table)
    {
        $dsn = 'mysql:host=localhost;dbname=PCC';
        $user = 'root';
        $passw = '';
        $this->conexao = new PDO($dsn, $user, $passw);
        $this->tabela = $table;
    }
    public function prepare($query)
    {
        $this->statement = $this->conexao->prepare($query);
    }
    public function getStatement()
    {
        return $this->statement;
    }
    public function bindValue($id, $value)
    {
        $id++;
        $this->statement->bindValue($id, $value);
    }
    public function execute()
    {
        $this->statement->execute();
    }
    public function QueryCreate()
    {
        return "INSERT INTO " . 'Ola' . " VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    }
    public function SelectRandom(){
        $query = "SELECT id,nivel FROM " .$this->tabela. " WHERE nivel=?";
        return $query;
    }
    public function SelectGame()
    {
        $query = "SELECT * FROM " . $this->tabela . " WHERE id=?";
        return $query;
    }
    
}
