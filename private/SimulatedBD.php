<?php
//Teste da questions
function BD($num)
{
    $BD = array(
        [
            'titles' => ['Ola', 'Demais', 'Tudo bem'], //um titulo por pagina
            'medias' => ['fvat', 'tf', 'atfv'], //
            'texts' => ['Demais', 'Blz', 'Tudo Bom'], //um tipo de texto
            'respostas' => ['ola', 'demais', 'legal'], //uma respota por questão sempre em minisculo
            'dicas' => [['Massa', 'Bom', 'Dia', 'Legal'], ['Ola', 'é', 'a'], ['b', 'c']], //maximo de 4 dicas por pagina  
            'links' => [
                [
                    'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png',
                    'http://v2v.cc/~j/theora_testsuite/320x240.ogg',
                    'media/teste.mp3'
                ],
                [
                    'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png'
                ],
                [
                    'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png',
                    'http://v2v.cc/~j/theora_testsuite/320x240.ogg',
                    'media/teste.mp3'
                ]
            ] // uma midia por pagina
        ]
    );
    return $BD[$num];
}
function qtndEngimas()
{
    //puxar do banco
    return 2;
}

//Teste da Journal
function BD2($num)
{
    $BD = array(
        [
            'titles' => ['Ola'],
            'strutures' => ['1', '2', '3', '0'], //
            'medias' => ['a', 'i', ''], //
            'texts' => ["Ola", "Blz", "Tudo Bem"],
            'respostas' => ['ola', 'demais', 'legal'],
            'pontos' => [50, 60, 70],
            'dicas' => ['Massa', 'Bom', 'Lorem', 'Legal'], //maximo de 4 dicas por pagina  
            'links' => ["http://principal.com/pcc/media/teste.mp3", 'https://statig0.akamaized.net/bancodeimagens/5w/6r/ep/5w6rep16o2e497c3x5n8ydhi0.jpg', '']
        ],
    );
    return $BD[$num];
}

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
