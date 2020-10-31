<?php
function BD($num){
    $BD=array(
        [
        'titles'=>['Ola','Demais','Tudo bem'],
        'medias'=>['fvat','tf','atfv'],
        'texts'=>['Demais','Blz','Tudo Bom'],
        'respostas'=>['Ola','Demais','Legal'],
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
            ]
        ],
    );
    return $BD[$num];
}
?>