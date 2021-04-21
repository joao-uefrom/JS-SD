package bean;

import dao.CardapioDAO;
import interfaces.InterfaceCardapio;
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;

public class CardapioBean extends UnicastRemoteObject implements InterfaceCardapio {

    private int id;
    private String prato;
    private double preco;
    private int porcoes;

    public CardapioBean() throws RemoteException {
        System.out.println("A classe Cardapio está disponível remotamente.");
    }

    @Override
    public int getId() {
        return id;
    }

    @Override
    public void setId(int id) {
        this.id = id;
    }
    @Override
    public String getPrato() {
        return prato;
    }

    @Override
    public void setPrato(String prato) {
        this.prato = prato;
    }

    @Override
    public double getPreco() {
        return preco;
    }

    @Override
    public void setPreco(double preco) {
        this.preco = preco;
    }

    @Override
    public int getPorcoes() {
        return porcoes;
    }

    @Override
    public void setPorcoes(int porcoes) {
        this.porcoes = porcoes;
    }

    @Override
    public void adicionar() {
        CardapioDAO.insert(this);
    }

    @Override
    public ArrayList<CardapioBean> listar() {
        return CardapioDAO.select();
    }

    @Override
    public void excluir(int id) {
        CardapioDAO.delete(id);
    }

}
