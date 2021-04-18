package bean;

import dao.CarroDAO;
import interfaces.InterfaceCarro;
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;

public class CarroBean extends UnicastRemoteObject implements InterfaceCarro {

    private String modelo;
    private int ano;
    private double nota;

    public CarroBean() throws RemoteException {
        System.out.println("A classe Carro está disponível remotamente.");
    }

    @Override
    public String getModelo() {
        return modelo;
    }

    @Override
    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    @Override
    public int getAno() {
        return ano;
    }

    @Override
    public void setAno(int ano) {
        this.ano = ano;
    }

    @Override
    public double getNota() {
        return nota;
    }

    @Override
    public void setNota(double nota) {
        this.nota = nota;
    }

    @Override
    public void adicionar() {
        CarroDAO.insert(this);
    }

    @Override
    public ArrayList<CarroBean> listar() {
        return CarroDAO.select();
    }
    
}
