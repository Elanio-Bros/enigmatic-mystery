<?php
require_once 'private/SimulatedBD.php';

const MIDIA = "medias";
const TEXT = "texts";
const LINK = 'links';

//private
class Questions
{

    public $enigma;
    public $title;
    public $fase;

    public function __construct($idEnigma)
    {
        try {
            $bd = new BancoDeDados('perguntas');
            $bd->prepare($bd->SelectGame());
            $bd->bindValue(0, $idEnigma);
            $bd->execute();
            $this->enigma = $bd->getStatement()->fetchAll(PDO::FETCH_ASSOC)[0];
        } catch (PDOException $e) {
            echo 'Erro:' . $e->getCode() . '<br/>' . 'Mensagem:' . $e->getMessage();
        }
    }

    public function numFase($fase)
    {
        $this->fase = ($fase - 1);
        $title = explode(";", $this->enigma['titles']);
        $this->title = $title[$this->fase];
    }

    private function get($type)
    {
        $type = explode(";", $this->enigma[$type])[$this->fase];
        return $type;
    }
    public function getDica($numDica)
    {
        $dicas = explode(",", explode(";", $this->enigma['dicas'])[$this->fase])[$numDica];
        return $dicas;
    }
    public function qtndDica()
    {
        $count = count(explode(",", explode(";", $this->enigma['dicas'])[$this->fase]));
        return $count;
    }
    public function getLink()
    {
        $link = explode(",", explode(";", $this->enigma['links'])[$this->fase]);
        return $link;
    }

    public function getResposta()
    {
        $resposta = explode(";", $this->enigma['respostas']);
        $resposta = $resposta[$this->fase];
        return $resposta;
    }
    public function structure()
    {
        $letras = $this->get(MIDIA);
        $info = $this->getLink();
        array_push($info, $this->get(TEXT));
        $tipo = ['f', 'v', 'a', 't'];
        $medias = array();
        foreach ($tipo as $key => $value) {
            $numStructure = strpos($letras, $value);
            if(is_numeric($numStructure)){
                $medias[$numStructure] = $this->structuringMedia($key, $info[$key]);
            }
        }
        ksort($medias);
        return implode('', $medias);
    }
    public function pontosRespostas()
    {
        return explode(',', $this->enigma['pontos'])[$this->fase];
    }

    private function structuringMedia($value, $info)
    {
        $structure = '';
        switch ($value) {
            case 0:
                $structure = "<div class='midia'><img src='$info'></div><br/>";
                break;
            case 1:
                $structure = "<div class='midia'><video src='$info' preload='auto' controls controlslist='nodownload'/></div><br/>";
                break;
            case 2:
                $structure = "<div class='midia'><audio src=$info preload='auto' controls controlslist='nodownload'/></div>";
                break;
            case 3:
                $structure = "<div class='text'>$info</div>";
                break;
        }
        return $structure;
    }

    public function getNumPags()
    {
        return count(explode(";", $this->enigma['titles']));
    }
}

class Journal
{
    public $enigma;
    public $title;
    private $numResposta;

    public function __construct($idEnigma)
    {
        try {
            $bd = new BancoDeDados('roteiros');
            $bd->prepare($bd->SelectGame());
            $bd->bindValue(0, $idEnigma);
            $bd->execute();
            $this->enigma = $bd->getStatement()->fetchAll(PDO::FETCH_ASSOC)[0];
        } catch (PDOException $e) {
            echo 'Erro:' . $e->getCode() . '<br/>' . 'Mensagem:' . $e->getMessage();
        }

        $this->title = $this->enigma['titles'];
        echo $this->title;
    }
    public function get($tipo, $num)
    {
        $acessoBD = explode(',', $this->enigma[$tipo])[$num];
        return $acessoBD;
    }
    public function getDica($numDica)
    {
        $dicas = explode(',', $this->enigma['dicas'])[--$numDica];
        return $dicas;
    }
    public function qtndDica()
    {
        $count = count(explode(',', $this->enigma['dicas']));
        return $count;
    }
    public function structure()
    {
        // separa entre letras e numeros
        $strutures = explode(',', $this->enigma['strutures']);
        $juntos = null;
        foreach ($strutures as $key => $value) {
            if ($value == 0) {
                $juntos = $this->montandoEstrura($juntos);
            } else {
                $juntos = $juntos . '' . $this->montandoEstrura($this->get(TEXT, $key), $value, $this->get(MIDIA, $key), $this->get(LINK, $key));
            }
        }
        return $juntos;
    }
    public function getResposta($resposta)
    {
        $codigo = false;
        $Getrespostas = explode(',', $this->enigma['respostas']);
        foreach ($Getrespostas as $key => $respotas) {
            if ($respotas == $resposta) {
                $this->numFase = $key;
                $codigo = true;
            }
        }
        return $codigo;
    }
    public function pontosRespostas()
    {
        return explode(',', $this->enigma['pontos'])[$this->numFase];
    }

    private function montandoEstrura($conteudo, $valor = 0, $media = null, $link = null)
    {
        if ($media != null) {
            $media = $this->media($media, $link);
        }
        switch ($valor) {
            case 1:
                return "<div class='conteudo row'><p>$conteudo</p>$media</div>";

            case 2:
                return "<div class='conteudo row'>$media<p>$conteudo</p></div>";

            case 3:
                return "<div class='conteudo2 column'>$media<p>$conteudo</p></div>";

            default:
                return "<div class='conteudo4'>$conteudo</div>";
        }
    }

    private function media($media, $link)
    {
        switch ($media) {
            case 'i':
                return "<img class='img' src='$link'>";
            case 'v':
                return "<video src='$link' preload='auto' controls controlslist='nodownload'/>";
            case 'a':
                return  "<audio src='$link' preload='auto' controls controlslist='nodownload'/>";
        }
    }
}