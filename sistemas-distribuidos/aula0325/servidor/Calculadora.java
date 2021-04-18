package servidor;

import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;

import cliente.InterfaceOperacoes;

public class Calculadora extends UnicastRemoteObject implements InterfaceOperacoes {

    public Calculadora() throws RemoteException {
        System.out.println("Servidor instanciado...");

    }

    @Override
    public double somar(double a, double b) throws RemoteException {
        return a + b;
    }

    @Override
    public double subtrair(double a, double b) throws RemoteException {
        return a - b;
    }

    @Override
    public double multiplicar(double a, double b) throws RemoteException {
        return a * b;
    }

    @Override
    public double dividir(double a, double b) throws RemoteException {
        return a / b;
    }

}