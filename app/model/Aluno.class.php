<?php
class Aluno extends TRecord
{
    const TABLENAME = 'aluno';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
 
    /**
     * metodo construtor
     */
        public function __construct($id = NULL)
        {
            parent::__construct($id);
            parent::addAttribute('nome');
            parent::addAttribute('cpf');
            parent::addAttribute('rg');
        }
        
        public function get_nomepessoa()
        {
          return $this->nome;
        }
       
  }
