<?php
class Conta{
    private $numeroConta;
    private $titular;
    private $saldo;
        
    public function __constructor($numeroConta, $titular, $saldo){
        $this->numeroConta = $numeroConta;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    sacar(valor){
        if (valor<= $this-> saldo){
            $this-> saldo -= valor;
            console.log('Saque realizado com sucesso!');
        } else {console.log('Saldo insuficiente!');}
        return valor;
    }

    depositar(valor){
        if (valor <=0){
            return;
        }
        $this-> saldo += valor;
    }

    getSaldo(){
        return $this-> saldo;
    }

    transferir(valor, recebedor){
        if (valor> $this-> saldo){
            console.log("Você não tem saldo suficiente para essa transferência");  
            return;
        }
        $this-> sacar(valor);
        recebedor.depositar(valor);
    }
}

//classe filha

class contaCorrente extends Conta{
    
}

class contaPoupanca extends Conta{
    
}

const conta1 = new contaCorrente(4536,"Ivana Bernardo",1000);
const conta2 = new contaPoupanca(14512, "Ivana Bernardo",500);

conta1.transferir(250,conta2);
console.log('Saldo conta 1: ' + conta1.getSaldo());
console.log('Saldo conta 2: ' + conta2.getSaldo()); 
