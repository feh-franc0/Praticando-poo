<?php

//? CLASSE = METODOS = ATRIBUTOS


// * Os quatro pilares da programação orientada a objetos
// * 1 - Abstração. Antes de mais nada, imagine o que esse objeto irá realizar. ...
// * 2 - Encapsulamento.
// * 3 - Herança.
// * 4 - Polimorfismo.

// 1-CRIANDO UMA CLASSE
class Pessoa
{
    public string $nome;
    public function falar():string{
        return "O meu nome é ".$this->nome;
    }
}

$fernando = new Pessoa();
$fernando->nome = "Fernando Franco";
echo $fernando->falar();


////////////////////////////////////////////////////////////////////////////////////////////


// 2-ATRIBUTOS E METODOS

class Carro 
{
    private string $modelo;
    private float $motor;
    private int $ano;


    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }


    public function getMotor():float{
        return $this->motor;
    }
    public function setMotor($motor){
        $this->motor = $motor;
    }


    public function getAno():int{
        return $this->ano;
    }
    public function setAno($ano){
        $this->ano = $ano;
    }

    public function exibir(){
        return array(
            "modelo"=>$this->getModelo(),
            "motor"=>$this->getMotor(),
            "ano"=>$this->getAno()
        );
    }

}
$gol = new Carro();
$gol->setModelo("Gol GT");
$gol->setMotor("1.6");
$gol->setAno("2017");
var_dump($gol->exibir());


////////////////////////////////////////////////////////////////////////////////////////

// 3-MÉTODOS ESTÁTICOS 

class Documento {
    private $numero;
    
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $resultado = Documento::validarCPF($numero);
        if($resultado === false) {
            throw new Exception("CPF informado não é válido", 1);   
        }
        $this->numero = $numero;
    }
    public static function validarCPF($cpf):bool{

        if(empty($cpf)) {
            return false;
        }
     
        $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;
    
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
         
        
        if (strlen($cpf) != 11) {
            echo "length";
            return false;
        }
        
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
    
         } else {   
             
            for ($t = 9; $t < 11; $t++) {
                 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                    //$d += $cpf * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                //if ($cpf != $d) {
                    return false;
                }
            }
     
            return true;
        }

    }
}

// TEMOS DUAS FORMAS 

// // 1°
// $cpf = new Documento();
// $cpf->setNumero("87867147241");
// var_dump($cpf->getNumero());

// 2°
var_dump(Documento::validarCPF("87867147241"));


//////////////////////////////////////////////////////////////////////////////////////////////

// MÉTODOS MÁGICOS 

class Endereco{
    private $logradouro;
    private $numero;
    private $cidade;

    public function __construct($a, $b, $c)
    {
        $this->logradouro = $a;
        $this->numero = $b;
        $this->cidade = $c;
    }
    // public function __destruct()
    // {
    //     var_dump("DESTRUIR");
    // }

    public function __toString()
    {
        return $this->logradouro.", ".$this->numero." - ".$this->cidade;
    }
}

$meuEndereco = new Endereco("Rua Ademar Saraiva Leão", "123", "Santos");
// var_dump($meuEndereco);
// unset($meuEndereco);
echo $meuEndereco;


//////////////////////////////////////////////////////////////////////////////////////////////

// ENCAPSULAMENTO

class dadosPessoa {
    public $nome = "Rasmus Lerdof";
    protected $idade = 48;
    private $senha = "123456";

    public function verDados(){
        echo $this->nome. "<br/>";
        echo $this->idade. "<br/>";
        echo $this->senha. "<br/>";
    }
}
$objeto = new dadosPessoa();
// echo $objeto->senha . "<br/>";
$objeto->verDados();


////////////////////////////////////////////

// ENCAPSULAMENTO + HERANCA

class Estudante {
    public $nome = "Rasmus Lerdorf";
    public $idade = 48;
    public $senha = "123456";

    public function verDados(){
        //Saber em qual classe esse metodo esta sendo executado
        echo get_class($this) . "<br/>";

        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
        echo $this->senha . "<br/>";
    }
}

class Programador extends Estudante 
{
    public function verDados(){
        //Saber em qual classe esse metodo esta sendo executado
        echo get_class($this) . "<br/>";

        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
        echo $this->senha . "<br/>";
    }
}

$objeto = new Programador();
//echo $objeto->senha . "<br/>";
$objeto->verDados();


//////////////////////////////////////////////////////////////////////////////////////////////

// HERANÇA 

class Professor{
    private $faculdade;

    public function getFaculdade(){
        return $this->faculdade;
    }
    public function setFaculdade($n){
        $this->faculdade = $n;
    }
}

class Aula extends Professor{
    public $sexo;
    public $cargo;

    public function getSexo(){
        return $this->sexo;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function getCargo(){
        return $this->cargo;
    }
    public function setCargo($cargo){
        $this->cargo = $cargo;
    }

    public function dados(){
        $informacaoProf = $this->getFaculdade();
    }
}
$doc = new Aula();
$doc->setSexo("m");
$doc->setCargo("professora substituta");
$doc->setFaculdade("Biologia");
echo $doc->getFaculdade();
echo "<br/>";
echo $doc->getCargo();
echo "<br/>";
echo $doc->getSexo();


/////////////////////////////////////////////////////////////////////////////////////////////////

// INTERFACE 

interface Veiculo{
    public function acelerar($velocidade);
    public function frenar($velocidade);
    public function trocarMarcha($marcha);
}

class Civic implements Veiculo{
    public function acelerar($velocidade)
    {
        echo "O veículo acelerou até " . $velocidade . "km/h";
    }
    public function frenar($velocidade)
    {
        echo "O veículo frenou até " . $velocidade . "km/h";
    }
    public function trocarMarcha($marcha)
    {
        echo "O veículo engatou a marcha " . $marcha;
    }
}
$carro = new Civic();
$carro->trocarMarcha(1);


//////////////////////////////////////////////////////////////////////////////////////////////////

// CLASSE ABSTRATA 

interface Veiculos {
    public function acelerar($velocidade);
    public function frenar($velocidade);
    public function trocarMarcha($marcha);
}

abstract class Automovel implements Veiculos{

    public function acelerar($velocidade){
        echo "O veículo acelerou até " . $velocidade . " Km/h";
    }

    public function frenar($velocidade){
        echo "O  veículo frenou até " . $velocidade . " Km/h";
    }

    public function trocarMarcha($marcha){
        echo "O veículo engatou a marcha " . $marcha;
    }
   
}

class DelRey extends Automovel{//Nao se pode instanciar uma classe abstrata(nesse caso Automovel), então atribuimos ele a DelRey

    public function empurrar(){



    }   
}
$carro = new DelRey();
$carro->acelerar(200);


//////////////////////////////////////////////////////////////////////////////////////////////////

// POLIMORFISMO 

abstract class Animal {
    public function falar(){
        return "Som";
    }
    public function mover(){
        return "Anda";
    }
}

class Cachorro extends Animal{
    public function falar(){
        return "Late";
    }
}

class Gato extends Animal{
    public function falar(){
        return "Mia";
    }
}

class Passaro extends Animal{
    public function falar(){
        return "Canta";
    }
    public function mover(){
        return "Voa e " . parent::mover();//'parent::' chama da classe pai o mover();
    }
}

$pluto = new Cachorro();
echo $pluto->falar() . "<br/>";
echo $pluto->mover() . "<br/>";

echo "----------------------<br/>";

$garfield = new Gato();
echo $garfield->falar() . "<br/>";
echo $garfield->mover() . "<br/>";

echo "----------------------<br/>";

$ave = new Passaro();
echo $ave->falar() . "<br/>";
echo $ave->mover() . "<br/>";


//////////////////////////////////////////////////////////////////////////////////////////////

