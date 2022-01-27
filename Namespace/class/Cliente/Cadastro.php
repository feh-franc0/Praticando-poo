<?php

namespace Cliente;
//esse namespace é so para o cadastro do cliente, e a classe cadastro vai exterder da classe Cadastro principal(herança), só que ai ela vai ter os metodos e atributos especificos para um cadastro de um cliente e nao um cadastro genérico.É interessante porque aí a classe cadastro dentro de cliente pode por coisas que n seria interessante em nenhuma outra forma de cadastro,apenas para cliente que é viavel 

class Cadastro extends \Cadastro
{//*usamos o \ para voltar para a raiz do projeto das classes.Para externder do Cadastro principal
    public function registrarVenda(){
        echo "Foi registrada um venda para o cliente ".$this->getNome();
    }
}
