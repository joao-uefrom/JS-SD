package bean;

import dao.ProdutoDAO;
import interfaces.InterfaceProduto;
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;

public class ProdutoBean extends UnicastRemoteObject implements InterfaceProduto {

    private int id;
    private String descricao;
    private double preco;
    private int quantidade;

    public ProdutoBean() throws RemoteException {
        System.out.println("A classe produto está disponível remotamente.");
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
    public String getDescricao() {
        return descricao;
    }

    @Override
    public void setDescricao(String descricao) {
        this.descricao = descricao;
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
    public int getQuantidade() {
        return quantidade;
    }

    @Override
    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    @Override
    public void adicionar() {
        ProdutoDAO.insert(this);
    }

    @Override
    public ArrayList<ProdutoBean> listar() {
        return ProdutoDAO.select();
    }

    @Override
    public void excluir(int id) {
        ProdutoDAO.delete(id);
    }

}
