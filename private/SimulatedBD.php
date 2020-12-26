<?php
//Teste da questions
function BD($num){
    $BD=array(
        [
        'titles'=>['Ola','Demais','Tudo bem'], //um titulo por pagina
        'medias'=>['fvat','tf','atfv'],//
        'texts'=>['Demais','Blz','Tudo Bom'],//um tipo de texto
        'respostas'=>['ola','demais','legal'],//uma respota por questão sempre em minisculo
        'dicas'=>[['Massa','Bom','Dia','Legal'],['Ola','é','a'],['b','c']],//maximo de 4 dicas por pagina  
        'links'=>[
            [
            'foto'=>'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png',
            'video'=>'http://v2v.cc/~j/theora_testsuite/320x240.ogg',
            'audio'=>'media/teste.mp3'],
            [
            'foto'=>'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png'],
            ['foto'=>'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png',
            'video'=>'http://v2v.cc/~j/theora_testsuite/320x240.ogg',
            'audio'=>'media/teste.mp3']
            ]// uma midia por pagina
        ],
        [
        'titles'=>['Chachorro','Google','Avião'], //um titulo por pagina
        'medias'=>['fvat','tf','atf'],//
        'texts'=>['Esse Cachorro é massa','Google','Tudo Bom'],//um tipo de texto
        'respostas'=>['fofo','massa','voar'],//uma respota por questão sempre em minisculo
        'dicas'=>[['animal','4 patas','Anda','Corre'],['Empresa','Grande'],['Asasa','Voa']],//maximo de 4 dicas por pagina  
        'links'=>[
            [
            'foto'=>'https://s2.glbimg.com/slaVZgTF5Nz8RWqGrHRJf0H1PMQ=/0x0:800x450/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2019/U/e/NTegqdSe6SoBAoQDjKZA/cachorro.jpg',
            'video'=>'http://v2v.cc/~j/theora_testsuite/320x240.ogg',
            'audio'=>'media/teste.mp3'],
            [
            'foto'=>'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/1bcfd914-5496-4c73-9288-0e19831cb9a3/d1cmpz8-cb7cea1d-e4a8-4768-8498-5c84cdb600f1.png'
            ],
            ['foto'=>'https://aeromagazine.uol.com.br/media/versions/e170_united_express_2_free_big.jpg',
            'audio'=>'media/teste.mp3']
            ]// uma midia por pagina
        ],
    );
    return $BD[$num];
}
function qtndEngimas(){
    //puxar do banco
    return 2;
}

//Teste da Journal
function BD2($num){
        $BD=array(
            [
            'titles'=>['Ola'],
            'strutures'=>['1','2','3','0'],//
            'medias'=>['a','i',''],//
            'texts'=>["Ola","Blz","Tudo Bem"],
            'respostas'=>['ola','demais','legal'],
            'dicas'=>['Massa','Bom','Lorem','Legal'],//maximo de 4 dicas por pagina  
            'links'=>["http://principal.com/pcc/media/teste.mp3",'https://statig0.akamaized.net/bancodeimagens/5w/6r/ep/5w6rep16o2e497c3x5n8ydhi0.jpg','']
            ],
        );
        return $BD[$num];
    }
?>