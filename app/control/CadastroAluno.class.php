<?php
class CadastroAluno extends TPage
{
    
    
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        TTransaction::open('sample');
         $aluno = new Aluno(1);
         //$aluno->set_nome("Roberto cardoso");
        // $aluno->store();
       
       print($aluno->get_nomepessoa());
                
        TTransaction::close();
      
        parent::add($this->html);
    }
}
?>

