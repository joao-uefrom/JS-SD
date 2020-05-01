package bean;

import dao.GameDAO;
import dao.ProdutoDAO;
import interfaces.InterfaceGame;
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;

public class GameBean extends UnicastRemoteObject implements InterfaceGame {

    private String nome;
    private int ano;
    private double nota;

    public GameBean() throws RemoteException {
        System.out.println("A classe Game está disponível remotamente.");
    }

    @Override
    public String getNome() {
        return nome;
    }

    @Override
    public void setNome(String nome) {
        this.nome = nome;
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
        GameDAO.insert(this);
    }

    @Override
    public ArrayList<GameBean> listar() {
        return GameDAO.select();
    }
}
